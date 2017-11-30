<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_posting extends CI_Controller{
	
	//Load database
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('akses_level')!="member") {
			redirect('error');
		}
		$this->load->model('kategori_posting_model');

	}
// Index
	public function index(){
		$kategori_posting 	= $this->kategori_posting_model->listing();
		$data = array (	'title' 				=> 'Data Kategori Posting',
						'kategori_posting'		=> $kategori_posting,
						'isi'					=> 'member/kategori_posting/list');
		$this->load->view('member/layout/wrapper',$data);
		// End masuk database
	}
	public function tambah(){

// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_kategori_posting','Nama kategori posting','required|is_unique[kategori_posting.nama_kategori_posting]',
			array(	'required'	=> 'Kategori harus diisi',
					'is_unique'	=> 'Oops... Kategori: <strong>'.
									$this->input->post('nama_kategori_posting').
									'</strong> sudah ada. Buat kategori baru'));
if($valid->run() === FALSE) {
// End validasi

		$data = array (	'title' 				=> 'Data Kategori Posting',
						'isi'					=> 'member/kategori_posting/tambah');
		$this->load->view('member/layout/wrapper',$data);
// Masuk database
	}else{
$i = $this->input;
$slug = url_title($this->input->post('nama_kategori_posting'),'dash',TRUE);
$data = array (		'nama_kategori_posting'		=> $i->post('nama_kategori_posting'),
					'slug_kategori_posting'		=> $slug,
					'urutan'					=> $i->post('urutan'),
					'keterangan'				=> $i->post('keterangan'));

	$this->kategori_posting_model->tambah($data);
	$this->session->set_flashdata('sukses','Data kategori telah ditambah');
		redirect(base_url('member/Kategori_posting'));
}
		// End masuk database
	}

// Edit
public function edit($id_kategori_posting){
	
	$kategori_posting 	= $this->kategori_posting_model->detail($id_kategori_posting);

// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_kategori_posting','Nama kategori posting','required',
			array(	'required'	=> 'Kategori harus diisi'));
					
if($valid->run() === FALSE) {
		// End validasi

		$data = array (	'title' 				=> 'Edit Kategori Posting',
						'kategori_posting'		=> $kategori_posting,
						'isi'					=> 'member/kategori_posting/edit');
		$this->load->view('member/layout/wrapper',$data);
// Masuk database
	}else{
$i = $this->input;

$data = array (		'id_kategori_posting'		=> $id_kategori_posting,
					'nama_kategori_posting' 	=> $i->post('nama_kategori_posting'),
					'urutan'					=> $i->post('urutan'),
					'keterangan'				=> $i->post('keterangan'));

	$this->kategori_posting_model->edit($data);
	$this->session->set_flashdata('sukses','Data kategori telah diedit');
		redirect(base_url('member/kategori_posting'));
}
		// End masuk database

}

// Delete
public function delete($id_kategori_posting){
	$data = array('id_kategori_posting' => $id_kategori_posting);
	$this->kategori_posting_model->delete($data);
	$this->session->set_flashdata('sukses','Data kategori posting telah dihapus');
	redirect(base_url('member/kategori_posting'));
}
}