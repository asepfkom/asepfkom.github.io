<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$data = array(
				  'title'  		=> 'Menghubungi'.$konfigurasi->namaweb,
				  'konfigurasi' => $konfigurasi,
				  'isi'	   		=> 'kontak/list'
			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */