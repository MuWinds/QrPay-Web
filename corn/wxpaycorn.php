<?php
$money = $_GET["money"];
$name = $_GET["name"];
$adminkey = $_GET["adminkey"];
if ($adminkey != "1543253897" ) {
exit(管理员key错误);
}
elseif ($money == "") {
exit(金额为空);
}
elseif ($name == "") {
exit(商户名称为空);
}


include("../core/common.php");
@header('Content-Type: text/html; charset=UTF-8');
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `shopname`='$name' limit 1")->fetch();
$Query=json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']),true);
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
$pid = $userrow['pid'];
file_get_contents("http://".$_SERVER['HTTP_HOST']."/appapi.php?act=Mcode_notify&authuser=sksappconfig&type=WXPAY&pid=$pid&key=$key&money=$money");
echo "回调成功";

$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `shopname2`='$name' limit 1")->fetch();
$Query=json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']),true);
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
$pid = $userrow['pid'];
file_get_contents("http://".$_SERVER['HTTP_HOST']."/appapi.php?act=Mcode_notify&authuser=sksappconfig&type=WXPAY&pid=$pid&key=$key&money=$money");
echo "回调成功";

$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `shopname3`='$name' limit 1")->fetch();
$Query=json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']),true);
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
$pid = $userrow['pid'];
file_get_contents("http://".$_SERVER['HTTP_HOST']."/appapi.php?act=Mcode_notify&authuser=sksappconfig&type=WXPAY&pid=$pid&key=$key&money=$money");
echo "回调成功";