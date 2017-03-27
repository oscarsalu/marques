<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
        $this->load->model('insurance_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

       public function index()
       {
           $this->data['insurance'] = $this->insurance_model->get_insurance();
           $this->render_page('theme/insurance/company', $this->data);
       }
     
    public function create()
    {
        $this->data['title'] ='create An Insurance' ;

        $this->form_validation->set_rules('name', 'Insurance Company', 'required');
       

        if ($this->form_validation->run() == true)
        {
 
            $company_data = array(
                'Name' => $this->input->post('name'),
                'ContactName' => $this->input->post('contactname'),
                'ContactNo' => $this->input->post('contactNo')
              
            );
        }
        if ($this->form_validation->run() == true && $this->insurance_model->create($company_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->index();
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
               $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Insurance Name',
                'class' => 'form-control'
            );
            $this->data['contactname'] = array(
                'name'  => 'contactname',
                'id'    => 'contactname',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Contact Name',
                'class' => 'form-control'
            );
            $this->data['contactNo'] = array(
                'name'  => 'contactNo',
                'id'    => 'contactNo',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Contact Number',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/insurance/create', $this->data);
        }
    }
    public function edit($id)
    {
        $this->data['title'] = 'Edit insurance';

        $insurance = $this->insurance_model->edit($id)->row();
        $this->data['insurance']=$insurance;
        // validate form input
        $this->form_validation->set_rules('name', 'Insurance Company', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $company_data = array(
                        'Name' => $this->input->post('name'),
                        'ContactName' => $this->input->post('contactname'),
                        'ContactNo' => $this->input->post('contactNo')
                      
                    );
               if($this->insurance_model->update($insurance->Id, $company_data))
                {
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     $this->index();
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('insurance/edit/'.$insurance->Id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $insurance->Name),
                'placeholder'=>'Insurance Name',
                'class' => 'form-control'
            );
            $this->data['contactname'] = array(
                'name'  => 'contactname',
                'id'    => 'contactname',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $insurance->ContactName),
                'placeholder'=>'Contact Name',
                'class' => 'form-control'
            );
            $this->data['contactNo'] = array(
                'name'  => 'contactNo',
                'id'    => 'contactNo',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $insurance->ContactNo),
                'placeholder'=>'Contact Number',
                'class' => 'form-control'
            );
            $this->render_page('theme/insurance/edit', $this->data);
        }

   }

    
    public function delete($value)
   {
     if($this->insurance_model->delete($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Successfully Removed');
          
     }
      $this->index();
   }

	public function renewal()
       {
           $this->data['renewal'] = $this->insurance_model->get_renewal();
           $this->render_page('theme/insurance/renewal', $this->data);
       }




	
	
	// create a new fleet object
	public function create_fleet()
    {
        $this->data['title'] ='create fleet' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('type', 'Fleet type', 'required');
        $this->form_validation->set_rules('regdate', 'Registration date', 'required');
        $this->form_validation->set_rules('regno', 'Registration Number', 'required');
        $this->form_validation->set_rules('make', 'Fleet make', 'trim');
        $this->form_validation->set_rules('model', 'Fleet model', 'trim');
        $this->form_validation->set_rules('cost', 'fleet cost', 'trim');
        $this->form_validation->set_rules('driver', 'Driver', 'trim');
        $this->form_validation->set_rules('renewal', ' Insurance Renewal Date', 'required');

        if ($this->form_validation->run() == true)
        {
 
            $fleet_data = array(
                'Type' => $this->input->post('type'),
                'RegDate'  => $this->input->post('regdate'),
                'RegNo'    => $this->input->post('regno'),
                'Make'      => $this->input->post('make'),
                'Model'      => $this->input->post('model'),
                'Cost'      => $this->input->post('cost'),
                'DriverAsigned'      => $this->input->post('driver'),
                'InsuranceDue'      => $this->input->post('renewal')
            );
        }
        if ($this->form_validation->run() == true && $this->fleet_model->create_fleet($fleet_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleet/fleets", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Fleet type',
                'class' => 'form-control'
            );
            $this->data['regno'] = array(
                'name'  => 'regno',
                'id'    => 'regno',
                 'placeholder'=>'Registration number',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('regno'),
                'class' => 'form-control'
            );
            $this->data['regdate'] = array(
                'name'  => 'regdate',
                'id'    => 'datepicker',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('regdate'),
                'class' => 'form-control'
            );
            $this->data['make'] = array(
                'name'  => 'make',
                'id'    => 'make',
                'type'  => 'text',
                'placeholder'=>'Fleet make',
                'value' => $this->form_validation->set_value('make'),
                'class' => 'form-control'
            );
            $this->data['model'] = array(
                'name'  => 'model',
                'id'    => 'model',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('model'),
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('cost'),
                'class' => 'form-control'
            );
            $this->data['driver'] = array(
                'name'  => 'driver',
                'id'    => 'driver',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('driver'),
                'class' => 'form-control'
            );
            $this->data['renewal'] = array(
                'name'  => 'renewal',
                'id'    => 'altdatepicker',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('renewal'),
                'class' => 'form-control'
            );

            $this->render_page('theme/fleet/create_fleet', $this->data);
        }
    }

	// edit a fleet
	public function edit_fleet($id)
	{
		$this->data['title'] = 'Edit Fleet';


		$fleet = $this->fleet_model->get_fleet($id)->row();
		$types=$this->fleet_model->get_vehicle_types();
		

		// validate form input
		$this->form_validation->set_rules('type', 'Fleet type', 'required');
        $this->form_validation->set_rules('regdate', 'Registration date', 'required');
        $this->form_validation->set_rules('regno', 'Registration Number', 'required');
        $this->form_validation->set_rules('make', 'Fleet make', 'trim');
        $this->form_validation->set_rules('model', 'Fleet model', 'trim');
        $this->form_validation->set_rules('cost', 'fleet cost', 'trim');
        $this->form_validation->set_rules('driver', 'Driver', 'trim');
        $this->form_validation->set_rules('renewal', ' Insurance Renewal Date', 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

		

			if ($this->form_validation->run() === TRUE)
			{
				$fleet_data = array(
                'Type' => $this->input->post('type'),
                'RegDate'  => $this->input->post('regdate'),
                'RegNo'    => $this->input->post('regno'),
                'Make'      => $this->input->post('make'),
                'Model'      => $this->input->post('model'),
                'Cost'      => $this->input->post('cost'),
                'DriverAsigned'      => $this->input->post('driver'),
                'InsuranceDue'      => $this->input->post('renewal')
               );

			

		// check to see if we are updating the vehicle
			   if($this->fleet_model->update_fleet($fleet->ID, $fleet_data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				   	redirect('fleet/fleets', 'refresh');
					
			    }
			    else
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    redirect('fleet/edit_fleet/'.$fleet->ID, 'refresh');

			    }

			}
		}

		// display the edit fleet form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the fleet to the view
		$this->data['fleet'] = $fleet;
		$this->data['types'] = $types;
		
        

		 $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $fleet->Type),
                'placeholder'=>'Fleet type',
                'class' => 'form-control'
            );
            $this->data['regno'] = array(
                'name'  => 'regno',
                'id'    => 'regno',
                 'placeholder'=>'Registration number',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('regno', $fleet->RegNo),
                'class' => 'form-control'
            );
            $this->data['regdate'] = array(
                'name'  => 'regdate',
                'id'    => 'regdate',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('regdate', $fleet->RegDate),
                'class' => 'form-control'
            );
            $this->data['make'] = array(
                'name'  => 'make',
                'id'    => 'make',
                'type'  => 'text',
                'placeholder'=>'Fleet make',
                'value' => $this->form_validation->set_value('make', $fleet->Make),
                'class' => 'form-control'
            );
            $this->data['model'] = array(
                'name'  => 'model',
                'id'    => 'model',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('model', $fleet->Model),
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('cost', $fleet->Cost),
                'class' => 'form-control'
            );
            $this->data['driver'] = array(
                'name'  => 'driver',
                'id'    => 'driver',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('driver', $fleet->DriverAsigned),
                'class' => 'form-control'
            );
            $this->data['renewal'] = array(
                'name'  => 'renewal',
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('renewal',$fleet->InsuranceDue),
                'class' => 'form-control'
            );


		$this->render_page('theme/fleet/edit_fleet', $this->data);
	}

  public function delete_fleet($id='')
  {
     
       if(isset($id)){
          $isFleetDeleted=$this->fleet_model->delete_fleet($id);
          if($isFleetDeleted==TRUE){
            $this->data['message']="fleet successfuly deleted";
            redirect('fleet/fleets',$this->data);
          }
       }
  }

//**********************************************end of fleet object ***************************************************/

  /*********************************** Driver object *****************************************************************************/


   //get the drivers
    public function drivers()
    {

        
            
            $this->data['drivers'] = $this->fleet_model->get_drivers();
            
            $this->render_page('theme/fleet/drivers', $this->data);
        
    }




    
    
    // create a new driver object
    public function create_driver()
    {
        

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('name', 'Driver name', 'required');
        $this->form_validation->set_rules('date_added', 'Date added', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('details', 'details', 'trim');
      

        if ($this->form_validation->run() == true)
        {
 
            $driver_data = array(
                'name' => $this->input->post('name'),
                'date_added'  => $this->input->post('date_added'),
                'phone'    => $this->input->post('phone'),
                'details'      => $this->input->post('details'),
            );
        }
        if ($this->form_validation->run() == true && $this->fleet_model->create_driver($driver_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleet/drivers", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name'),
                'placeholder'=>'Driver name',
                'class' => 'form-control'
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                 'placeholder'=>'Phone number',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
                'class' => 'form-control'
            );
            $this->data['date_added'] = array(
                'name'  => 'date_added',
                'id'    => 'datepicker',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('date_added'),
                'class' => 'form-control'
            );
            $this->data['details'] = array(
                'name'  => 'details',
                'id'    => 'details',
                'placeholder'=>'Other driver details',
                'value' => $this->form_validation->set_value('details'),
                'class' => 'form-control'
            );
     

            $this->render_page('theme/fleet/create_driver', $this->data);
        }
    }

    // edit a driver
    public function edit_driver($id)
    {
       


        $driver = $this->fleet_model->get_driver($id)->row();
        
         // validate form input
        $this->form_validation->set_rules('name', 'Driver name', 'required');
        $this->form_validation->set_rules('date_added', 'Date added', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('details', 'details', 'trim');

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $driver_data = array(
                'name' => $this->input->post('name'),
                'date_added'  => $this->input->post('date_added'),
                'phone'    => $this->input->post('phone'),
                'details'      => $this->input->post('details'),
            );

            

        // check to see if we are updating the driver record
               if($this->fleet_model->update_driver($driver->id, $driver_data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
                    redirect('fleet/drivers', 'refresh');
                    
                }
                else
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors() );
                    redirect('fleet/edit_driver/'.$driver->id, 'refresh');

                }

            }
        }

        // display the edit fleet form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the fleet to the view
        $this->data['driver'] = $driver;
      
        
        
     $this->data['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name', $driver->name),
                'placeholder'=>'Driver name',
                'class' => 'form-control'
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                 'placeholder'=>'Phone number',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone', $driver->phone),
                'class' => 'form-control'
            );
            $this->data['date_added'] = array(
                'name'  => 'date_added',
                'id'    => 'datepicker',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('date_added', $driver->date_added),
                'class' => 'form-control'
            );
            $this->data['details'] = array(
                'name'  => 'details',
                'id'    => 'details',
                'placeholder'=>'Fleet make',
                'value' => $this->form_validation->set_value('details', $driver->details),
                'class' => 'form-control'
            );
     


        $this->render_page('theme/fleet/edit_driver', $this->data);
    }

  public function delete_driver($id='')
  {
     
       if(isset($id)){
          $isDriverDeleted=$this->fleet_model->delete_driver($id);
          if($isDriverDeleted==TRUE){
            $this->data['message']="fleet successfuly deleted";
            redirect('fleet/drivers',$this->data);
          }
       }
  }

///****************************end of delete driver *******************************************************/
	

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
