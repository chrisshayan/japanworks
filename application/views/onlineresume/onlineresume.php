<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Onlineresume extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->lang->load('message', $this->_lang);
        $this->load->library('form_validation');
        $this->load->model('resumes_online_model');
    }

    public function index() {

        $this->load->library('PHPWord');
        $PHPWord = new PHPWord();


// if logon
        if (isset($this->_userInfo->login_token)) {

        } else {
            redirect(site_url('login'));
        }

        if ($this->input->post('isSent') == 'OK') {


            if ($this->input->post('ex-salary') != 1) {
                $salary = $this->input->post('salary');
            } else {
                $salary = "negotiable";
            }

            if (isset($this->input->post('neworexperience'))) {
                $new = 1;
            } else {
                $new = 0;
            }

            $linkFile = '';


//upload file to server
            $emailUser = str_replace(array("@", "."), "", $this->_userInfo->email);
            $nameFolder = UPLOAD_DIR . $emailUser . "/";
            $config['upload_path'] = $nameFolder;

            if (!file_exists($nameFolder)) {
                mkdir($nameFolder, 0777);
            }
            if (file_exists($nameFolder)) {
//writelog file when upload
                writelog(date("Y-m-d H:i:s") . " File upload at IMAGE:  " . json_encode($_FILES) . "_" . $this->_userInfo->email);
//chmod for folder
                chmod($nameFolder, 0777);

                $file_name = $_FILES['inputFile']['name'];
                $path_parts = pathinfo($file_name);
                $extension = @$path_parts['extension'];

                if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE_FOR_JOBS) {
                    if (in_array($extension, unserialize(FILE_UPLOAD_IMAGE_EXTENSIONS))) {

                        $uploadfile = $nameFolder . $_FILES['inputFile']['name'];

                        if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                            $uploadCV = true;
                        } else {
                            $uploadCV = false;
                            $errorUpload = "Can't upload IMAGE!";
                            writelog(date("Y-m-d H:i:s") . " CareerCenter IMAGE - " . $errorUpload . "_" . $this->_userInfo->email);
                            $uploadError['upload_error'] = true;
                            $this->ocular->set_view_data('uploadError', $uploadError);
                            $this->ocular->set_view_data('errorUpload', $errorUpload);
                        }
                    } else {
                        $uploadCV = false;
                        $errorUpload = "File extension can not upload!";
                        writelog(date("Y-m-d H:i:s") . " CareerCenter -IMAGE  " . $errorUpload . "_" . $this->_userInfo->email);
                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadCV = false;
                    $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                    writelog(date("Y-m-d H:i:s") . " CareerCenter - IMAGE " . $errorUpload . "_" . $this->_userInfo->email);
                    $uploadError['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }
            } else {
                $uploadCV = false;
                $errorUpload = "Directory upload can't exist . ";
                writelog(date("Y-m-d H:i:s") . " CareerCenter -IMAGE  " . $errorUpload . "_" . $this->_userInfo->email);
                $uploadError['upload_error'] = true;
                $this->ocular->set_view_data('uploadError', $uploadError);
                $this->ocular->set_view_data('errorUpload', $errorUpload);
            }

            if ($uploadCV) {

                $linkFile = FCPATH . "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'];
                $dataToStore = array(
                    'name_of_resume' => $this->input->post('nameresume'),
                    'name' => $this->input->post('name'),
                    'photo' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                    "email" => $this->_userInfo->email,
                    "email_resume" => $this->input->post('email'),
                    "phone" => $this->input->post('phone'),
                    "birthday" => $this->input->post('birthday'),
                    'gender' => $this->input->post('gender'),
                    'marital_status' => $this->input->post('material'),
                    "nationality" => $this->input->post('nationality'),
                    "address" => $this->input->post('address'),
                    'province_city' => $this->input->post('province'),
                    "country" => $this->input->post('country'),
                    "district" => $this->input->post('district'),
                    "total_years" => $this->input->post('totalyears'),
                    "experience_years" => $this->input->post('neworexperience'),
                    "jp_level" => $this->input->post('jplevel'),
                    "jp_verbal" => $this->input->post('jpverbal'),
                    'jp_read_write' => $this->input->post('jpread'),
                    "jp_business" => $this->input->post('jpbusiness'),
                    "jp_meeting" => $this->input->post('jpmeeting'),
                    "jp_for_using" => $this->input->post('jpusing'),
                    'jp_for_study' => $this->input->post('jpstudy'),
                    "jp_for_work" => $this->input->post('jpwork'),
                    "jp_for_company" => $this->input->post('jpcompany'),
                    "jlpt" => $this->input->post('jpjlpt'),
                    'en_level' => $this->input->post('enlevel'),
                    "en_toeic_score" => $this->input->post('entoeic'),
                    "en_for_work" => $this->input->post('enwork'),
                    "other_skills" => $this->input->post('otherskills'),
                    "edu-hightest" => $this->input->post('eduhightest'),
                    "edu-sub" => $this->input->post('edusub'),
                    "edu-school" => $this->input->post('eduschool'),
                    "edu-quan" => $this->input->post('eduquan'),
                    "edu-fmonth" => $this->input->post('edufmonth'),
                    "edu-tmonth" => $this->input->post('edutmonth'),
                    'edu-achi' => $this->input->post('eduachi'),
                    "expected_position" => $this->input->post('expos'),
                    "expected_location" => $this->input->post('exloc'),
                    "expected_salary" => $salary,
                    "expected_job_level" => $this->input->post('exlv'),
                    "expected_job_cate" => $this->input->post('excate'),
                    'introduce_yourself' => $this->input->post('pfintro'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );


                $checkId = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

                if (isset($checkId['id'])) {

                    $dataToUpdate = array(
                        'name_of_resume' => $this->input->post('nameresume'),
                        'name' => $this->input->post('name'),
                        'photo' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                        "email" => $this->_userInfo->email,
                        "email_resume" => $this->input->post('email'),
                        "phone" => $this->input->post('phone'),
                        "birthday" => $this->input->post('birthday'),
                        'gender' => $this->input->post('gender'),
                        'marital_status' => $this->input->post('material'),
                        "nationality" => $this->input->post('nationality'),
                        "address" => $this->input->post('address'),
                        'province_city' => $this->input->post('province'),
                        "country" => $this->input->post('country'),
                        "district" => $this->input->post('district'),
                        "total_years" => $this->input->post('totalyears'),
                        "experience_years" => $this->input->post('neworexperience'),
                        "jp_level" => $this->input->post('jplevel'),
                        "jp_verbal" => $this->input->post('jpverbal'),
                        'jp_read_write' => $this->input->post('jpread'),
                        "jp_business" => $this->input->post('jpbusiness'),
                        "jp_meeting" => $this->input->post('jpmeeting'),
                        "jp_for_using" => $this->input->post('jpusing'),
                        'jp_for_study' => $this->input->post('jpstudy'),
                        "jp_for_work" => $this->input->post('jpwork'),
                        "jp_for_company" => $this->input->post('jpcompany'),
                        "jlpt" => $this->input->post('jpjlpt'),
                        'en_level' => $this->input->post('enlevel'),
                        "en_toeic_score" => $this->input->post('entoeic'),
                        "en_for_work" => $this->input->post('enwork'),
                        "other_skills" => $this->input->post('otherskills'),
                        "edu-hightest" => $this->input->post('eduhightest'),
                        "edu-sub" => $this->input->post('edusub'),
                        "edu-school" => $this->input->post('eduschool'),
                        "edu-quan" => $this->input->post('eduquan'),
                        "edu-fmonth" => $this->input->post('edufmonth'),
                        "edu-tmonth" => $this->input->post('edutmonth'),
                        'edu-achi' => $this->input->post('eduachi'),
                        "expected_position" => $this->input->post('expos'),
                        "expected_location" => $this->input->post('exloc'),
                        "expected_salary" => $salary,
                        "expected_job_level" => $this->input->post('exlv'),
                        "expected_job_cate" => $this->input->post('excate'),
                        'introduce_yourself' => $this->input->post('pfintro'),
                        'actflg' => 1,
                        "createdate" => date("Y-m-d H:i:s"),
                        "updatedate" => date("Y-m-d H:i:s")
                    );

                    $onlineresume = $this->resumes_online_model->updateInformationResumeOnline($checkId['id'], $dataToUpdate);
                } else {
                    $onlineresume = $this->resumes_online_model->insertInformationResumeOnline($dataToStore);
                }
            }

            $checkIdNew = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

            $this->resumes_online_model->deleteAllCompany($checkIdNew['id']);

            $company1 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => $this->input->post('companyname1'),
                'industry' => $this->input->post('industry1'),
                "position" => $this->input->post('positioncompany1'),
                "job_category" => $this->input->post('jobcate1'),
                "manage_exp" => $this->input->post('numbermember1'),
                'japanese_company' => $this->input->post('japanesecom1'),
                'company_size' => $this->input->post('numbercompany_size1'),
                "from_month" => $this->input->post('fmonth1'),
                "to_month" => $this->input->post('tmonth1'),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company1);
            if (trim($this->input->post('companyname2')) != '') {
                $company2 = array(
                    'resume_id' => $checkIdNew['id'],
                    'company_name' => $this->input->post('companyname2'),
                    'industry' => $this->input->post('industry2'),
                    "position" => $this->input->post('positioncompany2'),
                    "job_category" => $this->input->post('jobcate2'),
                    "manage_exp" => $this->input->post('numbermember2'),
                    'japanese_company' => $this->input->post('japanesecom2'),
                    'company_size' => $this->input->post('numbercompany_size2'),
                    "from_month" => $this->input->post('fmonth2'),
                    "to_month" => $this->input->post('tmonth2'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );
                $this->resumes_online_model->insertInformationCompany($company2);
            }
//----end upload file to server-------------------------------
//generate file DOC
            $document = $PHPWord->loadTemplate(FCPATH . "docx/JPWTempNew.docx");
            $document->save_image('image2.png', "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'], $document);
//  $document->save(FCPATH . "docx/resumeonline.docx");
            $document->setValue('NameResume', $this->input->post('nameresume'));
            $document->setValue('NameUser', $this->input->post('name'));
            $document->setValue('Nationality', $this->input->post('nationality'));
            $document->setValue('Birthday', $this->input->post('birthday'));
            $document->setValue('Sex', $this->input->post('gender'));
            $document->setValue('Nation', $this->input->post('country'));
            $document->setValue('Address', $this->input->post('address'));
            $document->setValue('District', $this->input->post('district'));
            $document->setValue('Province', $this->input->post('country'));
            $document->setValue('Phone', $this->input->post('phone'));
            $document->setValue('Email', $this->input->post('email'));
//candidate's Expection

            $document->setValue('Position', $this->input->post('expos'));
            $document->setValue('JobLevel', $this->input->post('exlv'));
            $document->setValue('Place', $this->input->post('exloc'));
            $document->setValue('JobCate', $this->input->post('excate'));
            $document->setValue('Salary', $salary);

//company1

            $document->setValue('CompanyName1', $this->input->post('companyname1'));
            $document->setValue('Industry1', $this->input->post('industry1'));
            $document->setValue('Position1', $this->input->post('positioncompany1'));
            $document->setValue('JobCat1', $this->input->post('jobcate1'));
            $document->setValue('NumMem1', $this->input->post('numbermember1'));

            $document->setValue('IsJapCompany1', $this->input->post('japanesecom1'));
            $document->setValue('NumEmployee1', $this->input->post('numbercompany_size1'));
            $document->setValue('FromMonth1', $this->input->post('fmonth1'));
            $document->setValue('ToMonth1', $this->input->post('tmonth1'));

//company2
            $document->setValue('CompanyName2', $this->input->post('companyname2'));
            $document->setValue('Industry2', $this->input->post('industry2'));
            $document->setValue('Position2', $this->input->post('positioncompany2'));
            $document->setValue('JobCat2', $this->input->post('jobcate2'));
            $document->setValue('NumMem2', $this->input->post('numbermember2'));

            $document->setValue('IsJapCompany2', $this->input->post('japanesecom2'));
            $document->setValue('NumEmployee2', $this->input->post('numbercompany_size2'));
            $document->setValue('FromMonth2', $this->input->post('fmonth2'));
            $document->setValue('ToMonth2', $this->input->post('tmonth2'));
//Education & Qualifications

            $document->setValue('HighestEducation', $this->input->post('eduhightest'));
            $document->setValue('Subject', $this->input->post('edusub'));
            $document->setValue('School', $this->input->post('eduschool'));
            $document->setValue('FromMonthEdu', $this->input->post('edufmonth'));
            $document->setValue('ToMonthEdu', $this->input->post('edutmonth'));
            $document->setValue('Qualification', $this->input->post('eduquan'));
            $document->setValue('Achievements', $this->input->post('eduachi'));

//Profile / Objective
            $document->setValue('Introduce', $this->input->post('pfintro'));

//Skills
            $document->setValue('JpLevel', $this->input->post('jplevel'));
            $document->setValue('JpVerbal', $this->input->post('jpverbal'));
            $document->setValue('JpRead', $this->input->post('jpread'));
            $document->setValue('JpBusiness', $this->input->post('jpbusiness'));
            $document->setValue('JpMeeting', $this->input->post('jpmeeting'));
            $document->setValue('JpUsing', $this->input->post('jpusing'));
            $document->setValue('JpStudy', $this->input->post('jpstudy'));
            $document->setValue('JpWork', $this->input->post('jpwork'));
            $document->setValue('JpCompany', $this->input->post('jpcompany'));
            $document->setValue('JLPT', $this->input->post('jpjlpt'));
            $document->setValue('EngLevel', $this->input->post('enlevel'));
            $document->setValue('EnToeic', $this->input->post('entoeic'));
            $document->setValue('EnWork', $this->input->post('enwork'));
            $document->setValue('OtherSkills', $this->input->post('otherskills'));

            $new_str = utf8tourl(utf8convert($this->input->post('nameresume')));
            $nameResume = $new_str . '.docx';
//$document->save("uploads/" . $emailUser . "/" . $nameResume);
            $document->save(FCPATH . "uploads/" . $emailUser . "/" . $nameResume);

            $update = array(
                'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
                'nameresumeonline' => $nameResume
            );
            $this->load->model('resumes_model');

            $checkResume = $this->resumes_model->getInformationOfUser($this->_userInfo->email);

            if (isset($checkResume['id'])) {

                $onlineresume = $this->resumes_model->updateOnlineResume($this->_userInfo->email, $update);
            } else {
                $newRS = array(
                    'email' => $this->_userInfo->email,
                    "firstname" => $this->_userInfo->first_name,
                    "lastname" => $this->_userInfo->last_name,
                    'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
                    'nameresumeonline' => $nameResume,
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );

                $this->resumes_model->insertInformationCV($newRS);
            }
        }
        $this->ocular->render('blank');
    }

    public function preview_resume() {

        if (isset($this->input->post('neworexperience'))) {
            $new = 1;
        } else {
            $new = 0;
        }
        if ($this->input->post('ex-salary') != 1) {
            $salary = $this->input->post('salary');
        } else {
            $salary = "negotiable";
        }
        $linkFile = '';
//upload file to server
        $emailUser = str_replace(array("@", "."), "", $this->_userInfo->email);
        $nameFolder = UPLOAD_DIR . $emailUser . "/";
        $config['upload_path'] = $nameFolder;
        if (!file_exists($nameFolder)) {
            mkdir($nameFolder, 0777);
        }
        if (file_exists($nameFolder)) {
//writelog file when upload
            writelog(date("Y-m-d H:i:s") . " File upload at IMAGE:  " . json_encode($_FILES) . "_" . $this->_userInfo->email);
//chmod for folder
            chmod($nameFolder, 0777);

            $file_name = $_FILES['inputFile']['name'];
            $path_parts = pathinfo($file_name);
            $extension = @$path_parts['extension'];

            if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE_FOR_JOBS) {
                if (in_array($extension, unserialize(FILE_UPLOAD_IMAGE_EXTENSIONS))) {
                    $uploadfile = $nameFolder . $_FILES['inputFile']['name'];

                    if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                        $uploadCV = true;
                    } else {
                        $uploadCV = false;
                        $errorUpload = "Can't upload IMAGE!";
                        writelog(date("Y-m-d H:i:s") . " CareerCenter IMAGE - " . $errorUpload . "_" . $this->_userInfo->email);
                        $uploadError ['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadCV = false;
                    $errorUpload = "File extension can not upload!";
                    writelog(date("Y-m-d H:i:s") . " CareerCenter -IMAGE  " . $errorUpload . "_" . $this->_userInfo->email);
                    $uploadError ['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }
            } else {
                $uploadCV = false;
                $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                writelog(date("Y-m-d H:i:s") . " CareerCenter - IMAGE " . $errorUpload . "_" . $this->_userInfo->email);
                $uploadError ['upload_error'] = true;
                $this->ocular->set_view_data('uploadError', $uploadError);
                $this->ocular->set_view_data('errorUpload', $errorUpload);
            }
        } else {
            $uploadCV = false;
            $errorUpload = "Directory upload can't exist . ";
            writelog(date("Y-m-d H:i:s") . " CareerCenter -IMAGE  " . $errorUpload . "_" . $this->_userInfo->email);
            $uploadError ['upload_error'] = true;
            $this->ocular->set_view_data('uploadError', $uploadError);
            $this->ocular->set_view_data('errorUpload', $errorUpload);
        }

        if ($uploadCV) {

            $linkFile = FCPATH . "uploads/" . $emailUser . "/" . $_FILES['inputFile'] ['name'];
            $dataToStore = array(
                'name_of_resume' => $this->input->post('nameresume'),
                'name' => $this->input->post('name'),
                'photo' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                "email" => $this->_userInfo->email,
                "email_resume" => $this->input->post('email'),
                "phone" => $this->input->post('phone'),
                "birthday" => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'marital_status' => $this->input->post('material'),
                "nationality" => $this->input->post('nationality'),
                "address" => $this->input->post('address'),
                'province_city' => $this->input->post('province'),
                "country" => $this->input->post('country'),
                "district" => $this->input->post('district'),
                "total_years" => $this->input->post('totalyears'),
                "experience_years" => $new,
                "jp_level" => $this->input->post('jplevel'),
                "jp_verbal" => $this->input->post('jpverbal'),
                'jp_read_write' => $this->input->post('jpread'),
                "jp_business" => $this->input->post('jpbusiness'),
                "jp_meeting" => $this->input->post('jpmeeting'),
                "jp_for_using" => $this->input->post('jpusing'),
                'jp_for_study' => $this->input->post('jpstudy'),
                "jp_for_work" => $this->input->post('jpwork'),
                "jp_for_company" => $this->input->post('jpcompany'),
                "jlpt" => $this->input->post('jpjlpt'),
                'en_level' => $this->input->post('enlevel'),
                "en_toeic_score" => $this->input->post('entoeic'),
                "en_for_work" => $this->input->post('enwork'),
                "other_skills" => $this->input->post('otherskills'),
                "edu-hightest" => $this->input->post('eduhightest'),
                "edu-sub" => $this->input->post('edusub'),
                "edu-school" => $this->input->post('eduschool'),
                "edu-quan" => $this->input->post('eduquan'),
                "edu-fmonth" => $this->input->post('edufmonth'),
                "edu-tmonth" => $this->input->post('edutmonth'),
                'edu-achi' => $this->input->post('eduachi'),
                "expected_position" => $this->input->post('expos'),
                "expected_location" => $this->input->post('exloc'),
                "expected_salary" => $salary,
                "expected_job_level" => $this->input->post('exlv'),
                "expected_job_cate" => $this->input->post('excate'),
                'introduce_yourself' => $this->input->post('pfintro'),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );


            $checkId = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

            if (isset($checkId['id'])) {

                $dataToUpdate = array(
                    'name_of_resume' => $this->input->post('nameresume'),
                    'name' => $this->input->post('name'),
                    'photo' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                    "email" => $this->_userInfo->email,
                    "email_resume" => $this->input->post('email'),
                    "phone" => $this->input->post('phone'),
                    "birthday" => $this->input->post('birthday'),
                    'gender' => $this->input->post('gender'),
                    'marital_status' => $this->input->post('material'),
                    "nationality" => $this->input->post('nationality'),
                    "address" => $this->input->post('address'),
                    'province_city' => $this->input->post('province'),
                    "country" => $this->input->post('country'),
                    "district" => $this->input->post('district'),
                    "total_years" => $this->input->post('totalyears'),
                    "experience_years" => $new,
                    "jp_level" => $this->input->post('jplevel'),
                    "jp_verbal" => $this->input->post('jpverbal'),
                    'jp_read_write' => $this->input->post('jpread'),
                    "jp_business" => $this->input->post('jpbusiness'),
                    "jp_meeting" => $this->input->post('jpmeeting'),
                    "jp_for_using" => $this->input->post('jpusing'),
                    'jp_for_study' => $this->input->post('jpstudy'),
                    "jp_for_work" => $this->input->post('jpwork'),
                    "jp_for_company" => $this->input->post('jpcompany'),
                    "jlpt" => $this->input->post('jpjlpt'),
                    'en_level' => $this->input->post('enlevel'),
                    "en_toeic_score" => $this->input->post('entoeic'),
                    "en_for_work" => $this->input->post('enwork'),
                    "other_skills" => $this->input->post('otherskills'),
                    "edu-hightest" => $this->input->post('eduhightest'),
                    "edu-sub" => $this->input->post('edusub'),
                    "edu-school" => $this->input->post('eduschool'),
                    "edu-quan" => $this->input->post('eduquan'),
                    "edu-fmonth" => $this->input->post('edufmonth'),
                    "edu-tmonth" => $this->input->post('edutmonth'),
                    'edu-achi' => $this->input->post('eduachi'),
                    "expected_position" => $this->input->post('expos'),
                    "expected_location" => $this->input->post('exloc'),
                    "expected_salary" => $salary,
                    "expected_job_level" => $this->input->post('exlv'),
                    "expected_job_cate" => $this->input->post('excate'),
                    'introduce_yourself' => $this->input->post('pfintro'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );

                $onlineresume = $this->resumes_online_model->updateInformationResumeOnline($checkId['id'], $dataToUpdate);
            } else {
                $onlineresume = $this->resumes_online_model->insertInformationResumeOnline($dataToStore);
            }
        }

        $checkIdNew = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

        $this->resumes_online_model->deleteAllCompany($checkIdNew['id']);

        $company1 = array(
            'resume_id' => $checkIdNew['id'],
            'company_name' => $this->input->post('companyname1'),
            'industry' => $this->input->post('industry1'),
            "position" => $this->input->post('positioncompany1'),
            "job_category" => $this->input->post('jobcate1'),
            "manage_exp" => $this->input->post('numbermember1'),
            'japanese_company' => $this->input->post('japanesecom1'),
            'company_size' => $this->input->post('numbercompany_size1'),
            "from_month" => $this->input->post('fmonth1'),
            "to_month" => $this->input->post('tmonth1'),
            'actflg' => 1,
            "createdate" => date("Y-m-d H:i:s"),
            "updatedate" => date("Y-m-d H:i:s")
        );
        $this->resumes_online_model->insertInformationCompany($company1);
        if (trim($this->input->post('companyname2')) != '') {
            $company2 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => $this->input->post('companyname2'),
                'industry' => $this->input->post('industry2'),
                "position" => $this->input->post('positioncompany2'),
                "job_category" => $this->input->post('jobcate2'),
                "manage_exp" => $this->input->post('numbermember2'),
                'japanese_company' => $this->input->post('japanesecom2'),
                'company_size' => $this->input->post('numbercompany_size2'),
                "from_month" => $this->input->post('fmonth2'),
                "to_month" => $this->input->post('tmonth2'),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company2);
        }
//----end upload file to server-------------------------------
//generate file DOC
        $this->load->library('PHPWord');
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate(FCPATH . "docx/JPWTempNew.docx");
        $document->save_image('image2.png', "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'], $document);
//  $document->save(FCPATH . "docx/resumeonline.docx");
        $document->setValue('NameResume', $this->input->post('nameresume'));
        $document->setValue('NameUser', $this->input->post('name'));
        $document->setValue('Nationality', $this->input->post('nationality'));
        $document->setValue('Birthday', $this->input->post('birthday'));
        $document->setValue('Sex', $this->input->post('gender'));
        $document->setValue('Nation', $this->input->post('country'));
        $document->setValue('Address', $this->input->post('address'));
        $document->setValue('District', $this->input->post('district'));
        $document->setValue('Province', $this->input->post('country'));
        $document->setValue('Phone', $this->input->post('phone'));
        $document->setValue('Email', $this->input->post('email'));
//candidate's Expection

        $document->setValue('Position', $this->input->post('expos'));
        $document->setValue('JobLevel', $this->input->post('exlv'));
        $document->setValue('Place', $this->input->post('exloc'));
        $document->setValue('JobCate', $this->input->post('excate'));
        $document->setValue('Salary', $salary);

//company1

        $document->setValue('CompanyName1', $this->input->post('companyname1'));
        $document->setValue('Industry1', $this->input->post('industry1'));
        $document->setValue('Position1', $this->input->post('positioncompany1'));
        $document->setValue('JobCat1', $this->input->post('jobcate1'));
        $document->setValue('NumMem1', $this->input->post('numbermember1'));

        $document->setValue('IsJapCompany1', $this->input->post('japanesecom1'));
        $document->setValue('NumEmployee1', $this->input->post('numbercompany_size1'));
        $document->setValue('FromMonth1', $this->input->post('fmonth1'));
        $document->setValue('ToMonth1', $this->input->post('tmonth1'));

//company2
        $document->setValue('CompanyName2', $this->input->post('companyname2'));
        $document->setValue('Industry2', $this->input->post('industry2'));
        $document->setValue('Position2', $this->input->post('positioncompany2'));
        $document->setValue('JobCat2', $this->input->post('jobcate2'));
        $document->setValue('NumMem2', $this->input->post('numbermember2'));

        $document->setValue('IsJapCompany2', $this->input->post('japanesecom2'));
        $document->setValue('NumEmployee2', $this->input->post('numbercompany_size2'));
        $document->setValue('FromMonth2', $this->input->post('fmonth2'));
        $document->setValue('ToMonth2', $this->input->post('tmonth2'));
//Education & Qualifications

        $document->setValue('HighestEducation', $this->input->post('eduhightest'));
        $document->setValue('Subject', $this->input->post('edusub'));
        $document->setValue('School', $this->input->post('eduschool'));
        $document->setValue('FromMonthEdu', $this->input->post('edufmonth'));
        $document->setValue('ToMonthEdu', $this->input->post('edutmonth'));
        $document->setValue('Qualification', $this->input->post('eduquan'));
        $document->setValue('Achievements', $this->input->post('eduachi'));

//Profile / Objective
        $document->setValue('Introduce', $this->input->post('pfintro'));

//Skills
        $document->setValue('JpLevel', $this->input->post('jplevel'));
        $document->setValue('JpVerbal', $this->input->post('jpverbal'));
        $document->setValue('JpRead', $this->input->post('jpread'));
        $document->setValue('JpBusiness', $this->input->post('jpbusiness'));
        $document->setValue('JpMeeting', $this->input->post('jpmeeting'));
        $document->setValue('JpUsing', $this->input->post('jpusing'));
        $document->setValue('JpStudy', $this->input->post('jpstudy'));
        $document->setValue('JpWork', $this->input->post('jpwork'));
        $document->setValue('JpCompany', $this->input->post('jpcompany'));
        $document->setValue('JLPT', $this->input->post('jpjlpt'));
        $document->setValue('EngLevel', $this->input->post('enlevel'));
        $document->setValue('EnToeic', $this->input->post('entoeic'));
        $document->setValue('EnWork', $this->input->post('enwork'));
        $document->setValue('OtherSkills', $this->input->post('otherskills'));

        $new_str = utf8tourl(utf8convert($this->input->post('nameresume')));
        $nameResume = $new_str . '.docx';
//$document->save("uploads/" . $emailUser . "/" . $nameResume);
        $document->save(FCPATH . "uploads/" . $emailUser . "/" . $nameResume);

        $update = array(
            'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
            'nameresumeonline' => $nameResume
        );
        $this->load->model('resumes_model');

        $checkResume = $this->resumes_model->getInformationOfUser($this->_userInfo->email);

        if (isset($checkResume['id'])) {

            $onlineresume = $this->resumes_model->updateOnlineResume($this->_userInfo->email, $update);
        } else {
            $newRS = array(
                'email' => $this->_userInfo->email,
                "firstname" => $this->_userInfo->first_name,
                "lastname" => $this->_userInfo->last_name,
                'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
                'nameresumeonline' => $nameResume,
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );

            $this->resumes_model->insertInformationCV($newRS);
        }


        echo "https://view.officeapps.live.com/op/view.aspx?src=" . urlencode(base_url() . "uploads/" . $emailUser . "/" . $nameResume);
//  redirect(site_url('account'));
    }

    public function edit() {

        $this->load->library('PHPWord');
        $PHPWord = new PHPWord();


// if logon
        if (isset($this->_userInfo->login_token)) {

        } else {
            redirect(site_url('login'));
        }



        if ($this->input->post('isSent') == 'OK') {
            if (isset($this->input->post('neworexperience'))) {
                $new = 1;
            } else {
                $new = 0;
            }

            if ($this->input->post('ex-salary') != 1) {
                $salary = $this->input->post('salary');
            } else {
                $salary = "negotiable";
            }

            $linkFile = '';


//upload file to server
            $emailUser = str_replace(array("@", "."), "", $this->_userInfo->email);
            $nameFolder = UPLOAD_DIR . $emailUser . "/";
            $config['upload_path'] = $nameFolder;

            if (!file_exists($nameFolder)) {
                mkdir($nameFolder, 0777);
            }
            if (file_exists($nameFolder)) {
//writelog file when upload
                writelog(date("Y-m-d H:i:s") . " File upload at IMAGE:  " . json_encode($_FILES) . "_" . $this->_userInfo->email);
//chmod for folder
                chmod($nameFolder, 0777);

                $file_name = $_FILES['inputFile']['name'];
                $path_parts = pathinfo($file_name);
                $extension = @$path_parts['extension'];

                if ($_FILES['inputFile']['size'] <= LIMIT_FILE_SIZE_FOR_JOBS) {
                    if (in_array($extension, unserialize(FILE_UPLOAD_IMAGE_EXTENSIONS))) {

                        $uploadfile = $nameFolder . $_FILES['inputFile']['name'];

                        if (move_uploaded_file($_FILES['inputFile']['tmp_name'], $uploadfile)) {
                            $uploadCV = true;
                        } else {
                            $uploadCV = false;
                            $errorUpload = "Can't upload IMAGE!";
                            writelog(date("Y-m-d H:i:s") . " CareerCenter IMAGE - " . $errorUpload . "_" . $this->_userInfo->email);
                            $uploadError['upload_error'] = true;
                            $this->ocular->set_view_data('uploadError', $uploadError);
                            $this->ocular->set_view_data('errorUpload', $errorUpload);
                        }
                    } else {
                        $uploadCV = false;
                        $errorUpload = "File extension can not upload!";
                        writelog(date("Y-m-d H:i:s") . " CareerCenter -IMAGE  " . $errorUpload . "_" . $this->_userInfo->email);
                        $uploadError['upload_error'] = true;
                        $this->ocular->set_view_data('uploadError', $uploadError);
                        $this->ocular->set_view_data('errorUpload', $errorUpload);
                    }
                } else {
                    $uploadCV = false;
                    $errorUpload = "The file selected exceed size limit. Please choose another file. ";
                    writelog(date("Y-m-d H:i:s") . " CareerCenter - IMAGE " . $errorUpload . "_" . $this->_userInfo->email);
                    $uploadError['upload_error'] = true;
                    $this->ocular->set_view_data('uploadError', $uploadError);
                    $this->ocular->set_view_data('errorUpload', $errorUpload);
                }
            } else {
                $uploadCV = false;
                $errorUpload = "Directory upload can't exist . ";
                writelog(date("Y-m-d H:i:s") . " CareerCenter -IMAGE  " . $errorUpload . "_" . $this->_userInfo->email);
                $uploadError['upload_error'] = true;
                $this->ocular->set_view_data('uploadError', $uploadError);
                $this->ocular->set_view_data('errorUpload', $errorUpload);
            }

            if ($uploadCV) {

                $linkFile = FCPATH . "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'];
                $dataToStore = array(
                    'name_of_resume' => $this->input->post('nameresume'),
                    'name' => $this->input->post('name'),
                    'photo' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                    "email" => $this->_userInfo->email,
                    "email_resume" => $this->input->post('email'),
                    "phone" => $this->input->post('phone'),
                    "birthday" => $this->input->post('birthday'),
                    'gender' => $this->input->post('gender'),
                    'marital_status' => $this->input->post('material'),
                    "nationality" => $this->input->post('nationality'),
                    "address" => $this->input->post('address'),
                    'province_city' => $this->input->post('province'),
                    "country" => $this->input->post('country'),
                    "district" => $this->input->post('district'),
                    "total_years" => $this->input->post('totalyears'),
                    "experience_years" => $new,
                    "jp_level" => $this->input->post('jplevel'),
                    "jp_verbal" => $this->input->post('jpverbal'),
                    'jp_read_write' => $this->input->post('jpread'),
                    "jp_business" => $this->input->post('jpbusiness'),
                    "jp_meeting" => $this->input->post('jpmeeting'),
                    "jp_for_using" => $this->input->post('jpusing'),
                    'jp_for_study' => $this->input->post('jpstudy'),
                    "jp_for_work" => $this->input->post('jpwork'),
                    "jp_for_company" => $this->input->post('jpcompany'),
                    "jlpt" => $this->input->post('jpjlpt'),
                    'en_level' => $this->input->post('enlevel'),
                    "en_toeic_score" => $this->input->post('entoeic'),
                    "en_for_work" => $this->input->post('enwork'),
                    "other_skills" => $this->input->post('otherskills'),
                    "edu-hightest" => $this->input->post('eduhightest'),
                    "edu-sub" => $this->input->post('edusub'),
                    "edu-school" => $this->input->post('eduschool'),
                    "edu-quan" => $this->input->post('eduquan'),
                    "edu-fmonth" => $this->input->post('edufmonth'),
                    "edu-tmonth" => $this->input->post('edutmonth'),
                    'edu-achi' => $this->input->post('eduachi'),
                    "expected_position" => $this->input->post('expos'),
                    "expected_location" => $this->input->post('exloc'),
                    "expected_salary" => $salary,
                    "expected_job_level" => $this->input->post('exlv'),
                    "expected_job_cate" => $this->input->post('excate'),
                    'introduce_yourself' => $this->input->post('pfintro'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );


                $checkId = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

                if (isset($checkId['id'])) {

                    $dataToUpdate = array(
                        'name_of_resume' => $this->input->post('nameresume'),
                        'name' => $this->input->post('name'),
                        'photo' => "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'],
                        "email" => $this->_userInfo->email,
                        "email_resume" => $this->input->post('email'),
                        "phone" => $this->input->post('phone'),
                        "birthday" => $this->input->post('birthday'),
                        'gender' => $this->input->post('gender'),
                        'marital_status' => $this->input->post('material'),
                        "nationality" => $this->input->post('nationality'),
                        "address" => $this->input->post('address'),
                        'province_city' => $this->input->post('province'),
                        "country" => $this->input->post('country'),
                        "district" => $this->input->post('district'),
                        "total_years" => $this->input->post('totalyears'),
                        "experience_years" => $this->input->post('neworexperience'),
                        "jp_level" => $this->input->post('jplevel'),
                        "jp_verbal" => $this->input->post('jpverbal'),
                        'jp_read_write' => $this->input->post('jpread'),
                        "jp_business" => $this->input->post('jpbusiness'),
                        "jp_meeting" => $this->input->post('jpmeeting'),
                        "jp_for_using" => $this->input->post('jpusing'),
                        'jp_for_study' => $this->input->post('jpstudy'),
                        "jp_for_work" => $this->input->post('jpwork'),
                        "jp_for_company" => $this->input->post('jpcompany'),
                        "jlpt" => $this->input->post('jpjlpt'),
                        'en_level' => $this->input->post('enlevel'),
                        "en_toeic_score" => $this->input->post('entoeic'),
                        "en_for_work" => $this->input->post('enwork'),
                        "other_skills" => $this->input->post('otherskills'),
                        "edu-hightest" => $this->input->post('eduhightest'),
                        "edu-sub" => $this->input->post('edusub'),
                        "edu-school" => $this->input->post('eduschool'),
                        "edu-quan" => $this->input->post('eduquan'),
                        "edu-fmonth" => $this->input->post('edufmonth'),
                        "edu-tmonth" => $this->input->post('edutmonth'),
                        'edu-achi' => $this->input->post('eduachi'),
                        "expected_position" => $this->input->post('expos'),
                        "expected_location" => $this->input->post('exloc'),
                        "expected_salary" => $salary,
                        "expected_job_level" => $this->input->post('exlv'),
                        "expected_job_cate" => $this->input->post('excate'),
                        'introduce_yourself' => $this->input->post('pfintro'),
                        'actflg' => 1,
                        "createdate" => date("Y-m-d H:i:s"),
                        "updatedate" => date("Y-m-d H:i:s")
                    );

                    $onlineresume = $this->resumes_online_model->updateInformationResumeOnline($checkId['id'], $dataToUpdate);
                } else {
                    $onlineresume = $this->resumes_online_model->insertInformationResumeOnline($dataToStore);
                }
            }

            $checkIdNew = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

            $this->resumes_online_model->deleteAllCompany($checkIdNew['id']);

            $company1 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => $this->input->post('companyname1'),
                'industry' => $this->input->post('industry1'),
                "position" => $this->input->post('positioncompany1'),
                "job_category" => $this->input->post('jobcate1'),
                "manage_exp" => $this->input->post('numbermember1'),
                'japanese_company' => $this->input->post('japanesecom1'),
                'company_size' => $this->input->post('numbercompany_size1'),
                "from_month" => $this->input->post('fmonth1'),
                "to_month" => $this->input->post('tmonth1'),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company1);
            if (trim($this->input->post('companyname2')) != '') {
                $company2 = array(
                    'resume_id' => $checkIdNew['id'],
                    'company_name' => $this->input->post('companyname2'),
                    'industry' => $this->input->post('industry2'),
                    "position" => $this->input->post('positioncompany2'),
                    "job_category" => $this->input->post('jobcate2'),
                    "manage_exp" => $this->input->post('numbermember2'),
                    'japanese_company' => $this->input->post('japanesecom2'),
                    'company_size' => $this->input->post('numbercompany_size2'),
                    "from_month" => $this->input->post('fmonth2'),
                    "to_month" => $this->input->post('tmonth2'),
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );
                $this->resumes_online_model->insertInformationCompany($company2);
            }
//----end upload file to server-------------------------------
//generate file DOC
            $document = $PHPWord->loadTemplate(FCPATH . "docx/JPWTempNew.docx");
            $document->save_image('image2.png', "uploads/" . $emailUser . "/" . $_FILES['inputFile']['name'], $document);
//  $document->save(FCPATH . "docx/resumeonline.docx");
            $document->setValue('NameResume', $this->input->post('nameresume'));
            $document->setValue('NameUser', $this->input->post('name'));
            $document->setValue('Nationality', $this->input->post('nationality'));
            $document->setValue('Birthday', $this->input->post('birthday'));
            $document->setValue('Sex', $this->input->post('gender'));
            $document->setValue('Nation', $this->input->post('country'));
            $document->setValue('Address', $this->input->post('address'));
            $document->setValue('District', $this->input->post('district'));
            $document->setValue('Province', $this->input->post('country'));
            $document->setValue('Phone', $this->input->post('phone'));
            $document->setValue('Email', $this->input->post('email'));
//candidate's Expection

            $document->setValue('Position', $this->input->post('expos'));
            $document->setValue('JobLevel', $this->input->post('exlv'));
            $document->setValue('Place', $this->input->post('exloc'));
            $document->setValue('JobCate', $this->input->post('excate'));
            $document->setValue('Salary', $salary);

//company1

            $document->setValue('CompanyName1', $this->input->post('companyname1'));
            $document->setValue('Industry1', $this->input->post('industry1'));
            $document->setValue('Position1', $this->input->post('positioncompany1'));
            $document->setValue('JobCat1', $this->input->post('jobcate1'));
            $document->setValue('NumMem1', $this->input->post('numbermember1'));

            $document->setValue('IsJapCompany1', $this->input->post('japanesecom1'));
            $document->setValue('NumEmployee1', $this->input->post('numbercompany_size1'));
            $document->setValue('FromMonth1', $this->input->post('fmonth1'));
            $document->setValue('ToMonth1', $this->input->post('tmonth1'));

//company2
            $document->setValue('CompanyName2', $this->input->post('companyname2'));
            $document->setValue('Industry2', $this->input->post('industry2'));
            $document->setValue('Position2', $this->input->post('positioncompany2'));
            $document->setValue('JobCat2', $this->input->post('jobcate2'));
            $document->setValue('NumMem2', $this->input->post('numbermember2'));

            $document->setValue('IsJapCompany2', $this->input->post('japanesecom2'));
            $document->setValue('NumEmployee2', $this->input->post('numbercompany_size2'));
            $document->setValue('FromMonth2', $this->input->post('fmonth2'));
            $document->setValue('ToMonth2', $this->input->post('tmonth2'));
//Education & Qualifications

            $document->setValue('HighestEducation', $this->input->post('eduhightest'));
            $document->setValue('Subject', $this->input->post('edusub'));
            $document->setValue('School', $this->input->post('eduschool'));
            $document->setValue('FromMonthEdu', $this->input->post('edufmonth'));
            $document->setValue('ToMonthEdu', $this->input->post('edutmonth'));
            $document->setValue('Qualification', $this->input->post('eduquan'));
            $document->setValue('Achievements', $this->input->post('eduachi'));

//Profile / Objective
            $document->setValue('Introduce', $this->input->post('pfintro'));

//Skills
            $document->setValue('JpLevel', $this->input->post('jplevel'));
            $document->setValue('JpVerbal', $this->input->post('jpverbal'));
            $document->setValue('JpRead', $this->input->post('jpread'));
            $document->setValue('JpBusiness', $this->input->post('jpbusiness'));
            $document->setValue('JpMeeting', $this->input->post('jpmeeting'));
            $document->setValue('JpUsing', $this->input->post('jpusing'));
            $document->setValue('JpStudy', $this->input->post('jpstudy'));
            $document->setValue('JpWork', $this->input->post('jpwork'));
            $document->setValue('JpCompany', $this->input->post('jpcompany'));
            $document->setValue('JLPT', $this->input->post('jpjlpt'));
            $document->setValue('EngLevel', $this->input->post('enlevel'));
            $document->setValue('EnToeic', $this->input->post('entoeic'));
            $document->setValue('EnWork', $this->input->post('enwork'));
            $document->setValue('OtherSkills', $this->input->post('otherskills'));

            $new_str = utf8tourl(utf8convert($this->input->post('nameresume')));
            $nameResume = $new_str . '.docx';
//$document->save("uploads/" . $emailUser . "/" . $nameResume);
            $document->save(FCPATH . "uploads/" . $emailUser . "/" . $nameResume);

            $update = array(
                'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
                'nameresumeonline' => $nameResume
            );
            $this->load->model('resumes_model');

            $checkResume = $this->resumes_model->getInformationOfUser($this->_userInfo->email);

            if (isset($checkResume['id'])) {

                $onlineresume = $this->resumes_model->updateOnlineResume($this->_userInfo->email, $update);
            } else {
                $newRS = array(
                    'email' => $this->_userInfo->email,
                    "firstname" => $this->_userInfo->first_name,
                    "lastname" => $this->_userInfo->last_name,
                    'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
                    'nameresumeonline' => $nameResume,
                    'actflg' => 1,
                    "createdate" => date("Y-m-d H:i:s"),
                    "updatedate" => date("Y-m-d H:i:s")
                );

                $this->resumes_model->insertInformationCV($newRS);
            }
        }
        $inforOResume = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);
        if (isset($inforOResume['id'])) {
            $inforCom = $this->resumes_online_model->getAllCompany($inforOResume['id']);
            if (isset($inforCom)) {
                $this->ocular->set_view_data("inforCom", $inforCom);
            }
            $this->ocular->set_view_data("inforOResume", $inforOResume);
        } else {
            redirect(site_url('account'));
        }
        $this->ocular->render('blank');
    }

}
