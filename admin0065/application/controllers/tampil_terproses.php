<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil_terproses extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_training');
		$this->load->model('M_testing');
		$this->load->helper('url');
	}

	function index()
	{
		$data['data']=$this->M_training->get_proses();
		$data['content'] = 'admin/list_kel';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function hapus($params = '') {
        $this->M_testing->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('tampil_terproses');
    }


    function adit_pered()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect('tampil_terproses');
		}else{
			$no_kk=$this->input->post('no_kk');
			$nama = $this->input->post('nama');
        	$alamat = $this->input->post('alamat');
        	

        $troop_ = array(
         'no_kk' =>  $no_kk,
         'nama' =>  $nama,
         'alamat'  => $alamat,
         

      );
        $this->M_testing->ubah($no_kk, $troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Edit");
		redirect('tampil_terproses');
	}
	}

}
