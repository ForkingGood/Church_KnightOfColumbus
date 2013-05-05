<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller {

	public function index()
	{
		// Display Content
		$this->load->model('member_model');
		$this->load->library('table');
		$data['query'] = $this->member_model->get_all();
		$data['members_table'] = $this->db->query("SELECT * FROM member");
		$content = $this->load->view('Membership/roster', $data, true);
		
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

