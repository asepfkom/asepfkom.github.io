<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('anggota_model');
		}	

	//Halaman Utama
	public function index()
	{
		$anggota = $this->anggota_model->listing();
		$data 	 = array(
			'title' 	=> 'Data Anggota('.count($anggota).')',
			'anggota'   => $anggota,
			'isi' 		=> 'admin/anggota/list');
		$this->load->view('admin/layout/wrapper',$data, FALSE);
	}

	//export to excel
	public function export_toexcel()
	{

		include APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('My Notes Code')
	                 ->setLastModifiedBy('My Notes Code')
	                 ->setTitle("Data Anggota")
	                 ->setSubject("Anggota")
	                 ->setDescription("Laporan Semua Data Anggota")
	                 ->setKeywords("Data Anggota");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ANGOTA"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Email"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Telepon"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Username"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Status"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Instansi"); // Set kolom E3 dengan tulisan "ALAMAT"
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $anggota = $this->anggota_model->listing();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($anggota as $anggota){ // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $anggota->nama_anggota);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $anggota->email);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $anggota->telepon);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $anggota->username);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $anggota->status_anggota);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $anggota->instansi);

	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Laporan Data Usulan");
	    $excel->setActiveSheetIndex(0);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    $write->save('php://output');
	}

	//Halaman Tambah
	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array(
				'required'    => 'Nama harus di isi'));
		$valid->set_rules('email','Email','required|valid_email',
			array(
				'required'    => 'Email harus di isi',
				'valid_email' => 'Format email tidak benar'));
		$valid->set_rules('username','Username','required|is_unique[anggota.username]',
			array(
				'required'    => 'Username harus di isi',
				'is_unique'   => 'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru '));
		$valid->set_rules('password','Password','required|min_length[6]',
			array(
				'required'    => 'Password harus di isi',
				'min_length'  => 'Password minimal 6 karakter'));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Tambah Anggota',
				'isi'   	=> 'admin/anggota/tambah' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			$data = array(
				'id_user' 	     => $this->session->userdata('id_user'),
				'status_anggota' => $i->post('status_anggota'),
				'nama_anggota'   => $i->post('nama_anggota'),
				'email' 	     => $i->post('email'),
				'telepon' 	     => $i->post('telepon'),
				'instansi'     => $i->post('instansi'),
				'username'       => $i->post('username'),
				'password'       => sha1($i->post('password'))
			);
			$this->anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/anggota'),'refresh');
		}
		//end masuk database	
	}

	//Halaman Edit
	public function edit($id_anggota)
	{
		$anggota = $this->anggota_model->detail($id_anggota);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota','Nama','required',
			array(
				'required'    => 'Nama harus di isi'));
		$valid->set_rules('email','Email','required|valid_email',
			array(
				'required'    => 'Email harus di isi',
				'valid_email' => 'Format email tidak benar'));

		if($valid->run()=== FALSE) {
		//end validation

		$data = array(
				'title' 	=> 'Edit Anggota: '.$anggota->nama_anggota,
				'anggota'   => $anggota,
				'isi'   	=> 'admin/anggota/edit' );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Nggak ada error, maka masuk database
		}else {
			$i = $this->input;
			//jika input password lebih dari 6 karakter
			if(strlen($i->post('password'))>6)
			{
				$data = array(
					'id_anggota'     => $id_anggota,
					'id_user' 	     => $this->session->userdata('id_user'),
					'status_anggota' => $i->post('status_anggota'),
					'nama_anggota'   => $i->post('nama_anggota'),
					'email' 	     => $i->post('email'),
					'telepon' 	     => $i->post('telepon'),
					'instansi'       => $i->post('instansi'),
					'password'       => sha1($i->post('password'))
					);
			}else{
				$data = array(
					'id_anggota'     => $id_anggota,
					'id_user' 	     => $this->session->userdata('id_user'),
					'status_anggota' => $i->post('status_anggota'),
					'nama_anggota'   => $i->post('nama_anggota'),
					'email' 	     => $i->post('email'),
					'telepon' 	     => $i->post('telepon'),
					'instansi'       => $i->post('instansi')
					);	
			}
			//end if
			$this->anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/anggota'),'refresh');
		}
		//end masuk database	
	}

	//delete
	public function delete($id_anggota)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		$data = array('id_anggota' => $id_anggota);
		$this->anggota_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/anggota'),'refresh');
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/admin/Anggota.php */