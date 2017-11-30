<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
    if ($this->session->userdata('akses_level')!="Admin") {
      redirect('error');
    }
		$this->load->model('pesan_model'); 
    $this->load->model('posting_model'); 
    $this->load->model('kategori_posting_model'); 
	}

  // Index
  public function index(){
  $posting = $this->posting_model->listing();
  $pesan = $this->pesan_model->listing();
  $kategori =$this->kategori_posting_model->listing();
	$data = array ( 'title'          => 'Data Penawaran',
					       'posting'	       => $posting,
                 'pesan'            =>$pesan,
                 'kategori'        =>$kategori,
                  
        	        'isi'            => 'admin/pesan/list');
    $this->load->view('admin/layout/wrapper',$data);
	}

  public function tambah($id_posting){
    $posting   = $this->posting_model->detail($id_posting);
    $kategori = $this->kategori_posting_model->listing();
    // Validasi
    $v = $this->form_validation;
    $v->set_rules('nama_barang','Nama Barang','required',
          array(   'required'  => 'Nama barang harus diisi'));

    $v->set_rules('deskripsi','Deskripsi serta alamat dan kontak','required',
        array(   'required'  => 'Deskirpsi harus disi'));

    if($v->run()) {
      
      $config['upload_path']    = './assets/upload/image/';
      $config['allowed_types']  = 'gif|jpg|png|svg';
      $config['max_size']     = '12000'; // KB  
    $this->load->library('upload', $config);
    if(! $this->upload->do_upload('gambar')) {

    $data = array ( 'title'    => 'Lakukan Penawaran Barter',
                  'posting' =>  $posting,
                  'error'    =>  $this->upload->display_errors(),
                  'isi'      => 'admin/pesan/tambah');
      $this->load->view('admin/layout/wrapper',$data);

// Masuk database
    }else{
        $upload_data                = array('uploads' =>$this->upload->data());
        // Image Editor
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name'];
        $config['new_image']        = './assets/upload/image/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['quality']          = "100%";
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 360; // Pixel
        $config['height']           = 360; // Pixel
        $config['x_axis']           = 0;
        $config['y_axis']           = 0;
        $config['thumb_marker']     = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
      $i          = $this->input;
      $data       = array(  'nama_barang1'            => $i->post('nama_barang'),
                            'deskripsi'              => $i->post('deskripsi'),
                            'id_posting'             => $posting->id_posting,
                            'gambar1'                 => $upload_data['uploads']['file_name'],
                            'to'                     => $posting->id_user);
                           


      $this->pesan_model->tambah($data);
      $this->session->set_flashdata('sukses','Berhasil melakukan penawaran');
      redirect(base_url('admin/posting'));
    }}
    // End masuk database

  $data = array ( 'title'    => 'Lakukan Penawaran Barter',
                  'posting' =>  $posting,
                  'isi'      => 'admin/pesan/tambah');
    $this->load->view('admin/layout/wrapper',$data);
  }
public function read($id_pesan){
  $pesan = $this->pesan_model->read($id_pesan);
  $kategori = $this->kategori_posting_model->listing();
  $data = array ( 'title'    => $pesan->nama_barang1,
                  'pesan' =>  $pesan,
                  'kategori' =>  $kategori,
                  'isi'      => 'admin/pesan/detail');
    $this->load->view('admin/layout/wrapper',$data);
}
// Delete
  public function delete($id_pesan){
    $pesan  = $this->pesan_model->detail($id_pesan);
// Hapus gambar
if($pesan->gambar!= ""){
  unlink('./assets/upload/image/'.$pesan->gambar);
  unlink('./assets/upload/image/thumbs/'.$pesan->gambar);
}
// End hapus gambar
    $data   = array('id_pesan'  => $id_pesan);
    $this->pesan_model->delete($data);
    $this->session->set_flashdata('sukses','Penawaran telah dihapus');
    redirect(base_url('admin/pesan'));
}
}