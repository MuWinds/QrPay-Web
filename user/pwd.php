<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>请输入凭证访问</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>
<body>
<div class="dowebok">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<div class="shutter">
					<div class="shutter-img">
					  
					</div>

				
				</div>

			</div>

			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title">
					请输入安全码
				</span>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="pwd" placeholder="请输入安全码">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				
				<div class="text-center p-t-12"><font size="1" color="red"><?php echo $p;?></font></div>
				
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit">
						进入
					</button>
				</div>

				<div class="text-center p-t-12">
					<a class="txt2" href="javascript:" onclick="return confirm('如忘记密码请邮件发送联络函到技术部申请重置密码！')">
						忘记密码？
					</a>
				</div>
				
				<div class="text-center p-t-136">
					<a class="txt2" href="javascript:" onclick="return confirm('该项目停止维护,仅内部人员可访')">
								该页面,商户本人才可访问
							<!--还没有密码？该项目停止维护-->
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="static/js/jquery.min.js"></script>
<script src="static/js/velocity.js"></script>
<script src="static/js/shutter.js"></script>
<script>
$(function () {
  $('.shutter').shutter({
	shutterW: 316, // 容器宽度
	shutterH: 289, // 容器高度
	isAutoPlay: true, // 是否自动播放
	playInterval: 6000, // 自动播放时间
	curDisplay: 0, // 当前显示页
	fullPage: false // 是否全屏展示
  });
});
</script>
</body>
</html>