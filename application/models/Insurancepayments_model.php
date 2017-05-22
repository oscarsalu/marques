<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Insurancepayments_model extends CI_Model {
	//start of CONSTRUCT
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	//Retrieve all records
	public function getInsurancepayments()
	{
		$query = $this->db->get('insurance-payments');
		return $query->result();
	}
	//insert data to table
	public function create_insurancepayments($data)
	{
		if($this->db->insert('insurance-payments', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//return a particular row
	public function get_insurancepayments($id)
	{
		return $this->db->get_where('insurance-payments', array('id'=>$id));
	}
	//update a particular record
	public function update_insurancepayments($id, $data)
	{
		$this->db->where('id', $id);
		if ($this->db->update('insurance-payments', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	//delete a record
	public function delete_insurancepayments($id='')
	{
		$this->db->where('id', $id);
		if ($this->db->delete('insurance-payments'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
