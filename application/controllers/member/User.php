<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
    if ($this->session->userdata('akses_level')!="User") {
      redirect('error');
    }
		$this->load->model('user_model'); // Data user
	}

  // Index
  public function index(){
  	$user=$this->user_model->listing();
	$data = array ( 'title' => 'member',
					        'user'	=> $user,
        	        'isi'   => 'member/dasbor/user/detail');
    $this->load->view('member/layout/wrapper',$data);
	}
// Tambah
	public function tambah(){
  	// Validasi
  	$valid = $this->form_validation;

  	$valid->set_rules('nama','Nama','required',
  		array(	'required'	=>	'Nama harus diisi'));

  	$valid->set_rules('username','Username','required|is_unique[users.username]',
  		array(	'required'	=>	'Username harus diisi',
  				'is_unique'	=>	'Ooopss.. Username: <strong>'.
  								$this->input->post('username').
  					'</strong> sudah digunakan. Buat username baru!'));

  	$valid->set_rules('email','Email','required|valid_email',
  		array(	'required'		=>	'Email harus diisi',
  				'valid_email'	=>	'Ooopss.. Email tidak valid'));

  	$valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
  		array(	'required'		=>	'Password harus diisi',
  				'min_length'	=>	'Password minimal 6 karakter',
  				'max_length'	=>	'Password maksimal 32 karakter'));

    


    if($valid->run()) {
      
      $config['upload_path']    = './assets/upload/image/';
      $config['allowed_types']  = 'gif|jpg|png|svg';
      $config['max_size']     = '12000'; // KB  
    $this->load->library('upload', $config);
    if(! $this->upload->do_upload('gambar')) {

   $data = array( 'title'   => 'Tambah member',
                'error'     => $this->upload->display_errors(),
                   'isi'   => 'member/user/tambah');
      $this->load->view('member/layout/wrapper',$data);


// Masuk database
    }else{
        $upload_data                 = array('uploads' =>$this->upload->data());
        // Image Editor
        $config['image_library']     = 'gd2';
        $config['source_image']      = './assets/upload/image/'.$upload_data['uploads']['file_name'];
        $config['new_image']         = './assets/upload/image/thumbs/';
        $config['create_thumb']      = TRUE;
        $config['quality']           = "100%";
        $config['maintain_ratio']    = TRUE;
        $config['width']             = 360; // Pixel
        $config['height']            = 360; // Pixel
        $config['x_axis']            = 0;
        $config['y_axis']            = 0;
        $config['thumb_marker']      = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
      $i    = $this->input;
     $data = array( 'nama'      => $i->post('nama'),
              'email'           => $i->post('email'),
              'username'        => $i->post('username'),
              'password'        => sha1($i->post('password')),
             
              'no_telp'         => $i->post('no_telp'),
              'akses_level'     => $i->post('akses_level'),
              'gambar'          => $upload_data['uploads']['file_name']);


      $this->user_model->tambah($data);
      $this->session->set_flashdata('sukses','User/membertelah ditambah');
      redirect(base_url('member/user'));
    }}
    // End masuk database

  $data = array( 'title'   => 'Tambah member',
                  'isi'   => 'member/user/tambah');
      $this->load->view('member/layout/wrapper',$data);
    }

// Edit
  public function edit($id_user){
    $user=$this->user_model->detail($id_user);
    // Validasi
    $valid = $this->form_validation;

    $valid->set_rules('nama','Nama','required',
      array(  'required'  =>  'Nama harus diisi'));

    $valid->set_rules('email','Email','required|valid_email',
      array(  'required'    =>  'Email harus diisi',
              'valid_email' =>  'Ooopss.. Email tidak valid'));


 if($valid->run()) {
      // Kalau ada gambar
      if(!empty($_FILES['gambar']['name'])){

      $config['upload_path']    = './assets/upload/image/';
      $config['allowed_types']  = 'gif|jpg|png|svg';
      $config['max_size']       = '12000'; // KB  
$this->load->library('upload', $config);
if(! $this->upload->do_upload('gambar')) {

  $data = array(  'title'   => 'Edit member',
                  'user'    =>  $user,
                  'isi'     => 'member/user/edit');
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
if($user->gambar != ""){
  unlink('./assets/upload/image/'.$user->gambar);
  unlink('./assets/upload/image/thumbs/'.$user->gambar);
}
        // End gambar lama
        
      $i = $this->input;
      $data = array(  
              'id_user'      => $id_user,
              'nama'         => $i->post('nama'),
              'email'        => $i->post('email'),
              'username'     => $i->post('username'),
             
              'no_telp'      => $i->post('no_telp'),
              
              'gambar'        => $upload_data['uploads']['file_name']);

                           
     $this->user_model->edit($data);
      $this->session->set_flashdata('sukses','User/member telah diubah');
      redirect(base_url('member/user/lihat_user/'.$id_user));
  
    }} else{
        // Update tanpa ganti gambar
     $i = $this->input;
      $data = array(  
              'id_user'      => $id_user,
              'nama'         => $i->post('nama'),
              'email'        => $i->post('email'),
              'username'     => $i->post('username'),
             
              'no_telp'      => $i->post('no_telp'));
                 
       $this->user_model->edit($data);
      $this->session->set_flashdata('sukses','User/member telah diubah');
      redirect(base_url('member/user/lihat_user/'.$id_user));



}}
    // End masuk database

  $data = array(  'title'   => 'Edit member',
                  'user'    =>  $user,
                  'isi'     => 'member/dasbor/user/edit');
      $this->load->view('member/layout/wrapper',$data);
     }




  // Delete
	public function delete($id_user){

 // Hapus gambar
if($posting->gambar!= ""){
  unlink('./assets/upload/image/'.$posting->gambar);
  unlink('./assets/upload/image/thumbs/'.$posting->gambar);
}
// End hapus gambar

		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','User/ member telah dihapus');
		redirect(base_url('member/user'));
	}

// Melihat profil user
public function lihat_user($id_user)
{
  $user = $this->user_model->read($id_user);
  $data = array ( 'title'    => 'Data User',
                  'user'     =>  $user,
                  'isi'      => 'member/dasbor/user/detail');
    $this->load->view('member/layout/wrapper',$data);
  
}

// ganti password
public function profile_edit_password($id_user)
  {
      $user=$this->user_model->detail($id_user);
    $password_lama=sha1($this->input->post('password_lama'));
    if($this->uri->segment('4')!=$this->session->userdata('id_user'))
    {
      redirect('error');
    }else{
      $login = array('id_user'=>$user->id_user);
          $hasil=$this->user_model->cek_user($login);
      if ($hasil->num_rows() == 1) {
        $valid=$this->form_validation;
        $valid->set_rules('password_lama','Pasword Lama','required',
          array('required'=>'Password lama harus diisi'));
        $valid->set_rules('password','Pasword baru','required',
          array('required'=>'Password baru harus diisi'));
        $valid->set_rules('password2','Konfirmasi Pasword Baru','required|matches[password]',
          array('required'=>'Konfirmasi password baru harus diisi',
          'matches'=>'Re-Password harus sama dengan password'));
        if($valid->run()==false){
        
        $data=array( 'title'  => 'Ganti Password',
                    'user'  => $user,
                    'isi' => 'member/dasbor/user/profile_edit_password');
        $this->load->view('member/layout/wrapper',$data);
        }else{
          
          if($password_lama!=$user->password){
          $this->session->set_flashdata('sukses','Password lama salah!');
          redirect(base_url('member/user/profile_edit_password/'.$id_user));
          }else{
          $i=$this->input;
          $data=array('id_user'=>$id_user,
          'password'=>sha1($i->post('password')));
          $this->session->set_flashdata('sukses','Password telah diubah');
          $this->user_model->edit($data);
          redirect(base_url('member/user/lihat_user/'.$id_user));     
        }}
      }else{
        redirect('error'); 
    }
    
  }
}
}