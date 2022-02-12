<?php

include("../core/common.php");
$title='额度充值';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$pid=$_GET['pid'];
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
      <div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">软件版额度充值</h3></div>
<div class="panel-body">
<form action="?my=edit_submit" method="POST">
<div class="form-group">
<label>商户ID:</label><br>
<input type="text" class="form-control" name="pid" value="<?php echo $pid?>" placeholder="请填写要充值的商户id">
</div>
<div class="form-group">
<label>充值的额度:</label><br>
<input type="text" class="form-control" name="paymb" value="" placeholder="请输入要充值的额度数量">
</div>
<input type="submit" class="btn btn-primary btn-block"
value="确定充值"></form>

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
$paymb=$_POST['paymb'];
$rows=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
if(!$rows)
	showmsg('此商户id不存在！',3);
if($paymb==NULL && $pid==NULL){
showmsg('保存错误,请确保加*项都不为空!',3);
} else {
  $jsed= round ($rows['paymb'] + $paymb, 2 );
  $DB->query("update `pay_user` set `paymb` ='$jsed' where `pid`='$pid'");
	exit("<script language='javascript'>alert('充值成功');location.href='./edcz.php'</script>");
  }
}

?>
    </div>
  </div>