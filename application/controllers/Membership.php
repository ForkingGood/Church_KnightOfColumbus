<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller {

	public function index()
	{
		// Display Content
		$content = $this->load->view('Membership/Index', null, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

