<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
                $this->load->model('order_model');
                $this->load->model('fleet_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

	}

	public function order()
	{
	  unset($_SESSION['obj']);
	  unset($_SESSION['shpitems']);
          //this script shows a new order view
          $this->data['csrf'] = $this->_get_csrf_nonce();
	  $this->data['fleets'] = $this->fleet_model->get_fleets();
	  $this->render_page('theme/orders/order', $this->data);
	}
	
	public function getOrders(){
	  $this->data['csrf'] = $this->_get_csrf_nonce();
	  $this->data['orders'] = $this->order_model->get_orders();
	  $this->render_page('theme/orders/order_list', $this->data);
	}
	
	public function makepayment(){
	  $ref=$this->input->post('refno');
	  $payment_data = array(
	    'orderid' => $this->input->post('orderid'),
	    'paidon' => date("yy-mm-dd",strtotime($this->input->post('paidon'))),
	    'refno' => $this->input->post('refno'),
	    'amount'  => $this->input->post('amount'),
	    'paidby' => $this->input->post('paidby'),
	    'paymentmode' => $this->input->post('paymentmode'),
	    'bank'  => $this->input->post('bank'),
	    'receiptno'  => $this->input->post('receiptno'),
	    'createdby'  => $this->session->userdata('user_id')			  
	    );
	    
	    $this->order_model->save_payment($payment_data);
	    
	    $query="update orders set payment_status='paid' where ref_no='$ref'";
	    $this->order_model->change_order_status($query);
	    
	    $this->data['csrf'] = $this->_get_csrf_nonce();
	    $this->data['orders'] = $this->order_model->get_orders();
	    $this->render_page('theme/orders/order_list', $this->data);	    
	}
	
	public function load_order($id){ 
	       $this->data['fleets'] = $this->fleet_model->get_fleets();
	       $where="where order_id='$id' ";
	       $this->data['order'] = $this->order_model->get_order($where);
	       foreach ( $this->data['order'] as $orders){};
	       $_SESSION['obj']=$orders;
	       $wheres="where ref_no='$orders->ref_no'";
	       $this->data['orderitems'] = $this->order_model->get_orderitems($wheres);
	       $shpitems=array();
	       $i=0;
	       foreach( $this->data['orderitems'] as $row){		  
		      $shpitems[$i]=array('item_name'=>"$row->item_name",'qty'=>"$row->qty", 'cost'=>"$row->cost", 'total_amount'=>"$row->total_amount", 'customer'=>"$row->customer", 'phone'=>"$row->phone", 'source'=>"$row->source",'recipient'=>"$row->recipient",'recipienttel'=>"$row->recipienttel",'destination'=>"$row->destination");
		      
		      $i++;
	       }
	       $_SESSION['shpitems']=$shpitems;
               $this->data['csrf'] = $this->_get_csrf_nonce();
	       $this->render_page('theme/orders/vieworder', $this->data);
	}
	
	public function load_payments($id){ 
	       $this->data['payments'] = $this->order_model->get_payments($id);
               $this->data['csrf'] = $this->_get_csrf_nonce();
	       $this->render_page('theme/orders/payment_list', $this->data);
	}
	
	public function printreceipt($id){ 
	       $this->data['payments'] = $this->order_model->get_payment($id);
               $this->data['csrf'] = $this->_get_csrf_nonce();
               $this->load->view('theme/orders/print', $this->data);
	}
	
	public function printinvoice($id){
	        $this->data['fleets'] = $this->fleet_model->get_fleets();
		$where="where order_id='$id' ";
		$this->data['order'] = $this->order_model->get_order($where);
		foreach ( $this->data['order'] as $orders){};
		$_SESSION['obj']=$orders;
		$wheres="where ref_no='$orders->ref_no'";
		$this->data['orderitems'] = $this->order_model->get_orderitems($wheres);
		$shpitems=array();
		$i=0;
		foreach( $this->data['orderitems'] as $row){		  
			$shpitems[$i]=array('item_name'=>"$row->item_name",'qty'=>"$row->qty", 'cost'=>"$row->cost", 'total_amount'=>"$row->total_amount", 'customer'=>"$row->customer", 'phone'=>"$row->phone", 'source'=>"$row->source",'recipient'=>"$row->recipient",'recipienttel'=>"$row->recipienttel",'destination'=>"$row->destination");
			
			$i++;
		}
		$_SESSION['shpitems']=$shpitems;
		$this->data['csrf'] = $this->_get_csrf_nonce();
		$this->load->view('theme/orders/printinvoice', $this->data);
	  
	}


	public function add_to_invoice()
	{
	        $obj=(object)$_POST; 
	        $_SESSION['obj']=$obj;
	        
	        $obs=get_object_vars($_SESSION['obj']);
	        
	        if($obs['submit']=='Add Record'){
		      // validate form input
		      $this->form_validation->set_rules('item_name', 'Item', 'required');
		      $this->form_validation->set_rules('qty', 'Quantity', 'required');
		      $this->form_validation->set_rules('cost', 'Cost', 'required');
		      $this->form_validation->set_rules('total_amount', 'Total', 'required');
		      $this->form_validation->set_rules('customer', 'Customer', 'required');
		      $this->form_validation->set_rules('phone', 'Contact', 'required');
		      $this->form_validation->set_rules('source', 'Source', 'required');
		      $this->form_validation->set_rules('recipient', 'Recipient', 'required');
		      $this->form_validation->set_rules('recipienttel', 'Recipient Tel', 'required');
		      $this->form_validation->set_rules('destination', 'destination', 'required');

		      if ($this->form_validation->run() == true)
		      {
		          
			  if(empty($_SESSION['shpitems'])){
			  $iterator=0;
			  $_SESSION['shpitems']=array();
			  }else{
			  $iterator=count($_SESSION['shpitems']);
			  }
			  $shpitems=array();
			  
			  $shpitems=$_SESSION['shpitems'];
			  
			  $shpitems[$iterator]=array('item_name'=>"$obj->item_name",'qty'=>"$obj->qty", 'cost'=>"$obj->cost", 'total_amount'=>"$obj->total_amount", 'customer'=>"$obj->customer", 'phone'=>"$obj->phone", 'source'=>"$obj->source",'recipient'=>"$obj->recipient",'recipienttel'=>"$obj->recipienttel",'destination'=>"$obj->destination");
			  
			  $_SESSION['shpitems']=$shpitems;
			  
			  $this->data['csrf'] = $this->_get_csrf_nonce();
			  $this->data['fleets'] = $this->fleet_model->get_fleets();
			  $this->render_page('theme/orders/order', $this->data);
			  
		      }else{
			  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			  
			  $this->data['csrf'] = $this->_get_csrf_nonce();
			  $this->data['fleets'] = $this->fleet_model->get_fleets();
			  $this->render_page('theme/orders/order', $this->data);
		      }
		}
		
		if($obs['submit']=='Save Invoice'){
		      // validate form input
		      $this->form_validation->set_rules('date', 'Date', 'required');
		      $this->form_validation->set_rules('ref_no', 'Ref No', 'required');
		      $this->form_validation->set_rules('fleet', 'Fleet', 'required');
		      $this->form_validation->set_rules('warehouse', 'Loading Zone', 'required');
		      $this->form_validation->set_rules('driver', 'Driver', 'required');

		      if ($this->form_validation->run() == true)
		      {
			  
			  $orders_data = array(
			  'date' => date("yy-mm-dd",strtotime($this->input->post('date'))),
			  'ref_no' => $this->input->post('ref_no'),
			  'fleet'  => $this->input->post('fleet'),
			  'warehouse' => $this->input->post('warehouse'),
			  'note' => $this->input->post('note'),
			  'total'  => $this->input->post('total'),
			  'driver'  => $this->input->post('driver'),
			  'status'  => 'On-Transit',
			  'payment_status'  => 'Not-paid',
			  'created_by'  => $this->session->userdata('user_id')			  
			  );
			  
			  $this->order_model->save_order($orders_data);
			  
			  if(!empty($_SESSION['shpitems'])){
				$shpitems=$_SESSION['shpitems'];
				$i=0;
				$j=count($shpitems);
				while($j>0){
				    $orderitem_data = array(
				    'item_name' => $shpitems[$i]['item_name'],	
				    'qty' => $shpitems[$i]['qty'],
				    'cost' => $shpitems[$i]['cost'],
				    'customer' => $shpitems[$i]['customer'],
				    'phone' => $shpitems[$i]['phone'],
				    'recipient' => $shpitems[$i]['recipient'],
				    'recipienttel' => $shpitems[$i]['recipienttel'],
				    'source' => $shpitems[$i]['source'],
				    'destination' => $shpitems[$i]['destination'],
				    'total_amount' => $shpitems[$i]['total_amount'],
				    'ref_no' => $this->input->post('ref_no')
				    );				    
				    $this->order_model->save_order_items($orderitem_data);
				    $i++;
				    $j--;
				}
			    }   
				
			  unset($_SESSION['shpitems']);
			  unset($_SESSION['obj']);
			  
			  redirect('order/order', 'refresh');
		      }else{
			  $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			  
			  $this->data['csrf'] = $this->_get_csrf_nonce();
			  $this->data['fleets'] = $this->fleet_model->get_fleets();
			  $this->render_page('theme/orders/order', $this->data);
		      }
		}
		
		if($obs['submit']=='Cancel'){
		          unset($_SESSION['obj']);
		          unset($_SESSION['shpitems']);
		          redirect('order/order', 'refresh');
		}

	}
   
    public function edit_order_item($id){
            $obj = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $_GET['obj']);
	    $obj = str_replace("!","'",$obj);
	    $obj=unserialize($obj);

	    $shpitems=$_SESSION['shpitems'];
	    $iterator=count($shpitems);
	    
	    $obj->id=$shpitems[$i]['id'];
	    $obj->item_name=$shpitems[$i]['item_name'];
	    $obj->qty=$shpitems[$i]['qty'];
	    $obj->cost=$shpitems[$i]['cost'];
	    $obj->customer=$shpitems[$i]['customer'];
	    $obj->phone=$shpitems[$i]['phone'];
	    $obj->recipient=$shpitems[$i]['recipient'];
	    $obj->recipienttel=$shpitems[$i]['recipienttel'];
	    $obj->source=$shpitems[$i]['source'];
	    $obj->destination=$shpitems[$i]['destination'];
	    $obj->total_amount=$shpitems[$i]['total_amount'];
		    


	    $iterator-=1;

	    //removes the identified row
	    $shpitems1=array_slice($shpitems,0,$i);
	    $shpitems2=array_slice($shpitems,$i+1);
	    $shpitems=array_merge($shpitems1,$shpitems2);

	    $_SESSION['shppayables']=$shpitems;

	    $obj = str_replace('&','',serialize($obj));
	    $obj = str_replace("\"","'",$obj);
    }
    
    public function delete_order_item($id){
    
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