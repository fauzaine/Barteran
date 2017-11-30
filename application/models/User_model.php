<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
	public function __construct(){
		$this->load->database();

	}
//LISTING
	public function listing(){
		$query=$this->db->get('users');
		return $query->result();

	}

// Detail
public function detail($id_user){
	$query = $this->db->get_where('users',array('id_user' => $id_user));
	return $query->row();
}

// Tambah 
public function tambah($data){
	$this->db->insert('users',$data);
}

// Edit
public function edit($data){
	$this->db->where('id_user',$data['id_user']);
	$this->db->update('users',$data);
}

// Delete
public function delete($data){
	$this->db->delete('users',$data);

}

// User
public function cek_user($login) {
            $query = $this->db->get_where('users', $login);
            return $query;
        }

// Read
public function read($id_user){
	$query = $this->db->get_where('users',array('id_user' => $id_user));
	return $query->row();
}
}
