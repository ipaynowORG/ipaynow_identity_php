<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/11/13
 * Time: 14:30
 */
require_once '../services/Service.php';

//身份认证
//print Services::toCheckID("1441071499740581","DK96gnOB7EmVDDaHgLTLEZqVgP0H0nML","abnMX6YXHjBdesCsn2TD8b25","phpIdentify3","522224199102072416","杨先生");

//身份认证查询
//print Services::queryCheckID("1441071499740581","DK96gnOB7EmVDDaHgLTLEZqVgP0H0nML","abnMX6YXHjBdesCsn2TD8b25","phpIdentify3");

//卡信息认证 M2M1ZmRjNjc1MmYxNmRiNWNhY2NmMmIzYzk1ZGZlZTI=
//            Y2IwYjRiYTQ1MTUyOTQ4YTQyNzJhZDBhYjIxZDNkZjI=
//print Services::toCheckCard("1441071499740581","DK96gnOB7EmVDDaHgLTLEZqVgP0H0nML",
//"Z5CbXbEaJA6CYRSDS5Ddsab6","phpCardbeijin0","522224199102072416","杨福照","01","6228511001444917","17701087752");
//
//卡信息认证查询
//print Services::queryCheckCard("1441071499740581","DK96gnOB7EmVDDaHgLTLEZqVgP0H0nML","Z5CbXbEaJA6CYRSDS5Ddsab6","phpCard0");


//print Services::toCheckMobileNo("1476788813528909","c4MlX9GJCi0YI5z3RvpK17wPlscFKpY1",
//"dYTAwfNMEeT3pk5FB8MS5MYk","phpMobile1","110101198204031532","张江南","01","13401190417");
//
//手机号认证查询
//print Services::queryCheckMobileNo("1476788813528909","c4MlX9GJCi0YI5z3RvpK17wPlscFKpY1","dYTAwfNMEeT3pk5FB8MS5MYk","phpMobile1");

