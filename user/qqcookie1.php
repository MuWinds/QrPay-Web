<?php
$title='QQ财付通监控设置';
include("../core/common.php");
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);

if($userrow['sjian']>=time())
		$edj=true;

if(!$edj){
sysmsg('<h2>你不是会员，无权限<h2>');
}
include './ha.php';
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';

?>
<!---------------------------------------------------绑定QQ扫码验证 开始------------------------------------------------------------>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><?php echo $title ?> | <?= $conf['sitename'] ?>-<?= $conf['title'] ?></title>
    <meta name="keywords" content="<?php echo $conf['keywords'] ?>">
    <meta name="description" content="<?php echo $conf['description'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/animate.css/3.5.2/animate.min.css" type="text/css"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/simple-line-icons/2.4.1/css/simple-line-icons.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/user/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">
  <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css"  media="all">
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<?php




$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='pay_n'){
	$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
  $qqcookie1=$_POST['qqcookie1']?daddslashes($_POST['qqcookie1']):请输入cookie;
  $payQQ1=$_POST['payQQ1']?daddslashes($_POST['payQQ1']):请输入QQ;
	if($qqcookie1==null){
		echo'<script>alert("请确保cookies不能为空！");location.href="./qqcookie1.php"</script>';
	}else{
		$sds=$DB->query("update pay_user set qqcookie1='$qqcookie1'  where pid='{$pid}'");
		$sdsa=$DB->query("update pay_user set payQQ1='$payQQ1'  where pid='{$pid}'");
		if($sds)echo'<script>alert("修改成功");location.href="./qqcookie1.php"</script>';
		else echo'<script>alert("修改失败");location.href="./qqcookie1.php"</script>';
	}
}





$zt = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/qqpaypay1.php?id=$pid");
if ($zt == "-1") {
    $ztr = "X异常";
     $m="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js";
   $mo="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js";
    $mod="http://cdn.staticfile.org/layer/2.3/layer.js";
    $modd="二维码获取中...";
}
else {
    $ztr = "√正常";
    $modd="未失效，无需获取";
   
}

?>

<!DOCTYPE html>
<head>
  <script src="<?php echo $m ?>"></script>
  <script src="<?php echo $mo ?>"></script>
  <script src="<?php echo $mod ?>"></script>
</head>
      <style>
    .content-page {
  border-color: #dee5e7;
  overflow: scroll;
  height: 550px;
}
    </style>
<div class="content-page">
 <div class="panel panel-default">
  <div class="panel-heading font-bold">
</div>
  <div class="panel-body">
			<form class="form-horizontal devform" action="./qqcookie1.php?mod=pay_n" method="post">
			<div class="form-group">
			    <div class="layui-card-header">QQ免挂轮训通道①</div>
			    <div class="layui-card-body">
         点击获取登录 扫码登录后复制填写到余额栏
          <small style="color: red">(QQ钱包无余额会显示异常)</small>  <small style="margin-top: 1px;cursor: pointer" id="1checkOrder" class="badge badge-info">点击获取登录</small>
      </div>
					<label class="col-sm-2 control-label">监控余额</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="qqcookie1" id="qqcookie1" value="<?php echo $zt;?>" 
					</div>
				</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">收款QQ</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="payQQ1" id="payQQ1" value="<?php echo $userrow['payQQ1']?>">
						
					</div>
					</div>

<script>
    $(function () {
		$('#1checkOrder').on('click', function(){
		layer.open({
  type: 2,
  area: ['250px', '250px'],
  fixed: false, //不固定
  maxmin: true,
  content: 'http://pay.codepay9.cn/qqpay/index.php'
});
	});
	});
</script>	

<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-4"><input type="submit" name="submit" value="确定修改" class="btn btn-block btn-info"/><br/>
				 </div>
    </div>
  </div>

 
  
   <h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">QQ需要用另一个手机扫码登入（部分手机QQ可以截图）截图登入无效，使用QQtim版可截图扫码登入<br></h9>
			<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">如果有余额却一直登录不上向该收款QQ转账0.01元:长期无交易记录会登录不上<br></h9>
			<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">显示余额则为监控成功,显示-1表示失效<br></h9>
    		<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">
		财付通状态：<?php echo $ztr; ?><br></h9>
  		  		<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">请自行对该网站进行监控 <br> http://<?php echo $_SERVER['HTTP_HOST'] ?>/corn/corn.php?id=<?php echo $pid; ?><br></h9>
  
<?php include 'foot.php';?>

<script>//禁止右键

function click(e) {

if (document.all) {

if (event.button==2||event.button==3) { alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");

oncontextmenu='return false';

}

}

if (document.layers) {

if (e.which == 3) {

oncontextmenu='return false';

}

}

}

if (document.layers) {

document.captureEvents(Event.MOUSEDOWN);

}

document.onmousedown=click;

document.oncontextmenu = new Function("return false;")

document.onkeydown =document.onkeyup = document.onkeypress=function(){ 

if(window.event.keyCode == 12) { 

window.event.returnValue=false;

return(false); 

} 

}

</script>



  <script>//禁止F12

function fuckyou(){

window.close(); //关闭当前窗口(防抽)

window.location="about:blank"; //将当前窗口跳转置空白页

}



function click(e) {

if (document.all) {

  if (event.button==2||event.button==3) { 

alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");

oncontextmenu='return false';

}



}

if (document.layers) {

if (e.which == 3) {

oncontextmenu='return false';

}

}

}

if (document.layers) {

fuckyou();

document.captureEvents(Event.MOUSEDOWN);

}

document.onmousedown=click;

document.oncontextmenu = new Function("return false;")

document.onkeydown =document.onkeyup = document.onkeypress=function(){ 

if(window.event.keyCode == 123) { 

fuckyou();

window.event.returnValue=false;

return(false); 

} 

}

</script>


