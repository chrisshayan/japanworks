<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_jobs_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Description  Insert to tr_special_jobs
     * Author       Cuong.Chung
     * Date         18/08/2014
     */
    function applyJobsFromData($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_special_jobs', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * Description  Get information from mt_special_jobs_employer
     * Author       Cuong.Chung
     * Date         18/08/2014
     */
    function getInforSpecialJobEmployer($id) {
        $this->db->select('mt_special_jobs_employer.employeremail, mt_special_jobs_employer.employer,mt_special_jobs.jobtitle,mt_special_jobs_employer.emplyerid  ');
        $this->db->from('mt_special_jobs_employer');
        $this->db->join('mt_special_jobs', 'mt_special_jobs.emplyerid = mt_special_jobs_employer.emplyerid');
        $array = array('mt_special_jobs.id' => $id, 'mt_special_jobs.actflg' => 1, 'mt_special_jobs_employer.actflg' => 1);
        $this->db->where($array);
        $query = $this->db->get();
//        echo $this->db->last_query();
//        exit;
        if ($query != NULL && $query->num_rows() > 0) {
            return $query->row_array();
        }
        return FALSE;
    }

    /**
     * Description  Get information about CV of USer
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function getInformationOfUserFromSpecialJobs($email) {

        $this->db->where('email', $email);
        $this->db->order_by("createdate", "desc");
        $this->db->limit(1);

        $query = $this->db->get('tr_special_jobs');

        if ($query != NULL && $query->num_rows() > 0) {

            return $query->row_array();
        }
        return FALSE;
    }

}
