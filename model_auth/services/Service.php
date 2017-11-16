<?php

require_once '../conf/Config.php';
require_once '../utils/DESUtil.php';
require_once '../utils/Tools.php';
require_once '../utils/NetUtil.php';
require_once '../utils/Log.php';

class Services
{

    /**
     * 身份信息认证
     * @param $appId 商户应用Id
     * @param $md5Key 商户应用秘钥
     * @param $desKey 商户3desKey
     * @param $mhtOrderNo 商户订单号
     * @param $idCard 待认证身份证号
     * @param $cardName 待认证姓名
     * @param $isTest 是否测试 true测试，false生产
     * @return bool|string 调用成功返回现在支付订单号  nowpayTransId
     */
    public static function toCheckID($appId, $md5Key, $desKey, $mhtOrderNo, $idCard, $cardName,$isTest=true)
    {
        $req = array();
        $req["funcode"] = config::CHECK_ID_FUNCODE;
        $req["idcard"] = $idCard;//身份证号
        $req["cardName"] = $cardName;//姓名
        $req["mhtOrderNo"] = $mhtOrderNo;
        $req_content = Services::buildAndSendCheckReq($req, $appId, $md5Key, $desKey,$isTest);
        return $req_content;
    }

    /**
     * 身份认证查询
     * @param $appId 商户应用Id
     * @param $md5Key 商户应用秘钥
     * @param $desKey 商户3desKey
     * @param $mhtOrderNo 商户订单号
     * @param $isTest 是否测试 true测试，false生产
     * @return bool|string
     */
    public static function queryCheckID($appId, $md5Key, $desKey, $mhtOrderNo,$isTest=true)
    {
        $req = array();
        $req["funcode"] = config::QUERY_CHECK_ID_FUNCODE;
        $req["mhtOrderNo"] = $mhtOrderNo;
        $req_content = Services::buildAndSendQueryReq($req, $appId, $md5Key, $desKey,$isTest);
        return $req_content;
    }

    /**
     * 银行卡认证（仅支持对私账户）
     * @param $appId 商户应用Id
     * @param $md5Key 商户应用秘钥
     * @param $desKey 商户3desKey
     * @param $mhtOrderNo 商户订单号
     * @param $idCard 身份证号
     * @param $idCardName 姓名
     * @param $certiType 证件类型
     * @param $bankCardNum 银行账户
     * @param $mobile 预留手机号
     * @param $isTest 是否测试 true测试，false生产
     * @return bool|string
     */
    public static function toCheckCard($appId, $md5Key, $desKey, $mhtOrderNo, $idCard, $idCardName,$certiType,$bankCardNum,$mobile,$isTest=true)
    {
        $req = array();
        $req["funcode"] = config::CHECK_CARD_FUNCODE;
        $req["mhtOrderNo"] = $mhtOrderNo;
        $req["idCard"] = $idCard;//身份证号
        $req["idCardName"] = $idCardName;//姓名
        if (strlen($certiType) > 0){
            $req["certiType"] = $certiType;
        }
        $req["bankCardNum"] = $bankCardNum;
        if (strlen($mobile) > 0){
            $req["mobile"] = $mobile;
        }
        $req_content = Services::buildAndSendCheckReq($req, $appId, $md5Key, $desKey,$isTest);
        return $req_content;
    }


    /**
     * 银行卡认证查询
     * @param $appId 商户应用Id
     * @param $md5Key 商户应用秘钥
     * @param $desKey 商户3desKey
     * @param $mhtOrderNo 商户订单号
     * @param $isTest 是否测试 true测试，false生产
     * @return bool|string
     */
    public static function queryCheckCard($appId, $md5Key, $desKey, $mhtOrderNo,$isTest=true)
    {
        $req = array();
        $req["funcode"] = config::QUERY_CARD_FUNCODE;
        $req["mhtOrderNo"] = $mhtOrderNo;
        $req_content = Services::buildAndSendQueryReq($req, $appId, $md5Key, $desKey,$isTest);
        return $req_content;
    }


    /**
     * 手机号认证
     * @param $appId 商户应用Id
     * @param $md5Key 商户应用秘钥
     * @param $desKey 商户3desKey
     * @param $mhtOrderNo 商户订单号
     * @param $idCard 身份证号
     * @param $idCardName 姓名
     * @param $certiType 证件类型
     * @param $mobile 手机号
     * @param $isTest 是否测试 true测试，false生产
     * @return bool|string
     */
    public static function toCheckMobileNo($appId, $md5Key, $desKey, $mhtOrderNo, $idCard, $idCardName,$certiType,$mobile,$isTest=true)
    {
        $req = array();
        $req["funcode"] = config::CHECK_MOBILE_NO;
        $req["mhtOrderNo"] = $mhtOrderNo;
        $req["idCard"] = $idCard;//身份证号
        $req["idCardName"] = $idCardName;//姓名
        if (strlen($certiType) > 0){
            $req["certiType"] = $certiType;
        }
        if (strlen($mobile) > 0){
            $req["mobile"] = $mobile;
        }
        $req_content = Services::buildAndSendCheckReq($req, $appId, $md5Key, $desKey,$isTest);
        return $req_content;
    }


    /**
     * 手机号认证查询
     * @param $appId 商户应用Id
     * @param $md5Key 商户应用秘钥
     * @param $desKey 商户3desKey
     * @param $mhtOrderNo 商户订单号
     * @param $isTest 是否测试 true测试，false生产
     * @return bool|string
     */
    public static function queryCheckMobileNo($appId, $md5Key, $desKey, $mhtOrderNo,$isTest=true)
    {
        $req = array();
        $req["funcode"] = config::QUERY_MOBILE_NO_FUNCODE;
        $req["mhtOrderNo"] = $mhtOrderNo;
        $req_content = Services::buildAndSendQueryReq($req, $appId, $md5Key, $desKey,$isTest);
        return $req_content;
    }



    public static function buildAndSendCheckReq(Array $req, $appId, $md5Key, $desKey,$isTest)

    {
        $req_content = Services::buildReqTemplate($req, $appId, $md5Key, $desKey);
        echo "\n";
        echo "请求报文：" . $req_content;
        if($isTest){
            $url =   Config::$test_url;
        }else{
            $url = Config::$pro_url;
        }
        $resp_content = NetUtil::sendMessage($req_content, $url);
        echo "应答报文：" . $resp_content;
        echo "\n";
        echo "应答报文：";
        echo "\n";
        return Self::parseResp($resp_content, $md5Key,$desKey);
    }

    public static function buildAndSendQueryReq(Array $req,$appId, $md5Key, $desKey,$isTest)
    {
        $req_content = Services::buildReqTemplate($req,$appId, $md5Key, $desKey);
        echo $req_content;
        echo "\n";
        if($isTest){
            $url =   Config::$test_url;
        }else{
            $url = Config::$pro_url;
        }
        $resp_content = NetUtil::sendMessage($req_content, $url);
        //Log::outLog("查询接口应答:",$resp_content);
        return Self::parseResp($resp_content,$md5Key,$desKey);
    }

    private static function buildReqTemplate(Array $req_content, $appId, $md5Key, $desKey)
    {
        $original_text = Tools::createLinkString($req_content, true, false);
        $header = "funcode=" . $req_content['funcode'];
        $message_data_one = base64_encode('appId=' . $appId);
        echo "\n";
        echo "第一部分：" . $message_data_one;
        $message_data_two = base64_encode(DESUtil::encrypt($original_text, $desKey));
        echo "第二部分：" . $message_data_two;
        echo "\n";
        $message_data_three = base64_encode(md5($original_text . '&' . $md5Key));
        echo "第三部分：" . $message_data_three ."md5Key " . $md5Key;
        echo "\n";
        $message = urlencode($message_data_one . '|' . $message_data_two . '|' . $message_data_three);

        return $header . '&message=' . $message;
    }

    private static function parseResp($resp_content,$md5Key, $desKey)
    {
        $resp = explode("|", $resp_content);
        if ($resp[0] == Config::SERVER_PARSE_SUCCESS) {
            //现在支付服务器解析成功后的处理
            return Self::parseSuccessResp($resp,$md5Key, $desKey);
        } else {
            //现在支付服务器解析失败后的处理
            return Self::parseErrorResp($resp);
        }
    }

    private static function parseSuccessResp(Array $resp,$md5Key, $desKey)
    {
        $original_text = trim(DESUtil::decrypt(base64_decode($resp[1]), $desKey));
        $server_sign = base64_decode($resp[2]);
        if (Self::isCheckSignatureSucess($original_text, $server_sign,$md5Key)) {
            //签名验证成功处理
            return $original_text;
        } else {
            //签名验证失败处理
            return "CHECK_SIGN_FAILS";
        }
    }

    private static function parseErrorResp(Array $resp)
    {
        return base64_decode($resp[1]);
    }

    /**
     * 判断是否验证签名成功
     * @param $original_text
     * @param $server_sign
     * @return bool
     */
    private static function isCheckSignatureSucess($original_text, $server_sign,$md5Key)
    {
        $local_sign = md5($original_text . '&' . $md5Key);
        Log::outLog("本地签名:", $local_sign);
        Log::outLog("服务器签名:", $server_sign);
        if ($local_sign == $server_sign) {

            //验证签名成功
            return true;
        } else {
            //验证签名失败
            return false;
        }
    }
}