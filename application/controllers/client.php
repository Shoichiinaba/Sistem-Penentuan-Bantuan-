<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	var $template='template/index';
	var $template1='client_tem/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('search_m');
		$this->load->helper(array('url'));
		
	}

	function index()
	{
		$data['content'] = 'home';
        $this->load->view($this->template, $data);
	}

	function search(){
		$no_kk=$this->input->get('no_kk');
		$data['bantuan']=$this->search_m->search_status($no_kk);
		$data['content'] = 'search_view';
		$this->load->view($this->template1,$data);
		
	}
	function detail($id)
	{
		$where = array('no_kk' => $id);
		$data['bantuan'] = $this->search_m->get_detail($where,'hasil_testing')->result();
		$data['content'] = 'detail_tam';
		$this->load->view($this->template1,$data);
		
	}
}
