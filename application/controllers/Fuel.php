<?php defined('BASEPATH') OR exit('No direct script access allowed');

class fuel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fuel_model');
    $this->load->model('fleet_model');
		$this->lang->load('auth');
		

		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

/**********************************************************************************************
/** OBJECT: fuel_station
/**********************************************************************************************/

    //show available fuel_stations
       public function fuel_stations()
       {
           //retrieve the fuel_stations
           $this->data['fuel_stations'] = $this->fuel_model->get_fuel_stations();
           $this->render_page('theme/fuel/fuel_stations', $this->data);
       }
  
   //create a fuel_station object
    public function create_fuel_station()
    {
        $this->data['title'] ='create fuel_station' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('fuel_station_name', 'fuel station', 'required');
        $this->form_validation->set_rules('address', 'fuel_station', 'trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'trim');
        $this->form_validation->set_rules('deposit', 'deposit', 'trim');
        if ($this->form_validation->run() == true)
        {
 
            $fuel_station_data = array(
                'fuelStation' => $this->input->post('fuel_station_name'),
                'Address' => $this->input->post('address'),
                'ContactNumber' => $this->input->post('telephone'),
                'Deposit' => $this->input->post('deposit'),
            );
        }
        if ($this->form_validation->run() == true && $this->fuel_model->create_fuel_station($fuel_station_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fuel/fuel_stations", 'refresh');
        }
        else
        {
            // display the create fuel form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                $this->data['csrf'] = $this->_get_csrf_nonce();
	            $this->data['fuel_station_name'] = array(
	                'name'  => 'fuel_station_name',
	                'id'    => 'fuel_station_name',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('fuel_station_name'),
	                'placeholder'=>'name of the fuel station',
	                'class' => 'form-control'
	            );
                $this->data['address'] = array(
	                'name'  => 'address',
	                'id'    => 'address',
	                'value' => $this->form_validation->set_value('address'),
	                'placeholder'=>'Address of the fuel_station',
	                'class' => 'form-control'
	            ); 
	             $this->data['telephone'] = array(
	                'name'  => 'telephone',
	                'id'    => 'telephone',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('telephone'),
	                'placeholder'=>'Phone number of the fuel_station',
	                'class' => 'form-control'
	            );  
                 $this->data['deposit'] = array(
	                'name'  => 'deposit',
	                'id'    => 'deposit',
	                'value' => $this->form_validation->set_value('deposit'),
	                'placeholder'=>'deposit',
	                'class' => 'form-control'
	            );
            $this->render_page('theme/fuel/create_fuel_station', $this->data);
        }
      }
   /************************************************end of create fuel_station function ***************************************************************/

   /*******/
   /*******Function name: edit fuel_station**************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
   public function edit_fuel_station($id)
    {
       


        $fuel_station = $this->fuel_model->get_fuel_station($id)->row();
        $this->data['fuel_station']=$fuel_station;
        // validate form input
      
        $this->form_validation->set_rules('fuel_station_name', 'fuel station', 'required');
        $this->form_validation->set_rules('address', 'fuel_station', 'trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'trim');
        $this->form_validation->set_rules('deposit', 'deposit', 'trim');

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
              $fuel_station_data = array(
                'fuelStation' => $this->input->post('fuel_station_name'),
                'Address' => $this->input->post('address'),
                'ContactNumber' => $this->input->post('telephone'),
                'Deposit' => $this->input->post('deposit'),
            );
	            

          // check to see if we are updating the fuel_station type
               if($this->fuel_model->update_fuel_station($fuel_station->Id, $fuel_station_data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                     $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     redirect("fuel/fuel_stations", 'refresh');
 
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('fuel/edit_fuel_station/'.$fuel_station->Id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['fuel_station_name'] = array(
	                'name'  => 'fuel_station_name',
	                'id'    => 'fuel_station_name',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('fuel_station_name',$fuel_station->FuelStation),
	                'placeholder'=>'name of the fuel_station',
	                'class' => 'form-control'
	            );
                $this->data['address'] = array(
	                'name'  => 'address',
	                'id'    => 'address',
	                'value' => $this->form_validation->set_value('address', $fuel_station->Address),
	                'placeholder'=>'Address of the fuel_station',
	                'class' => 'form-control'
	            ); 
	             $this->data['telephone'] = array(
	                'name'  => 'telephone',
	                'id'    => 'telephone',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('telephone', $fuel_station->ContactNumber),
	                'placeholder'=>'Phone number of the fuel_station',
	                'class' => 'form-control'
	            );  
                 $this->data['deposit'] = array(
	                'name'  => 'deposit',
	                'id'    => 'deposit',
	                'value' => $this->form_validation->set_value('deposit', $fuel_station->Deposit),
	                'placeholder'=>'deposit',
	                'class' => 'form-control'
	            );
            $this->render_page('theme/fuel/edit_fuel_station', $this->data);
        }

   }
   /******************************************end of edit fuel_station function *************************************************************/


   /*******/
   /*******Function name: delete fuel_station**************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
    public function delete_fuel_station($value='')
   {
     if($this->fuel_model->delete_fuel_station($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','The fuel_station has been successfuly removed');
          
     }
      redirect('fuel/fuel_stations', 'refresh');
   }
 /************end of delete fuel_station function *******************************************************************************************/
  /*******/
   /*******Function name: delete many fuel_stations **************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
   public function delete_many_fuel_stations()
   {
      $ids= $_POST['values'];
      if($this->fuel_model->delete_many_fuel_stations($ids)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Selected fuel_stations successfuly removed');
          
     }
      redirect('fuel/fuel_stations', 'refresh');
   }
  /************end of delete many fuel_stations function *******************************************************************************************/
    

/**********************************************************************************************
/** OBJECT: fuel_record
/**********************************************************************************************/

    //show available fuel_records
       public function fuel_records()
       {
           //retrieve the fuel_records
           $this->data['fuel_records'] = $this->fuel_model->get_fuel_records();
           $this->render_page('theme/fuel/fuel_records', $this->data);
       }

//create a fuel_record object
    public function create_fuel_record()
    {
        $this->data['title'] ='create fuel_record' ;
     //var_dump($_POST);
      
        // validate form input
        $this->form_validation->set_rules('vehicle', 'vehicle', 'required');
        $this->form_validation->set_rules('fuel_date', 'fuel date', 'required');
        $this->form_validation->set_rules('fuel_station', 'fuel station', 'required');
        $this->form_validation->set_rules('litre_price', 'litre price', 'required');
       // $this->form_validation->set_rules('total_price', 'total price', 'required');
        //$this->form_validation->set_rules('fill_type', 'fill_type', 'required');
        $this->form_validation->set_rules('last_mileage', 'Last Mileage', 'required');
        $this->form_validation->set_rules('driver', 'Driver', 'required');
        if ($this->form_validation->run() == true)
        {
 
            $fuel_record_data = array(
                'vehicle' => $this->input->post('vehicle'),
                'fuel_date' =>date('Y-m-d', strtotime($this->input->post('fuel_date'))),
                'fuel_station' => $this->input->post('fuel_station'),
                'meter_read' => $this->input->post('metre_read'),
                'litre_pump' => $this->input->post('litre_pump'),
                'litre_price' => $this->input->post('litre_price'),
                'fill_type' => $this->input->post('fill_type'),
                'last_mileage' => $this->input->post('last_mileage'),
                'driver' => $this->input->post('driver'),
            );
        }
        if ($this->form_validation->run() == true && $this->fuel_model->create_fuel_record($fuel_record_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("fuel/fuel_records", 'refresh');
        }
        else
        {
            // display the create fuel form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['vehicle']=$this->fleet_model->get_fleets();
                $this->data['drivers']=$this->fleet_model->get_drivers();
                $this->data['stations']=$this->fuel_model->get_fuel_stations();
                  
               

           

                $this->data['fuel_date'] = array(
                  'name'  => 'fuel_date',
                  'id'    => 'datepicker',
                  'value' => $this->form_validation->set_value('fuel_date'),
                  'placeholder'=>'mm/dd/YYYY',
                  'class' => 'form-control'
              ); 
               $this->data['metre_read'] = array(
                  'name'  => 'metre_read',
                  'id'    => 'metre_read',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('metre_read'),
                  'placeholder'=>'metre read',
                  'class' => 'form-control'
              ); 
               
                 $this->data['litre_pump'] = array(
                  'name'  => 'litre_pump',
                  'id'    => 'litre_pump',
                  'value' => $this->form_validation->set_value('litre_pump'),
                  'placeholder'=>'litre_pump',
                  'class' => 'form-control'
              );
              $this->data['litre_price'] = array(
                  'name'  => 'litre_price',
                  'id'    => 'litre_price',
                  'value' => $this->form_validation->set_value('litre_price'),
                  'placeholder'=>'litre_price',
                  'class' => 'form-control'
              );
              $this->data['fill_type'] = array(
                  'name'  => 'fill_type',
                  'id'    => 'fill_type',
                  'value' => $this->form_validation->set_value('fill_type'),
                  'placeholder'=>'fill_type of the fuel item',
                  'class' => 'form-control'
              ); 
              $this->data['last_mileage'] = array(
                  'name'  => 'last_mileage',
                  'id'    => 'last_mileage',
                  'value' => $this->form_validation->set_value('last_mileage'),
                  'placeholder'=>'last_mileage of the fuel item',
                  'class' => 'form-control'
              ); 
           ; 
            $this->render_page('theme/fuel/create_fuel_record', $this->data);
        }
      }
   /************************************************end of create fuel_record function ***************************************************************/

/*******/
   /*******Function name: edit fuel_record**************/
   /*******created by: Alois*************************/
   /*******2/20/2017*********************************/
   /*******/
   public function edit_fuel_record($id)
    {
       


        $fuel_record = $this->fuel_model->get_fuel_record($id)->row();
        $this->data['fuel_record']=$fuel_record;
         // validate form input
        $this->form_validation->set_rules('vehicle', 'vehicle', 'required');
        $this->form_validation->set_rules('fuel_date', 'fuel date', 'required');
        $this->form_validation->set_rules('fuel_station', 'fuel station', 'trim');
        $this->form_validation->set_rules('litre price', 'litre price', 'required');
       // $this->form_validation->set_rules('total_price', 'total price', 'required');
        $this->form_validation->set_rules('fill_type', 'fill_type', 'required');
        $this->form_validation->set_rules('last_mileage', 'Last Mileage', 'required');
        $this->form_validation->set_rules('driver', 'Driver', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
               $fuel_record_data = array(
                'fuel_date' =>date('Y-m-d', strtotime($this->input->post('fuel_date'))),
                'vehicle' => $this->input->post('vehicle'),
                'meter_read' => $this->input->post('metre_read'),
                'litre_pump' => $this->input->post('litre_pump'),
                'litre_price' => $this->input->post('litre_price'),
                'fuel_station' => $this->input->post('fuel_station'),
                'fill_type' => $this->input->post('fill_type'),
                'last_mileage' => $this->input->post('last_mileage'),
                'driver' => $this->input->post('driver'),
            );

          // check to see if we are updating the fuel_record type
               if($this->fuel_model->update_fuel_record($fuel_record->id, $fuel_record_data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                     $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     redirect("fuel/fuel_records", 'refresh');
 
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('fuel/edit_fuel_record/'.$fuel_record->id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
                  $this->data['vehicle']=$this->fleet_model->get_fleets();
                $this->data['drivers']=$this->fleet_model->get_drivers();
                $this->data['stations']=$this->fuel_model->get_fuel_stations();
                  
            
               $this->data['vehicle'] = array(
                  'name'  => 'vehicle',
                  'id'    => 'vehicle',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('vehicle',$fuel_record->vehicle),
                  'placeholder'=>'name of the fuel_record',
                  'class' => 'form-control'
              );
                $this->data['fuel_date'] = array(
                  'name'  => 'fuel_date',
                  'id'    => 'fuel_date',
                  'value' => $this->form_validation->set_value('fuel_date', $fuel_record->fuel_date),
                  'placeholder'=>'fuel_date of the fuel item',
                  'class' => 'form-control'
              ); 
               $this->data['metre_read'] = array(
                  'name'  => 'metre_read',
                  'id'    => 'metre_read',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('metre_read', $fuel_record->meter_read),
                  'placeholder'=>'metre_read',
                  'class' => 'form-control'
              ); 
                 $this->data['fuel_station'] = array(
                  'name'  => 'fuel_station',
                  'id'    => 'fuel_station',
                  'value' => $this->form_validation->set_value('fuel_station', $fuel_record->fuel_station),
                  'placeholder'=>'fuel_station',
                  'class' => 'form-control'
              ); 
                       $this->data['litre_price'] = array(
                  'name'  => 'litre_price',
                  'id'    => 'litre_price',
                  'value' => $this->form_validation->set_value('litre_price', $fuel_record->litre_price),
                  'placeholder'=>'litre_price',
                  'class' => 'form-control'
              );
                 $this->data['litre_pump'] = array(
                  'name'  => 'litre_pump',
                  'id'    => 'litre_pump',
                  'value' => $this->form_validation->set_value('litre_pump', $fuel_record->litre_pump),
                  'placeholder'=>'litre_pump',
                  'class' => 'form-control'
              );
              $this->data['fill_type'] = array(
                  'name'  => 'fill_type',
                  'id'    => 'fill_type',
                  'value' => $this->form_validation->set_value('fill_type', $fuel_record->fill_type),
                  'placeholder'=>'fill_type of the fuel item',
                  'class' => 'form-control'
              ); 
              $this->data['last_mileage'] = array(
                  'name'  => 'last_mileage',
                  'id'    => 'last_mileage',
                  'value' => $this->form_validation->set_value('last_mileage', $fuel_record->last_mileage),
                  'placeholder'=>'last_mileage of the fuel item',
                  'class' => 'form-control'
              ); 
              $this->data['driver'] = array(
                  'name'  => 'driver',
                  'id'    => 'driver',
                  'value' => $this->form_validation->set_value('driver', $fuel_record->driver),
                  'placeholder'=>'driver of the fuel item',
                  'class' => 'form-control'
              ); 
            $this->render_page('theme/fuel/edit_fuel_record', $this->data);
        }

   }
   /******************************************end of edit fuel_record function *************************************************************/



   /*******/
   /*******Function name: delete fuel_record**************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
    public function delete_fuel_record($value='')
   {
     if($this->fuel_model->delete_fuel_record($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','The fuel_record has been successfuly removed');
          
     }
      redirect('fuel/fuel_records', 'refresh');
   }
 /************end of delete fuel_record function *******************************************************************************************/
  /*******/
   /*******Function name: delete many fuel_records **************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
   public function delete_many_fuel_records()
   {
      $ids= $_POST['values'];
      if($this->fuel_model->delete_many_fuel_records($ids)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Selected fuel_records successfuly removed');
          
     }
      redirect('fuel/fuel_records', 'refresh');
   }
  /************end of delete many fuel_records function *******************************************************************************************/












       public function render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data: $data;

       
        $this->load->view('theme/header');
        $this->load->view('theme/sidebar');
        $this->load->view($view, $this->viewdata, $returnhtml);
        $this->load->view('theme/footer');
    
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


    }
       