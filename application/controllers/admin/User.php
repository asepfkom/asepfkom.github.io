<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}	

	//Halaman Utama
	public function index()
	{
		$user = $this->user_model->listing();
		$data = array(
			'title' => 'Data User('.count($user).')',
			'user'  => $user,
			'isi' 	=> 'admin/user/list');
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}

	//Halaman Tambah
	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(
				'required'  => 'Nama harus di isi'));
		$valid->set_rules('email','Email','required|valid_email',
			array(
				'required'  => 'Email harus di isi',
				'valid_email' => 'Format email tidak benar'));
		$valid->set_rules('username','Username','required|is_unique[user.username]',
			array(
				'required'  => 'Username harus di isi',
				'is_unique' => 'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru '));
		$valid->set_rules('password','Password','required|min_length[6]',
			array(
				'required'  => 'Password harus di isi',
				'min_length' => 'Password minimal 6 karakter'));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Tambah User',
				'isi'   	=> 'admin/user/tambah' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'nama'       => $i->post('nama'),
				'email' 	 => $i->post('email'),
				'username'   => $i->post('username'),
				'password'   => sha1($i->post('password')),
				'akses_level'=> $i->post('akses_level'),
				'keterangan' => $i->post('keterangan')
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/user'),'refresh');
		}
		//end masuk database	
	}

	//Halaman Edit
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
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
				'title' 	=> 'Edit User: '.$user->nama,
				'user'      => $user,
				'isi'   	=> 'admin/user/edit' );
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
					'password'  => sha1($i->post('password')),
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
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
		//end masuk database	
	}

	//delete
	public function delete($id_user)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */