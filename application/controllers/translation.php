<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Translation extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('translation_model');
        $this->lang->load('message', $this->_lang);
        $this->load->helper('url');
    }

    public function index() {

        $page = $this->uri->segment(3);
        if ($page == null) {
            $page = 0;
            $pageUrl = 1;
        } else {
            $pageUrl = ceil($page / 10) + 1;
        }
        $array = array();
        $listContest = $this->translation_model->listAllContest(1, $page, $limit = 10);

        if ($listContest) {

            if (isset($this->_userInfo->login_token)) {

                for ($i = 0; $i < count($listContest); $i++) {
                    $cv = $this->translation_model->checkAnswer($listContest[$i]['id'], $this->_userInfo->email);
                    if ($cv == true) {
                        $array[$i]['check'] = 1;
                    } else {
                        $array[$i]['check'] = 0;
                    }
                    $array[$i]['id'] = $listContest[$i]['id'];
                    $array[$i]['poster'] = $listContest[$i]['poster'];
                    $array[$i]['text'] = $listContest[$i]['text'];
                    $array[$i]['level_tag'] = $listContest[$i]['level_tag'];
                    $array[$i]['prize'] = $listContest[$i]['prize'];
                    $array[$i]['start_date'] = $listContest[$i]['start_date'];
                    $array[$i]['end_date'] = $listContest[$i]['end_date'];
                    $array[$i]['answers'] = $listContest[$i]['answers'];
                }

                $this->ocular->set_view_data("listContest", $array);
            } else {
                $this->ocular->set_view_data("listContest", $listContest);
            }
        }
        $totalAllContest = $this->translation_model->listAllContest(0, 0, 0);
        //pagination
        $config = array();

        $url = base_url() . "translation/kw/";
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
        if (!$listContest) {
            $valueShowRecord = 0;
        }
        $this->pagination->initialize($config);
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
        $this->ocular->set_view_data("totalAllContest", $totalAllContest);



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
                    'text' => $textarea,
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

    public function insertAnswer() {
        $id = $this->input->post('id');
        $nickname = $this->input->post('nickname');
        $text = $this->input->post('text');
        $email = $this->input->post('email');


        $data = array(
            "translation_contest_id" => $id,
            "nickname" => $nickname,
            "email" => $email,
            "text" => nl2br(htmlentities($text, ENT_QUOTES, 'UTF-8')),
            'actflg' => 1,
            "createdate" => date("Y-m-d H:i:s"),
            "updatedate" => date("Y-m-d H:i:s")
        );

        $this->translation_model->insertAnswer($data);

        echo 'true';
    }

}
