<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付狗代收款交易接口</title>
</head>
<?php
require '../core/common.php';
$sitename=daddslashes($_GET['sitename']);
$trade_no=daddslashes($_GET['trade_no']);
$type=daddslashes($_GET['type']);
$srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();

if(!$srow)sysmsg('该订单号不存在，请返回来源地重新发起请求！');
$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$srow['pid']}' limit 1")->fetch();


$pid			= daddslashes($srow['pid']);
$key			= daddslashes($srow['key']);
$trade_no		= daddslashes($srow['trade_no']);
$out_trade_no	= daddslashes($srow['out_trade_no']);
$name			= daddslashes($srow['name']);
$money			= daddslashes($srow['money']);
$type 			= $_GET['type']?daddslashes($_GET['type']):daddslashes($srow['type']);
$notify_url		= daddslashes($srow['notify_url']);
$return_url		= daddslashes($srow['return_url']);
$sign			= daddslashes($srow['sign']);
$sitename=base64_decode(daddslashes($_GET['sitename']));

if($type=='alipay'){
$epay_pid = $conf['alipay_epid'];
$epay_key = $conf['alipay_ekey'];
$epay_url = $conf['alipay_eurl'];
}elseif($type=='qqpay'){
$epay_pid = $conf['qqpay_epid'];
$epay_key = $conf['qqpay_ekey'];
$epay_url = $conf['qqpay_eurl'];
}elseif($type=='wxpay'){
$epay_pid = $conf['wxpay_epid'];
$epay_key = $conf['wxpay_ekey'];
$epay_url = $conf['wxpay_eurl'];	
}
//*******************************以下参数勿动***********************

require_once(SYSTEM_ROOT."epay/epay.config.php");
require_once(SYSTEM_ROOT."epay/epay_submit.class.php");
/**************************请求参数**************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => $type,
		"notify_url"	=> 'http://'.$conf['local_domain'].'/submit/epay_notify.php', //服务器异步通知页面路径
		"return_url"	=> 'http://'.$_SERVER['HTTP_HOST'].'/submit/epay_return.php', //页面跳转同步通知页面路径
		"out_trade_no"	=> $trade_no,
		"name"	=> $name,
		"money"	=> $money,
		"sitename"	=> $sitename
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter);
echo $html_text;

?>
</body>
</html>