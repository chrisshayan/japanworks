<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function term() {
        // set canonical link
        $this->_canonicalLink = site_url('about/term');
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("register_success_title");
        $this->ocular->render('emptyLayout');
    }

    public function privacy() {
        // set canonical link
        $this->_canonicalLink = site_url('about/privacy');
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("register_success_title");
        $this->ocular->render('emptyLayout');
    }

}
