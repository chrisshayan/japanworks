<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define("MAIN_SITE", "");
//define("API_LINK", '');
define("API_LINK", '');
define("ENVIRONMENT_REAL", false);
define("REPLACE_REAL_2STAGE", true); // convert real link to staging link
define("WEB_BASE", "");
define("MAILER_EMAIL", "");
define("MAILER_PASSWORD", "");
define("MAILER_SUBJECT", 'Resume from Japanwork for your Job posting');

define("SMTP_HOST", '127.0.0.1');
define("SMTP_PORT", 25);
define("SMTP_AUTH", false);
define("SMTP_AUTH_USER", 'no need');
define("SMTP_AUTH_PWD", 'no need');
define("SMTP_SECURE", '');  //"ssl" or "tls" 
define("SMTP_TIMEOUT", 30);
define("MAIL_CHARSET", 'UTF-8');
define("EMAIL_SENDER", '');
define("NAME_SENDER", 'JapanWorks');
