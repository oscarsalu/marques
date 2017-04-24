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
        public function create_vehicle_type($data)
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

/******CRUD OPERATIONS OF THE FLEET OBJECT ***************************************************************************************/

// get the Fleets 
        public function get_fleets()
        {
                $query = $this->db->get('vehiclemaster');
                return $query->result();
        }

        // store the vehicle  object
        public function create_fleet($data)
        {
            if($this->db->insert('vehiclemaster', $data)){
                return true;
            }
            return false;
        }

        // return a particular vehicle 
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
      
      // return available driver for assignments
      public function get_available_drivers($where)
      { 
          $query = $this->db->query("select * from drivers $where");
          return $query->result();    
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