 <?php
include("../core/common.php");
include './ha.php';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$row=$DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
$title='充值中心';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8" />
  <title><?php echo $title?> | 会员充值</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <link rel="stylesheet" href="https://lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://lib.baomitu.com/animate.css/3.5.2/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="https://lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="https://lib.baomitu.com/simple-line-icons/2.4.1/css/simple-line-icons.min.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/user/css/font.css" type="text/css"/>
  <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">  <style>
    .content-page {
  border-color: #dee5e7;
  overflow: scroll;
  height: 600px;
}
    </style>
  
</head>

  <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-0">用户中心</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">会员充值</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">VIP开通</li>
                                    </ol>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->



                <div class="row">

                    

                    <div class="col-lg-4 col-md-6" style="cursor: pointer" onclick="type_1();">
                        <div class="card directory-card">
                            <div class="p-4 directory-content">

                                <div class="media">
                                    <div class="media-body text-white" >
                                        <h5 class="mt-0 font-18 mb-1" id="viptitle_4">
                                            包月(新用户优选) - (30天)
                                        </h5>
                                        <small class="text-white-50 m-b-5">
                                            购买本套餐后，无论您测试是否正常使用，都不会退款！（介意请勿下单）<br>                                        </small>
                                        <p class="font-600">
                                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">
                                                <font  id="vipprice_4"><?php echo $conf['huiyuan1']?></font>元
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>

                                <div class="social-links text-center list-inline mb-0 p-3" id="vipdesc_4">
                                <font color=red>
请先购买<font color=blue>测试套餐</font>或<font color=blue>完成实名认证（赠送VIP）</font>进行设备、账号测试<br>
监控软件可能因为您的设备、账号等不可控因素导致您无法正常使用<br>
测试可使用后再开更长时间的VIP套餐
</font>                                </div>

                                <!--
                                <ul class="social-links text-center list-inline mb-0 p-3">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">windows</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">App</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm">不支持三网免挂</button>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-lg-4 col-md-6" style="cursor: pointer" onclick="type_3();">
                        <div class="card directory-card">
                            <div class="p-4 directory-content">

                                <div class="media">
                                    <div class="media-body text-white" >
                                        <h5 class="mt-0 font-18 mb-1" id="viptitle_5">
                                            VIP季度 - (90天)
                                        </h5>
                                        <small class="text-white-50 m-b-5">
                                            不限额度，不限接入数量<br>
                                      </small>
                                        <p class="font-600">
                                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">
                                                <font  id="vipprice_5"><?php echo $conf['huiyuan2']?></font>元
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>

                                <div class="social-links text-center list-inline mb-0 p-3" id="vipdesc_5">
                                <font color=red>请确保您能正常使用本平台后开通！本套餐开通后不退款</font><br>
三网可用，需要自己挂监控软件<br>
每个通道选择任意一种监控方式即可，可使用“软件下载”中所有监控软件<br>                                </div>

                                <!--
                                <ul class="social-links text-center list-inline mb-0 p-3">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">windows</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">App</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm">不支持三网免挂</button>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-lg-4 col-md-6" style="cursor: pointer" onclick="type_2();">
                        <div class="card directory-card">
                            <div class="p-4 directory-content">

                                <div class="media">
                                    <div class="media-body text-white" >
                                        <h5 class="mt-0 font-18 mb-1" id="viptitle_6">
                                            包年VIP - (365天)
                                        </h5>
                                        <small class="text-white-50 m-b-5">
                                            不限额度，不限接入数量<br>
                                      </small>
                                        <p class="font-600">
                                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">
                                                <font  id="vipprice_6"><?php echo $conf['huiyuan3']?></font>元
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>

                                <div class="social-links text-center list-inline mb-0 p-3" id="vipdesc_6">
                                <font color=red>请确保您能正常使用本平台后开通！本套餐开通后不退款</font><br>
三网可用，支持免挂<br>
可使用“软件下载”中所有监控软件<br>
微信免挂｜支付宝免挂｜QQ免挂                                </div>

                                <!--
                                <ul class="social-links text-center list-inline mb-0 p-3">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">windows</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">App</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm">不支持三网免挂</button>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-lg-4 col-md-6" style="cursor: pointer" onclick="vip(7)">
                        <div class="card directory-card">
                            <div class="p-4 directory-content">

                                <div class="media">
                                    <div class="media-body text-white" >
                                        <h5 class="mt-0 font-18 mb-1" id="viptitle_7">
                                            终身VIP - 暂时不开放
                                        </h5>
                                        <small class="text-white-50 m-b-5">
                                            不限制额度，不限制接入网站数量<br>
                                            </small>
                                        <p class="font-600">
                                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">
                                                <font  id="vipprice_7">9999</font>元
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>

                                <div class="social-links text-center list-inline mb-0 p-3" id="vipdesc_7">
                                <font color=red>请确保您能正常使用本平台后开通！本套餐开通后不退款</font><br>
三网可用，支持免挂<br>
可使用“软件下载”中所有监控软件<br>
微信免挂｜当面付｜支付宝免挂｜QQ免挂                                </div>

                                <!--
                                <ul class="social-links text-center list-inline mb-0 p-3">
                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">windows</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">App</button>
                                    </li>

                                    <li class="list-inline-item">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm">不支持三网免挂</button>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
                    </div>

                    





                </div>





            </div> <!-- container-fluid -->

        </div> <!-- content -->
        

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
<div style="display: none" id="vip-alter">购买前仔细看每个套餐的介绍与说明 【本平台不做资金代收，资金结算，只做辅助收款】
<hr>
用户购买协议：<br>
<small>
<font color="#d63031" size="2"> 
1. 平台不会为任何违法违规(包括但不限于：外挂、破解、淫秽、涉赌、政治、钓鱼、诈骗)网站提供接入服务 <br>
 <font color="#ff5252">
 禁止出售内容：破解软件，游戏辅助(外挂)，翻墙/VPN，短信轰炸，色情软件/盒子(卡密)，支付宝等包含公民身份信息的账号，等不限于此的违法违规内容</font><font color="#2c2c54" size="2">< 查到即封，不予通知 ></font><br>
<font color="#6c5ce7" size="2"> 
2. 本平台只做辅助收款，不参与任何订单交易，任何 平台/网站/系统 对接本平台产生的法律纠纷/资金纠纷与本平台无关<br>
3. 如用户网站产生法律纠纷,本平台可在未经该用户允许的情况下向<font color="red" size="2">国家相关机构</font>提供相关用户资料</font>
</small> 
</div>
</div>

<script>
//product type
function type_1(){
	var r = confirm("请问是否开通30天会员?");
	if(r==true){
		window.location.href ='./sjpayapi.php?WIDsubject=<?php echo $pid?>&WIDtotal_fee=<?php echo $conf['huiyuan1']?>&type=<?php echo $conf['cztype']?>';
	};
};
function type_2(){
	var r = confirm("请问是否开通360天会员?");
	if(r==true){
	    window.location.href = './sjpayapi.php?WIDsubject=<?php echo $pid?>&WIDtotal_fee=<?php echo $conf['huiyuan3']?>&type=<?php echo $conf['cztype']?>';
	};
};
function type_3(){
	var r = confirm("请问是否开通季会员，需支付15元！");
	if(r==true){
		window.location.href = './sjpayapi.php?WIDsubject=<?php echo $pid?>&WIDtotal_fee=<?php echo $conf['huiyuan2']?>&type=<?php echo $conf['cztype']?>';
	};
};
</script>
<?php include './foot.php';?>