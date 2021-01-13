<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('bahasa_model');
		}	

	//Halaman Utama
	public function index()
	{
		$bahasa = $this->bahasa_model->listing();
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
			array(
				'required'  	=> 'Nama harus di isi'));
		$valid->set_rules('kode_bahasa','Kode Bahasa Buku','required|is_unique[bahasa.kode_bahasa]',
			array(
				'required' 	 => 'Kode bahasa harus di isi',
				'is_unique'  => 'Kode bahasa <strong>'.$this->input->post('kode_bahasa').'</strong> sudah ada. Buat kode bahasa buku baru '));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Kelola Bahasa Buku',
				'bahasa'  	=> $bahasa,
				'isi'   	=> 'admin/bahasa/list' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'kode_bahasa'  => $i->post('kode_bahasa'),
				'nama_bahasa'  => $i->post('nama_bahasa'),
				'keterangan'  => $i->post('keterangan'),
				'urutan'      => $i->post('urutan')
			);
			$this->bahasa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/bahasa'),'refresh');
		}
		//end masuk database	
	}

	//Halaman Edit
	public function edit($id_bahasa)
	{
		$bahasa = $this->bahasa_model->detail($id_bahasa);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
			array(
				'required'  	=> 'Nama harus di isi'));
		
		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Edit Bahasa: '.$bahasa->nama_bahasa,
				'bahasa'     => $bahasa,
				'isi'   	=> 'admin/bahasa/edit' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'id_bahasa'    => $id_bahasa,
				'kode_bahasa'  => $i->post('kode_bahasa'),
				'nama_bahasa'  => $i->post('nama_bahasa'),
				'keterangan'  => $i->post('keterangan'),
				'urutan'      => $i->post('urutan')
				);
			
			$this->bahasa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/bahasa'),'refresh');
		}
		//end masuk database	
	}

	//delete
	public function delete($id_bahasa)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		$data = array('id_bahasa' => $id_bahasa);
		$this->bahasa_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/bahasa'),'refresh');
	}

}

/* End of file Bahasa.php */
/* Location: ./application/controllers/admin/Bahasa.php */