<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Officers extends CI_Controller {

	public function index()
	{
		$this->load->model('officer_model');

		$data['query'] = $this->officer_model->get_all();

		// Display Content
		$content = $this->load->view('Officers/Index', $data, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

