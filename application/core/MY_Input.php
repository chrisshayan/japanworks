<?php
/**
* MY_Input
*
* Allows CodeIgniter to be passed Query Strings
* NOTE! You must add the question mark '?' to the allowed URI chars,
* and set the URI protocol to PATH_INFO
*
* @package Flame
* @subpackage Hacks
* @copyright 2009, Jamie Rumbelow
* @author Jamie Rumbelow <http://www.jamierumbelow.net>
* @license GPLv3
* @version 1.0.0
*/
class MY_Input extends CI_Input {

    // --------------------------------------------------------------------
    /**
     * Override
     */
    function _sanitize_globals()
    {
        $this->allow_get_array = TRUE;
        parent::_sanitize_globals();
    }

    // --------------------------------------------------------------------
    /**
    * TaiVN 20/01/2011
    */
	function form($xss_clean = FALSE, $method='')
    {
        $form = array();
        if($method=='get' || $method=='')
	        foreach ($_GET as $key => $value)
	        {
	            $form[$key] = htmlspecialchars($this->_fetch_from_array($_GET, $key, $xss_clean), ENT_QUOTES);
	        }
		
	    if($method=='post' || $method=='')
	        foreach ($_POST as $key => $value)
	        {
	            $form[$key] = $this->_fetch_from_array($_POST, $key, $xss_clean);
	        }
        return $form;
    }
}

/* End of file My_Input.php */
/* Location: ./application/libraries/My_Input.php */