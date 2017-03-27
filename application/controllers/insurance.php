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




	
	
	 public function create_renawal()
    {
        $this->data['title'] ='Renewal' ;

        $this->form_validation->set_rules('renewal', 'Renewal', 'required');
       

        if ($this->form_validation->run() == true)
        {
 
            $renewal_data = array(
                'renewal' => $this->input->post('renewal')
              
            );
        }
        if ($this->form_validation->run() == true && $this->insurance_model->create_renewal($renewal_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->renewal();
        }
        else
        {
            
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
               $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['renewal'] = array(
                'name'  => 'renewal',
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
                'placeholder'=>'Renewal',
                'class' => 'form-control'
            );
           

            $this->render_page('theme/insurance/renewal_create', $this->data);
        }
    }

	public function edit_renewal($id)
    {
        $this->data['title'] = 'Edit Renewal';

        $renewal = $this->insurance_model->edit_renewal($id)->row();
        $this->data['renewal_data']=$renewal;

        $this->form_validation->set_rules('renewal', 'Renewal', 'required');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $renewal_data = array(
                'renewal' => $this->input->post('renewal')
              
            );
               if($this->insurance_model->update_renewal($renewal->ID, $renewal_data))
                {
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     $this->renewal();
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('insurance/edit_renewal/'.$renewal->ID, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['renewal'] = array(
                'name'  => 'renewal',
                'id'    => 'renewal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type', $renewal->Renewal),
                'placeholder'=>'Renewal',
                'class' => 'form-control'
            );
            $this->render_page('theme/insurance/renewal_edit', $this->data);
        }

   }

  public function delete_renewal($id)
  {
     
       if($this->insurance_model->delete_renewal($id)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Successfully Removed');
          
     }
      redirect('insurance/renewal', $this->data);
     //$this->renewal();
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
