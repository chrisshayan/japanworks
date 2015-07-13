<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tips extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('articles_model');
        $this->lang->load('message', $this->_lang);
        $this->load->helper('url');

        $this->data['consumer_key'] = $this->config->item('api_key');
        $this->data['consumer_secret'] = $this->config->item('secret_key');
        $this->data['callback_url'] = site_url() . '/user/linkedin_submit';
    }

    public function index() {

        $page = $this->uri->segment(3);

        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 10) + 1;
        }
        $artitles = $this->articles_model->listArticles($page, $limit = 10);

        // $artitles = $this->articles_model->getAllInformation();
        $totalArticle = $this->articles_model->countAllArticle();
        // var_dump($artitles);
        if ($artitles && count($artitles) > 0) {

            $this->ocular->set_view_data("artitles", $artitles);
        }


        //facebook
        // Get User ID
        $this->load->helper('url');
        // $this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this

        $this->load->library('facebook', array(
            'appId' => SET_APPID_FB,
            'secret' => SET_APPSECRET_FB,
        ));
        $user = $this->facebook->getUser();
        $loginFbUrl = $this->facebook->getLoginUrl(array('redirect_uri' => site_url('social/facebookSubmit'),
            'scope' => array("email") // permissions here
        ));
        $this->ocular->set_view_data("loginFbUrl", $loginFbUrl);
        //end facebook
        //Get google
        $this->load->library('googleplus');
        $this->_gp_client = $this->googleplus->client;
        $loginGpUrl = $this->_gp_client->createAuthUrl();
        $this->ocular->set_view_data("loginGpUrl", $loginGpUrl);
        //end google
        //pagination
        $config = array();
        $url = base_url() . "tips/kw";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($totalArticle) ? $totalArticle : 0;
        $config["per_page"] = 10;
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

        if (( $config["per_page"] * $pageUrl) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageUrl - 1) * $config["per_page"] + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $pageUrl;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }
        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);

        $this->ocular->set_view_data("totalArticle", $totalArticle);


        $this->ocular->render('emptyLayoutTip');
    }

    public function detail() {
        $id = $this->uri->segment(3);
        if ($id) {
            $artitleDetail = $this->articles_model->getDetailArticles($id);
            if ($artitleDetail && count($artitleDetail) > 0) {
                $this->_pageTitle = $artitleDetail['title'];
                $this->_imageLink = base_url('uploads-image') . "/" . $artitleDetail['image'];
                $this->ocular->set_view_data("artitleDetail", $artitleDetail);
            }
            $artitleNearest = $this->articles_model->getArticleNearestDay($id);
            if ($artitleNearest && count($artitleNearest) > 0) {
                $this->ocular->set_view_data("artitleNearest", $artitleNearest);
            }

            //get link similar
            $linkSimilar = new MySearch();
            $linkSimilar->job_title .= $artitleDetail['keyword'];
            $linkSimilar->job_level = 0;
            $linkSimilar->page_number = 1;
            $link = $this->getSearchUrl(($linkSimilar));


            //get similar job
            $criteria = array(
                "job_title" => KEYWORD_DEDAULT . " " . $artitleDetail['keyword'],
                "job_level" => 0,
                "page_number" => 1
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, API_SEARCH);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($criteria));

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds
            $results = curl_exec($ch);
            $results = json_decode($results);
            //  var_dump(json_encode($results));
            $data = $results->data;
            $this->ocular->set_view_data("link", $link);

            $this->ocular->set_view_data("data", $data);
            //end similar
        } else {
            redirect('tips/');
        }

        //facebook
        // Get User ID
        $this->load->helper('url');
        // $this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this

        $this->load->library('facebook', array(
            'appId' => SET_APPID_FB,
            'secret' => SET_APPSECRET_FB,
        ));
        $user = $this->facebook->getUser();
        $loginFbUrl = $this->facebook->getLoginUrl(array('redirect_uri' => site_url('social/facebookSubmit'),
            'scope' => array("email") // permissions here
        ));
        $this->ocular->set_view_data("loginFbUrl", $loginFbUrl);
        //end facebook
        //Get google
        $this->load->library('googleplus');
        $this->_gp_client = $this->googleplus->client;
        $loginGpUrl = $this->_gp_client->createAuthUrl();
        $this->ocular->set_view_data("loginGpUrl", $loginGpUrl);
        //end google

        $this->ocular->render('emptyLayoutTip');
    }

}
