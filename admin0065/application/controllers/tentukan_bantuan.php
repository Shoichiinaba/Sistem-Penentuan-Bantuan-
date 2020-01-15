<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tentukan_bantuan extends AUTH_Controller {
	private $filename = "import_data";
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_bantuan');
		$this->load->helper('url');
	}
	
	function index()
	{
		
		$data['content'] 	= 'admin/bantuan';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			
			$upload = $this->M_bantuan->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->model('m_array');
		$training = $this->m_array;
		$training->parameter('status_penguasaan_B',
			'jenis_lantai_terluas',
			'jenis_dinding_terluas',
			'kualitas_bangunan',
			'jenis_atap_terluas',
			'kualitas_atap',
			'sumber_air',
			'daya_listrik',
			'setatus');
		$training->Get();

		$this->load->library('naive_bayes');
		$bayes = $this->naive_bayes;
		$bayes->data = $training->tampil_data();
		$bayes->data_kategori = $training->tampil_data_kategori();
		$bayes->set_class('setatus');
		
		
		$data['userdata'] = $this->userdata;
		$data['content']  = 'admin/bantuan';
		$data['naive'] = $bayes;
		$this->load->view($this->template, $data);
	}
	

	function simpan(){
    	$no_kk = $_POST['no_kk'];
    	$nama = $_POST['nama'];
    	$alamat = $_POST['alamat'];
    	$status_bangunan = $_POST['status_bangunan'];
    	$jenis_lantai = $_POST['jenis_lantai'];
    	$jenis_dinding = $_POST['jenis_dinding'];
    	$kualitas_bang = $_POST['kualitas_bang'];
    	$kualitas_atap = $_POST['kualitas_atap'];
    	$jenis_atap = $_POST['jenis_atap'];
    	$sumber_air = $_POST['sumber_air'];
    	$daya_listrik = $_POST['daya_listrik'];
    	$dapat = $_POST['dapat'];
    	$tidak_dapat = $_POST['Tidak_Dapat'];
		$status = $_POST['Status'];
		$tahun = date('Y');

    	$data = array();
    	for($i = 0; $i<count($no_kk); $i++){
    		array_push($data, array(
    			'no_kk'=>$no_kk[$i],
    			'nama'=>$nama[$i],
    			'alamat'=>$alamat[$i],
    			'status_bangunan'=>$status_bangunan[$i],
    			'jenis_lantai'=>$jenis_lantai[$i],
    			'jenis_dinding'=>$jenis_dinding[$i],
    			'kualitas_bang'=>$kualitas_bang[$i],
    			'kualitas_atap'=>$kualitas_atap[$i],
    			'jenis_atap'=>$jenis_atap[$i],
    			'sumber_air'=>$sumber_air[$i],
    			'daya_listrik'=>$daya_listrik[$i],
    			'hasil_dapat'=>$dapat[$i],
    			'hasil_tdapat'=>$tidak_dapat[$i],
				'hasil_prediksi'=>$status[$i],
				'tahun'=>$tahun
    		));
    	}
    	$this->M_bantuan->insert_multiple($data);
        redirect('tampil_terproses');
	// function cek(){
	// 	$this->load->model('m_array');
	// 	$training = $this->m_array;
	// 	$training->parameter('status_penguasaan_B',
	// 		'jenis_lantai_terluas',
	// 		'jenis_dinding_terluas',
	// 		'kualitas_bangunan',
	// 		'jenis_atap_terluas',
	// 		'kualitas_atap',
	// 		'sumber_air',
	// 		'daya_listrik',
	// 		'setatus');
	// 	$training->Get();
	// 	/*
	// 	echo '<pre>';
	// 		print_r($training->tampil_data());
	// 	echo '</pre>';
	// 	*/
	// 	$this->load->library('naive_bayes');
	// 	$bayes = $this->naive_bayes;
	// 	$bayes->data = $training->tampil_data();
	// 	$bayes->data_kategori = $training->tampil_data_kategori();
	// 	$bayes->set_class('setatus');

		
	// }
    }
	
}
