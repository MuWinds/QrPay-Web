<?php
$data = $_POST['imgBase64'];
if($data == "")
{
exit(图片为空);
}
$sb = date("Ymd");
@mkdir("uploads/$sb",0777,true);
//文件名:base64.php

   $imgs1 = str_replace('data:image/jpeg;base64,', '', $data);
   $imgs2 = str_replace('data:image/png;base64,', '', $imgs1);
   $imgs3 = str_replace('data:image/gif;base64,', '', $imgs2);
   $imgs4 = str_replace('data:image/bmp;base64,', '', $imgs3);

$img=base64_decode($imgs4);
$number = rand(10000,20000);
$name = time();


$myfile = fopen("./uploads/"."/".$sb."/".$name.".jpg", "w") or die("Unable to open file!");
$txt = $img;
fwrite($myfile, $txt);
fclose($myfile);
echo "http://".$_SERVER['HTTP_HOST']."/qrcode/uploads/$sb/".$name.".jpg";
?>