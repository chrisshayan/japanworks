<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $_userInfo = null;
    public $_accessToken = null;
    public $_searchData = array();
    public $_locations = array();
    public $_categories = array();
    public $_jobLevels = array();
    public $_showHomeIntro = false;
    public $_showQa = false;
    public $_showEventFb = false;
    public $_rightSideBars = array("/rightSideBar");
    public $_lang = "vn";
    public $_langdb = "lang_en";
    public $_contentTitle = "";
    //header
    public $_imageLink = "";
    public $_pageTitle = "";
    public $_metaKeys = "";
    public $_metaData = "";
    public $_canonicalLink = "";
    public $_mainSiteLink = "";

    public function __construct() {
        parent::__construct();
        //load language
        $this->lang->load('site', $this->_lang);
        $this->_langdb = "lang_" . $this->_lang;
        $this->_mainSiteLink = MAIN_SITE;
        // save cache search data
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->clean();
        if (!$this->_searchData = $this->cache->get('VNW_SEARCH_DATA')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, API_GENERAL_CONFIGURATION);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds
            $results = curl_exec($ch);
            $results = json_decode($results);
            if (isset($results->data)) {
                $this->_searchData = $results->data;
            }

            $this->cache->save('VNW_SEARCH_DATA', $this->_searchData, TIME_CACHE_SEARCH_DATA);
        }

        //redirect error page when not load api general/configuration
        if (!$this->_searchData) {
            redirect("/error");
        }

        //save cache locations
        if (!$this->_locations = $this->cache->get('VNW_LOCATIONS')) {
            foreach ($this->_searchData->locations as $loc) {
                $this->_locations[$loc->location_id] = array("lang_vn" => $loc->lang_vn, "lang_en" => $loc->lang_en);
            }

            $this->cache->save('VNW_LOCATIONS', $this->_locations, TIME_CACHE_SEARCH_DATA);
        }
        //save cache categories
        if (!$this->_categories = $this->cache->get('VNW_CATEGORIES')) {
            foreach ($this->_searchData->categories as $cat) {
                $this->_categories[$cat->category_id] = array("lang_vn" => $cat->lang_vn, "lang_en" => $cat->lang_en);
            }

            $this->cache->save('VNW_CATEGORIES', $this->_categories, TIME_CACHE_SEARCH_DATA);
        }
        //save cache job level
        if (!$this->_jobLevels = $this->cache->get('VNW_JOB_LEVELS')) {
            foreach ($this->_searchData->job_levels as $level) {
                $this->_jobLevels[$level->location_id] = array("lang_vn" => $level->lang_vn, "lang_en" => $level->lang_en);
            }

            $this->cache->save('VNW_JOB_LEVELS', $this->_jobLevels, TIME_CACHE_SEARCH_DATA);
        }
        //$this->output->set_header("Content-type:text/html; charset=UTF-8");
        //$this->output->set_header("Content-type:text/html; charset=Shift_JIS");
        //header('Content-Type: text/html; charset=UTF-8');
        $this->checkLogin();
        //$this->session->unset_userdata('resumes');
        //dump($this->session);
        // set userInfo to GUI
        $this->ocular->set_view_data("userInfo", $this->_userInfo);
        //load ads with xml
        $fileAds = 'static/xml/defauft_ads.xml';
        $xmlAds = simplexml_load_file($fileAds);
        $this->ocular->set_view_data("xmlAds", $xmlAds);
    }

    /**
     * Check User has logon?
     * Date: 2014.06.10
     * Created by TaiNV
     *
     */
    private function checkLogin() {
        if (isset($this->session->userdata['userInfo']) && is_object($this->session->userdata['userInfo'])) {
            $this->_userInfo = $this->session->userdata['userInfo']->profile;
        }
    }

    /**
     * Call API search
     * Date: 2014.06.11
     * Created by CuongDM
     *
     */
    protected function callSearchAPI($search) {
        //check if $search is MeSearch object, implode categories and locations
        if ($search instanceof MySearch) {
            $criteria = array(
                "job_title" => KEYWORD_DEDAULT . ' ' . $search->job_title,
                "job_category" => $search->job_category,
                "job_location" => $search->job_location,
                "job_level" => $search->job_level,
                "page_number" => $search->page_number
            );
            if (!empty($search->job_category)) {
                $strCat = implode(",", $search->job_category);
                $criteria["job_category"] = $strCat;
            }
            if (!empty($search->job_location)) {
                $strCat = implode(",", $search->job_location);
                $criteria["job_location"] = $strCat;
            }
            $search = $criteria;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_SEARCH);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($search));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);
        return $results;
    }

    /**
     * @description     Get search URL pretty
     * @date            2014.06.16
     * @create by       CuongDM
     */
    protected function getSearchUrl($search) {
        $url = "kw/";
        $ids = "";
        if ($search->job_title) {
            $url .= str2alias($search->job_title, false) . "+";
        } else {
            $url .= "all+";
        }
        if ($search->job_category) {
            $ids .= "i";
            foreach ($search->job_category as $cat) {
                if (isset($this->_categories[$cat][$this->_langdb])) {
                    $url .= str2alias($this->_categories[$cat][$this->_langdb]) . '-';
                    $ids .= "{$cat},";
                }
            }
            $ids = trim($ids, ",");
        }
        if ($search->job_location) {
            $url .= "tai";
            $ids .= "v";
            foreach ($search->job_location as $loc) {
                if (isset($this->_locations[$loc][$this->_langdb])) {
                    $url .= "-" . str2alias($this->_locations[$loc][$this->_langdb]) . '-';
                    $ids .= "{$loc},";
                }
            }
            $ids = trim($ids, ",");
        }
        if ($search->job_level) {
            if (isset($this->_jobLevels[$search->job_level][$this->_langdb])) {
                $url .= str2alias($this->_jobLevels[$search->job_level][$this->_langdb]);
                $ids .= "l{$search->job_level}";
            }
        }
        if ($ids) {
            $url = trim($url, '-') . '_' . $ids;
        }

        $url = trim($url, "+");
        return $url;
    }

}

?>