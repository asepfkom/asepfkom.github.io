<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('jenis_model');
		}	

	//Halaman Utama
	public function index()
	{
		$jenis = $this->jenis_model->listing();
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','required',
			array(
				'required'  	=> 'Nama harus di isi'));
		$valid->set_rules('kode_jenis','Kode Jenis Buku','required|is_unique[jenis.kode_jenis]',
			array(
				'required' 	 => 'Kode jenis harus di isi',
				'is_unique'  => 'Kode jenis <strong>'.$this->input->post('kode_jenis').'</strong> sudah ada. Buat kode jenis buku baru '));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Kelola Jenis Buku',
				'jenis'  	=> $jenis,
				'isi'   	=> 'admin/jenis/list' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'kode_jenis'  => $i->post('kode_jenis'),
				'nama_jenis'  => $i->post('nama_jenis'),
				'keterangan'  => $i->post('keterangan'),
				'urutan'      => $i->post('urutan')
			);
			$this->jenis_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/jenis'),'refresh');
		}
		//end masuk database	
	}

	//Halaman Edit
	public function edit($id_jenis)
	{
		$jenis = $this->jenis_model->detail($id_jenis);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','required',
			array(
				'required'  	=> 'Nama harus di isi'));
		
		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Edit Jenis: '.$jenis->nama_jenis,
				'jenis'     => $jenis,
				'isi'   	=> 'admin/jenis/edit' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'id_jenis'    => $id_jenis,
				'kode_jenis'  => $i->post('kode_jenis'),
				'nama_jenis'  => $i->post('nama_jenis'),
				'keterangan'  => $i->post('keterangan'),
				'urutan'      => $i->post('urutan')
				);
			
			$this->jenis_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/jenis'),'refresh');
		}
		//end masuk database	
	}

	//delete
	public function delete($id_jenis)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		$data = array('id_jenis' => $id_jenis);
		$this->jenis_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/jenis'),'refresh');
	}

}

/* End of file Jenis.php */
/* Location: ./application/controllers/admin/Jenis.php */