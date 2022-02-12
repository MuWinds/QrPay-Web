<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <title><?=$conf['sitename']?>-<?=$conf['title']?></title>
    <meta name="description" content="真正的微信和支付宝个人版即时到账支付接口，无需提现，即时到账，100%资金安全，99.9%成功率，无需手续费，无需人工操作，是个人收款的最佳解决方案。">
    <meta name="keywords" content="个人免签支付,免费免签接口,免签约即时到帐辅助,收款码支付">
    <link rel="stylesheet" href="../template/aote/css/iconfont.css">
    <link rel="stylesheet" href="../template/aote/css/animate.min.css">
    <link rel="stylesheet" href="../template/aote/css/main.css">
    <script src="../template/aote/js/jquery-2.2.1.min.js"></script>
    <script src="../template/aote/js/jquery.fullpage.min.js"></script>
    <script src="../template/aote/js/wow.min.js"></script>
    <link href="../template/aote/css/main_mobile.css" rel="stylesheet">
</head>
<body>
    <div id="fullpage">
        <section class="section1 section">
            <!--头部-->
            <header>
                <div class="container">
                    <div class="logo"><?=$conf['sitename']?></div>
                    <nav>
                        <ul>
                            <li><a href="/">首页</a></li>
                            <li><a href="/pay.html" target="_blank">Api对接文档</a></li>
                            <li><a href="/demo.html" target="_blank">软件教程</a></li>
                            <li><a href="../user/index.php" class>登录</a></li>
                            <li><a href="../user/reg.php" class>注册</a></li>
                        </ul>
                    </nav>
                    <div class="nav_btn"><i id="menui" style="display: block;"></i></div>
                </div>
            </header>
            <div class="main_shadow" style="display: none;">
                <ul class="animated fadeInUp">
                    <li><a href="/">首页</a></li>
                    <li><a href="/dj.html" target="_blank">Api对接文档</a></li>
                    <li><a href="../user/index.php" class>登录</a></li>
                    <li><a href="../user/reg.php" class>注册</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="right_img wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.5s">
                    <img src="images/se1_right_img.png" alt>
                </div>
                <div class="left_txt wow fadeInLeft" data-wow-duration="1s">
                    <h1>全新免签支付体验</h1>
                    <p>付款极速响应，秒到个人账户。<br>无需提供账户密码，资金100%安全<br>选择我们几个月不掉线、不再是梦！</p>
                    <a href="../user/index.php" class="shop_btn1"><span class="linear_txt"><i class="iconfont icon-you"></i>登录商户</span></a>
                </div>
                <div class="clear"></div>
                <ul class="zf_icons">
                    <li><img src="../aote/images/zf_icon1.jpeg" alt></li>
                    <li><img src="/template/aote/images/zf_icon2.jpeg" alt></li>
                    <li><img src="images/zf_icon3.jpeg" alt></li>
                    <li><img src="images/zf_icon4.jpeg" alt></li>
                    <li><img src="images/zf_icon5.jpeg" alt></li>
                </ul>
            </div>
        </section>
        <section class="section2 section">
            <div class="container">
                <div class="se2_left_txt wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                    <span class="linear_txt">关于我们 / about us</span>
                    <h3>致力于为用户提供一站式服务的创新型未来互联网企业</h3>
                    <p>
                        易支付拥有多年支付服务经验，专注互联网支付行业。<br><br>
                        推出超低手续费，一秒支付，资金直达，给你更快更好的支付体验。
                    </p>
                    <a href="/reg"><span class="linear_txt"><i class="iconfont icon-you"></i>注册成为商户</span></a>
                </div>
                <div class="right_card wow fadeInUp" data-wow-duration="2s">
                    <ul>
                        <li><div><img src="images/se2_card2.png" alt></div><span class="card_txt"><h3>诚信第一</h3><p>诚信永远是易支付的经营之本，我们抱诚守真尊重、爱护平台的每一位商户以及买家。</p></span></li>
                        <li><div><img src="images/se2_card1.png" alt></div><span class="card_txt"><h3>匠心精神</h3><p>易支付开发团队成员均有长达3年以上的开发经验，匠心精神，铸就高品质体验。</p></span></li>
                        <li><div><img src="images/se2_card4.png" alt></div><span class="card_txt"><h3>商户风控</h3><p>平台每个商户都经过易支付风控组筛选，商户信誉有保障。</p></span></li>
                        <li><div><img src="images/se2_card3.png" alt></div><span class="card_txt"><h3>价格公道</h3><p>零费用开户，秒到个人账户，超低的手续费。</p></span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section3 section">
            <div class="container">
                <div class="se2_left_txt">
                    <span class="linear_txt">平台优势 / advantage</span>
                    <h3>为商户及其买家提供，便捷、绿色、安全、快速的销售和购买体验。</h3>
                    <img src="images/se3_left_img.png" alt class="se3_left_img wow fadeInUp" data-wow-duration="1s">
                </div>
                <div class="se3_right wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.5s">
                    <ul>
                        <li><img src="images/se3_icon1.png" alt><span><h3>服务器安全</h3><p>采用群集服务器，防御高遍布全球，无论用户身在何处，均能获得流畅安全可靠的体验。</p></span><div class="clear"></div></li>
                        <li><img src="images/se3_icon2.png" alt><span><h3>支付方式</h3><p>免签约支付宝、免签约微信、免签约QQ支付</p></span><div class="clear"></div></li>
                        <li><img src="images/se3_icon1.png" alt><span><h3>无需提现</h3><p>免签约支付，秒到个人账户。</p></span><div class="clear"></div></li>
                        <li><img src="images/se3_icon2.png" alt><span><h3>操作简单</h3><p>简约的UI交互体验可以给您一个体验度极高的商户后台，更好的下单体验</p></span><div class="clear"></div></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section4 section">
            <div class="container">
                <div class="se4_title"><span>行业解决方案 / solution</span><h3>专业技术服务团队7*24小时贴心服务</h3></div>
                <div class="se4_cards wow fadeInUp" data-wow-duration="2s">
                    <ul>
                        <li><div><img src="images/se4_icon1.png" alt><h3>个人站长解决方案</h3><p>无需资质，无需签约，无需提现，资金直达。</p></div><img src="images/se4_card1.jpeg" alt width="300"></li>
                        <li><div><img src="images/se4_icon2.png" alt><h3>商城网站解决方案</h3><p>比官方手续费更低，更有包月免手续费套餐。</p></div><img src="images/se4_card2.jpeg" alt width="300"></li>
                        <li class="actived"><div><img src="images/se4_icon3.png" alt><h3>企业解决方案</h3><p>可对接任何网站，资金秒到，再也不怕资金不安全</p></div><img src="images/se4_card3.jpeg" alt width="300"></li>
                        <li><div><img src="images/se4_icon4.png" alt><h3>软件商解决方案</h3><p>一秒接入，Api文档，客服24小时指导开发</p></div><img src="images/se4_card4.jpeg" alt width="300"></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section5 section">
            <div class="se5_card wow fadeInUp" data-wow-duration="2s">
                <div class="se5_left"><img src="http://www.w-x.net.cn/Content/main/picture/kefu.jpg" alt height="200"><br>扫一扫关注官微</div>
                <div class="se5_right">
                    <ul>
                        <li><img src="images/se5_icon3.png" alt><span><h3>版权所有</h3><p>aote 工作时间：7*24小时.不间断为你服务</p></span><div class="clear"></div></li>
                        <li><img src="images/se5_icon1.png" alt><span><h3>联系客服</h3><p>客服QQ：<span><?php echo $conf['qq']?></span></p></span><div class="clear"></div></li>
                        <li><img src="images/se5_icon2.png" alt><span><h3>业务咨询</h3><p>服务邮箱：<strong><?php echo $conf['qq']?>@qq.com</strong></p></span><div class="clear"></div></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
			   <div class="copyright">
        <p>Copyright © 2021 码支付 All rights reserved. 版权所有<br>备案号：<a href="http://www.baidui.cn/" target="_blank">豫ICP备88888888号-1</a></p>
    </div>
            <style>

                .footer_left {
                    display: inline-block;
                    width: 440px;
                }

                .footer_right {
                    display: inline-block;
                    width: 754px;
                    text-align: right;
                }
            </style>
        </section>
    </div>
    <!--右侧固定-->
    <div class="right_fix qq_fix" onclick="window.open('http://wpa.qq.com/msgrd?v=1&uin=888888888&menu=yes')"><i class="iconfont icon-qq"></i> 888888888</div>
    <!--<div class="right_fix phone_fix"><i class="iconfont icon-gongsi"> <a href="#" style="color: #fff;">2273060660@qq.com</a></div>-->
	<div class="right_fix phone_fix"><i class="iconfont icon-gongsi"> <a href="#" style="color: #fff;">88888888@qq.com</a></i></div>

    <script>
        $(function () {
            $('#fullpage').fullpage({
                scrollingSpeed: 300,
                loopBottom: true,
                anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
                resize: false,
                scrollBar: true,
                afterRender: function () {
                    wow = new WOW({
                        animateClass: 'animated',
                    });
                    wow.init();
                }
            });
            $('.se4_cards li div>p').addClass('animated fadeInUp');
            $('.se4_cards li').mousemove(function () {
                $(this).addClass('actived').siblings('li').removeClass('actived');
            });
            $(window).scroll(function () {
                var scrollTop = $(document).scrollTop();//文档上卷高度
                if (scrollTop >= $(window).height()) {
                    $('header').addClass('header_fix');
                    $('.toTop').fadeIn();
                }
                if (scrollTop < $(window).height()) {
                    $('header').removeClass('header_fix');
                    $('.toTop').fadeOut();
                }
            });
            $('.nav_btn').click(function () {
                if ($('.main_shadow').css('display') != 'none') {
                    $(this).removeClass('nav_btn_on');
                    $('.main_shadow').hide();
                    $('#menui').show();
                } else {
                    $(this).addClass('nav_btn_on');
                    $('.main_shadow').show();
                    $('#menui').hide();
                }
                
            });
        });
    </script>
</body>
</html>