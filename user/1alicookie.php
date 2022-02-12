<?php
$title='支付宝监控设置';
include("../core/common.php");
$userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query=json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']),true);

?>
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
         <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='pay_n'){
 $userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
  $alicookie=$_POST['alicookie']?daddslashes($_POST['alicookie']):请输入cookie;
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
}
else {
    $ztr = "√正常";
}







?>

 

<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">cookie设置</h1>
</div>
<div class="wrapper-md control">
 <div class="panel panel-default">
  <div class="panel-heading font-bold">
  
  

  </div>
  <div class="panel-body">
   <form class="form-horizontal devform" action="./alicookie.php?mod=pay_n" method="post">
   
   <div class="form-group">
     <label class="col-sm-2 control-label">支付宝cookies配置</label>
     <div class="col-sm-9">
      <input class="form-control" type="text" name="alicookie" id="alicookie" value="<?php echo $userrow['alicookie']?>">
      
     </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-4"><input type="submit" name="submit" value="确定修改" class="btn btn-block btn-info"/><br/>
     </div>
    </div>
  </div>

    <h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
   <td align="center">防掉线状态：<?php echo ($userrow['ali_login']>=time())?'√正常':'X异常';?></i></font></td><br>
  支付宝cookie状态：<?php echo $ztr; ?><br></h9>
      <h9 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
   <td align="center">请自行对该网站进行监控 <br> http://<?php echo $_SERVER['HTTP_HOST'] ?>/corn/corn.php?id=<?php echo $pid; ?><br></h9>
  
<?php include 'foot.php';?>
