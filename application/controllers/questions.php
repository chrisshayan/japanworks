<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Questions extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Author CuongCL
     * Description       List question from stack Exchange
     * Date         2015-03-11
     */
    function index() {

        // set canonical link
        $this->_contentTitle = 'QA Question';
        //get information from StackExchange API
        $page = $this->uri->segment(3);
        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 15) + 1;
        }

        $apiUrlQuestion = sprintf(API_QA_MAIN, $pageUrl);
        $listQuest = getCurl($apiUrlQuestion . KEY_QA);
        $this->ocular->set_view_data("listQuest", $listQuest);

        //end get information from StackExchange API
        //get information from StackExchange API
        $tagRight = getCurl(API_TAG_RIGHT_COLUMN . KEY_QA);
        $this->ocular->set_view_data("tagRight", $tagRight);
        //end get information from StackExchange API
        //pagination
        $config = array();
        $url = base_url() . "questions/kw";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($listQuest->total) ? $listQuest->total : 0;
        $config["per_page"] = 15;
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


        $pageNow = isset($listQuest->page) ? $listQuest->page : 1;

        if (( $config["per_page"] * ($pageNow)) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageNow - 1) * 15 + 1) . " - " . $recordInPage;
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
    function detail() {
        //set statistic of job
        $jobStatistic = array();
        // set canonical link
        $questionId = $this->uri->segment(3);


        $apiUrlQuestion = sprintf(API_QUESTION_DETAIL, $questionId);

        $this->_contentTitle = 'QA Question';

        //get information detail from StackExchange API
        $quesTion = getCurl($apiUrlQuestion . KEY_QA);

        $this->ocular->set_view_data("quesTion", $quesTion);
        //end get information detail from StackExchange API
        //get information relate from StackExchange API
        $apiUrlRelated = sprintf(API_QUESTION_RELATED, $questionId);
        $reLated = getCurl($apiUrlRelated . KEY_QA);
        $this->ocular->set_view_data("reLated", $reLated);
        //end get information relate from StackExchange API

        $this->ocular->render('layoutContent');
    }

}

/* End of file qa.php */
/* Location: ./application/controllers/qa.php */