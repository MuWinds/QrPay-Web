<?php
include("../core/common.php");
$act=$_GET['act'];

	require_once SYSTEM_ROOT.'class.geetestlib.php';
	$GtSdk = new GeetestLib($conf['captcha_id'], $conf['captcha_key']);
	$data = array(
		'user_id' => $cookiesid, # 网站用户id
		'client_type' => "web", # web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
		'ip_address' => real_ip() # 请在此处传输用户请求验证时所携带的IP
	);
	$status = $GtSdk->pre_process($data, 1);
	$_SESSION['gtserver'] = $status;
	$_SESSION['user_id'] = $cookiesid;


if($act=='reg_email'){//获取注册验证码
	$qq=$_POST["qq"]?$_POST["qq"]:$_GET["qq"];
	$email=$qq.'@qq.com';
	$sub = $conf['sitename'].' - 注册验证码';
	$code=mt_rand(100000,999999);//6位随机验证码
	$msg = '您的验证码是：'.$code;
	$_SESSION["code"]=$code;//赋予值
	$isqq=$DB->query("SELECT * FROM pay_user WHERE qq='{$qq}' limit 1")->fetch();
	if($isqq){
			$result=array("code"=>-2,"msg"=>"发送验证码失败,此QQ已经注册过了");
	}else{
		$send_res = send_mail($email, $sub, $msg);
		if($send_res==true&&$_SESSION["code"]){
			$result=array("code"=>1,"msg"=>"发送验证码成功,请进入QQ邮箱查看");
		}else{
			$result=array("code"=>-1,"msg"=>"发送验证码失败,邮箱配置不正确");
		}
	}
}

 
if($act=='ewm_email'){//获取注册验证码
	$qq=$_POST["qq"]?$_POST["qq"]:$_GET["qq"];
	$email=$qq.'@qq.com';
	$sub = $conf['sitename'].' - 注册验证码';
	$code=mt_rand(100000,999999);//6位随机验证码
	$msg = '您的验证码是：'.$code;
	$_SESSION["code"]=$code;//赋予值
	$isqq=$DB->query("SELECT * FROM pay_user WHERE qq='{$qq}' limit 1")->fetch();
	if($isqq){
			$result=array("code"=>-2,"msg"=>"发送验证码失败,此QQ已经注册过了");
	}else{
		$send_res = send_mail($email, $sub, $msg);
		if($send_res==true&&$_SESSION["code"]){
			$result=array("code"=>1,"msg"=>"发送验证码成功,请进入QQ邮箱查看");
		}else{
			$result=array("code"=>-1,"msg"=>"发送验证码失败,邮箱配置不正确");
		}
	}
}


if($act=='find'){//获取注册验证码
	$qq=$_POST["qq"]?$_POST["qq"]:$_GET["qq"];
	$email=$qq.'@qq.com';
	//$sub = $conf['sitename'].' - 注册验证码';
	//$code=mt_rand(100000,999999);//6位随机验证码
	
	//$_SESSION["code"]=$code;//赋予值
	$isqq=$DB->query("SELECT * FROM pay_user WHERE qq='{$qq}' limit 1")->fetch();
	
	if($isqq){
	    $key=$isqq['pass'];
	    
		$msg = '您的ID:'.$isqq['pid'].' 密码:'.$key.'  请登陆后修改!';
			$send_res = send_mail($email, '找回资料', $msg);
			$result=array("code"=>1,"msg"=>"您的资料已经发送至您的QQ邮箱");
	}else{
	
		
			$result=array("code"=>-1,"msg"=>"您的邮箱未注册!无法找回!");
		}
	
}elseif($act=='reg'){//注册商户
	$pid='10'.mt_rand(100,999);
    $pass =daddslashes($_POST['pass']);
	$qq =daddslashes($_POST['qq']);
	$code =daddslashes($_POST['code']);
	$isqq=$DB->query("SELECT * FROM pay_user WHERE qq='{$qq}' limit 1")->fetch();
	if(!$qq or !$pass){
		$result=array("code"=>-1,"msg"=>"qq.KEY不能为空");
	}elseif(strlen($code)!=6 or $code!=$_SESSION["code"]){
		$result=array("code"=>-1,"msg"=>"验证码错误");
	}elseif($isqq){
$result=array("code"=>-1,"msg"=>"此QQ已经注册过了");
	}else{
		
		require_once SYSTEM_ROOT.'class.geetestlib.php';
			$GtSdk = new GeetestLib($conf['captcha_id'], $conf['captcha_key']);
			
			$cookiesid = $_COOKIE['mysid'];
			$data = array(
				'user_id' => $cookiesid,
				'client_type' => "web",
				'ip_address' => real_ip()
			);
		if($conf['captcha_open']==1){
			if(!$_POST['geetest_challenge'] && !$_POST['geetest_validate'] && !$_POST['geetest_seccode'])exit('{"code":2,"msg":"请先完成验证"}');
			
			if ($_SESSION['gtserver'] == 1){   //服务器正常
				if(!$GtSdk->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $data))exit('{"code":-1,"msg":"验证失败，请重新验证"}');
			}else{  //服务器宕机,走failback模式
				if(!$GtSdk->fail_validate($_POST['geetest_challenge'],$_POST['geetest_validate'],$_POST['geetest_seccode']))exit('{"code":-1,"msg":"验证失败，请重新验证"}');
			}
		}
		//unset($_SESSION['code']);//销毁验证码
		
		
		
		
		$sds=$DB->exec("INSERT INTO `pay_user` (`pid`,`pass`,`qq`,`money`,`paymb`,`outtime`) VALUES ('{$pid}','{$pass}','{$qq}','0.00','0.00','120')");

		//$pid=$DB->exec("SELECT LAST_INSERT_ID()");
		if($sds){
			
		$tr=$DB->query("SELECT * FROM pay_user WHERE qq='{$qq}' limit 1")->fetch();
		$pid=$tr['pid'];
		setcookie("user_token", md5($pid.$pass), time() + 2505600, '/');
				$_SESSION['Query_pid'] = $pid;
				$_SESSION['Query_key'] = $pass;
			$result=array("code"=>1,"msg"=>"您的PID:{$pid}，注册成功(请牢记PID)");
		}else{
			$result=array("code"=>-1,"msg"=>"注册失败,换个注册资料重试");
		}
	}

		
	
}elseif($act=='login'){//登录商户
	$pid=daddslashes($_POST['pid']);
	$pass=daddslashes($_POST['pass']);
		$openid=daddslashes($_POST['openid']);
		if(!$pid or !$pass){
			$result=array("code"=>-2,"msg"=>"PID.KEY不能为空");
		}else{
			
			require_once SYSTEM_ROOT.'class.geetestlib.php';
			$GtSdk = new GeetestLib($conf['captcha_id'], $conf['captcha_key']);
			
			$cookiesid = $_COOKIE['mysid'];
			$data = array(
				'user_id' => $cookiesid,
				'client_type' => "web",
				'ip_address' => real_ip()
			);
		if($conf['captcha_open']==1){
			if(!$_POST['geetest_challenge'] && !$_POST['geetest_validate'] && !$_POST['geetest_seccode'])exit('{"code":2,"msg":"请先完成验证"}');
			
			if ($_SESSION['gtserver'] == 1){   //服务器正常
				if(!$GtSdk->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $data))exit('{"code":-1,"msg":"验证失败，请重新验证"}');
			}else{  //服务器宕机,走failback模式
				if(!$GtSdk->fail_validate($_POST['geetest_challenge'],$_POST['geetest_validate'],$_POST['geetest_seccode']))exit('{"code":-1,"msg":"验证失败，请重新验证"}');
			}
		}
			
		    $user_IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
			$lastSunday = date('Y-m-d H:i:s',time());
			$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
			$ke=$userrow['pass'];
			if($pid==$userrow['pid'] && $pass==$ke) {
			setcookie("user_token", md5($pid.$pass), time() + 2505600, '/');
				$_SESSION['Query_pid'] = $pid;
				$_SESSION['Query_key'] = $pass;
              	if($openid!=null){
					$DB->exec("update `pay_user` set `qq_uid` ='{$openid}' where `pid`='{$pid}'");
					}
		    	$result=array("code"=>1,"msg"=>"登录成功,正在进入商户中心");
			}else{
				$result=array("code"=>-1,"msg"=>"登录失败帐号或密码错误");
			}
			
		}

}elseif($act=='add_qr'){//添加二维码
	$pic_url=daddslashes($_POST['pic_url']);
	$qr_url=daddslashes($_POST['qr_url']);
	$type=daddslashes($_POST['type']);
	$money=daddslashes($_POST['money']);
	$money=number_format((float)daddslashes($money), 2, '.', '');
	$money=$money>0?$money:'index';
	$qr=$DB->query("SELECT * FROM `pay_qrlist` WHERE `pid`='{$pid}' and `type`='{$type}' and `money`='{$money}' limit 1")->fetch();
		if(!$pic_url or !$qr_url or !$type or !$money){
			$result=array("code"=>-2,"msg"=>"信息都不能为空,重新上传二维码");
		}elseif($qr_url=='识别中'){
			$result=array("code"=>-4,"msg"=>"二维码未解码成功,重新上传二维码");
		}else{
			$date=date("Y-m-d");
			$arr=$DB->exec("INSERT INTO `pay_qrlist` (`pid`, `pic_url`, `qr_url`, `type`, `money`, `addtime`) VALUES ('{$pid}', '{$pic_url}', '{$qr_url}', '{$type}', '{$money}', '{$date}')");
			if($arr){
				$result=array("code"=>1,"msg"=>"成功上传二维码,刷新即可看到，请确定你的二维码已经去除边框了,否则用户们无法支付，如果没有去除,请删除了重新上传");
			}else{
				$result=array("code"=>-1,"msg"=>"上传二维码失败,解码二维码不成功(原因:边框过大，识别不出二维码，请剪接里面的二维码出来再上传");
			}
		}


}elseif($act=='dell_qr'){//删除二维码
	$id=daddslashes($_POST['id']);
	$qr=$DB->query("SELECT * FROM `pay_qrlist` WHERE `id`='{$id}' limit 1")->fetch();
		if(!$id){
			$result=array("code"=>-2,"msg"=>"信息都不能为空,请刷新重试试");
		}elseif($pid!=$qr['pid']){
			$result=array("code"=>-2,"msg"=>"此二维码并非你的,无法删除");
		}else{
			$sql="DELETE FROM `pay_qrlist` WHERE `id`='{$id}' limit 1";
			if($DB->exec($sql)){
				$result=array("code"=>1,"msg"=>"删除二维码成功");
			}else{
				$result=array("code"=>-1,"msg"=>"删除二维码失败");
			}
		}
}elseif($act=='edit'){//修改商户信息
	$qq=daddslashes($_POST['qq']);
	$pass=daddslashes($_POST['pass']);
	$outtime=$_POST['outtime']?daddslashes($_POST['outtime']):180;
	$repeat=$_POST['repeat']?daddslashes($_POST['repeat']):1;
		if(!$qq or !$pass or !$outtime or !$repeat){
			$result=array("code"=>-1,"msg"=>"修改失败:所有内容不能留空");
		}else{
			
			/*$Query = $Instant_Api->Change($key,$qq,$outtime,$repeat);
			if($Query['code']==1){
				//$Instant_Api->Query($Query_pid,$key,1);
				setcookie("user_token", md5($pid.$key), time() + 1800, '/');
				$_SESSION['Query_pid'] = $pid;
				$_SESSION['Query_key'] = $key;
               $key1=authcode($key, 'DNCODE',$conf['KEY']);
              
				$DB->query("update `pay_user` set `key`='{$key1}' where pid='{$pid}'");
              $DB->query("update `pay_user` set `qq`='{$qq}' where pid='{$pid}'");
				$result=array("code"=>1,"msg"=>"修改成功，如果你正在挂软件,修改了key，需要请重登录软件，否则无法同步数据!");
			}else{
				$result=array("code"=>-1,"msg"=>"修改失败:{$Query['msg']}");
			}*/
		setcookie("user_token", md5($pid.$key), time() + 1800, '/');
				$_SESSION['Query_pid'] = $pid;
				$_SESSION['Query_key'] = $key;
              // $key1=authcode($key, 'DNCODE',$conf['KEY']);
            
              //$sqs=$DB->exec("update `pay_user` set `key` ='{$userrow['key']}',`qq` ='{$qq}',`pass` ='{$pass}' where `pid`='{$pid}'");   
	             $sqs=$DB->query("update pay_user set qq='$qq',pass='$pass' where pid='{$pid}'");
			if($sqs){
				$result=array("code"=>1,"msg"=>"修改成功!，如果你修改了key，需要请重填写对接key，否则无法同步数据!");
			}else{
				$result=array("code"=>-1,"msg"=>"修改失败!");
			}

	}
}elseif($_GET['act']=='smrz'){
	$username=(strip_tags($_POST['username']));
	$account=(strip_tags($_POST['account']));

  		if($DB->query("update pay_user set username='$username',account='$account' ,`jsfangshi` ='支付宝',`issmrz` ='1' ,`paymb` ='{$conf['zczsed']}' where pid='{$pid}'")){
				$result=array("code"=>1,"msg"=>"修改成功");
          

			}else{
				$result=array("code"=>-1,"msg"=>"修改失败");
			}

}
if($result)exit(json_encode($result));
?>
    <?php 	echo $GtSdk->get_response_str(); ?>