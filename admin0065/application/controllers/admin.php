<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['jml_permohonan'] 	= $this->M_admin->get_permohonan();
		$data['jml_dapat'] 			= $this->M_admin->get_dapat();
		$data['tidak_dapat'] 		= $this->M_admin->get_tdapat();
		$data['approve'] 			= $this->M_admin->approve();
		$data['proses'] 			= $this->M_admin->proses();
		$data['data_masuk'] 		= $this->M_admin->masuk();
		$data['content'] 	= 'admin/home';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tampil_admin()
	{	
		$data['list']=$this->M_admin->get_admin_kel();
		$data['content'] = 'admin/list_admin';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tampil_admindin()
	{	
		$data['list']=$this->M_admin->get_admin_din();
		$data['content'] = 'admin/list_admin';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tambah_user()
	{	
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password harus sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('level', 'Level', 'required|trim');

		if ($this->form_validation->run() == false) {
			// $this->session->set_flashdata('error',"Maaf Anda Gagal Registrasi");
			// redirect('admin/tanbah_user');

		$data['content'] = 'admin/daftar';
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);	

		} else{
			
			$data =[

				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password1')),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'foto' => 'default.png',
				'role' => $this->input->post('role'),
				'level' => $this->input->post('level'),
			];
			$this->db->insert('admin',$data);
			$this->session->set_flashdata('sukses',"Selamat Anda Berhasil Registrasi");
			redirect('admin/tambah_user');


		}
	
	}
	function delete($params = '') 
	{
        $this->M_admin->hapus($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('admin/tampil_admin');
    }

}
