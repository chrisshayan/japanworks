<?php

function dump($var, $isExit = false) {
    echo('<pre>');
    var_dump($var);
    echo('</pre>');
    if ($isExit) {
        exit;
    }
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

function writeLogCSV($data, $check) {

    $dir = LOG_DIR;
    $filename = $dir . LOG_NAME_CSV;

    if (DISABLE_LOG_CSV == TRUE) {

        ob_start();
        chmod($filename . '.csv', 0777);
        $fp = fopen($filename . '.csv', 'a');
        if ($check == 1) {
            fputcsv($fp, array("ID", "Time", "Job ID", "Company Name", "User Status", "User Email"));
        }
        //import
        fputcsv($fp, ($data));
        ob_end_clean();
        fclose($fp);
    }
}

?>