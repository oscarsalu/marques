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
            if($this->db->insert('rnewalmastertabl', $data)){
                return true;
            }
            return false;
        }
      public function get_fleet($id)
      { 
          return $this->db->get_where('vehiclemaster', array('ID'=>$id));     
      }

       //update a particular record of vehicle type
     public function update_fleet($id, $data)
     {
        $this->db->where('ID', $id);
        if ($this->db->update('vehiclemaster', $data)) {
           return TRUE;
        }
        return FALSE;
     }
      //delete a record of vehicle type
     public function delete_fleet($id='')
     {
         $this->db->where('ID', $id);
        if ($this->db->delete('vehiclemaster')) {
           return TRUE;
        }
        return FALSE;
     }


  /***************************************end of fleet *************************************************/
  /******CRUD OPERATIONS OF THE driver OBJECT ***************************************************************************************/

// get the drivers 
        public function get_drivers()
        {
                $query = $this->db->get('drivers');
                return $query->result();
        }

        // store the driver  object
        public function create_driver($data)
        {
            if($this->db->insert('drivers', $data)){
                return true;
            }
            return false;
        }

        // return a particular driver 
      public function get_driver($id)
      { 
          return $this->db->get_where('drivers', array('id'=>$id));     
      }

       //update a particular record of drivers
     public function update_driver($id, $data)
     {
        $this->db->where('id', $id);
        if ($this->db->update('drivers', $data)) {
           return TRUE;
        }
        return FALSE;
     }
      //delete a record of vehicle type
     public function delete_driver($id='')
     {
         $this->db->where('id', $id);
        if ($this->db->delete('drivers')) {
           return TRUE;
        }
        return FALSE;
     }

}