<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sregister extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('users_model');
        $this->lang->load('message', $this->_lang);
        $this->load->helper('url');
    }

    public function index() {
        // set canonical link

        if (isset($this->_userInfo->login_token)) {
            redirect(site_url('/'));
        }

        $this->_canonicalLink = site_url('sregister');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("register_title");

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            //load job with parametter job_title=nhat ban
            $urlRegister = API_REGISTER;
            $chRegister = curl_init();

            // fix for new api 2015.2.4
            $postField = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'lang' => 1 // Vietnamese
            );

            curl_setopt($chRegister, CURLOPT_URL, $urlRegister);
            curl_setopt($chRegister, CURLOPT_POST, 1);
            curl_setopt($chRegister, CURLOPT_POSTFIELDS, json_encode($postField));
            curl_setopt($chRegister, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($chRegister, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chRegister, CURLOPT_HTTPHEADER, array(
                API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
            curl_setopt($chRegister, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($chRegister, CURLOPT_TIMEOUT, 36000); //timeout in seconds

            $resultsRegister = curl_exec($chRegister);
            curl_close($chRegister);
            $resultsRegister = json_decode($resultsRegister);
            if ($resultsRegister->meta->code == 200 && $resultsRegister->meta->message == 'Success') {// if result API success
                $passwordHash = crypt($this->input->post('password'), '$6$sal' . uniqid()); //crypt password
                $dataToStore = array(
                    'uniid' => $resultsRegister->data->userID,
                    'email' => $this->input->post('email'),
                    "jplevel" => 0,
                    "categoryid" => 0,
                    "jobexperience" => 0,
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );
                $checkInsert = $this->users_model->registerUserToData($dataToStore);
                //if the insert has returned true then we send mail (if parametter 'test_send_mail' exist)
                if ($checkInsert == TRUE) {

                    redirect('register/success');
                } else {

                    redirect('sregister/index');
                } //end insert db
            } else {

                $this->checkExistInJpwAndInsert($this->input->post('email'), 0);

                $messageError['message_error'] = true;
                $this->ocular->set_view_data('messageError', $messageError);
                $this->ocular->set_view_data('postField', $postField);
            }//end check API
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


        $this->ocular->render('applicationBase');
    }

    private function checkExistInJpwAndInsert($email, $socialId) {
        $checkJPW = $this->users_model->checkEmailExistInJPW($email);
        if (!$checkJPW) {
            $dataToStore = array(
                'uniid' => NULL,
                'existflg' => 1,
                'email' => $email,
                "jplevel" => 0,
                "categoryid" => 0,
                "jobexperience" => 0,
                "social" => $socialId,
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );

            $checkInsert = $this->users_model->registerUserToData($dataToStore);
        }
    }

}
