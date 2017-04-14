<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 27/11/216
 */
class MY_Encrypt extends CI_Encrypt
{

function encode($string, $key = "", $url_safe = TRUE) {
    $ret = parent::encode($string, $key);

    if ($url_safe) {
        $ret = strtr($ret, array('+' => '.', '=' => '-', '/' => '~'));
    }

    return $ret;
}

function decode($string, $key = "") {
    $string = strtr($string, array('.' => '+', '-' => '=', '~' => '/'));

    return parent::decode($string, $key);
} }  ?>