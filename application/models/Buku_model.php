<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,user.nama');
		$this->db->from('buku');
		//join 4 table
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_bahasa','LEFT');
		//end join
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//buku
	public function buku()
	{
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,user.nama');
		$this->db->from('buku');
		//join 4 table
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_bahasa','LEFT');
		//end join
		//where hanya yang publish yang tampil untuk umum
		$this->db->where('buku.status_buku','Publish');
		$this->db->order_by('id_buku','DESC');
		//dibatasi limit
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	//buku baru
	public function baru()
	{
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,user.nama');
		$this->db->from('buku');
		//join 4 table
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_bahasa','LEFT');
		//end join
		//where hanya yang publish yang tampil untuk umum
		$this->db->where('buku.status_buku','Publish');
		$this->db->order_by('id_buku','DESC');
		//dibatasi limit
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	//cari buku
	public function cari($keywords)
	{
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,user.nama');
		$this->db->from('buku');
		//join 4 table
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_bahasa','LEFT');
		//end join
		//where hanya yang publish yang tampil untuk umum
		$this->db->where('buku.status_buku','Publish');
		//like
		$this->db->like('buku.judul_buku',$keywords);
		$this->db->order_by('id_buku','DESC');
		//dibatasi limit
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	//detail buku
	public function read($id_buku)
	{
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,user.nama');
		$this->db->from('buku');
		//join 4 table
		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_bahasa','LEFT');
		//end join
		//where hanya yang publish yang tampil untuk umum
		$this->db->where('buku.status_buku','Publish');
		$this->db->where('id_buku',$id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Detail
	public function detail($id_buku)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku',$id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//login
	public function login($bukuname, $password)
	{
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where(array(
			'bukuname' => $bukuname,
			'password' => sha1($password)));
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('buku',$data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->update('buku',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->delete('buku',$data);
	}
}

/* End of file buku_model.php */
/* Location: ./application/models/buku_model.php */