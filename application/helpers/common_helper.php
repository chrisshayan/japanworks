<?php

function dump($var, $isExit = false) {
    echo('<pre>');
    var_dump($var);
    echo('</pre>');
    if ($isExit) {
        exit;
    }
}

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function writeLog($data, $file_name = '') {
    $dir = LOG_DIR;
    $filename = $dir . LOG_NAME;
    if ($file_name != '') {
        $filename = $dir . $file_name;
    }

    ob_start();
    print_r($data);
    $out1 = ob_get_contents();
    file_put_contents("{$filename}", "{$out1}\n", FILE_APPEND | LOCK_EX);
    chmod("{$filename}", 0777);

    ob_end_clean();
}

function utf8convert($str) {
    if (!$str)
        return false;
    $utf8 = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($utf8 as $ascii => $uni)
        $str = preg_replace("/($uni)/i", $ascii, $str);
    return $str;
}

function utf8tourl($text) {
    $text = strtolower(utf8convert($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----", "-", $text);
    $text = str_replace("---", "-", $text);
    $text = str_replace("--", "-", $text);
    return $text;
}

function writeLogCSV($data, $check) {

    $dir = LOG_DIR;
    $filename = $dir . LOG_NAME_CSV;

    if (DISABLE_LOG_CSV == TRUE) {

        ob_start();
        chmod($filename . '.csv', 0777);
        $fp = fopen($filename . '.csv', 'a');
        if ($check == 1) {
            fputcsv($fp, array("ID", "Time", "Job ID", "Company Name", "User Status", "User Email", "Type"));
        }
        //import
        fputcsv($fp, ($data));
        ob_end_clean();
        fclose($fp);
    }
}

?>