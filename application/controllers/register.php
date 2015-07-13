<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

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
        if (isset($_SERVER['HTTP_REFERER'])) {
            $link = $_SERVER['HTTP_REFERER'];
            if (strpos($link, base_url('register')) === false) {

                $this->session->set_userdata('linkBackRegister', $link);
            }
        }
        if (isset($this->_userInfo->login_token)) {
            redirect(site_url('/'));
        }

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

                    redirect('register/index');
                } //end insert db
            } else {
                $this->checkExistInJpwAndInsert($this->input->post('email'), 0);
                $messageError['message_error'] = true;
                $this->ocular->set_view_data('messageError', $messageError);
                $this->ocular->set_view_data('postField', $postField);
            }//end check API
        }
        $this->ocular->render('applicationBase');
    }

    public function checkEmailExist() {
        $this->users_model->checkEmailExistInData($this->input->post('txtEmail'));
    }

    public function success() {
        // if logon

        if (isset($this->_userInfo->login_token)) {
            redirect(site_url('/'));
        }
        $socialName = $this->uri->segment(3);

        $descriptionSuccessPage = '<div class="alert alert-success register_success">
                        <h3>Xin chúc mừng! Vui lòng kiểm tra email ngay bây giờ và làm theo hướng dẫn để kích hoạt tài khoản của bạn.</h3><br>
                        <br>
                            1. Kiểm tra Email kích hoạt trong Hộp thư đến (hoặc hòm thư Spam/Thư Rác).<br>
                            2. Click vào Nút kích hoạt trong Email và đăng nhập vào VietnamWorks (Kích hoạt hoàn thành).<br>
                            3. Trở về JapanWorks và đăng nhập.

                    </div>';
        $textExistNotActive = '<div class="alert alert-success register_success"><h3>Email của bạn đã tồn tại ở VietnamWorks nhưng vẫn chưa được kích hoạt.</h3><br> '
                . ' Vui lòng tìm email kích hoạt của Vietnamwork và kích hoạt tài khoản của bạn trước </div>';
        $textExist = '<div class="alert alert-success register_success"><h3>Email của bạn đã tồn tại ở VietnamWorks. </h3><br>'
                . 'Bạn có thể bắt đầu đăng nhập bằng account của Vietnamwork từ <a href="' . base_url('login') . '">đây</a> hoặc bên dưới  </div>';
        $textNew = '<div class="alert alert-success register_success"><h3>Vietnamworks/Japanworks đã gửi cho ban một email có chứa password. </h3><br>'
                . ' Vui lòng sử dụng password đó và đăng nhập</div>';
        if ($socialName === "facebook") {
            //facebook -------
            $dataAccount = $this->session->userdata('data_facebook');
            if ($dataAccount) {
                $checkExist = $this->checkEmailExistInVNW(trim($dataAccount['email']));

                if ($checkExist == "NON_ACTIVATED") {
                    //check and insert if user don't exist in JPW db
                    $this->checkExistInJpwAndInsert($dataAccount['email'], 1);
                    //end check
                    $descriptionSuccessPage = $textExistNotActive;
                } else if ($checkExist == "ACTIVATED") {
                    //check and insert if user don't exist in JPW db
                    $this->checkExistInJpwAndInsert($dataAccount['email'], 1);
                    //end check
                    $descriptionSuccessPage = $textExist;
                } else if ($checkExist == "NEW") {
                    $this->registerAccountNotActive($dataAccount, 1);
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textNew;
                }
            }
        } else if ($socialName === "linkedin") {
            $dataAccount = $this->session->userdata('data_linkedin');
            if ($dataAccount) {
                $checkExist = $this->checkEmailExistInVNW(trim($dataAccount['email']));

                if ($checkExist == 'NON_ACTIVATED') {
                    //check and insert if user don't exist in JPW db
                    $this->checkExistInJpwAndInsert($dataAccount['email'], 3);
                    //end check
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textExistNotActive;
                } else if ($checkExist == "ACTIVATED") {
                    //check and insert if user don't exist in JPW db
                    $this->checkExistInJpwAndInsert($dataAccount['email'], 3);
                    //end check
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textExist;
                } else if ($checkExist == "NEW") {
                    $this->registerAccountNotActive($dataAccount, 3);
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textNew;
                }
            }
        } else if ($socialName === "google") {
            $dataAccount = $this->session->userdata('data_google');
            if ($dataAccount) {
                $checkExist = $this->checkEmailExistInVNW(trim($dataAccount['email']));
                if ($checkExist == 'NON_ACTIVATED') {
                    //check and insert if user don't exist in JPW db
                    $this->checkExistInJpwAndInsert($dataAccount['email'], 2);
                    //end check
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textExistNotActive;
                } else if ($checkExist == "ACTIVATED") {
                    //check and insert if user don't exist in JPW db
                    $this->checkExistInJpwAndInsert($dataAccount['email'], 2);
                    //end check
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textExist;
                } else if ($checkExist == "NEW") {
                    $this->registerAccountNotActive($dataAccount, 2);
                    $titleSuccessPage = '';
                    $descriptionSuccessPage = $textNew;
                }
            }
        }

        $this->ocular->set_view_data("descriptionSuccessPage", $descriptionSuccessPage);
        $msg = $this->exeLogin();
        // set canonical link



        $this->ocular->set_view_data("myData", $this->_myData);
        $this->ocular->set_view_data("msg", $msg);

        $this->ocular->render('applicationBase');
    }

    private function exeLogin() {
        $msg = '';
        if ($this->input->post('isSent') == 'OK') {
            $this->_myData = $this->input->form();

            $email = trim($this->_myData['email']);
            $password = trim($this->_myData['password']);

            if ($email == '' || $password == '') {
                return $this->lang->line('login_fail');
            }

            // call login api
            $criteria = array('user_email' => $email, 'user_password' => $password);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, API_LOGIN);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($criteria));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(API_HEADER_CONTENT, API_HEADER_TYPE, API_HEADER_ACCEPT));
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

            $results = curl_exec($ch);
            $results = json_decode($results);

            if ($results->meta->code == 200 && $results->meta->message == 'OK') {
                // save to session
                $results->data->coverletter = '';
                $this->session->set_userdata('userInfo', $results->data);
                $this->session->set_userdata('passwordUser', $password);
                $this->session->set_userdata('checkLogin', 1);
                if ($this->session->userdata('linkBackRegister')) {

                    //  redirect($this->session->userdata('linkBackRegister'));
                    redirect('/');
                } else {

                    redirect('/');
                }
            } else {
                // print to screen: login faile
                return $this->lang->line('login_fail');
            }
        }
        return $msg;
    }

    function valid_for_email($str) {
        if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) {
            $this->form_validation->set_message('valid_for_email', 'Địa chỉ email không hợp lệ.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function account_active() {
        $email = $this->input->get('username');
        if ($this->users_model->activeAccount($email)) {
            redirect('user/login');
        }
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

    public function mypage() {
        //var_dump($this->session->userdata('firstname'));
        $this->ocular->render();
    }

    /**
     * Description  Call API check email exist
     * API:  /users/account-status/email/....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    private function checkEmailExistInVNW($email) {

        $url = API_ACCOUNT_STATUS . '/' . urlencode($email);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);

        $ret = '';
        if (isset($results->data)) {
            $ret = $results->data->accountStatus;
        }

        //$ret = json_encode($ret);
        return $ret;
    }

    private function registerAccountVNWAndJPW($data, $socialId) {
        $urlRegister = API_REGISTER;
        $chRegister = curl_init();
        // echo $urlRegister;
        $postField = array(
            'email' => trim($data['email']),
            'password' => randomPassword(),
            'firstname' => trim($data['firstname']),
            'lastname' => trim($data['lastname'])
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
            $dataToStore = array(
                'uniid' => $resultsRegister->data->userID,
                'email' => $data['email'],
                "jplevel" => 0,
                "categoryid" => 0,
                "jobexperience" => 0,
                "social" => $socialId,
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            // $checkInsert = $this->users_model->registerSocialUser($dataToStore);
            $checkInsert = $this->users_model->registerUserToData($dataToStore);
            //if the insert has returned true then we send mail (if parametter 'test_send_mail' exist)
        } else {
            redirect('/');
        }
    }

    private function registerAccountNotActive($data, $socialId) {
        $urlRegister = API_REGISTER_WITHOUT_ACTIVE;
        $chRegister = curl_init();
        // echo $urlRegister;
        $postField = array(
            'email' => trim($data['email']),
            'firstname' => trim($data['firstname']),
            'lastname' => trim($data['lastname'])
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
            $dataToStore = array(
                'uniid' => $resultsRegister->data->userID,
                'email' => $data['email'],
                "jplevel" => 0,
                "categoryid" => 0,
                "jobexperience" => 0,
                "social" => $socialId,
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            // $checkInsert = $this->users_model->registerSocialUser($dataToStore);
            $checkInsert = $this->users_model->registerUserToData($dataToStore);
            //if the insert has returned true then we send mail (if parametter 'test_send_mail' exist)
        } else {
            redirect('/');
        }
    }

}
