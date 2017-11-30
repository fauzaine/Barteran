<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
        }
	public function index()
	{
		$this->load->view('register');
	}
	
	public function tambah()
	{
		$valid=$this->form_validation;
              
		$valid->set_rules('email','Email','required|valid_email',
			array('required'=>'Email harus diisi',
				'valid_email'=>'Email harus benar'));
		$valid->set_rules('username','Username','required',
			array('required'=>'Nama User harus diisi'));
		$valid->set_rules('nama','Nama','required',
			array('required'=>'Nama User harus diisi'));
		$valid->set_rules('password','Password','required',
			array('required'=>'Password harus diisi'));

			if($valid->run()) {
				$login = array('email'=>$this->input->post('email',TRUE));
				$hasil=$this->user_model->cek_user($login);
				$email=$this->input->post('email',TRUE);
				if ($hasil->num_rows() == 0) {
				$nama_user=$this->input->post('nama_user',TRUE);
				$i = $this->input;
				$data = array(		'nama'					=> $i->post('nama'),
									'email'					=> $i->post('email'),
									'username'				=> $i->post('username'),
									'password'				=> sha1($i->post('password')),
									'akses_level'			=> 'User');
				$this->user_model->tambah($data);
				$this->session->set_flashdata('sukses','Terimakasih telah mendaftar dan silahkan login');
					redirect(base_url('login'));
	        }else{
	        	$this->session->set_flashdata('sukses','Email yang anda gunakan sudah terdaftar sebelumnya, Silahkan login dengan email dan password anda sebelumnya');
				redirect(base_url('login'));
	        }
		}
		$this->load->view('register');
	}

}