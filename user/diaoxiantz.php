<?php
include("../core/common.php");

$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);

$class = "enotify";


$sql = "select * from pay_emailtz where email_pid = '$pid' limit 1";

$erow = $DB->query($sql)->fetch();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="./layuiadmin/layui/css/layui.css"  media="all">
  <script src="./layuiadmin/layui/layui.js" charset="utf-8"></script>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">使用说明[邮件会发到您的QQ邮箱 ]</div>
      <div class="layui-card-body">
          配置本功能后 将在您资料失效时发送邮件到您邮箱 以免出现漏单情况<br>
          QQ邮箱设置:<br> SMTP:smtp.qq.com 端口:25 邮箱账号:您的发件邮箱号 <a href="https://jingyan.baidu.com/article/00a07f389eea7dc3d128dc36.html" target="_blank">点击查看QQ邮箱授权码获取教程</a><br>
          163邮箱设置: <br>SMTP:smtp.163.com 端口:25 邮箱账号:您的发件邮箱号 <a href="https://jingyan.baidu.com/article/4e5b3e19266fee91901e2489.html" target="_blank">点击查看163邮箱授权码获取教程</a>
      </div>
    </div>

    <div class="layui-card">
      <div class="layui-card-header">掉线通知     此功能正在开发暂时不可使用、、、、、、、、、、、、、</div>
      <div class="layui-card-body" style="padding: 15px;">
        
        <form id="frmdata" onsubmit="return false;"  method="post" class="layui-form">

          <div class="layui-form-item">
            <label class="layui-form-label">通知开关</label>
            <div class="layui-input-block">
              <select class="form-control" name="email_status">
                 <option <?=$erow['email_status']==0?"selected":""?> value="0">关闭</option>
                  <option <?=$erow['email_status']==1?"selected":""?> value="1">开启</option>
              </select>
            </div>
          </div>
          
          
          
          <div class="layui-form-item">
            <label class="layui-form-label">SMTP</label>
            <div class="layui-input-block">
              <input type="text" name="email_smtp" value="<?=$erow['email_smtp']?>" placeholder="请输入SMTP" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">端口</label>
            <div class="layui-input-block">
              <input type="text" name="email_port" value="<?=$erow['email_port']?>" placeholder="请输入端口" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">邮箱账号</label>
            <div class="layui-input-block">
              <input type="text" name="email_name" value="<?=$erow['email_name']?>" placeholder="请输入邮箱账号" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">邮箱授权码</label>
            <div class="layui-input-block">
              <input type="text" name="email_pass" value="<?=$erow['email_pass']?>" placeholder="请输入邮箱授权码" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">支付宝通知开关</label>
            <div class="layui-input-block">
              <select class="form-control" name="ali_tz">
                 <option <?=$erow['ali_tz']==0?"selected":""?> value="0">关闭</option>
                  <option <?=$erow['ali_tz']==1?"selected":""?> value="1">开启</option>
              </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">微信通知开关</label>
            <div class="layui-input-block">
              <select class="form-control" name="wx_tz">
                 <option <?=$erow['wx_tz']==0?"selected":""?> value="0">关闭</option>
                  <option <?=$erow['wx_tz']==1?"selected":""?> value="1">开启</option>
              </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">QQ通知开关</label>
            <div class="layui-input-block">
              <select class="form-control" name="qq_tz">
                 <option <?=$erow['qq_tz']==0?"selected":""?> value="0">关闭</option>
                  <option <?=$erow['qq_tz']==1?"selected":""?> value="1">开启</option>
              </select>
            </div>
          </div>
          <br>
          <br>
          <br>
          <div class="layui-form-item layui-layout-admin">
            <div class="layui-input-block">
              <div class="layui-footer" style="left: 0;">                                    
              
                <button type="submit" class="layui-btn submit">保存配置</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
              </div>
            </div>
          </div>
     </form>

      </div>
    </div>
  </div>

 
  <script src="./layuiadmin/layui/layui.js"></script>
  <script src="./static/js/jquery.min.js"></script> 
  <script>
  layui.config({
    base: './layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form', 'laydate'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form;
    
  });
  </script>
  
<script>
    $(".submit").click(function(){
             var ii = layer.load(3, {shade:[0.1,'#fff']});
                $.ajax({
                    type : "POST",
                    url : "ay_ajax.php?act=submit_email",
                    data : $("#frmdata").serialize(),
                    dataType : 'json',
                    success : function(data) {                    
                          layer.close(ii);
                          
                          if(data.code==1){
                            layer.alert(data.msg);
                            setTimeout(function () {
                                location.href="./diaoxiantz.php";
                            }, 3000); //延时1秒跳转
                          }else{
                            layer.msg(data.msg);
                          }
                    },
                    error:function(data){
                        layer.close(ii);
                        layer.msg('服务器错误');
                        }
                
                })
        })
    </script>
</body>
</html>
<?php include 'foot.php';?>