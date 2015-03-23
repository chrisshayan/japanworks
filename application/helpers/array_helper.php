<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Description  Sort array in array by column
 * Author       CuongDM
 * Date         10/06/2014
 */
function sortByColumn(&$arr, $col, $dir = SORT_ASC) {
    $sortCol = array();
    foreach ($arr as $key => $row) {
        $sortCol[$key] = $row[$col];
    }
    array_multisort($sortCol, $dir, $arr);
}
