<?php
/**
 * QQ互联
**/
include("../core/common.php");
require_once(SYSTEM_ROOT."Oauth.class.php");
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']. '/';//获取本地域名
$allapi	 ='http://en98k.cn/';//QQ快捷登录API地址
$Oauth = new Oauth();
if($_GET['code']){
    $array = $Oauth->callback();
    $openid	  		=	 $array['social_uid'];
    $access_token 	=	 $array['access_token'];

	$userrow=$DB->query("SELECT * FROM pay_user WHERE qq_uid='{$openid}' limit 1")->fetch();
	if($userrow){
		$pid=$userrow['pid'];
		$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
		if($islogin2==1){
			@header('Content-Type: text/html; charset=UTF-8');
			exit("<script language='javascript'>alert('当前QQ已绑定商户ID:{$pid}，请勿重复绑定！');window.location.href='./';</script>");
		}
		$Query = $Instant_Api->Query($pid,$key,1);
		$_SESSION['Query_QQ']=$Query['qq'];
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>window.location.href='./';</script>");
	}elseif(isset($_COOKIE["user_token"]) and $_SESSION['Query_pid'] and $_SESSION['Query_key']){
		$sds=$DB->exec("update `pay_user` set `qq_uid` ='$openid' where `pid`='{$pid}'");
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('已成功绑定{$pid}！');window.location.href='./';</script>");
	}else{
		$_SESSION['Oauth_qq_uid']=$openid;
		exit("<script language='javascript'>alert('请输入商户ID和密钥完成登录');window.location.href='./login.php?connect=true';</script>");
	}
}elseif(isset($_COOKIE["user_token"]) and $_SESSION['Query_pid'] and $_SESSION['Query_key'] and isset($_GET['unbind'])){
	$DB->exec("update `pay_user` set `qq_uid` =NULL where `pid`='$pid'");
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已成功解绑QQ！');window.location.href='./';</script>");
}elseif(isset($_COOKIE["user_token"]) and $_SESSION['Query_pid'] and $_SESSION['Query_key'] and !isset($_GET['bind'])){
	exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
}else{
	$Oauth->login();
}
