<?php
require_once('../core/common.php');
	$money=number_format((float)daddslashes($_GET['money']), 2, '.', '');
	//echo $money;
	$time=time();
	$row=$DB->query("SELECT * FROM pay_order WHERE price='{$money}' and type='{$_GET['type']}' and pid='{$_GET['pid']}' and outtime>'{$time}' order by trade_no desc limit 1")->fetch();

	if(!$row){
		exit('此订单不存在!'.$money.$_GET['type'].$_GET['supply_id'].$time);	
	}elseif($row['status']==1){
		exit('订单已经支付过或者已经超时了');	
	}

	

    if($_GET['yan'] == 'JKC09fskcp9s4ks' && $row['status']==0) {
    	$trade_no = $row['trade_no'];
		$DB->query("update `pay_order` set `status` ='1',`endtime` ='{$date}',`tmoney` ='{$row['money']}' where `trade_no`='$trade_no'");
		$srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
		//发送通知给商户平台
		$pid=$srow['pid'];
		$data['pid']=$srow['pid'];
		$data['out_trade_no']=$srow['out_trade_no'];
		$data['trade_no']=$srow['trade_no'];
		$data['endtime']=$srow['endtime'];
		$data['status']=$srow['status'];
		$data['money']=$srow['money'];
		$data['price']=$srow['price'];
		$data['tmoney']=$srow['tmoney'];
		$data['name']=$srow['name'];
		$data['type']=$srow['type'];
		$key=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
	    $data['sign']=md5($data['pid'].$data['money'].$data['type'].$data['name'].$data['tmoney'].$key['key']);

    //	$jsed= round ($key['paymb'] - $money, 2 );
   //  $DB->query("update `pay_user` set `paymb` ='$jsed' where `pid`='$pid'");
		//file_put_contents('filename.txt', print_r($b, true));
	  

		$url=$srow['notify'].'?pid='.$data['pid'].'&out_trade_no='.$data['out_trade_no'].'&trade_no='.$data['trade_no'].'&endtime='.$data['endtime'].'&status='.$data['status'].'&money='.$data['money'].'&price='.$data['price'].'&tmoney='.$data['tmoney'].'&name='.$data['name'].'&type='.$data['type'].'&sign='.$data['sign'];
		

	    //echo $url;
       
       $real=get_curl($url,$data);
      $DB->query("update pay_user set paymb = paymb-'{$srow['money']}' where pid = '{$srow['pid']}'");
       if($real!='success')$real=get_curl($srow['notify'],$data);	
		//发送通知给商户平台
		$url=creat_callback($srow);
		get_curl($url['notify']);
		
		exit($real);
    }else{
    echo "验证失败";
}
    

?>