<?php
define("BASE_DIR", dirname(__FILE__));
define("PARENT_DIR", dirname(BASE_DIR));

require_once (BASE_DIR.'/helper.php');


define("SMTP_HOST",'127.0.0.1');
define("SMTP_PORT", 25);
define("SMTP_AUTH", false);
define("SMTP_AUTH_USER", 'japanworks');
define("SMTP_AUTH_PWD", 'mailjapanwork!23#');
define("SMTP_SECURE", '');  //"ssl" or "tls"
define("SMTP_TIMEOUT", 30);
define("MAIL_CHARSET", 'UTF-8');
define("EMAIL_SENDER", 'info@vietnamworks.com.vn');
define("NAME_SENDER", 'JapanWorks');



try{
	if(sendMail(EMAIL_SENDER, 'vfa.hienhq@gmail.com', "Your Subject", 'Test batch New(content)')){
		echo('<pre>');
		var_dump('OK');
		echo('</pre>');
	}else{
		echo('<pre>');
		var_dump('FAILE');
		echo('</pre>');
	}

}catch(Exception $e){
	echo("<pre>ERROR:<br/>");
	var_dump($e->getMessage());
	echo('</pre>');
}
?>
