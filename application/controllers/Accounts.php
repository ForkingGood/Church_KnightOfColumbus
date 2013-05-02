
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {

 	function __construct()
 	{
   		parent::__construct();
 	}
	
	function Logout() 
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('', 'refresh');
	}
	
	function Login()
	{
	 	if ($this->input->post()) {
			//This method will have the credentials validation
		   	$this->load->library('form_validation');

		   	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		   	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		   	if($this->form_validation->run() == FALSE)
		   	{
		     	//Field validation failed.&nbsp; User redirected to login page
		     	
				// Display Content
				$content = $this->load->view('Accounts/Login', null, true);
		        // Pass to the master view
		        $this->load->view('template/masterView1', array('content' => $content));
		   	}
		   	else
		   	{
		     	//Go to private area
		     	redirect('');
		     	//redirect('home', 'refresh');
		   	}
	 	} else {
		   	$this->load->helper(array('form'));

			// Display Content
			$content = $this->load->view('Accounts/Login', null, true);
		    // Pass to the master view
		    $this->load->view('template/masterView1', array('content' => $content));
		}
	}

	function check_database($password)
 	{
   		//Field validation succeeded.&nbsp; Validate against database
   		$username = $this->input->post('username');

   		//query the database
   		$this->load->model('user_model');
   		$result = $this->user_model->login($username, $password);

   		if($result)
   		{
     		$sess_array = array();
     		foreach($result as $row)
     		{
       			$sess_array = array(
         			'id' => $row->id,
         			'username' => $row->username
       				);
       			$this->session->set_userdata('logged_in', $sess_array);
     		}
     		return TRUE;
   		}
   		else
   		{
     		$this->form_validation->set_message('check_database', 'Invalid username or password');
   	  			return false;
   			}
 		}
	}

// http://www.codefactorycr.com/login-with-codeigniter-php.html
?>



