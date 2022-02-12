<?php
include("../core/common.php");
$id = $_GET['id'];
$sc = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipaypay.php?id=$id");
$DB->query("update `pay_user` set `jine` ='{$sc}' where `pid`='$id'");
echo $sc;
?>