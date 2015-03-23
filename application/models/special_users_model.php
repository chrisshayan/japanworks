<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Special_Users_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function registerUserToData($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_special_user', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

}
