<?php
$lf = $_GET['lf'];
$id = $_GET['id'];
ignore_user_abort();//
set_time_limit(0);//
$interval=3;//
$sc = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipay1.php?id=$id");
//
do{
    $yz = file_get_contents("http://".$_SERVER['HTTP_HOST']."/corn/alipay1.php?lf=$lf&shangci=$sc&id=$id");//提交状态验证
    if ($yz == "yes") {
        echo "yes";//
        exit();
    }
    else {
        $sc = $yz;//
    }
sleep($interval);//
}while(true);//