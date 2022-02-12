<?php
require_once('../core/common.php');
$money = number_format((float)$_GET['money'], 2, '.', ''); //金额统一保留2位小数
$pid  = $_GET['pid'];
$type  = $_GET['type'];
if (!$type) $type = 'alipay';
function moneyToFileName($pid, $money, $type)
{	
	global $DB;
	$row1=$DB->query("SELECT * FROM pay_qrlist WHERE pid='{$pid}' and money='{$money}' and type='{$type}' ORDER BY RAND() LIMIT 1000")->fetch();
	$row2=$DB->query("SELECT * FROM pay_qrlist WHERE pid='{$pid}' and money='index' and type='{$type}' ORDER BY RAND() LIMIT 1000")->fetch();
	
	if($row1){
		$data['pic_url']=$row1['pic_url'];
		$data['qr_url']=$row1['qr_url'];
	}elseif($row2){
		$data['pic_url']=$row2['pic_url'];
		$data['qr_url']=$row2['qr_url'];
	}else{
		$data['pic_url']='http://'.$_SERVER['HTTP_HOST'].'/submit/Mcode/img/no.png';
		$data['qr_url']='';
	}
    return $data;
}


$data = moneyToFileName($pid,$money, $type);
if($_GET['Mcode'])exit(json_encode(array("image"=>$data['pic_url'],"image_url"=>$data['qr_url'])));//Mcode
header('Location: ' . $data['pic_url']); //跳转到二维码真实地址