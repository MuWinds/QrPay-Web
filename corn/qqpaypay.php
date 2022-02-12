<?php
$id = $_GET["id"];
include("../core/common.php");
@header('Content-Type: text/html; charset=UTF-8');
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='$id' limit 1")->fetch();
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
$payQQ=$userrow['payQQ'];




//这里输入你的抓取的登录cookokie

header('Access-Control-Allow-Origin:*');
header('Content-type:application/json; charset=utf-8');
error_reporting(0);
date_default_timezone_set("PRC");
$sj=date("Y-m-d");
$url="https://myun.tenpay.com/cgi-bin/clientv1.0/qwallet_account_list.cgi?limit=10&offset=0&s_time=$sj&time_type=0&source_type=7&pay_type=2&ref_param=&skey=MgEKjJRqP5&skey_type=2&uin=$payQQ";
$cookie=$userrow['qqcookie'];//这里输入你的抓取的登录cookokie
$zz=post($url,$cookie);

$mm=strstr($zz,"OK");
$mm=strstr($mm,"bank_name",true);
$res=substr($mm,48);
 $patterns = "/\d+/"; //第一种
  preg_match($patterns,$res,$arr);  
$dangqian=sprintf($arr[0]/100);

//print_r($mm);exit;
function post($url,$cookie)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$header = array(
'User-Agent: Mozilla/5.0 (Linux; Android 7.0; MHA-AL00 Build/HUAWEIMHA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.134 Mobile Safari/537.36',
'Referer: https://myun.tenpay.com/cgi-bin/clientv1.0/',
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

if ($dangqian == "0") {
echo  "-1";
}
else {
$if=file_get_contents("http://".$_SERVER['HTTP_HOST']."/appapi.php?act=query&authuser=sksappconfig&qqpay=1&pid=$id&key=$key");
echo $dangqian;
}

