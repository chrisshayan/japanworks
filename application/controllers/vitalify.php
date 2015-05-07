<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vitalify extends MY_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $this->load->library('form_validation');
        $this->load->model('users_jobs_model');
        $this->load->model('prf_skills_model');
        $this->load->helper(array('form', 'url'));

        if ($this->input->post()) {
            //validate form


            $this->form_validation->set_rules('inputFName', 'Vui lòng nhập Họ.', 'trim|required');
            $this->form_validation->set_rules('inputLName', 'Vui lòng nhập Tên.', 'trim|required');
            $this->form_validation->set_rules('inputPhone', 'Vui lòng nhập số điện thoại.', 'trim|required|callback_valid_for_phone');
            $this->form_validation->set_rules('inputEmail', 'Vui lòng nhập email.', 'trim|required|callback_valid_for_email');
            if ($this->input->post('hasCV')) {
                $this->form_validation->set_rules('inputFile', 'Vui lòng đính kèm hồ sơ.', 'trim|callback__do_upload');
            } else {
                $this->form_validation->set_rules('inputGender', 'Vui lòng chọn giới tính.', 'required');
                $this->form_validation->set_rules('skills[0][experienced]', 'Vui lòng chọn kinh nghiệm IT.', 'required');
                $this->form_validation->set_rules('skills[1][experienced]', 'Vui lòng nhập kinh nghiệm Lamp.', 'required');
                $this->form_validation->set_rules('skills[2][experienced]', 'Vui lòng nhập ngôn ngữ lập trình.', 'required');
                $this->form_validation->set_rules('skills[3][experienced]', 'Vui lòng nhập kinh nghiệm Database.', 'required');
                $this->form_validation->set_rules('skills[4][experienced]', 'Vui lòng nhập ngôn kinh nghiệm iOS/ Android.', 'required');
                $this->form_validation->set_rules('skills[5][experienced]', 'Vui lòng chọn trình độ tiếng Anh của bạn.', 'required');
                $this->form_validation->set_rules('skills[6][experienced]', 'Vui lòng chọn trình độ tiếng Nhật của bạn.', 'required');
            }

            if ($this->form_validation->run()) {

                $jobInfo = $this->users_jobs_model->getInforSpecialJobEmployer($this->input->post('checkJob'));
                $emailData = $profile = array(
                    'jobid' => JOB_ID_VF,
                    'employerid' => isset($jobInfo["emplyerid"]) ? $jobInfo["emplyerid"] : "",
                    'email' => $this->input->post('inputEmail'),
                    'firstname' => $this->input->post('inputFName'),
                    'lastname' => $this->input->post('inputLName'),
                    'phonenumber' => $this->input->post('inputPhone'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );
                $emailData["jobInfo"] = $jobInfo;
                if ($this->input->post("hasCV")) {
                    $emailData["hasCV"] = "1";
                    $profile['resumefile'] = $_FILES['inputFile']['name'];
                    $emailUser = str_replace(array("@", "."), "", $this->input->post('inputEmail'));
                    //upload file
                    $nameFolder = UPLOAD_DIR . $emailUser . "/";
                    $linkFile = $nameFolder . $_FILES['inputFile']['name'];
                    $emailData["resume"] = $linkFile;
                    if (!file_exists($nameFolder)) {
                        mkdir($nameFolder, 0777);
                    }
                    writelog(date("Y-m-d H:i:s") . " File upload:  " . json_encode($_FILES) . "_" . $this->input->post('inputEmail'));
                    if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $linkFile)) {
                        $profileId = $this->users_jobs_model->applyJobsFromData($profile);
                        if ($profileId) {

                        }
                    }
                } else {
                    $emailData["hasCV"] = "0";
                    $emailData["gender"] = $profile["gender"] = $this->input->post('inputGender');
                    $profileId = $this->users_jobs_model->applyJobsFromData($profile);
                    if ($profileId) {
                        $emailData["skills"] = $skills = $this->input->post('skills');
                        foreach ($skills as $skill) {
                            $data = array(
                                "prf_id" => $profileId,
                                "skill" => $skill["name"],
                                "experienced" => $skill["experienced"]
                            );
                            $this->prf_skills_model->insertData($data);
                        }
                    }
                }

                //send email
                if ($this->sendEmail($emailData)) {
                    redirect('vitalify/thanks');
                } else {
                    //echo $this->email->print_debugger();
                    $messageEmail['email_error'] = true;
                    $errorSendmail = "Can't send mail";
                    writelog(date("Y-m-d H:i:s") . " " . $errorSendmail . "_" . $this->input->post('inputEmail'));
                    $this->ocular->set_view_data('messageEmail', $messageEmail);
                    $this->ocular->set_view_data('errorSendmail', $errorSendmail);
                }
            }
        }

        $this->ocular->render('blank');
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
     * Description  Register account to VNW
     * API:  /users/register....
     * Author       Cuong.Chung
     * Date         17/12/2014
     */
    public function registerAccountVNW() {

        // call login api
        if ($this->input->post('genderid') == 0) {
            $gender = 1;
        } else {
            $gender = 2;
        }

        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'genderid' => $gender, // Male
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_REGISTER);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(API_HEADER_CONTENT, API_HEADER_TYPE, API_HEADER_ACCEPT));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT); //timeout in seconds

        $results = curl_exec($ch);
        $results = json_decode($results);
        if ($results->meta->code == 200 && $results->meta->message == 'Success') {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    protected function sendEmail($data) {
        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'mailtype' => 'html',
            'charset' => MAIL_CHARSET,
            'smtp_timeout' => SMTP_TIMEOUT,
            'wordwrap' => TRUE,
        );

        $this->load->library('email', $config);
        $this->email->from(EMAIL_SENDER, NAME_SENDER); // change it to yours
        $this->email->reply_to();
        $listMailTo = unserialize(LIST_MAIL_TO_VF);
        $this->email->to($listMailTo);
        //check have attach file

        if (isset($data['resume']) && $data['resume'] != '')
            $this->email->attach($data['resume']);
        // $this->email->to('info@rakus.com.vn');
        $listBBC = (unserialize(LIST_MAIL_BBC_VF));
        $this->email->bcc($listBBC);
        $this->email->subject("【応募】Go to Japan（ Vitalify様特別求人ページ )");
        $this->email->message($this->load->view('vitalify/vitalify_company_template', array("data" => $data), true));
        $results_after = $this->email->send();
        return $results_after;
    }

    public function thanks() {
        $this->ocular->render('blank');
    }

    function valid_for_email($str) {
        if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $str)) {
            $this->form_validation->set_message('valid_for_email', 'Địa chỉ email không hợp lệ.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function valid_for_phone($str) {
        if (!preg_match("/^[0-9().-]+$/", $str)) {
            $this->form_validation->set_message('valid_for_phone', 'Số điện thoại không hợp lệ.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _do_upload($file) {
        $file_name = $_FILES['inputFile']['name'];
        $path_parts = pathinfo($file_name);
        $extension = @$path_parts['extension'];
        if ($_FILES['inputFile']['size'] == 0) {
            $errorValidate = "Vui lòng đính kèm hồ sơ.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        }
        if ($_FILES['inputFile']['size'] >= LIMIT_FILE_SIZE) {
            $errorValidate = "Dung lượng tập tin không phù hợp, Vui lòng chọn tập tin khác.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        }
        if (!in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {
            $errorValidate = "Định dạng file không thể upload.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        } else {//check file type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            // $mime = finfo_file($finfo, $_FILES['inputFile']['tmp_name']);
            $mime = mime_content_type($_FILES['inputFile']['tmp_name']);
            if (!in_array($mime, unserialize(FILE_CHECK_TYPE_EXTENSIONS))) {
                $errorValidate = "Định dạng file không thể upload .";
                writelog(date("Y-m-d H:i:s") . " " . $errorValidate . ":(" . $mime . ")" . "_validate");
                $this->form_validation->set_message('_do_upload', $errorValidate);
                return FALSE;
            }
        }
        return TRUE;
    }

}
