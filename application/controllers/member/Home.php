<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->model('posting_model');
		$this->load->model('kategori_posting_model');
			}

  // Index
  public function Index(){
  	
  	$posting = $this->posting_model->posting_home();

	$data = array ( 	'title'  => 'Featured Product',
						'posting' => $posting,
						'isi'   => 'member/dasbor/list');
    $this->load->view('member/layout/wrapper',$data);

  }

}
