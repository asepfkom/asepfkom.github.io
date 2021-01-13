<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//load modal
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//halaman login
	public function index()
	{

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required',
			array(
				'required' 	 => 'Username harus di isi'));
		$valid->set_rules('password','Password','required|min_length[6]',
			array(
				'required' 	 => 'Password harus di isi',
				'min_length' => 'Password minimal 6 karakter' ));

		if ($valid->run()=== FALSE) 
		{
		// end validation
		$data = array('title' => 'Login Administrator');
		$this->load->view('admin/login_view', $data, FALSE);
		//check username dan password compare dengan database 
		}else {
			$i 			 = $this->input;
			$username    = $i->post('username');
			$password    = $i->post('password');
			//check di database
			$check_login = $this->user_model->login($username,$password);
			//kalau ada record, maka create season dan redirect ke halaman dasbor
			if (count($check_login) == 1) 
			{
			 	$this->session->set_userdata('username',$username);
			 	$this->session->set_userdata('akses_level',$check_login->akses_level);
			 	$this->session->set_userdata('id_user', $check_login->id_user);
			 	$this->session->set_userdata('nama', $check_login->nama);
			 	redirect(base_url('admin/dasbor'),'refresh');
			}else {
			//kalau username dan password tidak cocok atau error
				$this->session->set_flashdata('sukses','Username atau password tidak cocok');
				redirect(base_url('login'),'refresh');
			}
		}
		//end checking
	}

	//logout
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
	 	$this->session->unset_userdata('id_user');
	 	$this->session->unset_userdata('nama');
	 	$this->session->set_flashdata('sukses', 'Anda berhasil logout');
	 	redirect(base_url('login'),'refresh');
	}

}
