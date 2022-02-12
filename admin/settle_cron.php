<?php
require '../core/common.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$act=isset($_GET['act'])?$_GET['act']:null;
if($act=='settle')
{
	$limit=1;
	$rs=$DB->query("SELECT * FROM pay_order WHERE status='1' and transfer_status='0' order by trade_no asc limit {$limit}");
	while($row=$rs->fetch()){
		$userrow=$DB->query("select * from pay_user where pid='{$row['pid']}' limit 1")->fetch();
		transferToAlipay($row['trade_no'], $userrow['username'], $userrow['account'], $row['tmoney'], 'T+_结算');
		$result=array("trade_no"=>$row['trade_no'],"account"=>$userrow['account'],"tmoney"=>$row['tmoney'],"qq"=>$userrow['qq']);
	}
}

echo json_encode($result);

?>