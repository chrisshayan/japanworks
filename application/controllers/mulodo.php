<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mulodo extends MY_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index(){
        $this->load->library('form_validation');
        $this->load->model('users_jobs_model');
        $this->load->model('prf_skills_model');
        $this->load->helper(array('form', 'url'));

        if($this->input->post()){
            //validate form
            $this->form_validation->set_rules('inputFName', 'Vui lòng nhập Họ.', 'trim|required');
            $this->form_validation->set_rules('inputLName', 'Vui lòng nhập Tên.', 'trim|required');
            $this->form_validation->set_rules('inputPhone', 'Vui lòng nhập số điện thoại.', 'trim|required|callback_valid_for_phone');
            $this->form_validation->set_rules('inputEmail', 'Vui lòng nhập email.', 'trim|required|callback_valid_for_email');
            if ($this->input->post('hasCV')) {
                $this->form_validation->set_rules('inputResume', 'Vui lòng đính kèm hồ sơ.', 'trim|callback__do_upload');
            } else {
                $this->form_validation->set_rules('inputGender', 'Vui lòng chọn giới tính.', 'required');
                $this->form_validation->set_rules('skills[0][experienced]', 'Vui lòng chọn kinh nghiệm JAVA.', 'required');
                $this->form_validation->set_rules('skills[1][experienced]', 'Chọn JAVA framework mà bạn giỏi.', 'required');
                $this->form_validation->set_rules('skills[2][experienced]', 'Vui lòng nhập kinh nghiệm database.', 'required');
                $this->form_validation->set_rules('skills[3][experienced]', 'Vui lòng nhập kinh nghiệm về Server OS.', 'required');
                $this->form_validation->set_rules('skills[4][experienced]', 'Vui lòng chọn trình độ tiếng Anh của bạn.', 'required');
            }

            if ($this->form_validation->run()) {
                $jobInfo = $this->users_jobs_model->getInforSpecialJobEmployer(MULODO_JOB_ID);
                $emailData = $profile = array(
                    'jobid' => MULODO_JOB_ID,
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
                if($this->input->post("hasCV")){
                    $emailData["hasCV"] = "1";
                    $profile['resumefile'] = $_FILES['inputResume']['name'];
                    $emailUser = str_replace(array("@", "."), "", $this->input->post('inputEmail'));
                    //upload file
                    $nameFolder = UPLOAD_DIR . $emailUser . "/";
                    $linkFile = $nameFolder.$_FILES['inputResume']['name'];
                    $emailData["resume"] = $linkFile;
                    if (!file_exists($nameFolder)) {
                        mkdir($nameFolder, 0777);
                    }
                    writelog(date("Y-m-d H:i:s") . " File upload:  " . json_encode($_FILES) . "_" . $this->input->post('inputEmail'));
                    if(move_uploaded_file($_FILES['inputResume']['tmp_name'], $linkFile)){
                        $profileId = $this->users_jobs_model->applyJobsFromData($profile);
                        if($profileId){

                        }
                    }
                }else{
                    $emailData["hasCV"] = "0";
                    $emailData["gender"] = $profile["gender"] = $this->input->post('inputGender');
                    $profileId = $this->users_jobs_model->applyJobsFromData($profile);
                    if($profileId){
                        $emailData["skills"] = $skills = $this->input->post('skills');
                        foreach($skills as $skill){
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
                    redirect('mulodo/thanks');
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
        $listMailTo = unserialize(LIST_MAIL_MULODO_TO);
        $this->email->to($listMailTo);
        //check have attach file
        if (isset($data['resume']) && $data['resume'] != '')
            $this->email->attach($data['resume']);
        // $this->email->to('info@rakus.com.vn');
        $listBBC = (unserialize(LIST_MAIL_MULODO_BCC));
        $this->email->bcc($listBBC);
        $this->email->subject("【応募】Java Engineerへの応募がありました（ Mulodo様特別求人ページ )");
        $this->email->message($this->load->view('mulodo/mulodo_company_template', array("data" => $data), true));
        $results_after = $this->email->send();
        return $results_after;
    /*
        //send mail to user
        $this->email->set_newline("\r\n");
        $this->email->from(EMAIL_SENDER, NAME_SENDER);
        $this->email->to($data['email']); // change it to
        // $this->email->to("vfa.hienhq@gmail.com"); // change it to yours
        $this->email->subject("Bạn vừa ứng tuyển vào Mulolo Việt Nam");
        $this->email->message($this->load->view('mulodo/mulodo_end_user_template', $data, true));
        $results = $this->email->send();

        if ($results) { //send mail to company
            $this->email->clear();
            $this->email->from(EMAIL_SENDER, NAME_SENDER); // change it to yours
            $this->email->reply_to();
            $listMailTo = unserialize(LIST_MAIL_MULODO_TO);
            $this->email->to($listMailTo);
            //check have attach file
            if (isset($data['resume']) && $data['resume'] != '')
                $this->email->attach($data['resume']);
            // $this->email->to('info@rakus.com.vn');
            $listBBC = (unserialize(LIST_MAIL_MULODO_BCC));
            $this->email->bcc($listBBC);
            $this->email->subject("【応募】Java Engineerへの応募がありました（ Mulodo様特別求人ページ )");
            $this->email->message($this->load->view('mulodo/mulodo_company_template', array("data" => $data), true));
            $results_after = $this->email->send();
            return $results_after;
        } else {
            return $results;
        }
     *
     */
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
        $file_name = $_FILES['inputResume']['name'];
        $path_parts = pathinfo($file_name);
        $extension = @$path_parts['extension'];
        if ($_FILES['inputResume']['size'] == 0) {
            $errorValidate = "Vui lòng đính kèm hồ sơ.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        }
        if ($_FILES['inputResume']['size'] >= LIMIT_FILE_SIZE) {
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
            // $mime = finfo_file($finfo, $_FILES['inputResume']['tmp_name']);
            $mime = mime_content_type($_FILES['inputResume']['tmp_name']);
            finfo_close($finfo);
            if (!in_array($mime, unserialize(FILE_CHECK_TYPE_EXTENSIONS))) {
                $errorValidate = "Định dạng file không thể upload.";
                writelog(date("Y-m-d H:i:s") . " " . $errorValidate . ":(" . $mime . ")" . "_validate");
                $this->form_validation->set_message('_do_upload', $errorValidate);
                return FALSE;
            }
        }

        return TRUE;
    }
}
