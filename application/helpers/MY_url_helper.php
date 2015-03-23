<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function setLinkVNWorks($link) {
    if (REPLACE_REAL_2STAGE) {
        $link = str_replace('vietnamworks.com', 'staging.vietnamworks.com', $link);
    }
    return $link;
}

function site_url_ex($uri = '', $parameters = array()) {
    $url = site_url($uri);
    if (count($parameters) > 0) {
        $tmp = '';
        $i = 0;
        foreach ($parameters as $k => $v) {
            if (strpos($url, '?') == FALSE) {
                $tmp .= '?' . $k . '=' . $v;
            } else {
                if (ENVIRONMENT == 'production') {
                    $tmp .= urlencode('&') . $k . '=' . $v;
                } else {
                    $tmp .= ('&') . $k . '=' . $v;
                }
            }
            $i++;
        }
        $url .= $tmp;
    }
    $CI = & get_instance();
    if (@$CI->_access_token) {
        return $url . "&access_token=" . $CI->_access_token;
    } else {
        return $url;
    }
}

function site_url_redirect($uri = '', $parameters = array()) {
    $url = site_url($uri);
    if (count($parameters) > 0) {
        $tmp = '';
        $i = 0;
        foreach ($parameters as $k => $v) {
            if (strpos($url, '?') == FALSE) {
                $tmp .= '?' . $k . '=' . $v;
            } else {
                // if (ENVIRONMENT == 'production') {
                //     $tmp .= urlencode('&'). $k. '='. $v;
                // } else {
                //     $tmp .= ('&'). $k. '='. $v;
                // }
                $tmp .= ('&') . $k . '=' . $v;
            }
            $i++;
        }
        $url .= $tmp;
    }
    return $url;
}

function make_link($uri = '', $parameters = array(), $not_use = true) {
    $url = '';
    if (count($parameters) > 0) {
        $url = site_url_ex($uri, $parameters);
    } else {
        $url = site_url($uri);
    }

    if (ENVIRONMENT == 'production') {
        $url = '?url=' . $url;
    }

    return $url;
}

function make_link_ex($uri = '', $parameters = array()) {
    $url = '';
    if (count($parameters) > 0) {
        $url = site_url_hash($uri, $parameters);
    } else {
        $url = site_url($uri);
    }

    if (ENVIRONMENT == 'production') {
        $url = '?url=' . $url;
    }

    return $url;
}

function site_url_hash($uri = '', $parameters = array()) {
    if (count($parameters) > 0) {
        $tmp = '';
        $i = 0;
        foreach ($parameters as $k => $v) {
            if ($i == 0) {
                $tmp .= '?' . $k . '=' . $v;
            } else {
                $tmp .= urlencode('&') . $k . '=' . $v;
            }
            $i++;
        }
        $has_pos = strrpos($uri, '/');
        if ($has_pos && $has_pos == (strlen($uri) - 1)) {
            $uri = substr($uri, 0, strlen($uri) - 1);
        }
        $uri .= $tmp;

        $url = site_url($uri);
    }
    return $url;
}

//only for Tai.Nguyen
function link_form_ex($uri = '', $not_use = true) {
    $url = site_url($uri);
    if (!$not_use) {
        $url = str_replace("index.php/", "index.php?/", $url);
    }
    return $url;
}

/**
 * Remove special characters out of a string.
 * @param string $str
 * @param string $skip
 * @return string
 * @Author CuongDM
 */
function removeSpecialChars($str, $skip = '') {
    $specialChars = '!@#$%^&*()_\-+{}|:"\'<>?\[\]\\;,.\/*~`=';
    if ($skip) {
        $specialChars = preg_replace('/[' . $skip . ']/', '', $specialChars);
    }
    $str = preg_replace('/[' . $specialChars . ']+/', '', $str);
    return $str;
}

/**
 * Remove character with sign.
 * @param string $str
 * @return string
 * @Author CuongDM
 */
function removeSignChars($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
}

/**
 * Convert Strong to ID
 * @param string $str
 * @param string $skip
 * @return string
 * @Author CuongDM
 */
function str2id($str, $skip = '') {
    $str = removeSignChars($str);
    $str = removeSpecialChars($str, $skip . '_');
    $str = preg_replace('/[\s_]+/', '_', $str);
    return trim($str, '_');
}

/**
 * Convert String to Alias
 * @param string $str
 * @param string $skip
 * @return string
 * @Author CuongDM
 */
function str2alias($str, $signChar = true, $skip = '-_') {
    if ($signChar)
        $str = removeSignChars($str);
    $str = removeSpecialChars($str, $skip);
    $str = preg_replace('/[\s\-]+/', '-', strtolower($str));
    return trim($str, '-');
}

/**
 * Convert an Alias back to String
 * @param string $alias
 * @param boolean $ucwords
 * @return string
 */
function alias2str($alias, $ucwords = true) {
    $alias = str_replace('-', ' ', $alias);
    $alias = str_replace('/', ' - ', trim($alias, '/'));
    return ($ucwords) ? ucwords($alias) : $alias;
}

/**
 * Convert String to Alias has id of object
 * @param string $str
 * @param string $skip
 * @return string
 * @Author CuongDM
 */
function aliasHasId($id, $str) {
    $str = str2alias($str);
    return $id . '-' . $str;
}

/**
 * Get id from alias
 * @param string $str
 * @param string $skip
 * @return string
 * @Author CuongDM
 */
function getIdAlias($url) {
    $parseUrl = explode("-", $url);
    return $parseUrl[0];
}

function jobDetailUrl($jobId, $jobTitle) {
    $alias = aliasHasId($jobId, $jobTitle);
    return "job/" . $alias;
}

/**
 * parse Search Url
 * @param string $str
 * @param string $skip
 * @return string
 * @Author CuongDM
 */
function parseSearchUrl($url) {
    $data = array();
    $params = explode("_", $url);
    $static = end($params);

    $parseUrl = explode(" ", $url);
    $keyword = alias2str($parseUrl[0], false);
    if ($keyword != 'all')
        $data['kw'] = alias2str($parseUrl[0], false);

//get category
    $regex = '/i(?P<i>[\d,]+)/';
    preg_match($regex, $static, $matches);
    if (!empty($matches))
        $data['categories'] = explode(",", $matches['i']);

//get location
    $regex = '/v(?P<v>[\d,]+)/';
    preg_match($regex, $static, $matches);
    if (!empty($matches))
        $data['locations'] = explode(",", $matches['v']);

//get level
    $regex = '/l(?P<l>[\d]+)/';
    preg_match($regex, $static, $matches);
    if (!empty($matches))
        $data['level'] = $matches['l'];

    return $data;
}

//get curl from stackchange
function getCurl($url) {

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request',
        CURLOPT_ENCODING => 'gzip'
    ));

    $resp = curl_exec($curl);
    curl_close($curl);
    $results = json_decode($resp);
    return $results;


    /*  $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HEADER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_TIMEOUT, 30);
      curl_setopt($curl, CURLOPT_USERAGENT, 'cURL');
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_ENCODING, "gzip"); //<< Solution

      $result = curl_exec($curl);
      curl_close($curl);

      return $result;
     *
     *
     */
}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */
