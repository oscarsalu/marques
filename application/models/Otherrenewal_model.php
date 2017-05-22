<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Otherrenewal_model extends CI_Model {
	//start of CONSTRUCT
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	//Retrieve all records
	public function getOtherrenewal()
	{
		$query = $this->db->get('otherrenewal');
		return $query->result();
	}
	//insert data to table
	public function create_otherrenewal($data)
	{
		if($this->db->insert('otherrenewal', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//return a particular row
	public function get_otherrenewal($id)
	{
		return $this->db->get_where('otherrenewal', array('id'=>$id));
	}
	//update a particular record
	public function update_otherrenewal($id, $data)
	{
		$this->db->where('id', $id);
		if ($this->db->update('otherrenewal', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	//delete a record
	public function delete_otherrenewal($id='')
	{
		$this->db->where('id', $id);
		if ($this->db->delete('otherrenewal'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
