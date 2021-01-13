<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

	
	//load model
	public function __construct()
		{
			parent::__construct();
			$this->load->model('usulan_model');
		}	

	//Halaman Utama
	public function index()
	{
		$usulan = $this->usulan_model->listing();
		$data = array(
			'title' => 'Data Usulan('.count($usulan).')',
			'usulan'  => $usulan,
			'isi' 	=> 'admin/usulan/list');
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
	                 ->setTitle("Data Usulan")
	                 ->setSubject("Usulan")
	                 ->setDescription("Laporan Semua Data Usulan")
	                 ->setKeywords("Data Usulan");
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
	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA USULAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Pengusul"); // Set kolom B3 dengan tulisan "Nama Pengusul"
	    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Email Pengusul"); // Set kolom C3 dengan tulisan "Email Pengusul"
	    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Judul Usulan"); // Set kolom D3 dengan tulisan "Judul Usulan"
	    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Keterangan"); // Set kolom E3 dengan tulisan "Keterangan"
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $usulan = $this->usulan_model->listing();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($usulan as $usulan){ // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $usulan->nama_pengusul);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $usulan->email_pengusul);
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $usulan->judul);
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $usulan->keterangan);
	      
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

	//tambah
	public function tambah()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul','Judul','required|min_length[15]',
			array( 
				'required'   =>'%s harus di isi',
				'min_length' => '%s minimal 15 karakter'));
		$valid->set_rules('penulis','Penulis','required|min_length[6]',
			array(
				'required'   => '%s harus di isi',
				'min_length' => '%s minimal 6 karakter'));
		$valid->set_rules('penerbit','Penerbit','required|min_length[10]',
			array( 
				'required'   =>'%s harus di isi',
				'min_length' => '%s minimal 10 karakter'));
		$valid->set_rules('nama_pengusul','Nama pengusul','required|min_length[6]',
			array(
				'required'   => '%s harus di isi',
				'min_length' => '%s minimal 6 karakter'));
		$valid->set_rules('email_pengusul','Email','required|valid_email',
			array( 
				'required'   =>'%s harus di isi',
				'valid_email' => '%s tidak valid'));
		if ($valid->run()==FALSE) {
			//end validasi

		$data = array (
				'title'   =>  'Buat Usulan Buku Baru',
				'isi'	  =>  'admin/usulan/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else {
			$i = $this->input;
			$data = array(
				'judul'       	 => $i->post('judul'),
				'penulis' 	 	 => $i->post('penulis'),
				'penerbit'   	 => $i->post('penerbit'),
				'keterangan'     => $i->post('keterangan'),
				'nama_pengusul'  => $i->post('nama_pengusul'),
				'email_pengusul' => $i->post('email_pengusul'),
				'ip_address' 	 => $this->input->ip_address(),
				'status_usulan'  => $i->post('status_usulan'),
				'tanggal_usulan' => date('Y-m-d H:i:s')
			);
			$this->usulan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Terimakasih, Usulan anda telah kami terima. Kami akan segera melengkapi buku sesuai usualan anda  ');
			redirect(base_url('admin/usulan'),'refresh');

		}
		//end masuk database
	} 

	//edit
	public function edit($id_usulan)
	{
		$usulan = $this->usulan_model->detail($id_usulan);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul','Judul','required|min_length[15]',
			array( 
				'required'   =>'%s harus di isi',
				'min_length' => '%s minimal 15 karakter'));
		$valid->set_rules('penulis','Penulis','required|min_length[6]',
			array(
				'required'   => '%s harus di isi',
				'min_length' => '%s minimal 6 karakter'));
		$valid->set_rules('penerbit','Penerbit','required|min_length[10]',
			array( 
				'required'   =>'%s harus di isi',
				'min_length' => '%s minimal 10 karakter'));
		$valid->set_rules('nama_pengusul','Nama pengusul','required|min_length[6]',
			array(
				'required'   => '%s harus di isi',
				'min_length' => '%s minimal 6 karakter'));
		$valid->set_rules('email_pengusul','Email','required|valid_email',
			array( 
				'required'   =>'%s harus di isi',
				'valid_email' => '%s tidak valid'));
		if ($valid->run()==FALSE) {
			//end validasi

		$data = array (
				'title'   =>  'Edit Usulan Buku Baru',
				'usulan'  => $usulan,
				'isi'	  =>  'admin/usulan/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else {
			$i = $this->input;
			$data = array(
				'id_usulan'		 => $id_usulan,
				'judul'       	 => $i->post('judul'),
				'penulis' 	 	 => $i->post('penulis'),
				'penerbit'   	 => $i->post('penerbit'),
				'keterangan'     => $i->post('keterangan'),
				'nama_pengusul'  => $i->post('nama_pengusul'),
				'email_pengusul' => $i->post('email_pengusul'),
				'ip_address' 	 => $this->input->ip_address(),
				'status_usulan'  => $i->post('status_usulan'),
				'tanggal_usulan' => date('Y-m-d H:i:s')
			);
			$this->usulan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data usulan di update  ');
			redirect(base_url('admin/usulan'),'refresh');

		}
		//end masuk database
	} 

	//delete
	public function delete($id_usulan)
	{
		//proteksi hapus disini
		if($this->session->userdata('username')=="" && $this->session->userdata('akses_level')=="") 
		{
			$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
			redirect(base_url('login'),'refresh');
		}
		$data = array('id_usulan' => $id_usulan);
		$this->usulan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/usulan'),'refresh');
	}

}

/* End of file Usulan.php */
/* Location: ./application/controllers/admin/Usulan.php */