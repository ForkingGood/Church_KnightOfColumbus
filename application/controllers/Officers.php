<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Officers extends CI_Controller {

	public function index()
	{


		// Display Content
		$content = $this->load->view('Officers/Index', null, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

