<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends MY_Controller {

    var $_myData;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('articles_model');
        $this->lang->load('message', $this->_lang);
        $this->load->helper('url');
    }

    public function insert() {
        if ($this->input->post('isSent') == 'OK') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('inputTitle', 'please enter your title.', 'trim|required');
            $this->form_validation->set_rules('inputDescription', 'please enter description.', 'trim|required');
            $this->form_validation->set_rules('inputTextVN', 'please input text VN.', 'trim|required');
            $this->form_validation->set_rules('inputTextJP', 'please input text JP.', 'trim|required');
            $this->form_validation->set_rules('inputDate', 'please enter date.', 'trim|required');
            if ($this->form_validation->run() == FALSE) {

            } else {
                $title = $this->input->post('inputTitle');
                $des = $this->input->post('inputDescription');
                $textVN = $this->input->post('inputTextVN');
                $textJP = $this->input->post('inputTextJP');
                $dateSort = $this->input->post('inputDate');
                //upload file
                $nameFolder = UPLOAD_IMAGE_DIR;
                $config['upload_path'] = $nameFolder;
                if (!file_exists($nameFolder)) {
                    mkdir($nameFolder, 0777);
                }
                if (file_exists($nameFolder)) {
                    $file_name = $_FILES['inputFile']['name'];
                    $path_parts = pathinfo($file_name);
                    $extension = @$path_parts['extension'];
                    $fileNameToSave = randomPassword() . $_FILES['inputFile']['name'];
                    if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE) {
                        if (in_array($extension, unserialize(FILE_UPLOAD_IMAGE_EXTENSIONS))) {

                            $uploadfile = $nameFolder . $fileNameToSave;

                            if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                                $uploadImage = true;
                            } else {
                                $uploadImage = false;
                                $errorUpload = "Can't upload IMAGE!";

                                $uploadError['upload_error'] = true;
                                $this->ocular->set_view_data('uploadError', $uploadError);
                                $this->ocular->set_view_data('errorUpload', $errorUpload);
                            }
                        } else {
                            $uploadImage = false;
                            $errorUpload = "File extension can not upload!";

                            $uploadError['upload_error'] = true;
                            $this->ocular->set_view_data('uploadError', $uploadError);
                            $this->ocular->set_view_data('errorUpload', $errorUpload);
                        }
                    } else {
                        $uploadImage = false;
                        $errorUpload = "The file selected exceed size limit. Please choose another file. ";

                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadImage = false;
                    $errorUpload = "Directory upload IMAGE can't exist . ";
                    $uploadError['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }

                if ($uploadImage) {

                    $linkFile = $fileNameToSave;
                }

                $dataArtitle = array(
                    'title' => $title,
                    'textJP' => $textJP,
                    'textVN' => $textVN,
                    'description' => $des,
                    'date' => $dateSort,
                    "image" => $linkFile,
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );

                $insertArtitcle = $this->articles_model->registerNewArticle($dataArtitle);
                if ($insertArtitcle) {
                    redirect(site_url('manager/thanks'));
                }
            }
        }


        $this->ocular->render('emptyLayout');
    }

    function thanks() {
        $this->ocular->render('emptyLayout');
    }

}
