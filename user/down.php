<?php
$title='插件下载';
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
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
if(!empty($_GET['type']) && !empty($_GET['kw'])) {
	$kw=daddslashes($_GET['kw']);
	if($_GET['type']==1)$sql=" name='$kw'";
	elseif($_GET['type']==2)$sql=" readme='$kw'";
	elseif($_GET['type']==3)$sql=" addtime='$kw'";
	elseif($_GET['type']==4)$sql=" readme='$kw'";
	elseif($_GET['type']==5)$sql=" type='$kw'";
	else $sql="";
	$link='&type='.$_GET['type'].'&kw='.$_GET['kw'];
}else{
	$sql="1";
	$link='';
}
$numrows=$DB->query("SELECT count(*) from pay_down WHERE{$sql}")->fetchColumn();
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

$list=$DB->query("SELECT * FROM pay_down WHERE {$sql} order by id asc limit $offset,$pagesize")->fetchAll();
?>


<div class="content-page">
<div class="wrapper-md control">
<?php if(isset($msg)){?>
<div class="alert alert-info">
	<?php echo $msg?>
</div>
<?php }?>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">
			插件下载&nbsp;(<?php echo $numrows?>)
		</div>
	  <div class="row wrapper">
	    <div class="col-sm-5 m-b-xs">
	      <form action="down.php" method="GET" class="form-inline">
	        <div class="form-group">
			<select class="input-sm form-control" name="type">
			  <option value="name">插件名称</option>
			  <option value="readme">插件介绍</option>
			  <option value="addtime">添加时间</option>
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
		  <thead><tr><th>插件名称</th><th>插件介绍</th><th>添加时间</th><th>操作</th></tr></thead>
          <tbody>
<?php
foreach($list as $res)
{
	echo '<tr>
	<td>'.$res['name'].'</td>
	<td>'.$res['readme'].'</td>
	<td>'.$res['addtime'].'</td>
	<td><a href="'.$res['url'].'" class="btn btn-xs btn-info">下载</a></td>
	</tr>';
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
echo '<li><a href="down.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="down.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="down.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
if($pages>=10)$pages=10;
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
?>
</footer>
	</div>
</div>
    </div>
  </div>

<?php include 'foot.php';?>