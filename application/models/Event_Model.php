<?php
class Event_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$this->load->database();
		$this->db->order_by('start_datetime asc');
		$query = $this->db->get('event');
		return $query->result();
	}

	function insert($object)
	{
		$this->load->database();
		$this->db->insert('event', $object); 

	}

	function edit($id, $object)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->update('event', $object);
	}

	function delete($id)
	{
		$this->load->database();
		$this->db->delete('event', array('id' => $id));
	}
}
?>