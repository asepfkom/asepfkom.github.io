<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//homepage
	public function index()
	{
		$data = array(
			'title' => 'Halaman Dasbor',
			'isi' => 'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//profile
	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		$user 	 = $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(
				'required'  => 'Nama harus di isi'));
		$valid->set_rules('email','Email','required|valid_email',
			array(
				'required'  => 'Email harus di isi',
				'valid_email' => 'Format email tidak benar'));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Update profile: '.$user->nama,
				'user'      => $user,
				'isi'   	=> 'admin/dasbor/profile' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			//jika input password lebih dari 6 karakter
			if(strlen($i->post('password'))>6)
			{
				$data = array(
					'id_user' => $id_user,
					'nama' => $i->post('nama'),
					'email' => $i->post('email'),
					'password' => sha1($i->post('password')),
					'akses_level' => $i->post('akses_level'),
					'keterangan' => $i->post('keterangan')
					);
			}else{
				$data = array(
					'id_user' => $id_user,
					'nama' => $i->post('nama'),
					'email' => $i->post('email'),
					'akses_level' => $i->post('akses_level'),
					'keterangan' => $i->post('keterangan')
					);	
			}
			//end if
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile telah diupdate');
			redirect(base_url('admin/dasbor/profile'),'refresh');
		}
		//end masuk database
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */