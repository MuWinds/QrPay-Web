<?php
/**
 * 商户列表
**/
include("../core/common.php");
$title='商户列表';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
<?php
$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='edit')
{
$pid=$_GET['pid'];
$row=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改商户信息</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./ulist.php?my=edit_submit&pid='.$pid.'" method="POST">
<div class="form-group">
<label>结算账号:</label><br>
<input type="text" class="form-control" name="account" value="'.$row['account'].'" required>
</div>
<div class="form-group">
<label>结算姓名:</label><br>
<input type="text" class="form-control" name="username" value="'.$row['username'].'" required>
</div>
<div class="form-group">
<label>商户余额:</label><br>
<input type="text" class="form-control" name="money" value="'.$row['money'].'" required>
</div>
<div class="form-group">
<label>自定义分成比例:</label><br>
<input type="text" class="form-control" name="rate" value="'.$row['rate'].'" placeholder="填写百分数，例如98.5">
<pre><font color="green">填写则此分成比例优先</font></pre>
</div>
<div class="form-group">
<label>微信轮训</label><br><select class="form-control" name="weixin" default="'.$row['weixin'].'"><option value="0">0_否</option><option value="1">1_是</option></select>
</div>
<div class="form-group">
<label>QQ轮训</label><br><select class="form-control" name="qqzf" default="'.$row['qqzf'].'"><option value="0">0_否</option><option value="1">1_是</option></select>
</div>
<div class="form-group">
<label>支付宝轮训</label><br><select class="form-control" name="zfb" default="'.$row['zfb'].'"><option value="0">0_否</option><option value="1">1_是</option></select>
</div>
<div class="form-group">
<label>是否激活:</label><br><select class="form-control" name="active" default="'.$row['active'].'"><option value="1">1_激活</option><option value="0">0_封禁</option></select>
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定修改"></form>
';
echo '<br/><a href="./ulist.php">>>返回商户列表</a>';
echo '</div></div>
<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
 $(items[i]).val($(items[i]).attr("default")||0);
}
</script>';
}
elseif($my=='edit_submit')
{
$pid=$_GET['pid'];
$rows=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
if(!$rows)
 showmsg('当前记录不存在！',3);
$account=$_POST['account'];
$username=$_POST['username'];
$money=$_POST['money'];
$rate=$_POST['rate'];
$qqzf=$_POST['qqzf'];
$weixin=$_POST['weixin'];
$zfb=$_POST['zfb'];
$active=$_POST['active'];
if($account==NULL or $username==NULL){
showmsg('保存错误,请确保加*项都不为空!',3);
} else {
$sql="update `pay_user` set `account` ='{$account}',`username` ='{$username}',`money` ='{$money}',`rate` ='$rate',`qqzf` ='$qqzf',`weixin` ='$weixin',`zfb` ='$zfb',`active` ='$active' where `pid`='$pid'";
if($_POST['resetkey']==1){
 $key = random(32);
 $sqs=$DB->exec("update `pay_user` set `key` ='{$key}' where `pid`='$pid'");
}
if($DB->exec($sql)||$sqs)
 showmsg('修改商户信息成功！<br/><br/><a href="./ulist.php">>>返回商户列表</a>',1);
else
 showmsg('修改商户信息失败！'.$DB->errorCode(),4);
}
}
elseif($my=='delete')
{
$pid=$_GET['pid'];
$rows=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
if(!$rows)
 showmsg('当前记录不存在！',3);
$urls=explode(',',$rows['url']);
$sql="DELETE FROM pay_user WHERE pid='$pid'";
if($DB->exec($sql))
 showmsg('删除商户成功！<br/><br/><a href="./ulist.php">>>返回商户列表</a>',1);
else
 showmsg('删除商户失败！'.$DB->errorCode(),4);
}
else
{

echo '<form action="ulist.php" method="GET" class="form-inline"><input type="hidden" name="my" value="search">
  <div class="form-group">
    <label>搜索</label>
 <select name="column" class="form-control"><option value="pid">商户号</option><option value="qq">QQ号</option><option value="account">结算账号</option><option value="username">结算姓名</option></select>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="搜索内容">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>&nbsp;<!--a href="./ulist.php?my=add" class="btn btn-success">添加商户</a>&nbsp;<a href="./plist.php" class="btn btn-default">合作者商户管理</a-->
</form>';
if($my=='search') {
 $sql=" `{$_GET['column']}`='{$_GET['value']}'";
 $numrows=$DB->query("SELECT * from pay_user WHERE{$sql}")->rowCount();
 $con='包含 '.$_GET['value'].' 的共有 <b>'.$numrows.'</b> 个商户';
}else{
 $numrows=$DB->query("SELECT * from pay_user WHERE 1")->rowCount();
 $sql=" 1";
 $con='共有 <b>'.$numrows.'</b> 个商户';
}
echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>商户号</th><th>密码</th><th>安全码</th><th>会员状态</th><th>QQ号</th><th>余额</th><th>软件额度</th><th>结算账号/姓名</th><th>状态</th><th>是否认证</th><th>商户操作</th></tr></thead>
          <tbody>
<?php
$pagesize=30;
$pages=intval($numrows/$pagesize);
if ($numrows�fgfdrrpagesize)
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
$rs=$DB->query("SELECT * FROM pay_user WHERE{$sql} order by pid desc limit $offset,$pagesize");
while($res = $rs->fetch())
{
$sjya=date("Y-m-d H:i",$res['sjian']);
echo '<tr><td><b>'.$res['pid'].'</b><td>'.$res['pass'].'</td><td>'.$res['pwd'].'</td><td>'.$sjya.'</td><td>'.$res['qq'].'</td><td>'.$res['money'].'</td><td>'.$res['paymb'].'</td><td>'.$res['account'].'<br/>'.$res['username'].'</td><td>'.($res['active']==1?'<font color=green>正常</font>':'<font color=red>封禁</font>').'</td><td>'.($res['issmrz']==1?'<font color=green>已认证</font>':'<font color=red>未认证</font>').'</td><td><a href="./edcz.php?pid='.$res['pid'].'" class="btn btn-xs btn-info">额度充值</a>.'.'&nbsp;<a href="./ulist.php?my=edit&pid='.$res['pid'].'" class="btn btn-xs btn-info">编辑</a>.'.'&nbsp;<a href="./ulist.php?my=delete&pid='.$res['pid'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此商户吗？\');">删除</a></td></tr>';
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
echo '<li><a href="ulist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="ulist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="ulist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="ulist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="ulist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="ulist.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
}
?>
    </div>
  </div>