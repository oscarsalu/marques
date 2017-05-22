<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Otherrenewal extends MY_Controller
{				
public function __construct()
{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model('otherrenewal_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
}
function index()
{
		$this->data['page_title'] = 'Otherrenewal';
		$this->data['otherrenewal']=$this->otherrenewal_model->getOtherrenewal();
		$this->data['main_content']='views/theme/otherrenewal/otherrenewal';
		$this->render_page('theme/otherrenewal/otherrenewal', $this->data);
}
function otherrenewal()
{
		$this->data['page_title'] = 'Otherrenewal';
		$this->data['otherrenewal']=$this->otherrenewal_model->getOtherrenewal();
		$this->data['main_content']='views/theme/otherrenewal/otherrenewal';
		$this->render_page('theme/otherrenewal/otherrenewal', $this->data);
}
public function create_otherrenewal()
{
	$this->data['title'] ='create otherrenewal';
	$obj=(object)$_POST;
	$objs=get_object_vars($obj);
	if ($this->form_validation->run() == true)
	{
			$array= array(
			'ID' => $this->input->post('ID'),
			'Fleet' => $this->input->post('Fleet'),
			'VehicleNo' => $this->input->post('VehicleNo'),
			'VehicleType' => $this->input->post('VehicleType'),
			'PaymentType' => $this->input->post('PaymentType'),
			'PaymentDate' => $this->input->post('PaymentDate'),
			'Cost' => $this->input->post('Cost'),
			'EnteredBy' => $this->input->post('EnteredBy'),
			'PeriodFrom' => $this->input->post('PeriodFrom'),
			'PeriodTo' => $this->input->post('PeriodTo'),
			'PaymentRef' => $this->input->post('PaymentRef'),
			);
		$otherrenewal_data =$array;
	}
	if ($this->form_validation->run() == true && $this->otherrenewal_model->create_otherrenewal($otherrenewal_data))
	{
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect("otherrenewal/otherrenewal",'refresh');
	}
	else
	{
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->data['obj'] =$objs;
		$this->render_page('theme/otherrenewal/create_otherrenewal', $this->data);
	}
}
public function edit_otherrenewal($id)
{
	$otherrenewal= $this->otherrenewal_model->get_Otherrenewal($id)->result();
	$this->data['otherrenewal']=$otherrenewal;
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
			'ID' => $this->input->post('ID'),
			'Fleet' => $this->input->post('Fleet'),
			'VehicleNo' => $this->input->post('VehicleNo'),
			'VehicleType' => $this->input->post('VehicleType'),
			'PaymentType' => $this->input->post('PaymentType'),
			'PaymentDate' => $this->input->post('PaymentDate'),
			'Cost' => $this->input->post('Cost'),
			'EnteredBy' => $this->input->post('EnteredBy'),
			'PeriodFrom' => $this->input->post('PeriodFrom'),
			'PeriodTo' => $this->input->post('PeriodTo'),
			'PaymentRef' => $this->input->post('PaymentRef'),
			);
		$otherrenewal_data =$array;
		}
		// check to see if we are updating
		if($this->form_validation->run() == true &&  $this->otherrenewal_model->update_otherrenewal($id, $otherrenewal_data))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("otherrenewal/otherrenewal", 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('otherrenewal/edit_otherrenewal/'.$otherrenewal->id, 'refresh');
		}
	}
	else
	{
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->render_page('theme/otherrenewal/edit_otherrenewal', $this->data);
	}
}
public function delete_otherrenewal($value='')
{
	if($this->otherrenewal_model->delete_otherrenewal($value)==TRUE)
	{
	$this->data['message'] =  $this->session->set_flashdata('message','The otherrenewal has been successfuly removed');
	}
	redirect('otherrenewal/otherrenewal', 'refresh');
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
