<?php
class Event_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$this->load->database();
		$this->db->order_by('date asc, time asc');
		$query = $this->db->get('events');
		return $query->result();
	}

	function insert($object)
	{
		$this->load->database();
		$this->db->insert('events', $object); 

	}

	function edit($id, $object)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->update('events', $object);
	}

	function delete($id)
	{
		$this->load->database();
		$this->db->delete('events', array('id' => $id));
	}
}
?>