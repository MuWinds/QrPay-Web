<?php
include("../core/common.php");
$title='系统配置';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
	<div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
           
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">额度套餐设置</h3></div>
<div class="panel-body">
  <form action="./paymbtc.php?mod=site_n" method="POST" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐1价格</label>
	  <div class="col-sm-10"><input type="text" name="edtc1jg" value="<?php echo $conf['edtc1jg']; ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐1额度</label>
	  <div class="col-sm-10"><input type="text" name="edtc1ed" value="<?php echo $conf['edtc1ed']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐2价格</label>
	  <div class="col-sm-10"><input type="text" name="edtc2jg" value="<?php echo $conf['edtc2jg']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐2额度</label>
	  <div class="col-sm-10"><input type="text" name="edtc2ed" value="<?php echo $conf['edtc2ed']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐3价格</label>
	  <div class="col-sm-10"><input type="text" name="edtc3jg" value="<?php echo $conf['edtc3jg']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐3额度</label>
	  <div class="col-sm-10"><input type="text" name="edtc3ed" value="<?php echo $conf['edtc3ed']; ?>" class="form-control"/></div>
	</div><br/>
        	<div class="form-group">
	  <label class="col-sm-2 control-label">套餐4价格</label>
	  <div class="col-sm-10"><input type="text" name="edtc4jg" value="<?php echo $conf['edtc4jg']; ?>" class="form-control"/></div>
	</div><br/>
<div class="form-group">
	  <label class="col-sm-2 control-label">套餐4额度</label>
	  <div class="col-sm-10"><input type="text" name="edtc4ed" value="<?php echo $conf['edtc4ed']; ?>" class="form-control"/></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">会员额度收款通道</label>
	  <div class="col-sm-10"><input type="text" name="cztype" value="<?php echo $conf['cztype']; ?>" class="form-control"/><pre><font color="green">填写通道简称 支付宝：alipay 微信：wxpay QQ：qqpay</font></pre></div>
	</div><br/>
	
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
    </div>
</body>
</html>
<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='site_n'){
	saveSetting('edtc1jg',$_POST['edtc1jg']);
	saveSetting('edtc1ed',$_POST['edtc1ed']);
	saveSetting('edtc2jg',$_POST['edtc2jg']);
	saveSetting('edtc2ed',$_POST['edtc2ed']);
	saveSetting('edtc3jg',$_POST['edtc3jg']);
	saveSetting('edtc3ed',$_POST['edtc3ed']);
	saveSetting('edtc4jg',$_POST['edtc4jg']);
	saveSetting('edtc4ed',$_POST['edtc4ed']);
  	saveSetting('cztype',$_POST['cztype']);
  
	$ad=$CACHE->clear();
	if($ad)
      exit("<script language='javascript'>alert('设置成功');location.href='./paymbtc.php'</script>");
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',1);
}
?>
 