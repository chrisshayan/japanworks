<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Description
     * Author       CuongDM
     * Date         10/06/2014
     */
    function index() {

        //$this->load->library('session');
        $params = $this->uri->uri_to_assoc(1);
        $this->_showQa = true;
        if (isset($params['kw']))
            $paramsUrl = parseSearchUrl(urldecode($params['kw']));

        $search = new MySearch();
        if (isset($paramsUrl) && $paramsUrl) {
            if (isset($paramsUrl["kw"])) {
                $search->job_title = $paramsUrl["kw"];
            }

            if (isset($paramsUrl["categories"])) {
                $search->job_category = $paramsUrl["categories"];
            }

            if (isset($paramsUrl["locations"])) {
                $search->job_location = $paramsUrl["locations"];
            }

            if (isset($paramsUrl["level"])) {
                $search->job_level = $paramsUrl["level"];
            }
        }

        if (isset($params["p"])) {
            $pageNumber = ($params["p"] / $search->limit);
            if ($pageNumber >= 1) {
                $search->page_number = (int) floor($pageNumber) + 1;
            }
        }
        //set url canonical
        $this->_canonicalLink = site_url($this->getSearchUrl($search));

        $this->session->set_userdata("link_search", $this->getSearchUrl($search));
        $this->ocular->set_view_data("search", $search);
        $this->session->set_userdata("VNW_SEARCH_DETAIL", $search);

        $results = $this->callSearchAPI($search);

        $arr = $search->job_location;

        $countFeature = 0;
        $dataJobFirst = array();
        $dataJobSecond = array();


        if (isset($results->data) && $results->data->total > 0) {
            foreach ($results->data->jobs as $key => $job) {

                //sorf job
                if ($job->top_level == "1" & $job->job_post_plus == "1") {
                    array_push($dataJobFirst, $job);
                } else {
                    array_push($dataJobSecond, $job);
                }
                //count Feature
                if ($job->job_post_plus == "1" & $job->is_show_job_image == "1") {
                    if ($job->featured_job == "1")
                        $countFeature ++;
                }
            }
            $this->ocular->set_view_data("data", $results->data);
        } else {
            $this->ocular->set_view_data("data", array());
        }

        // var_dump($dataJobSecond);
        $this->ocular->set_view_data("countFeature", $countFeature);

        //sort job


        $this->ocular->set_view_data("dataJobFirst", $dataJobFirst);
        $this->ocular->set_view_data("dataJobSecond", $dataJobSecond);
        // information
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("search_result_title");
        $this->ocular->set_view_data("searchDetail", $search);



        //load hot jobs
        $fileJson = 'static/json/category.json';
        $strData = file_get_contents($fileJson);
        $datas = json_decode($strData, true);
        $categories = $datas["data"];
        sortByColumn($categories, 'total', SORT_DESC);
        $hotCats = array();
        foreach ($categories as $key => $cat) {
            if (is_numeric($key)) {
                if ($key > 14) {
                    break;
                }
                $hotCats[] = $cat;
            }
        }

        $this->ocular->set_view_data("hotCats", $hotCats);

        //pagination
        $config = array();
        $url = base_url() . "kw/";
        if (isset($params['kw'])) {
            $url .= $params['kw'];
        } else {
            $url .= "all";
        }
        $config["base_url"] = $url . '/p/';
        $config["total_rows"] = isset($results->data->total) ? $results->data->total : 0;
        $config["per_page"] = $search->limit;
        $config["uri_segment"] = 4;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Sau';
        $config['prev_link'] = 'Trước';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li style = "display:none">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li style = "display:none">';
        $config['last_tag_close'] = '</li>';

        $dataPagination = array();

        if (( $config["per_page"] * $search->page_number) > $config["total_rows"]) {
            $recordInPage = $config["total_rows"];
            $valueShowRecord = (($search->page_number - 1) * $search->limit + 1) . " - " . $recordInPage;
        } else {
            $recordInPage = $config["per_page"] * $search->page_number;
            $valueShowRecord = ($recordInPage - $config["per_page"] + 1) . " - " . $recordInPage;
        }

        $this->pagination->initialize($config);

        //get information from StackExchange API
        $qaTop = array(); // $qaTop = getCurl(API_QA_TOP . KEY_QA);
        $this->ocular->set_view_data("qaTop", $qaTop);
        //--end get information from StackExchange API
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
        //icon of benefit
        $benefitIcon = array('', 'fa-dollar', 'fa-user-md', 'fa-file-image-o', 'fa-graduation-cap', 'fa-trophy',
            'fa-book', 'fa-laptop', 'fa-mobile', 'fa-plane', 'fa-glass',
            'fa-cab', 'fa-coffee', 'fa-gift', 'fa-child', 'fa-check-square-o');
        $this->ocular->set_view_data("benefitIcon", $benefitIcon);
        //--end icon of benefit
        //---facebook
        $this->load->helper('url');
        $this->load->library('facebook', array(
            'appId' => SET_APPID_FB,
            'secret' => SET_APPSECRET_FB,
        ));
        $user = $this->facebook->getUser();
        $loginFbUrl = $this->facebook->getLoginUrl(array('redirect_uri' => site_url('social/facebookSubmit'),
            'scope' => array("email") // permissions here
        ));
        $this->ocular->set_view_data("loginFbUrl", $loginFbUrl);
        //---end facebook
        //Get google
        $this->load->library('googleplus');
        $this->_gp_client = $this->googleplus->client;
        $loginGpUrl = $this->_gp_client->createAuthUrl();
        $this->ocular->set_view_data("loginGpUrl", $loginGpUrl);
        //end google
        $this->ocular->render('applicationForSearch');
    }

    /**
     * Description  Search job level
     * Author       CuongDM
     * Date         10/06/2014
     */
    function jobLevel($id) {
        $search = new MySearch();

        if (isset($this->_jobLevels[$id])) {
            $search->job_level = $id;
        }

        $this->session->set_userdata("VNW_SEARCH_DETAIL", $search);

        $url = $this->getSearchUrl($search);

        redirect($url);
    }

    /**
     * Description  Send email to job alert
     * Author       Cuong.Chung
     * Date         31.03.2015
     */
    public function sendEmailJobAlert() {

        $email = $this->input->post('email');
        $keyword = $this->input->post('keyword');

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
        $criteria = array('email' => $email, "keywords" => $keyword, "job_categories" => $jobCategories, "job_locations" => $jobLocation, "job_level" => $jobLevel, "frequency" => 3, "lang" => 1);

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

    /**
     * Description  Send email to job alert
     * Author       Cuong.Chung
     * Date         31.03.2015
     */
    public function sendEmailJobAlert2() {

        $email = $this->input->post('email');
        $keyword = $this->input->post('keywords');
        $jobCategories = $this->input->post('job_categories');
        $jobLevel = $this->input->post('job_level');
        $jobLocation = $this->input->post('job_locations');

        // call login api

        $criteria = array('email' => $email, "keywords" => $keyword, "job_categories" => $jobCategories, "job_locations" => $jobLocation, "job_level" => $jobLevel, "frequency" => 3, "lang" => 1);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_JOB_ALERT);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($criteria));
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
