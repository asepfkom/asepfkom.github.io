<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//baner/slider
	public function slider()
	{
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array(
						'jenis_berita' => 'Slider',
						'status_berita'	   => 'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slider
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	//berita
	public function berita()
	{
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array(
						'jenis_berita' => 'Berita',
						'status_berita'	   => 'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slider
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	//berita lain
	public function berita_lain()
	{
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array(
						'status_berita'	   => 'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slider
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	//read
	public function read($slug_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		//where slider
		$this->db->where(array(
						'slug_berita'	=> $slug_berita,
						'status_berita'	=> 'Publish'));
		$this->db->order_by('id_berita','DESC');
		//batasi 5 slider
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	//Detail
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('berita',$data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}
}

/* End of file berita_model.php */
/* Location: ./application/models/berita_model.php */