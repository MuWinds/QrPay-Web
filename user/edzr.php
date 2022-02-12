  <?php
$title='支付设置';
include './head.php';
?>

<?php

@header('Content-Type: application/json; charset=UTF-8');

$zckey=$_GET['zckey'];
$zcpid=$_GET['zcpid'];
$srpid=$_GET['srpid'];
$zzed=$_GET['zzed'];

	$row=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$zcpid}' limit 1")->fetch();
	 if(!$row){
       exit("<script language='javascript'>alert('pid不存在!');location.href='./software.php'</script>");
	 }elseif(authcode($row['key'], 'DECODE', $conf['KEY'])!=$zckey){
       exit("<script language='javascript'>alert('key错误!');location.href='./software.php'</script>");
	 }else{
       $row1=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$srpid}' limit 1")->fetch();
        if(!$row1){
exit("<script language='javascript'>alert('收款pid不存在!');location.href='./software.php'</script>");
	 }
       else{
        $userrow1=$DB->query("SELECT * FROM pay_user WHERE pid='{$zcpid}' limit 1")->fetch();
        $jsed= round ($userrow1['paymb'] - $zzed, 2 );
        $DB->query("update `pay_user` set `paymb` ='$jsed' where `pid`='$zcpid'");

        $userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$srpid}' limit 1")->fetch();
        $jsed= round ($userrow['paymb'] + $zzed, 2 );
        $DB->query("update `pay_user` set `paymb` ='$jsed' where `pid`='$srpid'");
 
         $tsxx=('成功从'.$userrow1['pid'].'转出'.$zzed.'元额度到商户'.$userrow['pid']);
         exit("<script language='javascript'>alert('$tsxx');location.href='./software.php'</script>");
	 }
 }
	if($result)
	exit(json_encode($result));
	else
	exit($data);
              
 ?>