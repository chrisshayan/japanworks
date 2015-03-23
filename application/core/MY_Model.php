<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    public $db;
    public $master;
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
}

/* End of file MY_Model.php */
/* Location: ./application/libraries/MY_Model.php */
