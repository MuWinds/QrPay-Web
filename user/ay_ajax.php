<?php
include("../core/common.php");
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$act=$_REQUEST['act'];
switch ($act) {
    case 'submit_email':
       
       $email_status = intval($_POST['email_status']);
	$ali_tz = intval($_POST['ali_tz']);
	$wx_tz = intval($_POST['wx_tz']);
	$qq_tz = intval($_POST['qq_tz']);
	$email_smtp = daddslashes($_POST['email_smtp']);
	$email_port = daddslashes($_POST['email_port']);
	$email_name = daddslashes($_POST['email_name']);
	$email_pass = daddslashes($_POST['email_pass']);

	$sql = "select * from pay_emailtz where email_pid = '$pid' limit 1";
	$erow = $DB->query($sql)->fetch();
	if(!$erow){
		$sql = "insert into pay_emailtz(email_status,ali_tz,wx_tz,qq_tz,email_smtp,email_port,email_name,email_pass,email_pid) 
		values('$email_status','$ali_tz','$wx_tz','$qq_tz','$email_smtp','$email_port','$email_name','$email_pass','$pid')";
	}else{
		$sql = "update pay_emailtz set email_status='$email_status',ali_tz='$ali_tz',wx_tz='$wx_tz',qq_tz='$qq_tz',email_smtp='$email_smtp',email_port='$email_port',email_name='$email_name',email_pass='$email_pass' where email_pid = '$pid'";
	}
	
	if($DB->query($sql)){
 		 $result = array("code" => 1, "msg" => "邮箱通知保存成功");
		exit(json_encode($result));
 	}else{
		$result = array("code" => -1, "msg" => "邮箱通知保存失败!");
		exit(json_encode($result));
 	}	
       
        break;
    
    default:
        // code...
        break;
}

