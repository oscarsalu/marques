<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Insurancepayments extends MY_Controller
{				
public function __construct()
{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('insurancepayments_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
}
function index()
{
		$this->data['page_title'] = 'Insurancepayments';
		$this->data['insurancepayments']=$this->insurancepayments_model->getInsurancepayments();
		$this->data['main_content']='views/theme/insurancepayments/insurancepayments';
		$this->render_page('theme/insurancepayments/insurancepayments', $this->data);
}
function insurancepayments()
{
		$this->data['page_title'] = 'Insurancepayments';
		$this->data['insurancepayments']=$this->insurancepayments_model->getInsurancepayments();
		$this->data['main_content']='views/theme/insurancepayments/insurancepayments';
		$this->render_page('theme/insurancepayments/insurancepayments', $this->data);
}
public function create_insurancepayments()
{
	$this->data['title'] ='create insurancepayments';
	$obj=(object)$_POST;
	$objs=get_object_vars($obj);
	if ($this->form_validation->run() == true)
	{
			$array= array(
			'Id' => $this->input->post('Id'),
			'SysDate' => $this->input->post('SysDate'),
			'Fleet' => $this->input->post('Fleet'),
			'Type' => $this->input->post('Type'),
			'VehicleNo' => $this->input->post('VehicleNo'),
			'RenewalDueDate' => $this->input->post('RenewalDueDate'),
			'Premium' => $this->input->post('Premium'),
			'Cost' => $this->input->post('Cost'),
			'PaymentVoucher' => $this->input->post('PaymentVoucher'),
			'EnteredBy' => $this->input->post('EnteredBy'),
			'DateofPayment' => $this->input->post('DateofPayment'),
			'Insurer' => $this->input->post('Insurer'),
			);
		$insurancepayments_data =$array;
	}
	if ($this->form_validation->run() == true && $this->insurancepayments_model->create_insurancepayments($insurancepayments_data))
	{
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect("insurancepayments/insurancepayments",'refresh');
	}
	else
	{
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['obj'] =$objs;
		$this->render_page('theme/insurancepayments/create_insurancepayments', $this->data);
	}
}
public function edit_insurancepayments($id)
{
	$insurancepayments= $this->insurancepayments_model->get_Insurancepayments($id)->result();
	$this->data['insurancepayments']=$insurancepayments;
	$obj=(object)$_POST;
	$objs=get_object_vars($obj);
	if (isset($_POST) && !empty($_POST))
	{
		// do we have a valid request?
		if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
		{
			show_error($this->lang->line('error_csrf'));
		}
		if ($this->form_validation->run() === TRUE)
		{
			$array= array(
			'Id' => $this->input->post('Id'),
			'SysDate' => $this->input->post('SysDate'),
			'Fleet' => $this->input->post('Fleet'),
			'Type' => $this->input->post('Type'),
			'VehicleNo' => $this->input->post('VehicleNo'),
			'RenewalDueDate' => $this->input->post('RenewalDueDate'),
			'Premium' => $this->input->post('Premium'),
			'Cost' => $this->input->post('Cost'),
			'PaymentVoucher' => $this->input->post('PaymentVoucher'),
			'EnteredBy' => $this->input->post('EnteredBy'),
			'DateofPayment' => $this->input->post('DateofPayment'),
			'Insurer' => $this->input->post('Insurer'),
			);
		$insurancepayments_data =$array;
		}
		// check to see if we are updating
		if($this->form_validation->run() == true &&  $this->insurancepayments_model->update_insurancepayments($id, $insurancepayments_data))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("insurancepayments/insurancepayments", 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('insurancepayments/edit_insurancepayments/'.$insurancepayments->id, 'refresh');
		}
	}
	else
	{
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->render_page('theme/insurancepayments/edit_insurancepayments', $this->data);
	}
}
public function delete_insurancepayments($value='')
{
	if($this->insurancepayments_model->delete_insurancepayments($value)==TRUE)
	{
	$this->data['message'] =  $this->session->set_flashdata('message','The insurancepayments has been successfuly removed');
	}
	redirect('insurancepayments/insurancepayments', 'refresh');
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
public function render_page($view, $data=null, $returnhtml=false)
{
	$this->viewdata = (empty($data)) ? $this->data: $data;
	$this->load->view('theme/header');
	$this->load->view('theme/sidebar');
	$this->load->view($view, $this->viewdata, $returnhtml);
	$this->load->view('theme/footer');
}
}
