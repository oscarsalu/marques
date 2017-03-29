<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maintainance_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }


        public function get_maintainance()
        {
                $query = $this->db->get('maintenenace');
                return $query->result();
        }
        public function create($data)
        {
            if($this->db->insert('maintenenace', $data)){
                return true;
            }
            return false;
        }
        public function get_supplier()
        {
                $query = $this->db->get('suppliermaster');
                return $query->result();
        }public function get_maintype()
        {
                $query = $this->db->get('servicetypemaster');
                return $query->result();
        }
}