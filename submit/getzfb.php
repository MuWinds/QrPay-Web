<?php
include("../core/common.php");
$id = $_GET["pid"];
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='$id' limit 1")->fetch();
$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
$jine=$userrow['jine'];
$sc = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipaypay.php?id=$id");
$sbee = $sc-$jine;
echo $sbee;
if ($sbee == "0") {
}
else {
    $DB->query("update `pay_user` set `jine` ='{$sc}' where `pid`='$id'");
    $yus=file_get_contents("http://".$_SERVER['HTTP_HOST']."/appapi.php?act=Mcode_notify&authuser=sksappconfig&type=ALIPAY&pid=$id&key=$key&money=$sbee");
}
?>