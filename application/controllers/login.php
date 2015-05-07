<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->lang->load('message', $this->_lang);
    }

    function index() {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $link = $_SERVER['HTTP_REFERER'];
            if (strpos($link, base_url('login')) === false) {
                $this->session->set_userdata('linkBackLogin', $link);
            }
        }
        $this->lang->load('message', $this->_lang);
        // if logon
        if (isset($this->_userInfo->login_token)) {
            redirect(site_url('/'));
        }

        $msg = $this->exeLogin();

        // set canonical link
        $this->_canonicalLink = site_url('login');
        $this->ocular->set_view_data("myData", $this->_myData);
        $this->ocular->set_view_data("msg", $msg);
        $this->ocular->render('emptyLayout');
    }

    private function exeLogin() {
        $msg = '';


        if ($_POST && isset($_POST['login'])) {
            $this->_myData = $this->input->form();

            $email = trim($this->_myData['inputEmail']);
            $password = trim($this->_myData['inputPassword']);

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
                $this->session->set_userdata('userInfo', $results->data);
                $this->session->set_userdata('passwordUser', $password);
                if ($this->session->userdata('linkBackLogin'))
                    redirect($this->session->userdata('linkBackLogin'));
                else
                    redirect(site_url('/'));
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

    /**
     * Description  Call API send email if forgot password
     * API:  '/users/request_password/user_email/....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    public function forgotPassword() {
        if (isset($this->_userInfo->login_token)) {
            redirect(site_url('/'));
        }
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));

        if ($this->input->post()) {
            //validate form

            $this->form_validation->set_rules('inputEmail', 'Vui lòng nhập email.', 'trim|required|callback_valid_for_email');


            if ($this->form_validation->run()) {
                $email = $this->input->post('inputEmail');
                $url = API_REQUEST_PASSWORD . '/' . $email;
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

                if ($results->meta->code == 200 && $results->meta->message == 'OK') {

                    redirect(site_url('/login/forgotDone'));
                } else {
                    redirect(site_url('/login/forgotDone'));
                    //echo 'false';
                }
            }
        }

        $this->ocular->render('emptyLayout');
    }

    public function forgotDone() {
        $this->ocular->render('emptyLayout');
    }

}
