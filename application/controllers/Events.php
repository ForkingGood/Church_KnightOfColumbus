<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index()
	{
		$this->load->model('event_model');
		
		$data['query'] = $this->event_model->get_all();
		$data['loggedIn'] = $this->session->userdata('logged_in');
		$data['username'] = $this->session->userdata('logged_in')['username'];
		// Display Content
		$content = $this->load->view('Events/Index', $data, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

