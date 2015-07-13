<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Social extends MY_Controller {

    private $_gp_client;
    private $_gp_plus;
    private $_gp_moment;
    private $_gp_plusItemScope;

    public function __construct() {
        parent::__construct();
        $this->config->load('linkedin');

        $this->data['consumer_key'] = '754959j85nnhd1';
        $this->data['consumer_secret'] = 'aj92pTRKNI3brfNg';
        $this->data['callback_url'] = site_url() . 'social/linkedinSubmit';
    }

    function linkedin() {
        $this->load->library('linkedin', $this->data);
        $token = $this->linkedin->get_request_token();
        $oauth_data = array(
            'oauth_request_token' => $token['oauth_token'],
            'oauth_request_token_secret' => $token['oauth_token_secret']
        );
        $auth_data = $this->session->userdata('auth');
        $this->session->set_userdata($oauth_data);
        $request_link = $this->linkedin->get_authorize_URL($token);
        header("Location: " . $request_link);
    }

    function linkedinSubmit() {

        $this->data['oauth_token'] = $this->session->userdata('oauth_request_token');

        $this->data['oauth_token_secret'] = $this->session->userdata('oauth_request_token_secret');

        $this->load->library('linkedin', $this->data);

        $this->session->set_userdata('oauth_verifier', $this->input->get('oauth_verifier'));

        $tokens = $this->linkedin->get_access_token($this->input->get('oauth_verifier'));

        $access_data = array(
            'oauth_access_token' => $tokens['oauth_token'],
            'oauth_access_token_secret' => $tokens['oauth_token_secret']
        );

        $this->session->set_userdata($access_data);
        /*
         * Store Linkedin info in a session
         */
        $auth_data = array('linked_in' => serialize($this->linkedin->token), 'oauth_secret' => $this->input->get('oauth_verifier'));
        $status_response = $this->linkedin->getData('http://api.linkedin.com/v1/people/~:(id,first-name,last-name,email-address)', unserialize($auth_data['linked_in']));

        $xmlPar = (htmlentities($status_response, ENT_QUOTES, "UTF-8"));
        $xml = simplexml_load_string($status_response) or die("Error: Cannot create object");
        if (isset($xml)) {
            $firstnameLn = $xml->{'first-name'};
            $lastnameLn = $xml->{'last-name'};
            $emailLn = $xml->{'email-address'};

            $newdata = array(
                'firstname' => (string) $firstnameLn,
                'lastname' => (string) $lastnameLn,
                'email' => (string) $emailLn
            );

            $this->session->set_userdata('data_linkedin', $newdata);
        }
        $this->session->set_userdata(array('auth' => $auth_data));
        redirect('/register/success/linkedin');
    }

    function facebookSubmit() {
        //facebook -------
        $this->load->library('facebook', array(
            'appId' => SET_APPID_FB,
            'secret' => SET_APPSECRET_FB,
        ));
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $this->facebook->api('/me');
                $newdata = array(
                    'firstname' => trim($user_profile['first_name']),
                    'lastname' => trim($user_profile['last_name']),
                    'email' => trim($user_profile['email'])
                );
                $this->session->set_userdata('data_facebook', $newdata);
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
        redirect('/register/success/facebook');
    }

    function googlePlus() {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('googleplus');
        $this->_gp_client = $this->googleplus->client;
        $this->_gp_plus = $this->googleplus->plus;


        if ($this->input->get_post('code')) {
            try {
                $aaa = $this->_gp_client->authenticate($this->input->get_post('code'));
                $access_token = $this->_gp_client->getAccessToken();
                $response = $this->_gp_plus->people->get('me');

                $emails = $response->getEmails();
                $names = $response->getName();
                $newdata = array(
                    'firstname' => trim($names['familyName']),
                    'lastname' => trim($names['givenName']),
                    'email' => trim($emails[0]['value'])
                );
                $this->session->set_userdata('data_google', $newdata);
            } catch (Google_Auth_Exception $e) {
                error_log($e);
            }
        }
        redirect('/register/success/google');
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/crontab.php */
