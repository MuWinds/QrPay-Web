<?php
include("./core/common.php");
$pid = $_GET["pid"];
$key = $_GET["key"];
$trade_no = $_GET["dan"];

$srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='$pid' limit 1")->fetch();
$key1=authcode($userrow['key'], 'DECODE', $conf['KEY']);
 $chuli=$srow['status'];
 if($key!=null & $pid!=null){ 
  if($key1==$key){  
     if($chuli==1){  
	         echo'该订单已经支付成功';
}else{  	
   
     $DB->query("update `pay_order` set `status` ='1' where `trade_no`='$trade_no'");
     echo'该订单已经设置成功'; 
	            
	        }
  }else{  	
    
    echo'商户秘钥不正确'; 
	            
 }
 }else{  	
    
    echo'商户id或者key不可为空'; 
	            
  }
 
?>