
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow, archive">
    <meta name="author" content="xieyang">
    <link rel="shortcut icon" href="/template/web/htdocs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/template/web/htdocs/favicon.ico" type="image/x-icon">
    <title><?=$conf['sitename']?> - <?=$conf['title']?></title>
    <meta name="keywords" content="<?php echo $conf['keywords']?>">
    <meta name="description" content="<?php echo $conf['description']?>">
    <link href="/template/web/htdocs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/web/htdocs/css/creative.css" rel="stylesheet">

    <meta property="og:title" content="<?=$conf['sitename']?> " />
    <meta property="og:description" content="<?=$conf['title']?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https:/code.lizipay.cn" />
    <link rel="apple-touch-icon" href="/template/web/htdocs/hand-mockup.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/template/web/htdocs/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/template/web/htdocs/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/template/web/htdocs/touch-icon-ipad-retina.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-title" content="<?=$conf['sitename']?>">

  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?=$conf['sitename']?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">开始收款</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#price">增值服务</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">联系我们</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="SDK/A">在线测试</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user/">登入/注册</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>支付狗云端免挂个人即时到账收款平台</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-9 mx-auto">
            <p class="text-faded mb-5">无需担心第三方跑路资金直接到账,不经过第三方。快速回笼资金,超越竞争对手！</p>
            <a class="btn btn-primary btn-xl" href="./user/reg.php">接入申请</a>
            <span class="sp"> </span>
            <a class="btn btn-light btn-xl" href="./user/">商户中心</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">简单几步，即可开始收款</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4"><?=$conf['sitename']?>的原理是监控微信、支付宝、QQ钱包的二维码扫码支付到账通知<br>并回调开发者应用通知开发者应用订单支付结果。</p>
            <a class="btn btn-light btn-xl" href="/user/" >第一步: 获取cookie</a>
            <a class="btn btn-light btn-xl" href="./user/login.php">第二步: 配置收款码</a>
            <a class="btn btn-light btn-xl" href="http://code.lizipay.cn/doc.html">第三步: API接入</a>
          </div>
        </div>
      </div>
    </section>

    <section id="price">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">增值服务</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">

             <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card pricing">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">包月版</h4>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">￥5.88<small class="text-mute">/月</small></h4>
                      <p class="card-text">支付宝：直接到您支付宝<br>QQ钱包：直接到您QQ钱包<br>微信：直接到您微信<br>手续费率：全免<br>7x24 小时技术支持<br><h6 <span style="color:red">活动中~联系客服购买1折起 </span></h6></p>
                      <a href="./user/reg.php" class="btn btn-block btn-info" style="color: black;letter-spacing: 2px;background-color: rgba(0,0,0,.03);">开始收款</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card pricing">
                    <div class="card-header" style="background-color: #007bff;color:white;">
                        <h4 class="my-0 font-weight-normal">包季版</h4>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">￥20 <small class="text-mute">/季</small></h4>
                      <p class="card-text">支付宝：直接到您支付宝<br>QQ钱包：直接到您QQ钱包<br>微信：直接到您微信<br>手续费率：全免<br>7x24 小时技术支持<br><h6 <span style="color:red">活动中~联系客服购买1折起 </span></h6></p>
                      <a href="./user/reg.php" class="btn btn-block btn-primary">开始收款</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card pricing" style="overflow: hidden;">
                    <div class="card-header" style="background-color: #28a745;color:white;">
                        <div class="hot">最多人选择</div>
                        <h4 class="my-0 font-weight-normal">包年</h4>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">￥58<small class="text-mute">/年</small></h4>
                      <p class="card-text">支付宝：直接到您支付宝<br>QQ钱包：直接到您QQ钱包<br>微信：直接到您微信<br>手续费率：全免<br>7x24 小时技术支持<br><h6 <span style="color:red">活动中~联系客服购买1折起 </span></h6></p>
                      <a href="./user/reg.php" class="btn btn-block btn-success">开始收款</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card pricing">
                    <div class="card-header" style="background-color: #17a2b8;color:white;">
                        <h4 class="my-0 font-weight-normal">永久版</h4>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">￥168<small class="text-mute">/永久</small></h4>
                      <p class="card-text">支付宝：直接到您支付宝<br>QQ钱包：直接到您QQ钱包<br>微信：直接到您微信<br>手续费率：全免<br>7x24 小时技术支持<br><h6 <span style="color:red">活动中~联系客服购买1折起 </span></h6></p>
                      <a href="./user/reg.php" class="btn btn-block btn-info" style="letter-spacing: 2px;">开始收款</a> 
                    </div>
                  </div>
                </div>

              </div>

      </div>
    </section>


    <section class="bg-primary" id="multi">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">全新免签支付体验</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">付款极速响应，秒到个人账户。无需提供账户密码，资金100%安全！</p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <blockquote>
                    <p>感谢<?=$conf['sitename']?>帮我节省了大量时间精力，之前用户付费后都需要我手动充值到用户账户，现在通过<?=$conf['sitename']?>可以完全自动化了。</p>
                    <small>独立开发者 <cite title="Source Title">pay</cite></small>
                </blockquote>
            </div>
            <div class="col-lg-4 col-md-12">
                <blockquote>
                    <p>我的博客和 App 需要收款功能，签约支付宝微信支付需要注册公司，维护一个公司所花费的时间、精力成本太高了。用过市面上各种同类型支付接口，最后还是换到<?=$conf['sitename']?>稳定靠谱不漏单。</p>
                    <small>知名 Android 游戏开发者 <cite title="Source Title">Wyne</cite></small>
                </blockquote>
            </div>
            <div class="col-lg-4 col-md-12">
                <blockquote>
                    <p>早前我的粉丝都是用微信支付宝扫码转账开通会员，需要我一个个确认，粉丝们经常抱怨开通不及时。在 BufPay 工作人员耐心的帮助下（真的超级耐心 #^.^#），接入<?=$conf['sitename']?>现在终于可以专心画画啦。</p>
                    <small>Pixiv 网红插画师 <cite title="Source Title">Yuki</cite></small>
                </blockquote>
            </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">联系 / 反馈</h2>
            <hr class="my-4">
            <p style="color: gray;">我们知道作为独立开发者产品需要收款是多么麻烦，注册公司维护成本太高，市面上各种收款工具要么手续费太高，要么到账很慢，体验很不好。于是我们开发了<?=$conf['sitename']?>用来解决这个问题，希望可以帮助到每个默默前行的独立开发者。</p>
            <div class="row">
              <div class="col-lg-6 text-center text-success">
                <p >客服QQ: <?=$conf['qq']?></p>
              </div>
              <div class="col-lg-6 text-center">
                <p>

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
    <a href="http://www.guxi.icu/" target="_blank">顾熙自动秒收录</a>
      <p style="line-height: 50px;color:gray;text-align:center;font-size:14px;">Copyright © <?=$conf['sitename']?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="http://www.miibeian.gov.cn/" rel="nofollow" target="_blank" style="color:gray;"></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a id="jsl_speed_stat0" href="http://www.yunaq.com/#zid=5c0db672796db4213f02f5a7" target="_blank">码支付即时到账</a><script src="//static.yunaq.com/static/js/stat/picture_stat.js" charset="utf-8" type="text/javascript"></script>
      </p>
    </footer>
<audio autoplay="autoplay" controls="controls"loop="loop" preload="auto"
            	src="/1.mp3">
	</audio>
    <!-- Bootstrap core JavaScript -->
    <script src="/template/web/htdocs/js/jquery.min.js"></script>
    <script src="/template/web/htdocs/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".js-scroll-trigger").click(function (){
                var id = $(this).attr("href");
                $('html, body').animate({
                    scrollTop: $(id).offset().top
                }, 500);
            });

            $('.js-scroll-trigger').click(function() {
                $('.navbar-collapse').collapse('hide');
            });

            var navbarCollapse = function() {
                if ($("#mainNav").offset().top > 100) {
                    $("#mainNav").addClass("navbar-shrink");
                } else {
                    $("#mainNav").removeClass("navbar-shrink");
                }
            };
            navbarCollapse();
            $(window).scroll(navbarCollapse);
        });

        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?8be0bf1783583f989f6456a9b03e6ec4";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
    </script>
  </body>
</html>
