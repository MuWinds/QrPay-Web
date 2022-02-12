<?php
$is_defend=true;
include("./core/common.php");
include_once(SYSTEM_ROOT."security.php");
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqjump']==1){
	echo '<!DOCTYPE html>
<html>
 <head>
  <title>请使用浏览器打开</title>
  <script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
  <script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "'.$siteurl.'"}); </script>
 </head>
 <body></body>
</html>';
exit;
}
if($conf['cdnserver']==1){
	$cdnserver = '//www.qqmzz.cn/';
}else{
	$cdnserver = null;
}
$mod = isset($_GET['mod'])?$_GET['mod']:'index';
$loadfile = Template::load($mod);
include $loadfile;