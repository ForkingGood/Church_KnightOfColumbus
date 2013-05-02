<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		// Display Content
		$content = $this->load->view('Contact/Index', null, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}

	public function sendMail()
	{
		$this->load->library('email');

		$this->email->from('judefernandez2000@gmail.com', 'CHURCH JUDE');
		$this->email->to('cal.au0927@gmail.com'); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	

		$this->email->send();

		echo $this->email->print_debugger();
	}
}

