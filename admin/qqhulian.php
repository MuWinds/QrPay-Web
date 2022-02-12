<?php
include("../core/common.php");
$title='系统配置';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
	<div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
           
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">登录彩虹互联接口设置</h3></div>
<div class="panel-body">
  <form action="./qqhulian.php?mod=site_n" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
	  <label class="col-sm-2 control-label">网站接口</label>
	  <div class="col-sm-10"><input type="text" name="qqhulian" value="<?php echo $conf['qqhulian']; ?>" class="form-control"/><pre><font color="green">必须带http://  /结束</font></pre></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">PID</label>
	  <div class="col-sm-10"><input type="text" name="qqhulianpid" value="<?php echo $conf['qqhulianpid']; ?>" class="form-control" required/></div>
	</div><br/>
			<div class="form-group">
	  <label class="col-sm-2 control-label">KEY</label>
	  <div class="col-sm-10"><input type="text" name="qqhuliankey" value="<?php echo $conf['qqhuliankey']; ?>" class="form-control" required/></div>
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
	saveSetting('qqhulian',$_POST['qqhulian']);
	saveSetting('qqhulianpid',$_POST['qqhulianpid']);
	saveSetting('qqhuliankey',$_POST['qqhuliankey']);
  
	$ad=$CACHE->clear();
	if($ad)
      exit("<script language='javascript'>alert('设置成功');location.href='./qqhulian.php'</script>");
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',1);
}
?>
 