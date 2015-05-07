<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crontab extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function createjson() {
        $resultData = array();
        $listCategory = array();
        $countAllJob = 0;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_GENERAL_CONFIGURATION);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'CONTENT-MD5: 8982065e30ea02cf02e93a83824cf65b7de1e69545ce8bed4f2bb3c98a862b70',
            'Content-Type: application/JSON', 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds
        $results = curl_exec($ch);
        $results = json_decode($results);
        curl_close($ch);
        if (isset($results->data)) {
            $listCategory = $results->data->categories;
        }

        if (isset($listCategory)) {
            foreach ($listCategory as $cate) {
                $search = new MySearch();
                $search->job_category[] = $cate->category_id;
                $resultsNum = $this->callSearchAPI($search);
                if (isset($resultsNum->data->total)) {
                    $cate->total = $resultsNum->data->total;
                    $countAllJob += $cate->total;
                } else {
                    $cate->total = 0;
                }
            }

            $resultData['meta']['total_jobs'] = $countAllJob;
            $resultData['meta']['date_create'] = date("Y-m-d H:i:s");
        }

        $resultData["data"] = $listCategory;
        $file = FCPATH . "static/json/category.json";

        // Writing modified data:
        $fh = fopen($file, 'w') or die("Error opening output file");
        fwrite($fh, json_encode($resultData, 256));
        fclose($fh);
    }

    /**
     * @Description count job in time
     * @param type $time
     * @Author CuongDM
     */
    function countJob($time = 604800) {
        $search = new MySearch();
        $go = true;
        $count = 0;
        while ($go) {
            $results = $this->callSearchAPI($search);
            if (isset($results->data->jobs) && !empty($results->data->jobs)) {
                foreach ($results->data->jobs as $job) {
                    $date = str_replace('/', '-', $job->posted_date);
                    if (time() - strtotime($date) < $time) {
                        $count++;
                    }
                }
                $search->page_number++;
            } else {
                $go = false;
            }
        }

        $file = FCPATH . "static/json/jobOfWeek.txt";

        // Writing modified data:
        $fh = fopen($file, 'w') or die("Error opening output file");
        fwrite($fh, $count);
        fclose($fh);
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/crontab.php */