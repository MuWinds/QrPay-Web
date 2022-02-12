<?php
$id = $_GET["id"];
include("../core/common.php");
@header('Content-Type: text/html; charset=UTF-8');
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='$id' limit 1")->fetch();
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);


file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/qqpaypay.php?id=$id");
file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/qqpaypay1.php?id=$id");
file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipaypay.php?id=$id");
file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipaypay1.php?id=$id");


?>