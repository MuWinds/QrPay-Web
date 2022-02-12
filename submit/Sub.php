<?php
require_once('../core/common.php');
$trade_no = $_GET['trade_no'];
$type=daddslashes($_GET['type']);
$sitename = $_GET['sitename'];
$sitename=base64_decode(daddslashes($_GET['sitename']));//解密商品标题
$type = $_GET['type'];



$row=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
if(!$row)sysmsg('该订单号不存在，请返回来源地重新发起请求！');
$pidjc=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
$pid=$pidjc['pid'];
$qr_row=$DB->query("SELECT * FROM pay_qrlist WHERE pid='{$pid}' and type='{$type}' limit 1")->fetch();
$DB->query("update `pay_order` set `transfer_status`='3',`transfer_result`='软件版码支付',`software`=1 where `trade_no`='{$trade_no}'");
	if($type == 'alipay'){
		$url = './alipay.php?trade_no='.$trade_no.'&sitename='.$sitename;
		exit("<script>window.location.href='".$url."';</script>");
	} else if($type == 'wxpay'){
		$url = './Mcode_pay.php?trade_no='.$trade_no.'&sitename='.$sitename;
		exit("<script>window.location.href='".$url."';</script>");
	} else if($type == 'qqpay'){
		$url = './qqpay.php?trade_no='.$trade_no.'&sitename='.$sitename;
		exit("<script>window.location.href='".$url."';</script>");
	}
