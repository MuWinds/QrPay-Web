<?php
/**
 * 登录
**/
include("../core/common.php");
if(isset($_GET['logout'])){
$openid = $_GET["openid"];
setcookie("user_token", "", time() - 18000);	//注销登录cookies
unset($_SESSION['Query_pid']);//注销变量
unset($_SESSION['Query_key']);//注销变量
unset($_SESSION['Query_QQ']);//注销验证QQ身份
unset($_SESSION['check_QQ']);//注销验证QQ身份
echo'<script>alert("注销登录成功!");location.href="/"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>登录 | <?php echo $conf['sitename']?></title>
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
                            <h4 class="font-18 mt-3 m-b-5">最轻量的支付系统!</h4>
                            <p class="text-muted">免费注册开户.</p>
                        </div>
                        <a href="index.html" class="logo-admin"><img src="assets/images/logo_dark.png" height="26" alt="logo"></a>
                    </div>

                    <div class="p-3">
                        
                      

                            <div class="form-group">
                                <label for="username">商户ID</label>
                                <input type="text" class="form-control" id="pid" placeholder="请输入ID">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">密码</label>
                                <input type="password" class="form-control" id="pass" placeholder="请输入密码">
                            </div>

                            <div class="form-group row m-t-30">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">记住密码</label>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" id="embed-submit" type="submit" onclick="login();">登录</button>
                                </div>
                            </div>
<div class="form-row " style="padding-top: 15px;text-align: center">
                            <a href="/user/qq.php"><img src="https://z3.ax1x.com/2021/06/16/2XRS54.png" alt="" /></a>
                            </div>
                            <div class="form-group m-t-30 mb-0 row">
                                <div class="col-12 text-center">
                                     <a href="reg.php" class="text-muted"><i class="mdi mdi-lock"></i> 注册账号</a>
                                    <a href="zhpwd.php" class="text-muted"><i class="mdi mdi-lock"></i> 忘记密码?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center text-white-50">
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
 <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
</div><script src="/assets/js/gt.js"></script>
  <script src="./layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
    base: './layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'user'], function(){
    var $ = layui.$
    ,setter = layui.setter
    ,admin = layui.admin
    ,form = layui.form
    ,router = layui.router()
    ,search = router.search;

    form.render();

    //提交
    form.on('submit(LAY-user-login-submit)', function(obj){
    
      //请求登入接口
      admin.req({
        url: layui.setter.base + 'json/user/login.js' //实际使用请改成服务端真实接口
        ,data: obj.field
        ,done: function(res){
        
          //请求成功后，写入 access_token
          layui.data(setter.tableName, {
            key: setter.request.tokenName
            ,value: res.data.access_token
          });
          
          //登入成功的提示与跳转
          layer.msg('登入成功', {
            offset: '15px'
            ,icon: 1
            ,time: 1000
          }, function(){
            location.href = '../'; //后台主页
          });
        }
      });
      
    });
    
    
    
  });
  </script>
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
  <script src="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/jquery/dist/jquery.min.js"></script>

<script src="/assets/layer/layer.js"></script>
<script type="text/javascript" src="/assets/js/Mcode_ajax.js"></script><!--<![Mcode核心]-->

    </body>
</html>