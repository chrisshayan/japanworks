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

        $checkShowPopUp = 0;
        if (isset($_SERVER['HTTP_REFERER'])) {
            $link = $_SERVER['HTTP_REFERER'];
            if (strpos($link, 'register/success') == true) {
                $checkShowPopUp = 1;
            }
        }

        $this->ocular->set_view_data("checkShowPopUp", $checkShowPopUp);
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
        $this->ocular->render('applicationBaseSearch');
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

    /**
     * Description  Send email to job alert
     * Author       Cuong.Chung
     * Date         29.06.2015
     */
    public function sendJobAlert() {

        $email = $this->input->post('email');
        $keyword = $this->input->post('keyword');
        $frequency = $this->input->post('frequency');
        $salary = $this->input->post('salary');
        if ($this->input->post('job_categories') != "")
            $jobCategories = explode(",", $this->input->post('job_categories'));
        else
            $jobCategories = array();
        $jobLevel = $this->input->post('job_level');
        if ($this->input->post('job_locations') != "")
            $jobLocation = explode(",", $this->input->post('job_locations'));
        else
            $jobLocation = array();


        // call login api
        $criteria = array('email' => $email, "keywords" => $keyword, "job_categories" => $jobCategories, "job_locations" => $jobLocation, 'min_salary' => $salary, "job_level" => $jobLevel, "frequency" => 3, "lang" => 1);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_JOB_ALERT);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($criteria, JSON_NUMERIC_CHECK));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(API_HEADER_CONTENT, API_HEADER_TYPE, API_HEADER_ACCEPT));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds
        $results = curl_exec($ch);
        $results = json_decode($results);

        if ($results->meta->code == 200 && $results->data->createdStatus == 'SENT_EMAIL') {
            echo 'true';
        } else {
// print to screen: login faile
            echo 'false';
        }
    }

    public function getUrlAlert() {
        $keyword = $this->input->post('keyword');
        $categories = @$this->input->post('job_categories');
        $locations = @$this->input->post('job_locations');
        $level = @$this->input->post("job_level");

        $searchNEW = new MySearch();
        if ($keyword)
            $searchNEW->job_title .= ' ' . $keyword;
        if ($categories)
            $searchNEW->job_category = $categories;
        if ($locations)
            $searchNEW->job_location = $locations;


        $searchNEW->job_level = $level;

        $url = $this->getSearchUrl($searchNEW);

        echo site_url($url);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
