<?php
class Member_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$this->load->database();
		$query = $this->db->get('members');
		return $query->result();
	}

	function insert_member($object)
	{
		$this->load->database();
		$this->db->insert('members', $object); 

	}
}
?>