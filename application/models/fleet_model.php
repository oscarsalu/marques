<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fleet_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

/******CRUD OPERATIONS OF THE VEHICLE TYPE OBJECT ***************************************************************************************/

// get the vehicle types 
        public function get_vehicle_types()
        {
                $query = $this->db->get('vehicletype');
                return $query->result();
        }
// store the vehicle type object
        public function insert_vehicle_type($data)
        {
            if($this->db->insert('vehicletype', $data)){
                return true;
            }
            return false;
        }

 // return a particular vehicle type
      public function get_vehicle_type($id)
      { 
          return $this->db->get_where('vehicletype', array('id'=>$id));     
      }
 //update a particular record of vehicle type
     public function update_vehicle_type($id, $data)
     {
        $this->db->where('id', $id);
        if ($this->db->update('vehicletype', $data)) {
           return TRUE;
        }
        return FALSE;
     }
 //delete a record of vehicle type
     public function delete_vehicle_type($id='')
     {
         $this->db->where('id', $id);
        if ($this->db->delete('vehicletype')) {
           return TRUE;
        }
        return FALSE;
     }
//delete records of vehicle type
     public function delete_many_vehicle_types($ids)
     {
        $this->db->where_in('id', $ids);
        $this->db->delete('vehicletype');
     }

/******************************* END OF CRUD OPERATIONS OF THE VEHICLE TYPE OPERATIONS ******************************************************************/
}