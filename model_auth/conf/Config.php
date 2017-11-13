<?php
    /**
     *a 
     * @author Jupiter
     * 
     * 应用配置类
     */
    class Config{
        static $timezone="Asia/Shanghai";
        static $app_id="1441071499740581";//该处配置您的APPID
        static $md5_key="DK96gnOB7EmVDDaHgLTLEZqVgP0H0nML";//该处配置您的应用秘钥
        static $des_key="Z5CbXbEaJA6CYRSDS5Ddsab6";//该处配置您的DES秘钥
        static $trans_url="http://posp.ipaynow.cn:20320";
        static $query_url="http://192.168.1.92:10800";

        const VERIFY_HTTPS_CERT=false;
        const CHECK_FUNCODE="ID02";
        const QUERY_FUNCODE="ID01_Query";
        const CHARSET="UTF-8";
        const QSTRING_EQUAL="=";
        const QSTRING_SPLIT="&";
        const SERVER_PARSE_SUCCESS="1";
        const SERVER_PARSE_FAIL="0";
    }
