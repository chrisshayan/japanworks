<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}
    
    
    public function login(){
        $this->ocular->render();
    }
    
    public function register(){
        $this->ocular->render();
    }
    
}