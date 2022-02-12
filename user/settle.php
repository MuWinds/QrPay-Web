	<?php
$title='结算记录';
include("../core/common.php");
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
</head>

<?php
$numrows = $DB->query ( "SELECT * from pay_settle WHERE pid={$pid}" )->rowCount ();
$pagesize = 20;
$pages = intval ( $numrows / $pagesize );
if ($numrows % $pagesize) {
	$pages ++;
}
if (isset ( $_GET ['page'] )) {
	$page = intval ( $_GET ['page'] );
} else {
	$page = 1;
}
$offset = $pagesize * ($page - 1);

$list = $DB->query ( "SELECT * FROM pay_settle WHERE pid={$pid} order by id desc limit $offset,$pagesize" )->fetchAll ();

?>
 <div id="content" class="app-content" role="main">
    <div class="app-content-body ">

<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">结算记录</h1>
</div>
<div class="wrapper-md control">
<?php if(isset($msg)){?>
<div class="alert alert-info">
	<?php echo $msg?>
</div>
<?php }?>

		<div class="table-responsive">
        <table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
                                  <th>结算方式</th>
									<th>结算账号</th>
									<th>结算金额</th>
									<th>手续费</th>
									<th>结算时间</th>
									<th>状态</th>
								</tr>
							</thead>
							<tbody>
<?php
foreach ( $list as $res ) {
	echo '<tr><td>' . $res ['id']  .  '</td><td>' . $res ['jsfangshi'] .  '</td><td>' . $res ['account'] . '</td><td>￥ <b>' . $res ['money'] . '</b></td><td>￥ <b>' . $res ['fee'] . '</b></td><td>' . $res ['time'] . '</td><td>' . ($res ['status'] == 2 ? '<font color=green>结算完成</font>' : '<font color=Blue>等待打款</font>') . '</td></tr>';
}
?>
		  </tbody>
						</table>
					</div>

					<footer class="panel-footer">
<?php
echo '<ul class="pagination">';
$first = 1;
$prev = $page - 1;
$next = $page + 1;
$last = $pages;
if ($page > 1) {
	echo '<li><a href="js.php?page=' . $first . $link . '">首页</a></li>';
	echo '<li><a href="js.php?page=' . $prev . $link . '">&laquo;</a></li>';
} else {
	echo '<li class="disabled"><a>首页</a></li>';
	echo '<li class="disabled"><a>&laquo;</a></li>';
}
for($i = 1; $i < $page; $i ++)
	echo '<li><a href="js.php?page=' . $i . $link . '">' . $i . '</a></li>';
echo '<li class="disabled"><a>' . $page . '</a></li>';
if ($pages >= 10)
	$pages = 10;
for($i = $page + 1; $i <= $pages; $i ++)
	echo '<li><a href="js.php?page=' . $i . $link . '">' . $i . '</a></li>';
echo '';
if ($page < $pages) {
	echo '<li><a href="js.php?page=' . $next . $link . '">&raquo;</a></li>';
	echo '<li><a href="js.php?page=' . $last . $link . '">尾页</a></li>';
} else {
	echo '<li class="disabled"><a>&raquo;</a></li>';
	echo '<li class="disabled"><a>尾页</a></li>';
}
echo '</ul>';
?>
</footer>
				</div>
			</div>
		</div>
	</div>
</div>