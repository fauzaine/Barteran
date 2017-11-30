<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori_posting_model extends CI_Model{
	public function __construct(){
		$this->load->database();

	}
//LISTING
	public function listing(){
		$query=$this->db->get('kategori_posting');
		return $query->result();

	}

// Detail
public function detail($id_kategori_posting){
	$query = $this->db->get_where('kategori_posting',array('id_kategori_posting' => $id_kategori_posting));
	return $query->row();
}

// Tambah 
public function tambah($data){
	$this->db->insert('kategori_posting',$data);
}

// Edit
public function edit($data){
	$this->db->where('id_kategori_posting',$data['id_kategori_posting']);
	$this->db->update('kategori_posting',$data);
}

// Delete
public function delete($data){
	$this->db->delete('kategori_posting',$data);
}
}
