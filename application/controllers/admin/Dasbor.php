<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('akses_level')!="Admin") {
			redirect('error');
		}
		
	}

  // Index
  public function Index(){
	$data = array ( 'title'  => 'Halaman Dasbor Admin',
					'isi'   => 'admin/dasbor/list');
    $this->load->view('admin/layout/wrapper',$data);

  }
}
