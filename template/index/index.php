<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=$conf['sitename']?>-<?=$conf['title']?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta name="keywords" content="<?php echo $conf['keywords']?>">
  <meta name="description" content="<?php echo $conf['description']?>">
  <link rel="stylesheet" href="template/index/css/amazeui.css" />
  <link rel="stylesheet" href="template/index/css/common.min.css" />
  <link rel="stylesheet" href="template/index/css/index.min.css" />
  <link rel="shortcut icon" href="template/img/favicon.ico">
</head>
<body>
  <div class="layout">
    <!--===========layout-header================-->
    <div class="layout-header am-hide-sm-only">
      <div class="header-box" data-am-sticky>
        <!--header start-->
          <div class="container">
            <div class="header">
              <div class="am-g">
                <div class="am-u-lg-2 am-u-sm-12">
                  <div class="logo">
                    <a href=""><img src="template/index/images/logo.png" alt="" /></a>
                  </div>
                </div>
                <div class="am-u-md-10">
                  <div class="header-right am-fr">
                    <div class="header-contact">
                      <div class="header_contacts--item">
  											<div class="contact_mini">
  												<i style="color:#7c6aa6" class="contact-icon am-icon-phone"></i>
  												<strong>商务QQ联系</strong>
  												<span><?php echo $conf['qq']?></span>
  											</div>
  										</div>
                      <div class="header_contacts--item">
  											<div class="contact_mini">
  												<i style="color:#7c6aa6" class="contact-icon am-icon-envelope-o"></i>
  												<strong><?php echo $conf['qq']?>@qq.com</strong>
  												<span>随时欢迎您的来信！</span>
  											</div>
  										</div>
                      <div class="header_contacts--item">
  											<div class="contact_mini">
  												<i style="color:#7c6aa6" class="contact-icon am-icon-map-marker"></i>
  												<strong>全网领先免签约支付系统</strong>
  												<span>做好用的产品装最6的B</span>
  											</div>
  										</div>
                    </div>
                    <a href="/user" class="contact-btn">
                      <button type="button" class="am-btn am-btn-secondary am-radius">商户中心</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--header end-->


        <!--nav start-->
        <div class="nav-contain">
          <div class="nav-inner">
            <ul class="am-nav am-nav-pills am-nav-justify">
              <li class=""><a href="./">首页</a></li>
              <li><a href="user/login.php">商户登录</a></li>
              <li><a href="user/reg.php">商户注册</a></li>
              <li><a href="SDK/A">在线测试</a></li>
              <li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq']?>&site=qq&menu=yes">联系我们</a></li>
            </ul>
          </div>
        </div>
        <!--nav end-->
      </div>
    </div>

    <!--mobile header start-->
    <div class="m-header">
      <div class="am-g am-show-sm-only">
        <div class="am-u-sm-2">
          <div class="menu-bars">
            <a href="#doc-oc-demo1" data-am-offcanvas="{effect: 'push'}"><i class="am-menu-toggle-icon am-icon-bars"></i></a>
            <!-- 侧边栏内容 -->
            <nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1" data-am-menu-offcanvas >
            <a href="javascript: void(0)" class="am-menu-toggle"></a>

            <div class="am-offcanvas" >
              <div class="am-offcanvas-bar">
              <ul class="am-menu-nav am-avg-sm-1">
                  <li><a href="./index.html" class="" >首页</a></li>
                  <li class="am-parent">
                    <a href="" class="nav-icon nav-icon-globe" >Language</a>
                      <ul class="am-menu-sub am-collapse  ">
                          <li>
                            <a href="#" >English</a>
                          </li>
                          <li class="">
                            <a href="#" >Chinese</a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-share-contain">
                    <div class="nav-share-links">
                      <i class="am-icon-facebook"></i>
                      <i class="am-icon-twitter"></i>
                      <i class="am-icon-google-plus"></i>
                      <i class="am-icon-pinterest"></i>
                      <i class="am-icon-instagram"></i>
                      <i class="am-icon-linkedin"></i>
                      <i class="am-icon-youtube-play"></i>
                      <i class="am-icon-rss"></i>
                    </div>
                  </li>
                  <li class=""><a href="user/login.php" class="" >商户登录</a></li>
                  <li class=""><a href="user/reg.php" class="" >商户注册</a></li>
					<li class=""><a href="SDK/A" class="" >在线测试</a></li>
              </ul>

              </div>
            </div>
          </nav>

          </div>
        </div>
        <div class="am-u-sm-5 am-u-end">
          <div class="m-logo">
            <a href=""><img src="template/index/images/logo.png" alt=""></a>
          </div>
        </div>
      </div>
    <!--mobile header end-->
    </div>




    <!--===========layout-container================-->
    <div class="layout-container">
      <div class="index-page">
        <div data-am-widget="tabs" class="am-tabs am-tabs-default">
          <div class="am-tabs-bd">
            <div data-tab-panel-0 class="am-tab-panel am-active">
              <div class="index-banner">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <h1 class="slide_simple--title"><?=$conf['sitename']?>-资金实时到账</h1>
                        <p class="slide_simple--text am-text-left">
												<?=$conf['sitename']?>-  三大支付方式超低手续费秒到自己账户！
											  </p>
                        <div class="slide_simple--buttons">
  												<a href="user/login.php"  class="am-btn am-btn-danger">立即登录</a>
												Or
  												<a href="user/reg.php"  class="am-btn am-btn-danger">立即注册</a>
												Or
												<a href="SDK/A"  class="am-btn am-btn-danger">在线测试</a></li>
											  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-tab-panel-1 class="am-tab-panel ">
              <div class="index-banner">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <h1 class="slide_simple--title"><?=$conf['sitename']?>-免签约辅助 可对接官方接口</h1>
                        <p class="slide_simple--text am-text-left">
												  独家打造免签约挂机 官方独立接口开通 自动续签！
											  </p>
                        <div class="slide_simple--buttons">
  												<button type="button" class="am-btn am-btn-danger">了解更多</button>
											  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-tab-panel-2 class="am-tab-panel ">
              <div class="index-banner">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <h1 class="slide_simple--title"><?=$conf['sitename']?>-资金及时到账</h1>
                        <p class="slide_simple--text am-text-left">
												  资金直接到账,不经过第三方。快速回笼资金,超越竞争对手！
											  </p>
                        <div class="slide_simple--buttons">
  												<button type="button" class="am-btn am-btn-danger">了解更多</button>
											  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-tab-panel-3 class="am-tab-panel ">
              <div class="index-banner">
                <div class="index-mask">
                  <div class="container">
                    <div class="am-g">
                      <div class="am-u-md-10 am-u-sm-centered">
                        <h1 class="slide_simple--title"><?=$conf['sitename']?>-多种支付方式</h1>
                        <p class="slide_simple--text am-text-left">
												  支持：微信支付,支付宝支付,QQ钱包支付,财付通支付. 同时支持电脑手机！
											  </p>
                        <div class="slide_simple--buttons">
  												<button type="button" class="am-btn am-btn-danger">了解更多</button>
											  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <ul class="am-tabs-nav am-cf index-tab">
            <li class="am-active">
              <a href="[data-tab-panel-0] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-cog"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">1分钟快速集成</strong>
                  <p class="promo_slider_nav--item_description">接口我们完成了99% 支持全部网站多种语言快速集成</p>
                </div>
              </a>
            </li>
            <li class="a">
              <a href="[data-tab-panel-1] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-lightbulb-o"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">无需签约 可对接官方接口</strong>
                  <p class="promo_slider_nav--item_description">独家打造免签约挂机 官方独立接口开通 自动续签</p>
                </div>
              </a>
            </li>
            <li class="">
              <a href="[data-tab-panel-2] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-line-chart"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">资金及时到账</strong>
                  <p class="promo_slider_nav--item_description">资金直接到账,不经过第三方。快速回笼资金,超越竞争对手</p>
                </div>
              </a>
            </li>
            <li class="">
              <a href="[data-tab-panel-3] am-g">
                <div class="am-u-md-3 am-u-sm-3 am-padding-right-0">
                  <i class="am-icon-hourglass-end"></i>
                </div>
                <div class="school-item-right am-u-md-9 am-u-sm-9 am-text-left">
                  <strong class="promo_slider_nav--item_title">多种支付方式</strong>
                  <p class="promo_slider_nav--item_description">支持：微信支付,支付宝支付,QQ钱包支付,财付通支付. 同时支持电脑手机</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>

  <!--promo_detailed start-->
  <div class="promo_detailed">
    <div class="promo_detailed-container" >
      <div class="container">
        <div class="am-g">
          <div class="am-u-md-6">
            <ul class="promo_detailed--list">
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-diamond"></i>
                </span>
                <dl>
                  <dt>便捷的支付渠道</dt>
                  <dd>
                    零度码支付系统，可以将市面上主流的支付渠道整合为一个付款渠道接口，通过标准API接口发放给下级商户网站用户使用。
                  </dd>
                </dl>
              </li>
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-dollar" style="margin-left: 15px;"></i>
                </span>
                <dl>
                  <dt>灵活的接口机制</dt>
                  <dd>
                    通过接口以及自定义的搭配，轻松按照需求打造支付各种功能。
                  </dd>
                </dl>
              </li>
              <li class="promo_detailed--list_item">
                <span class="promo_detailed--list_item_icon">
                  <i class="am-icon-bank" style="margin-left: 10px;"></i>
                </span>
                <dl>
                  <dt>稳定强大的云端系统</dt>
                  <dd>
                    我们使用分布式进行控制分布用户,保证每条订单都安全及时到账。
                  </dd>
                </dl>
              </li>
            </ul>
          </div>

          <div class="am-u-md-6">
            <div class="promo_detailed--cta">
              <div class="promo_detailed--cta_wrap">
                <div class="promo_detailed--cta_text">
									非常强大的云端控制，分布式，各个地区都可以秒通讯到，风控安全高达99.99。
								</div>
                <div class="promo_detailed--cta_footer">
                  <button type="button" class="am-btn am-btn-danger">MORE&nbsp;&nbsp;>></button>
                </div>
              </div>
              <div class="promo_detailed-img am-show-sm-only" style="background-image: url('template/index/img/promo_detailed_bg.jpg');"></div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="promo_detailed-img am-hide-sm-only" style="background-image: url('template/index/img/promo_detailed_bg.jpg');"></div>
  </div>
  <!--promo_detailed end-->

  <div class="section"  style="border-bottom: 1px solid #e9e9e9;">
    <div class="container">
      <div class="section--header">
        <h2 class="section--title">常见问题</h2>
        <p class="section--description">
          我们是支付系统技术开发商，我们提供支付系统源代码，众多客户商业实战使用，最符合运营实际的代码销售商！
        </p>
      </div>

      <!--index-container start-->
      <div class="index-container">
        <div class="am-g">
          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-diamond"></i>
              <h3 class="service_item--title">提供支付接口吗</h3>
              <div class="service_item--text">
								<p>我们是系统代码开发商，主要做系统开发，针对我们不通的客户群体，我们有接口商介绍，保障客户申请到接口对接到系统上线运营。</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-user"></i>
              <h3 class="service_item--title">系统是租用的吗</h3>
              <div class="service_item--text">
								<p>我们的系统是部署到您自己的服务器，您自己可以拥有独立权限操作，使用自己的收款账户，资金实时到账，不需要平台统一清算。</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-umbrella"></i>
              <h3 class="service_item--title">自己没有技术能买吗</h3>
              <div class="service_item--text">
								<p>可以的，我们有不同的价格套餐，不同的技术支持服务，我们有技术服务套餐，也有不带技术服务的套餐，具体可以咨询客服。</p>
							</div>
              <footer class="service_item--footer"><a href="#" class="link -blue_light">Learn More>></a></footer>
            </div>
          </div>

          <div class="am-u-md-3">
            <div class="service_item">
              <i class="service_item--icon am-icon-briefcase"></i>
              <h3 class="service_item--title">系统多久可以交付</h3>
              <div class="service_item--text">
								<p>我们使用的支付系统都是经过商业实战的系统，在没有个性化的修改的情况下，随时可以部署到您自己的服务上线。 随时交付！</p>
							</div>
              <footer class="service_item--footer"><a href="https://jq.qq.com/?_wv=1027&k=5y6wIdb" class="link -blue_light">了解更多>></a></footer>
            </div>
          </div>
        </div>
      </div>
      <!--index-container end-->
    </div>
  </div>


  <div class="section" >
    <div class="container">
      <div class="section--header">
        <h2 class="section--title">产品价格</h2>
        <p class="section--description">
          全球领先支付收款解决方案供应商<br>商家实时收款到自己账户，不担心平台跑路不结算资金。
        </p>
      </div>

      <div class="pricing_compare">
				<ul class="pricing_compare--options">
					<li class="pricing_compare--option"><i class="pricing_compare--option_icon am-icon-group"></i>商户开通</li>
					<li class="pricing_compare--option"><i class="pricing_compare--option_icon am-icon-umbrella"></i>价格实惠</li>
					<li class="pricing_compare--option"><i class="pricing_compare--option_icon am-icon-life-ring"></i>专群售后</li>
					<li class="pricing_compare--option"><i class="pricing_compare--option_icon am-icon-street-view"></i>专人对接</li>
					<li class="pricing_compare--option"><i class="pricing_compare--option_icon am-icon-dollar"></i>集成SDK任你开发</li>
				</ul>
				<div class="pricing_compare--plans">
					<div class="pricing_plan">
						<header class="pricing_plan--header">
							<h2 class="pricing_plan--title"><b>商户 </b>开通</h2><strong class="pricing_plan--price">0<small>RMB</small></strong>
						</header>
						<ul class="pricing_plan--options">
							<li class="pricing_plan--option"><b>微信支付 </b>month</li>
							<li class="pricing_plan--option"><b>支付宝支付</b>month</li>
							<li class="pricing_plan--option"><b>QQ钱包支付</b>month</li>
							<li class="pricing_plan--option"><b>0R</b>/month</li>
							<li class="pricing_plan--option"><b>售后咨询群</b><?php echo $conf['qq_qun']?></li>
						</ul>
						<footer class="pricing_plan--footer">
							<button type="button" class="am-btn am-btn-secondary">更多</button>
						</footer>
					</div>
					<div class="pricing_plan popular">
						<header class="pricing_plan--header"><span class="pricing_plan--label popular">NEW</span>
							<h2 class="pricing_plan--title"><b>接口代理 </b>开通</h2><strong class="pricing_plan--price">100<small>/m</small></strong>
						</header>
						<ul class="pricing_plan--options">
							<li class="pricing_plan--option"><b>技术 </b>支持</li>
							<li class="pricing_plan--option"><b>独立</b>官网</li>
							<li class="pricing_plan--option"><b>提现 </b>0秒</li>
							<li class="pricing_plan--option"><b>100RMB</b>/位</li>
							<li class="pricing_plan--option"><b>咨询QQ</b><?php echo $conf['qq']?></li>
						</ul>
						<footer class="pricing_plan--footer">
							<button type="button" class="am-btn am-btn-danger">更多</button>
						</footer>
					</div>
					<div class="pricing_plan">
						<header class="pricing_plan--header">
							<h2 class="pricing_plan--title"><b>商务 </b>合作</h2><strong class="pricing_plan--price"><small>999RMB</small></strong>
						</header>
						<ul class="pricing_plan--options">
							<li class="pricing_plan--option"><b>接口 </b>定做</li>
							<li class="pricing_plan--option"><b>官网 </b>独立</li>
							<li class="pricing_plan--option"><b>技术 </b>支持</li>
							<li class="pricing_plan--option"><b>999RMB </b>/位</li>
							<li class="pricing_plan--option"><b>咨询QQ </b><?php echo $conf['qq']?></li>
						</ul>
						<footer class="pricing_plan--footer">
							<button type="button" class="am-btn am-btn-secondary">choose</button>
						</footer>
					</div>
				</div>
			</div>

  <div class="section" style="margin-top:0px;background-image: url('template/index/img/pattern-light.png');">
    <div class="container">
      <!--index-container start-->
      <div class="index-container">
        <div class="am-g">
          <div class="am-u-md-4">
            <div class="contact_card">
							<i style="color:#59bcdb" class="contact_card--icon am-icon-phone"></i>
							<strong class="contact_card--title">联系我们</strong>
							<p class="contact_card--text">QQ群号<br> <strong><?php echo $conf['qq']?></strong> <br>商户合作QQ<?php echo $conf['qq']?></p>
              <button type="button" class="am-btn am-btn-secondary">开发及对接联系</button>
						</div>
          </div>
          <div class="am-u-md-4">
            <div class="contact_card">
							<i style="color:#59bcdb" class="contact_card--icon am-icon-envelope-o"></i>
							<strong class="contact_card--title">邮件联系</strong>
							<p class="contact_card--text">邮件联系 <br> <strong><a href="mailto:admin@abcwl.cn"><?php echo $conf['qq']?>@qq.com</a>,</strong> <br> 欢迎您的来信.</p>
              <button type="button" class="am-btn am-btn-secondary">邮件联系</button>
						</div>
          </div>
          <div class="am-u-md-4">
            <div class="contact_card">
							<i style="color:#59bcdb" class="contact_card--icon am-icon-map-marker"></i>
							<strong class="contact_card--title">技术支持</strong>
							<p class="contact_card--text">本站由 <br> <strong><a >IST网络</a></strong> <br> 维护及运营.</p>
              <button type="button" class="am-btn am-btn-secondary">加入我们</button>
						</div>
          </div>
        </div>
      </div>
      <!--index-container end-->
    </div>
  </div>
  </div>
  <script src="template/index/js/jquery-2.1.0.js" charset="utf-8"></script>
  <script src="template/index/js/amazeui.js" charset="utf-8"></script>
  <script src="template/index/js/common.js" charset="utf-8"></script>
</body>

</html>
