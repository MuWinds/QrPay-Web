<?php
error_reporting(0);
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('TEMPLATE_ROOT', ROOT . '/template/');
date_default_timezone_set('Asia/Shanghai');
session_start();
$date = date("Y-m-d H:i:s");
$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';

if(is_file(SYSTEM_ROOT.'360safe/360webscan.php')){//360网站卫士
    require_once(SYSTEM_ROOT.'360safe/360webscan.php');
}

require_once(SYSTEM_ROOT."config.php");

try {
    $DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);
}catch(Exception $e){
    exit('链接数据库失败:'.$e->getMessage());
}
$DB->exec("set names utf8");
include SYSTEM_ROOT.'cache.class.php';
$CACHE=new CACHE();
$conf=$CACHE->pre_fetch();//获取系统配置

if($conf['version'] != $version	&& $update==null){//检测更新
header('Content-type:text/html;charset=utf-8');
	@header('Location:/install/update.php');
exit();
}

if(!$conf['local_domain'])$conf['local_domain']=$_SERVER['HTTP_HOST'];
$password_hash='!@#%!s!0';
require_once(SYSTEM_ROOT."alipay/alipay_core.function.php");
require_once(SYSTEM_ROOT."alipay/alipay_md5.function.php");
include_once(SYSTEM_ROOT."function.php");
include_once(SYSTEM_ROOT."Qr.class.php");
include_once(SYSTEM_ROOT."Cc.class.php");
include_once(SYSTEM_ROOT."Template.class.php");
$runtime= new runtime;   
$runtime->start();
if(isset($_COOKIE["admin_token"]))
{
	$token=authcode(daddslashes($_COOKIE['admin_token']), 'DECODE', $conf['KEY']);
	list($user, $sid) = explode("\t", $token);
	$session=md5($conf['admin_user'].$conf['admin_pass'].$password_hash);
	if($session==$sid) {
		$islogin=1;
	}
}

if(count($_GET))$queryArr=$_GET;else$queryArr=$_POST;
if($queryArr['act']&&$queryArr['pid']&&$queryArr['key']){
$pid=daddslashes($queryArr['pid']);
$key=daddslashes($queryArr['key']);
}else{
$pid=$_SESSION['Query_pid'];
$key=$_SESSION['Query_key'];
}



?>