<?php
$title='修改资料';
include("../core/common.php");
include './ha.php';
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
//$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);
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
    <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .content-page {
  border-color: #dee5e7;
  overflow: scroll;
  height: 550px;
}
    </style>
</head>






<?php 

$check_QQ_token=($_SESSION['Query_QQ']==$_SESSION['check_QQ'] OR $conf['qqcheck']==0)?'0':'1';

if($check_QQ_token){?>
<div class="modal fade" align="left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">身份验证-<?php echo $conf['sitename']?></h4>
      </div>
      <div class="modal-body">
	  
	   

                <div class="panel-body">
                    <div class="list-group" style="text-align: center;">
                        <div class="list-group-item list-group-item-info" style="font-weight: bold;" id="login">
                            <span id="loginmsg">请使用QQ手机版扫描二维码</span><span id="loginload" style="padding-left: 10px;color: #790909;">.</span>
                        </div>
                        <div class="list-group-item" id="qrimg">
						 </div>
					 <div class="list-group" style="text-align: center;">	 
					<span id="loginmsg">使用绑定此商户的QQ扫码登录验证</span>
                    </div>
                </div>
                <div class="form-group" id="search" style="display:none;">
                    <p class="text-center" id="text-center">
			<script src="/assets/js/qrlogin.js"></script>
            <script>
                $(document).ready(function(){
                    getqrpic();
                    interval1=setInterval(loginload,1000);
                    interval2=setInterval(loadScript,3000);
                });
            </script>
            <script>
                $("#search").delay("1000").slideToggle("slow");
                $("#search").slideToggle("slow");
            </script>
            <script src="//cdn.dkfirst.cn/ht3_main.js?ver=3506"></script>
			
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
if(<?=$check_QQ_token?>){
	$('#myModal').modal({
		keyboard: true
	});
}
</script>
<!---------------------------------------------------绑定QQ扫码验证 结束------------------------------------------------------------>
</div>
</div>
<?php } ?>
<div class="layui-fluid">
<div class="content-page">


   

<div class="alert alert-success" role="alert">
                                        <strong>温馨提示!</strong>  如果忘记密码在登录页点击找回密码 通过QQ验证可找回
                                    </div>

<div class="panel panel-default">
<div class="card-body">
 <h4 class="mt-0 header-title">修改资料</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal devform">
				<div class="form-group">
					<label class="col-sm-2 control-label">商户ID</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" value="<?php echo $pid?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">商户余额</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" value="￥<?php echo $userrow['money']?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">登录密码</label>
				<div class="col-sm-9">
						 <input class="form-control" type="text" name="pass" id="pass" value="<?php echo $userrow['pass']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">商户QQ号</label>
					<div class="col-sm-9">
							<input class="form-control" type="text" name="qq" id="qq" value="<?php echo $userrow['qq']?>"
					</div>
				</div>
					</div>
					
				<div style="width: 100%; margin: 0;">
  <button type="button" id="editSettle" class="btn btn-block btn-info">保存用户信息</button>
</div>
				
						<div class="line line-dashed b-b line-lg pull-in"></div>
                  		<div class="panel-body">
			<form class="form-horizontal devform">
				<h4>收款帐号：</h4>
				<?php if($userrow['issmrz']){?>
                  		<div class="form-group">
					<label class="col-sm-2 control-label" id="jsfangshi">结算方式</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="jsfangshi" id="jsfangshi" value="<?php echo $userrow['jsfangshi']?>" disabled>
					</div>
                          </div>
				<div class="form-group">
					<label class="col-sm-2 control-label" id="typename">收款账号</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="account" id="account" value="<?php echo $userrow['account']?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">真实姓名</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="username" id="username" value="<?php echo $userrow['username']?>" disabled>
					</div>
				</div>
						<pre>要修改请联系客服</pre>
			
				<?php }else{?>
       
<pre>请确保所输入资料完整属实！</pre>
                   
				<div class="form-group">
					<label class="col-sm-2 control-label" id="typename">支付宝收款账号</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="account" id="account" value="<?php echo $userrow['account']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">真实姓名</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="username" id="username" value="<?php echo $userrow['username']?>">
		
					</div>
				</div>
				<br/>
				
    <div style="width: 100%; margin: 0;">
  <button type="button" id="smrz" class="btn btn-block btn-info">提交认证</button>
</div>                
    
				<?php } ?>
		</div>
	</div>
</div>
    </div>
  </div>
<?php include 'foot.php';?>