<?php
require '../core/common.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$pid = isset($_POST['id'])?intval($_POST['id']):exit('{"code":-1,"msg":"ID不能为空"}');
$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
if(!$userrow)exit('{"code":-1,"msg":"商户不存在"}');
	$out_biz_no = date("YmdHis").rand(11111,99999);
	if($userrow['rate'])
			$money=round($userrow['money']*$userrow['rate']/100,2);//结算给商户的余额
		else
			$money=round($userrow['money']*$conf['money_rate']/100,2);//结算给商户的余额
	$money=$money-0.5;
	$data=transferToAlipay($out_biz_no, $userrow['username'], $userrow['account'], $money,'T+_结算');
	$json=json_decode($data,true);
	if($json['code']==0){
		$type='结算_T+1';
		$DB->exec("update `pay_user` set `money`='0.00' where pid='{$pid}' limit 1");
		$DB->query("insert into `pay_order` (`trade_no`,`out_trade_no`,`notify_url`,`return_url`,`type`,`pid`,`addtime`,`endtime`,`name`,`money`,`tmoney`,`status`,`transfer_status`) values ('".$out_biz_no."','".$out_biz_no."','baidu.com','baidu.com','T+','".$pid."','".$date."','".$date."','T+_结算','".$money."','".$money."','1','1')");
	    
	}
echo $data;
?>