<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	public function Index()
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
	public function Remove($id) 
	{
		$this->load->model('event_model');
		
		$this->event_model->delete($id);

		// redirect to events page
		redirect('Events', 'refresh');
	}
	public function Add()
	{
		if ($this->input->post()) {
			$params = array( 
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'address' => $this->input->post('address'),
				'imgPath' => '',//$this->input->post('imgPath'),
				'time' => $this->input->post('time')
				);
		
			$this->load->model('event_model');

			$this->event_model->insert($params);

			redirect('Events', 'refresh');
		} else {
			Index();
		}
	}
	public function Edit()
	{
		if ($this->input->post()) {
			$params = array(
				'date' => $this->input->post('date'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'address' => $this->input->post('address'),
				'imgPath' => '',//$this->input->post('imgPath'),
				'time' => $this->input->post('time')
				);
		
			$this->load->model('event_model');
			$this->event_model->edit($this->input->post('id'), $params);
			redirect('Events', 'refresh');
		} else {
			Index();
		}
	}
}