<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Church extends CI_Controller {

	public function index()
	{
		$this->load->model('member_model');
		$params = array('id' => '5', 'name' => 'Pam');

		$this->load->library('member', $params);
		$object = new Member($params);
		$data['my_member'] = $object;
		
		// $this->member_model->insert_member($object);

		$data['query'] = $this->member_model->get_all();


		// Display Content
		$content = $this->load->view('Church_home',$data, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}
}

