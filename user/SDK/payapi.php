<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>即时到账支付</title>
</head>
<?php

include("../core/common.php");
$key=$conf['zero_key'];

$data['pid']=$conf['zero_pid'];

$data['type']=$_GET['type']; //wxpay qqpay alipay
$data['out_trade_no'] = rand(11111,99999);
$data['money']=$_GET['WIDtotal_fee']; //jine
$data['name']=$_GET['WIDsubject']; //shangpinming

$data['notify_url'] = "http://".$_SERVER['HTTP_HOST']."/user/notify_url.php";
$data['return_url'] = "http://".$_SERVER['HTTP_HOST']."/user/return_url.php";
 
$data['sign']=md5($data['pid'].$data['money'].$data['type'].$data['name'].$data['notify_url'].$key);


$url= "http://".$_SERVER['HTTP_HOST']."/submit.php";
//$data['istype']=2;//1：支付宝；2：微信支付
//$data['notify_url']="http://".$_SERVER['HTTP_HOST']."/paysapi/notifyUrl.php";;
//$data['return_url']="http://".$_SERVER['HTTP_HOST']."/paysapi/backurl.php";;
//$data['orderid']=$ubodingdan;
//$data['orderuid']=$userid;
//$data['goodsname']="ds";
//$data['key']= md5($data['goodsname'].$data['istype'].$data['notify_url'].$data['orderid'].$data['orderuid'].$data['price'].$data['return_url'].$key.$appid);
$formItemString='';
foreach($data as $key=>$value){
    $formItemString.="<input name='{$key}' type='text' value='{$value}'/>";
}

$ok="
<form style='display:none' name='submit_form' id='submit_form' action='{$url}' method='post'>
{$formItemString}</form><script type='text/javascript'>document.submit_form.submit();</script>";
echo $ok;
exit;

?>
</body>
</html>
