<?php
class Officer_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$this->load->database();
		$this->db->order_by('priority asc, last_name asc');
		$query = $this->db->get('member');
		return $query->result();
	}

	function insert($object)
	{
		$this->load->database();
		$this->db->insert('member', $object); 

	}
}
?>