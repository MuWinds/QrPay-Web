<?php

$title='个人资料';
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
$mod=isset($_GET['mod'])?$_GET['mod']:'api';

if(strlen($userrow['phone'])==11){
	$userrow['phone']=substr($userrow['phone'],0,3).'****'.substr($userrow['phone'],7,10);
}

?>

<div class="wrapper-md control">
<?php if(isset($msg)){?>
<div class="alert alert-info">
	<?php echo $msg?>
</div>
<?php }?>
 <div class="content-page">
                <!-- Start content -->
             

<div class="tab-container ng-isolate-scope">
<ul class="nav nav-tabs">
	<li style="width: 25%;" align="center" class="<?php echo $mod=='api'?'active':null?>">
		<a href="api.php?mod=api">API信息</a>
	</li>
	</li>
		<li style="width: 25%;" align="center" class="<?php echo $mod=='account'?'active':null?>">
		<a href="api.php?mod=account">设置安全码</a>
	</li>
	<?php if($conf['cert_channel']){?>
	<li style="width: 25%;" align="center">
		<a href="certificate.php">实名认证</a>
	</li>
	<?php }?>
</ul>
	<div class="tab-content">
		<div class="tab-pane ng-scope active">
<?php if($mod=='api'){?>

       

    <div class="layui-card">
      <div class="layui-card-header">对接秘钥KEY</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group" lay-filter="example">
             <div class="layui-form-item">
              <label class="layui-form-label">API</label>
              <div class="layui-input-block">
                <input type="text" value="http://<?php echo $_SERVER['HTTP_HOST'] ?>/" class="layui-input" disabled="disabled">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">PID</label>
              <div class="layui-input-block">
                <input type="text" value="<?php echo $pid?>" class="layui-input" disabled="disabled">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">KEY</label>
              <div class="layui-input-block">
                <input type="text" name="key" id="key" value="<?php echo authcode($userrow['key'], 'DECODE', $conf['KEY']);?>" lay-verify="key" autocomplete="off" placeholder="请输入KEY" class="layui-input">
              </div>
            </div>
            <div class="layui-input-block">
              <div class="layui-footer" style="left: 0;">
               <a href="javascript:resetKey()" class="btn btn-block btn-info" id="resetKey">生成KEY</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php }elseif($mod=='account'){?>
			<form class="form-horizontal devform">
				<div class="form-group"><div class="col-sm-offset-2 col-sm-4"><h4>修改安全码：</h4></div></div>
				<?php if(!empty($userrow['pwd'])){?>
				<div class="form-group">
					<label class="col-sm-2 control-label">旧密码</label>
					<div class="col-sm-9">
						<input class="form-control" type="password" name="oldpwd" value="">
					</div>
				</div>
				<?php }?>
				<div class="form-group">
					<label class="col-sm-2 control-label">新密码</label>
					<div class="col-sm-9">
						<input class="form-control" type="password" name="newpwd" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">重复密码</label>
					<div class="col-sm-9">
						<input class="form-control" type="password" name="newpwd2" value="">
					</div>
				</div>
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-4"><input type="button" id="changePwd" value="修改密码" class="btn btn-block btn-info"/><br/>
				 </div>
				</div>
			</form>
<?php }?>
		</div>
	</div>
</div>
</div>
    </div>
  </div>
  
  
  
  
 
  
<?php include 'foot.php';?>
<script src="//lib.baomitu.com/layer/3.1.1/layer.min.js"></script>
<script src="//lib.baomitu.com/clipboard.js/1.7.1/clipboard.min.js"></script>
<script>
$(document).ready(function(){
	var clipboard = new Clipboard('.copy-btn');
	clipboard.on('success', function (e) {
		layer.msg('复制成功！', {icon: 1});
	});
	clipboard.on('error', function (e) {
		layer.msg('复制失败，请长按链接后手动复制', {icon: 2});
	});
	$("#changePwd").click(function(){
		var oldpwd=$("input[name='oldpwd']").val();
		var newpwd=$("input[name='newpwd']").val();
		var newpwd2=$("input[name='newpwd2']").val();
		if(oldpwd==''){layer.alert('旧密码不能为空');return false;}
		if(newpwd==''||newpwd2==''){layer.alert('新密码不能为空');return false;}
		if(newpwd!=newpwd2){layer.alert('两次输入密码不一致！');return false;}
		if(oldpwd==newpwd){layer.alert('旧密码和新密码相同！');return false;}
		var ii = layer.load(2, {shade:[0.1,'#fff']});
		$.ajax({
			type : "POST",
			url : "ajax2.php?act=edit_pwd",
			data : {oldpwd:oldpwd,newpwd:newpwd,newpwd2:newpwd2},
			dataType : 'json',
			success : function(data) {
				layer.close(ii);
				if(data.code == 1){
					layer.alert(data.msg, {icon: 1}, function(){window.location.reload()});
				}else{
					layer.alert(data.msg);
				}
			}
		});
	});
});
function resetKey(){
	var confirmobj = layer.confirm('是否确认生成或重置对接密钥？', {
	  btn: ['确定','取消']
	}, function(){
		$.ajax({
			type : 'POST',
			url : 'ajax2.php?act=resetKey',
			data : 'submit=do',
			dataType : 'json',
			success : function(data) {
				if(data.code == 0){
					layer.alert('重置密钥成功！', {icon:1}, function(){window.location.reload()});
				}else{
					layer.alert(data.msg, {icon:2});
				}
			},
			error:function(data){
				layer.msg('服务器错误');
				return false;
			}
		});
	}, function(){
		layer.close(confirmobj);
	});
}
</script>

<?php include 'foot.php';?>
