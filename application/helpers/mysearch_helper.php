<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MySearch {

    public $job_title = "";
    public $job_category = array();
    public $job_location = array();
    public $job_level = 0;
    public $page_number = 1;
    public $limit = 20;

    function __construct() {

    }

}
