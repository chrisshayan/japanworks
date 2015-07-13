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
// if logon
        if (isset($this->_userInfo->login_token)) {

        } else {
            redirect(site_url('login'));
        }
        if (($this->uri->segment(3)) == "vn") {
            $lang = 3;
            $this->lang->load('resume', 'vn');
        } else if (($this->uri->segment(3)) == "jp") {
            $lang = 2;
            $this->lang->load('resume', 'jp');
        } else if (($this->uri->segment(3)) == "en") {
            $lang = 1;
            $this->lang->load('resume', 'en');
        } else {
            $lang = 1;
            $this->lang->load('resume', 'en');
        }


        $this->ocular->set_view_data('lang', $lang);
        $arrayCountry = array("Việt Nam", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica",
            "Antigua And Barbuda", "Argentina", "Armenia", "Aruba", "Úc", "Áo", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Bỉ",
            "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia And Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory",
            "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic",
            "Chad", "Chile", "Trung Quốc", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Cote D'Ivoire",
            "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
            "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "France, Metropolitan",
            "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland",
            "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard And Mc Donald Islands", "Honduras", "Hong Kong", "Hungary",
            "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
            "North Korea (People's Republic Of Korea)", "South Korea (Republic Of Korea)", "Kuwait", "Kyrgyzstan", "Lao People's Republic", "Latvia", "Lebanon",
            "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia",
            "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia",
            "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand",
            "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea",
            "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda",
            "Saint Kitts And Nevis", "Saint Lucia", "Saint Vincent And The Grenadines", "Samoa", "San Marino", "Sao Tome And Principe", "Saudi Arabia", "Senegal",
            "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia/South Sandwich Islands",
            "Spain", "Sri Lanka", "St Helena", "St Pierre and Miquelon", "Sudan", "Suriname", "Svalbard And Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland",
            "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad And Tobago", "Tunisia", "Turkey",
            "Turkmenistan", "Turks And Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
            "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Virgin Islands (British)",
            "Virgin Islands (U.S.)", "Wallis And Futuna Islands", "Western Sahara", "Yemen", "Zaire", "Zambia", "Zimbabwe", "Nước khác");
        $this->ocular->set_view_data('arrayCountry', $arrayCountry);

        $this->ocular->render('blank');
    }

    public function preview_resume() {

        if (($this->input->post('neworexperience'))) {
            $new = 1;
        } else {
            $new = 0;
        }
        if (($this->input->post('check-allow'))) {
            $allow = $this->input->post('check-allow');
        } else {
            $allow = 0;
        }
        $lang = $this->input->post('idLang');
        if ($lang == 1) {
            $this->lang->load('resume', 'en');
        } else if ($lang == 2) {
            $this->lang->load('resume', 'jp');
        } else if ($lang == 3) {
            $this->lang->load('resume', 'vn');
        } else {
            $this->lang->load('resume', 'en');
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
            $file_name = '';
            if (isset($_FILES['inputFile']['name'])) {
                $file_name = $_FILES['inputFile']['name'];
//chmod for folder
                chmod($nameFolder, 0777);
                $path_parts = pathinfo($file_name);
                $extension = @$path_parts['extension'];

                if ($_FILES['inputFile']['size'] <= '1048576') {
                    if (in_array($extension, unserialize(FILE_UPLOAD_IMAGE_EXTENSIONS))) {
                        $uploadfile = $nameFolder . $file_name;

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
                $file_name = $this->input->post('name_photo');
                $uploadCV = true;
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

            $linkFile = FCPATH . "uploads/" . $emailUser . "/" . $file_name;
            $dataToStore = array(
                'name_of_resume' => trim($this->input->post('nameresume')),
                'language_id' => $this->input->post('idLang'),
                'allow_find' => $allow,
                'name' => trim($this->input->post('name')),
                'photo' => "uploads/" . $emailUser . "/" . $file_name,
                'name_photo' => $file_name,
                "email" => trim($this->_userInfo->email),
                "email_resume" => trim($this->input->post('email')),
                "phone" => $this->input->post('phone'),
                "birthday" => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'marital_status' => $this->input->post('material'),
                "nationality" => $this->input->post('nationality'),
                "address" => trim($this->input->post('address')),
                'province_city' => $this->input->post('province'),
                "country" => $this->input->post('country'),
                "district" => $this->input->post('district'),
                "total_years" => trim($this->input->post('totalyears')),
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
                "other_skills" => trim($this->input->post('otherskills')),
                "edu-hightest" => $this->input->post('eduhightest'),
                "edu-sub" => $this->input->post('edusub'),
                "edu-school" => $this->input->post('eduschool'),
                "edu-quan" => $this->input->post('eduquan'),
                "edu-fmonth" => $this->input->post('edufmonth'),
                "edu-tmonth" => $this->input->post('edutmonth'),
                'edu-achi' => $this->input->post('eduachi'),
                "expected_position" => $this->input->post('expos'),
                "expected_location" => $this->input->post('exloc'),
                "expected_salary_from" => $this->input->post('salaryfrom'),
                "expected_salary_to" => $this->input->post('salaryto'),
                "expected_job_level" => $this->input->post('exlv'),
                "expected_job_cate" => $this->input->post('excate'),
                'introduce_yourself' => trim($this->input->post('pfintro')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );


            $checkId = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

            if (isset($checkId['id'])) {

                $dataToUpdate = array(
                    'name_of_resume' => trim($this->input->post('nameresume')),
                    'language_id' => $this->input->post('idLang'),
                    'name' => trim($this->input->post('name')),
                    'allow_find' => $allow,
                    'photo' => "uploads/" . $emailUser . "/" . $file_name,
                    'name_photo' => trim($file_name),
                    "email" => trim($this->_userInfo->email),
                    "email_resume" => trim($this->input->post('email')),
                    "phone" => $this->input->post('phone'),
                    "birthday" => $this->input->post('birthday'),
                    'gender' => $this->input->post('gender'),
                    'marital_status' => $this->input->post('material'),
                    "nationality" => $this->input->post('nationality'),
                    "address" => trim($this->input->post('address')),
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
                    'edu-achi' => trim($this->input->post('eduachi')),
                    "expected_position" => $this->input->post('expos'),
                    "expected_location" => $this->input->post('exloc'),
                    "expected_salary_from" => $this->input->post('salaryfrom'),
                    "expected_salary_to" => $this->input->post('salaryto'),
                    "expected_job_level" => $this->input->post('exlv'),
                    "expected_job_cate" => $this->input->post('excate'),
                    'introduce_yourself' => trim($this->input->post('pfintro')),
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
            'company_name' => trim($this->input->post('companyname1')),
            'industry' => $this->input->post('industry1'),
            "position" => $this->input->post('positioncompany1'),
            "job_category" => $this->input->post('jobcate1'),
            "job_level" => $this->input->post('joblevelcom1'),
            "manage_exp" => $this->input->post('numbermember1'),
            'japanese_company' => $this->input->post('japanesecom1'),
            'company_size' => $this->input->post('numberemployee1'),
            "from_month" => $this->input->post('fmonth1'),
            "to_month" => $this->input->post('tmonth1'),
            "detail_information" => trim($this->input->post('dinfor1')),
            'actflg' => 1,
            "createdate" => date("Y-m-d H:i:s"),
            "updatedate" => date("Y-m-d H:i:s")
        );
        $this->resumes_online_model->insertInformationCompany($company1);

        if (trim($this->input->post('companyname2')) != '') {
            $company2 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => trim($this->input->post('companyname2')),
                'industry' => $this->input->post('industry2'),
                "position" => $this->input->post('positioncompany2'),
                "job_category" => $this->input->post('jobcate2'),
                "job_level" => $this->input->post('joblevelcom2'),
                "manage_exp" => $this->input->post('numbermember2'),
                'japanese_company' => $this->input->post('japanesecom2'),
                'company_size' => $this->input->post('numberemployee2'),
                "from_month" => $this->input->post('fmonth2'),
                "to_month" => $this->input->post('tmonth2'),
                "detail_information" => trim($this->input->post('dinfor2')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company2);
        }
        if (trim($this->input->post('companyname3')) != '') {
            $company3 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => trim($this->input->post('companyname3')),
                'industry' => $this->input->post('industry3'),
                "position" => $this->input->post('positioncompany3'),
                "job_category" => $this->input->post('jobcate3'),
                "job_level" => $this->input->post('joblevelcom3'),
                "manage_exp" => $this->input->post('numbermember3'),
                'japanese_company' => $this->input->post('japanesecom3'),
                'company_size' => $this->input->post('numberemployee3'),
                "from_month" => $this->input->post('fmonth3'),
                "to_month" => $this->input->post('tmonth3'),
                "detail_information" => trim($this->input->post('dinfor3')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company3);
        }
        if (trim($this->input->post('companyname4')) != '') {
            $company4 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => trim($this->input->post('companyname4')),
                'industry' => $this->input->post('industry4'),
                "position" => $this->input->post('positioncompany4'),
                "job_category" => $this->input->post('jobcate4'),
                "job_level" => $this->input->post('joblevelcom4'),
                "manage_exp" => $this->input->post('numbermember4'),
                'japanese_company' => $this->input->post('japanesecom4'),
                'company_size' => $this->input->post('numberemployee4'),
                "from_month" => $this->input->post('fmonth4'),
                "to_month" => $this->input->post('tmonth4'),
                "detail_information" => trim($this->input->post('dinfor4')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company4);
        }
        if (trim($this->input->post('companyname5')) != '') {
            $company5 = array(
                'resume_id' => $checkIdNew['id'],
                'company_name' => trim($this->input->post('companyname5')),
                'industry' => $this->input->post('industry5'),
                "position" => $this->input->post('positioncompany5'),
                "job_category" => $this->input->post('jobcate5'),
                "job_level" => $this->input->post('joblevelcom5'),
                "manage_exp" => $this->input->post('numbermember5'),
                'japanese_company' => $this->input->post('japanesecom5'),
                'company_size' => $this->input->post('numberemployee5'),
                "from_month" => $this->input->post('fmonth5'),
                "to_month" => $this->input->post('tmonth5'),
                "detail_information" => trim($this->input->post('dinfor5')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertInformationCompany($company5);
        }
        //---EXP
        $this->resumes_online_model->deleteExpResumes($checkIdNew['id']);
        if (trim($this->input->post('jobcatsum1')) != '') {
            $exp1 = array(
                'resume_id' => $checkIdNew['id'],
                'job_category_name' => trim($this->input->post('jobcatsum1')),
                'years' => trim($this->input->post('jobcatyear1')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertExpResumeOnline($exp1);
        }
        if (trim($this->input->post('jobcatsum2')) != '') {
            $exp2 = array(
                'resume_id' => $checkIdNew['id'],
                'job_category_name' => trim($this->input->post('jobcatsum2')),
                'years' => trim($this->input->post('jobcatyear2')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertExpResumeOnline($exp2);
        }
        if (trim($this->input->post('jobcatsum3')) != '') {
            $exp3 = array(
                'resume_id' => $checkIdNew['id'],
                'job_category_name' => trim($this->input->post('jobcatsum3')),
                'years' => trim($this->input->post('jobcatyear3')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertExpResumeOnline($exp3);
        }
        if (trim($this->input->post('jobcatsum4')) != '') {
            $exp4 = array(
                'resume_id' => $checkIdNew['id'],
                'job_category_name' => trim($this->input->post('jobcatsum4')),
                'years' => trim($this->input->post('jobcatyear4')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertExpResumeOnline($exp4);
        }
        if (trim($this->input->post('jobcatsum5')) != '') {
            $exp5 = array(
                'resume_id' => $checkIdNew['id'],
                'job_category_name' => trim($this->input->post('jobcatsum5')),
                'years' => trim($this->input->post('jobcatyear5')),
                'actflg' => 1,
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );
            $this->resumes_online_model->insertExpResumeOnline($exp5);
        }
//----end upload file to server-------------------------------
//generate file DOC


        $inforOResume = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

        if (isset($inforOResume['id'])) {
            $inforCom = $this->resumes_online_model->getAllCompany($inforOResume['id']);
        }

        $this->load->library('word');
        $document = new \PhpOffice\PhpWord\TemplateProcessor(FCPATH . "docx/JPW" . count($inforCom) . ".docx");

        /*    $this->load->library('word');
          if ($this->input->post('idLang') == 1) {
          $document = new \PhpOffice\PhpWord\TemplateProcessor(FCPATH . "docx/JPW_EN.docx");
          } else if ($this->input->post('idLang') == 2) {
          $document = new \PhpOffice\PhpWord\TemplateProcessor(FCPATH . "docx/JPW_JP.docx");
          } else if ($this->input->post('idLang') == 3) {
          $document = new \PhpOffice\PhpWord\TemplateProcessor(FCPATH . "docx/JPW_VN.docx");
          } else {
          $document = new \PhpOffice\PhpWord\TemplateProcessor(FCPATH . "docx/JPW_EN.docx");
          }

         */
        $document->setImageValue('image1.png', "uploads/" . $emailUser . "/" . $file_name);





        //title all cV
        //
          //title
        $document->setValue('tLangLeft', $this->lang->line("language_skill"));
        $document->setValue('tOtherLeft', $this->lang->line("other_skill"));
        $document->setValue('tEduLeft', $this->lang->line("education"));
        $document->setValue('tProLeft', $this->lang->line("profile"));
        $document->setValue('tExpecLeft', $this->lang->line("expectation"));
        $document->setValue('tExpLeft', $this->lang->line("experience"));

//INFORMATION CV
        $document->setValue('NameResume', trim($this->input->post('nameresume')));

        //title
        $document->setValue('tNameUser', $this->lang->line("name"));
        $document->setValue('tBirthday', $this->lang->line("birthday"));
        $document->setValue('tNationality', $this->lang->line("national"));
        $document->setValue('tSex', $this->lang->line("gender"));
        $document->setValue('tEmail', $this->lang->line("email"));
        $document->setValue('tPhone', $this->lang->line("phone"));
        $document->setValue('tAddress', $this->lang->line("address"));
        //infor
        $document->setValue('NameUser', trim($this->input->post('name')));
        $document->setValue('Nationality', trim($this->input->post('nationality')));
        $document->setValue('Birthday', trim($this->input->post('birthday')));
        $document->setValue('Sex', trim($this->input->post('gender')));
        $document->setValue('Nation', trim($this->input->post('country')));
        $document->setValue('Address', trim($this->input->post('address')));
        $document->setValue('District', $this->checktext($lang, trim($this->input->post('district'))));
        $document->setValue('Province', trim($this->input->post('province')));
        $document->setValue('Phone', trim($this->input->post('phone')));
        $document->setValue('Email', trim($this->input->post('email')));


        //summary of your career
        $document->setValue('tSummary', $this->lang->line("exp_job"));
        $document->setValue('ttotalyears', $this->lang->line("total_years"));
        $document->setValue('totalyears', trim($this->input->post('totalyears')));

        if (trim($this->input->post('jobcatsum1') == "")) {
            $document->setValue('tExpJob1', "");
            $document->setValue('ExpJob1', "");
        } else {
            $document->setValue('tExpJob1', $this->lang->line("exp_job") . " 1");
            $document->setValue('ExpJob1', $this->input->post('jobcatsum1') . " - " . $this->input->post('jobcatyear1') . " year(s)");
        }

        if (trim($this->input->post('jobcatsum2') == "")) {
            $document->setValue('tExpJob2', "");
            $document->setValue('ExpJob2', "");
        } else {
            $document->setValue('tExpJob2', $this->lang->line("exp_job") . " 2");
            $document->setValue('ExpJob2', $this->input->post('jobcatsum2') . " - " . $this->input->post('jobcatyear2') . " year(s)");
        }

        if (trim($this->input->post('jobcatsum3') == "")) {
            $document->setValue('tExpJob3', "");
            $document->setValue('ExpJob3', "");
        } else {
            $document->setValue('tExpJob3', $this->lang->line("exp_job") . " 3");
            $document->setValue('ExpJob3', $this->input->post('jobcatsum3') . " - " . $this->input->post('jobcatyear3') . " year(s)");
        }
        if (trim($this->input->post('jobcatsum4') == "")) {
            $document->setValue('tExpJob4', "");
            $document->setValue('ExpJob4', "");
        } else {
            $document->setValue('tExpJob4', $this->lang->line("exp_job") . " 4");
            $document->setValue('ExpJob4', $this->input->post('jobcatsum4') . " - " . $this->input->post('jobcatyear4') . " year(s)");
        }
        if (trim($this->input->post('jobcatsum5') == "")) {
            $document->setValue('tExpJob5', "");
            $document->setValue('ExpJob5', "");
        } else {
            $document->setValue('tExpJob5', $this->lang->line("exp_job") . " 5");
            $document->setValue('ExpJob5', $this->input->post('jobcatsum5') . " - " . $this->input->post('jobcatyear5') . " year(s)");
        }

//company1

        for ($i = 0; $i < count($inforCom); $i++) {
            $now = $i + 1;
            $document->setValue("tCompanyName", $this->lang->line("comp_name"));
            $document->setValue("tIsJapCompany", $this->lang->line("jp_com"));
            $document->setValue("tNumEmployee", $this->lang->line("company_size"));
            $document->setValue("tIndustry", $this->lang->line("industry"));
            $document->setValue("tJobCat", $this->lang->line("total_years"));
            $document->setValue("tPosition", $this->lang->line("position"));
            $document->setValue("tJobLevel", $this->lang->line("job_level"));
            $document->setValue("tNumMem", $this->lang->line("manage_exp"));
            $document->setValue("tFromMonth", $this->lang->line("from_month"));
            $document->setValue("tToMonth", $this->lang->line("to_month"));
            $document->setValue("tDetail", $this->lang->line("detail_infor"));

            $document->setValue("tCom" . $now, $this->lang->line("comp_name") . " " . $now);
            $document->setValue("CompanyName" . $now, trim($inforCom[$i]['company_name']));
            $document->setValue("Industry" . $now, $this->checktext($lang, $inforCom[$i]['industry']));
            $document->setValue("Position" . $now, $this->checktext($lang, $inforCom[$i]['position']));
            $document->setValue("JobCat" . $now, $this->checktext($lang, $inforCom[$i]['job_category']));
            $document->setValue("JobLevel" . $now, $this->checktext($lang, $inforCom[$i]['job_level']));
            $document->setValue("NumMem" . $now, $this->checktext($lang, $inforCom[$i]['company_size']));

            $document->setValue("IsJapCompany" . $now, $this->checktext($lang, $inforCom[$i]['japanese_company']));
            $document->setValue("NumEmployee" . $now, $this->checktext($lang, $inforCom[$i]['manage_exp']));
            $document->setValue("FromMonth" . $now, $this->checktext($lang, $inforCom[$i]['from_month']));
            $document->setValue("ToMonth" . $now, $this->checktext($lang, $inforCom[$i]['to_month']));
            $document->setValue("Detail" . $now, $this->checktext($lang, trim($inforCom[$i]['detail_information'])));
        }



//Education & Qualifications
//title
        $document->setValue('tHighestEducation', $this->checktext($lang, $this->lang->line("high_edu")));
        $document->setValue('tSubject', $this->lang->line("subject"));
        $document->setValue('tSchool', $this->lang->line("school"));
        $document->setValue('tFromMonthEdu', $this->lang->line("edu_from_month"));
        $document->setValue('tToMonthEdu', $this->lang->line("edu_to_month"));
        $document->setValue('tQualification', $this->lang->line("quallification"));
        $document->setValue('tAchievements', $this->lang->line("archievement"));
        //value
        $document->setValue('HighestEducation', $this->input->post('eduhightest'));
        $document->setValue('Subject', trim($this->input->post('edusub')));
        $document->setValue('School', trim($this->input->post('eduschool')));
        $document->setValue('FromMonthEdu', $this->input->post('edufmonth'));
        $document->setValue('ToMonthEdu', $this->input->post('edutmonth'));
        $document->setValue('Qualification', $this->input->post('eduquan'));
        $document->setValue('Achievements', trim($this->input->post('eduachi')));

//Profile / Objective
        $document->setValue('Introduce', trim($this->input->post('pfintro')));

//Skills
        //title
        $document->setValue('tJapanese', $this->lang->line("lang_japanese"));
        $document->setValue('tEnglish', $this->lang->line("lang_english"));
        $document->setValue('tJpLevel', $this->lang->line("general_jp"));
        $document->setValue('tJpVerbal', $this->lang->line("verbal_com"));
        $document->setValue('tJpRead', $this->lang->line("read_write"));
        $document->setValue('tJpBusiness', $this->lang->line("business_mail"));
        $document->setValue('tJpMeeting', $this->lang->line("business_meeting"));
        $document->setValue('tJpUsing', $this->lang->line("exp_using"));
        $document->setValue('tJpStudy', $this->lang->line("exp_study"));
        $document->setValue('tJpWork', $this->lang->line("exp_work"));
        $document->setValue('tJpCompany', $this->lang->line("exp_work_jp"));
        $document->setValue('tJLPT', 'JLPT');

        $document->setValue('tEngLevel', $this->lang->line("genaral_en"));
        $document->setValue('tEnToeic', $this->lang->line("toeic"));
        $document->setValue('tEnWork', $this->lang->line("exp_en"));
        //value
        $document->setValue('JpLevel', $this->checktext($lang, $this->input->post('jplevel')));
        $document->setValue('JpVerbal', $this->checktext($lang, $this->input->post('jpverbal')));
        $document->setValue('JpRead', $this->checktext($lang, $this->input->post('jpread')));
        $document->setValue('JpBusiness', $this->checktext($lang, $this->input->post('jpbusiness')));
        $document->setValue('JpMeeting', $this->checktext($lang, $this->input->post('jpmeeting')));
        $document->setValue('JpUsing', $this->checktext($lang, $this->input->post('jpusing')));
        $document->setValue('JpStudy', $this->input->post('jpstudy'));
        $document->setValue('JpWork', $this->input->post('jpwork'));
        $document->setValue('JpCompany', $this->input->post('jpcompany'));
        $document->setValue('JLPT', $this->input->post('jpjlpt'));
        $document->setValue('EngLevel', $this->checktext($lang, $this->input->post('enlevel')));
        $document->setValue('EnToeic', $this->input->post('entoeic'));
        $document->setValue('EnWork', $this->input->post('enwork'));

        $document->setValue('Skills', trim($this->input->post('otherskills')));
//candidate's Expection
//title
        $document->setValue('tPosition', $this->lang->line('ex_pos'));
        $document->setValue('tJobLevel', $this->checktext($lang, $this->lang->line('ex_job_level')));
        $document->setValue('tPlace', $this->lang->line('ex_localtion'));
        $document->setValue('tJobCate', $this->lang->line('ex_job_cate'));
        $document->setValue('tFromSalary', $this->lang->line('edu_from_month'));
        $document->setValue('tToSalary', $this->lang->line('edu_to_month'));
        $document->setValue('tSalary', $this->lang->line('ex_salary'));
        //value
        $document->setValue('Position', $this->input->post('expos'));
        $document->setValue('JobLevel', $this->checktext($lang, $this->input->post('exlv')));
        $document->setValue('Place', $this->input->post('exloc'));
        $document->setValue('JobCate', $this->input->post('excate'));
        $document->setValue('FromSalary', $this->input->post('salaryfrom'));
        $document->setValue('ToSalary', $this->input->post('salaryto'));
        //END

        $new_str = utf8tourl(utf8convert($this->input->post('nameresume')));
        $nameResume = $new_str . '.docx';
        $document->saveAs(FCPATH . "uploads/" . $emailUser . "/" . $nameResume);

        $update = array(
            'linkresumeonline' => "uploads/" . $emailUser . "/" . $nameResume,
            'nameresumeonline' => $nameResume,
            'language_id' => $this->input->post('idLang'),
            'photo' => "uploads/" . $emailUser . "/" . $file_name,
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
                'photo' => "uploads/" . $emailUser . "/" . $file_name,
                'actflg' => 1,
                'language_id' => $this->input->post('idLang'),
                "createdate" => date("Y-m-d H:i:s"),
                "updatedate" => date("Y-m-d H:i:s")
            );

            $this->resumes_model->insertInformationCV($newRS);
        }


//   echo "https://view.officeapps.live.com/op/view.aspx?src=" . urlencode(base_url() . "uploads/" . $emailUser . "/" . $nameResume);
        echo "https://docs.google.com/gview?url=" . base_url() . "uploads/" . $emailUser . "/" . $nameResume . "&embedded = true";
//  redirect(site_url('account'));
    }

    public function edit() {

        if (($this->uri->segment(4)) == "get") {
            if (isset($_SERVER['HTTP_REFERER'])) {
                $link = $_SERVER['HTTP_REFERER'];
                $this->ocular->set_view_data('link', $link);
            }
        }

        if (($this->uri->segment(3)) == "vn") {
            $lang = 3;
            $this->lang->load('resume', 'vn');
        } else if (($this->uri->segment(3)) == "jp") {
            $lang = 2;
            $this->lang->load('resume', 'jp');
        } else if (($this->uri->segment(3)) == "en") {
            $lang = 1;
            $this->lang->load('resume', 'en');
        } else {
            $lang = 1;
            $this->lang->load('resume', 'en');
        }



// if logon
        if (isset($this->_userInfo->login_token)) {

        } else {
            redirect(site_url('login'));
        }
        $arrayCountry = array("Việt Nam", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica",
            "Antigua And Barbuda", "Argentina", "Armenia", "Aruba", "Úc", "Áo", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Bỉ",
            "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia And Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory",
            "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic",
            "Chad", "Chile", "Trung Quốc", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Cote D'Ivoire",
            "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
            "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "France, Metropolitan",
            "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland",
            "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard And Mc Donald Islands", "Honduras", "Hong Kong", "Hungary",
            "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
            "North Korea (People's Republic Of Korea)", "South Korea (Republic Of Korea)", "Kuwait", "Kyrgyzstan", "Lao People's Republic", "Latvia", "Lebanon",
            "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia",
            "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia",
            "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand",
            "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea",
            "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda",
            "Saint Kitts And Nevis", "Saint Lucia", "Saint Vincent And The Grenadines", "Samoa", "San Marino", "Sao Tome And Principe", "Saudi Arabia", "Senegal",
            "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia/South Sandwich Islands",
            "Spain", "Sri Lanka", "St Helena", "St Pierre and Miquelon", "Sudan", "Suriname", "Svalbard And Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland",
            "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad And Tobago", "Tunisia", "Turkey",
            "Turkmenistan", "Turks And Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
            "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Virgin Islands (British)",
            "Virgin Islands (U.S.)", "Wallis And Futuna Islands", "Western Sahara", "Yemen", "Zaire", "Zambia", "Zimbabwe", "Nước khác");
        $arrayDistrictHN = array("Ba Dinh", "Ba Vi", "Cau Giay", "Chuong My", "Dan Phuong", "Dong Anh",
            "Dong Da", "Gia Lam", "Ha Dong", "Hai Ba Trung", "Hoai Duc", "Hoan Kiem", "Hoang Mai", "Long Bien",
            "Me Linh", "My Duc", "Phu Xuyen", "Phuc Tho", "Quoc Oai", "Soc Son", "Son Tay", "Tay Ho", "Thach That", "Thanh Oai",
            "Thanh Tri", "Thanh Xuan", "Thuong Tin", "Tu Liem", "Ung Hoa");
        $arrayDistrictHCM = array("Quan 1", "Quan 10", "Quan 11", "Quan 12", "Quan 2", "Quan 4", "Quan 5", "Quan 6",
            "Quan 7", "Quan 8", "Quan 9", "Binh Chanh", "Binh Tan", "Binh Thanh", "Can Gio", "Cu Chi", "Go Vap", "Hoc Mon",
            "Nha Be", "Phu Nhuan", "Tan Binh", "Tan Phu", "Thu Duc"
        );
        $this->ocular->set_view_data('arrayCountry', $arrayCountry);
        $this->ocular->set_view_data("arrayDistrictHN", $arrayDistrictHN);
        $this->ocular->set_view_data("arrayDistrictHCM", $arrayDistrictHCM);
        $inforOResume = $this->resumes_online_model->getInformationResumeOnlineOfUser($this->_userInfo->email);

        if (isset($inforOResume['id'])) {




            $inforCom = $this->resumes_online_model->getAllCompany($inforOResume['id']);
            $inforExp = $this->resumes_online_model->getAllExpResume($inforOResume['id']);

            if (isset($inforCom)) {
                $this->ocular->set_view_data("inforCom", $inforCom);
            }
            if (isset($inforExp)) {
                $this->ocular->set_view_data("inforExp", $inforExp);
            }
            $this->ocular->set_view_data("inforOResume", $inforOResume);
        } else {
            redirect(site_url('account'));
        }
        $this->ocular->set_view_data('lang', $lang);
        $this->ocular->render('blank');
    }

    public function choosestate() {
        $country = $this->input->post('country');

        if ($country == "Việt Nam") {
            foreach ($this->_locations as $locId => $location) {

                echo '<option value="' . $location['lang_en'] . '" >' . $location['lang_en'] . '</option>';
            }
        } else {
            echo '<option value="Quốc tế">Quốc tế</option>';
        }
    }

    public function choosedistrict() {
        $lang = $this->input->post('lang');
        if ($lang == 3) {
            $this->lang->load('resume', 'vn');
        } else if ($lang == 2) {
            $this->lang->load('resume', 'jp');
        } else if ($lang == 1) {
            $this->lang->load('resume', 'en');
        } else {
            $this->lang->load('resume', 'en');
        }
        $arrayDistrictHN = array("Ba Dinh", "Ba Vi", "Cau Giay", "Chuong My", "Dan Phuong", "Dong Anh",
            "Dong Da", "Gia Lam", "Ha Dong", "Hai Ba Trung", "Hoai Duc", "Hoan Kiem", "Hoang Mai", "Long Bien",
            "Me Linh", "My Duc", "Phu Xuyen", "Phuc Tho", "Quoc Oai", "Soc Son", "Son Tay", "Tay Ho", "Thach That", "Thanh Oai",
            "Thanh Tri", "Thanh Xuan", "Thuong Tin", "Tu Liem", "Ung Hoa");
        $arrayDistrictHCM = array("Quan 1", "Quan 10", "Quan 11", "Quan 12", "Quan 2", "Quan 4", "Quan 5", "Quan 6",
            "Quan 7", "Quan 8", "Quan 9", "Binh Chanh", "Binh Tan", "Binh Thanh", "Can Gio", "Cu Chi", "Go Vap", "Hoc Mon",
            "Nha Be", "Phu Nhuan", "Tan Binh", "Tan Phu", "Thu Duc"
        );

        $province = $this->input->post('province');
        $country = $this->input->post('country');
        if ($province == "Ho Chi Minh") {
            foreach ($arrayDistrictHCM as $district) {
                echo '<option value="' . $district . '" >' . $district . '</option>';
            }
        } else if ($province == "Ha Noi") {
            foreach ($arrayDistrictHN as $district) {
                echo '<option value="' . $district . '" >' . $district . '</option>';
            }
        } else {
            if ($country == "Việt Nam") {
                echo '<option value="0" disabled>' . $this->lang->line('ph_select') . '</option>';
            } else {
                echo '<option value="Quốc tế" disabled>Quốc tế</option>';
            }
        }
    }

    public function checktext($lang, $text) {

        if ($lang == 3) {
            $this->lang->load('resume', 'vn');
        } else if ($lang == 2) {
            $this->lang->load('resume', 'jp');
        } else if ($lang == 1) {
            $this->lang->load('resume', 'en');
        } else {
            $this->lang->load('resume', 'en');
        }

        switch ($text) {
            case "NULL":
                return "N/A";
                break;
            case "0":
                return "N/A";
                break;
            case "Fluent":
                return $this->lang->line("ph_level_1");
                break;
            case "Advanced":
                return $this->lang->line("ph_level_2");
                break;
            case "Intermediate":
                return $this->lang->line("ph_level_3");
                break;
            case "Beginner":
                return $this->lang->line("ph_level_4");
                break;
            case "None":
                return $this->lang->line("ph_level_5");
                break;
            case "Very well experienced":
                return $this->lang->line("ph_exp_1");
                break;
            case "Experienced":
                return $this->lang->line("ph_exp_2");
                break;
            case "Some experience":
                return $this->lang->line("ph_exp_3");
                break;
            case "No experience":
                return $this->lang->line("ph_exp_4");
                break;

            case "New Grad/Entry Level/Internship":
                return $this->lang->line("ph_ex_1");
                break;
            case "Experienced (Non-Manager)":
                return $this->lang->line("ph_ex_2");
                break;
            case "Team Leader/Supervisor":
                return $this->lang->line("ph_ex_3");
                break;
            case "Manager":
                return $this->lang->line("ph_ex_4");
                break;
            case "Vice Director":
                return $this->lang->line("ph_ex_5");
                break;
            case "Director":
                return $this->lang->line("ph_ex_6");
                break;
            case "CEO":
                return $this->lang->line("ph_ex_7");
                break;
            case "Vice President":
                return $this->lang->line("ph_ex_8");
                break;
            case "President":
                return $this->lang->line("ph_ex_9");
                break;
            default:
                return $text;
        }
    }

    public function addexperience() {
        $lang = $this->input->post('lang');
        $x = $this->input->post('xvalue');

        if ($lang == 3) {
            $this->lang->load('resume', 'vn');
        } else if ($lang == 2) {
            $this->lang->load('resume', 'jp');
        } else if ($lang == 1) {
            $this->lang->load('resume', 'en');
        } else {
            $this->lang->load('resume', 'en');
        }
        echo '<div class="form-group">
                <label class="col-sm-2 control-label" for="name">' . $this->lang->line("exp_job") . " " . $x . '</label>
                <div class="col-sm-4">
                    <div class="edit-field">
                        <input type="text" value="" id="jobcatsum' . $x . '" name="jobcatsum' . $x . '" placeholder="' . $this->lang->line("ph_eg") . ' IT Software" class="form-control edit-control" hvkeyboarddefined="true">
                        <div class="has-error"></div></div></div>
                        <label class="col-sm-1 control-label">Years</label>
                        <div class="col-sm-2"><div class="edit-field">
                            <input type="text" value="" id="jobcatyear' . $x . '" name="jobcatyear' . $x . '" placeholder="' . $this->lang->line("ph_eg") . ' 7" class="form-control edit-control" hvkeyboarddefinced="true" />
                            <div class="has-error"></div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                    <button type="button" class="btn btn-default remove_field" aria-label="Left Align">
                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </button>
                    </div>
            </div>';
    }

    public function addompany() {
        $lang = $this->input->post('lang');
        $x = $this->input->post('xvalue');

        if ($lang == 3) {
            $this->lang->load('resume', 'vn');
        } else if ($lang == 2) {
            $this->lang->load('resume', 'jp');
        } else if ($lang == 1) {
            $this->lang->load('resume', 'en');
        } else {
            $this->lang->load('resume', 'en');
        }

        echo '<div class="company-' . $x . '">
            <div class="company-label">
                <span>' . $this->lang->line("company") . $x . '</span>
                    </div>
                     <div class="row">
                         <!-- company name  -->
                         <div class="form-group">
                             <label class="col-sm-2 control-label"><strong class="text-red"></strong>' . $this->lang->line("comp_name") . '</label>
                             <div class="col-sm-10">
                                 <div class="edit-field">
                                     <input type="text"  id="companyname' . $x . '" name="companyname' . $x . '" placeholder="' . $this->lang->line("ph_eg") . ' VietnamWorks" class="form-control edit-control">
                                </div>
                            </div>
                        </div>
        <!-- japanese company /company size -->
        <div class="form-group">
            <label class="col-sm-2 control-label"><strong class="text-red"></strong>' . $this->lang->line("jp_com") . '</label>

            <div class="col-sm-4">
                <div class="edit-field">
                    <label class="radio-inline" for="japanese_vs3">
                        <input class="edit-control" type="radio" name="japanesecom' . $x . '"  value="Yes"  id="japanesecom' . $x . '" >
                        ' . $this->lang->line("yes") . '
        </label>
        <label class = "radio-inline" for = "japanese_vs4">
        <input class = "edit-control" type = "radio" name = "japanesecom' . $x . '" value = "No" id = "japanesecom' . $x . '" >
        ' . $this->lang->line("no") . '
        </label>
        </div>
        </div>
        <label class="col-sm-2 control-label"> ' . $this->lang->line("company_size") . '</label>

        <div class="col-sm-4">
            <div class="edit-field">
                <select  class="form-control" id="numberemployee' . $x . '" name="numberemployee' . $x . '" placeholder="' . $this->lang->line("ph_select") . '">
                    <option value="0">' . $this->lang->line("ph_select") . '</option>
                    <option value="1-24">1-24</option>
                    <option value="25-99" >25-99</option>
                    <option value="100-499" >100-499</option>
                    <option value="500-999" >500-999</option>
                    <option value="1, 000-4, 999" >1,000-4,999</option>
                </select>
            </div>
        </div>
        </div>
        <!-- industry/job category -->
        <div class="form-group">
            <label class="col-sm-2 control-label">' . $this->lang->line("industry") . ' </label>

            <div class="col-sm-4">
                <div class="edit-field">
                    <input type="text" id="industry' . $x . '" name="industry' . $x . '" placeholder="e.g Computer" class="form-control edit-control">
                </div>
            </div>

            <label class="col-sm-2 control-label" >' . $this->lang->line("job_cate") . '   </label>

            <div class="col-sm-4">
                <div class="edit-field">
                    <input type="text" id="jobcate' . $x . '" name="jobcate' . $x . '" class="form-control show-month" placeholder=""' . $this->lang->line("ph_eg") . ' IT Software" >

        </div>
        </div>
        </div>
        <!--position / joblevel -->
        <div class = "form-group">
        <label class = "col-sm-2 control-label"><strong class = "text-red"></strong>' . $this->lang->line("position") . '</label>

        <div class = "col-sm-4">
        <div class = "edit-field">
        <input type = "text" id = "positioncompany' . $x . '" name = "positioncompany' . $x . '" placeholder = "' . $this->lang->line("ph_eg") . ' PHP Developer" class = "form-control edit-control">

        </div>
        </div>
        <label class = "col-sm-2 control-label">' . $this->lang->line("job_level") . ' </label>

        <div class = "col-sm-4">
        <div class = "edit-field">
        <select class = "form-control" id = "joblevelcom' . $x . '" name = "joblevelcom' . $x . '" placeholder = "' . $this->lang->line("ph_select") . '">
        <option value = "0">' . $this->lang->line("ph_select")
        . '</option>
        <option value = "New Grad/Entry Level/Internship">' . $this->lang->line("ph_ex_1") . '</option>
        <option value = "Experienced (Non-Manager)" >' . $this->lang->line("ph_ex_2") . '</option>
        <option value = "Team Leader/Supervisor" >' . $this->lang->line("ph_ex_3") . '</option>
        <option value = "Manager" >' . $this->lang->line("ph_ex_4") . '</option>
        <option value = "Vice Director" >' . $this->lang->line("ph_ex_5") . '</option>
        <option value = "Director">' . $this->lang->line("ph_ex_6") . '</option>
        <option value = "CEO" >' . $this->lang->line("ph_ex_7") . '</option>
        <option value = "Vice President" >' . $this->lang->line("ph_ex_8") . '</option>
        <option value = "President">' . $this->lang->line("ph_ex_9") . '</option>
        </select>

        </div>
        </div>

        </div>
        <!--manager ment exp -->
        <div class = "form-group">
        <label class = "col-sm-2 control-label" >' . $this->lang->line("manage_exp") . '</label>

        <div class = "col-sm-4">
        <div class = "edit-field">
        <select id = "numbermember' . $x . '" name = "numbermember' . $x . '" class = "form-control" placeholder = "' . $this->lang->line("ph_select") . '">
        <option value = "0">' . $this->lang->line("ph_select") . '</option>
        <option value = "None" >' . $this->lang->line("ph_level_5") . '</option>
        <option value = "1-5" >1-5</option>
        <option value = "6-10" >6-10</option>
        <option value = "11-20" >11-20</option>
        <option value = "20-30" >20-30</option>
        <option value = "more than 30">' . $this->lang->line("ph_more_than") . '</option>
        </select>
        </div>
        </div>


        </div>
        <!--from month / to month -->
        <div class = "form-group">
        <label class = "col-sm-2 control-label">' . $this->lang->line("from_month") . '</label>

        <div class = "col-sm-4">
        <div class = "edit-field fcom' . $x . '" id = "from-month1">
        <input type = "text" id = "fmonth' . $x . '" name = "fmonth' . $x . '" class = "form-control show-month" placeholder = "' . $this->lang->line("ph_eg") . ' 09/2008" >
        </div>
        </div>

        <label class = "col-sm-2 control-label">' . $this->lang->line("to_month") . '</label>

        <div class = "col-sm-4">
        <div class = "edit-field tcom' . $x . '" id = "from-month2">
        <input type = "text" id = "tmonth' . $x . '" name = "tmonth' . $x . '" class = "form-control show-month" placeholder = "' . $this->lang->line("ph_eg") . ' 09/2008" >
        </div>
        </div>
        </div>

        <div class = "form-group">
        <label class = "col-sm-2 control-label">' . $this->lang->line("detail_infor") . '</label>

        <div class = "col-sm-10">
        <div class = "edit-field">
        <textarea rows = "4" id = "dinfor' . $x . '" name = "dinfor' . $x . '" ></textarea>
        <em class = "gray-light dinfor2-counter"> 2000 ' . $this->lang->line("ph_char") . '</em>
        <div class = "has-error"></div>
        </div>
        </div>
        </div>
        </div>
        <div>';
    }

}
