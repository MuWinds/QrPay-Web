<?php
include("../core/common.php");
$title='推广赚钱';

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8" />
  <title><?php echo $title?> | <?php echo $conf['web_name']?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.css.net/libs/animate.css/3.5.1/animate.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.css.net/libs/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.css.net/libs/simple-line-icons/2.2.4/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/font.css" type="text/css" />
  <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/app.css" type="text/css" />
  <link rel="stylesheet" href="https://admin.down.swap.wang/assets/plugins/toastr/toastr.min.css" type="text/css" />

    <style type="text/css">
        ul,li{
            list-style: none;;
        }
        .slide-box{
            margin-top:200px;
            display: -webkit-box;
            overflow-x: auto;
            /*适应苹果*/
            -webkit-overflow-scrolling:touch;
        }
        .slide-item{
            width: 300px;
            height: 300px;
            border:1px solid #ccc;
            margin-right: 30px;
            background: pink;
        }
        /*隐藏掉滚动条*/
        .slide-box::-webkit-scrollbar {
            display: none;
        }
  </style>

</head>
   <div class="wrapper"> 
   <div class="col-lg-6 col-md-6"> 
    <div class="panel b-a"> 
     <div class="panel-heading font-bold" style="background:#F5F5F5;">
      我的推广
     </div> 
     <div class="text-center m-b clearfix"> 
      <div class="thumb-lg avatar m-t-n-xl"> 
       <br />
                                    <img alt="" src="<?php echo ($userrow['qq'])?'//q2.qlogo.cn/headimg_dl?bs=qq&dst_uin='.$userrow['qq'].'&src_uin='.$userrow['qq'].'&fid='.$userrow['qq'].'&spec=100&url_enc=0&referer=bu_interface&term_type=PC':'assets/img/user.png'?>" style="width: 40px; height: 40px;">
      </div> 
     </div> 
     <li class="list-group-item"> <span class="badge btn-default"><font color="#58666E"><a title="立即赚钱" target="_blank" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/user/reg.php?tgid='.$pid; ?>"><?php echo 'http://'.$_SERVER['HTTP_HOST'].'/user/reg.php?tgid='.$pid; ?></font></span> <i class="fa fa-link fa-fw text-muted"></i>推广链接</li>   
</div>
</div>
   <div class="col-lg-6 col-md-6"> 
    <div class="panel panel-dark"> 
     <div class="panel-heading font-bold" style="background:#F5F5F5;">
      推广成功佣金说明
     </div> 
     <div class="panel-body"> 
      <a class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>[2018-08-01]推广返利正式上线！</a> 
      <a class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>须知：通过您商户ID推广注册的随机余额会直接到账您的余额！</a> 
      <a class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>返利：将您的推广链接分享给其他朋友、社区、论坛、博客或者赞助链接、每位通过您的推广链接成功注册的商户、您将获得<code>0.1-1</code>随机金额！推广获得的余额都是实时到账您的余额的。</a> 
      <a class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>说明：虽然显得微不足道，日夜累加，积少成多，您不需要做任何事情就有收入，动动手指就能赚到的钱还需要纠结？别犹豫赶快上车，</a> 
     </div> 
    </div> 
   </div> 
  </div>   


<?php include 'foot.php';?>