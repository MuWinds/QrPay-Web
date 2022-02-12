<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>正在为您跳转到支付页面，请稍候...</title>
    <style type="text/css">
        body {margin:0;padding:0;}
        p {position:absolute;
            left:50%;top:50%;
            width:330px;height:30px;
            margin:-35px 0 0 -160px;
            padding:20px;font:bold 14px/30px "宋体", Arial;
            background:#f9fafc url(assets/img/load.gif) no-repeat 20px 26px;
            text-indent:22px;border:1px solid #c5d0dc;}
        #waiting {font-family:Arial;}
    </style>
<script><?php require './core/common.php';

if($_GET['a'])exit(get_curl($url,false,false,false,false,false,false,true));?>
function open_without_referrer(link){ document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
}</script>
</head>
<body>
<?php
@header('Content-Type: text/html; charset=UTF-8');

if(isset($_GET['pid'])){
 $queryArr=$_GET;
}else{
 $queryArr=$_POST;
}

$pid=intval($queryArr['pid']);
if(empty($pid))sysmsg('PID不存在');
$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
$prestr=createLinkstring(argSort(paraFilter($queryArr)));
if(!md5Verify($prestr, $queryArr['sign'], authcode($userrow['key'], 'DECODE', $conf['KEY'])))sysmsg('签名校验失败，请返回重试！');

if($userrow['active']==0)sysmsg('商户已封禁，无法支付！');




if($userrow['issmrz']==0)sysmsg('商户未实名认证，无法支付！');
if(in_array($userrow['account'],explode('|',$conf['block_account'])))sysmsg('此支付宝账号已经被拉黑，无法支付！');



$type=daddslashes($queryArr['type']);
$sign=daddslashes($queryArr['sign']);
$out_trade_no=daddslashes($queryArr['out_trade_no']);
$notify_url=strip_tags(daddslashes($queryArr['notify_url']));
$return_url=strip_tags(daddslashes($queryArr['return_url']));
$name=strip_tags(daddslashes($queryArr['name']));
$money=daddslashes($queryArr['money']);
$sitename=urlencode(base64_encode(daddslashes($queryArr['sitename'])));
$outtime = time() + $userrow['outtime'];

if(empty($out_trade_no))sysmsg('订单号(out_trade_no)不能为空');
if(empty($notify_url))sysmsg('通知地址(notify_url)不能为空');
if(empty($return_url))sysmsg('回调地址(return_url)不能为空');
if(empty($name))sysmsg('商品名称(name)不能为空');
if(empty($money))sysmsg('金额(money)不能为空');
if($money<=0 || !is_numeric($money))sysmsg('金额不合法');
if(!preg_match('/^[a-zA-Z0-9.\_\-]+$/',$out_trade_no))sysmsg('订单号(out_trade_no)格式不正确');

$trade_no=date("YmdHis").rand(11111,99999);
if(!$DB->query("insert into `pay_order` (`outtime`,`trade_no`,`out_trade_no`,`notify_url`,`return_url`,`type`,`pid`,`addtime`,`name`,`money`,`status`) values ('".$outtime."','".$trade_no."','".$out_trade_no."','".$notify_url."','".$return_url."','".$type."','".$pid."','".$date."','".$name."','".$money."','0')"))exit('创建订单失败，请返回重试！');

$pidjc=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
$pid=$pidjc['pid'];
$qr_row=$DB->query("SELECT * FROM pay_qrlist WHERE pid='{$pid}' and type='{$type}' limit 1")->fetch();
if($qr_row){
  $DB->query("update `pay_order` set `transfer_status`='3',`transfer_result`='软件版码支付',`software`=1 where `trade_no`='{$trade_no}'");
    exit("<script>window.location.href='./submit/Sub.php?trade_no={$trade_no}&sitename={$sitename}&type={$type}';</script>");
}else{
if($conf['zero_pid']==$pid){
if($type=='alipay'){
  if($conf['alipay_api']==0){
   sysmsg('商户未上传该支付方式收款二维码，支付方式暂不可使用');
  }elseif($conf['alipay_api']==1){
   exit("<script>window.location.href='./submit/alipay_payapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }elseif($conf['alipay_api']==2){
   exit("<script>window.location.href='./submit/epayapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }
}elseif($type=='wxpay'){
 if($conf['wxpay_api']==0){
   sysmsg('商户未上传该支付方式收款二维码，支付方式暂不可使用');
  }elseif($conf['wxpay_api']==1){
   exit("<script>window.location.href='./submit/wxpay.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }elseif($conf['wxpay_api']==2){
   exit("<script>window.location.href='./submit/epayapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }elseif($conf['wxpay_api']==3){
   exit("<script>window.location.href='./submit/epayapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }
}elseif($type=='qqpay' || $type=='tenpay'){
 if($conf['qqpay_api']==0){
   sysmsg('商户未上传该支付方式收款二维码，支付方式暂不可使用');
  }elseif($conf['qqpay_api']==1){
   exit("<script>window.location.href='./submit/qqpay.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }elseif($conf['qqpay_api']==2){
   exit("<script>window.location.href='./submit/epayapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
  }
}else{
 echo "<script>window.location.href='./submit/default.php?trade_no={$trade_no}&sitename={$sitename}';</script>";
}
}else{
     echo "<script>window.location.href='./submit/default.php?trade_no={$trade_no}&sitename={$sitename}';</script>";
//sysmsg('商户未上传该支付方式收款二维码，支付方式暂不可使用！');
}
}




?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>