<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fleetscheduling_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
/**************************** START OF ROUTES *******************************************************/
        // get the routes 
        public function get_routes()
        {
                $query = $this->db->query("Select routes.*,concat(routes.source,' => ',routes.destination) route,users.username createdby from routes left join users on users.id=routes.createdby");
                return $query->result();
        }
        
       //add routes
       public function save_route($data){
	  if($this->db->insert('routes', $data)){
		  return true;
	  }
	  return false;
      }
      
      // return a particular route 
      public function get_route($id)
      { 
          return $this->db->get_where('routes', array('id'=>$id));     
      }
      
      //update a particular record of route
      public function update_route($id, $data)
      {
	  $this->db->where('id', $id);
	  if ($this->db->update('routes', $data)) {
	    return TRUE;
	  }
	  return FALSE;
      }
      
      //delete a record of route
      public function delete_route($id='')
      {
	  $this->db->where('id', $id);
	  if ($this->db->delete('routes')) {
	    return TRUE;
	  }
	  return FALSE;
      }
/**************************** END OF ROUTES *******************************************************/
      
/**************************** START OF ROUTE DETAILS *******************************************************/
        // get the Route Details 
        public function get_routedetails()
        {
                $query = $this->db->query('select routedetails.*,users.username createdby from routedetails left join users on users.id=routedetails.createdby');
                return $query->result();
        }
        
       //add Route Details
       public function save_routedetails($data){
	  if($this->db->insert('routedetails', $data)){
		  return true;
	  }
	  return false;
      }
      
      // return a particular Record
      public function get_routedetail($id)
      { 
          $query=$this->db->get_where('routedetails', array('id' => $id), 1);  
          return $query->result();
      }
      
      //update a particular record
      public function update_routedetails($id, $data)
      {
	  $this->db->where('id', $id);
	  if ($this->db->update('routedetails', $data)) {
	    return TRUE;
	  }
	  return FALSE;
      }
      
      //delete a record
      public function delete_routedetails($id='')
      {
	  $this->db->where('id', $id);
	  if ($this->db->delete('routedetails')) {
	    return TRUE;
	  }
	  return FALSE;
      }


/**************************** END OF ROUTE DETAILS *******************************************************/
/**************************** START OF DRIVER OFFS *******************************************************/
        public function get_driveroffs()
        {
                $query = $this->db->query('select driveroffs.*,drivers.name from driveroffs left join drivers on drivers.id=driveroffs.driverid');
                return $query->result();
        }
        
       public function save_driveroffs($data){
	  if($this->db->insert('driveroffs', $data)){
		  return true;
	  }
	  return false;
      }
      
      public function get_driveroff($id)
      { 
          $query=$this->db->get_where('driveroffs', array('id' => $id), 1);  
          return $query->result();
      }
      
      public function update_driveroffs($id, $data)
      {
	  $this->db->where('id', $id);
	  if ($this->db->update('driveroffs', $data)) {
	    return TRUE;
	  }
	  return FALSE;
      }
      
      //delete a record
      public function delete_driveroffs($id='')
      {
	  $this->db->where('id', $id);
	  if ($this->db->delete('driveroffs')) {
	    return TRUE;
	  }
	  return FALSE;
      }


/**************************** END OF DRIVER OFFS *******************************************************/
/**************************** START OF SCHEDULING *******************************************************/
        public function get_fleetschedules()
        {
                $query = $this->db->query("select fleetschedules.*,vehiclemaster.RegNo,concat(routes.source,' => ',routes.destination) route,(select drivers.name driver from driverassignments left join drivers on drivers.id=driverassignments.driverid where driverassignments.fleetid=fleetschedules.fleetid order by driverassignments.id desc limit 1) driver from fleetschedules left join vehiclemaster on vehiclemaster.id=fleetschedules.fleetid left join routes on routes.id=fleetschedules.routeid");
                return $query->result();
        }
        
       public function save_fleetschedules($data){
	  if($this->db->insert('fleetschedules', $data)){
		  return true;
	  }
	  return false;
      }
      
      public function get_fleetschedule($id)
      { 
          $query=$this->db->get_where('fleetschedules', array('id' => $id), 1);  
          return $query->result();
      }
      
      public function update_fleetschedules($id, $data)
      {
	  $this->db->where('id', $id);
	  if ($this->db->update('fleetschedules', $data)) {
	    return TRUE;
	  }
	  return FALSE;
      }
      
      //delete a record
      public function delete_fleetschedules($id='')
      {
	  $this->db->where('id', $id);
	  if ($this->db->delete('fleetschedules')) {
	    return TRUE;
	  }
	  return FALSE;
      }


/**************************** END OF SCHEDULING *******************************************************/
/**************************** START OF ASSIGNMENTS *******************************************************/
        public function get_driverassignments()
        {
                $query = $this->db->query("select driverassignments.*,vehiclemaster.RegNo,drivers.name driver from driverassignments left join vehiclemaster on vehiclemaster.id=driverassignments.fleetid left join drivers on drivers.id=driverassignments.driverid");
                return $query->result();
        }
        
       public function save_driverassignments($data){
	  if($this->db->insert('driverassignments', $data)){
		  return true;
	  }
	  return false;
      }
      
      public function get_driverassignment($id)
      { 
          $query=$this->db->get_where('driverassignments', array('id' => $id), 1);  
          return $query->result();
      }
      
      public function update_driverassignments($id, $data)
      {
	  $this->db->where('id', $id);
	  if ($this->db->update('driverassignments', $data)) {
	    return TRUE;
	  }
	  return FALSE;
      }
      
      //delete a record
      public function delete_driverassignments($id='')
      {
	  $this->db->where('id', $id);
	  if ($this->db->delete('driverassignments')) {
	    return TRUE;
	  }
	  return FALSE;
      }


/**************************** END OF ASSIGNMENTS *******************************************************/
}