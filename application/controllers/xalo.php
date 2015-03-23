<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xalo extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    protected function sendEmail($data) {

        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'mailtype' => 'html',
            'charset' => MAIL_CHARSET,
            'smtp_timeout' => SMTP_TIMEOUT,
            'wordwrap' => TRUE,
        );
        $linkImg = "http://japan.vietnamworks.com/static/img/logo.png";
        $this->load->library('email', $config);

        //send mail to user
        $this->email->set_newline("\r\n");
        /*
          $this->email->from(EMAIL_SENDER, NAME_SENDER);
          //$this->email->reply_to();
          $this->email->to($data['email']); // change it to
          // $this->email->to("vfa.hienhq@gmail.com"); // change it to yours
          $this->email->subject(SUBJECT_FOR_XALO_USER . $data['fullname']);
          $this->email->message($this->load->view('xalo/xalo_end_user_template', $data, true));
          $results = $this->email->send();
         */
        //new 09.02.2015
        $results = true;
        if ($results) { //send mail to company
            $this->email->clear();
            $this->email->from(EMAIL_SENDER, NAME_SENDER); // change it to yours
            //  $this->email->reply_to();
            //list mail to
            $listTo = (unserialize(LIST_MAIL_TO_XALO)); //$this->email->to($data['mailto']);
            $this->email->to($listTo);
            // $this->email->to('info@mmj.com.vn');
            // $listBBC = (unserialize(LIST_MAIL_BBC_XALO));
            // $this->email->bcc($listBBC);
            $this->email->subject((SUBJECT_FOR_XALO_COMPANY));
            $this->email->message($this->load->view('xalo/xalo_company_template', array("data" => $data), true));



            $results_after = $this->email->send();
            return $results_after;
        } else {
            return $results;
        }
    }

    public function thanks() {
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");
        $this->ocular->render('emptyLayoutApply');
    }

    function valid_for_email($str) {

        if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) {
            $this->form_validation->set_message('valid_for_email', 'Please enter your email.');
            return FALSE;
        } else {

            return TRUE;
        }
        // return (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) ? FALSE : TRUE;
    }

    function valid_for_phone($str) {

        if (!preg_match("/^[0-9().-]+$/", $str)) {
            $this->form_validation->set_message('valid_for_phone', 'Please enter your phone number');
            return FALSE;
        } else {
            return TRUE;
        }
        // return (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) ? FALSE : TRUE;
    }

    public function index() {
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

        $search->job_title = KEYWORD_EDUCATION;
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


        $this->ocular->render('blank');
    }

    /**
     * Description  Register account to VNW
     * API:  /users/register....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    public function getCounpoun() {
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
        $this->load->model('special_users_model');



        //check option when insert db
        $dataToStore = array(
            'email' => $this->input->post('email'),
            'fullname' => $this->input->post('fullname'),
            'phonenumber' => $this->input->post('phone'),
            'location' => $this->input->post('location'),
            'yearofbirth' => $this->input->post('yearofbirth'),
            'jplevel' => $this->input->post('japanlv'),
            'actflg' => 1,
            "createdate" => date("Y-m-d H:i:s"),
            "updatedate" => date("Y-m-d H:i:s")
        );

        $this->special_users_model->registerUserToData($dataToStore);
        $sendMail = $this->sendEmail($dataToStore);
        //after send mail
        if ($sendMail) {
            echo 'true';
            // redirect('xalo/thanks');
        } else {

            echo 'false';
        }
    }

}
