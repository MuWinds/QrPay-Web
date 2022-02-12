<?php
include("../core/common.php");
$id = $_GET['id'];
$sc = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/qqpaypay.php?id=$id");
$DB->query("update `pay_user` set `jine2` ='{$sc}' where `pid`='$id'");
echo $sc;
?>