<?php
/**
 * 彩虹聚合登录SDK
 * 1.0
**/

error_reporting(0);
session_start();
@header('Content-Type: text/html; charset=UTF-8');
include("../core/common.php");
include 'Oauth.config.php';
include 'Oauth.class.php';
$act=$_GET['act'];
if($act=='del_bind'){
 if(isset($_COOKIE["user_token"]) and $_SESSION['Query_pid'] and $_SESSION['Query_key']){
		$sds=$DB->exec("update `pay_user` set `qq_uid` ='' where `pid`='{$pid}'");
		exit("<script language='javascript'>alert('已成功解绑QQ！');window.location.href='./';</script>");
	}
}

$type = isset($_GET['type'])?$_GET['type']:'qq';

if($_GET['code']){
	if($_GET['state'] != $_SESSION['Oauth_state']){
		exit("The state does not match. You may be a victim of CSRF.");
	}
	$Oauth=new Oauth($Oauth_config);
	$arr = $Oauth->callback();
	if(isset($arr['code']) && $arr['code']==0){
		$openid=$arr['social_uid'];
		$access_token=$arr['access_token'];

		$_SESSION['user'] = $arr;
		$openid=$_SESSION['user']['social_uid'];
	$userrow=$DB->query("SELECT * FROM pay_user WHERE qq_uid='{$openid}' limit 1")->fetch();

	if($userrow){
		$pid=$userrow['pid'];
		$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
	//	if($userrow!=null){
	//		exit("<script language='javascript'>alert('当前QQ已绑定商户ID:{$pid}，请勿重复绑定！');window.location.href='./';</script>");
	//	}
			setcookie("user_token", md5($pid.$key), time() + 2505600, '/');
		$_SESSION['Query_pid'] = $pid;
				$_SESSION['Query_key'] = $key;
		exit("<script language='javascript'>window.location.href='./';</script>");
	}elseif(isset($_COOKIE["user_token"]) and $_SESSION['Query_pid'] and $_SESSION['Query_key']){
		$sds=$DB->exec("update `pay_user` set `qq_uid` ='{$openid}' where `pid`='{$pid}'");
		exit("<script language='javascript'>alert('已成功绑定{$pid}！');window.location.href='./';</script>");
	}else{
			$_SESSION['Oauth_qq_openid']=$openid;
		exit("<script language='javascript'>alert('请先绑定商户ID才能使用QQ登录');window.location.href='./login.php?openid=$openid';</script>");
	}

	}elseif(isset($arr['code'])){
		exit('登录失败，返回错误原因：'.$arr['msg']);
	}else{
		exit('获取登录数据失败');
	}
}else{
	$Oauth=new Oauth($Oauth_config);
	$arr = $Oauth->login($type);
	if(isset($arr['code']) && $arr['code']==0){
		exit("<script language='javascript'>window.location.href='{$arr['url']}';</script>");
	}elseif(isset($arr['code'])){
		exit('登录接口返回：'.$arr['msg']);
	}else{
		exit('获取登录地址失败');
	}
}

