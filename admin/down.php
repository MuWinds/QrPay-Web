<?php
/**
 * 插件列表
**/
include("../core/common.php");
$title='插件列表';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>

  <div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
<?php

$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='add')
{
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">添加插件</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./down.php?my=add_submit" method="POST">
<div class="form-group">
<label>插件名称:</label><br>
<input type="text" class="form-control" name="name" value="'.$row['name'].'" placeholder="不可留空">
</div>
<div class="form-group">
<label>下载地址:</label><br>
<input type="text" class="form-control" name="url" value="'.$row['url'].'" placeholder="不可留空">
</div>
<div class="form-group">
<label>插件介绍:</label><br>
<textarea class="form-control" name="readme" rows="5" placeholder="可留空">'.$row['readme'].'</textarea>
</div>';
echo'<input type="submit" class="btn btn-primary btn-block"
value="确定添加"></form>
';
echo '<br/><a href="./down.php">>>返回列表</a>';
}
elseif($my=='edit')
{
$id=$_GET['id'];
$row=$DB->query("select * from pay_down where id='$id' limit 1")->fetch();
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./down.php?my=edit_submit&id='.$id.'" method="POST">
<div class="form-group">
<label>插件名称:</label><br>
<input type="text" class="form-control" name="name" value="'.$row['name'].'" placeholder="不可留空">
</div>
<div class="form-group">
<label>下载地址:</label><br>
<input type="text" class="form-control" name="url" value="'.$row['url'].'" placeholder="不可留空">
</div>
<div class="form-group">
<label>插件介绍:</label><br>
<textarea class="form-control" name="readme" rows="5" placeholder="可留空">'.$row['readme'].'</textarea>
</div>';
echo'<input type="submit" class="btn btn-primary btn-block"
value="确定修改"></form>
';
echo '<br/><a href="./down.php">>>返回列表</a>';
}
elseif($my=='add_submit')
{
$name=$_POST['name'];
$url=$_POST['url'];
$readme=$_POST['readme'];
if($name==NULL && $url==NULL && $readme==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
$sql="insert into `pay_down` (`name`,`url`,`readme`,`addtime`) values ('".$name."','".$url."','".$readme."','".date("Y-m-d")."')";
if($DB->exec($sql)){
	showmsg('<blockquote class="blockquote mb-10">添加成功！<br/><br/><a href="./down.php">>>返回列表</a></blockquote>',1);
}else
	showmsg('<blockquote class="blockquote mb-10">添加失败！'.$DB->error().'</blockquote>',4);
}
}
elseif($my=='edit_submit')
{
$id=$_GET['id'];
$rows=$DB->query("select * from pay_down where id='$id' limit 1")->fetch();
if(!$rows)
	showmsg('当前记录不存在！',3);
$name=$_POST['name'];
$url=$_POST['url'];
$readme=$_POST['readme'];
if($name==NULL && $url==NULL && $readme==NULL){
showmsg('保存错误,请确保加*项都不为空!',3);
} else {
$sql="update `pay_down` set `name` ='{$name}',`url` ='{$url}',`readme` ='{$readme}' where `id`='$id'";
if($DB->exec($sql)||$sqs)
	showmsg('修改信息成功！<br/><br/><a href="./down.php">>>返回列表</a>',1);
else
	showmsg('修改信息失败！'.$DB->errorCode(),4);
}
}
elseif($my=='delete')
{
$id=$_GET['id'];
$sql="DELETE FROM pay_down WHERE id='$id'";
if($DB->query($sql))
	showmsg('<blockquote class="blockquote mb-10">删除成功！<br/><br/><a href="./down.php">>>返回列表</a></blockquote>',1);
else
	showmsg('<blockquote class="blockquote mb-10">删除失败！'.$DB->error().'</blockquote>',4);
}
else
{

echo '<form action="down.php" method="GET" class="form-inline">
  <div class="form-group">
    <label>搜索</label>
	<select name="name" class="form-control"><option value="pid">插件名称</option><option value="url">下载地址</option></select>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="搜索内容">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>
  </div>
</form>';

if($my=='search'||$_GET['value']) {
	$sql=" `{$_GET['column']}`='{$_GET['value']}'";
	$numrows=$DB->query("SELECT * from pay_down WHERE{$sql}")->rowCount();
	$con='包含 '.$_GET['value'].' 的共有 <b>'.$numrows.'</b> 个插件包';
}else{
	$numrows=$DB->query("SELECT * from pay_down WHERE 1")->rowCount();
	$sql=" 1";
	$con='系统共有 <b>'.$numrows.'</b> 个插件包<br/><a href="./down.php?my=add" class="btn btn-primary">添加插件包</a>';
}
echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>插件名称</th><th>下载地址</th><th>插件介绍</th><th>添加时间</th><th>操作</th></tr></thead>
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

$rs=$DB->query("SELECT * FROM pay_down WHERE{$sql} order by id asc limit $offset,$pagesize");
while($res = $rs->fetch())
{
echo '<tr>
<td><b>'.$res['id'].'</b></td>
<td><b>'.$res['name'].'</b></td>
<td><b>'.$res['url'].'</b></td>
<td><b>'.$res['readme'].'</b></td>
<td><b>'.$res['addtime'].'</b></td>
<td><a href="./down.php?my=edit&id='.$res['id'].'" class="btn btn-xs btn-info">编辑</a>&nbsp;<a href="./down.php?my=delete&id='.$res['id'].'" class="btn btn-xs btn-info">删除</a></td>
</tr>';
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
echo '<li><a href="down.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="down.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="down.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="down.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="down.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="down.php?page='.$last.$link.'">尾页</a></li>';
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