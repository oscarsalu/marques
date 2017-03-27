<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fuel_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

/******CRUD OPERATIONS OF THE fuel_station OBJECT ***************************************************************************************/

// get the fuel_station s 
        public function get_fuel_stations()
        {
                $query = $this->db->get('fuelstationmaster');
                return $query->result();
        }
// store the fuel_station  object
        public function create_fuel_station($data)
        {
            if($this->db->insert('fuelstationmaster', $data)){
                return true;
            }
            return false;
        }

 // return a particular fuel_station 
      public function get_fuel_station($id)
      { 
          return $this->db->get_where('fuelstationmaster', array('Id'=>$id));     
      }
 //update a particular record of fuel_station 
     public function update_fuel_station($id, $data)
     {
        $this->db->where('Id', $id);
        if ($this->db->update('fuelstationmaster', $data)) {
           return TRUE;
        }
        return FALSE;
     }
 //delete a record of fuel_station 
     public function delete_fuel_station($id='')
     {
         $this->db->where('Id', $id);
        if ($this->db->delete('fuelstationmaster')) {
           return TRUE;
        }
        return FALSE;
     }
//delete records of fuel_station 
     public function delete_many_fuel_stations($ids)
     {
        $this->db->where_in('Id', $ids);
        $this->db->delete('fuelstationmaster');
     }

/******************************* END OF CRUD OPERATIONS OF THE fuel_station  OPERATIONS ******************************************************************/


/******CRUD OPERATIONS OF THE fuel_records OBJECT ***************************************************************************************/

// get the fuel_records s 
        public function get_fuel_records()
        {
                $query = $this->db->get('fuelmaster');
                return $query->result();
        }
// store the fuel_records  object
        public function create_fuel_record($data)
        {
            if($this->db->insert('fuelmaster', $data)){
                return true;
            }
            return false;
        }

 // return a particular fuel_records 
      public function get_fuel_record($id)
      { 
          return $this->db->get_where('fuelmaster', array('id'=>$id));     
      }
 //update a particular record of fuel_records 
     public function update_fuel_record($id, $data)
     {
        $this->db->where('id', $id);
        if ($this->db->update('fuelmaster', $data)) {
           return TRUE;
        }
        return FALSE;
     }
 //delete a record of fuel_records 
     public function delete_fuel_record($id='')
     {
         $this->db->where('id', $id);
        if ($this->db->delete('fuelmaster')) {
           return TRUE;
        }
        return FALSE;
     }
//delete records of fuel_records 
     public function delete_many_fuel_recordss($ids)
     {
        $this->db->where_in('id', $ids);
        $this->db->delete('fuelmaster');
     }

/******************************* END OF CRUD OPERATIONS OF THE fuel_records  OPERATIONS ******************************************************************/





}