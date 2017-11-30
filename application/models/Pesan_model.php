<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pesan_model extends CI_Model{
	public function __construct(){
		$this->load->database();

	}
//LISTING
	public function listing(){
		$this->db->select('pesan.*,posting.*');
		$this->db->from('pesan');
		// Relasi users dan kategori
		$this->db->join('posting','posting.id_posting = pesan.id_posting','LEFT');		
		// End Relasi
		$this->db->order_by('id_pesan','DESC');
		$query=$this->db->get();
		return $query->result();

	}
		public function listing_user(){
		$this->db->select('pesan.*,posting.*');
		
		// Relasi users dan kategori
		$this->db->join('posting','posting.id_posting = pesan.id_posting','LEFT');		
		// End Relasi
		$this->db->order_by('id_pesan','DESC');
		$query = $this->db->get_where('pesan',array('to' => $this->session->userdata('id_user')));
	return $query->result();

	}

// Detail
public function detail($id_pesan){
	$this->db->select('pesan.*,users.nama');
		
		// Relasi users dan kategori
		$this->db->join('users','users.id_user = pesan.from','LEFT');
	$query = $this->db->get_where('pesan',array('id_pesan' => $id_pesan));
	return $query->row();
}

// Akhir
public function akhir(){
	$query = $this->db->query('SELECT * from pesan ORDER BY id_pesan
	 DESC');
	return $query->row();


}

//Tambah 
public function tambah($data){
	$this->db->insert('pesan',$data);
}

//Read
public function read($id_pesan){
	$this->db->select('pesan.*,users.*');
		
		// Relasi users dan kategori
		$this->db->join('users','users.id_user = pesan.from','LEFT');
		// End Relasi
	$query = $this->db->get_where('pesan',array('id_pesan' => $id_pesan));
	return $query->row();
}



// Edit
//public function edit($data){
//	$this->db->where('id_posting',$data['id_posting']);
//	$this->db->update('posting',$data);
//}

// Delete
public function delete($data){
	$this->db->delete('pesan',$data);
}
}
