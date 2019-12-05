<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dinsos extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_approve');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['list']=$this->M_approve->get_list();
		$data['content'] = 'dinsos/list_bantuan';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function hapus($params = '') {
        $this->M_approve->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('dinsos');
    }


}
