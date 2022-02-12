
<?php
include("./core/common.php");
include("./core/connect.php");
include("./connect.php");
$act=isset($queryArr['act'])?daddslashes($queryArr['act']):null;
@header('Content-Type: application/json; charset=UTF-8');
switch($act){
case 'update'://软件更新检测
    $appname="即时到账辅助工具";//软件名称
	$notice="欢迎使用即时到帐支付宝，财付通.微信即时到账辅助工具";//软件公告
	$result=array('appname'=>$appname,'notice'=>$notice);
break;
case 'qqlogin':
	$users=$DB->query("SELECT * FROM pay_user WHERE qq_uid='{$queryArr['social_uid']}' limit 1")->fetch();
	$pid=$users['pid'];
	$key=authcode($users['key'], 'DECODE', $conf['KEY']);
	if($users)
	$result=array('code'=>1,'pid'=>$pid,'key'=>$key);
	else
	$result=array('code'=>-1);
break;
case 'query'://获取商户信息
	$row=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
	$ke=authcode($row['key'], 'DECODE', $conf['KEY']);
     if($queryArr['alipay']==1){
		$ali_login=time()+150;
	 }else{ 
	 $ali_login=$row['ali_login'];
	 }
    if($queryArr['wxpay']==1){
		$wx_login=time()+150;
	 }else{ 
	 $wx_login=$row['wx_login'];
	 }
    if($queryArr['qqpay']==1){
		$qq_login=time()+150;
	 }else{ 
	 $qq_login=$row['qq_login'];
	 }
	 if(!$row){
		 $result=array('code'=>-1,'msg'=>'pid错误');
	 }elseif($ke!=$key){
		$result=array('code'=>-2,'msg'=>'key错误');
	 }else{
		$DB->query("update `pay_user` set `ali_login`='{$ali_login}',`alipid`='{$queryArr['alipid']}',`wx_login`='{$wx_login}',`qq_login`='{$qq_login}' where `pid`='{$pid}' limit 1");
		$result=array("code"=>1,"msg"=>"登录成功!","pid"=>$row['pid'],"qq"=>$row['qq'],"money"=>$row['money'],"username"=>$row['username'],"account"=>$row['account'],"ali_login"=>$row['ali_login'],"wx_login"=>$row['wx_login'],"qq_login"=>$row['qq_login'],"rate"=>$row['rate'],"issmrz"=>$row['issmrz'],"active"=>$row['active'],"paymb"=>$row['paymb']);
	 }
break;
case 'Mcode_notify':
	$type=daddslashes($queryArr['type']);
    $money=number_format((float)daddslashes($queryArr['money']), 2, '.', '');
    $userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
    $keyy=authcode($userrow['key'], 'DECODE', $conf['KEY']);
	if(!$userrow){
		 $result=array('code'=>-1,'msg'=>'PID错误');
	 }elseif($keyy!=$key){
		$result=array('code'=>-2,'msg'=>'KEY错误');
	 }else{

	 $data=get_curl($siteurl.'submit/Mcode_notify.php?pid='.$pid.'&type='.$type.'&money='.$money.'&yan=JKC09fskcp9s4ks');
	 echo $data;
	 }
break;
default:
	exit('{"code":-9,"msg":"No Act"}');
break;
}
	if($result)
		exit(json_encode($result));
	else
		exit($data);
?>