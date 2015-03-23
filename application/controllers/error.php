<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->ocular->set_view_data("view_name", "index");
        $this->lang->load('message', $this->_lang);
    }

    function error404() {
        $this->_contentTitle = $this->lang->line("error_404");

        $message = $this->lang->line("can_not_found");

        $this->ocular->set_view_data("message", $message);

        $this->ocular->render("emptyLayout");
    }

}
