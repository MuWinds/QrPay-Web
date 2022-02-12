<?php
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);

if (!checkIfActive('index,userinfo,') and !$userrow['issmrz']) {

    exit('<script>alert("请实名认证!");location.href="./userinfo.php"</script>');

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $title ?>  <?= $conf['sitename'] ?>-<?= $conf['title'] ?></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Alertify css -->
        <link href="../plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">

        <!-- Basic Css files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">
        <!-- Loader -->
       <div id="preloader"> <div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                         
                        <img src="assets/images/logo.png" alt="" height="20" class="logo-large">
                        <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-sm">
                    </a>
                </div>

                <nav class="navbar-custom">
                    <!-- Search input -->
                    <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input" type="search" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list flags-dropdown d-none d-sm-inline-block">
                            
                            <div class="dropdown-menu dropdown-menu-animated">
                                <a href="#" class="dropdown-item"><img src="assets/images/flags/french_flag.jpg" alt="" class="flag-img"> French</a>
                                <a href="#" class="dropdown-item"><img src="assets/images/flags/germany_flag.jpg" alt="" class="flag-img"> Germany</a>
                                <a href="#" class="dropdown-item"><img src="assets/images/flags/italy_flag.jpg" alt="" class="flag-img"> Italy</a>
                                <a href="#" class="dropdown-item"><img src="assets/images/flags/spain_flag.jpg" alt="" class="flag-img"> Spain</a>
                            </div>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                <i class="mdi mdi-magnify noti-icon"></i>
                            </a>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-info badge-pill noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-arrow dropdown-menu-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5>通知 (3)</h5>
                                </div>

                                <div class="slimscroll-noti">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>同款码支付系统授权</b><span class="text-muted">本站同款码支付系统授权388.</span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                        <p class="notify-details"><b>客服QQ</b><span class="text-muted"><?php echo $conf['qq'] ?></span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                        <p class="notify-details"><b>官方QQ群</b><span class="text-muted"><?php echo $conf['qq_qun'] ?></span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                        <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                    </a>

                                </div>
                                

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                                <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $userrow['qq'] ?>&amp;spec=100" alt="user" class="rounded-circle">
                                <span class="d-none d-md-inline-block ml-1">用户中心 <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <a class="dropdown-item" href="userinfo.php"><i class="dripicons-user text-muted"></i> 修改信息</a>
                                <a class="dropdown-item" href="api.php"><i class="dripicons-wallet text-muted"></i> API信息</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php?logout"><i class="dripicons-exit text-muted"></i> 注销登录</a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                   <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">导航</li>
                            <li>
                                <a href="index.php" class="waves-effect">
                                    <i class="dripicons-meter"></i> <span class="badge badge-info badge-pill float-right">2</span><span> 用户中心 </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-message"></i><span> 个人信息 <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="api.php">API信息</a></li>
                                    <li><a href="userinfo.php">修改信息</a></li>
                                </ul>
                            </li>

                           <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-message"></i><span> 会员额度 <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="zxcs.php">在线测试</a></li>
                                    <li><a href="edcz.php">充值额度</a></li>
                                    <li><a href="hykt.php">开通会员</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> 代收管理 <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="dsks.php">代收款</a></li>
                                    <li><a href="dskorder.php">代收订单</a></li>
                                    <li><a href="apply.php">申请提现</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-broadcast"></i> <span> 支付管理  <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                                <ul class="submenu">
                                    <li><a href="ewm.php">收款码上传</a></li>
                                    <li><a href="mzfsz.php">支付公告</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-to-do"></i><span> 轮训模式 <span class="badge badge-pill badge-success float-right">4</span> </span></a>
                                <ul class="submenu">
                                    <li><a href="wxname1.php">微信轮训①</a></li>
                                    <li><a href="wxname2.php">微信轮训②</a></li>
                                    <li><a href="alicookie1.php">支付宝轮训①</a></li>
                                    <li><a href="qqcookie1.php">QQ轮训①</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-graph-bar"></i><span> 免挂服务 <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="wxname.php">微信免挂</a></li>
                                    <li><a href="qqcookie.php">QQ免挂</a></li>
                                    <li><a href="alicookie.php">支付宝免挂</a></li>
                                    <li><a href="order.php">订单管理</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-thumb"></i><span> 云端监控网站 <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="tables-basic.html">自行搭建</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-map"></i><span> 文档插件 <span class="badge badge-pill badge-danger float-right">2</span> </span></a>
                                <ul class="submenu">
                                    <li><a href="../dj.html"> 对接文档</a></li>
                                    <li><a href="down.php">插件下载</a></li>
                                </ul>
                            </li>

                           
                    </div>
               
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->


      <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.js"></script>

        <!-- Alertify js -->
        <script src="../plugins/alertify/js/alertify.js"></script>
        <script src="assets/pages/alertify-init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>
     </br>
 </br>
  </br>

