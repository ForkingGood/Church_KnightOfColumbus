<?php
class Member_model extends CI_Model{
	
	var $name = "Jude";

	function __construct()
	{
		parent::__construct();
	}

	function get_last_ten_entries()
	{
		$this->load->database();
		$query = $this->db->get('members');
		return $query->result();
	}

}
?>