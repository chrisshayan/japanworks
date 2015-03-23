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

        $this->ocular->set_view_data("search", $search);
        $this->session->set_userdata("VNW_SEARCH_DETAIL", $search);
        $results = $this->callSearchAPI($search);

        /*
          //template mockup
          $curl = curl_init();
          curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => 'http://demo4947318.mockable.io/test_search',
          CURLOPT_USERAGENT => 'Codular Sample cURL Request'
          ));
          $resp = curl_exec($curl);
          curl_close($curl);
          // var_dump($resp);
          $results = json_decode($resp);
          // var_dump($results);
          //template mockup
         */
        $countFeature = 0;
        if (isset($results->data) && $results->data->total > 0) {
            foreach ($results->data->jobs as $key => $job) {
                if ($job->job_post_plus == "1" & $job->is_show_job_image == "1") {
                    if ($job->featured_job == "1")
                        $countFeature ++;
                }
            }
            $this->ocular->set_view_data("data", $results->data);
        } else {
            $this->ocular->set_view_data("data", array());
        }
        $this->ocular->set_view_data("countFeature", $countFeature);
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
        $qaTop = getCurl(API_QA_TOP . KEY_QA);
        $this->ocular->set_view_data("qaTop", $qaTop);
        //end get information from StackExchange API
        $this->ocular->set_view_data("valueShowRecord", $valueShowRecord);
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */