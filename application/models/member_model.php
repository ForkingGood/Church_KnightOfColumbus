<?php
class Member_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get_all($min, $max)
	{
		$this->load->database();

		$hasWhere = false;

		$whereStr = '';
		if (!is_null($min) && $min != -1) {
			$whereStr .= $hasWhere ? ' AND ' : '';
			$whereStr .= 'priority >= '.$min;
			$hasWhere = true;
		}
		if (!is_null($max) && $max != -1) {
			$whereStr .= $hasWhere ? ' AND ' : '';
			$whereStr .= 'priority <= '.$max;
			$hasWhere = true;
		}

		if ($hasWhere) { $this->db->where($whereStr); }

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