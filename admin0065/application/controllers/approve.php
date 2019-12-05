<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class approve extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_approve');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['approve']=$this->M_approve->get_approve();
		$data['content'] = 'dinsos/list_approve';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);
	}

	function validasi()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"approve Anda Gagal");
			redirect('dinsos/approve');
		}else{
			$no_kk=$this->input->post('no_kk');
			$status_approved = $this->input->post('status_approved');
        	$tgl_sosial = $this->input->post('tgl_sosial');
        	$tgl_renovasi = $this->input->post('tgl_renovasi');
        	$keterangan = $this->input->post('keterangan');
        	

        $troop_ = array(
         'no_kk' =>  $no_kk,
         'status_approved' =>  $status_approved,
         'tgl_sosial'  => $tgl_sosial,
         'tgl_renovasi' => $tgl_renovasi,
         'keterangan' => $keterangan,

      );
        $this->M_approve->validat($no_kk, $troop_);
		$this->session->set_flashdata('sukses',"Permohonan Approved");
		redirect('approve');
	}
	}

}
