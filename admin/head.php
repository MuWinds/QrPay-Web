<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $title?> | <?php echo $conf['sitename']?></title>
  <meta name="keywords" content="McodePay"/>
  <meta name="description" content="McodePay"/>
  <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">
  <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<body>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./"><?php echo $conf['sitename']?></a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php echo checkIfActive('index,')?>">
            <a href="./"><span class="glyphicon glyphicon-home"></span> 平台首页</a>
          </li>
		  <li class="<?php echo checkIfActive('order')?>"><a href="./order.php"><span class="glyphicon glyphicon-list"></span> 订单管理</a></li>
	
          
            <li class="<?php echo checkIfActive('settle')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> 结算管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li> <a href="./settle.php"> 结算管理</a></li>
             <li> <a href="./slist.php"> 结算记录</a></li>
            </ul>
		  <li class="<?php echo checkIfActive('down')?>"><a href="./down.php"><span class="glyphicon glyphicon-th"></span> 插件列表</a></li></li>
		  <li class="<?php echo checkIfActive('ulist')?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> 商户管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li> <a href="./ulist.php"> 商户管理</a></li>
             <li> <a href="./edcz.php"> 额度充值</a></li>
             <li> <a href="./sjcz.php"> 会员充值</a></li>
             <li> <a href="./ewm.php"> 二维码管理</a></li>
            </ul>
      
		  <li class="<?php echo checkIfActive('set')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> 平台配置<b class="caret"></b></a>
            <ul class="dropdown-menu">
              
              <li><a href="./paymbtc.php">额度套餐设置</a></li>
              <li><a href="./set.php?mod=site">网站信息配置</a></li>
			  <li><a href="./set.php?mod=else">其他功能配置</a></li>
			  <li><a href="./qqhulian.php">QQ登录接口设置</a></li>
			  <li><a href="./set.php?mod=pay"> 接口对接配置</a></li>
              <li><a href="./set.php?mod=mail">发件邮箱配置</a></li>
			  <li><a href="./set.php?mod=gonggao">网站公告配置</a></li>
			  <li><a href="./set.php?mod=defend">防CC攻击配置</a></li>
			  <li><a href="./set.php?mod=template">首页模板设置</a><li>
            </ul>
          <li class="<?php echo checkIfActive('login')?>"><a href="./login.php?logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->