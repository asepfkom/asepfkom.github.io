<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('buku_model');
			$this->load->model('jenis_model');
			$this->load->model('bahasa_model');
			$this->load->model('file_buku_model');
		}	

	//Halaman Utama
	public function index()
	{
		$buku = $this->buku_model->listing();
		$data = array(
			'title' => 'Data Buku('.count($buku).')',
			'buku'  => $buku,
			'isi' 	=> 'admin/buku/list');
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}

	//Halaman Tambah
	public function tambah()
	{
		$jenis = $this->jenis_model->listing();
		$bahasa = $this->bahasa_model->listing();

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_buku','Judul Buku','required',
			array(
				'required'  => 'Judul Buku harus di isi'));
		$valid->set_rules('penulis_buku','Penulis Buku','required',
			array(
				'required'  => 'Penulis Buku harus di isi'));

		if($valid->run()) {
			//kalau cover diupload/tidak kosong
			if (!empty($_FILES['cover_buku']['name'])) {
			
			$config['upload_path'] 	 = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']  	 = '12000';//kb
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('cover_buku')){
		//end validation

		$data = array(
				'title' 	=> 'Tambah Buku',
				'jenis'     => $jenis,
				'bahasa' 	=> $bahasa,
				'error'		=> $this->upload->display_errors(),
				'isi'   	=> 'admin/buku/tambah' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			//upload
			$upload_data     		  = array('uploads' => $this->upload->data());
			//image editor
			$config['image_library']  = 'gd2';
			$config['source_image']   = './assets/upload/image/'.$upload_data['uploads']['file_name'];
			$config['new_image'] 	  = './assets/upload/image/thumbs/';
			$config['create_thumb']   = TRUE;
			$config['quality'] 		  = "100%";
			$config['maintain_ratio'] = TRUE;
			$config['width'] 		  = 360;//pixel
			$config['height'] 		  = 360;//pixel
			$config['x_axis'] 		  = 0;
			$config['y_axis']  		  = 0;
			$config['thumb_marker']   = '';
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();

			$i = $this->input;
			$data = array(
				'id_user'		=> $this->session->userdata('id_user'),
				'id_jenis' 		=> $i->post('id_jenis'),
				'id_bahasa' 	=> $i->post('id_bahasa'),
				'judul_buku' 	=> $i->post('judul_buku'),
				'penulis_buku' 	=> $i->post('penulis_buku'),
				'subjek_buku' 	=> $i->post('subjek_buku'),
				'letak_buku' 	=> $i->post('letak_buku'),
				'kode_buku' 	=> $i->post('kode_buku'),
				'kolasi' 		=> $i->post('kolasi'),
				'penerbit' 		=> $i->post('penerbit'),
				'tahun_terbit'	=> $i->post('tahun_terbit'),
				'nomor_seri' 	=> $i->post('nomor_seri'),
				'status_buku' 	=> $i->post('status_buku'),
				'ringkasan' 	=> $i->post('ringkasan'),
				'cover_buku' 	=> $upload_data['uploads']['file_name'],
				'jumlah_buku' 	=> $i->post('jumlah_buku'),
				'tanggal_entri' => date('Y-m-d H:i:s')
			);
			$this->buku_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/buku'),'refresh');
		}}else{
			//script masukan data buku tanpa upload cover
			$i = $this->input;
			$data = array(
				'id_user'		=> $this->session->userdata('id_user'),
				'id_jenis' 		=> $i->post('id_jenis'),
				'id_bahasa' 	=> $i->post('id_bahasa'),
				'judul_buku' 	=> $i->post('judul_buku'),
				'penulis_buku' 	=> $i->post('penulis_buku'),
				'subjek_buku' 	=> $i->post('subjek_buku'),
				'letak_buku' 	=> $i->post('letak_buku'),
				'kode_buku' 	=> $i->post('kode_buku'),
				'kolasi' 		=> $i->post('kolasi'),
				'penerbit' 		=> $i->post('penerbit'),
				'tahun_terbit'	=> $i->post('tahun_terbit'),
				'nomor_seri' 	=> $i->post('nomor_seri'),
				'status_buku' 	=> $i->post('status_buku'),
				'ringkasan' 	=> $i->post('ringkasan'),
				'jumlah_buku' 	=> $i->post('jumlah_buku'),
				'tanggal_entri' => date('Y-m-d H:i:s')
			);
			$this->buku_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/buku'),'refresh');
		}}
		//end masuk database
		$data = array(
				'title' 	=> 'Tambah Buku',
				'jenis'     => $jenis,
				'bahasa' 	=> $bahasa,
				'isi'   	=> 'admin/buku/tambah' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	//Halaman Edit
	public function edit($id_buku)
	{
		$buku   = $this->buku_model->detail($id_buku); 
		$jenis  = $this->jenis_model->listing();
		$bahasa = $this->bahasa_model->listing();

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_buku','Judul Buku','required',
			array(
				'required'  => 'Judul Buku harus di isi'));
		$valid->set_rules('penulis_buku','Penulis Buku','required',
			array(
				'required'  => 'Penulis Buku harus di isi'));

		if($valid->run()) {
			//kalau cover diupload/tidak kosong
			if (!empty($_FILES['cover_buku']['name'])) {
			
			$config['upload_path'] 	 = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']  	 = '12000';//kb
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('cover_buku')){
		//end validation

		$data = array(
				'title' 	=> 'Edit Buku'.$buku->judul_buku,
				'buku'		=> $buku,
				'jenis'     => $jenis,
				'bahasa' 	=> $bahasa,
				'error'		=> $this->upload->display_errors(),
				'isi'   	=> 'admin/buku/edit' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			//upload
			$upload_data     		  = array('uploads' => $this->upload->data());
			//image editor
			$config['image_library']  = 'gd2';
			$config['source_image']   = './assets/upload/image/'.$upload_data['uploads']['file_name'];
			$config['new_image'] 	  = './assets/upload/image/thumbs/';
			$config['create_thumb']   = TRUE;
			$config['quality'] 		  = "100%";
			$config['maintain_ratio'] = TRUE;
			$config['width'] 		  = 360;//pixel
			$config['height'] 		  = 360;//pixel
			$config['x_axis'] 		  = 0;
			$config['y_axis']  		  = 0;
			$config['thumb_marker']   = '';
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();

			//jika upload cover buku, maka file cover buku lama harus dihapus
			if ($buku->cover_buku !="") {
				unlink('./assets/upload/image/'.$buku->cover_buku);
				unlink('./assets/upload/image/thumbs/'.$buku->cover_buku);
			}
			//end upload dan end hapus

			$i = $this->input;
			$data = array(
				'id_buku'		=> $id_buku,
				'id_user'		=> $this->session->userdata('id_user'),
				'id_jenis' 		=> $i->post('id_jenis'),
				'id_bahasa' 	=> $i->post('id_bahasa'),
				'judul_buku' 	=> $i->post('judul_buku'),
				'penulis_buku' 	=> $i->post('penulis_buku'),
				'subjek_buku' 	=> $i->post('subjek_buku'),
				'letak_buku' 	=> $i->post('letak_buku'),
				'kode_buku' 	=> $i->post('kode_buku'),
				'kolasi' 		=> $i->post('kolasi'),
				'penerbit' 		=> $i->post('penerbit'),
				'tahun_terbit'	=> $i->post('tahun_terbit'),
				'nomor_seri' 	=> $i->post('nomor_seri'),
				'status_buku' 	=> $i->post('status_buku'),
				'ringkasan' 	=> $i->post('ringkasan'),
				'cover_buku' 	=> $upload_data['uploads']['file_name'],
				'jumlah_buku' 	=> $i->post('jumlah_buku')
			);
			$this->buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/buku'),'refresh');
		}}else{
			//script masukan data buku tanpa upload cover
			$i = $this->input;
			$data = array(
				'id_buku'		=> $id_buku,
				'id_user'		=> $this->session->userdata('id_user'),
				'id_jenis' 		=> $i->post('id_jenis'),
				'id_bahasa' 	=> $i->post('id_bahasa'),
				'judul_buku' 	=> $i->post('judul_buku'),
				'penulis_buku' 	=> $i->post('penulis_buku'),
				'subjek_buku' 	=> $i->post('subjek_buku'),
				'letak_buku' 	=> $i->post('letak_buku'),
				'kode_buku' 	=> $i->post('kode_buku'),
				'kolasi' 		=> $i->post('kolasi'),
				'penerbit' 		=> $i->post('penerbit'),
				'tahun_terbit'	=> $i->post('tahun_terbit'),
				'nomor_seri' 	=> $i->post('nomor_seri'),
				'status_buku' 	=> $i->post('status_buku'),
				'ringkasan' 	=> $i->post('ringkasan'),
				'jumlah_buku' 	=> $i->post('jumlah_buku')
			);
			$this->buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/buku'),'refresh');
		}}
		//end masuk database
		$data = array(
				'title' 	=> 'Edit Buku'.$buku->judul_buku,
				'buku'		=> $buku,
				'jenis'     => $jenis,
				'bahasa' 	=> $bahasa,
				'isi'   	=> 'admin/buku/edit' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

	//delete
	public function delete($id_buku)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		//end proteksi
		
		//delete gambar
		$buku = $this->buku_model->detail($id_buku);

		if ($buku->cover_buku != "") {
			unlink('./assets/upload/image/'.$buku->cover_buku);
			unlink('./assets/upload/image/thumbs/'.$buku->cover_buku);
		}
		//end delete
		$data = array('id_buku' => $id_buku);
		$this->buku_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/buku'),'refresh');
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/admin/Buku.php */