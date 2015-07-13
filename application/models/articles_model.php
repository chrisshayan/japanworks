<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles_model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function registerNewArticle($data) {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert('tr_articles', $data);

            if ($this->db->insert_id() > 0) {
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * Description  Get all data from tr_articles
     * Author       Cuong.Chung
     * Date         15.04.2015
     */
    function getAllInformation($limit = 0) {
        if (preg_match("/^[0-9]+$/", $limit) && $limit >= 0) {

            if ($limit > 0)
                $this->db->limit($limit);
            $this->db->order_by("date", "desc");
            $query = $this->db->get('tr_articles');

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        return FALSE;
    }

    /**
     * Description   list article
     * Author       Cuong.Chung
     * Date         25.05.2015
     */
    function listArticles($index = 1, $limit = 10) {
        if (count($index) > 0) {

            $this->db->order_by('`createdate`', 'DESC');
            $this->db->limit($limit, $index);
            $query = $this->db->get('tr_articles');

            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        }
    }

    function countAllArticle() {
        $this->db->order_by('`createdate`', 'DESC');
        $query = $this->db->get('tr_articles');
        if ($query != NULL && $query->num_rows() > 0) {
            return $query->num_rows();
        }
        return 0;
    }

    /**
     * Description  Get detail article
     * Author       Cuong.Chung
     * Date         14.05.2015
     */
    function getDetailArticles($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('tr_articles');
            if ($query != NULL && $query->num_rows() > 0) {

                return $query->row_array();
            }
        }
        return FALSE;
    }

    /**
     * Description  Get detail article nearest day
     * Author       Cuong.Chung
     * Date         14.05.2015
     */
    function getArticleNearestDay($id) {
        if ($id > 0) {
            $this->db->where('id !=', $id);
            $this->db->order_by("date", "desc");
            $this->db->limit(2);
            $query = $this->db->get('tr_articles');
            if ($query != NULL && $query->num_rows() > 0) {
                return $query->result_array();
            }
        }
        return FALSE;
    }

}
