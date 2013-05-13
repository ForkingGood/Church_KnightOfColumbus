<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller {

	public function index()
	{
		// Display Content
		$this->load->model('member_model');
		$this->load->library('table');
		$data['query'] = $this->member_model->get_all(15, -1);

		$data['members_table'] = $this->db->query("SELECT * FROM member");
		$content = $this->load->view('Membership/displayMembers', $data, true);
		if ($this->session->userdata('logged_in')) {
			$content = $this->load->view('Membership/edit', $data, true);
		}
		
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
	public function memberList($min, $max) {
		$this->load->model('member_model');
		
		// add the header line to specify that the content type is JSON
    	header("Content-type: application/json");
		
		echo "{\"data\":".json_encode($this->member_model->get_all($min, $max))."}";
	}
	public function edit() {
		$content = $this->load->view('Membership/edit', null, true);
		
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

