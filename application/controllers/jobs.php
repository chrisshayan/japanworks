<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobs extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Description  Show Job Description
     * Author       CuongDM
     * Date         10/06/2014
     */
    function index() {
        redirect(site_url("kw/all"));
    }

    /**
     * Description  View jon detail
     * Author       CuongDM
     * Date         19/06/2014
     */
    function view() {

        $params = $this->uri->uri_to_assoc(1);
        if (!isset($params["job"])) {
            redirect(site_url("404"));
        }

// set main site link
//$this->_mainSiteLink .= '?from=japanworks';

        $jobId = getIdAlias($params["job"]);
        $job = $this->getJobDetail($jobId);
        //check case to store db
        $checkCase = 0;
        if (!isset($job->data) || !$job->data) {
            redirect(site_url("404"));
        }
//set page title
        if (isset($job->data->job_detail->job_title)) {
            $this->_pageTitle = $job->data->job_detail->job_title;
            $this->_metaData = $job->data->job_detail->job_description;
//set breadcrums
            $this->breadcrumb->add($this->lang->line("breadcrumb_lv_0"), base_url());
            $this->breadcrumb->add($job->data->job_detail->job_title);
//set url canonical
            if (isset($job->data->job_url->{$this->_lang})) {
                $this->_canonicalLink = $job->data->job_url->{$this->_lang};
            }
        }

        $dataCV = '';
        if (isset($this->_userInfo->login_token)) {
            $this->load->model('resumes_model');
            $dataCV = $this->resumes_model->getInformationOfUser($this->_userInfo->email);
            $this->ocular->set_view_data('dataCV', $dataCV);
        }


        // NEW CODE FOR APPLY FORM
        // 17-12-2014

        if ($this->input->post('isSent') == 'OK') {


            $this->load->library('form_validation');
            //check validate



            $emailLog = '';
            if (isset($this->_userInfo->login_token)) { // user login
                $this->form_validation->set_rules('inputFirstName', 'please enter your first name.', 'trim|required');
                $this->form_validation->set_rules('inputLastName', 'please enter your last name.', 'trim|required');
                if ($this->form_validation->run() == TRUE) {
                    if ($this->input->post('resumeApply') == "newAttachment") { //chose new CV
                        $checkCase = 1;
                        $emailLog = $this->_userInfo->email;
                        $linkFile = $this->uploadCvToServer($_FILES, $this->_userInfo->email);
                        //array to put in API apply job
                        $post = array(
                            'file_contents' => '@' . $linkFile,
                            'job_id' => $jobId,
                            'application_subject' => 'Application for ' . $job->data->job_detail->job_title,
                            'cover_letter' => '',
                            'email' => $this->_userInfo->email,
                            'password' => $this->session->userdata('passwordUser'),
                            'first_name' => $this->_userInfo->first_name,
                            'last_name' => $this->_userInfo->last_name,
                            'lang' => '1'
                        );
                    } else {
                        $checkCase = 2;
                        $emailLog = $this->_userInfo->email;
                        $linkFile = FCPATH . $dataCV['linkresume'];
                        $post = array(
                            'file_contents' => '@' . $linkFile,
                            'job_id' => $jobId,
                            'application_subject' => 'Application for ' . $job->data->job_detail->job_title,
                            'cover_letter' => '',
                            'email' => $this->_userInfo->email,
                            'password' => $this->session->userdata('passwordUser'),
                            'first_name' => $this->_userInfo->first_name,
                            'last_name' => $this->_userInfo->last_name,
                            'lang' => '1'
                        );
                    }
                }
            } else { //user not login
                $checkCase = 3;
                $emailLog = $this->input->post('inputEmail');
                $this->form_validation->set_rules('inputFirstName', 'please enter your first name.', 'trim|required');
                $this->form_validation->set_rules('inputLastName', 'please enter your last name.', 'trim|required');
                // $this->form_validation->set_rules('inputPhone', 'please enter your phone number.', 'trim|required|callback_valid_for_phone');
                $this->form_validation->set_rules('inputEmail', 'please enter your email.', 'trim|required|callback_valid_for_email');
                $this->form_validation->set_rules('inputFile', 'Please select .', 'trim|callback__do_upload');
                $linkFile = '';
                if ($this->form_validation->run() == TRUE) {


                    //chose option attach file
                    //------------------------------------
                    //upload file to server
                    $linkFile = $this->uploadCvToServer($_FILES, $this->input->post('inputEmail'));
                    //----end upload file to server-------------------------------
                    //check password if mail is exist on VNW or mail is new
                    $passWord = $this->input->post('inputPassword');
                    //array to put in API apply job
                    $post = array(
                        'file_contents' => '@' . $linkFile,
                        'job_id' => $jobId,
                        'application_subject' => 'Application for ' . $job->data->job_detail->job_title,
                        'cover_letter' => '',
                        'email' => $this->input->post('inputEmail'),
                        'password' => $passWord,
                        'first_name' => $this->input->post('inputFirstName'),
                        'last_name' => $this->input->post('inputLastName'),
                        'lang' => '1'
                    );
                }
            }//check login
            //call API apply job

            $checkFirst = 0;
            $result = $this->applyJob($post);
            $checkUser = 2;
            $applyFirst = 1;
            //check result

            if (($result->meta->code == 200 && $result->meta->message == 'Applied') || ($result->meta->code == 400 && $result->meta->message == 'Job has applied already')) {
                //save in store
                if ($checkCase == 1 || $checkCase == 3) {
                    $emailStore = str_replace(array("@", "."), "", $post['email']);
                    $dataToStore = array(
                        'email' => $post['email'],
                        "firstname" => $post['first_name'],
                        "lastname" => $post['last_name'],
                        "nameresume" => $_FILES['inputFile']['name'],
                        'linkresume' => "uploads/" . $emailStore . "/" . $_FILES['inputFile']['name'],
                        'actflg' => 1,
                        "createdate" => date("Y-m-d H:i:s"),
                        "updatedate" => date("Y-m-d H:i:s")
                    );
                    $this->load->model('resumes_model');
                    $this->resumes_model->updateInformationCV($dataToStore);
                }
                //writelog CSV
                if ($result->meta->code == 200 && $result->meta->message == 'Applied') {
                    $applyFirst = 1;
                } else if ($result->meta->code == 400 && $result->meta->message == 'Job has applied already') {
                    $applyFirst = 2;
                }
                if (DISABLE_LOG_CSV == TRUE) {

                    if ($this->input->post('checkActiveEmail') == 1) {
                        $textStatusEmail = "ACTIVATED";
                        $checkUser = 1;
                    } else
                    if ($this->input->post('checkActiveEmail') == 3) {
                        $textStatusEmail = "NON_ACTIVATED";
                        $checkUser = 3;
                    } else {
                        $checkUser = 2;
                        $textStatusEmail = "NEW";
                    }
                    $filename = LOG_DIR . LOG_NAME_CSV . '.csv';
                    $totalRecord = count(file($filename));
                    if (file_exists($filename)) {
                        $totalRecord = count(file($filename));
                    } else {
                        $totalRecord = 1;
                        $checkFirst = 1;
                    }
                    $dataLog = array($totalRecord, date("Y-m-d H:i:s"), $jobId, $job->data->job_company->company_name, $textStatusEmail, $emailLog);
                    writeLogCSV($dataLog, $checkFirst);
                }
                // $this->session->set_userdata("jobIdApplied", $jobId);
                $this->session->set_userdata("tempInfor", $post);
                redirect('jobs/thanks/' . $job->data->job_summary->job_category . '/' . $job->data->job_summary->job_location);
            } else {
                writelog(date("Y-m-d H:i:s") . " 3 " . var_dump($result));
                redirect('jobs/error');
            }
        }

        $this->ocular->set_view_data("job", $job->data);


//set right silde bar
        $this->_rightSideBars = array("jobSummary");


        //icon of benefit
        $benefitIcon = array('', 'fa-dollar', 'fa-user-md', 'fa-file-image-o', 'fa-graduation-cap', 'fa-trophy',
            'fa-book', 'fa-laptop', 'fa-mobile', 'fa-plane', 'fa-glass',
            'fa-cab', 'fa-coffee', 'fa-gift', 'fa-child', 'fa-check-square-o');
        $this->ocular->set_view_data("benefitIcon", $benefitIcon);
        $this->ocular->render('applicationNoRegister');
    }

    /**
     * Description  Call API jon detail
     * Author       CuongDM
     * Date         19/06/2014
     */
    protected function getJobDetail($jobId) {
        $url = API_JOB_DETAIL . '/job_id/' . $jobId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);

        return $results;
    }

    /**
     * Description  Upload CV

     * Author       Cuong.Chung
     * Date         07.4.2015
     */
    protected function uploadCvToServer($file, $email) {
        $linkFile = '';
        $emailUser = str_replace(array("@", "."), "", $email);
        $nameFolder = UPLOAD_DIR . $emailUser . "/";
        $config['upload_path'] = $nameFolder;
        if (!file_exists($nameFolder)) {
            mkdir($nameFolder, 0777);
        }
        if (file_exists($nameFolder)) {
            //writelog file when upload
            writelog(date("Y-m-d H:i:s") . " File upload:  " . json_encode($file) . "_" . $email);
            //chmod for folder
            chmod($nameFolder, 0777);

            $file_name = $file['inputFile']['name'];
            $path_parts = pathinfo($file_name);
            $extension = @$path_parts['extension'];

            if ($file['inputFile']['size'] <= LIMIT_FILE_SIZE_FOR_JOBS) {
                if (in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {

                    $uploadfile = $nameFolder . $file['inputFile']['name'];

                    if (move_uploaded_file($file['inputFile']['tmp_name'], $uploadfile)) {
                        $uploadCV = true;
                    } else {
                        $uploadCV = false;
                        $errorUpload = "Can't upload CV!";
                        writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $email);
                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadCV = false;
                    $errorUpload = "File extension can not upload!";
                    writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $email);
                    $uploadError['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }
            } else {
                $uploadCV = false;
                $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $email);
                $uploadError['upload_error'] = true;
                $this->ocular->set_view_data('uploadError', $uploadError);
                $this->ocular->set_view_data('errorUpload', $errorUpload);
            }
        } else {
            $uploadCV = false;
            $errorUpload = "Directory upload can't exist . ";
            writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $email);
            $uploadError['upload_error'] = true;
            $this->ocular->set_view_data('uploadError', $uploadError);
            $this->ocular->set_view_data('errorUpload', $errorUpload);
        }

        if ($uploadCV) {

            $linkFile = FCPATH . "uploads/" . $emailUser . "/" . $file['inputFile']['name'];
        }
        return $linkFile;
    }

    /**
     * Description  Call API apply job
     * API:  /jobs/applyAttach
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    protected function applyJob($data) {
        $url = API_APPLY_ANOMYMOUS_ATTACH;
        $apiKey = '8982065e30ea02cf02e93a83824cf65b7de1e69545ce8bed4f2bb3c98a862b70';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'CONTENT-MD5: ' . $apiKey,
            'Content-Type: multipart/form-data'
        ));
        $result = curl_exec($ch);
        $results = json_decode($result);
        $info = curl_getinfo($ch);

        curl_close($ch);
        return $results;
    }

    /**
     * Description  Call API check email exist
     * API:  /users/account-status/email/....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    public function checkEmailExist() {
        $email = $this->input->post('email');
        $url = API_ACCOUNT_STATUS . '/' . urlencode($email);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);

        $ret = '';
        if (isset($results->data)) {
            $ret = $results->data->accountStatus;
        }

        $ret = json_encode($ret);
        echo $ret;
    }

    /**
     * Description  Call API send email if forgot password
     * API:  '/users/request_password/user_email/....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    public function resendPassword() {
        $email = $this->input->post('email');
        $url = API_REQUEST_PASSWORD . '/' . $email;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds
        $results = curl_exec($ch);
        $results = json_decode($results);
        if ($results->meta->code == 200 && $results->meta->message == 'OK') {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    /**
     * Description  Call API check correct email and password by login
     * API:  '/users/request_password/user_email/....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    public function checkLogin() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // call login api

        $criteria = array('user_email' => $email, 'user_password' => $password);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_LOGIN);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($criteria));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(API_HEADER_CONTENT, API_HEADER_TYPE, API_HEADER_ACCEPT));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);

        if ($results->meta->code == 200 && $results->meta->message == 'OK') {
            echo 'true';
        } else {
// print to screen: login faile
            echo 'false';
        }
    }

    function _do_upload($file) {
        $file_name = $_FILES['inputFile']['name'];
        $path_parts = pathinfo($file_name);
        $extension = @$path_parts['extension'];
        if ($_FILES['inputFile'] ['size'] == 0) {
            $errorValidate = "Please attach your resume.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        }
        if ($_FILES['inputFile'] ['size'] >= LIMIT_FILE_SIZE_FOR_JOBS) {
            $errorValidate = "The file selected exceed size limit. Please choose another file.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);

            return FALSE;
        }
        if (!in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {
            $errorValidate = "File extension can not upload!";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);

            return FALSE;
        } else {//check file type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            // $mime = finfo_file($finfo, $_FILES['inputFile']['tmp_name']);
            $mime = mime_content_type($_FILES['inputFile']['tmp_name']);
            finfo_close($finfo);
            if (!in_array($mime, unserialize(FILE_CHECK_TYPE_EXTENSIONS))) {
                $errorValidate = "File extension is not true.";
                writelog(date("Y-m-d H:i:s") . " " . $errorValidate . ":(" . $mime . ")" . "_validate");
                $this->form_validation->set_message('_do_upload', $errorValidate);

                return FALSE;
            }
        }
        return

                TRUE;
    }

    function valid_for_email($str) {

        if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) {
            $this->form_validation->set_message('valid_for_email', 'Please enter your email.');

            return FALSE;
        } else {

            return TRUE;
        }

// return (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) ? FALSE : TRUE;
    }

    function valid_for_phone($str) {

        if (!preg_match("/^[0-9().-]+$/", $str)) {
            $this->form_validation->set_message('valid_for_phone', 'Please enter your phone number');

            return FALSE;
        } else {
            return TRUE;
        }

// return (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) ? FALSE : TRUE;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return

                $randomString;
    }

    public function thanks() {


        $search = new MySearch();
        //  link goback;
        if (($this->session->userdata("VNW_SEARCH_DETAIL"))) {
            $arraySearch = $this->session->userdata("VNW_SEARCH_DETAIL");

            $search->job_title .= ' ' . $arraySearch->job_title;
            $search->job_category = $arraySearch->job_category;
            $search->job_location = $arraySearch->job_location;
            $search->job_level = $arraySearch->job_level;
            $search->page_number = $arraySearch->page_number;

            $linkSearch = base_url() . $this->getSearchUrl($search);
        } else
            $linkSearch = base_url() . '/kw/all';

        //get link similar
        $jobCate = $this->uri->segment(3);
        $jobLocation = $this->uri->segment(4);
        $linkSimilar = new MySearch();

        $linkSimilar->job_title .= ' ';
        $linkSimilar->job_category = explode(",", $jobCate);
        $linkSimilar->job_location = explode(",", $jobLocation);
        $linkSimilar->job_level = 0;
        $linkSimilar->page_number = 1;
        $link = $this->getSearchUrl(($linkSimilar));

        //get similar job
        $criteria = array(
            "job_title" => KEYWORD_DEDAULT,
            "job_category" => $jobCate,
            "job_location" => $jobLocation,
            "job_level" => 0,
            "page_number" => 1
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_SEARCH);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($criteria));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            API_HEADER_CONTENT, API_HEADER_TYPE, 'Accept: application/JSON'));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 36000); //timeout in seconds
        $results = curl_exec($ch);
        $results = json_decode($results);

        $data = $results->data;
        $this->ocular->set_view_data("link", $link);
        $this->ocular->set_view_data("linkSearch", $linkSearch);
        $this->ocular->set_view_data("data", $data);
        $this->ocular->render('emptyLayoutForJob');
    }

    public function error() {
        $this->lang->load('message', $this->_lang);
        $titleJob = 'Company';
        $this->_contentTitle = $this->lang->line("apply_job_title");

        $search = new MySearch();
        $link = array();

        if (($this->session->userdata("VNW_SEARCH_DETAIL"))) {
            $arraySearch = $this->session->userdata("VNW_SEARCH_DETAIL");
            $search->job_title .= ' ' . $arraySearch->job_title;
            $search->job_category = $arraySearch->job_category;
            $search->job_location = $arraySearch->job_location;
            $search->job_level = $arraySearch->job_level;
            $search->page_number = $arraySearch->page_number;

            $link['url'] = $this->getSearchUrl($search);
            $link['active'] = 1;
        } else {
            $link['url'] = base_url();
            $link['active'] = 0;
        }
        $this->ocular->set_view_data("titleJob", $titleJob);
        $this->ocular->set_view_data("link", $link);

        $this->ocular->render('emptyLayout');
    }

}
