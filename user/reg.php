<?php
include("../core/common.php");

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
       <title>注册 | <?php echo $conf['sitename']?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Basic Css files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-white"><i class="mdi mdi-home h1"></i></a>
        </div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <div class="p-3">
                        <div class="float-right text-right">
                            <h4 class="font-18 mt-3 m-b-5">用户注册</h4>
                            <p class="text-muted">最轻量的支付系统.</p>
                        </div>
                        <a href="index.html" class="logo-admin"><img src="assets/images/logo_dark.png" height="26" alt="logo"></a>
                    </div>

                    <div class="p-3">
                        
                

                            <div class="form-group">
                                <label for="useremail">邮箱</label>
                                <input type="email" class="form-control" name="qq" id="qq" placeholder="输入QQ号码">
                            </div>
                            <div class="form-group">
                                <label for="username">验证码</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="验证码">
                               
                                <button class="btn btn-primary w-md waves-effect waves-light" type="button" id="sendcode">获取验证码</button>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">设置密码</label>
                                <input type="pass" class="form-control" name="pass" id="pass" placeholder="设置密码">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" onclick="reg();">注册</button>
                                </div>
                            </div>

                            <div class="form-group m-t-30 mb-0 row">
                                <div class="col-12">
                                    <p class="font-14 text-center text-muted mb-0">Aote <a href="login.php" class="text-primary">返回登录</a></p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center text-white-50">
                <p>Already have an account ? <a href="pages-login.html" class="font-600 text-white"> Login </a> </p>
                <p>© 2020 - 2021 Aote. Crafted with <i class="mdi mdi-heart text-danger"></i> By <a href="http://www.bootstrapmb.com/">Aote</a></p>
            </div>
        </div>
        <!-- end wrapper-page -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

<script src="/assets/layer/layer.js"></script>
<script type="text/javascript" src="/assets/js/Mcode_ajax.js"></script><!--<![Mcode核心]-->
<script>
$("#sendcode").click(function(){
		if ($(this).attr("data-lock") === "true") return;
		var qq=$("input[name='qq']").val();
		var pass=$("input[name='pass']").val();
		if(pass==''){layer.alert('密码不能为空！');return false;}
		if(qq==''){layer.alert('QQ不能为空！');return false;}
		var partten = /^\d{5,10}$/;
		if(!partten.test(document.getElementById("qq").value)){layer.alert('QQ格式不正确！');return false;}
		var ii = layer.load(3, {shade:[0.1,'#fff']});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=reg_email",
			data : {qq:qq},
			dataType : 'json',
			success : function(data) {
				layer.close(ii);
				if(data.code == 1){
					layer.alert(data.msg);
				}else{
					layer.alert(data.msg);
				}
			} 
		});
	});
</script>

<script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
<script src="/assets/js/gt.js"></script>
<script>
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
              play('请先完成验证');
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "ajax.php?act=captcha&t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            console.log(data);
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                https: true,
                width: '100%',
                challenge: data.challenge,
                new_captcha: data.new_captcha,
                product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerEmbed);
        }
    });
</script>
    </body>
</html>