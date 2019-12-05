<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_training extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_training');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['list']=$this->M_training->get_training();
		$data['content'] = 'admin/data_training';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tambah_data()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Simpan");
			redirect('admin/data_training');
		}else{
				$nama=$this->input->post('nama');
				$alamat=$this->input->post('alamat');
				$status_penguasaan_B=$this->input->post('status_penguasaan_B');
				$jenis_lantai_terluas=$this->input->post('jenis_lantai_terluas');
				$jenis_dinding_terluas=$this->input->post('jenis_dinding_terluas');
				$kualitas_bangunan=$this->input->post('kualitas_bangunan');
				$jenis_atap_terluas=$this->input->post('jenis_atap_terluas');
				$kualitas_atap=$this->input->post('kualitas_atap');
				$sumber_air=$this->input->post('sumber_air');
				$daya_listrik=$this->input->post('daya_listrik');
				$setatus=$this->input->post('setatus');
			
			}
		$this->M_training->simpan($nama,$alamat,$status_penguasaan_B,$jenis_lantai_terluas,$jenis_dinding_terluas,$kualitas_bangunan,$jenis_atap_terluas,$kualitas_atap,$sumber_air,$daya_listrik,$setatus);
		$this->session->set_flashdata('sukses'," Berhasil Diinput");
		redirect('Data_training');	
	}

    function delete($params = '') {
        $this->M_training->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Data_training');
    }


	function adit_training()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect('Data_training');
		}else{
			$id = $this->input->post('id');
			$nama                	= $this->input->post('nama');
        	$alamat 				= $this->input->post('alamat');
        	$status_penguasaan_B 	= $this->input->post('status_penguasaan_B');
			$jenis_lantai_terluas 	= $this->input->post('jenis_lantai_terluas');
			$jenis_dinding_terluas 	= $this->input->post('jenis_dinding_terluas');
			$kualitas_bangunan 		= $this->input->post('kualitas_bangunan');
			$jenis_atap_terluas 	= $this->input->post('jenis_atap_terluas');
			$kualitas_atap 			= $this->input->post('kualitas_atap');
			$sumber_air 			= $this->input->post('sumber_air');
			$daya_listrik 			= $this->input->post('daya_listrik');
			$setatus 				= $this->input->post('setatus');

        $troop_ = array(
         'id' 					    =>  $id,
         'nama' 					=>  $nama,
         'alamat'  					=>  $alamat,
         'status_penguasaan_B'		=>	$status_penguasaan_B,
		 'jenis_lantai_terluas'		=>	$jenis_lantai_terluas,
		 'jenis_dinding_terluas'	=>	$jenis_dinding_terluas,
		 'kualitas_bangunan'		=>	$kualitas_bangunan,
		 'jenis_atap_terluas'		=>	$jenis_atap_terluas,
		 'kualitas_atap'			=>	$kualitas_atap,
		 'sumber_air'				=>	$sumber_air,
		 'daya_listrik'				=>	$daya_listrik,
		 'setatus'					=>	$setatus,

      );
        $this->M_training->edit($id, $troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Edit");
		redirect('Data_training');
	}
	}

}
