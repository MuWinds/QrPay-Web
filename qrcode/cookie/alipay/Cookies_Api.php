<?php
ini_set('display_errors',1);//这一句是就算有错误，也返回200，说明服务器处理过了。
require './Core/Common.php';
$act=isset($_GET['act'])?$_GET['act']:null;
if($act=='list_a')
{
	$limit=1;
	$row=$DB->query("SELECT * FROM pay_cookies WHERE status_a='0' order by addtime asc limit {$limit}")->fetch();
	if($row['id']){
		$DB->exec("update `pay_cookies` set `status_a`='1' where id='{$row['id']}' limit 1");
		$result=array("id"=>$row['id'],"type"=>$row['type']);
	}
}
elseif($act=='list_b')
{
	$type=$_GET['type']?$_GET['type']:$_POST['type'];
	$limit=1;
	$row=$DB->query("SELECT * FROM pay_cookies WHERE status_a='1' and status_b='0' and type='{$type}' order by addtime asc limit {$limit}")->fetch();
	if($row['id']){
		$DB->exec("update `pay_cookies` set `status_b`='1' where id='{$row['id']}' limit 1");
		$result=array("id"=>$row['id']);
	}
}
elseif($act=='add_qr_url')
{
	$id=$_GET['id']?$_GET['id']:$_POST['id'];
	$qr_url=$_GET['qr_url']?$_GET['qr_url']:$_POST['qr_url'];
	if($DB->exec("update `pay_cookies` set `qr_url`='{$qr_url}' where id='{$id}' limit 1")){
		$result=array("id"=>$id,"status"=>"Add QrUrl OK");
	}
}
elseif($act=='add_cookie')
{
	$id=$_GET['id']?$_GET['id']:$_POST['id'];
	$cookie=$_GET['cookie']?$_GET['cookie']:$_POST['cookie'];
	if($DB->exec("update `pay_cookies` set `cookie`='{$cookie}' where id='{$id}' limit 1")){
		$result=array("id"=>$id,"status"=>"Add Cookie OK");
	}
}
elseif($act=='Get_QrUrl')
{	
	$type=$_GET['type']?$_GET['type']:$_POST['type'];
	$type=$type?$type:'alipay';
	$id = rand(10000000,99999999);
	$sds=$DB->exec("INSERT INTO `pay_cookies` (`id`,`type`,`addtime`) VALUES ('{$id}','{$type}','{$date}')");
     if($sds){
		$result=array("code"=>1,"msg"=>"提交二维码获取请求成功!","id"=>$id);
	}else{
		$result=array("code"=>-1,"msg"=>"提交二维码获取请求失败!");
	}
}
elseif($act=='QrUrl')
{	
	$id=$_GET['id']?$_GET['id']:$_POST['id'];
	$row=$DB->query("SELECT * FROM pay_cookies WHERE id='{$id}' limit 1")->fetch();
	if($row){
		$result=array("code"=>1,"msg"=>"获取数据成功,出现二维码链接后,请您务必三分钟内扫码,否则二维码会失效!","id"=>$row['id'],"qr_url"=>$row['qr_url']);
	}else{
		$result=array("code"=>-1,"msg"=>"ID不存在!");
	}
}
elseif($act=='Get_Cookie')
{	
	$id=$_GET['id']?$_GET['id']:$_POST['id'];
	$row=$DB->query("SELECT * FROM pay_cookies WHERE id='{$id}' limit 1")->fetch();
	if($row){
		$result=array("code"=>1,"msg"=>"获取数据成功!","id"=>$row['id'],"cookie"=>$row['cookie']);
	}else{
		$result=array("code"=>-1,"msg"=>"ID不存在!");
	}
}
else
{
	$result=array("code"=>-5,"msg"=>"No Act!");
}

if($result)
	exit(json_encode($result));
else
	exit($data);

?>