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
            background:#f9fafc url(../images/loading.gif) no-repeat 20px 26px;
            text-indent:22px;border:1px solid #c5d0dc;}
        #waiting {font-family:Arial;}
    </style>
<script>
function open_without_referrer(link){
document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
}
</script>
</head>
<body>
<?php
require '../core/common.php';

@header('Content-Type: text/html; charset=UTF-8');
$name=daddslashes($_GET['name']);
$money=daddslashes($_GET['money']);
$type=daddslashes($_GET['type']);
$trade_no=daddslashes($_GET['trade_no']);
$sitename=daddslashes($_GET['sitename']);
$row=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
if(!$row)exit('该订单号不存在，请返回来源地重新发起请求！');

$DB->query("update `pay_order` set `type` ='$type',`addtime` ='$date' where `trade_no`='$trade_no'");
$pidjc=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
$pid=$pidjc['pid'];
$qr_row=$DB->query("SELECT * FROM pay_qrlist WHERE pid='{$pid}' and type='{$type}' limit 1")->fetch();
if($qr_row){
		$DB->query("update `pay_order` set `transfer_status`='3',`transfer_result`='此方式为软件版码支付',`software`=1 where `trade_no`='{$trade_no}'");
		exit("<script>window.location.href='./Sub.php?trade_no={$trade_no}&sitename={$sitename}&type={$type}';</script>");
}elseif($type=='alipay'){
		if($conf['alipay_api']==0){
			sysmsg('站长关闭了支付宝代收款功能，请使用云端即时到账模式对接');
		}elseif($conf['alipay_api']==1){
			exit("<script>window.location.href='./alipay_payapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
		}elseif($conf['alipay_api']==2){
			exit("<script>window.location.href='./epayapi.php?trade_no={$trade_no}&type={$type}&sitename={$sitename}';</script>");
		}
}elseif($type=='wxpay'){
	if($conf['wxpay_api']==0){
			sysmsg('站长关闭了微信代收款功能，请使用云端即时到账模式对接');
		}elseif($conf['wxpay_api']==1){
			exit("<script>window.location.href='./wxpay.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
		}elseif($conf['wxpay_api']==2){
			exit("<script>window.location.href='./epayapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
		}
}elseif($type=='qqpay' || $type=='tenpay'){
	if($conf['qqpay_api']==0){
			sysmsg('站长关闭了QQ代收款功能，请使用云端即时到账模式对接');
		}elseif($conf['qqpay_api']==1){
			exit("<script>window.location.href='./qqpay.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
		}elseif($conf['qqpay_api']==2){
			exit("<script>window.location.href='./epayapi.php?trade_no={$trade_no}&sitename={$sitename}';</script>");
		}
}else{
	echo "<script>window.location.href='./default.php?trade_no={$trade_no}&sitename={$sitename}';</script>";
}


?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>