<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stock_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

/******CRUD OPERATIONS OF THE supplier OBJECT ***************************************************************************************/

// get the supplier types 
        public function get_suppliers()
        {
                $query = $this->db->get('suppliermaster');
                return $query->result();
        }
// store the supplier type object
        public function create_supplier($data)
        {
            if($this->db->insert('suppliermaster', $data)){
                return true;
            }
            return false;
        }

 // return a particular supplier type
      public function get_supplier($id)
      { 
          return $this->db->get_where('suppliermaster', array('Id'=>$id));     
      }
 //update a particular record of supplier type
     public function update_supplier($id, $data)
     {
        $this->db->where('Id', $id);
        if ($this->db->update('suppliermaster', $data)) {
           return TRUE;
        }
        return FALSE;
     }
 //delete a record of supplier type
     public function delete_supplier($id='')
     {
         $this->db->where('Id', $id);
        if ($this->db->delete('suppliermaster')) {
           return TRUE;
        }
        return FALSE;
     }
//delete records of supplier type
     public function delete_many_suppliers($ids)
     {
        $this->db->where_in('Id', $ids);
        $this->db->delete('suppliermaster');
     }

/******************************* END OF CRUD OPERATIONS OF THE supplier  OPERATIONS ******************************************************************/


/******CRUD OPERATIONS OF THE stock_items OBJECT ***************************************************************************************/

// get the stock_items types 
        public function get_stock_items()
        {
                $query = $this->db->get('items');
                return $query->result();
        }
// store the stock_items type object
        public function create_stock_item($data)
        {
            if($this->db->insert('items', $data)){
                return true;
            }
            return false;
        }

 // return a particular stock_items type
      public function get_stock_item($id)
      { 
          return $this->db->get_where('items', array('id'=>$id));     
      }
 //update a particular record of stock_items type
     public function update_stock_item($id, $data)
     {
        $this->db->where('id', $id);
        if ($this->db->update('items', $data)) {
           return TRUE;
        }
        return FALSE;
     }
 //delete a record of stock_items type
     public function delete_stock_item($id='')
     {
         $this->db->where('id', $id);
        if ($this->db->delete('items')) {
           return TRUE;
        }
        return FALSE;
     }
//delete records of stock_items type
     public function delete_many_stock_itemss($ids)
     {
        $this->db->where_in('id', $ids);
        $this->db->delete('items');
     }

/******************************* END OF CRUD OPERATIONS OF THE stock_items  OPERATIONS ******************************************************************/





}