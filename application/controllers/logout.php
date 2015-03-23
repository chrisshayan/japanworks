<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $msg = $this->exeLogout();

        // set canonical link
        $this->_canonicalLink = site_url('logout');

        $this->ocular->set_view_data("msg", $msg);
        $this->ocular->render('emptyLayout');
    }

    /**
     * Execute to logout
     * Created by TaiNV
     * Date: 2014.06.10
     * */
    private function exeLogout() {
        if (isset($this->_userInfo->login_token)) {
            // call login api
            $usrToken = $this->_userInfo->login_token;
            $logoutLnk = API_LOGOUT . '/token/' . $usrToken;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $logoutLnk);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(API_HEADER_CONTENT, API_HEADER_TYPE, API_HEADER_ACCEPT));
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

            $results = curl_exec($ch);
            $results = json_decode($results);
            if ($results->meta->code == 200) {
                // destroy session at my page
                $this->session->unset_userdata('userInfo');
            }
            redirect(site_url('logout/'));
        }
    }

}
