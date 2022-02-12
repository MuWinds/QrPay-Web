<?php

$title='易支付管理';
$title='个人资料';
include("../core/common.php");

@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);
?>
<?php
$orders=$DB->query("SELECT count(*) from pay_order WHERE pid={$pid} and software=0")->fetchColumn();

$lastday=date("Y-m-d",strtotime("-1 day")).' 00:00:00';
$today=date("Y-m-d").' 00:00:00';

$order_today=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=0 and endtime>='$today'")->fetchColumn();

$order_lastday=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=0 and addtime>='$lastday' and endtime<'$today'")->fetchColumn();

$settle_money=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and transfer_status=1 and software=0")->fetchColumn();

$rs=$DB->query("SELECT * from pay_order where pid={$pid} and status=1 and software=0");
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

function do_callback($data){
	global $DB,$userrow;
	if($data['status']>=1)$trade_status='TRADE_SUCCESS';
	else $trade_status='TRADE_FAIL';
	$array=array('pid'=>$data['pid'],'trade_no'=>$data['trade_no'],'out_trade_no'=>$data['out_trade_no'],'type'=>$data['type'],'name'=>$data['name'],'money'=>$data['money'],'trade_status'=>$trade_status);
	$arg=argSort(paraFilter($array));
	$prestr=createLinkstring($arg);
	$urlstr=createLinkstringUrlencode($arg);
	$sign=md5Sign($prestr, authcode($userrow['key'], 'DECODE', $conf['KEY']));
	if(strpos($data['notify_url'],'?'))
		$url=$data['notify_url'].'&'.$urlstr.'&sign='.$sign.'&sign_type=MD5';
	else
		$url=$data['notify_url'].'?'.$urlstr.'&sign='.$sign.'&sign_type=MD5';
	return $url;
}

if(!empty($_GET['type']) && !empty($_GET['kw'])) {
	$kw=daddslashes($_GET['kw']);
	if($_GET['type']==1)$sql=" and software='0' and  trade_no='$kw'";
	elseif($_GET['type']==2)$sql=" and software='0' and out_trade_no='$kw'";
	elseif($_GET['type']==3)$sql=" and software='0' and name='$kw'";
	elseif($_GET['type']==4)$sql=" and software='0' and money='$kw'";
	elseif($_GET['type']==5)$sql=" and software='0' and type='$kw'";
	else $sql="";
	$link='&type='.$_GET['type'].'&kw='.$_GET['kw'];
}else{
	$sql=" and software='0'";
	$link='';
}
$numrows=$DB->query("SELECT count(*) from pay_order WHERE pid={$pid}{$sql}")->fetchColumn();
$pagesize=30;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);

$list=$DB->query("SELECT * FROM pay_order WHERE pid={$pid}{$sql} order by trade_no desc limit $offset,$pagesize")->fetchAll();
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
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/app.css" type="text/css"/>
  <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" href="./layuiadmin/style/font/iconfont.css">
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>






<body>
   <!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/user/css/font.css">
	<link rel="stylesheet" href="/user/css/xadmin.css">
	<link rel="stylesheet" href="/user/css/public.css">
</head>
<link rel="stylesheet" href="/user/css/oksub.css">
<body class="console">
<div class="x-body layui-anim layui-anim-up">
    <fieldset class="layui-elem-field"
        <div class="layui-field-box">
            <div class="ok-body home">
           <div class="layui-row layui-col-space15">  

              <div class="layui-col-xs6 layui-col-md3">
                        <div class="layui-card">
                            <div class="ok-card-body">
                                <div class="img-box" ok-pc-in-show="">
                                    <img src="/user/css/home-03.png" alt="平台失败订单总数">
                                </div>
                                <div class="cart-r">
                                    <div class="stat-text fans-num"><span id="todayMoney"><?php echo $orders?></span></div>
                                    <div class="stat-heading">订单总数</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-col-xs6 layui-col-md3">
                        <div class="layui-card">
                            <div class="ok-card-body">
                                <div class="img-box" ok-pc-in-show="">
                                    <img src="/user/css/home-06.png" alt="平台账户余额">
                                </div>
                                <div class="cart-r">
                                    <div class="stat-text blogs-num"><span id="yesterdayOrder"><?php echo $userrow['jies']?></span></div>
                                    <div class="stat-heading">结算总额</div>
                                </div>
                            </div>
                        </div>
                    </div>


<div class="layui-row layui-col-space15">
    
                    <div class="layui-col-xs6 layui-col-md3">
                        <div class="layui-card">
                            <div class="ok-card-body">
                                <div class="img-box" ok-pc-in-show="">
                                    <img src="/user/css/home-04.png" alt="当前商户余额">
                                </div>
                                <div class="cart-r">
                                    <div class="stat-text incomes-num"><span id="yesterdayOrder"><?php echo $userrow['money']?$userrow['money']:'0.00'?></span></div>
                                    <div class="stat-heading">当前商户余额</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-col-xs6 layui-col-md3">
                        <div class="layui-card ">
                            <div class="ok-card-body">
                                <div class="img-box" ok-pc-in-show="">
                                    <img src="/user/css/home-02.png" alt="昨日订单金额">
                                </div>
                                <div class="cart-r">
                                    <div class="stat-text goods-num"><span id="yesterdaySuccessOrder"><?php echo $order_today?sprintf("%.2f",$order_today):'0.00'?></span></div>
                                    <div class="stat-heading">今日订单金额</div>
                                </div>
                            </div>
                        </div>
                    </div>
      

<div class="layui-row layui-col-space15">
