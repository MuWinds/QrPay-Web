<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
     <title><?=$conf['sitename']?>-<?=$conf['title']?></title>
    <meta name="description" content="<?=$conf['sitename']?>,免挂码支付,提供个人二维码支付API接口对接,方便网站、小程序、公众号及商城对接,收款及时到账,无手续费,避免第三方支付资金跑路风险,">
    <meta name="keywords" content="易支付,码支付,免挂码支付,244码支付,二维码支付,个人支付，码支付API,支付平台,支付api,易支付API,码支付接口,免签支付">
    <link rel="shortcut icon" href="../template/Aotpays/favicon.ico" type="image/x-icon">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../template/Aotpays/css/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="../template/Aotpays/css/jdc-side-panel.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="../template/Aotpays/css/common.css">
    
    <script charset="UTF-8" id="LA_COLLECT" src="../template/Aotpays/js/js-sdk-pro.min.js"></script>
<script>LA.init({id: "JLXW3s4MOWr1VmSO",ck: "JLXW3s4MOWr1VmSO"})</script>
</head>

<body>
   <div class="jdc-side" style="display: block;">
  <div class="mod_hang_appeal">
    <div class="mod_hang_appeal_btn"><i class="jdcfont"></i> <span>咨询反馈</span></div>
    <div class="mod_hang_appeal_show">
      <ul>
        <li><a href="https://wpa.qq.com/msgrd?v=3&uin=修改你的QQ&site=pay&menu=yes" target="_blank">
          <div class="icon_box"><i class="jdcfont"></i></div>
          <div class="text_box">
            <h5>人工客服</h5>
            <p>7*12 专业客服，服务咨询</p>
          </div>
          </a></li>
        <li id="entry"><a href="https://wpa.qq.com/msgrd?v=3&uin=修改你的QQ&site=pay&menu=yes" target="_blank" class="f-cb">
          <div class="icon_box"><i class="jdcfont"></i></div>
          <div class="text_box">
            <h5>工单服务</h5>
            <p>7*24全时处理，技术支持</p>
          </div>
          </a></li>
        <li><a href="https://wpa.qq.com/msgrd?v=3&uin=修改你的QQ&site=pay&menu=yes" target="_blank" class="f-cb">
          <div class="icon_box"><i class="jdcfont"></i></div>
          <div class="text_box">
            <h5>投诉建议</h5>
            <p>倾耳聆听，一个工作日内及时处理</p>
          </div>
          </a></li>
      </ul>
    </div>
    </div>
  
  <div class="mod_hang_qrcode mod_hang_top"><a href="#" class="mod_hang_qrcode_btn"><i class="jdcfont"></i><span>返回顶部</span></a></div>
  <div class="el-dialog__wrapper" style="display: none;">
    <div class="el-dialog el-dialog--small" style="top: 15%;">
      <div class="el-dialog__header"><span class="el-dialog__title"></span>
        <div type="button" class="el-dialog__headerbtn"><i class="el-dialog__close el-icon el-icon-close"></i></div>
      </div>
      </div>
  </div>
</div>
    <div class="wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" style="background: #fff!important;">
            <div class="container container-s">
                <div class="navbar-brand">
                    <?=$conf['sitename']?></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right">
                        <li class="nav-item"><a class="btn-cta nav-link js-scroll-trigger" target="blank" href="/dj.html">开发文档</a></li>
                        <li class="nav-item"><a class="btn-cta nav-link js-scroll-trigger" href="/user/index.php">控制台</a></li>
                        <li class="nav-item"><a class="btn-cta nav-link js-scroll-trigger" href="/SDK/A">支付测试</a></li>
                        <li class="nav-item"><a class="btn-cta nav-link js-scroll-trigger" href="你的QQ群链接">官方Q群</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="main" class="main">
            <div class="home">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="hero-img wow fadeIn">
                                <img class="img-fluid" src="../template/Aotpays/images/big.png">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="hero-content wow fadeIn">
                                <h1><?=$conf['sitename']?></h1>
                                <p>稳定、安全、高效的个人免签约收款 ● API回调系统</p>
                                <a class="btn-action js-scroll-trigger" href="/user/login.php">登陆</a>
                                <a class="btn-action js-scroll-trigger" href="/user/reg.php">注册</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
                       <!--新加的代码-->


                <div class="container-m">
                    <div class="row text-center">

                        <div class="col-md-6 col-lg-4">
                            <div class="feature-list">
                                <div class="card-icon">
                                    <div class="card-img">
                                        <img src="../template/Aotpays/images/home_wx.png" width="42">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <h3>微信 扫码免签</h3>
                                    <p>微信扫码 ● 或内部长按识别<br>支持个人 ● 企业固码/活码.支持轮训</p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-list">
                                <div class="card-icon">
                                    <div class="card-img">
                                        <img src="../template/Aotpays/images/home_alipay.png" width="42">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <h3>支付宝 扫码免签</h3>
                                    <p>支付宝扫码 ● 或内部长按识别<br>支持个人 ● 企业固码/活码.支持轮训</p>
                                </div>
                            </div>
                        </div>
                        
                        
<!--单独模块-->
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-list">
                                <div class="card-icon">
                                        <div class="card-img">
                                            <img src="../template/Aotpays/images/home_qq.png" width="42">
                                        </div>
                                </div>
                                        <div class="card-text">
                                            <h3>QQ 扫码免签</h3>
                                            <p>QQ扫码 ● 或内部长按识别<br>支付个人 ● 企业固码/活码.支持轮训</p>
                                        </div>
                            </div>
                        </div>
<!--单独模块-->
                    </div>
                </div>
            </div>
            
             <div class="flex-intro align-center wow fadeIn">

            </div>
                                

            
            <!--新加的代码-->
            
            
            
            
            
            
            
            
            
            <div id="products" class="features wow fadeInDown">
                <div class="container-m">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="features-intro">
                                <h2>为什么选择我们？</h2>
                                <p>众多收款平台里为什么要选择我们？</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-list">
                                <div class="card-icon">
                                    <div class="card-img">
                                        <img src="../template/Aotpays/images/a3.png" width="35">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <h3>安全</h3>
                                    <p>资金直达个人账户<br>没有服务商卷款跑路风险</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-list">
                                <div class="card-icon">
                                    <div class="card-img">
                                        <img src="../template/Aotpays/images/a2.png" width="35">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <h3>稳定</h3>
                                    <p>采用全球分布式CDN加速<br>收款回调速度快</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="feature-list">
                                <div class="card-icon">
                                    <div class="card-img">
                                        <img src="../template/Aotpays/images/a1.png" width="35">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <h3>服务</h3>
                                    <p>技术客服7x12小时为您提供接入帮助<br>以及其他技术咨询解答。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            

<!-- <li>
                            
<div class="flex-inner align-center"  align="center">
                        
                        
                <div class="col-md-6 col-lg-6" >
					<div>
						<img height="50" src="/index/images/zhuce.png" width="50">
						<p>注册商户</p>
					</div>
    		    </div>

        						
        							<div>
        								<img height="50" src="/public/img/t011a697340039a44c9.png" width="50">
        								<p>资料审批</p>
        							</div>
        						

					<div>
						<img height="50" src="/index/images/peizhi.png" width="50">
						<p>配置账户</p>
					</div>

        	    
        	    
                <div class="col-md-6 col-lg-2">
					<div>
						<img height="50" src="/index/images/duijie.png" width="50">
						<p>对接测试</p>
					</div>
    		    </div>

        	    
                <div class="col-md-6 col-lg-2">
					<div>
						<img height="50" src="/index/images/shangxian.png" width="50">
						<p>上线使用</p>
					</div>
        	    </div>
</div>

 </li> -->           
            
            
            
            
            





            
            
            
            
            
            <div id="features" class="flex-split">
                <div class="container-s">
                    <div class="flex-intro align-center wow fadeIn">
                        <h2>接入简单 ● 操作流程</h2>
                        <p>提供集成DEMO和API开发文档，人性化面板一目了然<br>注册登录商户 ● 上传活码/固码 ● 添加免挂支付通道</p>
                    </div>
                    <div class="flex-inner align-center">
                        <div class="f-image wow">
                       
                           
                            

                        </div>
                        <div class="f-text">
                            <div class="left-content">
                                <h2>人性化面板</h2>
                                <p>订单详情一目了然，操作简单</p>
                                <a href="/User/index.php">立即使用</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            <div class="yd-stats wow fadeIn">
                <div class="container-s">
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <div class="intro">
                                <h2>真实数据</h2>
                                <p>数据这种东西，要真的看着才顺心呐.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter-up">
                                <h3><span class="counter">1066</span></h3>
                                <div class="counter-text">
                                    <h2>接入商户</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter-up">
                                <h3><span class="counter">10.03w</span></h3>
                                <div class="counter-text">
                                    <h2>交易金额(万元)</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter-up">
                                <h3><span class="counter">15409</span></h3>
                                <div class="counter-text">
                                    <h2>累计订单数</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="yd-link">
                                <a href="/User/index.php">我也要使用&gt;&gt; 点这里</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ar-ft-single wow fadeIn">
                <div class="container-m">
                    <div class="ar-feature">
                        <div class="ar-list">
                            <ul>
                                <li>
                                    <div class="ar-icon">
                                        <img src="../template/Aotpays/images/f1.png" width="30">
                                    </div>
                                    <div class="ar-text">
                                        <h3>快速回调</h3>
                                        <p>api接口采用全球分布式CDN加速，让响应回调速度快些再快些吧</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ar-icon">
                                        <img src="../template/Aotpays/images/f4.png" width="30">
                                    </div>
                                    <div class="ar-text">
                                        <h3>技术支持</h3>
                                        <p>提供技术支持，视情况免费为商户提供接入服务。</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ar-icon">
                                        <img src="../template/Aotpays/images/f11.png" width="30">
                                    </div>
                                    <div class="ar-text">
                                        <h3>意见反馈</h3>
                                        <p>每周查看商户的建议，进行改进增加</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ar-image">
                            <img class="ar-img img-fluid" src="../template/Aotpays/images/feature.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <a href="https://wpa.qq.com/msgrd?v=3&uin=修改你的QQ&site=pay&menu=yes">
                              
                            </a>
                            <h6><?=$conf['sitename']?> | 备案号: 粤ICP备88888888号-1<a href="https://beian.miit.gov.cn/" target="_blank"></a></h6>
                            

                        </div>
                    </div>
                </div>
            </div>
            <!-- <div id="back-top" class="bk-top">
                <div class="bk-top-txt">
                    <a class="back-to-top js-scroll-trigger" href="#main"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div> -->
        </div>
    
    <script type="text/javascript" src="../template/Aotpays/js/popper.min.js"></script>
    <script type="text/javascript" src="../template/Aotpays/js/bootstrap.min.js"></script>
    <script>
    </script>
</body>

</html>