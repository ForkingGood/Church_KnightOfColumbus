<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function Index()
	{
		$this->load->model('event_model');
		
		$data['query'] = $this->event_model->get_all();
		$data['loggedIn'] = $this->session->userdata('logged_in');
		$data['username'] = $this->session->userdata('logged_in')['username'];
		$data['addError'] = '';
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
		if ($this->input->post() && $this->session->userdata('logged_in')) {

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
			}
			else
			{
				// $data = array('upload_data' => $this->upload->data());

				// $this->load->view('upload_success', $data);


				$params = array( 
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'datetime_created' => date('Y-m-d H:i:s'),
					'start_datetime' => date('Y-m-d', strtotime($this->input->post('startDate'))).' '.date('H:i:s', strtotime($this->input->post('startTime'))),
					'end_datetime' => date('Y-m-d', strtotime($this->input->post('endDate'))).' '.date('H:i:s', strtotime($this->input->post('endTime'))),
					'description' => $this->input->post('description'),
					'image_path' => $this->upload->data()['file_name']//''//$this->input->post('imgPath')
				);
			
				$this->load->model('event_model');

				$this->event_model->insert($params);

				redirect('Events', 'refresh');
			}

		} else {
			Index();
		}
	}
	public function Edit()
	{
		if ($this->input->post()) {
			$params = array( 
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'datetime_created' => date('Y-m-d H:i:s'),
				'start_datetime' => date('Y-m-d', strtotime($this->input->post('startDate'))).' '.date('H:i:s', strtotime($this->input->post('startTime'))),
				'end_datetime' => date('Y-m-d', strtotime($this->input->post('endDate'))).' '.date('H:i:s', strtotime($this->input->post('endTime'))),
				'description' => $this->input->post('description'),
				'image_path' => ''//$this->input->post('imgPath')
				);
		
			$this->load->model('event_model');
			$this->event_model->edit($this->input->post('id'), $params);
			redirect('Events', 'refresh');
		} else {
			Index();
		}
	}
}