<?php
/* * 
 * 功能：彩虹易支付页面跳转同步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见epay_notify_class.php中的函数verifyReturn
 */
require_once('../core/common.php');
//支付方式
$type = $_GET['type'];
if($type=='alipay'){
$epay_pid = $conf['alipay_epid'];
$epay_key = $conf['alipay_ekey'];
$epay_url = $conf['alipay_eurl'];
}elseif($type=='qqpay'){
$epay_pid = $conf['qqpay_epid'];
$epay_key = $conf['qqpay_ekey'];
$epay_url = $conf['qqpay_eurl'];
}elseif($type=='wxpay'){
$epay_pid = $conf['wxpay_epid'];
$epay_key = $conf['wxpay_ekey'];
$epay_url = $conf['wxpay_eurl'];	
}
require_once(SYSTEM_ROOT."epay/epay.config.php");
require_once(SYSTEM_ROOT."epay/epay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	//支付方式
	$type = $_GET['type'];

	$srow=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$out_trade_no}' limit 1")->fetch();
    if($_GET['trade_status'] == 'TRADE_SUCCESS' && $srow['status']==0) {

		$userrow=$DB->query("SELECT * FROM pay_user WHERE pid='{$srow['pid']}' limit 1")->fetch();
		if($userrow['rate'])
			$tmoney=round($srow['money']*1,2);//结算给商户的余额
		else
			$tmoney=round($srow['money']*1,2);//结算给商户的余额
		$DB->query("update `pay_order` set `status` ='1',`endtime` ='{$date}',`tmoney` ='{$tmoney}' where `trade_no`='$out_trade_no'");
		if($tmoney<0.1){
			$DB->query("update `pay_user` set `money` =`money`+'{$tmoney}' where `pid`='{$srow['pid']}'");
			$DB->exec("update `pay_order` set `transfer_status`='3',`transfer_result`='支付成功',`transfer_date`='{$date}' where trade_no='{$out_trade_no}' limit 1");
		}elseif(in_array($srow['type'],explode('|',$conf['transfer_type']))){

		}else{
			$DB->query("update `pay_user` set `money` =`money`+'{$tmoney}' where `pid`='{$srow['pid']}'");
			$DB->exec("update `pay_order` set `transfer_status`='3',`transfer_result`='支付成功',`transfer_date`='{$date}' where trade_no='{$out_trade_no}' limit 1");
		}
		
		//发送通知给商户平台
		$url=creat_callback($srow);
		get_curl($url['notify']);
    }
    if($_GET['trade_status'] == 'TRADE_SUCCESS'){
		$url=creat_callback($srow);
		if($srow['status']==0){
			echo '<script>window.location.href="'.$url['return'].'";</script>';
		}else{
			echo '<script>window.location.href="'.$url['return'].'";</script>';
		}
		
    }else {
      echo "trade_status=".$_GET['trade_status'];
    }

	echo "验证成功<br />";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
?>
        <title>云支付即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>