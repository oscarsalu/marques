<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fleetscheduling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
                $this->load->model('fleetscheduling_model');
                $this->load->model('fleet_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

/**************************** START OF ROUTES *******************************************************/
    public function routes()
    {
	$this->data['routes'] = $this->fleetscheduling_model->get_routes();
	$this->render_page('theme/routes/routes', $this->data);
    } 	
    
   // create a new route object
    public function create_route()
    {
        $this->data['title'] ='Create Route' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('source', 'Source', 'required');
        $this->form_validation->set_rules('destination', 'Destination', 'required');

        if ($this->form_validation->run() == true)
        {
            $route_data = array(
                'source' => $this->input->post('source'),
                'destination' => $this->input->post('destination'),
                'remarks'  => $this->input->post('remarks'),
                'createdby' => $this->session->userdata('user_id')
                );
        }
        if ($this->form_validation->run() == true && $this->fleetscheduling_model->save_route($route_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleetscheduling/routes", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['source'] = array(
                'name'  => 'source',
                'id'    => 'source',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('source'),
                'placeholder'=>'Source',
                'class' => 'form-control'
            );
            $this->data['destination'] = array(
                'name'  => 'destination',
                'id'    => 'destination',
                'placeholder'=>'Destination',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('destination'),
                'class' => 'form-control'
            );
            $this->data['remarks'] = array(
                'name'  => 'remarks',
                'id'    => 'remarks',
                'placeholder'=>'Remarks',
                'type'  => 'textarea',
                'value' => $this->form_validation->set_value('remarks'),
                'class' => 'form-control'
            );

            $this->render_page('theme/routes/create_route', $this->data);
        }
    }
    
  // edit a route
  public function edit_route($id)
  {
	  $this->data['title'] = 'Edit Route';


	  $route = $this->fleetscheduling_model->get_route($id)->row();
	  

	  // validate form input
          $this->form_validation->set_rules('source', 'Source', 'required');
          $this->form_validation->set_rules('destination', 'Destination', 'required');

	  if (isset($_POST) && !empty($_POST))
	  {
		  // do we have a valid request?
		  if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
		  {
			  show_error($this->lang->line('error_csrf'));
		  }

	  

		  if ($this->form_validation->run() === TRUE)
		  {
                      $route_data = array(
			  'source' => $this->input->post('source'),
			  'destination' => $this->input->post('destination'),
			  'remarks'  => $this->input->post('remarks')
		      );		  

	              // check to see if we are updating the vehicle
		      if($this->fleetscheduling_model->update_route($route->id, $route_data))
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->messages() );
			      redirect('fleetscheduling/routes', 'refresh');
				  
		      }
		      else
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->errors() );
			      redirect('fleetscheduling/edit_route/'.$route->id, 'refresh');

		      }

		  }
	  }

	  // display the edit route form
	  $this->data['csrf'] = $this->_get_csrf_nonce();

	  // set the flash data error message if there is one
	  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

	  // pass the route to the view
	  $this->data['route'] = $route; 

	   $this->data['source'] = array(
	  'name'  => 'source',
	  'id'    => 'source',
	  'type'  => 'text',
	  'value' => $this->form_validation->set_value('source', $route->source),
	  'placeholder'=>'Source',
	  'class' => 'form-control'
          );
          
          $this->data['destination'] = array(
	  'name'  => 'destination',
	  'id'    => 'destination',
	  'type'  => 'text',
	  'value' => $this->form_validation->set_value('destination', $route->destination),
	  'placeholder'=>'Destination',
	  'class' => 'form-control'
          );
          
          $this->data['remarks'] = array(
	  'name'  => 'remarks',
	  'id'    => 'remarks',
	  'type'  => 'text',
	  'value' => $this->form_validation->set_value('remarks', $route->remarks),
	  'placeholder'=>'Remarks',
	  'class' => 'form-control'
          );
	  $this->render_page('theme/routes/edit_route', $this->data);
  }
  
  //Delete Route
  public function delete_route($id='')
  {
     
       if(isset($id)){
          $isFleetDeleted=$this->fleetscheduling_model->delete_route($id);
          if($isFleetDeleted==TRUE){
            $this->data['message']="Route successfuly deleted";
            redirect('fleetscheduling/routes',$this->data);
          }
       }
  }
  
/**************************** END OF ROUTES *******************************************************/

/**************************** START OF ROUTE DETAILS *******************************************************/

public function routedetails($id)
    {
       
	$this->data['routedetails'] = $this->fleetscheduling_model->get_routedetails();
	$this->data['routeid'] =  $id;
         
	$this->render_page('theme/routedetails/routedetails', $this->data);
    } 	
    
   // create a new route object
    public function create_routedetail($id)
    {
        $this->data['title'] ='Create Route Detail' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longititude', 'longititude', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $routeid=$this->input->post('routeid');

        if ($this->form_validation->run() == true)
        {
            $routedetail_data = array(
                'routeid' => $this->input->post('routeid'),
                'name' => $this->input->post('name'),
                'latitude' => $this->input->post('latitude'),
                'longititude'  => $this->input->post('longititude'),
                'type'  => $this->input->post('type'),
                'createdby' => $this->session->userdata('user_id')
                );
        }
        if ($this->form_validation->run() == true && $this->fleetscheduling_model->save_routedetails($routedetail_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleetscheduling/routedetails/".$routeid, 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['routeid'] = $id;
            $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name'),
                'placeholder'=>'Name',
                'class' => 'form-control'
            );
            $this->data['latitude'] = array(
                'name'  => 'latitude',
                'id'    => 'latitude',
                'placeholder'=>'Latitude',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('latitude'),
                'class' => 'form-control'
            );
            $this->data['longititude'] = array(
                'name'  => 'longititude',
                'id'    => 'longititude',
                'placeholder'=>'Longititude',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('longititude'),
                'class' => 'form-control'
            );
            
            $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'placeholder'=>'Type',
                'type'  => 'radio',
                'value' => $this->form_validation->set_value('type'),
                'class' => 'form-control'
            );
            
            

            $this->render_page('theme/routedetails/create_routedetails', $this->data);
        }
    }
    
  // edit a route
  public function edit_routedetails($id)
  {
	  $this->data['title'] = 'Edit Route Details';


	  $routedetail = $this->fleetscheduling_model->get_routedetail($id);
	  

	   // validate form input
	  $this->form_validation->set_rules('name', 'name', 'required');
	  $this->form_validation->set_rules('latitude', 'latitude', 'required');
	  $this->form_validation->set_rules('longititude', 'longititude', 'required');
	  $this->form_validation->set_rules('type', 'type', 'required');
          $id=$this->input->post('id');
          $routeid=$this->input->post('routeid');
	  if (isset($_POST) && !empty($_POST))
	  {
		  // do we have a valid request?
		  if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
		  {
			  show_error($this->lang->line('error_csrf'));
		  }

	  

		  if ($this->form_validation->run() === TRUE)
		  {
                      $routedetail_data = array(
		      'name' => $this->input->post('name'),
		      'latitude' => $this->input->post('latitude'),
		      'longititude'  => $this->input->post('longititude'),
		      'type'  => $this->input->post('type'),
		      'createdby' => $this->session->userdata('user_id')
		      );		  

	              // check to see if we are updating
		      if($this->fleetscheduling_model->update_routedetails($id, $routedetail_data))
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->messages() );
			      redirect('fleetscheduling/routedetails/'.$routeid, 'refresh');
				  
		      }
		      else
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->errors() );
			      redirect('fleetscheduling/edit_routedetails/'.$id, 'refresh');

		      }

		  }
	  }

	  // display the edit route details form
	  $this->data['csrf'] = $this->_get_csrf_nonce();

	  // set the flash data error message if there is one
	  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

	  // pass the route detail to the view
	  $this->data['routedetail'] = $routedetail; 
          
	  $this->render_page('theme/routedetails/edit_routedetails', $this->data);
  }
  
  //Delete Route
  public function delete_routedetails($id='')
  {
     
       if(isset($id)){
          $isRouteDetailDeleted=$this->fleetscheduling_model->delete_routedetails($id);
          if($isRouteDetailDeleted==TRUE){
            $this->data['message']="Route Detail successfuly deleted";
            redirect('fleetscheduling/routedetails',$this->data);
          }
       }
  }



/**************************** END OF ROUTE DETAILS *******************************************************/
/**************************** START OF DRIVER OFFS *******************************************************/

    public function driveroffs()
    {
       
	$this->data['driveroffs'] = $this->fleetscheduling_model->get_driveroffs();
         
	$this->render_page('theme/driveroffs/driveroffs', $this->data);
    } 	
    
    public function create_driveroffs()
    {
        $this->data['title'] ='Create Driver Offs' ;
        $this->data['drivers'] = $this->fleet_model->get_drivers();

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('driverid', 'Driver', 'required');
        $this->form_validation->set_rules('startdate', 'Start Date', 'required');
        $this->form_validation->set_rules('enddate', 'End Date', 'required');
        $this->form_validation->set_rules('status', 'Status On', 'required');

        if ($this->form_validation->run() == true)
        {
            $driveroff_data = array(
                'driverid' => $this->input->post('driverid'),
                'startdate' => $this->input->post('startdate'),
                'enddate'  => $this->input->post('enddate'),
                'returnedon' => $this->input->post('returnedon'),
                'status' => $this->input->post('status'),
                'remarks'  => $this->input->post('remarks'),
                );
        }
        if ($this->form_validation->run() == true && $this->fleetscheduling_model->save_driveroffs($driveroff_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleetscheduling/driveroffs", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            
  
            $this->render_page('theme/driveroffs/create_driveroffs', $this->data);
        }
    }
    
  // edit a route
  public function edit_driveroffs($id)
  {
	  $this->data['title'] = 'Edit Driver Offs';


	  $driveroffs = $this->fleetscheduling_model->get_driveroff($id);
	  $this->data['drivers'] = $this->fleet_model->get_drivers();
	  

	  // validate form input
	  $this->form_validation->set_rules('driverid', 'Driver', 'required');
	  $this->form_validation->set_rules('startdate', 'Start Date', 'required');
	  $this->form_validation->set_rules('enddate', 'End Date', 'required');
	  $this->form_validation->set_rules('status', 'Status On', 'required');
	  $id=$this->input->post('id');
	  
	  if (isset($_POST) && !empty($_POST))
	  {
		  // do we have a valid request?
		  if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
		  {
			  show_error($this->lang->line('error_csrf'));
		  }

	  

		  if ($this->form_validation->run() === TRUE)
		  {
                      $driveroff_data = array(
			'driverid' => $this->input->post('driverid'),
			'startdate' => $this->input->post('startdate'),
			'enddate'  => $this->input->post('enddate'),
			'returnedon' => $this->input->post('returnedon'),
			'status' => $this->input->post('status'),
			'remarks'  => $this->input->post('remarks'),
			);		  

	              // check to see if we are updating
		      if($this->fleetscheduling_model->update_driveroffs($id, $driveroff_data))
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->messages() );
			      redirect('fleetscheduling/driveroffs', 'refresh');
				  
		      }
		      else
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->errors() );
			      redirect('fleetscheduling/edit_driveroffs/'.$id, 'refresh');

		      }

		  }
	  }

	  $this->data['csrf'] = $this->_get_csrf_nonce();

	  // set the flash data error message if there is one
	  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

	  // pass the route detail to the view
	  $this->data['driveroffs'] = $driveroffs; 
          
	  $this->render_page('theme/driveroffs/edit_driveroffs', $this->data);
  }
  
  //Delete Route
  public function delete_driveroffs($id='')
  {
     
       if(isset($id)){
          if($this->fleetscheduling_model->delete_driveroffs($id)==TRUE){
            $this->data['message']="Driver Off successfuly deleted";
            redirect('fleetscheduling/driveroffs',$this->data);
          }
       }
  }

/**************************** END OF DRIVER OFFS *******************************************************/

/**************************** START OF SCHEDULING *******************************************************/

    public function fleetschedules()
    {
       
	$this->data['fleetschedules'] = $this->fleetscheduling_model->get_fleetschedules();
         
	$this->render_page('theme/fleetschedules/fleetschedules', $this->data);
    } 	
    
    public function create_fleetschedules()
    {
        $this->data['title'] ='Create fleetschedules' ;
        $this->data['fleets'] = $this->fleet_model->get_fleets();
        $this->data['routes'] = $this->fleetscheduling_model->get_routes();

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('fleetid', 'Fleet', 'required');
        $this->form_validation->set_rules('routeid', 'Route', 'required');
        $this->form_validation->set_rules('departuretime', 'Departure Time', 'required');
        $this->form_validation->set_rules('expectedarrivaltime', 'Expectedarrival Time', 'required');
        $this->form_validation->set_rules('actualarrivaltime', 'Actualarrival Time', 'required');

        if ($this->form_validation->run() == true)
        {
            $fleetschedule_data = array(
                'fleetid' => $this->input->post('fleetid'),
                'routeid' => $this->input->post('routeid'),
                'departuretime'  => $this->input->post('departuretime'),
                'expectedarrivaltime' => $this->input->post('expectedarrivaltime'),
                'actualarrivaltime' => $this->input->post('actualarrivaltime'),
                'remarks'  => $this->input->post('remarks'),
                );
        }
        if ($this->form_validation->run() == true && $this->fleetscheduling_model->save_fleetschedules($fleetschedule_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleetscheduling/fleetschedules", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            
  
            $this->render_page('theme/fleetschedules/create_fleetschedules', $this->data);
        }
    }
    
  public function edit_fleetschedules($id)
  {
	  $this->data['title'] = 'Edit Fleet Schedule';


	  $this->data['fleetschedules'] = $this->fleetscheduling_model->get_fleetschedule($id);
	  $this->data['fleets'] = $this->fleet_model->get_fleets();
          $this->data['routes'] = $this->fleetscheduling_model->get_routes();

	  // validate form input
	  $this->form_validation->set_rules('fleetid', 'Fleet', 'required');
	  $this->form_validation->set_rules('routeid', 'Route', 'required');
	  $this->form_validation->set_rules('departuretime', 'Departure Time', 'required');
	  $this->form_validation->set_rules('expectedarrivaltime', 'Expectedarrival Time', 'required');
	  $this->form_validation->set_rules('actualarrivaltime', 'Actualarrival Time', 'required');
	  $id=$this->input->post('id');
	  
	  if (isset($_POST) && !empty($_POST))
	  {
		  // do we have a valid request?
		  if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
		  {
			  show_error($this->lang->line('error_csrf'));
		  }

	  

		  if ($this->form_validation->run() === TRUE)
		  {
                      $fleetschedule_data = array(
			'fleetid' => $this->input->post('fleetid'),
			'routeid' => $this->input->post('routeid'),
			'departuretime'  => $this->input->post('departuretime'),
			'expectedarrivaltime' => $this->input->post('expectedarrivaltime'),
			'actualarrivaltime' => $this->input->post('actualarrivaltime'),
			'remarks'  => $this->input->post('remarks'),
			);		  

	              // check to see if we are updating
		      if($this->fleetscheduling_model->update_fleetschedules($id, $fleetschedule_data))
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->messages() );
			      redirect('fleetscheduling/fleetschedules', 'refresh');
				  
		      }
		      else
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->errors() );
			      redirect('fleetscheduling/edit_fleetschedules/'.$id, 'refresh');

		      }

		  }
	  }

	  $this->data['csrf'] = $this->_get_csrf_nonce();

	  // set the flash data error message if there is one
	  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
 
          
	  $this->render_page('theme/fleetschedules/edit_fleetschedules', $this->data);
  }
  
  
  public function delete_fleetschedules($id='')
  {
     
       if(isset($id)){
          if($this->fleetscheduling_model->delete_fleetschedules($id)==TRUE){
            $this->data['message']="successfuly deleted";
            redirect('fleetscheduling/fleetschedules',$this->data);
          }
       }
  }
/**************************** END OF SCHEDULING *******************************************************/
/**************************** START OF DRIVER ASSIGNMENT *******************************************************/

    public function driverassignments()
    {
       
	$this->data['driverassignments'] = $this->fleetscheduling_model->get_driverassignments();
         
	$this->render_page('theme/driverassignments/driverassignments', $this->data);
    } 	
    
    public function create_driverassignments()
    {
        $this->data['title'] ='Create Driver Assignments' ;
        $this->data['fleets'] = $this->fleet_model->get_fleets();
        $where="where id not in(select driverid from driveroffs where status!='closed')";
	$this->data['drivers'] = $this->fleet_model->get_available_drivers($where);

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('fleetid', 'Fleet', 'required');
        $this->form_validation->set_rules('driverid', 'Driver', 'required');
        $this->form_validation->set_rules('assignedon', 'Assigned on', 'required');
        $this->form_validation->set_rules('assignmentdate', 'Assignment Date', 'required');

        if ($this->form_validation->run() == true)
        {
            $driverassignments_data = array(
                'fleetid' => $this->input->post('fleetid'),
                'driverid' => $this->input->post('driverid'),
                'assignedon'  => $this->input->post('assignedon'),
                'assignmentdate' => $this->input->post('assignmentdate'),
                'remarks'  => $this->input->post('remarks')
                );
        }
        if ($this->form_validation->run() == true && $this->fleetscheduling_model->save_driverassignments($driverassignments_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleetscheduling/driverassignments", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            
  
            $this->render_page('theme/driverassignments/create_driverassignments', $this->data);
        }
    }
    
  public function edit_driverassignments($id)
  {
	  $this->data['title'] = 'Edit Driver Assignments';


	  $this->data['driverassignments'] = $this->fleetscheduling_model->get_driverassignment($id);
	  $this->data['fleets'] = $this->fleet_model->get_fleets();
	  $where="where id not in(select driverid from driveroffs where status!='closed')";
	  $this->data['drivers'] = $this->fleet_model->get_available_drivers($where);

	  // validate form input
	  $this->form_validation->set_rules('fleetid', 'Fleet', 'required');
	  $this->form_validation->set_rules('driverid', 'Driver', 'required');
	  $this->form_validation->set_rules('assignedon', 'Assigned on', 'required');
	  $this->form_validation->set_rules('assignmentdate', 'Assignment Date', 'required');
	  
	  if (isset($_POST) && !empty($_POST))
	  {
		  // do we have a valid request?
		  if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
		  {
			  show_error($this->lang->line('error_csrf'));
		  }

	  

		  if ($this->form_validation->run() === TRUE)
		  {
                      $driverassignments_data = array(
			'fleetid' => $this->input->post('fleetid'),
			'driverid' => $this->input->post('driverid'),
			'assignedon'  => $this->input->post('assignedon'),
			'assignmentdate' => $this->input->post('assignmentdate'),
			'remarks'  => $this->input->post('remarks')
			);		  

	              // check to see if we are updating
		      if($this->fleetscheduling_model->update_driverassignments($id, $driverassignments_data))
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->messages() );
			      redirect('fleetscheduling/driverassignments', 'refresh');
				  
		      }
		      else
		      {
			  // redirect them back to the admin page if admin, or to the base url if non admin
			      $this->session->set_flashdata('message', $this->ion_auth->errors() );
			      redirect('fleetscheduling/edit_driverassignments/'.$id, 'refresh');

		      }

		  }
	  }

	  $this->data['csrf'] = $this->_get_csrf_nonce();

	  // set the flash data error message if there is one
	  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
 
          
	  $this->render_page('theme/driverassignments/edit_driverassignments', $this->data);
  }
  
  
  public function delete_driverassignments($id='')
  {
     
       if(isset($id)){
          if($this->fleetscheduling_model->delete_driverassignments($id)==TRUE){
            $this->data['message']="successfuly deleted";
            redirect('fleetscheduling/driverassignments',$this->data);
          }
       }
  }
/**************************** END OF DRIVER ASSIGNMENTS *******************************************************/
    public function _get_csrf_nonce()
    {
	    $this->load->helper('string');
	    $key   = random_string('alnum', 8);
	    $value = random_string('alnum', 20);
	    $this->session->set_flashdata('csrfkey', $key);
	    $this->session->set_flashdata('csrfvalue', $value);

	    return array($key => $value);
    }

    public function _valid_csrf_nonce()
    {
	    $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
	    if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
	    {
		    return TRUE;
	    }
	    else
	    {
		    return FALSE;
	    }
    }

    public function render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

       
        $this->load->view('theme/header');
        $this->load->view('theme/sidebar');
        $this->load->view($view, $this->viewdata, $returnhtml);
        $this->load->view('theme/footer');
    
    } 
}
