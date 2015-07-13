<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->lang->load('message', $this->_lang);
        $this->load->model('resumes_model');
    }

    function index() {

        $this->lang->load('message', $this->_lang);

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');


        // if logon
        if (isset($this->_userInfo->login_token)) {

        } else {
            redirect(site_url('login'));
        }


        if (($this->uri->segment(3)) == "1") {
            $active = true;
            $this->ocular->set_view_data('active', $active);
        }
        $dataCV = array();
        if ($this->input->post('isSent') == 'OK') {
            $this->form_validation->set_rules('inputFile', 'Please select .', 'trim|callback__do_upload');
            $linkFile = '';
            if ($this->form_validation->run() == TRUE) {
                //upload file to server
                $emailUser = str_replace(array("@", "."), "", $this->_userInfo->email);
                $nameFolder = UPLOAD_DIR . $emailUser . "/";
                $config['upload_path'] = $nameFolder;

                if (!file_exists($nameFolder)) {
                    mkdir($nameFolder, 0777);
                }
                if (file_exists($nameFolder)) {
                    //writelog file when upload
                    writelog(date("Y-m-d H:i:s") . " File upload at CV:  " . json_encode($_FILES) . "_" . $this->_userInfo->email);
                    //chmod for folder
                    chmod($nameFolder, 0777);

                    $file_name = $_FILES['inputFile']['name'];
                    $path_parts = pathinfo($file_name);
                    $extension = @$path_parts['extension'];

                    if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE_FOR_JOBS) {
                        if (in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {

                            $uploadfile = $nameFolder . $_FILES['inputFile']['name'];

                            if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                                $uploadCV = true;
                            } else {
                                $uploadCV = false;
                                $errorUpload = "Can't upload CV!";
                                writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorUpload . "_" . $this->_userInfo->email);
                                $uploadError['upload_error'] = true;
                                $this->ocular->set_view_data('uploadError', $uploadError);
                                $this->ocular->set_view_data('errorUpload', $errorUpload);
                            }
                        } else {
                            $uploadCV = false;
                            $errorUpload = "File extension can not upload!";
                            writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorUpload . "_" . $this->_userInfo->email);
                            $uploadError['upload_error'] = true;
                            $this->ocular->set_view_data('uploadError', $uploadError);
                            $this->ocular->set_view_data('errorUpload', $errorUpload);
                        }
                    } else {
                        $uploadCV = false;
                        $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                        writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorUpload . "_" . $this->_userInfo->email);
                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadCV = false;
                    $errorUpload = "Directory upload can't exist . ";
                    writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorUpload . "_" . $this->_userInfo->email);
                    $uploadError['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }

                if ($uploadCV) {

                    $linkFile = FCPATH . "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'];
                    $dataToStore = array(
                        'email' => $this->_userInfo->email,
                        "firstname" => $this->_userInfo->first_name,
                        "lastname" => $this->_userInfo->last_name,
                        "nameresume" => $_FILES['inputFile']['name'],
                        'linkresume' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                        'actflg' => 1,
                        "createdate" => date("Y-m-d H:i:s"),
                        "updatedate" => date("Y-m-d H:i:s")
                    );



                    $checkId = $this->resumes_model->getInformationOfUser($this->_userInfo->email);

                    if (isset($checkId['id'])) {

                        $dataUpdate = array(
                            "nameresume" => $_FILES['inputFile']['name'],
                            'linkresume' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                            "updatedate" => date("Y-m-d H:i:s")
                        );
                        $this->resumes_model->updateInformationCV($checkId['id'], $dataUpdate);
                    } else {

                        $this->resumes_model->insertInformationCV($dataToStore);
                    }
                    redirect(site_url('account/index/1'));
                }
                //----end upload file to server-------------------------------
            }
        }

        $dataCV = $this->resumes_model->getInformationOfUser($this->_userInfo->email);



        $this->ocular->set_view_data('dataCV', $dataCV);

        $this->ocular->render('emptyLayout');
    }

    function _do_upload($file) {
        $file_name = $_FILES['inputFile']['name'];
        $path_parts = pathinfo($file_name);
        $extension = @$path_parts['extension'];
        if ($_FILES['inputFile'] ['size'] == 0) {
            $errorValidate = "Please attach your resume.";
            writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);
            return FALSE;
        }
        if ($_FILES['inputFile'] ['size'] >= LIMIT_FILE_SIZE_FOR_JOBS) {
            $errorValidate = "The file selected exceed size limit. Please choose another file.";
            writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);

            return FALSE;
        }
        if (!in_array($extension, unserialize(FILE_UPLOAD_EXTENSIONS))) {
            $errorValidate = "File extension can not upload!";
            writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorValidate . "_validate");
            $this->form_validation->set_message('_do_upload', $errorValidate);

            return FALSE;
        } else {//check file type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            // $mime = finfo_file($finfo, $_FILES['inputFile']['tmp_name']);
            $mime = mime_content_type($_FILES['inputFile']['tmp_name']);
            finfo_close($finfo);
            if (!in_array($mime, unserialize(FILE_CHECK_TYPE_EXTENSIONS))) {
                $errorValidate = "File extension is not true.";
                writelog(date("Y-m-d H:i:s") . " CareerCenter - " . $errorValidate . ":(" . $mime . ")" . "_validate");
                $this->form_validation->set_message('_do_upload', $errorValidate);

                return FALSE;
            }
        }
        return TRUE;
    }

    function download() {
        if (isset($this->_userInfo->login_token)) {
            $this->load->helper('download');

            $emailUser = str_replace(array("@", "."), "", $this->_userInfo->email);
            $linkresume = "uploads/" . $emailUser . "/" . $_GET['file'];
            $data = file_get_contents($linkresume); // Read the file's contents
            $name = $_GET['file'];
            force_download($name, $data);
        } else {
            redirect(site_url('login'));
        }
    }

    function downloadSample() {
        if (isset($this->_userInfo->login_token)) {
            $this->load->helper('download');

            $linkresume = "docx/sample/sampleResume.pdf";
            $data = file_get_contents($linkresume); // Read the file's contents
            $name = "sampleResume.pdf";
            force_download($name, $data);
        } else {
            redirect(site_url('login'));
        }
    }

    function delete() {
        if (isset($this->_userInfo->login_token)) {
            $allCv = $this->resumes_model->getAllResumeUser($this->_userInfo->email);
            if ($allCv) {
                foreach ($allCv as $Cv) {
                    if (file_exists($Cv['linkresume'])) {
                        unlink($Cv['linkresume']);
                    }
                }
            }

            $dataUpdate = array(
                "nameresume" => NULL,
                'linkresume' => NULL,
                "updatedate" => date("Y-m-d H:i:s")
            );
            $del = $this->resumes_model->deleteResumeNew($this->_userInfo->email, $dataUpdate);

            // $del = $this->resumes_model->deleteAllResumeUser($this->_userInfo->email);
            if ($del) {
                redirect(site_url('account/index/1'));
            }
        } else {
            redirect(site_url('login'));
        }
    }

    function deleteresume() {
        if (isset($this->_userInfo->login_token)) {
            $allCv = $this->resumes_model->getAllResumeUser($this->_userInfo->email);
            if ($allCv) {
                foreach ($allCv as $Cv) {
                    if (file_exists($Cv['linkresumeonline'])) {
                        unlink($Cv['linkresumeonline']);
                    }
                }
            }

            $dataUpdate = array(
                "nameresumeonline" => NULL,
                'linkresumeonline' => NULL,
                "updatedate" => date("Y-m-d H:i:s")
            );
            $del = $this->resumes_model->deleteResumeNew($this->_userInfo->email, $dataUpdate);

            // $del = $this->resumes_model->deleteAllResumeUser($this->_userInfo->email);
            if ($del) {
                redirect(site_url('account/index'));
            }
        } else {
            redirect(site_url('login'));
        }
    }

}
