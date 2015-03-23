<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eva extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    protected function sendEmail($data) {

        /*   $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => MAILER_EMAIL, // change it to yours
          'smtp_pass' => MAILER_PASSWORD, // change it to yours
          'mailtype' => 'html',
          'charset' => 'UTF-8',
          'smtp_timeout' => 5,
          'wordwrap' => TRUE,
          );
         */
        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'mailtype' => 'html',
            'charset' => MAIL_CHARSET,
            'smtp_timeout' => SMTP_TIMEOUT,
            'wordwrap' => TRUE,
        );
        $linkImg = "http://japan.vietnamworks.com/static/img/logo.png";
        $this->load->library('email', $config);

        //send mail to user
        $this->email->set_newline("\r\n");
        $this->email->from(EMAIL_SENDER, NAME_SENDER);
        $this->email->reply_to();
        $this->email->to($data['email']); // change it to
        // $this->email->to("vfa.hienhq@gmail.com"); // change it to yours
        $this->email->subject(SUBJECT_FOR_EVA_USER . $data['firstname']);
        $this->email->message($this->load->view('eva/eva_end_user_template', $data, true));
        $results = $this->email->send();

        if ($results) { //send mail to company
            $this->email->clear();
            $this->email->from(EMAIL_SENDER, NAME_SENDER); // change it to yours
            $this->email->reply_to();
            //list mail to
            $listTo = (unserialize(LIST_MAIL_TO_EVA)); //$this->email->to($data['mailto']);
            $this->email->to($listTo);
            if ($data['attachfile'] != '')
            // $this->email->attach($data['attachfile']);
                $this->email->attach($data['attachfile'], 'attachment', $data['attachfilename']);
            // $this->email->to('info@mmj.com.vn');
            $listBBC = (unserialize(LIST_MAIL_BBC_EVA));
            $this->email->bcc($listBBC);
            $this->email->subject(sprintf(SUBJECT_FOR_EVA_COMPANY, $data['projecttitle']));
            $this->email->message($this->load->view('eva/eva_company_template', array("data" => $data), true));



            $results_after = $this->email->send();
            return $results_after;
        } else {
            return $results;
        }
    }

    public function thanks() {
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");
        $this->ocular->render('emptyLayoutApply');
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

    function _do_upload($file) {
        $file_name = $_FILES['inputFile']['name'];
        $path_parts = pathinfo($file_name);
        $extension = @$path_parts['extension'];
        if ($_FILES['inputFile']['size'] == 0) {
            $errorValidate = "Please attach your resume.";
            writelog(date("Y-m-d H:i:s") . " " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        }
        if ($_FILES['inputFile']['size'] >= LIMIT_FILE_SIZE) {
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
        return TRUE;
    }

    public function index() {

        $this->load->library('form_validation');
        $this->load->model('users_jobs_model');
        $this->load->helper(array('form', 'url'));
        //$jobId = getIdAlias($params["job"]);
        //test

        $jobId = JOB_ID_EVA;
        // set canonical link
        # $this->_canonicalLink = site_url('register');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");

        if ($this->input->post('isSent') == 'OK') {
            //Get information mt_special_jobs_employer

            $employer = $this->users_jobs_model->getInforSpecialJobEmployer($jobId);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('inputFirstName', 'please enter your first name.', 'trim|required');
            $this->form_validation->set_rules('inputLastName', 'please enter your last name.', 'trim|required');
            $this->form_validation->set_rules('inputPhone', 'please enter your phone number.', 'trim|required|callback_valid_for_phone');
            $this->form_validation->set_rules('inputEmail', 'please enter your email.', 'trim|required|callback_valid_for_email');
            $this->form_validation->set_rules('inputFile', 'Please select .', 'trim|callback__do_upload');
            $linkFile = '';
            if ($this->form_validation->run() == FALSE) {
                $this->ocular->set_view_data('checkOption', $this->input->post('checkOption'));
            } else {
                //chose option attach file
                $dataToStore = array(
                    'employerid' => $employer['emplyerid'],
                    'email' => $this->input->post('inputEmail'),
                    'firstname' => $this->input->post('inputFirstName'),
                    'lastname' => $this->input->post('inputLastName'),
                    'phonenumber' => $this->input->post('inputPhone'),
                    'resumefile' => $_FILES['inputFile']['name'],
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );
                //upload file$
                $emailUser = str_replace(array("@", "."), "", $this->input->post('inputEmail'));
                //upload file
                $nameFolder = UPLOAD_DIR . $emailUser . "/";
                $config['upload_path'] = $nameFolder;
                if (!file_exists($nameFolder)) {
                    mkdir($nameFolder, 0777);
                }
                if (file_exists($nameFolder)) {
                    //writelog file when upload
                    writelog(date("Y-m-d H:i:s") . " File upload:  " . json_encode($_FILES) . "_" . $this->input->post('inputEmail'));
                    //chmod for folder
                    chmod($nameFolder, 0777);

                    $file_name = $_FILES['inputFile']['name'];
                    $path_parts = pathinfo($file_name);
                    $extension = @$path_parts['extension'];

                    if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE) {
                        if (in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {

                            $uploadfile = $nameFolder . $_FILES['inputFile']['name'];

                            if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                                $uploadCV = true;
                            } else {
                                $uploadCV = false;
                                $errorUpload = "Can't upload CV!";
                                writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                                $uploadError['upload_error'] = true;
                                $this->ocular->set_view_data('uploadError', $uploadError);
                                $this->ocular->set_view_data('errorUpload', $errorUpload);
                            }
                        } else {
                            $uploadCV = false;
                            $errorUpload = "File extension can not upload!";
                            writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                            $uploadError['upload_error'] = true;
                            $this->ocular->set_view_data('uploadError', $uploadError);
                            $this->ocular->set_view_data('errorUpload', $errorUpload);
                        }
                    } else {
                        $uploadCV = false;
                        $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                        writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadCV = false;
                    $errorUpload = "Directory upload can't exist . ";
                    writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                    $uploadError['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }

                if ($uploadCV) {

                    $linkFile = FCPATH . "./uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'];
                }

                if (isset($uploadCV)) {
                    $checkInsert = $this->users_jobs_model->applyJobsFromData($dataToStore);
                    //if the insert has returned true then we send mail
                    if ($checkInsert == TRUE) { //end inster db to db
                        //
                //send mail
                        $data = Array(
                            'mailto' => $employer['employeremail'],
                            'email' => $this->input->post('inputEmail'),
                            'firstname' => $this->input->post('inputFirstName'),
                            'lastname' => $this->input->post('inputLastName'),
                            'attachfile' => $linkFile,
                            'inforstore' => $dataToStore,
                            'projecttitle' => $employer['jobtitle'],
                            'url' => base_url()
                        );

                        $sendMail = $this->sendEmail($data);
                        //after send mail
                        if ($sendMail) {
                            redirect('eva/thanks');
                        } else {
                            echo $this->email->print_debugger();
                            $messageEmail['email_error'] = true;
                            $errorSendmail = "Can't send mail";
                            writelog(date("Y-m-d H:i:s") . " " . $errorSendmail . "_" . $this->input->post('inputEmail'));
                            $this->ocular->set_view_data('messageEmail', $messageEmail);
                            $this->ocular->set_view_data('errorSendmail', $errorSendmail);
                        }
                    } else { //else insert
                        redirect('error/error404');
                    } //end insert db
                }//end check for insert db and send mail
            }//end check valid
        }//end check submit button
        $this->ocular->render('blank');
    }

    public function bse() {

        $this->load->library('form_validation');
        $this->load->model('users_jobs_model');
        $this->load->model('prf_skills_model');
        $this->load->helper(array('form', 'url'));
        // set canonical link
        # $this->_canonicalLink = site_url('register');
        // load message from lang file
        $this->lang->load('message', $this->_lang);
        $this->_contentTitle = $this->lang->line("apply_job_title");


        if ($this->input->post('isSent') == 'OK') {
            //Get information mt_special_jobs_employer

            $employer = $this->users_jobs_model->getInforSpecialJobEmployer($this->input->post('checkJob'));


            $this->load->library('form_validation');
            $this->form_validation->set_rules('inputFirstName', 'please enter your first name.', 'trim|required');
            $this->form_validation->set_rules('inputLastName', 'please enter your last name.', 'trim|required');
            $this->form_validation->set_rules('inputEmail', 'please enter your email.', 'trim|required|callback_valid_for_email');
            $this->form_validation->set_rules('inputPhone', 'please enter your phone number.', 'trim|required|callback_valid_for_phone');
            if ($this->input->post('checkOption') === 'true') {
                $this->form_validation->set_rules('itExp', 'Please select it experience.', 'required');
                $this->form_validation->set_rules('managerExp', 'Please select managerent.', 'required');
                $this->form_validation->set_rules('jpLevel', 'Please select your Japan level.', 'required');
            } else {
                $this->form_validation->set_rules('inputFile', 'Please selest file.', 'trim|callback__do_upload');
            }
            if ($this->form_validation->run() == FALSE) {
                $this->ocular->set_view_data('checkOption', $this->input->post('checkOption'));
            } else {

                $linkFile = '';

                //check option when insert db

                if ($this->input->post('checkOption') === 'true') { //chose option 2
                    $dataToStore = array(
                        'jobid' => $this->input->post('checkJob'),
                        'employerid' => $employer['emplyerid'],
                        'email' => $this->input->post('inputEmail'),
                        'firstname' => $this->input->post('inputFirstName'),
                        'lastname' => $this->input->post('inputLastName'),
                        'phonenumber' => $this->input->post('inputPhone'),
                        'actflg' => 1,
                        "createdate" => date("Y-m-d H:i:s"),
                        "updatedate" => date("Y-m-d H:i:s")
                    );
                    //check option gender, jplevel, enlevel value null

                    if (isset($_POST['jpLevel'])) {
                        $dataToStore['jplevel'] = $this->input->post('jpLevel');
                    }
                } else { //chose option attach file
                    $dataToStore = array(
                        'jobid' => $this->input->post('checkJob'),
                        'employerid' => $employer['emplyerid'],
                        'email' => $this->input->post('inputEmail'),
                        'firstname' => $this->input->post('inputFirstName'),
                        'lastname' => $this->input->post('inputLastName'),
                        'phonenumber' => $this->input->post('inputPhone'),
                        'resumefile' => $_FILES['inputFile']['name'],
                        'actflg' => 1,
                        "createdate" => date("Y-m-d H:i:s"),
                        "updatedate" => date("Y-m-d H:i:s")
                    );

                    $emailUser = str_replace(array("@", "."), "", $this->input->post('inputEmail'));
                    //upload file
                    $nameFolder = UPLOAD_DIR . $emailUser . "/";
                    $config['upload_path'] = $nameFolder;
                    if (!file_exists($nameFolder)) {
                        mkdir($nameFolder, 0777);
                    }
                    if (file_exists($nameFolder)) {
                        //writelog file when upload
                        writelog(date("Y-m-d H:i:s") . " File upload:  " . json_encode($_FILES) . "_" . $this->input->post('inputEmail'));
                        //chmod for folder
                        chmod($nameFolder, 0777);

                        $file_name = $_FILES['inputFile']['name'];
                        $path_parts = pathinfo($file_name);
                        $extension = @$path_parts['extension'];

                        if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE) {
                            if (in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {

                                $uploadfile = $nameFolder . $_FILES['inputFile']['name'];

                                if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                                    $uploadCV = true;
                                } else {
                                    $uploadCV = false;
                                    $errorUpload = "Can't upload CV!";
                                    writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                                    $uploadError['upload_error'] = true;
                                    $this->ocular->set_view_data('uploadError', $uploadError);
                                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                                }
                            } else {
                                $uploadCV = false;
                                $errorUpload = "File extension can not upload!";
                                writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                                $uploadError['upload_error'] = true;
                                $this->ocular->set_view_data('uploadError', $uploadError);
                                $this->ocular->set_view_data('errorUpload', $errorUpload);
                            }
                        } else {
                            $uploadCV = false;
                            $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                            writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                            $uploadError['upload_error'] = true;
                            $this->ocular->set_view_data('uploadError', $uploadError);
                            $this->ocular->set_view_data('errorUpload', $errorUpload);
                        }
                    } else {
                        $uploadCV = false;
                        $errorUpload = "Directory upload can't exist . ";
                        writelog(date("Y-m-d H:i:s") . " " . $errorUpload . "_" . $this->input->post('inputEmail'));
                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                    //get linkFile
                    if ($uploadCV) {
                        $linkFile = FCPATH . "./uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'];
                    }
                }//end chose option
                if (($this->input->post('checkOption') == "true") || (($this->input->post('checkOption') == "false") && isset($uploadCV))) {
                    $profileId = $this->users_jobs_model->applyJobsFromData($dataToStore);
                    //if the insert has returned true then we send mail
                    if ($profileId == TRUE) { //end inster db to db
                        //send mail
                        $data = Array(
                            'mailto' => $employer['employeremail'],
                            'email' => $this->input->post('inputEmail'),
                            'firstname' => $this->input->post('inputFirstName'),
                            'lastname' => $this->input->post('inputLastName'),
                            'attachfile' => $linkFile,
                            'attachfilename' => $_FILES['inputFile']['name'],
                            'inforstore' => $dataToStore,
                            'checkoption' => $this->input->post('checkOption'),
                            'projecttitle' => $employer['jobtitle'],
                            'url' => base_url()
                        );

                        //insert to prf skill
                        if (isset($_POST['itExp'])) {
                            $dataPrf = array(
                                "prf_id" => $profileId,
                                "skill" => 'IT experience',
                                "experienced" => $this->input->post('itExp')
                            );
                            $this->prf_skills_model->insertData($dataPrf);
                            $data['itexp'] = $this->input->post('itExp');
                        }

                        if (isset($_POST['managerExp'])) {
                            $dataPrf = array(
                                "prf_id" => $profileId,
                                "skill" => 'Management',
                                "experienced" => $this->input->post('managerExp')
                            );
                            $this->prf_skills_model->insertData($dataPrf);
                            $data['managerexp'] = $this->input->post('managerExp');
                        }
                        //send mail
                        $sendMail = $this->sendEmailVer2($data);
                        //after send mail
                        if ($sendMail) {
                            redirect('eva/thanks');
                        } else {
                            echo $this->email->print_debugger();
                            $messageEmail['email_error'] = true;
                            $errorSendmail = "Can't send mail";
                            writelog(date("Y-m-d H:i:s") . " " . $errorSendmail . "_" . $this->input->post('inputEmail'));
                            $this->ocular->set_view_data('messageEmail', $messageEmail);
                            $this->ocular->set_view_data('errorSendmail', $errorSendmail);
                        }
                    } else { //else insert
                        redirect('error/error404');
                    } //end insert db
                }//end check for insert db and send mail
            }//end check validate
        }//end check submit button
        $this->ocular->render('blank');
    }

    protected function sendEmailVer2($data) {

        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'mailtype' => 'html',
            'charset' => MAIL_CHARSET,
            'smtp_timeout' => SMTP_TIMEOUT,
            'wordwrap' => TRUE,
        );
        $linkImg = "http://japan.vietnamworks.com/static/img/logo.png";
        $this->load->library('email', $config);

        //send mail to user
        $this->email->set_newline("\r\n");
        $this->email->from(EMAIL_SENDER, NAME_SENDER);
        $this->email->reply_to();
        $this->email->to($data['email']); // change it to
        // $this->email->to("vfa.hienhq@gmail.com"); // change it to yours
        $this->email->subject(SUBJECT_FOR_EVA_VER2_USER . $data['firstname']);
        $this->email->message($this->load->view('eva/evav2_end_user_template', $data, true));
        $results = $this->email->send();

        if ($results) { //send mail to company
            $this->email->clear();
            $this->email->from(EMAIL_SENDER, NAME_SENDER); // change it to yours
            $this->email->reply_to();
            //list mail to
            $listTo = (unserialize(LIST_MAIL_TO_EVA_VER2)); //$this->email->to($data['mailto']);
            $this->email->to($listTo);
            //check have attach file
            if ($data['attachfile'] != '')
            // $this->email->attach($data['attachfile']);
                $this->email->attach($data['attachfile'], 'attachment', $data['attachfilename']);
            // $this->email->to('info@mmj.com.vn');
            $listBBC = (unserialize(LIST_MAIL_BBC_EVA_VER2));
            $this->email->bcc($listBBC);
            $this->email->subject(sprintf(SUBJECT_FOR_EVA_VER2_COMPANY, $data['projecttitle']));
            $this->email->message($this->load->view('eva/evav2_company_template', array("data" => $data), true));



            $results_after = $this->email->send();
            return $results_after;
        } else {
            return $results;
        }
    }

}
