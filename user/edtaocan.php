  <?php
$title='支付设置';
include './head.php';
?>

<?php
@header('Content-Type: application/json; charset=UTF-8');
$tcid=$_GET['tcid'];
$tcts="请在弹出窗口后付款";
	if($tcid==1){
      $tcje=$conf['edtc1jg'];
      exit("<script language='javascript'>alert($pid);location.href='./payapi.php?WIDtotal_fee=$tcje&WIDsubject=额度套餐1充值|$pid&type=wxpay'</script>");
	}elseif($tcid==2){
      $tcje=$conf['edtc2jg'];
      exit("<script language='javascript'>alert($pid);location.href='./payapi.php?WIDtotal_fee=$tcje&WIDsubject=额度套餐2充值|$pid&type=wxpay'</script>");
	}elseif($tcid==3){
      $tcje=$conf['edtc3jg'];
      exit("<script language='javascript'>alert($pid);location.href='./payapi.php?WIDtotal_fee=$tcje&WIDsubject=额度套餐3充值|$pid&type=wxpay'</script>");
	}elseif($tcid==4){
      $tcje=$conf['edtc4jg'];
      exit("<script language='javascript'>alert($pid);location.href='./payapi.php?WIDtotal_fee=$tcje&WIDsubject=额度套餐4充值|$pid&type=wxpay'</script>");
	}
 ?>