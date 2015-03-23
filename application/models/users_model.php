<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model
{
    function __construct() {
        parent::__construct();
    }

    function registerUserToData($data){
        if(is_array($data) && count($data) > 0){
            $this->db->insert('tr_user', $data);
            if($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }
    function checkEmailExistInData($email){
        
        $this->db->where('email', $email);
        $query = $this->db->get('tr_user');
        if($query->num_rows == 1)
        {
                echo 'false';
        }
        else{
            echo 'true';
        }
       
    }
    function activeAccount($email){
        $data = array(
               'actflg' => 1
            );
        if(isset($email)){
            $this->db->where('email', $email);
            $this->db->update('tr_user', $data);
            if(!$this->db->_error_number()){
                return true;
            }
        }
        return false;
    }
    
  
    
}