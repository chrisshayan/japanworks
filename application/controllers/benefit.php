<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Benefit extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function WorkInJapan() {
        $this->load->library('form_validation');
        $this->load->model('special_users_model');
        $this->load->helper(array('form', 'url'));
        // set canonical link
        # $this->_canonicalLink = site_url('register');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");


        //----load search----//
        $params = $this->uri->uri_to_assoc(2);
        $search = new MySearch();
        if (isset($params["p"])) {
            $pageNumber = ($params["p"] / $search->limit);
            if ($pageNumber >= 1) {
                $search->page_number = (int) floor($pageNumber) + 1;
            }
        }

        $search->job_title = KEYWORD_WORKINJAPAN;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_SEARCH);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($search));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);
        //   var_dump($results);

        if (isset($results->data) && !empty($results->data)) {
            $this->ocular->set_view_data("data", $results->data);
        } else {
            $this->ocular->set_view_data("data", array());
        }
        //
        //pagination
        $config = array();

        $config["base_url"] = base_url() . 'Japanesebeginner/p/';
        $config["total_rows"] = isset($results->data->total) ? $results->data->total : 0;
        $config["per_page"] = $search->limit;
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

        $dataPagination = array();

        if (( $config["per_page"] * $search->page_number) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($search->page_number - 1) * $search->limit + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $search->page_number;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }

        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
        //icon of benefit
        $benefitIcon = array('', 'fa-dollar', 'fa-user-md', 'fa-file-image-o', 'fa-graduation-cap', 'fa-trophy',
            'fa-book', 'fa-laptop', 'fa-mobile', 'fa-plane', 'fa-glass',
            'fa-cab', 'fa-coffee', 'fa-gift', 'fa-child', 'fa-check-square-o');
        $this->ocular->set_view_data("benefitIcon", $benefitIcon);
        //--end icon of benefit
//get information from Event FB
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);

        $listEvent = $this->callData(0);

        $this->ocular->set_view_data("listEvent", $listEvent);
        $this->ocular->render('blank');
    }

    public function JapaneseClass() {
        $this->load->library('form_validation');
        $this->load->model('special_users_model');
        $this->load->helper(array('form', 'url'));
        // set canonical link
        # $this->_canonicalLink = site_url('register');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");


        //----load search----//
        $params = $this->uri->uri_to_assoc(2);
        $search = new MySearch();
        if (isset($params["p"])) {
            $pageNumber = ($params["p"] / $search->limit);
            if ($pageNumber >= 1) {
                $search->page_number = (int) floor($pageNumber) + 1;
            }
        }

        $search->job_title = KEYWORD_JAPANESECLASS;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_SEARCH);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($search));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);
        //   var_dump($results);

        if (isset($results->data) && !empty($results->data)) {
            $this->ocular->set_view_data("data", $results->data);
        } else {
            $this->ocular->set_view_data("data", array());
        }
        //
        //pagination
        $config = array();

        $config["base_url"] = base_url() . 'Japanesebeginner/p/';
        $config["total_rows"] = isset($results->data->total) ? $results->data->total : 0;
        $config["per_page"] = $search->limit;
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

        $dataPagination = array();

        if (( $config["per_page"] * $search->page_number) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($search->page_number - 1) * $search->limit + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $search->page_number;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }

        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
        //icon of benefit
        $benefitIcon = array('', 'fa-dollar', 'fa-user-md', 'fa-file-image-o', 'fa-graduation-cap', 'fa-trophy',
            'fa-book', 'fa-laptop', 'fa-mobile', 'fa-plane', 'fa-glass',
            'fa-cab', 'fa-coffee', 'fa-gift', 'fa-child', 'fa-check-square-o');
        $this->ocular->set_view_data("benefitIcon", $benefitIcon);
        //--end icon of benefit
//get information from Event FB
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);

        $listEvent = $this->callData(0);

        $this->ocular->set_view_data("listEvent", $listEvent);
        $this->ocular->render('blank');
    }

    public function Over1000() {
        $this->load->library('form_validation');
        $this->load->model('special_users_model');
        $this->load->helper(array('form', 'url'));
        // set canonical link
        # $this->_canonicalLink = site_url('register');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");


        //----load search----//
        $params = $this->uri->uri_to_assoc(2);
        $search = new MySearch();
        if (isset($params["p"])) {
            $pageNumber = ($params["p"] / $search->limit);
            if ($pageNumber >= 1) {
                $search->page_number = (int) floor($pageNumber) + 1;
            }
        }

        $search->job_title = KEYWORD_OVER1000;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_SEARCH);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($search));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);
        //   var_dump($results);

        if (isset($results->data) && !empty($results->data)) {
            $this->ocular->set_view_data("data", $results->data);
        } else {
            $this->ocular->set_view_data("data", array());
        }
        //
        //pagination
        $config = array();

        $config["base_url"] = base_url() . 'Japanesebeginner/p/';
        $config["total_rows"] = isset($results->data->total) ? $results->data->total : 0;
        $config["per_page"] = $search->limit;
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

        $dataPagination = array();

        if (( $config["per_page"] * $search->page_number) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($search->page_number - 1) * $search->limit + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $search->page_number;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }

        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
        //icon of benefit
        $benefitIcon = array('', 'fa-dollar', 'fa-user-md', 'fa-file-image-o', 'fa-graduation-cap', 'fa-trophy',
            'fa-book', 'fa-laptop', 'fa-mobile', 'fa-plane', 'fa-glass',
            'fa-cab', 'fa-coffee', 'fa-gift', 'fa-child', 'fa-check-square-o');
        $this->ocular->set_view_data("benefitIcon", $benefitIcon);
        //--end icon of benefit
//get information from Event FB
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);

        $listEvent = $this->callData(0);

        $this->ocular->set_view_data("listEvent", $listEvent);
        $this->ocular->render('blank');
    }

    public function callData($num) {
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);
        $accToken = str_replace('"', '', $accToken);
        $apiListEvent = sprintf(API_FB_EVENT_LIST, FB_PAGE_ID, $accToken);

        $listEvent = getCurl($apiListEvent);

        if (isset($listEvent->error->code) && $listEvent->error->code == '190') {
            //if call function repeat a lot . stop it
            if ($num > 5) {
                return null;
            }
            $num++;
            $apiGetEvent = sprintf(API_FB_GET_TOKEN, FB_APP_ID, FB_SERCRET_ID);
            $appToken = file_get_contents($apiGetEvent);
            $accToken = str_replace('"', '', $accToken);
            $file = FCPATH . "static/json/token.json";
            $fh = fopen($file, 'w') or die("Error opening output file");
            fwrite($fh, json_encode($appToken, 256));
            fclose($fh);
            $this->callData($num);
        } else {
            return $listEvent;
        }
    }

}
