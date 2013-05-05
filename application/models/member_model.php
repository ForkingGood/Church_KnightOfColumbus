<?php
class Member_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$this->load->database();
		$this->db->order_by('priority asc');
		$query = $this->db->get('member');
		return $query->result();
	}

	function insert($object)
	{
		$this->load->database();
		$this->db->insert('member', $object); 
	}

	function edit($id, $object)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->update('member', $object);
	}

	function delete($id)
	{
		$this->load->database();
		$this->db->delete('member', array('id' => $id));
	}
}
?>