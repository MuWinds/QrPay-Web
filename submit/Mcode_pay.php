<?php
$urls = $_SERVER['SERVER_NAME'];
require_once('../core/common.php');
$sitename=daddslashes($_GET['sitename']);
$trade_no=daddslashes($_GET['trade_no']);
$srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
$dingdan=daddslashes($srow['pay_id']);
if(!$srow)sysmsg('该订单号不存在，请返回来源地重新发起请求！');
$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$srow['pid']}' limit 1")->fetch();
//$Query=json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']),true);
$outtime  = daddslashes($userrow['outtime']);
$pay_id   = daddslashes(real_ip());
$pid   = daddslashes($userrow['pid']);
$key   = daddslashes(authcode($userrow['key'], 'DECODE', $conf['KEY']));
$qq	   = daddslashes($userrow['qq']);
$alipayid	   = daddslashes($userrow['alipayid']);
$trade_no  = daddslashes($srow['trade_no']);
$out_trade_no = daddslashes($srow['out_trade_no']);
$alipayid   = daddslashes($userrow['alipayid']);
$name   = daddslashes(trimall($srow['name']));
$money   = daddslashes($srow['money']);
$type    = $_GET['type']?daddslashes($_GET['type']):daddslashes($srow['type']);
$notify_url  = daddslashes('http://'.$conf['local_domain'].'/submit/Mcode_notify.php');
//$sign   = daddslashes(callback_sign($srow));
//$sitename=base64_decode(daddslashes($_GET['sitename']));
/**************************请求参数**************************/

if ($type == 'wxpay') {
 $typeName = '微信';
} else if ($type == 'qqpay' || $type == 'tenpay') {
 $typeName = 'QQ钱包';
    $type = 'qqpay';
} else {
    $typeName = '支付宝';
}


$time = time();
$num = '1';
for ($x=0; $x<=$num; $x++) {
    $money=number_format((float)daddslashes($money), 2, '.', '');
    if(!$DB->query("SELECT * FROM pay_order WHERE price='{$money}' and outtime>'{$time}' and status='0' limit 1")->fetch()){
        $money1 = $money;
    }else{
        $money = $money+0.01;
        $money1 = $money;
    }
$tr=$DB->query("SELECT * FROM pay_order WHERE price='{$money1}' and outtime>'{$time}' and status='0' limit 1")->fetch();
    if(!$tr){
        $arr['money'] = $money1;
        $num = 0;
    }else{
        $num = $num+1;
    }
} 
 if($type=='alipay' && $userrow['ali_login']>=time())
  $ispaytpey=true;
 elseif($type=='wxpay' && $userrow['wx_login']>=time())
  $ispaytpey=true;
 elseif($type=='qqpay' && $userrow['qq_login']>=time())
  $ispaytpey=true;
  elseif($type=='wxpay' && $userrow['wxcornzt']=="1")
  $ispaytpey=true;


if($userrow['paymb']>=$money)
  $edjc=true;

if(!$edjc){
sysmsg('<h2>当前商户软件额度不足以发起支付！<h2>');
}

if($userrow['sjian']>=time())
		$edj=true;

if(!$edj){
sysmsg('<h2>当前商户可使用时间已到期，请联系该商户进行充值！<h2>');
}


if(!empty($conf['gjclj'])){
	$block_name = explode('|',$conf['gjclj']);
	foreach($block_name as $rows){
		if(!empty($rows) && strpos($name,$rows)!==false){
			sysmsg('该商品禁止出售');
		}
	}
}


if(!$ispaytpey){
sysmsg('<h2>'.$typeName.'支付下单失败。[-10008]云端掉线<h2>');
}elseif($arr){

$realmoney = $arr['money'];

/**************************随机显示二维码变量**************************/
srand( microtime() * 1000000 );
$num = rand( 1, 2 );
switch( $num )
{
 case 1: $image_data=get_curl($siteurl.'qrcode.php?Mcode=1&pid='.$pid.'&type='.$type.'&money='.$money);
break;
 case 2: $image_data=get_curl($siteurl.'qrcode.php?Mcode=1&pid='.$pid.'&type='.$type.'&money='.$money);
break;
}


//$image_data=get_curl($siteurl.'qrcode.php?Mcode=1&pid='.$pid.'&type='.$type.'&money='.$money);
$image_arr = json_decode($image_data,true);
$time=time();
$DB->query("update `pay_order` set `price` ='{$money}',`type` ='{$type}',`addtime` ='{$date}',`software` ='1',`transfer_status`='3',`transfer_result`='软件版码支付' where `trade_no`='{$trade_no}'");
}else{
 sysmsg('<h2>'.$typeName.'支付下单失败。<h2>');
}
$image_arr['image']="http://".$_SERVER['HTTP_HOST']."/qrcode/qrcode_pay.php?ewm=".rawurlencode($image_arr['image_url']) ;
$erwm="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=".urlencode($image_arr['image_url']);
$sj=time()+$outtime;
if($dingdan==null){
 $DB->query("update `pay_order` set `pay_id` ='$sj' where `trade_no`='{$trade_no}'");
}
$sro=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
$sjc=time();
$ding=daddslashes($sro['pay_id']);
//print_r($ding);exit;
if($ding<=$sjc){
    sysmsg('<h2>该订单已经过期，请返回商家重新下单<h2>');
}
$outtim=$ding-$sjc;
$DB->query("update `pay_order` set `price` ='$money' where `trade_no`='{$trade_no}'");
?>
<!DOCTYPE html>
<html lang="zh-en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="referrer" content="no-referrer">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/submit/Mcode/antui-all.css">
    <link rel="stylesheet" href="/submit/Mcode/antui-loading.css">
    <!--<link rel="stylesheet" type="text/css" href="/Public/zfb/qiswl/QRCode.css">-->
    <script type="text/javascript" src="/submit/Mcode/jquery.min.js"></script>
    <script type="text/javascript" src="/submit/Mcode/qrcode.js"></script>
    <script type="text/javascript" src="/submit/Mcode/layer.js"></script>
    <script type="text/javascript" src="/submit/Mcode/qqapi.js"></script>
    <script type="text/javascript" src="/submit/Mcode/clipboard.min.js"></script>
    <title>在线支付- 微信 - <?php echo $sitename?></title>
    <style type="text/css">
        @font-face {
            font-family: 'iconFont';
            src: url('//at.alicdn.com/t/font_148784_r2qo40wrmaolayvi.eot');
            src: url('//at.alicdn.com/t/font_148784_r2qo40wrmaolayvi.eot?#iefix') format('embedded-opentype'),
                /* IE6-IE8 */
                url('//at.alicdn.com/t/font_148784_r2qo40wrmaolayvi.woff') format('woff'),
                /* chrome、firefox */
                url('//at.alicdn.com/t/font_148784_r2qo40wrmaolayvi.ttf') format('truetype'),
                /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
                url('//at.alicdn.com/t/font_148784_r2qo40wrmaolayvi.svg#iconfont') format('svg');
            /* iOS 4.1- */
        }

        svg path,
        svg rect {
            fill: #000;
        }

        .loader {
            text-align: center;
            padding: 1em;
            margin: 0 auto;
            display: inline-block;
            vertical-align: top;
        }

        body {
            padding: 0;
            margin: 0;
            background-color: #1e9fff;
            font-family: "microsoft yahei";
        }

        .pay-main {
            background-color: #1E9FFF;
            padding-top: 20px;
            padding-left: 20px;
            padding-bottom: 20px;
        }

        .pay-main img {
            margin: 0 auto;
            display: block;
        }

        .pay-main .lines {
            margin: 0 auto;
            text-align: center;
            color: #54ff00;
            font-size: 12pt;
            margin-top: 10px;
        }

        .tips .img {
            margin: 20px;
        }

        .tips .img img {
            width: 20px;
        }

        .tips span {
            vertical-align: top;
            color: #1e9fff;
            padding-left: 10px;
            padding-top: 0px;
        }

        .action {
            background: #15d447;
            padding: 10px 0;
            color: #ffffff;
            text-align: center;
            font-size: 14pt;
            border-radius: 10px 10px;
            margin: 15px;
        }

        .action:focus {
            background: #4cb131;
        }

        .action.disabled {
            background-color: #aeaeae;
        }

        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding-bottom: 20px;
            font-size: 10pt;
            color: #aeaeae;
        }

        .footer .ct-if {
            margin-top: 6px;
            font-size: 8pt;
        }

        .jieguo {
            top: 20px;
            line-height: 26px;
            max-width: 260px;
            padding: 8px 20px;
            margin: 0 auto;
            position: relative;
            border: 1px #ddd dashed;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .text {
            font-size: 16px;
            font-weight: bold;
            color: #f9f900;
        }
    </style>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        p {
            margin-top: 0;
            margin-bottom: 1em;
        }

        .iconFont {
            display: inline-block;
            font-style: normal;
            vertical-align: baseline;
            text-align: center;
            text-transform: none;
            line-height: 1;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .iconFont:before {
            display: block;
            font-family: iconFont !important;
        }

        .icon-scan:before {
            content: "\E697";
        }

        .icon-error:before {
            content: "\e62e";
        }

        .icon-success:before {
            content: "\e630";
        }

        .icon-clock:before {
            content: "\e640";
        }

        *,
        :after,
        :before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .mr5 {
            margin-right: 5px;
        }

        .casher-info-big {
            font-size: 1.5em;
            color: #333;
        }

        .casher-info-small {
            font-size: 0.8em;
            color: #666;
        }

        #root {
            margin: 0;
        }

        .casher-title {
            padding: 15px 0;
            text-align: center;
            background: #fff;
        }

        #bgMain {
            height: 664px;
            min-height: 100%;
            margin: 0 auto;
        }

        .qr-con {
            height: 550px;
            min-width: 300px;
            max-width: 710px;
            margin: 6px;
            background: #f7f7f7;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
            border-top: none;
        }

        .casher-amount-container {
            padding-top: 16px;;
            font-size: 2.0em;
            color: #333;
        }

        .casher-amount {
            margin-left: 5px;
        }

        .casher-img {
            border: 1px solid #ecf0ec;
            height: 260px;
            width: 260px;
            overflow: hidden;
        }

        #casherQR {
            height: 260px;
            width: 260px;
        }

        #casher-info {
            height: 260px;
            width: 260px;
            padding-top: 105px;
            color: #fff;
        }

        .casher-qr-info {
            font-size: 0.88em;
            padding-top: 20px;
            padding-bottom: 20px;
            color: red;
        }

        #casherTimeout {
            font-size: 1.2em;
            position: relative;
            bottom: -36px;
        }

        .casher-notify {
            position: fixed;
            top: -10px;
            opacity: 0;
            left: 50%;
            z-index: 1000;
            box-sizing: border-box;
            width: 350px;
            margin-left: -175px;
        }

        .casher-notify-wrapper {
            position: relative;
            margin-bottom: 10px;
            padding: 10px;
            background: #f8f8f8;
            color: #666;
            font-size: 1em;
            line-height: 1.1em;
        }

        .casher-counterdown-zahl {
            border: 1px solid;
            border-radius: 15%;
            margin: 0 5px;
            padding: 2px 5px;
            font-family: Consolas, Monaco, "Andale Mono", "Ubuntu Mono", monospace;
        }

        .tip {
            font-size: 14px;
            color: #fff;
        }

        .tip-text {
            display: inline-block;
            vertical-align: middle;
            text-align: left;
            font-size: 14px;
            line-height: 28px;
        }

        .pay-qq {
            background: #d72525;
            border: 12px solid #d72525;
        }

        .pay-qq #casher-info {
            background: #d72525
        }

        .pay-qq #casherTimeout {
            color: #d72525;
        }

        .pay-wechat {
            background: #3ec742;
            border: 12px solid #3ec742;
        }

        .pay-wechat #casher-info {
            background: #3ec742
        }

        .pay-wechat #casherTimeout {
            color: #3ec742;
        }

        .pay-alipay {
            background: #3CB371;
            border: 12px solid #3CB371;
        }

        .pay-alipay #casher-info {
            background: #3CB371
        }

        .pay-alipay #casherTimeout {
            color: #3CB371;
        }
        

        #qrcode img{
            margin: auto;
            background-color: #f7f7f7;
        }
    </style>
    <script>
    $(function () {
		$('#checkOrder').on('click', function(){
            var trade_no = $(this).attr('trade_no');
            $.ajax({
                type: "get",
                url: "getshop.php",
                data: {trade_no:trade_no},
                dataType: "json",
                success: function (res) {
                    if(res.code == -1){
                        layer.alert('未支付',{icon:2});
                    }else{ // 已支付
                        location.href = res.backurl;
                    }
                }
            });

        })
	});
</script>
<meta name="__hash__" content="e767a0f0cc3f915b6e54fd81cd1e684c_59c96dae270a1a08422da5ca3d016bd6" /></head>

<body>
    <!-- err -->
    <div class="err" style="display: none;">
        <div class="err-title">订单已过期</div>
        <div class="err-img">
            <img src="http://codepay9.cn/submit/Mcode/error.png" alt="">
        </div>
    </div>
    <!-- loading -->
    <div class="loading-loader">
        <div class="loading">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="container" style="position: relative;">
        <noscript>
            请启用Javascript来完成支付。
        </noscript>
        <div id="root" style="text-align:center;">
            <center>
                <div class="body">
                   <h1 class="mod-title">
                <div class="casher-title"><img id="casherTitleImg" alt="img" src="/submit/images/wechat-logo.png" 
                </div>
                </div>
                </div>
                <div id="bgMain" class="pay-alipay">
                    <div class="qr-con">
                        <div class="casher-amount-container">
                            <div>¥ <span id="amount" class="casher-amount">
                             <?php echo $money?></span></div>
                            <div style="position:relative;bottom:-4px;color:#3CB371;font-size:16px;font-weight:800;padding:10px;">
                                请截屏保存二维码,到微信扫一扫付款
                            </div>
                        </div>

                             <div class="qrcode-warp">
                        <div style="position: relative;display: inline-block;">
                         <img id="show_qrcode" src="<?php echo $image_arr['image']?>" width="210" height="210" style="display: block;">
                            <div id="qrcode">


                            </div>

                        </div>
                        <div>

                            <div class="casher-qr-info">请务必按照金额付款</div>

                            
                            <!--<div class="casher-info-big">本次支付预计20秒到账</div>-->
                            <span id="checkOrder" trade_no="<?php echo $trade_no ?>" style="font-size: 18px;color:#fff;cursor:pointer;background:#3CB371;width:200px;display:inline-block;padding:5px;border-radius:5px">检测当前订单状态</span>
                                <div>
                                    <a id='okpay' href="weixin://"
                                        style="color: #fff;text-decoration: none; text-align: center;padding: .55rem 0; display: inline-block; width: 68%; border-radius: .5rem; font-size: 16px;background-color: #3CB371; border: 1px solid #3CB371;letter-spacing:normal;font-weight: normal"
                                        class='action'>启动微信(推荐)</a>
                                    <!--<div class="botton cli1" style="color: #fff;text-decoration: none; text-align: center;padding: .55rem 0; display: inline-block; width: 41%; border-radius: .3rem; font-size: 14px;background-color: #428bca; border: 1px solid #428bca;letter-spacing:normal;font-weight: normal"  data-clipboard-text="20.00"  id="cli1">复制金额支付宝付款</div>-->
                                </div>
                                        订单还有<strong id="hour_show" style="color:#3CB371;font-size: 18px;"><s id="h"></s>0时</strong>
                <strong id="minute_show" style="color:#3CB371;font-size: 18px;"><s></s>10分</strong>
                <strong id="second_show" style="color:#3CB371;font-size: 18px;"><s></s>00秒</strong>过期
                <p>客服QQ：<span id="copy_trade_no2"><?php echo $qq?></span> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq?>&amp;site=qq&amp;menu=yes"><i class="fa fa-qq"></i></a></p
                
                        </div>
                    </div>
                </div>
            </center>

<script src="//lib.baomitu.com/clipboard.js/1.7.1/clipboard.min.js"></script>
<!-- Toastr -->
<script src="//lib.baomitu.com/toastr.js/2.1.4/toastr.min.js"></script>
<script>
var clipboard = new Clipboard('#copy_p', {
    text: function() {
         return $('#copy_lj').text();
    }
});

clipboard.on('success', function(e) {
    toastr.success("复制链接成功,请粘贴任意聊天框打开链接付款");
});

clipboard.on('error', function(e) {
 document.querySelector('#copy_lj');
    toastr.warning("复制失败,请手动复制一下");
});

var clipboarda = new Clipboard('#copy_trade_no', {
    text: function() {
  return $("#copy_trade_no2").text();
    }
});

clipboarda.on('success', function(e) {
    toastr.success("复制成功,请备注复制的订单号");
});

clipboarda.on('error', function(e) {
 document.querySelector('#copy_trade_no2');
    toastr.warning("复制失败,请手动复制一下");
});

        var clipboard = new Clipboard('#copy_name', {
            text: function() {
                return $("#copy_name").text();
            }
        });

        clipboard.on('success', function(e) {
            toastr.success("复制成功,请向复制的账号付款");
        });

        clipboard.on('error', function(e) {
            document.querySelector('#copy_name');
            toastr.warning("复制失败,请手动复制一下");
        });
</script>
<script type="text/javascript">    
   var ischeck = false;   //true 正在检测  false 没有检测
    var priceIstype ='2';
    var myTimer;
    var strcode = '';
 
    function timer(intDiff) {
        myTimer = window.setInterval(function () {
            var day = 0,
                hour = 0,
                minute = 0,
                second = 0;//时间默认值
            if (intDiff > 0) {
                day = Math.floor(intDiff / (60 * 60 * 24));
                hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            }
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;
            $('#hour_show').html('<s id="h"></s>' + hour + '时');
            $('#minute_show').html('<s></s>' + minute + '分');
            $('#second_show').html('<s></s>' + second + '秒');
            if (hour <= 0 && minute <= 0 && second <= 0) {
                qrcode_timeout();
                clearInterval(myTimer);
                window.clearInterval(timer_check);
            }
            intDiff--;
        }, 1000);
    }
    function timer_check() {
        myTimer = window.setInterval(function () {
            checkdata();
        }, 3000);
    }
    function checkdata(){
        if(ischeck) return ;
        ischeck = true;
        $.get("getshop.php",{trade_no: "<?php echo $trade_no?>"},function(data){
                ischeck = false;
                if (data.code == 1){
                    window.clearInterval(timer);
                    window.clearInterval(timer_check);
                    $("#show_qrcode").attr("src","./Mcode/img/pay_ok.png");
                    $("#use").remove();
                    $("#money").text("支付成功");
                    $("#msg").html("<h1>即将返回商家页</h1>");
                    
                    if (isMobile() == 1){
                        $(".paybtn").html('<a href="'+data.backurl+'" class="btn btn-primary">返回商家页</a>');
                        setTimeout(function(){
                            // window.location = data.url;
                            location.replace(data.backurl)
                        }, 1000);
                    }else{
                        $("#msg").html("<h1>即将<a href='"+data.backurl+"'>跳转</a>回商家页</h1>");
                        setTimeout(function(){
                            // window.location = data.url;
                            location.replace(data.backurl)
                        }, 1000);
                    }
                    
                }else if(data.code==-2){
                    toastr.warning(data.msg);
                    failtrade_no(data.msg);
                    setTimeout(function(){
                        window.history.go(-1)
                    }, 2000);
                }
            },"JSON");
    }

    function qrcode_timeout(){
        $('#show_qrcode').attr("src","./Mcode/img/qrcode_timeout.png");
        $("#use").hide();
        $('#msg').html("<h1>二维码过期，请刷新本页</h1>");
        setTimeout(function(){
            window.history.go(-1)
        }, 2000);
    }

    function isWeixin() { 
        var ua = window.navigator.userAgent.toLowerCase(); 
        if (ua.match(/MicroMessenger/i) == 'micromessenger') { 
            return 1;
        } else { 
            return 0;
        } 
    }

    function isMobile() {
        var ua = navigator.userAgent.toLowerCase();
        _long_matches = 'googlebot-mobile|android|avantgo|blackberry|blazer|elaine|hiptop|ip(hone|od)|kindle|midp|mmp|mobile|o2|opera mini|palm( os)?|pda|plucker|pocket|psp|smartphone|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce; (iemobile|ppc)|xiino|maemo|fennec';
        _long_matches = new RegExp(_long_matches);
        _short_matches = '1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-';
        _short_matches = new RegExp(_short_matches);
        if (_long_matches.test(ua)) {
            return 1;
        }
        user_agent = ua.substring(0, 4);
        if (_short_matches.test(user_agent)) {
            return 1;
        }
        return 0;
    }
    function isQQ(){
     var ua = window.navigator.userAgent.toLowerCase(); 
        if (ua.match(/MQQBrowser/i) == 'MQQBrowser') { 
            return 1;
        } else { 
            return 0;
        } 
    }
    $().ready(function(){
        
        //默认6分钟过期
        $('#orderDetail .arrow').click(function (event) {
      if ($('#orderDetail').hasClass('detail-open')) {
          $('#orderDetail .detail-ct').slideUp(500, function () {
              $('#orderDetail').removeClass('detail-open');
          });
      } else {
          $('#orderDetail .detail-ct').slideDown(500, function () {
              $('#orderDetail').addClass('detail-open');
          });
      }
  });
        timer("<?php echo $outtim?>");
        timer_check();
        var istype = "<?php echo $type?>";
        var suremoney = "1";
        var uaa = navigator.userAgent;
        var isiOS = !!uaa.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
        if (isMobile() == 1){
            if (isWeixin() == 1 && istype == 'wxpay'){
                //微信内置浏览器+微信支付
                $("#showtext").text("长按二维码识别");
            } else if(isQQ() == 1 && istype == 'qqpay'){
             //QQ内置浏览器+QQ支付
             $("#shoqtext").text("长按二维码识别");
            }else{
                //其他手机浏览器+支付宝支付
                if (isWeixin() == 0 && istype == 'alipay'){
                    $(".paybtn").show();
                    // if(priceIstype=="2"&&!isiOS){
                    //     $('#alipayform').submit();
                    // }
                    $('#msg').html("<h1>支付完成后，请返回此页</h1>");
                    //$(".qrcode-img-wrapper").remove();
                    $(".tip").remove();
                    $(".foot").remove();                                      

                }else /*{*/
                    if (isWeixin() == 0 && istype == 'wxpay'){
                        //其他手机浏览器+微信支付
                        //IOS的排除掉
                        if (isiOS){
                            var qrcode = $('#qrcode').qrcode({  
                                text: '',  
                                width: 200,  
                                height: 200,
                            }).hide();  
                            //添加文字  
                            var text = "长按下载";//设置文字内容  
                            var canvas = qrcode.find('canvas').get(0);  
                            var oldCtx = canvas.getContext('2d');  
                            var imgCanvas = document.getElementById('imgCanvas');  
                            var ctx = imgCanvas.getContext('2d');  
                            ctx.fillStyle = 'white';  
                            ctx.fillRect(0,0,210,250);  
                            ctx.putImageData(oldCtx.getImageData(0, 0, 200, 210), 5, 20);  
                            ctx.fillStyle = 'black';  
                            ctx.strokStyle = 'rgb(1,1,0)';  
                            //ctx.stroke = 3;  
                            ctx.textBaseline = 'middle';  
                            ctx.textAlign = 'center';  
                            ctx.font = '15px';  
                            ctx.fillText(text, imgCanvas.width / 2, 240 );  
                            ctx.strokeText(text, imgCanvas.width / 2, 240);  
                            imgCanvas.style.display = 'none';  
                            $('#show_qrcode').attr('src', imgCanvas.toDataURL('image/png')).css({  
                                width: 210,height:250  
                            }); 
                            $('.iospayweixinbtn').attr('style','padding-top: 15px;');
                        }else{
                            $(".payweixinbtn").attr('style','padding-top: 15px;');
                        }                      
                       
                    }
                //}
            }
        }
        
    });

</script>
</body></html>

       </script>
       <script src="../assets/layer/layer.js"></script>
        <script type="text/javascript">
        layer.alert("<?php echo $userrow['pay_gg']?>",{icon:6})
        </script>
    <audio autoplay=""><source src="/tts.mp3"></audio>
    
<script>//禁止右键

function click(e) {

if (document.all) {

if (event.button==2||event.button==3) { alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");

oncontextmenu='return false';

}

}

if (document.layers) {

if (e.which == 3) {

oncontextmenu='return false';

}

}

}

if (document.layers) {

document.captureEvents(Event.MOUSEDOWN);

}

document.onmousedown=click;

document.oncontextmenu = new Function("return false;")

document.onkeydown =document.onkeyup = document.onkeypress=function(){ 

if(window.event.keyCode == 12) { 

window.event.returnValue=false;

return(false); 

} 

}

</script>



  <script>//禁止F12

function fuckyou(){

window.close(); //关闭当前窗口(防抽)

window.location="about:blank"; //将当前窗口跳转置空白页

}



function click(e) {

if (document.all) {

  if (event.button==2||event.button==3) { 

alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");

oncontextmenu='return false';

}



}

if (document.layers) {

if (e.which == 3) {

oncontextmenu='return false';

}

}

}

if (document.layers) {

fuckyou();

document.captureEvents(Event.MOUSEDOWN);

}

document.onmousedown=click;

document.oncontextmenu = new Function("return false;")

document.onkeydown =document.onkeyup = document.onkeypress=function(){ 

if(window.event.keyCode == 123) { 

fuckyou();

window.event.returnValue=false;

return(false); 

} 

}

</script>



