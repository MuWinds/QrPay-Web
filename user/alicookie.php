<?php
$title='支付宝监控设置';
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
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
    .content-page {
  border-color: #dee5e7;
  overflow: scroll;
  height: 550px;
}
    </style>
</head>



<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='pay_n'){
	$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
  $alicookie=$_POST['alicookie']?daddslashes($_POST['alicookie']):请输入授权值;
	if($alicookie==null){
		echo'<script>alert("请确保cookies不能为空！");location.href="./alicookie.php"</script>';
	}else{
		$sds=$DB->query("update pay_user set alicookie='$alicookie'  where pid='{$pid}'");
		if($sds)echo'<script>alert("修改成功");location.href="./alicookie.php"</script>';
		else echo'<script>alert("修改失败");location.href="./alicookie.php"</script>';
	}
}


$zt = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipaypay.php?id=$pid");
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
<body>

<div class="content-page">
 <div class="panel panel-default">
  <div class="panel-heading font-bold">
  
  

  </div>
  <div class="panel-body">
			<form class="form-horizontal devform" action="./alicookie.php?mod=pay_n" method="post">
			
			<div class="form-group">
			     <div class="layui-card-header">支付宝免挂</div>
			    <div class="layui-card-body">
         扫码登录后提交
          <small style="color: red">(显示余额为监控成功) <a href="/user/1alicookie.php" class="badge badge-info" style="margin-top: 1px;cursor: pointer" target="_blank">点击手动填cookie</a></small>
          </div>
					<label class="col-sm-2 control-label">监控余额</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="dqalicookie" id="dqalicookie" value="<?php echo $zt;?>" disabled>
					</div>
				</div>
		
		
			<div class="form-group">
					<label class="col-sm-2 control-label" id="textre">登录二维码</label>
					<div class="col-sm-9">
           <p id="LoginQrcode"><?php echo $modd ?></P>
	  		</div>
			</div>
<script type="text/javascript">	
	QrCode_id = 0;//登陆二维码识别ID
	Update_Get_QrUrl= 0;//判断是否成功提交获取登陆二维码申请
	Update_QrUrl= 0;//判断是否已经获取到登陆二维码
	Update_Get_Cookie = 0;//判断是否已经获取到COOKIE
	
	
function GET_QRlist() {
		//提交获取登录二维码请求
	if(Update_Get_QrUrl==0){
		var ii = layer.load(5, {shade:[0.1,'#fff']});
		var type = 'alipay'
		$.get("../qrcode/cookie/alipay/Ajax.php?act=Get_QrUrl",{type:type},function(data){
			layer.close(ii);
			if(data.id!=''){
				QrCode_id = data.id;
				Update_Get_QrUrl=1;

			}else{
				Update_Get_File=2;
				layer.msg(data.msg);
			}
		
		},"JSON");
	}
		//开始获取登陆二维码
	if( Update_Get_QrUrl==1 && Update_QrUrl==0){
		var ii = layer.load(5, {shade:[0.1,'#fff']});
		$.get("../qrcode/cookie/alipay/Ajax.php?act=QrUrl",{id:QrCode_id},function(data){
			layer.close(ii);
			if(data.qr_url!=''){
				if(type=='alipay')
					var is_type = '支付宝';
				else
					var is_type = '支付宝';
				$("#LoginQrcode").html('<img id="show_qrcode" alt="加载中..." src="'+data.qr_url+'" title="扫码登录" width="200" height="200" style="display: block;">');//输出登录二维码
				Update_QrUrl=1; 
			}else if(data.code==-1){
				Update_QrUrl=2;
				layer.msg(data.msg);
			}
		
		},"JSON");
	}	
	
	//开始检测登陆获取COOKIE
	if(Update_QrUrl==1 && Update_Get_Cookie==0){
		$.get("../qrcode/cookie/alipay/Ajax.php?act=Get_Cookie",{id:QrCode_id},function(data){
			if(data.cookie!=''){
				Update_Get_Cookie=1; 
				$("#LoginQrcode").html('<textarea class="form-control" name="alicookie" id="alicookie" rows="10">'+data.cookie+'</textarea>');//输出登录二维码
				$("#textre").html('最新cookie');//输出登录二维码
			}else if(data.code==-1){
				Update_Get_Cookie=2;
				layer.msg(data.msg);
			}
		
		},"JSON");
	}
}
GET_QRlist();

//周期监听 
window.setInterval(function () {
	GET_QRlist();
}, 2000); 

	</script>
	

	
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-4"><input type="submit" name="submit" value="确定修改" class="btn btn-block btn-info"/><br/>
				 </div>
    </div>
  </div>
   <h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">获取授权值之后直接点（确定修改）即可，无需复制黏贴<br></h9>
  <h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
				<td align="center">如果扫码提交后还是无法成功获取余额，请重新扫码登录<br></h9>
  <h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">支付宝需要用另一个手机扫码登入，截图登入无效 开启了余额自动转入余额宝的请关闭此功能<br></h9>
			<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">二维码有效时间3分钟，如果二维码扫出来无内容，请刷新网页重新获取<br></h9>
  		<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">支付宝状态：<?php echo $ztr; ?><br></h9>
  		  		<h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
			<td align="center">请自行对该网站进行监控 <br> http://<?php echo $_SERVER['HTTP_HOST'] ?>/corn/corn.php?id=<?php echo $pid; ?><br></h9>
 </bdoy>
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



