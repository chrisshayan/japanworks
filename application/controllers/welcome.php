<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->config->load('linkedin');

        $this->data['consumer_key'] = $this->config->item('api_key');
        $this->data['consumer_secret'] = $this->config->item('secret_key');
        $this->data['callback_url'] = site_url() . '/user/linkedin_submit';
    }

    /**
     * Description
     * Author       CuongDM
     * Date         10/06/2014
     */
    function index() {
        //set statistic of job
        $jobStatistic = array();
        // set canonical link
        $this->_canonicalLink = site_url();
        $this->_showHomeIntro = true;
        $this->_showQa = true;
        $this->_showEventFb = true;
        $this->_contentTitle = $this->lang->line("new_jobs");
        //check search data
        $search = new MySearch();
        if ($this->session->userdata("VNW_SEARCH_DETAIL")) {
            $search = $this->session->userdata("VNW_SEARCH_DETAIL");
        }

        $this->ocular->set_view_data("search", $search);

        //do when submit search criteria
        if ($params = $this->input->post()) {
            $keyword = @$this->input->post("job_title");

            $categories = @$this->input->post("job_category");
            $locations = @$this->input->post("job_location");
            $level = @$this->input->post("job_level");
            $search = new MySearch();
            if ($keyword)
                $search->job_title .= ' ' . $keyword;
            if ($categories)
                $search->job_category = $categories;
            if ($locations)
                $search->job_location = $locations;


            $search->job_level = $level;

            $this->session->set_userdata("VNW_SEARCH_DETAIL", $search);

            $url = $this->getSearchUrl($search);

            redirect(site_url($url));
        }
        //CuongCL
        //load feature with xml
        $fileFeature = 'static/xml/defauft_feature.xml';
        $xmlFeature = simplexml_load_file($fileFeature);
        $this->ocular->set_view_data("xmlFeature", $xmlFeature);
        //end ads xml
        //set data from search
        $this->ocular->set_view_data("results", $this->_searchData);


        //load job with parametter job_title=nhat ban
        $indexData = new MySearch();
        $indexData->job_title = KEYWORD_HOME;
        $resultsSearchJob = $this->callSearchAPI($indexData);

        if (isset($resultsSearchJob->data) && !empty($resultsSearchJob->data)) {
            //  if (isset($resultsSearchJob->data) && !empty($resultsSearchJob->data)) {
            $this->ocular->set_view_data("resultsSearchJob", $resultsSearchJob);
        } else {
            $this->ocular->set_view_data("resultsSearchJob", array());
        }
        //get information from StackExchange API

        $qaTop = array();  //   $qaTop = getCurl(API_QA_TOP . KEY_QA);
        $this->ocular->set_view_data("qaTop", $qaTop);
        //--end get information from StackExchange API
        //icon of benefit
        $benefitIcon = array('', 'fa-dollar', 'fa-user-md', 'fa-file-image-o', 'fa-graduation-cap', 'fa-trophy',
            'fa-book', 'fa-laptop', 'fa-mobile', 'fa-plane', 'fa-glass',
            'fa-cab', 'fa-coffee', 'fa-gift', 'fa-child', 'fa-check-square-o');
        $this->ocular->set_view_data("benefitIcon", $benefitIcon);
        //--end icon of benefit
        //load hot jobs
        $fileJson = 'static/json/category.json';
        $strData = file_get_contents($fileJson);
        $datas = json_decode($strData, true);
        $categories = $datas["data"];
        sortByColumn($categories, 'total', SORT_DESC);
        //--end load hot jobs
        //load statistic job
        $jobStatistic['total'] = @$resultsSearchJob->data->total;
        $file = FCPATH . "static/json/jobOfWeek.txt";
        $jobStatistic["week"] = @file_get_contents($file);
        $this->ocular->set_view_data("jobStatistic", $jobStatistic);

        $hotCats = array();
        foreach ($categories as $key => $cat) {
            if (is_numeric($key)) {
                // show 15 categories
                if ($key > 14) {
                    break;
                }
                $hotCats[] = $cat;
            }
        }
        $this->ocular->set_view_data("hotCats", $hotCats);


        //get information from Event FB
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);

        $listEvent = $this->callData(0);

        $this->ocular->set_view_data("listEvent", $listEvent);

        //facebook
        // Get User ID
        $this->load->helper('url');
        // $this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this

        $this->load->library('facebook', array(
            'appId' => SET_APPID_FB,
            'secret' => SET_APPSECRET_FB,
        ));
        $user = $this->facebook->getUser();
        $loginFbUrl = $this->facebook->getLoginUrl(array('redirect_uri' => site_url('social/facebookSubmit'),
            'scope' => array("email") // permissions here
        ));
        $this->ocular->set_view_data("loginFbUrl", $loginFbUrl);
        //end facebook
        //Get google
        $this->load->library('googleplus');
        $this->_gp_client = $this->googleplus->client;
        $loginGpUrl = $this->_gp_client->createAuthUrl();
        $this->ocular->set_view_data("loginGpUrl", $loginGpUrl);
        //end google
        $this->ocular->render('applicationNew');
    }

    public function callData($num) {
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);
        $accToken = str_replace('"', '', $accToken);
        $apiListEvent = sprintf(API_FB_EVENT_LIST, FB_PAGE_ID, $accToken);

        $listEvent = getCurl($apiListEvent);

        if (isset($listEvent->error->code) && $listEvent->error->code == '190') {
            //if call function repeat a lot . stop it
            if ($num > 5) {
                return null;
            }
            $num++;
            $apiGetEvent = sprintf(API_FB_GET_TOKEN, FB_APP_ID, FB_SERCRET_ID);
            $appToken = file_get_contents($apiGetEvent);
            $accToken = str_replace('"', '', $accToken);
            $file = FCPATH . "static/json/token.json";
            $fh = fopen($file, 'w') or die("Error opening output file");
            fwrite($fh, json_encode($appToken, 256));
            fclose($fh);
            $this->callData($num);
        } else {
            return $listEvent;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
