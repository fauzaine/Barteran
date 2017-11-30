<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
public function index() {
    $valid=$this->form_validation;

      $valid->set_rules('username','Username','required',
      array('required'=>'Username harus diisi'));
          

      $valid->set_rules('password','Password','required',
      array('required'=>'Password harus diisi'));
      if($valid->run()){

    $login = array('username' => $this->input->post('username', TRUE),
                   'password' => sha1($this->input->post('password', TRUE))
      );
     // load model_user
    
    $hasil = $this->user_model->cek_user($login);
    if ($hasil->num_rows() == 1) {
      foreach ($hasil->result() as $sess) {
        
        $sess_data['nama']        = $sess->nama;
        $sess_data['username']    = $sess->username;
        $sess_data['akses_level'] = $sess->akses_level;
        $sess_data['id_user']     = $sess->id_user;
        $this->session->set_userdata($sess_data);
      }
      if ($this->session->userdata('akses_level')=='Admin') {
        redirect('admin/dasbor');
      }
      elseif ($this->session->userdata('akses_level')=='User') {
        redirect('member/dasbor');
      }
      elseif ($this->session->userdata('akses_level')=='Blocked'){ $this->session->set_flashdata('sukses','Akun di block, Silakan hubungi Administrator');
      }
    }else{
      $this->session->set_flashdata('sukses','Oopss.. Username/password salah');
    }
  
  }
     redirect('login');
  }
}