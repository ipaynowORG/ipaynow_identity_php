<?php

require_once '../conf/Config.php';
require_once '../services/Service.php';
require_once '../utils/Log.php';
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2015/9/24
 * Time: 13:56
 */
class Check
{
    public function toCheck(){
        $req=array();
		$req["bankCardNum"]=$_GET["bankCardNum"];//银行账户
		$req["certiType"]="01";//证件类型
		$req["funcode"]=config::CHECK_FUNCODE;
		$req["idCard"]=$_GET["idCard"];//身份证号
		$req["idCardName"]=$_GET["idCardName"];//姓名
        $req["mhtOrderNo"]=date("YmdHis");		
		$req["mobile"]=$_GET["mobile"];//手机号
        $req_content=Services::buildAndSendCheckReq($req); 		
        Log::outLog("验证信息接口应答:",$req_content);
        echo $req_content;		
		
    }
}
$api=new Check();
$api->toCheck();