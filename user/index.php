<?php
include("../core/common.php");
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

<?php
$orders = $DB->query("SELECT count(*) from pay_order WHERE pid={$pid} and software=1")->fetchColumn();
$lastday=date("Y-m-d",strtotime("-1 day")).' 00:00:00';
$today=date("Y-m-d").' 00:00:00';
$order_today=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=1 and endtime>='$today'")->fetchColumn();
$order_lastday=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=1 and addtime>='$lastday' and endtime<'$today'")->fetchColumn();
$settle_money=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and software=1 and status=1")->fetchColumn();
$rs=$DB->query("SELECT * from pay_order where pid={$pid} and status=1 and software=1");
$max_settle=0;
$chart='';
$i=0;
while($row = $rs->fetch())
{
	if($row['money']>$max_settle)$max_settle=$row['money'];
	if($i<9)$chart.='['.$i.','.$row['money'].'],';
	$i++;
}
$chart=substr($chart,0,-1);
$sjya=date("Y-m-d H:i",$userrow['sjian']);
$sj=date("Y-m-d");

if (!checkIfActive('index,userinfo,') and !$userrow['issmrz']) {

    exit('<script>alert("请实名认证!");location.href="./userinfo.php"</script>');

}
?>

    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

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
                                    <i class="dripicons-meter"></i><span class="badge badge-info badge-pill float-right">2</span> <span> 用户中心 </span>
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
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-graph-bar"></i><span>  免挂服务 <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
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

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <h4 class="page-title mb-0">用户首页</h4>
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="#">控制</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">用户中心</li>
                                            </ol>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="float-right d-none d-md-block">
                                                <div class="dropdown">
                                             
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stats">
                                    <div class="p-3 mini-stats-content">
                                        <div class="mb-4">
                                            <div class="float-right text-right">
                                                <span class="badge badge-light text-info mt-2 mb-2"> + 11% </span> 
                                                <p class="text-white-50"></p>
                                            </div>
                                            
                                            <span class="peity-pie" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"]}' data-width="54" data-height="54">5/8</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 mr-3">
                                        <div class="bg-white p-3 mini-stats-desc rounded">
                                            <h5 class="float-right mt-0"><?php echo $orders?></h5>
                                            <h6 class="mt-0 mb-3">订单总数</h6>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stats">
                                    <div class="p-3 mini-stats-content">
                                        <div class="mb-4">
                                            <div class="float-right text-right">
                                                <span class="badge badge-light text-danger mt-2 mb-2"> - 27% </span> 
                                                <p class="text-white-50"></p>
                                            </div>
                                            
                                            <span class="peity-donut" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }' data-width="54" data-height="54">2/5</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 mr-3">
                                        <div class="bg-white p-3 mini-stats-desc rounded">
                                            <h5 class="float-right mt-0">$<?php echo $order_today?sprintf("%.2f",$order_today):'0.00' ?></h5>
                                            <h6 class="mt-0 mb-3">今天收入</h6>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stats">
                                    <div class="p-3 mini-stats-content">
                                        <div class="mb-4">
                                            <div class="float-right text-right">
                                                <span class="badge badge-light text-primary mt-2 mb-2"> 0% </span> 
                                                <p class="text-white-50"></p>
                                            </div>
                                            
                                            <span class="peity-pie" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"]}' data-width="54" data-height="54">3/8</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 mr-3">
                                        <div class="bg-white p-3 mini-stats-desc rounded">
                                            <h5 class="float-right mt-0">$<?php echo $order_lastday?sprintf("%.2f",$order_lastday):'0.00'?></h5>
                                            <h6 class="mt-0 mb-3">昨天收入</h6>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stats">
                                    <div class="p-3 mini-stats-content">
                                        <div class="mb-4">
                                            <div class="float-right text-right">
                                                <span class="badge badge-light text-info mt-2 mb-2"> - 89% </span> 
                                                <p class="text-white-50"></p>
                                            </div>
                                            <span class="peity-donut" data-peity='{ "fill": ["rgba(255, 255, 255, 0.8)", "rgba(255, 255, 255, 0.2)"], "innerRadius": 18, "radius": 32 }' data-width="54" data-height="54">3/5</span>
                                        </div>
                                    </div>
                                    <div class="ml-3 mr-3">
                                        <div class="bg-white p-3 mini-stats-desc rounded">
                                            <h5 class="float-right mt-0">$<?php echo $settle_money?sprintf("%.2f",$settle_money):'0.00' ?></h5>
                                            <h6 class="mt-0 mb-3">总计收入</h6>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->
        
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">数据</h4>
                                        <div class="py-4">
                                            <img class="rounded-circle" alt="200x200" src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $userrow['qq'] ?>&amp;spec=100" data-holder-rendered="true">
                                        </div>
        
         
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="weekly-sale-list text-center">
                                                    <h5>会员状态</h5>
                                                    <p class="text-muted mb-0"><?php echo ($userrow['sjian']>=time())?$sjya:'未开通';?></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="weekly-sale-list text-center">
                                                    <h5>当前额度</h5>
                                                    <p class="text-muted mb-0"><?php echo $userrow['paymb'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card product-sales">
                                    <div class="card-body">
                                        <h5 class="mt-0 mb-4"><i class="ion-monitor h4 mr-2 text-primary"></i> 全年收入</h5>
                                        <div class="row align-items-center mb-4">
                                            <div class="col-6">
                                                <p class="text-muted">This Month Sales</p>
                                                <h4><sup class="mr-1"><small>$</small></sup>$<?php echo $settle_money?sprintf("%.2f",$settle_money):'0.00' ?></h4>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <span class="peity-pie" data-peity='{ "fill": ["#655be6", "#f2f2f2"]}' data-width="60" data-height="60">70/100</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-3">Top Cities Sales</p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="text-muted mb-2">Los Angeles : <b class="text-dark">$ 8,235</b></p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="text-muted mb-2">San Francisco : <b class="text-dark">$ 7,256</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
     
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">个人信息</h4>

                                <div class="p-2">
                                    <ul class="list-unstyled rec-acti-list mb-0">
                                        
                                        <li class="rec-acti-list-item">
                                            <div>
                                                <p class="text-muted mb-0">
                                                    商户ID
                                                </p>
                                                <h6 class="mb-0"><a  class="text-dark">
                                                    <?php echo $pid?>                                                 </a></h6
                                            </div>
                                        </li>
                                        <li class="rec-acti-list-item">
                                            <div>
                                                <p class="text-muted mb-0">
                                                    商户KEY
                                                    </p>
                                                    <h6 class="mb-0"><a class="text-dark">
                                                        <?php echo authcode($userrow['key'], 'DECODE', $conf['KEY']);?>                                                   </a></h6>

                                            </div>
                                        </li>
                                        <li class="rec-acti-list-item">
                                            <div>
                                                <p class="text-muted mb-0">QQ快捷登录</p>
                                                <h6 class="mb-0"><a  class="text-dark">
                                                 <?php if($userrow['qq_uid']==null){?>
                                  <a href="qq.php" <span class="layui-btn  layui-btn-xs layui-btn-primary layui-border-green">绑定QQ</span> </a>
                                                        
                                   			
                                    
				                     <?php }else{?>     
                                  <a href="qq.php?act=del_bind" <span class="layui-btn  layui-btn-xs layui-btn-primary layui-border-green">解除绑定</span> </a>               			
				<?php } ?>
                                                    
                                                </a></h6>

                                            </div>
                                        </li>
                                        <li class="rec-acti-list-item">
                                            <div>
                                                <p class="text-muted mb-0">绑定邮箱</p>
                                                <h6 class="mb-0"><a  class="text-dark">
                                                    <?php echo $userrow['qq'] ?>@qq.com                                                </a></h6>

                                            </div>
                                        </li>
                                        <li class="rec-acti-list-item">
                                            <div>
                                                <p class="text-muted mb-0">修改密码</p>
                                                <h6 class="mb-0"><a  class="text-dark">

                                                         <a href="/user/userinfo.php">前往修改</a>

                                                                                                    </a></h6>

                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
        
                   
                        <!-- end row -->
                                
                        <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                        <h4 class="mt-0 header-title">通道状态</h4>
                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">通道</th>
                                                        <th scope="col">时间</th>
                                                        <th scope="col">状态</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                             
                                                        <td>
                                                            <div>
                                                                <img src="/user/assets/images/qq.ico" alt="" class="thumb-sm rounded-circle mr-2"> QQ免挂
                                                            </div>
                                                        </td>
                                                        <td><?php echo $sj?></td>
                                                        <td><?php echo ($userrow['qq_login'] >= time()) ? '<span class="badge badge-success">在线</span>' : '<span class="badge badge-danger">离线</span>'; ?></span></td>

                                                    </tr>
                                                    <tr>
                                                  
                                                        <td>
                                                            <div>
                                                                <img src="/user/assets/images/alipay.ico" alt="" class="thumb-sm rounded-circle mr-2"> 支付宝免挂
                                                            </div>
                                                        </td>
                                                        <td><?php echo $sj?></td>
                                                        <td><?php echo ($userrow['ali_login'] >= time()) ? '<span class="badge badge-success">在线</span>' : '<span class="badge badge-danger">离线</span>'; ?></span></td>
                                                        
                                                    </tr>
                                                    <tr>
                                         
                                                        <td>
                                                            <div>
                                                                <img src="/user/assets/images/wx.ico" alt="" class="thumb-sm rounded-circle mr-2"> 微信免挂
                                                            </div>
                                                        </td>
                                                        <td><?php echo $sj?></td>
                                                        <td><?php echo ($userrow['wxcornzt']=="1")?'<span class="badge badge-success">在线</span>' : '<span class="badge badge-danger">离线</span>'; ?></span></td>

                                                    </tr>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2020 - 2021 Aote <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> By Aote</span>
                </footer>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.js"></script>

        <script src="../plugins/peity-chart/jquery.peity.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <script src="assets/pages/dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>



    </body>
</html>