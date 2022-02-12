<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title><?=$conf['sitename']?>-<?=$conf['title']?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../template/Lfpay_2/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../template/Lfpay_2/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../template/Lfpay_2/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../template/Lfpay_2/images/fevicon.png" type="../template/Lfpay_2/image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../template/Lfpay_2/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      
      <!-- end loader -->
      <div class="wrapper">
      <!-- end loader -->
      <div class="sidebar">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div id="dismiss">
               <i class="fa fa-arrow-left"></i>
            </div>
            <ul class="list-unstyled components">
               <li class="active"> <a href="../index.php">首页</a> </li>
               <li><a href="../SDK/A">支付测试</a> </li>
               <li><a href="../doc.html">开发文档</a> </li>
               <li><a href="../user/index.php">登陆 </a> </li>
               <li><a href="../user/reg.php">注册</a> </li>
            </ul>
         </nav>
      </div>
      <div id="content">
         <!-- header -->
         <header>
            <!-- header inner -->
            <div class="header">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 <a href="index.html"><img src="../template/Lfpay_2/images/logo.png" alt="#" /></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <ul class="btn">
                           <li class="down_btn"><a href="#">首页</a></li>
                           <li><a href="../user/index.php">商户中心</a></li>
                           <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                           <li><button type="button" id="sidebarCollapse">
                              <img src="../template/Lfpay_2/images/menu_icon.png" alt="#" />
                              </button>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
         <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                              <div class="text-bg">
                                 <h1><?php echo $conf['web_name'];?></h1>
                                 <p>服务不止是一次简单的交易，服务不再是冰冷的数据和枯燥的报表</p>
                                 <a class="read_more" href="../user/reg.php">加入我们</a>
                              </div>
                           </div>
                           <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                              <div class="images_box">
                                 <figure><img src="../template/Lfpay_2/images/img2.png"></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container-fluid ">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                              <div class="text-bg">
                                 <h1><?php echo $conf['web_name'];?></h1>
                                 <p>服务不止是一次简单的交易，服务不再是冰冷的数据和枯燥的报表</p>
                                 <a class="read_more" href="../user/reg.php">加入我们</a>
                              </div>
                           </div>
                           <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                              <div class="images_box">
                                 <figure><img src="../template/Lfpay_2/images/img2.png"></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container-fluid">
                     <div class="carousel-caption ">
                        <div class="row">
                           <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                              <div class="text-bg">
                                 <h1><?php echo $conf['web_name'];?></h1>
                                 <p>服务不止是一次简单的交易，服务不再是冰冷的数据和枯燥的报表</p>
                                 <a class="read_more" href="../user/reg.php">加入我们</a>
                              </div>
                           </div>
                           <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                              <div class="images_box">
                                 <figure><img src="../template/Lfpay_2/images/img2.png"></figure>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
         </div>
         <!-- end banner -->
         <!-- about -->
         <div id="about"  class="about">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class="col-md-5">
                     <div class="about_img">
                        <figure><img src="../template/Lfpay_2/images/about_img.jpg" alt="#"/></figure>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="titlepage">
                        <h2>关于<span class="blu"><?php echo $conf['web_name'];?></span></h2>
                        <p>行业明星团队，顶级风险投资机构支持，历经 3 年积累打造专业的支付系统解决方案和基于交易数据的商业智能平台，历经 273 个版本。迭代升级，服务 70 多个行业近 2 万家企业客户，处理超过 5 亿笔订单。累计为超过 25000 家商户提供服务 </p>
                        <a class="read_more" href="../user/reg.php" >加入我们</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end about -->
         <!-- choose  section -->
         <div class="choose ">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2>为什么不选择 <span class="blu"><?php echo $conf['sitename'];?>？</span></h2>
                     </div>
                  </div>
               </div>
            </div>
            <div class="choose_bg">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 padding_right0">
                              <ul class="easy">
                                 <li class="active"><a href="../user/index.php">登陆</a></li>
                                 <li><a href="../user/reg.php">注册</a></li>
                                 <li><a href="../doc.html">开发文档</a></li>
                                 <li><a href="../SDK/A">支付测试</a></li>
                              </ul>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 padding_left0">
                              <div class="choose_box">
                                 <i><img src="../template/Lfpay_2/images/admin.png" alt="#"/></i>
                                 <h3>我们的优势</h3>
                                 <p>  简单易用的管理平台，快速概览当日的交易状况财务负责人可以集中进行跨渠道的交易管理，查账对账，数据分析，输出报表开放多角色的职能权限设置，方便开发，运营和财务高效协作<br>行业明星团队，顶级风险投资机构支持，历经 3 年积累打造专业的支付系统解决方案和基于交易数据的商业智能平台，历经 273 个版本。迭代升级，服务 70 多个行业近 2 万家企业客户，处理超过 5 亿笔订单。累计为超过 25000 家商户提供服务<br>简单清爽的商户中心,让商户更好的了解我们产品的优势,我能有专门的客服24小时引导您接入我们.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end choose  section -->
         <!-- work -->
         <div id="work"  class="work">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class="col-md-7">
                     <div class="titlepage">
                        <h2><span class="blu">怎么接入我们？</span></h2>
                        <p>我们拥有简单明了的接入SDK，24小时在线为您服务的售后、售前客服，一步步带您引进</p>
                        <a class="read_more" href="../SDK" >下载SDK</a>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="work_img">
                        <figure><img src="../template/Lfpay_2/images/work_img.jpg" alt="#"/></figure>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end work -->
         <!-- request -->
         <div id="contact" class="request">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2><span class="white">发送服务工单</span></h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <form id="request" class="main_form">
                        <div class="row">
                           <div class="col-md-12 ">
                              <input class="contactus" placeholder="Full Name" type="type" name="Full Name"> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Email" type="type" name="Email"> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">                          
                           </div>
                           <div class="col-md-12">
                              <textarea class="textarea" placeholder="Message" type="type" Message="Name">内容</textarea>
                           </div>
                           <div class="col-md-12">
                              <button class="send_btn">Send</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6">
                     
                  </div>
               </div>
            </div>
         </div>
         <!-- end request -->
         <!--  footer -->
         <footer>
            <div class="footer">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                           <div class="col-md-8 col-sm-6">
                              <div class="address">
                                 <h3>我们的地址</h3>
                              </div>
                              <ul class="location_icon">
                                 <li>中国</li>
                              </ul>
                           </div>
                           <div class="col-md-4 col-sm-6">
                              <div class="address">
                                 <h3>友情链接</h3>
                                 <ul class="Menu_footer">
                                    <li class="active"> <a href="http://host.hy0.site">阿狸云互联</a> </li>
                                    <li><a href="#about">About </a> </li>
                                    <li><a href="#work">Work</a> </li>
                                    <li><a href="#contact">Contact </a> </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                           <div class="col-md-5 col-sm-6">
                              <div class="address">
                                 <h3>Follow Us</h3>
                              </div>
                              <ul class="social_icon">
                                 <li><a href="#">Facebook <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"> Twitter<i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"> Linkedin<i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                 <li><a href="#"> Youtube<i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                 <li><a href="#"> Instagram<i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                           <div class="col-md-7 col-sm-6">
                              <div class="address">
                                 <h3>Newsletter </h3>
                              </div>
                              <form class="bottom_form">
                                 <input class="enter" placeholder="Enter Your Email" type="text" name="Enter Your Email">
                                 <button class="sub_btn">subscribe</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="copyright">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <p>Copyright 2020 All Right <?php echo $conf['web_name'];?> </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- end footer -->
      </div>
      <div class="overlay"></div>
      <!-- Javascript files-->
      <script src="../template/Lfpay_2/js/jquery.min.js"></script>
      <script src="../template/Lfpay_2/js/popper.min.js"></script>
      <script src="../template/Lfpay_2/js/bootstrap.bundle.min.js"></script>
      <script src="../template/Lfpay_2/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="../template/Lfpay_2/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../template/Lfpay_2/js/custom.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
             $("#sidebar").mCustomScrollbar({
                 theme: "minimal"
             });
         
             $('#dismiss, .overlay').on('click', function() {
                 $('#sidebar').removeClass('active');
                 $('.overlay').removeClass('active');
             });
         
             $('#sidebarCollapse').on('click', function() {
                 $('#sidebar').addClass('active');
                 $('.overlay').addClass('active');
                 $('.collapse.in').toggleClass('in');
                 $('a[aria-expanded=true]').attr('aria-expanded', 'false');
             });
         });
      </script>
      <script>
         $(document).ready(function() {
             $(".fancybox").fancybox({
                 openEffect: "none",
                 closeEffect: "none"
             });
         
             $(".zoom").hover(function() {
         
                 $(this).addClass('transition');
             }, function() {
         
                 $(this).removeClass('transition');
             });
         });
      </script>
      
   </body>
</html>

