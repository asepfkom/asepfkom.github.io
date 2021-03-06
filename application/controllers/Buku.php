<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('file_buku_model');
	}

	//list buku terbaru
	public function index()
	{
		$buku = $this->buku_model->baru();
		$data = array( 
			'title'  =>  'Koleksi Buku Baru',
			'buku'	 =>  $buku,
			'isi'	 =>  'buku/list'
	);
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */