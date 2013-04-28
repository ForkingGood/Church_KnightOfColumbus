<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Church extends CI_Controller {

	public function index()
	{
		$this->load->model('member_model');
		$data['query'] = $this->member_model->get_last_ten_entries();
		$this->load->view('church_home',$data);
	}
}

