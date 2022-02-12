<?php
if(!empty($_GET['qrcode'])){
include("../core/common.php");
exit(qrcode($_GET['qrcode']));
}
$title='二维码管理';
include("../core/common.php");
include './ha.php';
@header('Content-Type: text/html; charset=UTF-8');
if (!isset($_COOKIE["user_token"]) or !$_SESSION['Query_pid'] or !$_SESSION['Query_key']) echo '<script>alert("请先登录!");location.href="./login.php"</script>';
$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);
error_reporting(0);
$password=$userrow['pwd'];//这里是密码 
$p = "";
if(isset($_COOKIE["isview"]) and $_COOKIE["isview"] == $password){ 
	$isview = true;
}else{ 
	if(isset($_POST["pwd"])){ 
		if($_POST["pwd"] == $password){ 
			setcookie("isview",$_POST["pwd"],time()+3600*3);
			$isview = true;
		}else{
			$p = (empty($_POST["pwd"])) ? "需要密码才能查看，请输入密码。" : "密码不正确，请重新输入。";
		} 
	}else{
		$isview = false;
		$p = "";
	}
}
if($isview){?>
<!---------------------------------------------------绑定QQ扫码验证 开始------------------------------------------------------------>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><?php echo $title ?> | <?= $conf['sitename'] ?>-<?= $conf['title'] ?></title>
    <meta name="keywords" content="<?php echo $conf['keywords'] ?>">
    <meta name="description" content="<?php echo $conf['description'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/animate.css/3.5.2/animate.min.css" type="text/css"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="//cdn.staticfile.org/simple-line-icons/2.4.1/css/simple-line-icons.min.css" type="text/css"/>
      <link rel="stylesheet" href="/assets/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/user/css/font.css" type="text/css"/>
     <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="./layuiadmin/style/login.css" media="all">
    <script src="//cdn.staticfile.org/jquery/3.3.1/jquery.min.js"></script>
    <script src="//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <style>
    .content-page {
  border-color: #dee5e7;
  overflow: scroll;
  height: 550px;
}
    </style>
</head>
<div class="modal fade" align="left" id="ADD_QR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">添加二维码</h4>
      </div>
      <div class="modal-body">
	  
<div class="form-group">
<label>选择二维码:</label><span class="glyphicon glyphicon-qrcode"></span>
<label for="file"></label><input type="file" name="upload_file"  id="upload_file" accept="image/*" multiple>
<img  id="myImg" width="180px" height="150px" />
<div style="display:none"><textarea id="manyi2"></textarea></div>

</div>
<div class="form-group">
<label>二维码图片地址:</label><br>
<input type="text" class="form-control" id="pic_url" value="" placeholder="请先上传二维码" name="pic_url">
</div>
<div class="form-group">
<label>二维码识别地址:</label><br>
<input type="text" class="form-control" id="qr_url" value="" placeholder="请先上传二维码" name="qr_url">
</div>
<div class="form-group">
<label>支付类型:</label><br><select class="form-control" name="type" id="type"><option value="wxpay">微信</option><option value="alipay">支付宝</option><option value="qqpay">QQ钱包</option></select>
</div>
<div class="form-group">
<label>二维码金额(每种支付方式都要有一张通用二维码):</label><br>
<input type="text" class="form-control" name="money" id="money" value="" placeholder="留空则是通用二维码">
</div>
<button type="sumbit" class="layui-btn layui-btn-fluid" onclick="add_qr();">确定添加</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

<div class="content-page">
<marquee scrollamount="8" direction="left" align="Middle" style="font-weight: bold;line-height: 20px;font-size: 20px;color: #FF0000;"></marquee>
	  <div class="row">
                   
                        <div class="col-lg-4 col-md-6">
                      	<div class="panel panel-default">
		<div class="panel-heading font-bold"><span class="glyphicon glyphicon-qrcode"></span>二维码列表
		 <a href="#" data-toggle="modal" data-target="#ADD_QR" id="ADD_QR" ><span class="layui-btn layui-btn-sm"><i class="layui-icon"></i>点此新增</span></A>(不上传二维码的通道优先使用代收款)
		</div>
		<div class="panel-body">
        <table class="table table-striped">
          <thead><tr><th>二维码类型</th><th>二维码金额</th><th>添加时间</th><th>操作</th></tr></thead>
          <tbody>

<?php
$sql="`pid`='{$pid}'";
$rs=$DB->query("SELECT * FROM pay_qrlist WHERE{$sql} order by id desc limit 999");
while($res = $rs->fetch())
{
	  echo '<tr>
	  <td>'.($res['type']=='wxpay'?'微信':($res['type']=='alipay'?'支付宝':'QQ钱包')).'</td>
	  <td>'.($res['money']>0?$res['money']:'通用').'</td>
	  <td>'.$res['addtime'].' </td>
	  <td>

	  <button class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon" onclick="dell_qr('.$res['id'].');"><i class="layui-icon"></i>删除</span></button></td>
	  </tr>';
	}
?>
		  </tbody>
        </table>
		</div>
      </div>
	  </div>

<script type="text/javascript">

         

                
		$(document).ready(function() {
            $('.picurl > input').bind('focus mouseover', function() {
                if (this.value) {
                    this.select()
                }
            });
            $("input[type='file']").change(function(e) {
                images_upload(this.files);
               
            });
        });
  var images_upload = function(files) {
      var baseData = "";
      var tmp="";
      
      var file = document.getElementById('upload_file').files[0];
				r = new FileReader();  //本地预览
				r.onload = function(){

              	$('#pic_url').val('上传中');
                $('#qr_url').val('识别中');
              	
              	
				document.getElementById('myImg').src  = r.result;
				 var baseData = "";
			    baseData  =r.result;
			    var tmp = baseData.split(",");
			    document.getElementById("manyi2").value  =encodeURIComponent(tmp[1]);
			
			    	
					
				}
				r.readAsDataURL(file);  
				baseData.substr(0,50);
				setTimeout(function(){
				    var niu=document.getElementById("manyi2").value;
				     $.post("http://<?php echo $_SERVER['HTTP_HOST']; ?>/qrcode/images_api.php","&imgBase64="+niu,function (data) {
				         
	

				         
				         
				         document.getElementById('pic_url').value=data;
						$.get("http://<?php echo $_SERVER['HTTP_HOST']; ?>/qrcode/qrcode_decode.php?url="+ data,'',function(qr_url){//二维码解码
							$('#qr_url').val(qr_url.replace(/(^\s*)|(\s*$)/g, ""));
							},"html");
  });
      
				   
				    
				},1500);
		    	var abc="";
			    abc = encodeURIComponent(tmp[1]).substr(0,50).String;
        };	
  </script>
<?php include 'foot.php';?>




<?php 
}else{
	include 'pwd.php';
}?>
