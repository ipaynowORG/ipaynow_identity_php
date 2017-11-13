<?php
    /**
     *a 
     * @author Jupiter
     * 
     * 应用配置类
     */
    class Config{
        static $timezone="Asia/Shanghai";

        static $trans_url="https://dby.ipaynow.cn/identify";

        const VERIFY_HTTPS_CERT=false;
        const CHECK_ID_FUNCODE="ID01";
        const QUERY_CHECK_ID_FUNCODE = "ID01_Query";//身份认证查询

        const CHECK_CARD_FUNCODE="ID02";
        const QUERY_CARD_FUNCODE = "ID02_Query";//银行卡认证查询

        const CHECK_MOBILE_NO="ID03";
        const QUERY_MOBILE_NO_FUNCODE = "ID03_Query";//银行卡认证查询

        const CHARSET="UTF-8";
        const QSTRING_EQUAL="=";
        const QSTRING_SPLIT="&";
        const SERVER_PARSE_SUCCESS="1";
        const SERVER_PARSE_FAIL="0";
    }
