<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resumes_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Description  Update CV when user log in
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function insertInformationCV($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_resumes', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * Description  Update CV when user log in
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function updateInformationCV($id, $data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->where('id', $id);
            $this->db->update('tr_resumes', $data);
            return TRUE;
        }
        return false;
    }

    /**
     * Description  Update CV when user log in
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function updateOnlineResume($email, $data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->where('email', $email);
            $this->db->update('tr_resumes', $data);
            return TRUE;
        }
        return false;
    }

    /**
     * Description  Get information about CV of USer
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function getInformationOfUser($email) {

        $this->db->where('email', $email);
        $this->db->order_by("createdate", "desc");
        $this->db->limit(1);

        $query = $this->db->get('tr_resumes');

        if ($query != NULL && $query->num_rows() > 0) {

            return $query->row_array();
        }
        return FALSE;
    }

    /**
     * Description  delete information about CV of USer
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function deleteAllResumeUser($email) {
        $this->db->where('email', $email);
        $this->db->delete('tr_resumes');
        return TRUE;
    }

    /**
     * Description  delete information about CV of USer
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function deleteResumeNew($email, $data) {

        $this->db->where('email', $email);
        $this->db->update('tr_resumes', $data);
        return TRUE;
    }

    /**
     * Description  Get all information about CV of USer
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function getAllResumeUser($email) {

        $this->db->where('email', $email);
        $this->db->order_by("createdate", "desc");


        $query = $this->db->get('tr_resumes');
        if ($query != NULL && $query->num_rows() > 0) {
            return $query->result_array();
        }

        return FALSE;
    }

}
