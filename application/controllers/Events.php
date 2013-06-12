<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function Index($params = null)
	{
		$this->load->model('event_model');
		
		$data['query'] = $this->event_model->get_all();
		$data['loggedIn'] = $this->session->userdata('logged_in');
		$data['username'] = $this->session->userdata('logged_in')['username'];
		$data['addError'] = $params['addError'];

		if ($this->session->userdata('logged_in') && isset($_POST['action'])) {
			//	Load validation libraries
			$this->load->helper(array('form', 'url', 'array'));
			$this->load->library('form_validation');

	    	//	If post back, check what action is being requested ('add', 'edit', 'remove')
	    	switch ($_POST['action']) {
	    		case 'add':
	    			// Set rules for Add
					$this->form_validation->set_rules('add[name]', 'Event Name', 'trim|required');
					$this->form_validation->set_rules('add[startDate]', 'Start Date', 'trim|required|callback_valid_datetime[date]');
					$this->form_validation->set_rules('add[endDate]', 'End Date', 'trim|required|callback_valid_datetime[date]');
					$this->form_validation->set_rules('add[startTime]', 'Start Time', 'trim|required|callback_valid_datetime[time]');
					$this->form_validation->set_rules('add[endTime]', 'End Time', 'trim|required|callback_valid_datetime[time]');
					$this->form_validation->set_rules('add[address]', 'Address', 'trim|required');
					$this->form_validation->set_rules('add[description]', 'Description', '');
					$this->form_validation->set_rules('userfile', 'Image File', 'callback_handle_upload');

					//	If rules pass, call function
					if ($this->form_validation->run())
					{
						// add to db
						$params = array(
							'name' => $_POST['add']['name'],
							'address' => $_POST['add']['address'],
							'datetime_created' => date('Y-m-d H:i:s'),
							'start_datetime' => date('Y-m-d', strtotime($_POST['add']['startDate'])).' '.date('H:i:s', strtotime($_POST['add']['startTime'])),
							'end_datetime' => date('Y-m-d', strtotime($_POST['add']['endDate'])).' '.date('H:i:s', strtotime($_POST['add']['endTime'])),
							'description' => $_POST['add']['description'],
							'image_path' => $_POST['ImgFileName'] //$this->upload->data()['file_name']//''//$this->input->post('imgPath')
						);
					
						$this->load->model('event_model');
						$this->event_model->insert($params);
						redirect('Events', 'refresh');
					}
	    			break;
	    		case 'edit':
	    			// Set rules for Edit
					$this->form_validation->set_rules('edit[name]', 'Event Name', 'trim|required');
					$this->form_validation->set_rules('edit[startDate]', 'Start Date', 'trim|required|callback_valid_datetime[date]');
					$this->form_validation->set_rules('edit[endDate]', 'End Date', 'trim|required|callback_valid_datetime[date]');
					$this->form_validation->set_rules('edit[startTime]', 'Start Time', 'trim|required|callback_valid_datetime[time]');
					$this->form_validation->set_rules('edit[endTime]', 'End Time', 'trim|required|callback_valid_datetime[time]');
					$this->form_validation->set_rules('edit[address]', 'Address', 'trim|required');
					$this->form_validation->set_rules('edit[description]', 'Description', '');

					//	If rules pass, call function
					if ($this->form_validation->run())
					{
						// add to db
						$params = array(
							'name' => $_POST['edit']['name'],
							'address' => $_POST['edit']['address'],
							'datetime_created' => date('Y-m-d H:i:s'),
							'start_datetime' => date('Y-m-d', strtotime($_POST['edit']['startDate'])).' '.date('H:i:s', strtotime($_POST['edit']['startTime'])),
							'end_datetime' => date('Y-m-d', strtotime($_POST['edit']['endDate'])).' '.date('H:i:s', strtotime($_POST['edit']['endTime'])),
							'description' => $_POST['edit']['description']
						);
						
						if ($this->handle_upload()) { $params['image_path'] = $_POST['ImgFileName']; }

						$this->load->model('event_model');
						$this->event_model->edit($this->input->post('id'), $params);
						redirect('Events', 'refresh');
					}
	    			break;
	    	}
	    }
		// Display Content
		$content = $this->load->view('Events/Index', $data, true);
        // Pass to the master view
        $this->load->view('template/masterView1', array('content' => $content));
	}

	function valid_datetime($str, $params) {
		$parser = date_parse($str);

		$this->form_validation->set_message('valid_datetime', '"%s" must contain a valid '.$params.' ("ie. June 31, 2013")');

		return $parser['error_count'] == 0;
	}

	function handle_upload()
  	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

  		if ($this->upload->do_upload()) {
    		// set a $_POST value for 'image' that we can use later
    		$_POST['ImgFileName'] = $this->upload->data()['file_name'];
    		return true;
  		} else {
    		// possibly do some clean up ... then throw an error
    		$this->form_validation->set_message('handle_upload', $this->upload->display_errors());
    		return false;
  		}
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
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		if ($this->input->post() && $this->session->userdata('logged_in')) 
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload()) {

				$error = array('addError' => $this->upload->display_errors());

				$this->Index($error);
				$this->load->view('upload_form', $error);
			} else {
				// add to db
				$params = array(
					'name' => $_POST['add']['name'],
					'address' => $_POST['add']['address'],
					'datetime_created' => date('Y-m-d H:i:s'),
					'start_datetime' => date('Y-m-d', strtotime($_POST['add']['startDate'])).' '.date('H:i:s', strtotime($_POST['add']['startTime'])),
					'end_datetime' => date('Y-m-d', strtotime($_POST['add']['endDate'])).' '.date('H:i:s', strtotime($_POST['add']['endTime'])),
					'description' => $_POST['add']['description'],
					'image_path' => $this->upload->data()['file_name'] //$this->upload->data()['file_name']//''//$this->input->post('imgPath')
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