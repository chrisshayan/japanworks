<?php
define('ENCRYPT_KEY', 'VFAit0en_enCrypt');
define('ENCRYPT_IV', 'abcdefghij123456');

function do_encrypt($content) {
	if (!isset($content))
		return '';
	$content = trim($content);
	$enc = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, ENCRYPT_KEY, addpadding($content), MCRYPT_MODE_ECB, ENCRYPT_IV);
	return strToHex(base64_encode($enc));
}

function do_decrypt($content) {
	if (!isset($content))
		return '';
	$content = trim($content);
	if ($content == '')
		return '';
	$content = hexToStr($content);
	$dec = strippadding(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, ENCRYPT_KEY, base64_decode($content), MCRYPT_MODE_ECB, ENCRYPT_IV));
	return $dec;
}

function hexToStr($hex) {
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2) {
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}

function strToHex($string) {
    $hex='';
    for ($i=0; $i < strlen($string); $i++) {
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}

function addpadding($string, $blocksize = 16) {
    $len = strlen($string);
    $pad = $blocksize - ($len % $blocksize);
    $string .= str_repeat(chr($pad), $pad);
    return $string;
}

function strippadding($string){
    $slast = ord(substr($string, -1));
    $slastc = chr($slast);
    $pcheck = substr($string, -$slast);
    if(preg_match("/$slastc{".$slast."}/", $string)){
        $string = substr($string, 0, strlen($string)-$slast);
        return $string;
    } else {
        return false;
    }
}
?>
