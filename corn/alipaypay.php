<?php
$id = $_GET["id"];
include("../core/common.php");
@header('Content-Type: text/html; charset=UTF-8');
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='$id' limit 1")->fetch();
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json; charset=GBK');
error_reporting(0);
date_default_timezone_set("PRC");
$url="https://shanghu.alipay.com/error.htm?funCode=FUN.USER&causeCode=ERROR.CUSTOMER.NOT.EXIST";//替换内容=输入你的抓取的登录cookokie里面的ctoken值
$ctoken='vj7wfh-ueeDlTHaR';
$cookie=$userrow['alicookie'];//这里输入你的抓取的登录cookokie
$zz=httpGet($url,$cookie);
$mm=strstr($zz,"available-amount");
$mm=strstr($mm,"</em>",true);
$res=substr($mm,8);
//$res = json_decode($mm,true);
$dangqian1=str_replace('available-amount">','',$mm);
$dangqian2=str_replace('</','',$dangqian1);
$dangqian=str_replace(',','',$dangqian2);

//print_r($dangqian);exit;
function httpGet($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 7.0; MHA-AL00 Build/HUAWEIMHA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.134 Mobile Safari/537.36',
'Referer: https://shanghu.alipay.com/user/myAccount/index.htm',
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); //设置等待时间
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //设置cURL允许执行的最长秒数
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($ch);
curl_close($ch);
return $content;
}


if ($dangqian == "") {
echo  "-1";
exit();
}
else {
file_get_contents("http://".$_SERVER['HTTP_HOST']."/appapi.php?act=query&authuser=sksappconfig&alipay=1&pid=$id&key=$key");
$dangqian=str_replace(',','',$dangqian);
echo $dangqian;
}