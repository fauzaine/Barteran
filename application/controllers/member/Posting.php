<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
    if ($this->session->userdata('akses_level')!="User") {
      redirect('error');
    }
		$this->load->model('posting_model'); 
    $this->load->model('kategori_posting_model'); 

	}

  // Index
  public function index(){
  $kategori_posting = $this->kategori_posting_model->listing();
  $posting = $this->posting_model->listing();
	$data = array ( 'title'          => 'Data Posting',
					     'posting'	         => $posting,
               'kategori_posting'   => $kategori_posting,
        	        'isi'            => 'member/dasbor/posting/list');
    $this->load->view('member/layout/wrapper',$data);
	}


    // List_Posting
  public function list_posting(){
  $kategori_posting = $this->kategori_posting_model->listing();
  $posting = $this->posting_model->posting_home1();
  $data = array ( 'title'          => 'Data Posting',
               'posting'           => $posting,
               'kategori_posting'   => $kategori_posting,
                  'isi'            => 'member/dasbor/posting/list');
    $this->load->view('member/layout/wrapper',$data);
  }


  // Tambah
  public function tambah(){
    $kategori = $this->kategori_posting_model->listing();
    $akhir    = $this->posting_model->akhir();

    // Validasi
    $v = $this->form_validation;
    $v->set_rules('judul','Judul','required',
          array(   'required'  => 'Judul harus diisi'));

    $v->set_rules('isi','Isi','required',
        array(   'required'  => 'Isi harus diisi'));

    if($v->run()) {
      
      $config['upload_path']    = './assets/upload/image/';
      $config['allowed_types']  = 'gif|jpg|png|svg';
      $config['max_size']     = '12000'; // KB  
    $this->load->library('upload', $config);
    if(! $this->upload->do_upload('gambar')) {

    $data = array ( 'title'    => 'Tambah Posting',
                  'kategori' =>  $kategori,
                  'error'    =>  $this->upload->display_errors(),
                  'isi'      => 'member/dasbor/posting/tambah');
      $this->load->view('member/layout/wrapper',$data);

// Masuk database
    }else{
        $upload_data                 = array('uploads' =>$this->upload->data());
        // Image Editor
        $config['image_library']     = 'gd2';
        $config['source_image']      = './assets/upload/image/'.$upload_data['uploads']['file_name'];
        $config['new_image']          = './assets/upload/image/thumbs/';
        $config['create_thumb']      = TRUE;
        $config['quality']           = "100%";
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 360; // Pixel
        $config['height']           = 360; // Pixel
        $config['x_axis']           = 0;
        $config['y_axis']           = 0;
        $config['thumb_marker']     = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
      $i          = $this->input;
      $url_akhir  = $akhir->id_posting+1;
      $slug       = $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
      $data       = array(  'slug_posting'           => $slug,
                            'judul'                  => $i->post('judul'),
                            'id_kategori_posting'    => $i->post('id_kategori_posting'),
                            'isi'                    => $i->post('isi'),
                            'gambar'                 => $upload_data['uploads']['file_name'],
                            'id_user'                => $this->session->userdata('id_user'),
                            'kota'                   => $i->post('kota'),
                            'status_posting'         => $i->post('status_posting'));
                           


      $this->posting_model->tambah($data);
      $this->session->set_flashdata('sukses','Berhasil di Posting');
      redirect(base_url('member/dasbor'));
    }}
    // End masuk database

  $data = array ( 'title'    => 'Tambah Posting',
                  'kategori' =>  $kategori,
                  'isi'      => 'member/dasbor/posting/tambah');
    $this->load->view('member/layout/wrapper',$data);
  }

  // Edit
public function edit($id_posting){
  $posting    = $this->posting_model->detail($id_posting);
    $kategori = $this->kategori_posting_model->listing();
    $akhir    = $this->posting_model->akhir();

    // Validasi
    $v = $this->form_validation;
    $v->set_rules('judul','Judul','required',
          array(   'required'  => 'Judul harus diisi'));

    $v->set_rules('isi','Isi','required',
        array(   'required'  => 'Isi harus diisi'));

    if($v->run()) {
      // Kalau ada gambar
      if(!empty($_FILES['gambar']['name'])){

      $config['upload_path']    = './assets/upload/image/';
      $config['allowed_types']  = 'gif|jpg|png|svg';
      $config['max_size']     = '12000'; // KB  
$this->load->library('upload', $config);
if(! $this->upload->do_upload('gambar')) {

$data = array ( 'title'    => 'Edit Posting',
                  'kategori' =>  $kategori,
                  'posting'   => $posting,
                  'error'    =>  $this->upload->display_errors(),
                  'isi'      => 'member/dasbor/posting/edit');
    $this->load->view('member/layout/wrapper',$data);

// Masuk database
    }else{
        $upload_data        = array('uploads' =>$this->upload->data());
        // Image Editor
        $config['image_library']     = 'gd2';
        $config['source_image']      = './assets/upload/image/'.$upload_data['uploads']['file_name']; 
        $config['new_image']        = './assets/upload/image/thumbs/';
        $config['create_thumb']     = TRUE;
        $config['quality']           = "100%";
        $config['maintain_ratio']   = FALSE;
        $config['width']            = 360; // Pixel
        $config['height']           = 200; // Pixel
        $config['x_axis']           = 0;
        $config['y_axis']           = 0;
        $config['thumb_marker']     = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();


        // Hapus gambar lama
if($posting->gambar != ""){
  unlink('./assets/upload/image/'.$posting->gambar);
  unlink('./assets/upload/image/thumbs/'.$posting->gambar);
}
        // End gambar lama
        
      $i          = $this->input;
      $data       = array(  'id_posting'            => $id_posting,
                            'judul'                  => $i->post('judul'),
                            'id_kategori_posting'    => $i->post('id_kategori_posting'),
                            'isi'                    => $i->post('isi'),
                            'gambar'                 => $upload_data['uploads']['file_name'],
                            'id_user'                => $this->session->userdata('id_user'),
                            'kota'                   => $i->post('kota'),
                            'status_posting'         => $i->post('status_posting'));
                           
      $this->posting_model->edit($data);
      $this->session->set_flashdata('sukses','Berhasil di edit');
      redirect(base_url('member/posting/list_posting'));
    }} else{
        // Update tanpa ganti gambar
      $i          = $this->input;
      $data       = array(  'id_posting'             => $id_posting,
                            'judul'                  => $i->post('judul'),
                            'id_kategori_posting'    => $i->post('id_kategori_posting'),
                            'isi'                    => $i->post('isi'),
                            'id_user'                => $this->session->userdata('id_user'),
                            'kota'                   => $i->post('kota'),
                            'status_posting'         => $i->post('status_posting'));
                          
      $this->posting_model->edit($data);
      $this->session->set_flashdata('sukses','Berhasil di edit');
      redirect(base_url('member/posting/list_posting'));



}}
    // End masuk database

  $data = array ( 'title'    => 'Edit Posting',
                  'posting' =>  $posting,
                  'kategori' =>  $kategori,
                  'isi'      => 'member/dasbor/posting/edit');
    $this->load->view('member/layout/wrapper',$data);
  }

// Delete
  public function delete($id_posting){
    $posting  = $this->posting_model->detail($id_posting);

    // Hapus gambar
if($posting->gambar!= ""){
  unlink('./assets/upload/image/'.$posting->gambar);
  unlink('./assets/upload/image/thumbs/'.$posting->gambar);
}
// End hapus gambar
    $data   = array('id_posting'  => $id_posting);
    $this->posting_model->delete($data);
    $this->session->set_flashdata('sukses','Postingan telah dihapus');
    redirect(base_url('member/posting/list_posting'));


// read
  }
  public function read($slug_posting){
  $posting = $this->posting_model->read($slug_posting);
  $kategori = $this->kategori_posting_model->listing();
  $data = array ( 'title'    => $posting->judul,
                  'posting' =>  $posting,
                  'kategori' =>  $kategori,
                  'isi'      => 'member/dasbor/posting/detail');
    $this->load->view('member/layout/wrapper',$data);
}

}