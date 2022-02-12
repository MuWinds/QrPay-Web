<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$conf['sitename']?>-<?=$conf['title']?></title>
    <!-- google-fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="../template/AoTPay/css/fontawesome-all.min.css">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="../template/AoTPay/css/style-starter.css">
	<link rel="stylesheet" href="../template/AoTPay/css/style.css">
	<link rel="stylesheet" href="../template/AoTPay/css/iconfont.css">
	<link rel="stylesheet" href="../template/AoTPay/css/animate.min.css">
	<link rel="stylesheet" href="../template/AoTPay/css/qietu.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1>
                    <a class="navbar-brand" href="index.php">
                        <i class="fab fab fab fa-medium  icon-color mr-1"></i><?=$conf['sitename']?>
                    </a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="./">首页 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gywm">关于我们</a>


                        </li><li class="nav-item">
                            <a class="nav-link" href="./SDK/A" target="_blank">在线测试</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dj.html">对接文档</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="/user/reg.php">注册</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="/user/login.php">登录</a>
                        </li>
                        <!-- search button -->
                        <div class="search-right ml-lg-3">

                            
                        </div>
                        <!-- //search button -->
                    </ul>
                </div>
                <!-- //search button -->
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->

    <!-- banner section -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image">
        </div>
        <div class="banner-content">
            <div class="container pt-5 pb-md-4">
                <div class="row align-items-center">
                    <div class="col-md-6 pt-md-0 pt-4">
                        <h3 class="mb-lg-4 mb-3 title"><span class="typed-text"></span><span class="cursor">&nbsp</span></h3>
                        <p><?=$conf['sitename']?>&nbsp;-&nbsp;个人微信支付宝收款辅助工具，无资金托管避免跑路，收款即时到账，安全可靠，让每一笔收款变得更简单。</p>
                        <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                            <a class="btn button-style" href="./user/login.php">立即开户</a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <img class="img-fluid" src="../template/AoTPay/images/bann1.png" alt=" ">
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br>
    <!-- //banner section -->

    <!-- about section -->
    <div class="w3l-content-photo-5 py-5">
        <div class="container py-lg-5 py-4">
            <div class="row align-items-center">
                <div class="col-md-6 content-photo order-md-first order-last">
                    <a href="#image"><img src="../template/AoTPay/images/home-ab.png" class="img-fluid" alt="content-photo"></a>
                </div>
                <div class="col-md-6 content-left mb-md-0 mb-5 pl-lg-5 order-md-last order-first">
                    <h3 class="mb-3">Welcome To AotePay</h3>
                    <p>支持不同业务场景的交易方式。
					</p>
                    <p class="mt-3">独家首创支持多微信、多支付宝、多QQ同时收款，多号轮询，轻松应付产品高并发烦恼。</p>
                    <a class="btn button-style mt-lg-5 mt-4" href="./user/login.php">立即开户</a>
                </div>
			</div>
            </div>
        </div>
    <br><br><br><br>	
    <!-- //about section -->
	
	<div class="down-btn-div" id="xiala">
		<div class="down-btn" style="text-align:center;">
		<a href="/#xiala" class="down-btn-link"><span style=" font-size: 32px; color: #cccccc;" class="iconfont icon-xiangxia"></span></a>
		</div>
	</div>
	<!-- END NetEase Devilfish 下拉结束 -->
	
<!-- features section -->
            <div class="hhelp-hd g-hd" id="shoukuan">
				<h2 class="wow fadeInUp animated" style="visibility: hidden; animation-name: none;"><br>性能与服务</h2><br>
				<p class="wow fadeInUp animated" data-wow-delay=".5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">-JuyunPay-</p>
			</div>
    <section class="features-section pt-5" id="work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 right-wthree-img align-self order-lg-last order-first">
                    <div class="row text-center">
                        <div class="col-sm-4 col-6 icon-text-style">
                            <i class="fas fa-tablet-alt icon-color"></i>
                            <p>目前支持绝大部分的发卡系统/代刷系统/商城系统，我们还可以提供SDK给您</p>
                        </div>
                        <div class="col-sm-4 col-6 icon-text-style">
                            <i class="fab fa-airbnb icon-color"></i>
                            <p>100元即可享受无限制收款，没有额度限制，不收交易手续费，让您更划算</p>
                        </div>
                        <div class="col-sm-4 col-6 icon-text-style  border-right-0">
                            <i class="fab fa-asymmetrik icon-color"></i>
                            <p>注册后即可开始您的对接，让您接口无忧不再担心跑路</p>
                        </div>
                        <div class="col-sm-4 col-6 icon-text-style icon-text-style-2">
                            <i class="fab fa-chromecast icon-color"></i>
                            <p>独家首创支持多微信、多支付宝、多QQ同时收款，多号轮询，轻松应付产品高并发烦恼。</p>
                        </div>
                        <div class="col-sm-4 col-6 icon-text-style icon-text-style-2">
                            <i class="fas fa-headphones-alt icon-color"></i>
                            <p>可通过手机APP监控 / 不会冻结支付宝，微信，无风险收款。</p>
                        </div>
                        <div class="col-sm-4 col-6 icon-text-style icon-text-style-2 border-right-0">
                            <i class="fab fa-laravel icon-color"></i>
                            <p>我们提供详细的帮助文档，10分钟超快速响应，1V1专业客服服务，7*24小时技术支持。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br>
    <!-- //features section -->

	<!-- 3 grids -->
    <section class="w3l-features-4">
        <div class="features4-block text-center py-5">
		<div class="hhelp-hd g-hd" id="shoukuan">
		<h2 class="wow fadeInUp animated" style="visibility: hidden; animation-name: none;"><br>简单三步，即可开始收款</h2><br>
		<p class="wow fadeInUp animated" data-wow-delay=".5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">-JuyunPay-</p>
		</div>
            <div class="container py-md-5 py-3">
                <div class="row features4-grids justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="features4-grid">
                            <div class="feature-images">
                                <span class="fas fa-business-time icon-color" aria-hidden="true"></span>
                            </div>
                            <h5>第一步: 注册账号</h5>
                            <p>10分钟超快速响应，1V1专业客<br>服服务，7*24小时技术支持。</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-2">
                        <div class="features4-grid">
                            <div class="feature-images">
                                <span class="fas fa-laptop-code icon-color" aria-hidden="true"></span>
                            </div>
                            <h5>第二步: 配置收款码</h5>
                            <p>多机房异地容灾系统，服务器可用<br>专业技术团队协助指导。</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-2">
                        <div class="features4-grid">
                            <div class="feature-images">
                                <span class="fas fa-clipboard-check icon-color" aria-hidden="true"></span>
                            </div>
                            <h5>第三步:API接入</h5>
                            <p>金融级安全防护标准，强有力抵<br>御外部入侵，安全可靠。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 3 grids -->
	
    <!-- testimonials section -->
    <section class="w3l-clients py-5" id="testimonials">
        <div class="container py-md-5 py-4">
            <div class="hhelp-hd g-hd" id="shoukuan">
				<h2 class="wow fadeInUp animated" style="visibility: hidden; animation-name: none;"><br>展望未来</h2><br>
				<p class="wow fadeInUp animated" data-wow-delay=".5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">-JuyunPay-</p>
			</div>
	<section class="w3l-blog-sec pt-5">
        <div class="services-layout py-md-4 py-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 column column-img" id="zoomIn">
                        <div class="services-gd">
                            <div class="serve-info">
                                <a href="#blog">
                                    <figure>
                                        <img class="img-responsive" src="../template/AoTPay/images/blog1.jpeg" alt="blog-image">
                                    </figure>
                                </a>
                                <center><h3> <a href="#blog" class="vv-link"><?=$conf['sitename']?></a>
                                </h3></center><br>
                                <p>人生并不像火车要通过每个站似的经过每一个生活阶段。人生总是直向前行走，从不留下什么。人生是指我们若没有嗜好的话，便不过如同极度无聊经营不善的剧院而已。</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 column column-img mt-md-0 mt-5" id="zoomIn">
                        <div class="services-gd">
                            <div class="serve-info">
                                <a href="#blog">
                                    <figure>
                                        <img class="img-responsive" src="images/blog2.jpeg" alt="blog-image">
                                    </figure>
                                </a>
                                <center><h3> <a href="#blog" class="vv-link"><?=$conf['sitename']?></a>
                                </h3></center><br>
                                <p>人生的磨难是很多的，所以我们不可对于每一件轻微的伤害都过于敏感。在生活磨难面前，精神上的坚强和无动于衷是我们抵抗罪恶和人生意外的最好武器。</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-5 column column-img" id="zoomIn">
                        <div class="services-gd">
                            <div class="serve-info">
                                <a href="#blog">
                                    <figure>
                                        <img class="img-responsive" src="../template/AoTPay/images/blog3.jpeg" alt="blog-image">
                                    </figure>
                                </a>
                                <center><h3> <a href="#blog" class="vv-link"><?=$conf['sitename']?></a>
                                </h3></center><br>
                                <p>当你看到不可理解的现象，感到迷惑时，真理可能已经披着面纱悄悄地站在你的面前。向前跨一步，可能会发现一条意外的小路。生活如山路，向前跨一步，便可发现一条更好的路，使生活更充实，更有乐趣。</p>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            </div>
        
    </section>
    <!-- //testimonials section -->
    <!-- promocode section -->
    <section class="w3l-promocode">
        <div class="promo-block py-5" id="gywm">
            <div class="container py-md-5 py-4">
                <div class="row aap-4-section">
                    <div class="col-lg-6 app4-right-image">
                        <img src="../template/AoTPay/images/mobile.png" class="img-fluid" alt="App Device">
                    </div>
                    <div class="col-lg-6 app4-left-text pl-lg-0 mb-lg-0 mb-5">
                        <h4>Welcome To JuyunPay</h4>
                        <h4>因为专业，值得信赖</h4>
                        <p class="mb-4"> 即时到账、安全可靠、方便快捷是我们最大的特点，轻松实现手机付款、码支付是您的不二之选，欢迎咨询客服。</p>
                        <div class="app-4-connection">
                            <div class="newsletter">
                                <form action="#" methos="GET" class="d-flex wrap-align">
                                    <div class="button-style">联系客服获取优惠&nbsp;&nbsp;QQ：888888888</div>
                                </form>
                            </div>
                            <p class="mobile-text-app mt-4 pt-2"></p>
                            <div class="app-4-icon">
                                <ul>
                                    <li><a title="Android" class="app-icon Android-vv"><span class="fab fa-android icon-color" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a title="Microsoft" class="app-icon windows-vv"><span class="fab fa-windows icon-color" aria-hidden="true"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //promocode section -->

    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="w3l-footer-16-main">
            <div class="container">
                <div class="row footer-p">
                    <div class="col-lg-8 mt-lg-0 mt-4 pr-lg-5">
                        <div class="d-sm-flex align-items-center top-footer-content mb-5">
                            <a class="logo d-flex align-items-center" href="./"><i class="fab fa-accusoft icon-color mr-1"></i><?=$conf['sitename']?><span>支付</span></a>
                            <p class="top-p ml-sm-4 pl-sm-4 mt-sm-0 mt-2">您永远不会想象那么强大的业务可以轻松实现<br><?=$conf['sitename']?>为您提供多种解决方案。</p>
                        </div>
                        <div class="row footer-grids pt-4">
                            <div class="col-sm-4 col-6 column">
                                <ul class="footer-gd-16">
                                    <li><a href="./"><i class="fa fa-angle-right" aria-hidden="true"></i>首页</a></li>
                                    <li><a href="./dj.html" target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>对接文档</a></li>
                                    <li><a href="./agreement.php" target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>服务条款</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-6 column pl-sm-0">
                                <ul class="footer-gd-16">
                                    <li><a href="https://www.aliyun.com/"><i></i>阿里云</a></li>
                                    <li><a href="https://cloud.baidu.com/"><i></i>百度云</a></li>
									<li><a href="https://cloud.tencent.com/"><i></i>腾讯云</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-6 column pl-sm-0">
                                <ul class="footer-gd-16">
                                    <li><a href="https://www.west.cn/"><i></i>西部数码</a></li>
                                    <li><a href="http://huaweicloud.com"><i></i>华为云</a></li>
                                    <li><a href="https://www.niaoyun.com/"><i></i>小鸟云</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 column mt-lg-0 mt-4">
                        <h3>极速稳定 - <?=$conf['sitename']?></h3>
                        <div class="end-column">
                            <form action="#" class="subscribe" method="post">
                                <input type="email" name="email" placeholder required>
                                <button class="button-style"><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                            </form>
                            <p>准备好了吗？ 赶紧加入我们吧</p>
                        </div>
                        <div class="columns-2 mt-4">
                            <ul class="social">
                                <li><a href="#facebook"><span class="fab fa-facebook-f" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#twitter"><span class="fab fa-twitter" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#google-plus"><span class="fab fa-google-plus-g" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#instagram"><span class="fab fa-instagram" aria-hidden="true"></span></a>
                                </li>
                                <li><a href="#linkedin"><span class="fab fa-linkedin-in" aria-hidden="true"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="below-section mt-5 text-center">
                    <p class="copy-text">Copyright &copy; 2021 All Rights Reserved By <?=$conf['sitename']?> <a target="_blank" href="http://"></a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- banner image moving effect -->
    <script>
        var lFollowX = 0,
            lFollowY = 0,
            x = 0,
            y = 0,
            friction = 1 / 30;

        function animate() {
            x += (lFollowX - x) * friction;
            y += (lFollowY - y) * friction;

            translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

            $('.banner-image').css({
                '-webit-transform': translate,
                '-moz-transform': translate,
                'transform': translate
            });

            window.requestAnimationFrame(animate);
        }

        $(window).on('mousemove click', function (e) {

            var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
            var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
            lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
            lFollowY = (10 * lMouseY) / 100;

        });

        animate();
    </script>
    <!-- //banner image moving effect -->

    <!-- typig-text-->
    <script>
        const typedTextSpan = document.querySelector(".typed-text");
        const cursorSpan = document.querySelector(".cursor");

        const textArray = ["Welcome To AotePay"];
        const typingDelay = 300;
        const erasingDelay = 10;
        const newTextDelay = 100; // Delay between current and next text
        let textArrayIndex = 0;
        let charIndex = 0;

        function type() {
            if (charIndex < textArray[textArrayIndex].length) {
                if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                setTimeout(erase, newTextDelay);
            }
        }

        function erase() {
            if (charIndex > 0) {
                // add class 'typing' if there's none
                if (!cursorSpan.classList.contains("typing")) {
                    cursorSpan.classList.add("typing");
                }
                typedTextSpan.textContent = textArray[textArrayIndex].substring(0, 0);
                charIndex--;
                setTimeout(erase, erasingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                textArrayIndex++;
                if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                setTimeout(type, typingDelay);
            }
        }

        document.addEventListener("DOMContentLoaded", function () { // On DOM Load initiate the effect
            if (textArray.length) setTimeout(type, newTextDelay + 250);
        });
    </script>
    <!-- //typig-text-->

    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script>
    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function () {
            $("#owl-demo2").owlCarousel({
                loop: true,
                nav: false,
                margin: 50,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    736: {
                        items: 1,
                        nav: false
                    },
                    991: {
                        items: 2,
                        margin: 30,
                        nav: false
                    },
                    1080: {
                        items: 3,
                        nav: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->
    <!-- //owl carousel -->

    <!-- theme switch js (light and dark)-->
    <script src="../template/AoTPay/js/theme-change.js"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function () {
            // Now to start autoTyping just call the autoType function with the 
            // class of outer div
            // The second paramter is the speed between each letter is typed.   
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- magnific popup -->
    <script src="../template/AoTPay/js/jquery.magnific-popup.js"></script>
    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

            $('.popup-with-move-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });
        });
    </script>
    <!-- //magnific popup -->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->
     <script type="text/javascript">
         window.onload = function(){
            //屏蔽键盘事件
            document.onkeydown = function (){
                 var e = window.event || arguments[0];
                 //F12
                 if(e.keyCode == 123){
                    alert("<?=$conf['sitename']?>版权所有"); 
                    return false;
                 //Ctrl+Shift+I
                 }else if((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)){
                    alert("<?=$conf['sitename']?>版权所有"); 
                    return false;
                 //Shift+F10
                 }else if((e.shiftKey) && (e.keyCode == 121)){
                    alert("<?=$conf['sitename']?>版权所有"); 
                    return false;
                 //Ctrl+U
                }else if((e.ctrlKey) && (e.keyCode == 85)){
                    alert("<?=$conf['sitename']?>版权所有"); 
                    return false;
                 }
             };
             //屏蔽鼠标右键
             document.oncontextmenu = function (){
                alert("<?=$conf['sitename']?>"); 
                return false; 
             }
         }
 
     </script>
    <!--bootstrap-->
    
    <script src="../template/AoTPay/js/jquery.magnific-popup.js"></script>
    <!-- //bootstrap-->
	<script type="text/javascript" src="../template/AoTPay/js/jquery.js"></script>
    <script type="text/javascript" src="../template/AoTPay/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../template/AoTPay/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../template/AoTPay/js/jquery.glide.js"></script>
	<script type="text/javascript" src="../template/AoTPay/js/wow.min.js"></script>
	<script type="text/javascript" src="../template/AoTPay/js/script.js"></script>
    <!-- //Js scripts -->
</body>

</html>