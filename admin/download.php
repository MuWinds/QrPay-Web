<?php
include("../core/common.php");

if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");

$batch=$_GET['batch'];
$allmoney=$_GET['allmoney'];
$data='';
$rs=$DB->query("SELECT * from pay_settle where batch='$batch'");

$i=0;
while($row = $rs->fetch())
{
	$i++;
	$data.=$i.','.mb_convert_encoding($row['jsfangshi'], "GB2312", "UTF-8").','.mb_convert_encoding($row['account'], "GB2312", "GB2312").','.mb_convert_encoding($row['username'], "GB2312", "UTF-8").','.$row['money'].''."\r\n";
}

$date=date("Ymd");
$file.="结算流水号,结算方式,结算账号,结算姓名,结算金额\r\n";
$file.=$data;

$file_name='pay_'.date("YmdHis").'.csv';
$file_size=strlen($file);
header("Content-Description: File Transfer");
header("Content-Type:application/force-download");
header("Content-Length: {$file_size}");
header("Content-Disposition:attachment; filename={$file_name}");
echo $file;
?>