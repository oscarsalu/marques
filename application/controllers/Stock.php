<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('stock_model');
		$this->lang->load('auth');
		

		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		}

/**********************************************************************************************
/** OBJECT: Supplier
/**********************************************************************************************/

    //show available suppliers
       public function suppliers()
       {
           //retrieve the suppliers
           $this->data['suppliers'] = $this->stock_model->get_suppliers();
           $this->render_page('theme/stock/suppliers', $this->data);
       }
  
   //create a supplier object
    public function create_supplier()
    {
        $this->data['title'] ='create supplier' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('supplier_name', 'supplier', 'required');
        $this->form_validation->set_rules('address', 'supplier', 'trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'trim');
        $this->form_validation->set_rules('remarks', 'remarks', 'trim');
        if ($this->form_validation->run() == true)
        {
 
            $supplier_data = array(
                'SupplierName' => $this->input->post('supplier_name'),
                'Address' => $this->input->post('address'),
                'Telephone' => $this->input->post('telephone'),
                'Remarks' => $this->input->post('remarks'),
            );
        }
        if ($this->form_validation->run() == true && $this->stock_model->create_supplier($supplier_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("stock/suppliers", 'refresh');
        }
        else
        {
            // display the create stock form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                $this->data['csrf'] = $this->_get_csrf_nonce();
	            $this->data['supplier_name'] = array(
	                'name'  => 'supplier_name',
	                'id'    => 'supplier_name',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('supplier_name'),
	                'placeholder'=>'name of the supplier',
	                'class' => 'form-control'
	            );
                $this->data['address'] = array(
	                'name'  => 'address',
	                'id'    => 'address',
	                'value' => $this->form_validation->set_value('address'),
	                'placeholder'=>'Address of the supplier',
	                'class' => 'form-control'
	            ); 
	             $this->data['telephone'] = array(
	                'name'  => 'telephone',
	                'id'    => 'telephone',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('telephone'),
	                'placeholder'=>'Phone number of the supplier',
	                'class' => 'form-control'
	            );  
                 $this->data['remarks'] = array(
	                'name'  => 'remarks',
	                'id'    => 'remarks',
	                'value' => $this->form_validation->set_value('remarks'),
	                'placeholder'=>'Remarks',
	                'class' => 'form-control'
	            );
            $this->render_page('theme/stock/create_supplier', $this->data);
        }
      }
   /************************************************end of create supplier function ***************************************************************/

   /*******/
   /*******Function name: edit supplier**************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
   public function edit_supplier($id)
    {
       


        $supplier = $this->stock_model->get_supplier($id)->row();
        $this->data['supplier']=$supplier;
        // validate form input
        $this->form_validation->set_rules('supplier_name', 'supplier', 'required');
        $this->form_validation->set_rules('address', 'supplier', 'trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'trim');
        $this->form_validation->set_rules('remarks', 'remarks', 'trim');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
	               	$supplier_data = array(
	                'SupplierName' => $this->input->post('supplier_name'),
	                'Address' => $this->input->post('address'),
	                'Telephone' => $this->input->post('telephone'),
	                'Remarks' => $this->input->post('remarks'),
	           		 );
	            

          // check to see if we are updating the supplier type
               if($this->stock_model->update_supplier($supplier->Id, $supplier_data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                     $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     redirect("stock/suppliers", 'refresh');
 
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('stock/edit_supplier/'.$supplier->Id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['supplier_name'] = array(
	                'name'  => 'supplier_name',
	                'id'    => 'supplier_name',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('supplier_name',$supplier->SupplierName),
	                'placeholder'=>'name of the supplier',
	                'class' => 'form-control'
	            );
                $this->data['address'] = array(
	                'name'  => 'address',
	                'id'    => 'address',
	                'value' => $this->form_validation->set_value('address', $supplier->Address),
	                'placeholder'=>'Address of the supplier',
	                'class' => 'form-control'
	            ); 
	             $this->data['telephone'] = array(
	                'name'  => 'telephone',
	                'id'    => 'telephone',
	                'type'  => 'text',
	                'value' => $this->form_validation->set_value('telephone', $supplier->Telephone),
	                'placeholder'=>'Phone number of the supplier',
	                'class' => 'form-control'
	            );  
                 $this->data['remarks'] = array(
	                'name'  => 'remarks',
	                'id'    => 'remarks',
	                'value' => $this->form_validation->set_value('remarks', $supplier->Remarks),
	                'placeholder'=>'Remarks',
	                'class' => 'form-control'
	            );
            $this->render_page('theme/stock/edit_supplier', $this->data);
        }

   }
   /******************************************end of edit supplier function *************************************************************/


   /*******/
   /*******Function name: delete supplier**************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
    public function delete_supplier($value='')
   {
     if($this->stock_model->delete_supplier($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','The Supplier has been successfuly removed');
          
     }
      redirect('stock/suppliers', 'refresh');
   }
 /************end of delete supplier function *******************************************************************************************/
  /*******/
   /*******Function name: delete many suppliers **************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
   public function delete_many_suppliers()
   {
      $ids= $_POST['values'];
      if($this->stock_model->delete_many_suppliers($ids)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Selected Suppliers successfuly removed');
          
     }
      redirect('stock/suppliers', 'refresh');
   }
  /************end of delete many suppliers function *******************************************************************************************/
    

/**********************************************************************************************
/** OBJECT: stock_item
/**********************************************************************************************/

    //show available stock_items
       public function stock_items()
       {
           //retrieve the stock_items
           $this->data['stock_items'] = $this->stock_model->get_stock_items();
           $this->render_page('theme/stock/stock_items', $this->data);
       }

//create a stock_item object
    public function create_stock_item()
    {
        $this->data['title'] ='create stock_item' ;

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('stock_item_name', 'stock_item', 'required');
        $this->form_validation->set_rules('brand', 'brand', 'trim');
        $this->form_validation->set_rules('description', 'description', 'trim');
        $this->form_validation->set_rules('price', 'price', 'required');
         $this->form_validation->set_rules('supplier', 'supplier', 'trim');
        if ($this->form_validation->run() == true)
        {
 
            $stock_item_data = array(
                'item_name' => $this->input->post('stock_item_name'),
                'brand' => $this->input->post('brand'),
                'price' => $this->input->post('price'),
                'supplier' => $this->input->post('supplier'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
            );
        }
        if ($this->form_validation->run() == true && $this->stock_model->create_stock_item($stock_item_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("stock/stock_items", 'refresh');
        }
        else
        {
            // display the create stock form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                $this->data['csrf'] = $this->_get_csrf_nonce();
              $this->data['stock_item_name'] = array(
                  'name'  => 'stock_item_name',
                  'id'    => 'stock_item_name',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('stock_item_name'),
                  'placeholder'=>'name of the stock_item',
                  'class' => 'form-control'
              );
                $this->data['brand'] = array(
                  'name'  => 'brand',
                  'id'    => 'brand',
                  'value' => $this->form_validation->set_value('brand'),
                  'placeholder'=>'brand of the stock item',
                  'class' => 'form-control'
              ); 
               $this->data['price'] = array(
                  'name'  => 'price',
                  'id'    => 'price',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('price'),
                  'placeholder'=>'price',
                  'class' => 'form-control'
              ); 
                 $this->data['supplier'] = array(
                  'name'  => 'supplier',
                  'id'    => 'supplier',
                  'value' => $this->form_validation->set_value('supplier'),
                  'placeholder'=>'supplier',
                  'class' => 'form-control'
              ); 
                 $this->data['description'] = array(
                  'name'  => 'description',
                  'id'    => 'description',
                  'value' => $this->form_validation->set_value('description'),
                  'placeholder'=>'description',
                  'class' => 'form-control'
              );
            $this->render_page('theme/stock/create_stock_item', $this->data);
        }
      }
   /************************************************end of create stock_item function ***************************************************************/

/*******/
   /*******Function name: edit stock_item**************/
   /*******created by: Alois*************************/
   /*******2/20/2017*********************************/
   /*******/
   public function edit_stock_item($id)
    {
       


        $stock_item = $this->stock_model->get_stock_item($id)->row();
        $this->data['stock_item']=$stock_item;
         // validate form input
        $this->form_validation->set_rules('stock_item_name', 'stock_item', 'required');
        $this->form_validation->set_rules('brand', 'brand', 'trim');
        $this->form_validation->set_rules('description', 'description', 'trim');
        $this->form_validation->set_rules('price', 'price', 'required');
         $this->form_validation->set_rules('supplier', 'supplier', 'trim');
       

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

        

            if ($this->form_validation->run() === TRUE)
            {
                 $stock_item_data = array(
                'item_name' => $this->input->post('stock_item_name'),
                'brand' => $this->input->post('brand'),
                'price' => $this->input->post('price'),
                'supplier' => $this->input->post('supplier'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
            );

          // check to see if we are updating the stock_item type
               if($this->stock_model->update_stock_item($stock_item->id, $stock_item_data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                     $this->session->set_flashdata('message', $this->ion_auth->messages() );
        
                     redirect("stock/stock_items", 'refresh');
 
                }

            }else{
                   $this->session->set_flashdata('message', $this->ion_auth->errors() );
                   redirect('stock/edit_stock_item/'.$stock_item->id, 'refresh');
            }
        }else{
              $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
              $this->data['csrf'] = $this->_get_csrf_nonce();
               $this->data['stock_item_name'] = array(
                  'name'  => 'stock_item_name',
                  'id'    => 'stock_item_name',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('stock_item_name',$stock_item->item_name),
                  'placeholder'=>'name of the stock_item',
                  'class' => 'form-control'
              );
                $this->data['brand'] = array(
                  'name'  => 'brand',
                  'id'    => 'brand',
                  'value' => $this->form_validation->set_value('brand', $stock_item->brand),
                  'placeholder'=>'brand of the stock item',
                  'class' => 'form-control'
              ); 
               $this->data['price'] = array(
                  'name'  => 'price',
                  'id'    => 'price',
                  'type'  => 'text',
                  'value' => $this->form_validation->set_value('price', $stock_item->price),
                  'placeholder'=>'price',
                  'class' => 'form-control'
              ); 
                 $this->data['supplier'] = array(
                  'name'  => 'supplier',
                  'id'    => 'supplier',
                  'value' => $this->form_validation->set_value('supplier', $stock_item->supplier),
                  'placeholder'=>'supplier',
                  'class' => 'form-control'
              ); 
                 $this->data['description'] = array(
                  'name'  => 'description',
                  'id'    => 'description',
                  'value' => $this->form_validation->set_value('description', $stock_item->description),
                  'placeholder'=>'description',
                  'class' => 'form-control'
              );
            $this->render_page('theme/stock/edit_stock_item', $this->data);
        }

   }
   /******************************************end of edit stock_item function *************************************************************/



   /*******/
   /*******Function name: delete stock_item**************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
    public function delete_stock_item($value='')
   {
     if($this->stock_model->delete_stock_item($value)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','The stock_item has been successfuly removed');
          
     }
      redirect('stock/stock_items', 'refresh');
   }
 /************end of delete stock_item function *******************************************************************************************/
  /*******/
   /*******Function name: delete many stock_items **************/
   /*******created by: Alois*************************/
   /*******2/17/2017*********************************/
   /*******/
   public function delete_many_stock_items()
   {
      $ids= $_POST['values'];
      if($this->stock_model->delete_many_stock_items($ids)==TRUE){
        $this->data['message'] =  $this->session->set_flashdata('message','Selected stock_items successfuly removed');
          
     }
      redirect('stock/stock_items', 'refresh');
   }
  /************end of delete many stock_items function *******************************************************************************************/












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
       