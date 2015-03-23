<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->lang->load('message', $this->_lang);
        // if logon
        if (isset($this->_userInfo->login_token)) {
            redirect(site_url('/'));
        }

        $msg = $this->exeLogin();

        // set canonical link
        $this->_canonicalLink = site_url('login');

        $this->ocular->set_view_data("msg", $msg);
        $this->ocular->render('emptyLayout');
    }

    private function exeLogin() {
        $msg = '';
        if ($_POST && isset($_POST['login'])) {
            $this->_myData = $this->input->form();
            $email = trim($this->_myData['username']);
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
                $this->session->set_userdata('userInfo', $results->data);

                redirect(site_url('/'));
            } else {
                // print to screen: login faile
                return $this->lang->line('login_fail');
            }
        }
        return $msg;
    }

}
