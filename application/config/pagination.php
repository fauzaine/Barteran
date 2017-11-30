<?php defined('BASEPATH') OR exit('No direct script access allowed.');
$this->CI = &get_instance();

$config['base_url'] = base_url().'dasbor/index';
$config['total_rows'] = $this->CI->db->get('posting')->num_rows();
$config['per_page'] = 9;
$config['num_links'] = 2;
$config['full_tag_open']='<div id="my_pagination">';
$config['full_tag_close']='</div>';
$config['next_link']='Next';
$config['prev_link']='Prev';
