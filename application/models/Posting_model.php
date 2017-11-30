<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Posting_model extends CI_Model{
	public function __construct(){
		$this->load->database();

	}


// Posting Home
	public function posting_home(){
		$this->db->select('posting.*,kategori_posting.nama_kategori_posting,users.nama');
		$this->db->from('posting');
		// Relasi users dan kategori
		$this->db->join('kategori_posting','kategori_posting.id_kategori_posting = posting.id_kategori_posting','LEFT');
		$this->db->join('users','users.id_user = posting.id_user','LEFT');
		// End Relasi
		
		$this->db->order_by('id_posting','DESC');
	
		$query=$this->db->get();
		return $query->result();

	}

	// Posting Home
	public function posting_home1(){
		$this->db->select('posting.*,kategori_posting.nama_kategori_posting,users.nama');
		
		// Relasi users dan kategori
		$this->db->join('kategori_posting','kategori_posting.id_kategori_posting = posting.id_kategori_posting','LEFT');
		$this->db->join('users','users.id_user = posting.id_user','LEFT');
		// End Relasi
		$query = $this->db->get_where('posting',array('posting.id_user' => $this->session->userdata('id_user')));
		return $query->result();

	}



//LISTING
	public function listing(){
		$this->db->select('posting.*,kategori_posting.nama_kategori_posting,users.nama');
		$this->db->from('posting');
		// Relasi users dan kategori
		$this->db->join('kategori_posting','kategori_posting.id_kategori_posting = posting.id_kategori_posting','LEFT');
		$this->db->join('users','users.id_user = posting.id_user','LEFT');
		// End Relasi
		$this->db->order_by('id_posting','DESC');
		$query=$this->db->get();
		return $query->result();

	}





// Detail
public function detail($id_posting){
	$query = $this->db->get_where('posting',array('id_posting' => $id_posting));
	return $query->row();
}

// Akhir
public function akhir(){
	$query = $this->db->query('SELECT * from posting ORDER BY id_posting DESC');
	return $query->row();


}

// Tambah 
public function tambah($data){
	$this->db->insert('posting',$data);
}

// Edit
public function edit($data){
	$this->db->where('id_posting',$data['id_posting']);
	$this->db->update('posting',$data);
}

// Delete
public function delete($data){
	$this->db->delete('posting',$data);
}

//Read
public function read($slug_posting){
	$this->db->select('posting.*,kategori_posting.nama_kategori_posting,users.nama');
		
		// Relasi users dan kategori
		$this->db->join('kategori_posting','kategori_posting.id_kategori_posting = posting.id_kategori_posting','LEFT');
		$this->db->join('users','users.id_user = posting.id_user','LEFT');
	$query = $this->db->get_where('posting',array('slug_posting' => $slug_posting
												 ));
	return $query->row();
}

//Search berdasarkan kategori
    public function search_kategori($id){
    return $this->db->query("select * from posting where id_kategori_posting=$id")->result();
    }

//search button cari
    public function search()
        {
        	
            $d =  $this->input->post('cari');
            $e =  $this->input->post('nama_kategori_posting');
            return $this->db->query("select * from posting where judul like '%$d%' and id_kategori_posting like '%$e%'  ")->result();
        }


}
