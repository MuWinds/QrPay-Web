<?php
include("../core/common.php");
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);

if (!checkIfActive('index,userinfo,') and !$userrow['issmrz']) {

    exit('<script>alert("请实名认证!");location.href="./userinfo.php"</script>');

}
?>
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
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/app.css" type="text/css"/>
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="app app-header-fixed">
    <header id="header" class="app-header navbar" role="menu">
        <div class="navbar-header bg-dark">
            <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
                <i class="glyphicon glyphicon-cog"></i>
            </button>
            <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
                <i class="glyphicon glyphicon-align-justify"></i>
            </button>
            <a href="/" class="navbar-brand text-lt">
                <i class="fa fa-btc"></i>
                <span class="hidden-folded m-l-xs">支付狗</span>
            </a>
        </div>
        <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
            <div class="nav navbar-nav hidden-xs">
                <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
                    <i class="fa fa-dedent fa-fw text"></i>
                    <i class="fa fa-indent fa-fw text-active"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                        <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                            <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $userrow['qq'] ?>&amp;spec=100" alt="Avatar" width="60" height="60" class="img-circle ">
                            <i class="on md b-white bottom"></i>
                        </span>
                        <span class="hidden-sm hidden-md" style="text-transform:uppercase;"><?php echo $pid ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight w">
                        <li>
                            <a href="index.php">
                                <span>用户中心</span>
                            </a>
                        </li>
                        <li>
                            <a href="userinfo.php">
                                <span>修改资料</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a ui-sref="access.signin" href="login.php?logout">退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <aside id="aside" class="app-aside hidden-xs bg-dark">
        <nav class="aside-wrap">
            <div class="navi-wrap">
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>导航</span>
                        </li>
                        <li>
                            <a href="/user">
                                <i class="glyphicon glyphicon-home icon text-primary-dker"></i>
                                <b class="label bg-info pull-right">N</b>
                                <span class="font-bold">用户中心</span>
                            </a>
                        </li>
                        <li>
                            <a href class="auto">
                                <span class="pull-right text-muted">
                                    <i class="fa fa-fw fa-angle-right text"></i>
                                    <i class="fa fa-fw fa-angle-down text-active"></i>
                                </span>
                                <i class="glyphicon glyphicon-leaf icon text-success-lter"></i>
                                <span>账户安全</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a href>
                                        <span>账户安全</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="userinfo.php?mod=user" onclick="activeselect(this)">
                                        <span>修改资料</span>
                                    </a>
                                </li>
                                  <li>
                                    <a href="api.php" onclick="activeselect(this)">
                                        <span>API接口</span>
                                    </a>
                                </li>
                            </ul>
              </li>
              
              
              
              
              
              
             <li class="line dk hidden-folded"></li>
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                <span>易支付</span>
              </li>
              <li>
              
              <a href="dsks.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cog"></i>
                  <span>易支付管理</span>
                </a>
              </li>
			  <li>
			  <a href="dskorder.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cog"></i>
                  <span>易支付订单</span>
                </a>
              </li>
			  <li>
             
            <a href="apply.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cog"></i>
                  <span>申请提现</span>
                </a>
              </li>
			  <li>
			  
			               <li class="line dk hidden-folded"></li>
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                <span>码支付</span>
              </li>
     <li>
                               <a href="order.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-list-alt"></i>
                  <span>码支付订单管理</span>
                </a>
              </li>

               <li>
                  <a href="ewm.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-qrcode"></i>
                  <span>收款码管理</span>
                </a>
              </li>

			  <li>
                               <a href="mzfsz.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cog"></i>
                  <span>支付公告设置</span>
                </a>
              </li>
              
             <li class="line dk hidden-folded"></li>
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                <span>云端免挂</span>
              </li>
              <li>
		      
		      <a href="qqcookie.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-dashboard"></i>
                  <span>云端财付通</span>
                </a>
              </li>
			  <li>
			      
			 <a href="alicookie.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-dashboard"></i>
                  <span>云端支付宝</span>
                </a>
              </li>
			  <li>
		      
		      <a href="wxname.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-dashboard"></i>
                  <span>云端微信</span>
                </a>
              </li>
			  <li>
			 <li>
                               <a href="http://jk.codepay9.cn" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cog"></i>
                  <span>云端监控网站</span>
                </a>
              </li>
   			  <li>
			 
    
               <li>
              <li class="line dk hidden-folded"></li>
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                <span>帮助</span>
              </li>
              <li>
              

                         <li>
               <a href="http://pay.zhycn.xyz/sm" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cloud-download"></i>
                        <span>获取cookie文本教程</span>
                </a>
              </li>
                
              
               <li>
                <a href="down.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-folder-open"></i>
                  <span>软件及插件列表</span>
                </a>
              </li>
               <li>
                <a href="http://pay.zhycn.xyz/dj.html" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-sort"></i>
                  <span>对接档案</span>
                </a>
              </li>
              <li>
                <a href="help.php" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-cloud-download"></i>
                  <span>使用说明</span>
                </a>
              </li>
               <li>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=3582767782&site=qq&menu=yes" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-headphones"></i>
                  <span>联系客服</span>
                </a>
              </li>
   
                <li>
                <a href="https://qm.qq.com/cgi-bin/qm/qr?k=bUeWYQha8qk7N3KcLffjtn85Krk6Vpr2&jump_from=webapi" onclick="activeselect(this)">
                  <i class="glyphicon glyphicon-headphones"></i>
                  <span>加入官方Q群</span>
                </a>
              </li>
   
    
               <li>
                    </ul>
                </nav>
            </div>
            <div class="wrapper m-t">
                <div class="text-center-folded">
                <span class="pull-right pull-none-folded">
                    <?php
                    $a = 0;
                    for ($i = 0; $i < 1000000; $i++) $a += $i;
                    $runtime->stop();
                    echo $runtime->spent();
                    ?>%
                </span>
                    <span class="hidden-folded">XRPPAY</span>
                </div>
                <div class="progress progress-xxs m-t-sm dk">
                    <div class="progress-bar progress-bar-info" style="width: <?php
                    $a = 0;
                    for ($i = 0; $i < 1000000; $i++) $a += $i;
                    $runtime->stop();
                    echo $runtime->spent();
                    ?>%;">
                    </div>
                </div>
                <div class="text-center-folded">
                <span class="pull-right pull-none-folded">
                    <?php
                    $a = 0;
                    for ($i = 0; $i < 1000000; $i++) $a += $i;
                    $runtime->stop();
                    echo $runtime->spent();
                    ?>%
                </span>
                    <span class="hidden-folded"><h6>XRPAY</h6></span>
                </div>
                <div class="progress progress-xxs m-t-sm dk">
                    <div class="progress-bar progress-bar-primary" style="width: <?php
                    $a = 0;
                    for ($i = 0; $i < 1000000; $i++) $a += $i;
                    $runtime->stop();
                    echo $runtime->spent();
                    ?>%;">
                    </div>
                </div>
            </div>
    </aside>