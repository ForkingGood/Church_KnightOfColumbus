<?php
class Officer_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$this->load->database();
		$this->db->order_by('priority asc, name asc');
		$query = $this->db->get('officers');
		return $query->result();
	}

	function insert($object)
	{
		$this->load->database();
		$this->db->insert('officers', $object); 

	}
}
?>