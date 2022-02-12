<?php
$title='支付设置';
include("../core/common.php");
include './ha.php';
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);
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
    .panel-default {
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
	$alipayid=daddslashes(strip_tags($_POST['alipayid']));
	$pay_gg=daddslashes(strip_tags($_POST['pay_gg']));
  $outtime=$_POST['outtime']?daddslashes($_POST['outtime']):180;
	if($pay_gg==null||$outtime==null){
		echo'<script>alert("请确保订单时间不能为空！");location.href="./mzfsz.php"</script>';
	}else{
		$sds=$DB->query("update pay_user set pay_gg='$pay_gg',outtime='$outtime',alipayid='$alipayid'  where pid='{$pid}'");
		if($sds)echo'<script>alert("修改成功");location.href="./mzfsz.php"</script>';
		else echo'<script>alert("修改失败");location.href="./mzfsz.php"</script>';
	}
}
?>

	



	<div class="panel panel-default">
		<div class="panel-heading font-bold">
			
		</div>
		<div class="panel-body">
			<form class="form-horizontal devform" action="./mzfsz.php?mod=pay_n" method="post">
				
	
  <div class="content-page">
  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">支付管理</div>
      <div class="layui-card-body">
          支付宝UID:可以不填写
          <br>订单有效时间(秒):1分钟等于60秒 推荐使用180秒(3分钟)
      </div>
    </div>

    
      <div class="layui-card-header">支付页面设置</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group" lay-filter="example">
            <div class="layui-form-item">
              <label class="layui-form-label">支付宝H5</label>
              <div class="layui-input-block">
                <input type="text" name="alipayid" id="alipayid" value="<?php echo $userrow['alipayid']?>" autocomplete="off" placeholder="请输入支付宝UID" class="layui-input">
              </div>
            </div>

              <label class="layui-form-label">订单有效时间(秒)</label>
              <div class="layui-input-block">
                <input type="text" name="outtime" id="outtime" value="<?php echo $userrow['outtime']?>" autocomplete="off" placeholder="请输入订单有效时间" class="layui-input">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">公告</label>
              <div class="layui-input-block">
               <textarea class="form-control" name="pay_gg" rows="6"><?php echo htmlspecialchars($userrow['pay_gg']);?></textarea>
                <div class="layui-form-mid layui-word-aux">[不支持HTML代码] 变量代码：[money] 订单金额 、 </div>
              </div>
            </div>
   
            <div class="layui-input-block">
              <div class="layui-footer" style="left: 0;">
                <button type="submit" class="btn btn-success waves-effect waves-light" id="submit" onclick="submit">立即提交</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include 'foot.php';?>