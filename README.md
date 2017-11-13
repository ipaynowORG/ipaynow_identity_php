# 鉴权SDK使用说明 #

## 版本变更记录 ##

- 1.0.0 : 初稿


## 目录 ##

[1. 概述](#1)

&nbsp;&nbsp;&nbsp;&nbsp;[1.1 简介](#1.1)

&nbsp;&nbsp;&nbsp;&nbsp;[1.2 如何获取](#1.2)

[2. API](#2)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[身份验证](#2.1)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[身份验证-订单查询](#2.2)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[卡信息认证](#2.3)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[卡信息认证-订单查询](#2.4)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[手机号认证](#2.5)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[手机号认证-订单查询](#2.6)

[3. DEMO ](#3)

<h2 id='1'> 1. 概述 </h2>

<h4 id='1.1'> 1.1 简介 </h4>

- 鉴权SDK。

<h4 id='1.2'> 1.2 如何获取 </h4>

[获取源码](https://github.com/ipaynowORG/ipaynow_identity_php.git)


<h2 id='2'> 2. API </h2>


<h4 id='2.1'> 2.1 身份验证</h4>

            /**
            * 身份信息认证
            * @param $appId 商户应用Id
            * @param $md5Key 商户应用秘钥
            * @param $desKey 商户3desKey
            * @param $mhtOrderNo 商户订单号
            * @param $idCard 待认证身份证号
            * @param $cardName 待认证姓名
            * @return bool|string 调用成功返回现在支付订单号  nowpayTransId
            */
           public static function toCheckID($appId, $md5Key, $desKey, $mhtOrderNo, $idCard, $cardName)

- 返回map中的值的含义

<table>
        <tr>
            <th>名称</th>
            <th>说明</th>
        </tr>
<tr>
            <td>funcode</td>
            <td>同输入</td>
         </tr>
<tr>
<tr>
            <td>nowpayTransId</td>
            <td>xxxx</td>
         </tr>
<tr>
            <td>responseTime</td>
            <td>yyyyMMddHHmmss</td>
         </tr>
<tr>
            <td>responseCode</td>
            <td>0000 成功
                0001 参数信息有误
                0002 获取商户信息失败
                0003 获取商户费率失败
                0004 获取商户可用条数失败
                0005 商户资金不足
                0006 验证异常
                0007 商户订单号重复
            </td>
         </tr>
<tr>
            <td>responseMsg</td>
            <td>应答信息</td>
         </tr>
<tr>
            <td>status</td>
            <td>00匹配,01不匹配,02未知,03调用错误</td>
         </tr>
<tr>
            <td>mhtOrderNo</td>
            <td>同输入或SDK自动生成的订单号</td>
         </tr>
    </table>



<h4 id='2.2'> 2.2 身份验证-订单查询</h4>

          /**
         * 身份认证查询
         * @param $appId 商户应用Id
         * @param $md5Key 商户应用秘钥
         * @param $desKey 商户3desKey
         * @param $mhtOrderNo 商户订单号
         * @return bool|string
         */
         public static function queryCheckID($appId, $md5Key, $desKey, $mhtOrderNo)

- 返回map中的值的含义

<table>
        <tr>
            <th>名称</th>
            <th>说明</th>
        </tr>
<tr>
            <td>appId</td>
            <td>同输入</td>
         </tr>
<tr>
            <td>funcode</td>
            <td>同输入</td>
         </tr>
<tr>
            <td>responseTime</td>
            <td>yyyyMMddHHmmss</td>
         </tr>
<tr>
            <td>responseCode</td>
            <td>0000 成功
                0001 参数信息有误
                0002 获取商户信息失败
                0003 获取商户费率失败
                0004 获取商户可用条数失败
                0005 商户资金不足
                0006 验证异常
                0007 商户订单号重复
            </td>
         </tr>
<tr>
            <td>responseMsg</td>
            <td>应答信息</td>
         </tr>
<tr>
            <td>status</td>
            <td>00匹配,01不匹配,02未知,03调用错误</td>
         </tr>
<tr>
            <td>transStatus</td>
            <td>00成功  01失败</td>
         </tr>
<tr>
            <td>mhtOrderNo</td>
            <td>同输入或SDK自动生成的订单号</td>
         </tr>
    </table>

<h4 id='2.3'> 2.3 卡信息认证</h4>

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
         * @return bool|string
         */
        public static function toCheckCard($appId, $md5Key, $desKey, $mhtOrderNo, $idCard, $idCardName,$certiType,$bankCardNum,$mobile)


<h4 id='2.4'> 2.4 卡信息认证-订单查询</h4>

        /**
         * 银行卡认证查询
         * @param $appId 商户应用Id
         * @param $md5Key 商户应用秘钥
         * @param $desKey 商户3desKey
         * @param $mhtOrderNo 商户订单号
         * @return bool|string
         */
        public static function queryCheckCard($appId, $md5Key, $desKey, $mhtOrderNo)



<h4 id='2.5'> 2.5 手机号认证</h4>

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
         * @return bool|string
         */
        public static function toCheckMobileNo($appId, $md5Key, $desKey, $mhtOrderNo, $idCard, $idCardName,$certiType,$mobile)

<h4 id='2.6'> 2.6 手机号认证-订单查询</h4>

        /**
         * 手机号认证查询
         * @param $appId 商户应用Id
         * @param $md5Key 商户应用秘钥
         * @param $desKey 商户3desKey
         * @param $mhtOrderNo 商户订单号
         * @return bool|string
         */
        public static function queryCheckMobileNo($appId, $md5Key, $desKey, $mhtOrderNo)

<h2 id='3'> 3. DEMO </h2>

    CheckTest.php

