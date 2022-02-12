<?php
if(!empty($_GET['qrcode'])){
include("../core/common.php");
exit(qrcode($_GET['qrcode']));
}
$title='在线测试';
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
</head>

<?php
$orders=$DB->query("SELECT count(*) from pay_order WHERE pid={$pid} and software=1")->fetchColumn();

$lastday=date("Y-m-d",strtotime("-1 day")).' 00:00:00';
$today=date("Y-m-d").' 00:00:00';

$order_today=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=1 and endtime>='$today'")->fetchColumn();

$order_lastday=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=1 and addtime>='$lastday' and endtime<'$today'")->fetchColumn();

$settle_money=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and software=1 and status=1")->fetchColumn();

$rs=$DB->query("SELECT * from pay_order where pid={$pid} and status=1 and software=1");
$max_settle=0;
$chart='';
$i=0;
while($row = $rs->fetch())
{
	if($row['money']>$max_settle)$max_settle=$row['money'];
	if($i<9)$chart.='['.$i.','.$row['money'].'],';
	$i++;
}
$chart=substr($chart,0,-1);
?> 

<!---------------------------------------------------额度套餐 结束------------------------------------------------------------>
<!---------------------------------------------------充值额度 开始------------------------------------------------------------>
		<div class="panel panel-info">
		     <div class="content-page">
        <div class="layui-card-header">在线测试</div>
      <div class="layui-card-body">
          使用当前商户在线支付测试
          <small style="color: red">(请配置好通道在测试)</small>
      </div>
		<div class="panel-body">
        <form name="alipayment" action="./SDK/epayapi.php" method="post" target="_blank">
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">商品名称</div>
			<input type="text" name="WIDsubject" value="测试商品" class="form-control" required/>
		  </div></div>
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">付款金额</div>
			<input type="text" name="WIDtotal_fee" value="0.01" class="form-control" required/>
		  </div></div>
		  <dd>
          <label><input type="radio" name="type" value="alipay" checked=""><img src="/assets/img/alipay.gif" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="支付宝"/></label> <label><input type="radio" name="type" value="qqpay"><img src="/assets/img/qqpay.jpg" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="QQ钱包"/></label> <label><input type="radio" name="type" value="wxpay"><img src="/assets/img/weixin.gif" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="微信支付"/></label>
          </dd>
					<button class="btn btn-block btn-info" type="submit">确 认</button>
	    </form>
		</div>
      </div>
              </div>
                        </div>



<!---------------------------------------------------充值额度 结束------------------------------------------------------------>

<?php include 'foot.php';?>