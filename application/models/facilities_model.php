<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Facilities_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_facilities()
        {
                $query = $this->db->get('facilities');
                return $query->result();
        }

        public function insert_facility($data)
        {
            if($this->db->insert('facilities', $data)){
                return true;
            }
            return false;
        }

        //upload a csv of facilities
        //function to upload facilities
        function uploadFacilities()
        {
            $count=0;
            $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
            while($csv_line = fgetcsv($fp,1024))
            {
                $count++;
                if($count == 1)
                {
                    continue;
                }//keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {
                    $insert_csv = array();
                    $insert_csv['id'] = $csv_line[0];//remove if you want to have primary key,
                    $insert_csv['mfl'] = $csv_line[1];
                    $insert_csv['name'] = $csv_line[2];

                }
                $i++;
                $data = array(
                    'id' => $insert_csv['id'] ,
                    'mfl' => $insert_csv['mfl'],
                    'name' => $insert_csv['name']);
                $data['uploads']=$this->db->insert('facilities', $data);
            }
            fclose($fp) or die("can't close file");
            $data['success']="success";
            return $data;
        }

      public function get_facility($id)
      { 
          return $this->db->get_where('facilities', array('id'=>$id));     
      }

     public function update($id, $data)
     {
        $this->db->where('id', $id);
        if ($this->db->update('facilities', $data)) {
           return TRUE;
        }
        return FALSE;
     }

     public function delete($id='')
     {
         $this->db->where('id', $id);
        if ($this->db->delete('facilities')) {
           return TRUE;
        }
        return FALSE;
     }

     public function delete_many($ids)
     {
        $this->db->where_in('id', $ids);
        $this->db->delete('facilities');
     }

       public function storeValues($data)
        {
            if($this->db->insert('tblverifiedelements', $data)){
                return true;
            }
            return false;
        }
}