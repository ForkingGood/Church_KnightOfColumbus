<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proclaimers extends CI_Controller {

	public function index()
	{
		// Display Content
		$content = $this->load->view('Proclaimers/Index', null, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

