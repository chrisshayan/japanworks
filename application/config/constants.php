<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require(APPPATH . 'config/environment.php');
/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */
/* ----login with fb--- */
define('SET_APPID_FB', '103048186693870');
define('SET_APPSECRET_FB', '2f95683c845d37b4b314a62e4c239426');
/* ----end login with fb--- */
define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

define("KEYWORD_DEDAULT", "JapanWorks");
define("KEYWORD_EDUCATION", "japanesebeginner");
define("KEYWORD_WORKINJAPAN", "workinjapan");
define("KEYWORD_JAPANESECLASS", "japaneseclass");
define("KEYWORD_OVER1000", "overthousand");
define("KEYWORD_HOME", "");
define("KEYWORD_N1LEVEL", "n01level");
define("KEYWORD_N2LEVEL", "n02level");
define("KEYWORD_N3LEVEL", "n03level");
define("TOOL_TIP", "Liên kết đến Vietnamworks (Japanworks là thành viên của Vietnamworks)");

define("API_SEARCH", API_LINK . '/jobs/search');
define("API_LOGIN", API_LINK . '/users/login');
define("API_LOGOUT", API_LINK . '/users/logout');
define("API_REGISTER", API_LINK . '/users/register');
define("API_REGISTER_WITHOUT_ACTIVE", API_LINK . '/users/registerWithoutConfirm');
define("API_GENERAL_CONFIGURATION", API_LINK . '/general/configuration');
define("API_JOB_DETAIL", API_LINK . '/jobs/view');
//API for stackExchange
define("API_QA_TOP", 'http://api.stackexchange.com/2.2/questions?pagesize=3&order=desc&sort=activity&site=japanese&filter=!2.U5Nh).9HhzDBRL(7ErW');
define("API_QA_MAIN", 'http://api.stackexchange.com/2.2/questions?page=%s&pagesize=15&order=desc&sort=creation&site=japanese&filter=!0RyosOcSYXuwx-ZN37ATREjPM');
define("API_TAG_RIGHT_COLUMN", 'http://api.stackexchange.com/2.2/tags?pagesize=10&order=desc&sort=popular&site=japanese');
define("API_QUESTION_DETAIL", 'http://api.stackexchange.com/2.2/questions/%s?order=desc&sort=activity&site=japanese&filter=!b0OfNJc3rGk7ae');
define("API_QUESTION_RELATED", 'http://api.stackexchange.com/2.2/questions/%s/related?pagesize=5&order=asc&sort=creation&site=japanese&filter=!Su916jcUUbJK3HhxTQ');
define("API_SEARCH_TAGS", 'http://api.stackexchange.com/2.2/search?page=%s&pagesize=15&order=desc&sort=creation&tagged=%s&site=japanese&filter=!)RAy)xLcz5iSlAez9FyfriwU');
define("API_TAGS_LIST", 'http://api.stackexchange.com/2.2/tags?page=%s&pagesize=20&order=desc&sort=popular&site=japanese&filter=!*MM6iJi4t1uBt(nY');
define("API_GET_TAGS_FROM_SEARCH", 'http://api.stackexchange.com/2.2/tags?page=1&pagesize=20&order=desc&sort=activity%s&site=japanese&filter=!bCzphIT--x6c8A');
define("API_TAGS_RELATED", 'http://api.stackexchange.com/2.2/tags/%s/related?page=1&pagesize=5&site=japanese&filter=!*MM6iJi4t1uBt(nY');

define("KEY_QA", '&key=PBBTm9s)wKdrjIBH59SQ)g((');//'&key=Gaa2PRVMNpfNXRJ3y3Jufw((');
define("KEY_QA_REAL", '&key=PBBTm9s)wKdrjIBH59SQ)g((');
//API for event fb
//page link: https://www.facebook.com/JapanWorksFanpage
define("FB_PAGE_ID", '898251796868295');
define("FB_EVENT_ID", '863637123698092');
define("FB_APP_ID", '1603782736507519');
define("FB_SERCRET_ID", '3f829cc92aba7d21d9aaaccccef03996');

define("API_FB_GET_TOKEN", 'https://graph.facebook.com/oauth/access_token?client_id=1603782736507519&client_secret=3f829cc92aba7d21d9aaaccccef03996&grant_type=client_credentials');
define("API_FB_EVENT_LIST", 'https://graph.facebook.com/v2.2/%s/events?%s&fields=id,cover,location,name,description,end_time,privacy,start_time');

define("API_FB_EVENT_DETAIL_BY_ID", 'https://graph.facebook.com/863637123698092?access_token=130238587166862|csJ8HWaYS9OJTrR9fVihLKtcR3Y');
define("API_FB_EVENT_COVER_IMAGE", 'https://graph.facebook.com/v2.2/863637123698092/picture?access_token=130238587166862|csJ8HWaYS9OJTrR9fVihLKtcR3Y&redirect=0&type=large');
define("API_FB_EVENT_PHOTOS", 'https://graph.facebook.com/v2.2/863637123698092/photos?access_token=130238587166862|csJ8HWaYS9OJTrR9fVihLKtcR3Y');
//end api for event fb
//new version 2 10.12.2014
define("API_ACCOUNT_STATUS", API_LINK . '/users/account-status/email');
define("API_REQUEST_PASSWORD", API_LINK . '/users/request_password/user_email');
define("API_CHECK_LOGIN", API_LINK . '/users/login');
define("API_APPLY_ANOMYMOUS_ATTACH", API_LINK . '/jobs/applyAttach');
//Cuong.Chung
//31.03.2015
define("API_JOB_ALERT", API_LINK . '/users/create-jobalert');
//
//
define("API_HEADER_CONTENT", 'CONTENT-MD5: 8982065e30ea02cf02e93a83824cf65b7de1e69545ce8bed4f2bb3c98a862b70');
define("API_HEADER_TYPE", 'Content-Type: application/JSON');
define("API_HEADER_ACCEPT", 'Content-Type: application/JSON');
define("API_TIMEOUT", 36000);

define("LANGUAGES", serialize(array(
    "1" => array(
        "lang_vn" => "Việt Nam",
        "lang_en" => "Vietnamese"
    ),
    "2" => array(
        "lang_vn" => "Tiếng Anh",
        "lang_en" => "English"
    ),
    "3" => array(
        "lang_vn" => "Bất kỳ",
        "lang_en" => "Any"
    )
)));

define("TIME_CACHE_SEARCH_DATA", 604800); // 7 days
//mail setting
//Rakus setting
define("LIST_MAIL_BBC", serialize(array("morio@vietnamworks.com", "ly.ho@vietnamworks.com", "koji@vietnamworks.com"))); // mail BBC for real
define("LIST_MAIL_TO", serialize(array("longthailai@gmail.com", "vfa.cuongcl@gmail.com"))); // mail BBC for real
//define("LIST_MAIL_BBC", serialize(array("chunglieucuong@gmail.com", "yohmura@vitalify.jp", "morio@vietnamworks.com"))); //mail BBC for dev
define("JOB_ID_RAKUS", 1); // job id of rakus company
define("EMPLOYER_ID_RAKUS", 1); //  id of rakus company
define("SUBJECT_FOR_RAKUS_COMPANY", '【応募】%sへの応募がありました（Rakus様特別求人ページ'); // subject when send mail for company
define("SUBJECT_FOR_RAKUS_USER", 'Rakus Vietnam đã nhận được hồ sơ của '); // subject when send mail for user
// Log setting
define('ROOT_DIR', dirname(realpath(APPPATH)));
define("LOG_DIR", ROOT_DIR . '/logs/');
define("UPLOAD_DIR", ROOT_DIR . '/uploads/');
define("LOG_NAME", 'logInfo');
define("LOG_NAME_CSV", 'logCSV');
define("DISABLE_LOG_CSV", TRUE);
//file setting
define("UPLOAD_IMAGE_DIR", ROOT_DIR . '/uploads-image/');
define("FILE_UPLOAD_IMAGE_EXTENSIONS", serialize(array("jpg", "png", "jpeg", "gif")));
define("LIMIT_FILE_SIZE", '3072000'); // limit file upload
define("LIMIT_FILE_SIZE_FOR_JOBS", '524288'); // limit file upload

define("FILE_UPLOAD_EXTENSIONS", serialize(array("doc", "pdf", "docx")));
define("FILE_CHECK_TYPE_EXTENSIONS", serialize(array("text/plain", "text/html", "application/zip", "application/pdf", "application/msword", "application/rtf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document")));

//Mulodo config
define("MULODO_JOB_ID", 3);
define("LIST_MAIL_MULODO_TO", serialize(array("shimoura@mulodo.com", "le.diep@mulodo.com", "duong.quynh@mulodo.com", "lam.dung@mulodo.com")));
define("LIST_MAIL_MULODO_BCC", serialize(array("morio@vietnamworks.com", "tu.phan@vietnamworks.com", "koji@vietnamworks.com", "chau.tran@vietnamworks.com")));
//evolable config
define("JOB_ID_EVA", 4); //  id of evolable company
define("LIST_MAIL_TO_EVA", serialize(array("jobs@evolable.asia"))); //mail TO for Evolable
define("LIST_MAIL_BBC_EVA", serialize(array("ly.ho@vietnamworks.com", "morio@vietnamworks.com", "koji@vietnamworks.com", "tu.phan@vietnamworks.com"))); //mail BBC for Evolable
define("SUBJECT_FOR_EVA_COMPANY", '【応募】Japanese BSEへの応募がありました（EVOLABLE ASIA様特別求人ページ）'); // subject when send mail for company
define("SUBJECT_FOR_EVA_USER", 'EVOLABLE ASIA đã nhận được hồ sơ của '); // subject when send mail for user
//mmax config
define("JOB_ID_MMAX", 5); //  id of mmax company
define("LIST_MAIL_TO_MMAX", serialize(array("yohmura@vitalify.jp"))); //mail TO for mmax company
define("LIST_MAIL_BBC_MMAX", serialize(array("lieucuong2505@gmail.com", "longthailai@gmail.com"))); //mail BBC for mmax company
define("SUBJECT_FOR_MMAX_COMPANY", '【応募】%sへの応募がありました ( media max japan (vietnam) co. ltd., 様特別求人ページ )'); // subject when send mail for company
define("SUBJECT_FOR_MMAX_USER", 'Media Max đã nhận được hồ sơ của '); // subject when send mail for user
//evolable v2 config
define("LIST_MAIL_TO_EVA_VER2", serialize(array("vfa.cuongcl@gmail.com"))); //mail TO for Evolable
define("LIST_MAIL_BBC_EVA_VER2", serialize(array("vfa.cuongcl@gmail.com"))); //mail BBC for Evolable
define("SUBJECT_FOR_EVA_VER2_COMPANY", '【応募】%sへの応募がありました ( EVOLABLE ASIA Co., Ltd 様特別求人ページ )'); // subject when send mail for company
define("SUBJECT_FOR_EVA_VER2_USER", 'EVOLABLE ASIA Co., Ltd đã nhận được hồ sơ của '); // subject when send mail for user

//vitalify config
define("JOB_ID_VF", 6); //  id of vitalify company
define("LIST_MAIL_TO_VF", serialize(array("ytsuchiya@vitalify.jp"))); //mail TO for vitalify company
define("LIST_MAIL_BBC_VF", serialize(array("vfa.cuongcl@gmail.com","longthailai@gmail.com","morio@vietnamworks.com", "my.vo@vietnamworks.com"))); //mail BBC for vitalify company
define("SUBJECT_FOR_VF_COMPANY", '【応募】%sへの応募がありました ( Vitalify co. ltd., 様特別求人ページ )'); // subject when send mail for company
define("SUBJECT_FOR_VF_USER", 'Vitalify đã nhận được hồ sơ của '); // subject when send mail for user
//xalo config
define("LIST_MAIL_TO_XALO", serialize(array("vfa.cuongcl@gmail.com"))); //mail TO for xalo company
define("LIST_MAIL_BBC_XALO", serialize(array("vfa.cuongcl@gmail.com"))); //mail BBC for xalo company
define("SUBJECT_FOR_XALO_COMPANY", 'Get discount from Xalolead'); // subject when send mail for company
define("SUBJECT_FOR_XALO_USER", 'Xalo đã nhận được hồ sơ của '); // subject when send mail for user
//config email for qa forum
define("EMAIL_OF_USER", 'morio@vietnamworks.com'); // subject email for qa forum
/* End of file constants.php */
/* Location: ./application/config/constants.php */
