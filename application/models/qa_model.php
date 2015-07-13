<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Qa_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Description  insertQuestion
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function insertQuestion($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_questions', $data);
            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * Description  insert comment tr_question_comments
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function insertComment($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_question_comments', $data);
            if ($this->db->insert_id() > 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * Description  insert comment tr_question_comments
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function listQuestions($index = 1, $limit = 10) {
        if (count($index) > 0) {
            $this->db->select('q.`id`, q.`cate_id`, q.`title`, q.`author` as qauthor, q.`text` as description, qca.`title` as catitle,q.`createdate`');
            $this->db->from('tr_questions AS q');
            $this->db->join('mt_question_categories as qca', 'q.cate_id = qca.id');
            $this->db->where('q.actflg ', 1);
            $this->db->where('qca.actflg ', 1);
            $this->db->order_by('q.`createdate`', 'DESC');
            $this->db->limit($limit, $index);
            $query = $this->db->get();

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        }
    }

    /**
     * Description  listCategories
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function listCategories() {

        $this->db->select('qc.`id`,  qc.`title`');
        $this->db->from('mt_question_categories AS qc');
        $this->db->where('qc.actflg ', 1);
        $this->db->order_by('qc.`createdate`', 'DESC');
        $query = $this->db->get();

        if ($query != NULL && $query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    function countAllQuestion() {

        $this->db->select('q.`id`, q.`cate_id`, q.`title`, q.`author` as qauthor, q.`text` as description, qca.`title` as catitle,q.`createdate`');
        $this->db->from('tr_questions AS q');
        $this->db->join('mt_question_categories as qca', 'q.cate_id = qca.id');
        $this->db->where('q.actflg ', 1);
        $this->db->where('qca.actflg ', 1);
        $this->db->order_by('q.`createdate`', 'DESC');
        $query = $this->db->get();
        if ($query != NULL && $query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    function listComments($questId) {
        if (($questId) > 0) {
            $this->db->select('qc.`id`, qc.`quest_id`, qc.`text`, qc.`author`, qc.`check`, qc.`createdate`');
            $this->db->from('tr_question_comments AS qc');
            $this->db->where('qc.quest_id', $questId);
            $this->db->where('qc.actflg ', 1);
            $this->db->order_by('qc.`id`', 'ASC');
            $query = $this->db->get();
            // echo $this->db->last_query();
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        }
    }

    function countAllComment($questId) {
        if (($questId) > 0) {
            $this->db->select('qc.`id`');
            $this->db->from('tr_question_comments AS qc');
            $this->db->where('qc.quest_id', $questId);
            $this->db->where('qc.actflg ', 1);
            $query = $this->db->get();


            if ($query != NULL && $query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
        }
    }

    function countCommentPrivate($questId) {
        if (($questId) > 0) {
            $this->db->select('qc.`id`, qc.`quest_id`, qc.`text`, qc.`author`, qc.`check`, qc.`createdate`');
            $this->db->from('tr_question_comments AS qc');
            $this->db->where('qc.quest_id', $questId);
            $this->db->where('qc.actflg ', 1);
            $this->db->where('qc.check ', 1);
            $query = $this->db->get();


            if ($query != NULL && $query->num_rows() > 0) {
                return $query->num_rows();
            }
            return 0;
        }
    }

    /**
     * Description  insert comment tr_question_comments
     * Author       Cuong.Chung
     * Date         06.04.2015
     */
    function listQuesdstion($page = 1, $limit = 10) {

        if (preg_match("/^[0-9]+$/", $page) && $page > 0) {

            $sql = "SELECT q.`cate_id`, q.`title`, q.`author` as qauthor, qca.`title` as catitle, qcm.`author` as cmauthor, qcm.`text`, qcm.`check`
                   FROM  tr_questions AS q
                   INNER JOIN tr_question_comments AS qcm ON q.id = qcm.quest_id
                   INNER JOIN mt_question_categories AS qca ON q.cate_id = qca.id
                   ";




            $this->db->select('q.`cate_id`, q.`title`, q.`author` as qauthor, qca.`title` as catitle, qcm.`author` as cmauthor, qcm.`text`, qcm.`check`');

            $this->db->from('tr_questions AS q');
            $this->db->join('tr_question_comments AS qcm', 'q.id = qcm.quest_id', 'INNER');
            $this->db->join('mt_question_categories AS qca', 'q.cate_id = qca.id', 'INNER');


            $query = $this->db->get();

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        return FALSE;

        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_question_comments', $data);
            if ($this->db->insert_id() > 0) {
                return true;
            }
        }
        return false;
    }

}
