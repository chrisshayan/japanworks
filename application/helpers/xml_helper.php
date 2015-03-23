<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Description  make xml to array
 * Author       CuongDM
 * Date         10/06/2014
 */

function xml2array($xml) {
    $obj = simplexml_load_string($xml); // Parse XML
    $array = json_decode(json_encode($obj), true); // Convert to array
    return $array;
}

/*
 * Description  get rss items
 * Author       CuongDM
 * Date         10/06/2014
 */

function getRssItems($rss) {
    $xml = file_get_contents($rss);
    $arrRss = xml2array($xml);
    if (isset($arrRss['channel']['item'])) {
        return $arrRss['channel']['item'];
    }

    return "";
}
