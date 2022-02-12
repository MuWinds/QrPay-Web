<?php
/* * 
 * 功能：零度即时到账支付页面跳转同步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见epay_notify_class.php中的函数verifyReturn
 */
include("../core/common.php");
require_once("epay.config.php");
require_once("lib/epay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
	$trade_no = $_GET['trade_no'];
   $srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
          $chuli=$srow['chuli'];
 if($chuli=='1') {
 exit("<script language='javascript'>alert('订单已经验证');location.href='./index.php'</script>");
	}
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];
$name=$_GET['name'];
	//交易状态
	$trade_status = $_GET['trade_status'];

	//支付方式
	$type = $_GET['type'];
	$money = $_GET['money']*$conf['huiyuan'];
    $sjc=time(); 
    $t=1; 
$sjcx=time()+$money; 
    $userrow=$DB->query("SELECT * FROM `pay_user` WHERE `pid`='$name' limit 1")->fetch();
    $sj	= $userrow['sjian'];
     $id	= $userrow['pid'];
          $srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
          $chuli=$srow['chuli'];
          	      
     if($_GET['trade_status'] == 'TRADE_SUCCESS') {
         if($sj<=$sjc){  
                $DB->query("update `pay_user` set `sjian` ='{$sjcx}' where `pid`='$name'");
                $DB->query("update `pay_order` set `chuli` ='1' where `trade_no`='$trade_no'");
              exit("<script language='javascript'>alert('开通成功!');location.href='./index.php'</script>");
               }else{ 
                  $s=$sj+$money;
               $DB->query("update `pay_user` set `sjian` ='{$s}' where `pid`='$name'");
               $DB->query("update `pay_order` set `chuli` ='1' where `trade_no`='$trade_no'");
              exit("<script language='javascript'>alert('续费成功!');location.href='./index.php'</script>");
}
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";

}
?>
        <title>开心码支付即时到账支付交易接口</title>
	</head>
    <body>
    </body>
</html>
