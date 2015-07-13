<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Author CuongCL
     * Description       List question from stack Exchange
     * Date         2015-03-11
     */
    function index() {

        // set canonical link

        $this->_metaData = "Nếu bạn đang tìm kiếm công việc sử dụng tiếng Nhật. by JapanWorks";
        $this->_pageTitle = "Hội thảo Cơ hội thăng tiến với tiếng Nhật - JapanWorks -";
        //get information from Event fB API
        $fileJson = 'static/json/token.json';
        $accToken = file_get_contents($fileJson);

        $listEvent = $this->callData(0);
        //  var_dump($listEvent);
        $this->ocular->set_view_data("listEvent", $listEvent);
        $this->ocular->render('layoutContent');
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

/* End of file qa.php */
/* Location: ./application/controllers/qa.php */