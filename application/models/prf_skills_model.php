<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prf_skills_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function insertData($data){
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_prf_skills', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

}
