<?php
error_reporting(0);

$act=$_GET['act'];
if($act=='Get_QrUrl'){//提交获取二维码二请求
	$result = get_curl('http://cookie.codepay9.cn/Cookies_Api.php?act=Get_QrUrl');
	$result = json_decode($result,true);
	$result=array("code"=>$result['code'],"msg"=>$result['msg'],"id"=>$result['id']);
}elseif($act=='QrUrl'){//取登录二维码
	$id = $_POST['id']?$_POST['id']:$_GET['id'];
	$result = get_curl('http://cookie.codepay9.cn/Cookies_Api.php?act=QrUrl&id='.$id);
	$json = json_decode($result,true);
	if($json['qr_url']){
		$result = array("code"=>$result['code'],"msg"=>"取登录二维码成功","id"=>$json['id'],"qr_url"=>$json['qr_url']);
	}else{
		$result=array("code"=>$result['code'],"msg"=>$result['msg'],"id"=>$result['id'],"qr_url"=>false);
	}
}elseif($act=='Get_Cookie'){//取登录cookie
	$id = $_POST['id']?$_POST['id']:$_GET['id'];
	$result = get_curl('http://cookie.codepay9.cn/Cookies_Api.php?act=Get_Cookie&id='.$id);
	$json = json_decode($result,true);
	if($json['cookie']){
		$result=array("code"=>$json['code'],"msg"=>$json['msg'],"id"=>$json['id'],"cookie"=>base64_decode($json['cookie']));
	}else{
		$result=array("code"=>$json['code'],"msg"=>$json['msg'],"id"=>$json['id'],"cookie"=>false);
	}
}else{
	$result=array("code"=>-9,"msg"=>"参数错误");
}
if($result)
	exit(json_encode($result));
else
	exit($data);



function get_curl($url,$post=0,$referer=0,$cookie=0,$header=0,$ua=0,$nobaody=0){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$httpheader[] = "Accept:*/*";
	$httpheader[] = "Accept-Encoding:gzip,deflate,sdch";
	$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
	$httpheader[] = "Connection:close";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	if($post){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	if($header){
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
	}
	if($cookie){
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	if($referer){
		if($referer==1){
			curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
		}else{
			curl_setopt($ch, CURLOPT_REFERER, $referer);
		}
	}
	if($ua){
		curl_setopt($ch, CURLOPT_USERAGENT,$ua);
	}else{
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 4.4.2; NoxW Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36');
	}
	if($nobaody){
		curl_setopt($ch, CURLOPT_NOBODY,1);
	}
	curl_setopt($ch, CURLOPT_ENCODING, "gzip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$ret = curl_exec($ch);
	curl_close($ch);
	return $ret;
}
?>