<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
        $this->load->model('fleet_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

/**********************************************************************************************
/** OBJECT: VEHICLE TYPE
/**********************************************************************************************/

    //show available vehicle  types
       public function vehicle_types()
       {
           //retrieve the vehicle types
           $this->data['vehicle_types'] = $this->fleet_model->get_vehicle_types();
           $this->render_page('theme/fleet/vehicle_types', $this->data);
       }
     
    //create a vehicle type object
    public function create_vehicle_type()
    {
        $this->data['title'] ='create vehicle type' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('type', 'vehicle type', 'required');
       

        if ($this->form_validation->run() == true)
        {
 
            $vehicle_data = array(
                'VehicleType' => $this->input->post('type')
              
            );
        }
        if ($this->form_validation->run() == true && $this->fleet_model->create_vehicle_type($vehicle_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fleet/vehicle_types", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Vehicle type',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/fleet/create_vehicle_type', $this->data);
        }
    }
   
 //edit vehicle type


    public function edit_vehicle_type($id)
    {
        $this->data['title'] = 'Edit Vehicle Type';

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->fleet_model->update_vehicle_type($id))))
        {
            redirect('fleet_index', 'refresh');
        }

        $vehicle_type = $this->fleet_model->get_vehicle_type($id)->row();
      
        // validate form input
        $this->form_validation->set_rules('type', 'Vehicle type', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                $vehicle_data = array( 'type' => $this->input->post('type'));
            

          // check to see if we are updating the vehicle type
               if($this->fleet_model->update_vehicle_type($vehicle_type->id, $data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     redirect("fleet/vehicle_types", 'refresh');
 
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('fleet/edit_vehicle_type/'.$vehicle_type->id, 'refresh');
            }
        }else{

              $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $vehicle_type->type),
                'placeholder'=>'Vehicle type',
                'class' => 'form-control'
            );
            $this->render_page('fleet/edit_vehicle_type/'.$vehicle_type->id);
        }

   }

    
    //delete the vehicle type
    public function delete_vehicle_type($value='')
   {
     if($this->fleet_model->delete_vehicle_type($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Vehicle Type successfuly removed');
          
     }
      redirect('fleet/vehicle_types', 'refresh');
   }

  
   public function delete_many_vehicle_types()
   {
      $ids= $_POST['values'];
      if($this->fleet_model->delete_many_vehicle_types($ids)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Vehicle Types successfuly removed');
          
     }
      redirect('fleet/vehicle_types', 'refresh');
   }

    /*************************************end of the object **********************************************************************/





	// redirect if needed, otherwise display the fleet list
	public function fleet_index()
	{

			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the fleets
			$this->data['fleets'] = $this->ion_auth->fleets()->result();
			foreach ($this->data['fleets'] as $k => $fleet)
			{
				$this->data['fleets'][$k]->groups = $this->ion_auth->get_fleets_groups($fleet->id)->result();
			}
            
			$this->render_page('theme/auth/index', $this->data);
		
	}



	
	
	// create a new fleet object
	public function create_fleet()
    {
        $this->data['title'] ='create fleet' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
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
                'type' => $this->input->post('type'),
                'RegDate'  => $this->input->post('regdate'),
                'RegNo'    => $this->input->post('regno'),
                'make'      => $this->input->post('make'),
                'model'      => $this->input->post('model'),
                'cost'      => $this->input->post('cost'),
                'driver'      => $this->input->post('driver'),
                'renewal'      => $this->input->post('renewal')
            );
        }
        if ($this->form_validation->run() == true && $this->settings_model->create_fleet($fleet_data))
        {
            // check to see if we are creating the object
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("settings/fleet_index", 'refresh');
        }
        else
        {
            // display the create fleet form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

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
                'id'    => 'regdate',
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
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('renewal'),
                'class' => 'form-control'
            );

            $this->render_page('theme/settings/create_fleet', $this->data);
        }
    }

	// edit a fleet
	public function edit_fleet($id)
	{
		$this->data['title'] = 'Edit Fleet';

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->settings_model->fleet()->row()->id == $id)))
		{
			redirect('fleet_index', 'refresh');
		}

		$fleet = $this->settings_model->fleet($id)->row();
		$types=$this->settings_model->types()->result_array();
		

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
                'type' => $this->input->post('type'),
                'RegDate'  => $this->input->post('regdate'),
                'RegNo'    => $this->input->post('regno'),
                'make'      => $this->input->post('make'),
                'model'      => $this->input->post('model'),
                'cost'      => $this->input->post('cost'),
                'driver'      => $this->input->post('driver'),
                'renewal'      => $this->input->post('renewal')
               );

			

		// check to see if we are updating the vehicle
			   if($this->settings_model->update($fleet->id, $data))
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('fleet_index', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('fleet_index', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

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
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $fleet->first_name),
			'class' => 'form-control'
		);
		 $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $fleet->type),
                'placeholder'=>'Fleet type',
                'class' => 'form-control'
            );
            $this->data['regno'] = array(
                'name'  => 'regno',
                'id'    => 'regno',
                 'placeholder'=>'Registration number',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('regno', $fleet->Regno),
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
                'value' => $this->form_validation->set_value('make', $fleet->make),
                'class' => 'form-control'
            );
            $this->data['model'] = array(
                'name'  => 'model',
                'id'    => 'model',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('model', $fleet->model),
                'class' => 'form-control'
            );
            $this->data['cost'] = array(
                'name'  => 'cost',
                'id'    => 'cost',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('cost', $fleet->Regno),
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
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('renewal'),
                'class' => 'form-control'
            );


		$this->render_page('theme/auth/edit_fleet', $this->data);
	}

	

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
