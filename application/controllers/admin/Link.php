<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('link_model');
		}	

	//Halaman Utama
	public function index()
	{
		$link = $this->link_model->listing();
		$valid = $this->form_validation;

		$valid->set_rules('nama_link','Nama','required',
			array(
				'required'  	=> 'Nama harus di isi'));
		$valid->set_rules('url','Alamat Link','required|is_unique[link.url]',
			array(
				'required' 	 => 'Alamat link harus di isi',
				'is_unique'  => 'Alamat link <strong>'.$this->input->post('nama_link').'</strong> sudah ada. Buat kode link buku baru '));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Kelola Link',
				'link'  	=> $link,
				'isi'   	=> 'admin/link/list' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'nama_link'  => $i->post('nama_link'),
				'url' 		 => $i->post('url'),
				'target'  	 => $i->post('target')
				// 'urutan'      => $i->post('urutan')
			);
			$this->link_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/link'),'refresh');
		}
		//end masuk database	
	}

	//Halaman Edit
	public function edit($id_link)
	{
		$link = $this->link_model->detail($id_link);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_link','Nama','required',
			array(
				'required'  	=> 'Nama harus di isi'));
		
		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Edit Link: '.$link->nama_link,
				'link'     => $link,
				'isi'   	=> 'admin/link/edit' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'id_link'    => $id_link,
				'nama_link'  => $i->post('nama_link'),
				'url' 		 => $i->post('url'),
				'target'  	 => $i->post('target')
				);
			
			$this->link_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/link'),'refresh');
		}
		//end masuk database	
	}

	//delete
	public function delete($id_link)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		$data = array('id_link' => $id_link);
		$this->link_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/link'),'refresh');
	}

}

/* End of file Link.php */
/* Location: ./application/controllers/admin/Link.php */