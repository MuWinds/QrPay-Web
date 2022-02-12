<?php
include("../core/commom.php");
$title='管理中心';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");

//$sec_msg = sec_check();
?>


<?php
$count1=$DB->query("SELECT count(*) from pay_order")->fetchColumn();
$count2=$DB->query("SELECT count(*) from pay_user")->fetchColumn();
$count3=$DB->query("SELECT sum(money) from pay_order where status='1'")->fetchColumn();

$count4=$DB->query("SELECT count(*) from pay_order where software=1")->fetchColumn();
$count5=$DB->query("SELECT sum(money) from pay_order where status='1' and software=1")->fetchColumn();
$count6=$DB->query("SELECT count(*) from pay_qrlist")->fetchColumn();

$rs=$DB->query("SELECT * from pay_order where status='1' and software=0");
$allmoney=0;
while($row = $rs->fetch())
{
	$allmoney+=$row['money'];
}
$data['ordermoney']=$allmoney;

$rs=$DB->query("SELECT * from pay_user where money!='0.00'");
$allmoney=0;
while($row = $rs->fetch())
{
	$allmoney+=$row['money'];
}
$data['usermoney']=$allmoney;

$rs=$DB->query("SELECT * from pay_order where transfer_status='1' and software=0");
$allmoney=0;
while($row = $rs->fetch())
{
	$allmoney+=$row['money'];
}
$data['settlemoney_1']=$allmoney;

$rs=$DB->query("SELECT * from pay_order where status=1 and transfer_status=2 and software=0");
$allmoney=0;
while($row = $rs->fetch())
{
	$allmoney+=$row['money'];
}
$data['settlemoney_2']=$allmoney;


$lastday=date("Y-m-d",strtotime("-1 day")).' 00:00:00';
$today=date("Y-m-d").' 00:00:00';
$rs=$DB->query("SELECT * from pay_order where status=1 and software=0 and endtime>='$today'");
$order_today=array('alipay'=>0,'tenpay'=>0,'qqpay'=>0,'wxpay'=>0,'all'=>0);
while($row = $rs->fetch())
{
	$order_today[$row['type']]+=$row['money'];
}
$order_today['all']=$order_today['alipay']+$order_today['tenpay']+$order_today['qqpay']+$order_today['wxpay'];

$rs=$DB->query("SELECT * from pay_order where status=1 and software=0 and endtime>='$lastday' and endtime<'$today'");
$order_lastday=array('alipay'=>0,'tenpay'=>0,'qqpay'=>0,'wxpay'=>0,'all'=>0);
while($row = $rs->fetch())
{
	$order_lastday[$row['type']]+=$row['money'];
}
$order_lastday['all']=$order_lastday['alipay']+$order_lastday['tenpay']+$order_lastday['qqpay']+$order_lastday['wxpay'];

$data['order_today']=$order_today;
$data['order_lastday']=$order_lastday;






$lastday=date("Y-m-d",strtotime("-1 day")).' 00:00:00';
$today=date("Y-m-d").' 00:00:00';
$rs=$DB->query("SELECT * from pay_order where status=1 and software=1 and endtime>='$today'");
$order_today2=array('alipay'=>0,'tenpay'=>0,'qqpay'=>0,'wxpay'=>0,'all'=>0);
while($row = $rs->fetch())
{
	$order_today2[$row['type']]+=$row['money'];
}
$order_today2['all']=$order_today2['alipay']+$order_today2['tenpay']+$order_today2['qqpay']+$order_today2['wxpay'];

$rs=$DB->query("SELECT * from pay_order where status=1 and software=1 and endtime>='$lastday' and endtime<'$today'");
$order_lastday2=array('alipay'=>0,'tenpay'=>0,'qqpay'=>0,'wxpay'=>0,'all'=>0);
while($row = $rs->fetch())
{
	$order_lastday2[$row['type']]+=$row['money'];
}
$order_lastday2['all']=$order_lastday2['alipay']+$order_lastday2['tenpay']+$order_lastday2['qqpay']+$order_lastday2['wxpay'];

$data2['order_today']=$order_today2;
$data2['order_lastday']=$order_lastday2;
?>
	<div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><h3 class="panel-title" id="title">后台管理首页</h3></div>
<table class="table table-bordered">
<tbody>
<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon glyphicon-tint"></span>订单总数：</b></br><span id="count1"><?php echo $count1?></span>条</font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-check"></i>商户总数：</b></br></span><span id="count2"><?php echo $count2?></span>个</font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-exclamation-sign"></i>总计金额：</b></span></br><span id="count3"><?php echo $count3?></span>元</font></td>
</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-usd"></i>代收款总金额：</b></br></span><span id="count5"><?php echo $data['ordermoney']+$data['usermoney']?></span>元</font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-usd"></i>代收款结算余额：</b></br><span id="yxts"><?php echo $data['settlemoney_1']?></span>元</font></td>
<td align="center"><font color="#808080"><b><span class="glyphicon glyphicon-usd"></span>代收款未结金额：</b></br><span id="count4"><?php echo $data['settlemoney_2']?></span>元</font></td>
</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-tint"></i>软件版总订单：</b></span></br><span id="count6"><?php echo $count4?></span>个</font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-usd"></i>软件版总金额：</b></br></span><span id="count7"><?php echo $count5?></span>元</font></td>
<td align="center"><font color="#808080"><b><span class="glyphicon glyphicon-tint"></span>软件版二维码数：</b></br><span id="count8"><?php echo $count6?></span>个</font></td>
</tr>

<tr height="25">
<td align="center" colspan="3">
<a href="./set.php?mod=pay" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-cog"></i> 代收款对接设置</a>&nbsp;
<a href="./set.php?mod=else" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-cog"></i> 其他功能设置</a>&nbsp;
<a href="./set.php?mod=template" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-cog"></i> 首页模板设置</a>&nbsp;
<a href="./set.php?mod=mail" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-cog"></i> 发邮件邮箱配置</a>
</td>
</tr>
</tbody>
</table>
</div>
	  <div class="panel panel-success">
          <table class="table table-bordered table-striped">
		    <thead><tr><th class="success">代收款订单收入统计</th><th>支付宝</th><th>微信支付</th><th>QQ钱包</th><th>总计</th></thead>
            <tbody>
			  <tr><td>代收款今日</td><td><?php echo round($data['order_today']['alipay'],2)?></td><td><?php echo round($data['order_today']['wxpay'],2)?></td><td><?php echo round($data['order_today']['qqpay'],2)?></td><td><?php echo round($data['order_today']['all'],2)?></td></tr>
			  <tr><td>代收款昨日</td><td><?php echo round($data['order_lastday']['alipay'],2)?></td><td><?php echo round($data['order_lastday']['wxpay'],2)?></td><td><?php echo round($data['order_lastday']['qqpay'],2)?></td><td><?php echo round($data['order_lastday']['all'],2)?></td></tr>
			</tbody>
          </table>
      </div>
	  <div class="panel panel-success">
          <table class="table table-bordered table-striped">
		    <thead><tr><th class="success">软件版订单收入统计</th><th>支付宝</th><th>微信支付</th><th>QQ钱包</th><th>总计</th></thead>
            <tbody>
			  <tr><td>软件版今日</td><td><?php echo round($data2['order_today']['alipay'],2)?></td><td><?php echo round($data2['order_today']['wxpay'],2)?></td><td><?php echo round($data2['order_today']['qqpay'],2)?></td><td><?php echo round($data2['order_today']['all'],2)?></td></tr>
			  <tr><td>软件版昨日</td><td><?php echo round($data2['order_lastday']['alipay'],2)?></td><td><?php echo round($data2['order_lastday']['wxpay'],2)?></td><td><?php echo round($data2['order_lastday']['qqpay'],2)?></td><td><?php echo round($data2['order_lastday']['all'],2)?></td></tr>
			</tbody>
          </table>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>PHP 版本：</b><?php echo phpversion() ?>
			<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
		</li>
		<li class="list-group-item">
			<b>MySQL 版本：</b><?php $DB_VERSION = $DB->query("select VERSION()")->fetch(); echo $DB_VERSION[0]; ?>
		</li>
		<li class="list-group-item">
			<b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
		</li>
		
		<li class="list-group-item">
			<b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
		</li>
		<li class="list-group-item">
			<b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
		</li>
		<li class="list-group-item">
			<b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
		</li>
	</ul>
</div>
    </div>
  </div>