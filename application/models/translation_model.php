<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Translation_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function postNewContest($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_translation_contest', $data);

            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    function getAllContest($limit = 0) {
        if (preg_match("/^[0-9]+$/", $limit) && $limit >= 0) {

            if ($limit > 0)
                $this->db->limit($limit);
            $this->db->order_by("date", "desc");
            $query = $this->db->get('tr_translation_contest');

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        return FALSE;
    }

    function listTranslationContest($check = 0, $index = 1, $limit = 10) {
        if ($check != 0) {

            $sql = "SELECT * , (SELECT COUNT( * ) FROM tr_translation_answer
                                                    WHERE tr_translation_answer.translation_contest_id = tr_translation_contest.id AND tr_translation_answer.check = 0) AS new
                    FROM tr_translation_contest
                    WHERE   actflg = 1
                    ORDER BY updatedate DESC
                     LIMIT $index , $limit
                    ";

            $query = $this->db->query($sql);




            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        } else {

            $this->db->where('actflg ', 1);
            $this->db->order_by('`updatedate`', 'DESC');
            $query = $this->db->get('tr_translation_contest');
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
        }
    }

    function countAllContest() {
        $this->db->order_by('`createdate`', 'DESC');
        $query = $this->db->get('tr_translation_contest');
        if ($query != NULL && $query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    function getDetailContest($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('tr_translation_contest');
            if ($query != NULL && $query->num_rows() > 0) {

                return $query->row_array();
            }
        }
        return FALSE;
    }

    function listAllTranslationAnswer($id, $check = 0, $index = 1, $limit = 10) {
        if ($check != 0) {
            $this->db->where('translation_contest_id ', $id);
            $this->db->where('actflg ', 1);
            $this->db->order_by('`updatedate`', 'DESC');
            $this->db->limit($limit, $index);
            $query = $this->db->get('tr_translation_answer');

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        } else {
            $this->db->where('translation_contest_id ', $id);
            $this->db->where('actflg ', 1);
            $this->db->order_by('`updatedate`', 'DESC');
            $query = $this->db->get('tr_translation_answer');
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
        }
    }

    function updateInformationContest($id, $data) {

        if (is_array($data) && count($data) > 0) {
            $this->db->where('id', $id);
            $this->db->update('tr_translation_contest', $data);

            return true;
        }
        return false;
    }

    function updateChecked($id, $data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->where('translation_contest_id', $id);
            $this->db->update('tr_translation_answer', $data);

            return true;
        }
        return false;
    }

    function listAllContest($check = 0, $index = 1, $limit = 10) {
        if ($check != 0) {
            $sql = "SELECT * , (SELECT COUNT( * ) FROM tr_translation_answer WHERE tr_translation_answer.translation_contest_id = tr_translation_contest.id) AS answers
                    FROM tr_translation_contest
                    WHERE   actflg = 1
                    ORDER BY updatedate DESC
                     LIMIT $index , $limit
                    ";

            $query = $this->db->query($sql);
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        } else {

            $this->db->where('actflg ', 1);
            $this->db->order_by('`updatedate`', 'DESC');
            $query = $this->db->get('tr_translation_contest');
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
        }
    }

    function insertAnswer($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_translation_answer', $data);
            if ($this->db->insert_id() > 0) {
                return true;
            }
        }
        return false;
    }

    function checkAnswer($id, $email) {
        $this->db->where('email', $email);
        $this->db->where('translation_contest_id', $id);
        $query = $this->db->get('tr_translation_answer');
        if ($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

}
