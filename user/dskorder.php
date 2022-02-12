<?php
$title='在线支付接口_订单记录';


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
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/app.css" type="text/css"/>
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
    .content-page {
  border-color: #dee5e7;
  overflow: scroll;
  height: 600px;
}
    </style>
</head>

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

<div class="wrapper-md control">
<?php if(isset($msg)){?>
<div class="alert alert-info">
	<?php echo $msg?>
</div>
<?php }?>
<div class="content-page">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">
			订单记录&nbsp;
		</div>
	  <div class="row wrapper">
	    <div class="col-sm-5 m-b-xs">
	      <form action="dskorder.php" method="GET" class="form-inline">
	        <div class="form-group">
			<select class="input-sm form-control" name="type">
			  <option value="1">交易号</option>
			  <option value="2">商户订单号</option>
			  <option value="3">商品名称</option>
			  <option value="4">商品金额</option>
			  <option value="5">支付方式</option>
			</select>
		    </div>
			<div class="form-group">
			  <input type="text" class="input-sm form-control" name="kw" placeholder="搜索内容">
			</div>
			 <div class="form-group">
				<button class="btn btn-sm btn-default" type="submit">搜索</button>
			 </div>
		  </form>
		</div>
      </div>
		<div class="table-responsive">
        <table class="table table-striped">
       <thead><tr><th>交易号/商户订单号</th><th>商品名称/用户ID</th><th>金额</th><th>支付方式</th><th>创建时间/完成时间</th><th>状态/通知状态</th><th>操作</th></tr></thead>
          <tbody>
<?php
function transfer_status($status,$result){
	if($status==1)
		return '<font color=green>结算成功</font>';
	elseif($status==2)
		return '<font color=red>'.$result.'</font>';
	elseif($status==3)
		return '<font color=green>'.$result.'</font>';
	elseif($status==4)
		return '<font color=green>软件版订单</font>';
	else
		return '<font color=6600ff>代收款订单</font>';
}
foreach($list as $res){
	echo '<tr><td>'.$res['trade_no'].'<br/>'.$res['out_trade_no'].'</td><td>'.$res['name'].'</td><td>￥ '.$res['money'].'</b></td><td> <b>'.$res['type'].'</b></td><td>'.$res['addtime'].'<br/>'.$res['endtime'].'</td><td>'.($res['status']==1?'<font color=green>已完成</font>':'<font color=red>未完成</font>').'</td><td><a href="'.do_callback($res).'" target="_blank" rel="noreferrer">重新通知</a></td></tr>';
}
?>
		  </tbody>
        </table>
      </div>

	<footer class="panel-footer">
<?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="dskorder.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="dskorder.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="dskorder.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
if($pages>=10)$pages=10;
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="dskorder.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="dskorder.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="dskorder.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
?>
</footer>
	</div>
</div>
    </div>
  </div>

<?php include 'foot.php';?>