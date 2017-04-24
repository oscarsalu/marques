<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        // get all orders
        public function get_orders()
        {
                $query = $this->db->query("select * from orders");
                return $query->result();
        }
        
        //Save orders
        public function save_order($data)
        {
            if($this->db->insert('orders', $data)){
                return true;
            }
            return false;
        }
        
        //Save Order items
        public function save_order_items($data)
        {
            if($this->db->insert('order_items', $data)){
                return true;
            }
            return false;
        }
        
        // get order
        public function get_order($where)
        {
                $query = $this->db->query("select * from orders $where");
                return $query->result();
        }
        
       public function get_orderitems($where){
               $query = $this->db->query("select * from order_items $where");
               return $query->result();
       }
       
       public function save_payment($data){
             if($this->db->insert('payments', $data)){
                return true;
            }
            return false;
       }
       
       public function change_order_status($query){
	     $this->db->query($query);
       }
       
       public function get_payments($id){
              $query = $this->db->query("select payments.*,users.username createdby from payments left join users on users.id=payments.createdby where orderid='$id'");
              return $query->result();
       }
       public function get_payment($id){
              $query = $this->db->query("select payments.*,users.username createdby from payments left join users on users.id=payments.createdby where payments.id='$id'");
              return $query->result();
       }
}