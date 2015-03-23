<?php
    function sendMail( $from='', $to='', $subject='', $body='', $from_name=NAME_SENDER, $strCharset=MAIL_CHARSET, $attachment='' )
	{
		require_once 'libraries/mail/phpmailer.class.php';
		/* 		Modify St 2012/07/25 #19274 TuaLM		*/
		$host                      	= SMTP_HOST;
		/* 		Modify Ed 2012/07/25 #19274 TuaLM		*/
	    $port                       = defined('SMTP_PORT') ? SMTP_PORT : 25;
	    $phpmailer                  = new PHPMailer();
	    $phpmailer->Subject         = $subject;
	    $phpmailer->Body            = $body;
	    $phpmailer->From            = $from;
	    $phpmailer->FromName        = $from_name;
	    $phpmailer->AddAddress( $to );
	    $phpmailer->Host            = $host;
	    $phpmailer->Port            = $port;
	    $phpmailer->CharSet            = $strCharset;
		if($attachment != ''){
	    	$fn = explode('/', $attachment);
	    	$phpmailer->AddAttachment($attachment, $fn[count($fn)-1]);
	    }

	    $phpmailer->SMTPAuth		= defined('SMTP_AUTH') ? SMTP_AUTH : false;
	    $phpmailer->Username		= defined('SMTP_AUTH_USER') ? SMTP_AUTH_USER : '';
	    $phpmailer->Password		= defined('SMTP_AUTH_PWD') ? SMTP_AUTH_PWD : '';
	    $phpmailer->SMTPSecure		= defined('SMTP_SECURE') ? SMTP_SECURE : '';
	    $phpmailer->Timeout			= defined('SMTP_TIMEOUT') ? SMTP_TIMEOUT : '';

	    if(SMTP_AUTH){
	        $phpmailer->IsSMTP();
	    }else
	        $phpmailer->IsMail();

	    $phpmailer->IsHTML(false);
	    $phpmailer->EncodeString('base64');
	    $ret = $phpmailer->send();

	    return $ret;
	}

	function testMail(){
		try{
			$nick_name = 'tainguyen';
			$mail_address = 'longthailai@gmail.com';
			require_once(MAIL_TEMPLATE_DIR."schedule_alert.tpl");
			$mail_body2 =  str_replace('[nick_name]',$nick_name , $mail_body);
			$mail_body2 =  str_replace('[content]', 'mailtest 1', $mail_body2);
			$mail_body2 =  str_replace('[mail_address]', $mail_address, $mail_body2);

			$flag = $this->sendMail(EMAIL_SENDER, $mail_address, $mail_subject, $mail_body2);
		}
		catch(Exception $ex)
		{
			echo('<pre>');
			var_dump("Error: ".$ex->getMessage());
			echo('</pre>');
		}
	}
	function send_message_scheduleAlert($gateway, $ckpem, $passphrase, $data)
	{
		//ID: register@vitalify.asia
		//Pass: @Vf123456@
		// Put your device token here (without spaces):
		//$deviceToken = '75db6d85ab5e7a7311958b7ac21e87c8a3a08a499a65201c904205c832313ba7';
			try{
			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', $ckpem);
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

			// Open a connection to the APNS server
			$fp = stream_socket_client(
				$gateway, $err,
				$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

			if (!$fp)
				return "Failed to connect: $gateway $err $errstr" . PHP_EOL;

			/*Add Start tai.nguyen #19542 09.08.2012 */
			$res = "No schedule to push.";
			/*Add End tai.nguyen #19542 09.08.2012 */
			// Create the payload body
			foreach($data as $num_push)
			{
				// Put your alert message here:
				$deviceToken = trim($num_push['device_token']);
				if($deviceToken != "")
				{
					$message = trim($num_push['message']);
					$body['aps'] = array(
						'alert' => $message,
						'sound' => 'default',
						);
					// Encode the payload as JSON
					$payload = json_encode($body);
					// maximum 256 bytes
					//echo "Length of payload:".strlen($payload) . PHP_EOL;

					// Build the binary notification
					$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
					// Send it to the server
					$result = fwrite($fp, $msg, strlen($msg));
					if (!$result){
						$res = 'Message not delivered' . PHP_EOL;
						$dataLog = $res." device_token : ".$deviceToken." ; message : ".$message." !!!!!!!!! \n\t";
						writelog($dataLog, LOG_DIR, date('d-m-Y')."_schedule_alert.log.txt");
					}
					else{
						 $ret = 'Message successfully delivered' . PHP_EOL;
						 $res = 1;
						 $dataLog = $res." device_token : ".$deviceToken." ; message : ".$message." !!!!!!!!! \n\t";
						writelog($dataLog, LOG_DIR, date('d-m-Y')."_schedule_alert.log.txt");
					}
				}
			}
			return $res;
 			// Close the connection to the server`
			 fclose($fp);

		}catch(Exception $ex){
			return false;
		}
		return false;
	}
 	function writelog($data, $dir = '', $file_name = '') {
		if(IS_ALLOW_LOG){
		    if ($dir == '') {
		        $dir = LOG_DIR;
		        $filename = $dir . date('Ymd'). '-' . 'log.txt';
		        if ($file_name != '') {
		            $filename = $dir . $file_name;
		        }
		    } else {
		        $filename = $dir . date('Ymd'). '-' . 'log.txt';
		        if ($file_name != '') {
		            $filename = $dir . $file_name;
		        }
		        if ( ! file_exists( $filename ) ) {//file ko ton tai
		            $info = pathinfo($filename);
		            umask(0);
		            @mkdir($info['dirname'], 0777, true);
		        }
		    }

		    ob_start();
		    print_r($data);
		    $out1 = ob_get_contents();
		    file_put_contents("{$filename}", "{$out1}\n", FILE_APPEND | LOCK_EX);
		    chmod("{$filename}", 0777);

		    ob_end_clean();
		}
	}
	/* 		Add St 2012/08/22 #push notice android TuaLM		*/
	/*
	 * Author				TuanLM
	 * Description			Push notification android
	 * Date					16/08/2012
	 */
	function android_push($datas)
	{
		$log_name = date('dmY').'_push_notice_android.log';
		try{
			if(count($datas) <= 0 && $message == ''){
				writelog("Push error : data empty", $log_name);
				return false;
			}else{
				foreach($datas as $data){
					//if not exist registration id then return false
					if($data["device_token_android"] != '' && $data["message"] != '')
					{
						// Replace with real server API key from Google APIs
						$apiKey = GOOGLE_API_KEY;
						// Set POST variables
						$url = 'https://android.googleapis.com/gcm/send';
						$headers = array(
							'Authorization: key=' . $apiKey,
							'Content-Type: application/json'
						);
						// Open connection
						$ch = curl_init();
						$fields = array(
							'registration_ids' => array($data["device_token_android"]),
							'data' => array("message" => $data["message"])
						);
						// Set the url, number of POST vars, POST data
						curl_setopt( $ch, CURLOPT_URL, $url );
						curl_setopt( $ch, CURLOPT_POST, true );
						curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
						//curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						//     curl_setopt($ch, CURLOPT_POST, true);
						//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ));
						// Execute post
						$result = curl_exec($ch);
						writelog($result, $log_name);
						// Close connection
						curl_close($ch);
					}
				}
			}
		}catch(Exception $ex){
			writelog($ex->getMessage(), $log_name);
			return false;
		}
	}
	/* 		Add Ed 2012/08/22 #push notice android TuaLM		*/
?>
