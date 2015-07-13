<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tags extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Author CuongCL
     * Description       List tags from stack Exchange
     * Date         2015-03-11
     */
    function index() {

        $limitPerPage = 20;
        // set canonical link
        $this->_contentTitle = 'Tags';
        $page = $this->uri->segment(3);
        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / $limitPerPage) + 1;
        }
        $apiUrlTag = sprintf(API_TAGS_LIST, $pageUrl);
        //get information tags from StackExchange API
        $listTags = getCurl($apiUrlTag . KEY_QA);

        $this->ocular->set_view_data("listTags", $listTags);
        //end get information tags from StackExchange API
        //pagination

        $config = array();
        $url = base_url() . "tags/kw";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($listTags->total) ? $listTags->total : 0;
        $config["per_page"] = $limitPerPage;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Sau';
        $config['prev_link'] = 'Trước';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style = "display:none">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style = "display:none">';
        $config['last_tag_close'] = '</li>';

        $pageNow = isset($listTags->page) ? $listTags->page : 1;
        if (( $config["per_page"] * ($pageNow)) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageNow - 1) * $limitPerPage + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * ($pageNow);
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }
        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);


        $this->ocular->render('layoutContent');
    }

    /**
     * Author CuongCL
     * Description       List tags from stack Exchange
     * Date         2015-03-11
     */
    function search() {

        $limitPerPage = 20;
        // set canonical link
        $this->_contentTitle = 'Tags Search';


        if (trim($this->input->post('valueTag')) !== "") {
            $tagName = '&inname=' . $this->input->post('valueTag');
        } else
            $tagName = '';

        $apiUrlTag = sprintf(API_GET_TAGS_FROM_SEARCH, $tagName);
        //get information tags from StackExchange API
        $listTags = getCurl($apiUrlTag . KEY_QA);

        $this->ocular->set_view_data("tagName", $tagName);
        $this->ocular->set_view_data("listTags", $listTags);
        //end get information tags from StackExchange API
        //pagination

        $config = array();
        $url = base_url() . "tags/search/";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($listTags->total) ? $listTags->total : 0;
        $config["per_page"] = $limitPerPage;
        $config["uri_segment"] = 3;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Sau';
        $config['prev_link'] = 'Trước';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style = "display:none">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style = "display:none">';
        $config['last_tag_close'] = '</li>';

        $pageNow = isset($listTags->page) ? $listTags->page : 1;

        if (( $config["per_page"] * ($pageNow)) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageNow - 1) * $limitPerPage + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * ($pageNow);
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }
        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);


        $this->ocular->render('layoutContent');
    }

    /**
     * Author CuongCL
     * Description        detail question from stack Exchange
     * Date         2015-03-11
     */
    function result() {
        $limitPerPage = 15;
        // set canonical link
        $this->_contentTitle = 'Tags';
        $tagName = $this->uri->segment(3);

        $page = $this->uri->segment(4);
        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / $limitPerPage) + 1;
        }
        $apiUrlTag = sprintf(API_SEARCH_TAGS, $pageUrl, $tagName);


        //get information tags from StackExchange API
        $listQuest = getCurl($apiUrlTag . KEY_QA);

        $this->ocular->set_view_data("listQuest", $listQuest);
        //end get information tags from StackExchange API
        //pagination

        $config = array();
        $url = base_url() . "tags/result/$tagName/";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($listQuest->total) ? $listQuest->total : 0;
        $config["per_page"] = $limitPerPage;
        $config["uri_segment"] = 4;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Sau';
        $config['prev_link'] = 'Trước';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style = "display:none">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style = "display:none">';
        $config['last_tag_close'] = '</li>';

        $pageNow = isset($listQuest->page) ? $listQuest->page : 1;

        if (( $config["per_page"] * ($pageNow)) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageNow - 1) * $limitPerPage + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * ($pageNow);
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }

//        if (( $config["per_page"] * ($listQuest->page)) > $config["total_rows"]) {
//            $recordInPage = $config["total_rows"];
//            $valueShowRecord = (($listQuest->page - 1) * $limitPerPage + 1) . " - " . $recordInPage;
//        } else {
//            $recordInPage = $config["per_page"] * ($listQuest->page);
//            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
//        }
        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
//end pagination
        //get information tag relate from StackExchange API

        $apiUrlRelated = sprintf(API_TAGS_RELATED, $tagName);

        $reLated = getCurl($apiUrlRelated . KEY_QA);
        $this->ocular->set_view_data("reLated", $reLated);
        //end get information tag relate from StackExchange API

        $this->ocular->render('layoutContent');
    }

}

/* End of file qa.php */
/* Location: ./application/controllers/qa.php */