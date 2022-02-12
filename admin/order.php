<?php
/**
 * 订单列表
**/
include("../core/common.php");
$title='订单列表';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);
?>
	<div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">

<?php

$my=isset($_GET['my'])?$_GET['my']:null;

echo '<form action="order.php" method="GET" class="form-inline"><input type="hidden" name="my" value="search">
  <div class="form-group">
    <label>搜索</label>
	<select name="column" class="form-control"><option value="trade_no">订单号</option><option value="out_trade_no">商户订单号</option><option value="pid">商户号</option><option value="name">商品名称</option><option value="money">金额</option></select>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="搜索内容">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>&nbsp;<a href="./order.php?my=yijianwc" class="btn btn-info btn-xs" onclick="return confirm(\'一键完成就是改变所有结算订单为已完成状态,你确定继续操作吗？\');">一键完成</a>&nbsp;<a href="./order.php?my=yijianbjs" class="btn btn-info btn-xs" onclick="return confirm(\'一键补结算就是把所有结算失败的订单改为未结算状态，这样系统会自动重新补结算,你确定继续操作吗？\');">一键补结算</a>
</form>';

if($my=='yijianwc') {
	$DB->query("update `pay_order` set `transfer_status` ='1' where `status`='1'");
	exit("<script language='javascript'>alert('一键改变已结算完成状态成功');window.location.href='./order.php';</script>");
}elseif($my=='yijianbjs') {
	$DB->query("update `pay_order` set `transfer_status` ='0' where `status`='1' and `transfer_status`='2'");
	exit("<script language='javascript'>alert('一键补结算成功');window.location.href='./order.php';</script>");
}elseif($my=='status') {
	$DB->query("update `pay_order` set `transfer_status` ='1' where `status`='1' and `trade_no`='{$_GET['trade_no']}'");
	exit("<script language='javascript'>alert('修改状态成功');window.location.href='./order.php';</script>");
}elseif($my=='budan') {
	$DB->query("update `pay_order` set `transfer_status` ='0' where `status`='1' and `trade_no`='{$_GET['trade_no']}'");
	exit("<script language='javascript'>alert('补单成功');window.location.href='./order.php';</script>");
}elseif($my=='search') {
	if($_GET['column']=='name'){
		$sql=" `{$_GET['column']}` like '%{$_GET['value']}%'";
	}else{
		$sql=" `{$_GET['column']}`='{$_GET['value']}'";
	}
	$numrows=$DB->query("SELECT count(*) from pay_order WHERE{$sql}")->fetchColumn();
	$con='包含 '.$_GET['value'].' 的共有 <b>'.$numrows.'</b> 条订单';
	$link='&my=search&column='.$_GET['column'].'&value='.$_GET['value'];
}else{
	$numrows=$DB->query("SELECT count(*) from pay_order WHERE 1")->fetchColumn();
	$sql=" 1";
	$con='共有 <b>'.$numrows.'</b> 条订单';
}
echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>订单号/商户订单号</th><th>商户号/网站域名</th><th>商品名称/金额</th><th>支付方式</th><th>创建时间/完成时间</th><th>支付状态</th><th>结算状态/结算金额/实际</th></tr></thead>
          <tbody>
<?php
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

function transfer_status($status,$result){
	if($status==1)
		return '<font color=green>结算成功</font>';
	elseif($status==2)
		return '<font color=red>'.$result.'</font>';
	elseif($status==3)
		return '<font color=green>'.$result.'</font>';
	elseif($status==4)
		return '<font color=green>Mcode码支付</font>';
	else
		return '<font color=6600ff>代收款订单</font>';
}

function do_callback($data){
	global $DB,$userrow;
	if($data['status']>=1)$trade_status='TRADE_SUCCESS';
	else $trade_status='TRADE_FAIL';
	$array=array('pid'=>$data['pid'],'trade_no'=>$data['trade_no'],'out_trade_no'=>$data['out_trade_no'],'type'=>$data['type'],'name'=>$data['name'],'money'=>$data['money'],'trade_status'=>$trade_status);
	$arg=argSort(paraFilter($array));
	$prestr=createLinkstring($arg);
	$urlstr=createLinkstringUrlencode($arg);
	$pid=$userrow['pid'];
	$key=authcode($userrow['key'], 'DECODE', $conf['KEY']);
	$sign=md5Sign($prestr, authcode($userrow['key'], 'DECODE', $conf['KEY']));
	if(strpos($data['notify_url'],'?'))
		$url=$data['notify_url'].'&'.$urlstr.'&sign='.$sign.'&sign_type=MD5';
	else
		$url=$data['notify_url'].'?'.$urlstr.'&sign='.$sign.'&sign_type=MD5';
	return $url;
}
$rs=$DB->query("SELECT * FROM pay_order WHERE{$sql} order by trade_no desc limit $offset,$pagesize");
while($res = $rs->fetch())
{
echo '<tr>
<td><b><a href="'.$url['notify'].'" title="支付通知" target="_blank" rel="noreferrer">'.$res['trade_no'].'</a></b><br/>'.$res['out_trade_no'].'</td>
<td>'.$res['pid'].'<br/>'.parse_url($res['notify_url'])['host'].'</td><td>'.$res['name'].'<br/>￥'.$res['money'].'</td>
<td>'.$res['type'].'</td>
<td>'.$res['addtime'].'<br/>'.$res['endtime'].'</td>
<td>'.($res['status']==1?'<font color=green>已完成</font>':'<font color=blue>未完成</font>').'</td>
<td>'.transfer_status($res['transfer_status'],$res['transfer_result']).'<br/>'.($res['status']==1?'<font color=green>￥'.$res['tmoney'].'</font>':($res['status']==5?'<font color=green>￥'.$res['money'].'</font>':'<font color=blue>未支付</font>')).'</td>';
echo '<td><a href="'.do_callback($res).'" class="btn btn-info btn-xs">通知</a>&nbsp;<a href="glybd.php?dan='.$res['trade_no'].'" class="btn btn-info btn-xs">完成</a>&nbsp;<a href="./order.php?my=budan&trade_no='.$res['trade_no'].'" class="btn btn-info btn-xs" onclick="return confirm(\'补单就是系统再次发送提交结算数据,你确定继续操作吗？\');">补单</a></td></tr>';
}

foreach($list as $res){
	echo '<tr><td>'.$res['trade_no'].'<br/>'.$res['out_trade_no'].'</td><td>'.$res['name'].'</td><td>￥ '.$res['money'].'</b></td><td> <b>'.$res['type'].'</b></td><td>'.$res['addtime'].'<br/>'.$res['endtime'].'</td><td>'.($res['status']==1?'<font color=green>已完成</font>':'<font color=red>未完成</font>').'</td><td><a href="'.do_callback($res).'" target="_blank" rel="noreferrer">重新通知</a></td></tr>';
}
?>

          </tbody>
        </table>
      </div>
<?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="order.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="order.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="order.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="order.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="order.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="order.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
?>
    </div>
  </div>