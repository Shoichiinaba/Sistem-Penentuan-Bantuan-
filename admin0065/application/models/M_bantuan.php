<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bantuan extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

	function hitung($hasil_prediksi = 'Dapat Bantuan',$tgl_renovasi = '')
	{
		$this->db->select('hasil_testing.*');
		$this->db->where('hasil_prediksi', $hasil_prediksi);
		$this->db->where('tgl_renovasi', $tgl_renovasi);
		$query = $this->db->get('hasil_testing');
		return $query->result();

	  // return $this->db->get('hasil_testing')->result();
	}

	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function insert_multiple($data){
		return $this->db->insert_batch('hasil_testing', $data);

	}

}