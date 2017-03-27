<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Insurance_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }


        public function get_insurance()
        {
                $query = $this->db->get('insurancecompany');
                return $query->result();
        }
        public function create($data)
        {
            if($this->db->insert('insurancecompany', $data)){
                return true;
            }
            return false;
        }
      public function edit($id)
      { 
          return $this->db->get_where('insurancecompany', array('Id'=>$id));     
      }
     public function update($id, $data)
     {
        $this->db->where('Id', $id);
        if ($this->db->update('insurancecompany', $data)) {
           return TRUE;
        }
        return FALSE;
     }
     public function delete($id)
     {
         $this->db->where('Id', $id);
        if ($this->db->delete('insurancecompany')) {
           return TRUE;
        }
        return FALSE;
     }
    public function get_renewal()
        {
                $query = $this->db->get('rnewalmastertable');
                return $query->result();
        }

       public function create_renewal($data)
        {
            if($this->db->insert('rnewalmastertable', $data)){
                return true;
            }
            return false;
        }
      public function edit_renewal($id)
      { 
          return $this->db->get_where('rnewalmastertable', array('ID'=>$id));     
      }
     public function update_renewal($id, $data)
     {
        $this->db->where('ID', $id);
        if ($this->db->update('rnewalmastertable', $data)) {
           return TRUE;
        }
        return FALSE;
     }
     public function delete_renewal($id)
     {
         $this->db->where('ID', $id);
        if ($this->db->delete('rnewalmastertable')) {
           return TRUE;
        }
        return FALSE;
     }

}