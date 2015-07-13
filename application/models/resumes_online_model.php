<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resumes_online_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Description  Insert Resume Online
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function insertInformationResumeOnline($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_resumes_online', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * Description  Insert Resume Online
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function insertInformationCompany($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_resumes_company', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * Description  Insert exp Resume Online
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function insertExpResumeOnline($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_resumes_job_exp', $data);
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
    function updateInformationResumeOnline($id, $data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->where('id', $id);
            $this->db->update('tr_resumes_online', $data);
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Description  Get information about Resume online of USer
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function getInformationResumeOnlineOfUser($email) {

        $this->db->where('email', $email);
        $this->db->order_by("createdate", "desc");
        $this->db->limit(1);

        $query = $this->db->get('tr_resumes_online');

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
        $this->db->delete('tr_resumes_online');
        return TRUE;
    }

    function deleteAllCompany($id) {
        $this->db->where('resume_id', $id);
        $this->db->delete('tr_resumes_company');
        return TRUE;
    }

    function deleteExpResumes($id) {
        $this->db->where('resume_id', $id);
        $this->db->delete('tr_resumes_job_exp');
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
        $query = $this->db->get('tr_resumes_online');
        if ($query != NULL && $query->num_rows() > 0) {
            return $query->result_array();
        }

        return FALSE;
    }

    /**
     * Description  get all company
     * Author       Cuong.Chung
     * Date         01.06.2015
     */
    function getAllCompany($resumeId) {
        if (count($resumeId) > 0) {
            $this->db->select('*');
            $this->db->from('tr_resumes_company AS trc');
            $this->db->where('trc.resume_id ', $resumeId);
            $this->db->where('trc.actflg ', 1);
            $this->db->order_by('trc.`id`', 'ASC');

            $query = $this->db->get();

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        }
    }

    /**
     * Description  get all Exp of resume
     * Author       Cuong.Chung
     * Date         01.06.2015
     */
    function getAllExpResume($resumeId) {
        if (count($resumeId) > 0) {
            $this->db->select('*');
            $this->db->from('tr_resumes_job_exp AS tre');
            $this->db->where('tre.resume_id ', $resumeId);
            $this->db->where('tre.actflg ', 1);
            $this->db->order_by('tre.`id`', 'ASC');

            $query = $this->db->get();

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        }
    }

    /**
     * Description  get all online resume
     * Author       Cuong.Chung
     * Date         30.06.2015
     */
    function getAllOnlineResumeLimit($check = 0, $index = 1, $limit = 10) {
        if ($check != 0) {
            $this->db->where('actflg ', 1);
            $this->db->order_by('`updatedate`', 'DESC');
            $this->db->limit($limit, $index);
            $query = $this->db->get('tr_resumes_online');

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        } else {

            $this->db->where('actflg ', 1);
            $this->db->order_by('`updatedate`', 'DESC');
            $query = $this->db->get('tr_resumes_online');
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
        }
    }

    /**
     * Description  Update Point
     * Author       Cuong.Chung
     * Date         30.06.2015
     */
    function updatePointResume($email, $data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->where('email', $email);
            $this->db->update('tr_resumes_online', $data);
            return $this->db->insert_id();
        }
        return false;
    }

}
