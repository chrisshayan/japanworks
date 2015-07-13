<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listonlineresumejpw130 extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('resumes_online_model');

        $this->load->helper('url');
    }

    public function index() {
        $listEmail = array("koji@vietnamworks.com", "ryosuke@vietnamworks.com", "an.nguyen@vietnamworks.com", "chris@navigosgroup.com", "eduardo@navigosgroup.com", "morio@vietnamworks.com");
        if (!isset($this->_userInfo->login_token) || !in_array(strtolower($this->_userInfo->email), $listEmail)) {
            redirect(site_url('/'));
        }

        $page = $this->uri->segment(3);
        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 10) + 1;
        }

        $listResume = $this->resumes_online_model->getAllOnlineResumeLimit(1, $page, $limit = 10);
        $this->ocular->set_view_data("listResume", $listResume);


        $totalAllResume = $this->resumes_online_model->getAllOnlineResumeLimit(0, 0, 0);
        //pagination
        $config = array();
        $url = base_url() . "listonlineresumejpw130/kw";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($totalAllResume) ? $totalAllResume : 0;
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

        $this->ocular->set_view_data("totalAllResume", $totalAllResume);







        $this->ocular->render('blank');
    }

    public function updatepoint() {
        $email = $this->input->post('email');
        $point = $this->input->post('point');
        $data = array(
            'point' => $point,
        );
        $this->resumes_online_model->updatePointResume($email, $data);
        echo 'true';
    }

}
