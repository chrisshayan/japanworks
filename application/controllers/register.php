<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('users_model');
    }

    public function index() {
        // set canonical link
        $this->_canonicalLink = site_url('register');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("register_title");

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            //if the form has passed through the validation
            if ($this->input->post('chkIsNewLetter')) {
                $chkIsNewLetter = 1;
            } else {
                $chkIsNewLetter = 0;
            }
            //load job with parametter job_title=nhat ban
            $urlRegister = API_REGISTER;
            $chRegister = curl_init();
            /* old api
             *
              $postField = array(
              "email" => $this->input->post('inputEmail3'), "password" => $this->input->post('inputPassword3'), "firstname" => $this->input->post('inputFirstName'),
              "lastname" => $this->input->post('inputLastName'), "birthday" => "yyyy-mm-dd", "genderid" => "1", "countryid" => "1",
              "cityid" => "29", "isaddnewletter" => $chkIsNewLetter, "isaddedmonthlynewsletter" => $chkIsNewLetter
              );
             */
            // fix for new api 2015.2.4
            $postField = array(
                'email' => $this->input->post('inputEmail3'),
                'password' => $this->input->post('inputPassword3'),
                'firstname' => $this->input->post('inputFirstName'),
                'lastname' => $this->input->post('inputLastName'),
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
                $passwordHash = crypt($this->input->post('inputPassword3'), '$6$sal' . uniqid()); //crypt password
                $dataToStore = array(
                    'uniid' => $resultsRegister->data->userID,
                    'email' => $this->input->post('inputEmail3'),
                    "jplevel" => $this->input->post('jp_level'),
                    "categoryid" => $this->input->post('industry'),
                    "jobexperience" => $this->input->post('exp'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );
                $checkInsert = $this->users_model->registerUserToData($dataToStore);
                //if the insert has returned true then we send mail (if parametter 'test_send_mail' exist)
                if ($checkInsert == TRUE) {

                    /*  if ($this->input->get('test_send_mail') == 1) {
                      $config = Array(
                      'protocol' => 'smtp',
                      'smtp_host' => 'ssl://smtp.googlemail.com',
                      'smtp_port' => 465,
                      'smtp_user' => 'vfa.cuongcl@gmail.com', // change it to yours
                      'smtp_pass' => 'xxx', // change it to yours
                      'mailtype' => 'html',
                      'charset' => 'iso-8859-1',
                      'wordwrap' => TRUE
                      );

                      $data = Array(
                      'email' => $this->input->post('txtEmail'),
                      'firstname' => $this->input->post('txtFirstname'),
                      'password' => $this->input->post('txtPassword')
                      );
                      $this->load->library('email', $config);
                      $this->email->set_newline("\r\n");
                      $this->email->from('vfa.cuongcl@gmail.com'); // change it to yours
                      $this->email->to($this->input->post('txtEmail')); // change it to yours
                      $this->email->subject('Resume from JobsBuddy for your Job posting');
                      $this->email->message($this->load->view('register/template_email', $data, true));
                      if ($this->email->send()) {
                      redirect('register/success');
                      } else {
                      $messageError['message_error'] = "TRUE";
                      $this->ocular->set_view_data('messageError', $messageError);
                      }
                      } else { */
                    redirect('register/success');
                    //}//end send mail
                } else {

                    redirect('register/index');
                } //end insert db
            } else {

                $messageError['message_error'] = true;
                $this->ocular->set_view_data('messageError', $messageError);
                $this->ocular->set_view_data('postField', $postField);
            }//end check API
        }
        $this->ocular->render('emptyLayout');
    }

    public function checkEmailExist() {
        $this->users_model->checkEmailExistInData($this->input->post('txtEmail'));
    }

    public function success() {
        // set canonical link
        $this->_canonicalLink = site_url('register/success');
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("register_success_title");
        $this->ocular->render('emptyLayout');
    }

    public function account_active() {
        $email = $this->input->get('username');
        if ($this->users_model->activeAccount($email)) {
            redirect('user/login');
        }
    }

    public function mypage() {
        //var_dump($this->session->userdata('firstname'));
        $this->ocular->render();
    }

}
