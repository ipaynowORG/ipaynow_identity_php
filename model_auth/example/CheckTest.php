<?php
/**
 * Created by PhpStorm.
 * User: ipaynow0929
 * Date: 2017/11/13
 * Time: 14:30
 */
require_once '../services/Service.php';

//身份认证
//print Services::toCheckID("xxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxx","checkId1","xxxxxxxxxxxxxxxxxxxxxx","xxx");

//身份认证查询
//print Services::queryCheckID("xxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxx","checkId1");

//卡信息认证 M2M1ZmRjNjc1MmYxNmRiNWNhY2NmMmIzYzk1ZGZlZTI=
//            Y2IwYjRiYTQ1MTUyOTQ4YTQyNzJhZDBhYjIxZDNkZjI=
//print Services::toCheckCard("xxxxxxxxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxx","phpCardbeijin2","xxxxxxxxxxxxxxxxxxxxx","xxx","01","xxxxxxx","xxxxx");
//
//卡信息认证查询
//print Services::queryCheckCard("xxxxxxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxx","phpCard0");


print Services::toCheckMobileNo("xxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxxxx",
"xxxxxxxxxxxxxxxxxxxx","phpMobile1","xxxxxxxxxxxxx","xxxx","01","xxxxxx");
//
//手机号认证查询
//print Services::queryCheckMobileNo("xxxxxxxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxxxx","phpMobile1");


