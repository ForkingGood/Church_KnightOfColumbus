<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index()
	{
		$this->load->model('event_model');
		
		$data['query'] = $this->event_model->get_all();

		// Display Content
		$content = $this->load->view('Events/Index', $data, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

