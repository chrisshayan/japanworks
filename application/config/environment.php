<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define("MAIN_SITE", "http://staging.vietnamworks.com");
//define("API_LINK", 'https://api.vietnamworks.com');
define("API_LINK", 'https://api-staging.vietnamworks.com');
define("ENVIRONMENT_REAL", false);
define("REPLACE_REAL_2STAGE", true); // convert real link to staging link
define("WEB_BASE", "");
define("MAILER_EMAIL", "japan.vietnamworks.vn@gmail.com");
define("MAILER_PASSWORD", "Japanworks!23$");
define("MAILER_SUBJECT", 'Resume from Japanwork for your Job posting');

define("SMTP_HOST", '127.0.0.1');
define("SMTP_PORT", 25);
define("SMTP_AUTH", false);
define("SMTP_AUTH_USER", 'no need');
define("SMTP_AUTH_PWD", 'no need');
define("SMTP_SECURE", '');  //"ssl" or "tls" 
define("SMTP_TIMEOUT", 30);
define("MAIL_CHARSET", 'UTF-8');
define("EMAIL_SENDER", 'info@vietnamworks.com.vn');
define("NAME_SENDER", 'JapanWorks');
