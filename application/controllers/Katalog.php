<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('file_buku_model');
	}

	//main page katalog
	public function index()
	{
		$buku = $this->buku_model->buku();

		//validasi 
		$valid = $this->form_validation;

		$valid->set_rules('cari','Kata kunci','required',
			array('required'   => 'Kata kunci harus di isi!!'));

		if ($valid->run()) {
			$cari 		= strip_tags($this->input->post('cari'));
			$keywords 	= str_replace('','-',$cari);
			redirect(base_url('katalog/cari/'.$keywords),'refresh');
		}
		//end validasi
		$data = array(
			'title'  => 'Katalog Buku',
			'buku'	 => $buku,
			'isi'    => 'katalog/list');
		$this->load->view('layout/wrapper',$data, FALSE);
	}

	public function cari($keywords)
	{
		$keywords = str_replace( '-',' ',strip_tags($keywords));
		$buku    = $this->buku_model->cari($keywords);

		$data = array(
				'title'	  => 'Hasil pencarian :'.$keywords.'('.count($buku).'buku)',
				'buku'    => $buku,
				'isi'	  => 'katalog/cari',
				'keywords' => $keywords);
		$this->load->view('layout/wrapper',$data,FALSE);
	}

	//read buku
	public function read($id_buku)
	{
		$buku    	= $this->buku_model->read($id_buku);
		$file_buku  = $this->file_buku_model->buku($id_buku);
		$data = array(
				'title'	  	=> $buku->judul_buku,
				'buku'    	=> $buku,
				'file_buku'	=> $file_buku,
				'isi'	  => 'katalog/detail');
		$this->load->view('layout/wrapper',$data,FALSE);
	}

	//fungsi baca
	public function baca($id_file_buku)
	{
		$file_buku  = $this->file_buku_model->detail($id_file_buku);
		$id_buku    = $file_buku->id_buku;
		$buku    	= $this->buku_model->read($id_buku);
		$data = array(
				'title'	  	=> 'Baca:'.$buku->judul_buku.'-'.$file_buku->judul_file,
				'buku'    	=> $buku,
				'file_buku'	=> $file_buku,
				'isi'	  => 'katalog/baca');
		$this->load->view('layout/wrapper',$data,FALSE);
	}

}

/* End of file Katalog.php */
/* Location: ./application/controllers/Katalog.php */