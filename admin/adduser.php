<?php
include("../core/common.php");
$title='添加商户';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$pid='100'.mt_rand(10,99);
	?>
  <div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
      <div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">商户添加</h3></div>
<div class="panel-body">
<form action="?my=edit_submit" method="POST">
<div class="form-group">
<label>商户ID:</label><br>
<input type="text" class="form-control" name="pid" value="<?php echo $pid?>" readonly>
</div>
<div class="form-group">
<label>商户密码:</label><br>
<input type="text" class="form-control" name="pass" value="" placeholder="请填写要注册的商户key">
</div>
<div class="form-group">
<label>商户QQ:</label><br>
<input type="text" class="form-control" name="qq" value="" placeholder="请填写要注册的商户key">
</div>
<input type="submit" class="btn btn-primary btn-block"
value="确定注册"></form>

<br/><a href="./ulist.php">>>返回商户列表</a>
</div></div>
      <script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default"));
}
</script>
<?php

$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='edit_submit')
{
$pid=$_POST['pid'];
$pass=$_POST['pass'];
$qq=$_POST['qq'];
$row=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
    if(!$row){
    if($Reg['code']==1){
      $zckey=$userrow['pass'];
      $DB->exec("INSERT INTO `pay_user` (`pid`,`pass`,`qq`,`money`,`paymb`) VALUES ('{$pid}','{$zckey}','{$qq}','0.00','0.00')");
			exit("<script language='javascript'>alert('注册成功');location.href='./adduser.php'</script>");
		}else{
      exit("<script language='javascript'>alert('注册失败,换个注册资料重试');location.href='./adduser.php'</script>");
		}
		
	}else{
      exit("<script language='javascript'>alert('注册失败,换个注册资料重试');location.href='./adduser.php'</script>");
	}
  }

  


?>
    </div>
  </div>


