<?php
$pay = $_GET['ewm'];
//3. 生成原始的二维码(不生成图片文
 function scerweima2($url=''){
 require_once './qrcode/phpqrcode.php';
 $value = $url;         //二维码内容
 $errorCorrectionLevel = 'H';  //容错级别
 $matrixPointSize = 5;      //生成图片大小
 //生成二维码图片
 $QR = QRcode::png($value,false,$errorCorrectionLevel, $matrixPointSize, 2);
 }
//调用查看结果
 scerweima2($pay);