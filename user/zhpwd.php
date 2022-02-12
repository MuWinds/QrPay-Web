<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>商户密码找回</title>
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
                            <h4 class="font-18 mt-4 m-b-5">找回密码</h4>
                        </div>
                        <a href="index.html" class="logo-admin"><img src="assets/images/logo_dark.png" height="26" alt="logo"></a>
                    </div>

                    <div class="p-3">
                        <div class="alert alert-success" role="alert">
                            请输入你注册时候绑定的QQ 找回的密码会发送到您的QQ邮箱!
                        </div>

                        <form class="form-horizontal m-t-30" action="index.html">

                            <div class="form-group">
                                <label for="useremail">QQ号码</label>
                                <input type="email" class="form-control" name="qq" id="qq" placeholder="请输入QQ">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" id="sendcode">找回密码</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center text-white-50">
                <p>Remember It ? <a href="pages-login.html" class="font-600 text-white"> Sign In Here </a> </p>
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
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="/assets/layer/layer.js"></script>
<script type="text/javascript" src="/assets/js/Mcode_ajax.js"></script><!--<![Mcode核心]-->
<script>
$("#sendcode").click(function(){
		if ($(this).attr("data-lock") === "true") return;
		var qq=$("input[name='qq']").val();
		var partten = /^\d{5,10}$/;
		if(!partten.test(document.getElementById("qq").value)){layer.alert('QQ格式不正确！');return false;}
		var ii = layer.load(3, {shade:[0.1,'#fff']});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=find",
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
    </body>
</html>