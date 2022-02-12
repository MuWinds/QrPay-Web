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
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/app.css" type="text/css"/>
     <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>



<?php
$row=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
$mod=isset($_GET['mod'])?$_GET['mod']:null;
$wxcornzt=$_POST['wxcornzt'];
if($mod=='pay_n'){
 $userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
  $shopname=$_POST['shopname']?daddslashes($_POST['shopname']):请输入cookie;
 if($shopname==null){
  echo'<script>alert("请确保cookies不能为空！");location.href="./shopname.php"</script>';
 }else{
  $sds=$DB->query("update pay_user set shopname='$shopname'  where pid='{$pid}'");
  $sdsa=$DB->query("update pay_user set wxcornzt='$wxcornzt'  where pid='{$pid}'");
  if($sds)echo'<script>alert("修改成功");location.href="./shopname.php"</script>';
  else echo'<script>alert("修改失败");location.href="./shopname.php"</script>';
 }
}











?>

 

 <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">商业收款码设置</h1>
</div>
<div class="wrapper-md control">
 <div class="panel panel-default">
  <div class="panel-heading font-bold">

   
  </div>
  <div class="panel-body">
   <form class="form-horizontal devform" action="./shopname.php?mod=pay_n" method="post">
   
   <div class="form-group">
     <label class="col-sm-2 control-label">配置前请邀请站长成为你的商业收款码店员:填写自己的商业收款码门店名称(全称如:xxxx的店铺)</label>
     <div class="col-sm-9">
      <input class="form-control" type="text" name="shopname" id="shopname" value="<?php echo $userrow['shopname']?>">
      
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
  

  
<?php include 'foot.php';?>
