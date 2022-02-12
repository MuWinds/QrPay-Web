<?php

$title='申请提现';

$title='个人资料';
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
  <link rel="stylesheet" href="./layuiadmin/style/font/iconfont.css">
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
$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$pid}' limit 1")->fetch();
 $enable_money=$userrow['money'];
if ($userrow['rate']!= null){
  $fee = $enable_money * (1 - ($userrow['rate']) / 100);
  $sjdz=round($enable_money - $fee,2);
} else {
   $fee = $enable_money * (1 - ($conf['money_rate']) / 100);
  $sjdz=round($enable_money - $fee,2);
}

if($enable_money<$conf['settle_money']){
  $fee="可提现余额不足";
  $sjdz="可提现余额不足";

  }
if(isset($_GET['act']) && $_GET['act']=='do'){
	if($_POST['submit']=='申请提现'){
		if($userrow['apply']==1){
			exit("<script language='javascript'>alert('你今天已经申请过提现，请勿重复申请！');history.go(-1);</script>");
		}
		if($enable_money<$conf['settle_money']){
			exit("<script language='javascript'>alert('可提现余额不足！');history.go(-1);</script>");
		}
		if($userrow['type']==2){
			exit("<script language='javascript'>alert('您的商户出现异常，无法提现');history.go(-1);</script>");
		}
		$sqs=$DB->query("update `pay_user` set `apply` ='1' where `pid`='$pid'");
$url='http://utf8.api.smschinese.cn/?Uid=fuchenkj&Key=eacba343791c425d7614&smsMob=15555579539&smsText=商户{'.$pid.'}申请提现，提现金额为：'.$enable_money.'元，手续费为：'.$fee.'元，实付金额：'.$sjdz.'元，请进入后台查看！';
$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents = curl_exec($ch);
curl_close($ch);
echo $file_contents;
      exit("<script language='javascript'>alert('申请提现成功！');history.go(-1);</script>"); 
	}
}
?>

<div class="wrapper-md control">
<?php if(isset($msg)){?>
<div class="alert alert-info">
	<?php echo $msg?>
</div>
<?php }?>
<div class="content-page">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">

			申请提现
		</div>
		<div class="panel-body">
			<form class="form-horizontal devform" action="./apply.php?act=do" method="post">
				<div class="form-group">
					<label class="col-sm-2 control-label">收款账号</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" value="<?php echo $userrow['account']?>" disabled>
					</div></div>
				<div class="form-group">
					<label class="col-sm-2 control-label">收款姓名</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" value="<?php echo $userrow['username']?>" disabled>
					</div>
</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">当前余额</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" value="<?php echo $userrow['money']?>" disabled>
					</div>
		</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">可提现余额</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tmoney" value="<?php echo $enable_money?>" disabled>
					</div>
		</div>
		
	<div class="form-group">
					<label class="col-sm-2 control-label">通道费率</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tmoney" value="3%" disabled>
					</div>
			</div>
		
		
              				<div class="form-group">
					<label class="col-sm-2 control-label">提现手续费</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tmoney" value="0.5" disabled>
					</div>
			</div>
			
              				<div class="form-group">
					<label class="col-sm-2 control-label">提现实到金额</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tmoney" value="<?php echo $sjdz-0.5?>" disabled>
					</div>
</div>
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-4"><input type="submit" name="submit" id="sendsms" value="平台T1自动结算" class="btn btn-block btn-info"/><br/>
				 </div>
                  	</div>
				<div class="line line-dashed b-b line-lg pull-in"></div>
				<div class="form-group">
					<label class="col-sm-2"></label>
					<div class="col-sm-6">
					<img class="animation-pulse" src="http://pay.zhycn.xyz/sm/20.png"
					<h4><span class="glyphicon glyphicon-info-sign">
						当前最低提现金额为<b><?php echo $conf['settle_money']?></b>元<br/>
						超过5元小额截图联系客服结算。
				</div>
			</form>
		</div>
	</div>
</div>
    </div>
  </div>
  </div>

<?php include 'foot.php';?>