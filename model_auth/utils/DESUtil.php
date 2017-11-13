<?php

require_once '../conf/Config.php';
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2015/9/24
 * Time: 14:26
 */
class DESUtil
{
    public static function encrypt($data){
        $cipher=MCRYPT_3DES;
        $mode=MCRYPT_MODE_ECB;
        return mcrypt_encrypt($cipher,Config::$des_key,$data,$mode);
    }

    public static function decrypt($data){
        $cipher=MCRYPT_3DES;
        $mode=MCRYPT_MODE_ECB;
        return mcrypt_decrypt($cipher,Config::$des_key,$data,$mode);
    }
}