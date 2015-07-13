<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Translationadmin extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('translation_model');
        $this->lang->load('message', $this->_lang);
        $this->load->helper('url');
        $listEmail = array("vfa.cuongcl@gmail.com", "morio@vietnamworks.com");
    }

    public function insert() {

        if ($this->input->post('isSent') == 'OK') {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('poster', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('startdate', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('enddate', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('leveltag', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('prize', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('textarea', 'This field is required.', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

            } else {

                $poster = $this->input->post('poster');
                $startdate = date('Y-m-d', strtotime($this->input->post('startdate')));
                $enddate = date('Y-m-d', strtotime($this->input->post('enddate')));
                $leveltag = $this->input->post('leveltag');
                $prize = $this->input->post('prize');
                $textarea = $this->input->post('textarea');
                $dataContest = array(
                    'poster' => $poster,
                    'start_date' => $startdate,
                    'end_date' => $enddate,
                    'level_tag' => $leveltag,
                    'prize' => $prize,
                    'text' => nl2br(htmlentities($textarea, ENT_QUOTES, 'UTF-8')),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );

                $insertContest = $this->translation_model->postNewContest($dataContest);
                if ($insertContest) {
                    redirect(site_url('translationadmin/thanks'));
                }
            }
        }


        $this->ocular->render('applicationBase');
    }

    public function edit() {


        $id = $this->uri->segment(3);
        if ($id == null) {
            redirect(site_url('translationadmin/listcontest'));
        }
        //get information contest
        $inforContest = $this->translation_model->getDetailContest($id);
        $this->ocular->set_view_data("inforContest", $inforContest);


        if ($this->input->post('isSent') == 'OK') {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('poster', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('startdate', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('enddate', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('leveltag', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('prize', 'This field is required.', 'trim|required');
            $this->form_validation->set_rules('textarea', 'This field is required.', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

            } else {

                $poster = $this->input->post('poster');
                $startdate = date('Y-m-d', strtotime($this->input->post('startdate')));
                $enddate = date('Y-m-d', strtotime($this->input->post('enddate')));
                $leveltag = $this->input->post('leveltag');
                $prize = $this->input->post('prize');
                $textarea = $this->input->post('textarea');
                $dataContest = array(
                    'poster' => $poster,
                    'start_date' => $startdate,
                    'end_date' => $enddate,
                    'level_tag' => $leveltag,
                    'prize' => $prize,
                    'text' => nl2br(htmlentities($textarea, ENT_QUOTES, 'UTF-8')),
                    'actflg' => 1,
                    "updatedate" => date("Y-m-d H:i:s")
                );

                $insertContest = $this->translation_model->updateInformationContest($id, $dataContest);
                var_dump($insertContest);
                if ($insertContest) {
                    redirect(site_url('translationadmin/thanks/true'));
                }
            }
        }


        $this->ocular->render('applicationBase');
    }

    function thanks() {
        $check = $this->uri->segment(3);
        if ($check == 'true') {
            $this->ocular->set_view_data("check", $check);
        }
        $this->ocular->render('applicationBase');
    }

    public function listcontest() {


        $page = $this->uri->segment(3);
        if ($page == null) {
            $page = 0;
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 10) + 1;
        }

        $listContest = $this->translation_model->listTranslationContest(1, $page, $limit = 10);

        if ($listContest)
            $this->ocular->set_view_data("listContest", $listContest);


        $totalAllContest = $this->translation_model->listTranslationContest(0, 0, 0);
        //pagination
        $config = array();

        $url = base_url() . "translationadmin/listcontest/";
        $config["base_url"] = $url;
        $config["total_rows"] = isset($totalAllContest) ? $totalAllContest : 0;
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
        $this->ocular->set_view_data("totalAllContest", $totalAllContest);
        $this->ocular->render('applicationBase');
    }

    public function detail() {


        $id = $this->uri->segment(3);
        if ($id == null) {
            redirect(site_url('translationadmin/listcontest'));
        }
        $dataChecked = array(
            'check' => 1,
            "updatedate" => date("Y-m-d H:i:s")
        );
        $updateChecked = $this->translation_model->updateChecked($id, $dataChecked);
        //get information contest
        $inforContest = $this->translation_model->getDetailContest($id);
        $this->ocular->set_view_data("inforContest", $inforContest);

        //get answer
        $page = $this->uri->segment(4);
        if ($page == null) {
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 10) + 1;
        }
        $this->load->model('resumes_model');
        $listAnswer = $this->translation_model->listAllTranslationAnswer($id, 1, $page, $limit = 10);
        $array = array();
        for ($i = 0; $i < count($listAnswer); $i++) {
            $cv = $this->resumes_model->getInformationOfUser($listAnswer[$i]['email']);
            if ($cv && $cv['linkresumeonline'] != NULL) {
                $array[$i]['cv'] = $cv['linkresumeonline'];
            }
            $array[$i]['email'] = $listAnswer[$i]['email'];
            $array[$i]['text'] = $listAnswer[$i]['text'];
            $array[$i]['nickname'] = $listAnswer[$i]['nickname'];
            $array[$i]['createdate'] = $listAnswer[$i]['createdate'];
        }

        $this->ocular->set_view_data("listAnswer", $array);


        $totalAllAnswer = $this->translation_model->listAllTranslationAnswer($id, 0, 0, 0);
        //pagination

        $config = array();

        $url = base_url() . "translationadmin/detail/" . $id . '/';

        $config["base_url"] = $url;
        $config["total_rows"] = isset($totalAllAnswer) ? $totalAllAnswer : 0;
        $config["per_page"] = 10;
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

        if (( $config["per_page"] * $pageUrl) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($pageUrl - 1) * $config["per_page"] + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $pageUrl;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }
        if ($totalAllAnswer <= 0) {
            $valueShowRecord = 0;
        }
        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
        $this->ocular->set_view_data("totalAllAnswer", $totalAllAnswer);
        $this->ocular->render('applicationBase');
    }

}
