<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index() {
    $this->load->view('admin/login_view');
  }

  
  public function logout() {
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('akses_level');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('id_login');
    $this->session->unset_userdata('id');
    $this->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
    redirect(base_url().'login');
  }
}

?>