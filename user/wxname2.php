<?php
$title='微信监控设置';
include("../core/common.php");
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);

if($userrow['sjian']>=time())
		$edj=true;

if(!$edj){
sysmsg('<h2>你不是会员，无权限<h2>');
}

if(!checkIfActive('index,userinfo,') AND !$userrow['weixin']){

sysmsg('<h2>轮训通道收费，联系客服开通<h2>');

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
</head>




<?php
$row=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
$mod=isset($_GET['mod'])?$_GET['mod']:null;
$nameid=$_POST['nameid'];
$zsname=$_POST['zsname'];
$wxcornzt=$_POST['wxcornzt'];
if($mod=='pay_n'){
$zsnamea = mb_substr($zsname,-1,1,'utf-8');
$shopname3 = "$nameid(**$zsnamea)";
	$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
		$sdsa=$DB->query("update pay_user set nameid='$nameid'  where pid='{$pid}'");
		$sdsb=$DB->query("update pay_user set zsname='$zsname'  where pid='{$pid}'");
		$sdsc=$DB->query("update pay_user set wxcornzt='$wxcornzt'  where pid='{$pid}'");
		$sds=$DB->query("update pay_user set shopname3='$shopname3'  where pid='{$pid}'");
		if($sds)echo'<script>alert("修改成功");location.href="./wxname2.php"</script>';
		else echo'<script>alert("修改失败");location.href="./wxname2.php"</script>';
	
}


?>

	<div class="content-page">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">
			
		</div>
		<div class="panel-body">
			<form class="form-horizontal devform" action="./wxname2.php?mod=pay_n" method="post">
			
			<div class="form-group">
			  <div class="layui-card-header">设置说明</div>
      <div class="layui-card-body">
          轮训通道微信⑵
      </div>
    </div>
                 <div class="form-group">
					<label class="col-sm-2 control-label">微信网名</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="nameid" id="nameid" value="<?php echo $userrow['nameid']?>">
						
					</div>
					</div>
		    <div class="form-group">
					<label class="col-sm-2 control-label">微信实名</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="zsname" id="zsname" value="<?php echo $userrow['zsname']?>">
						
					</div>
					</div>
					
					  <div class="form-group">
                    <label class="col-sm-2 control-label">微信免挂</label>
                     <div class="col-sm-9">
                     <select class="form-control" name="wxcornzt" id="wxcornzt" default="1">
<?php
if($row['wxcornzt']=="1")
{
echo '<option value="1" selected="selected">开启</option>';
echo '<option value="0" >关闭</option>';
}
else
{
echo '<option value="1" >开启</option>';
echo '<option value="0" selected="selected">关闭</option>';
}
?>
					
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-4"><input type="submit" name="submit" value="确定修改" class="btn btn-block btn-info"/><br/>
				 </div>
    </div>
  </div>



     <li><a href="./shopname.php" target="_blank">点击前往配置商业收款码</a></li> 如果你是商业收款码上面信息请先清空
    <h9 class="list-group-item"><span class="pull-right"> </span>
   
      

<?php include 'foot.php';?>