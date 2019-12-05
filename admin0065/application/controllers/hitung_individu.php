<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hitung_individu extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_testing');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['content'] = 'admin/hit_idividu';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);
	}

	function simpan_hitung()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Simpan");
			redirect('admin/hitung_indv');
		}else{
				$no_kk=$this->input->post('no_kk');
				$nama=$this->input->post('nama');
				$alamat=$this->input->post('alamat');
				$status_bangunan=$this->input->post('status_bangunan');
				$jenis_lantai=$this->input->post('jenis_lantai');
				$jenis_dinding=$this->input->post('jenis_dinding');
				$kualitas_bang=$this->input->post('kualitas_bang');
				$jenis_atap=$this->input->post('jenis_atap');
				$kualitas_atap=$this->input->post('kualitas_atap');
				$sumber_air=$this->input->post('sumber_air');
				$daya_listrik=$this->input->post('daya_listrik');
				$hasil_dapat=$this->input->post('hasil_dapat');
				$hasil_tdapat=$this->input->post('hasil_tdapat');
				$hasil_prediksi=$this->input->post('hasil_prediksi');
			}
		$this->M_testing->simpan($no_kk,$nama,$alamat,$status_bangunan,$jenis_lantai,$jenis_dinding,$kualitas_bang,$jenis_atap,$kualitas_atap,$sumber_air,$daya_listrik,$hasil_dapat,$hasil_tdapat,$hasil_prediksi);
		$this->session->set_flashdata('sukses'," Berhasil Diinput");
		redirect('hitung_individu');	
	}


}
