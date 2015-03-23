<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("mysearch");
    }

    function index() {
        $params = $this->uri->uri_to_assoc(1);
        if (isset($params["cat"])) {
            $cat = $params["cat"];

            $search = new MySearch();
            $search->job_category[] = $cat;

            $this->session->set_userdata("VNW_SEARCH_DETAIL", $search);

            $url = $this->getSearchUrl($search);

            redirect($url);
        }

        //load hot jobs
        $fileJson = base_url() . 'static/json/category.json';
        $strData = file_get_contents($fileJson);
        $datas = json_decode($strData, true);
        $categories = $datas["data"];


        $this->ocular->set_view_data("categories", $categories);
        $this->ocular->render();
    }

}
