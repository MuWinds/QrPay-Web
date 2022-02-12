<?php
include("../core/common.php");

$userrow = $DB->query("SELECT * FROM `pay_user` WHERE `pid`='{$pid}' limit 1")->fetch();
$Query = json_decode(authcode($userrow['Query'], 'DECODE', $conf['KEY']), true);

$class = "enotify";


$sql = "select * from pay_emailtz where email_pid = '$pid' limit 1";

$erow = $DB->query($sql)->fetch();

?>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTENT -->
<div class="content" style="min-height: 1000px">

    <!-- Start Page breadcrumb -->
    <div class="page-header">

        <ol class="breadcrumb">
            <li><a href="../">乐云支付</a></li>
            <li><a href="./">用户中心</a></li>
            <li class="active">掉线通知</li>
        </ol>



    </div>
    <!-- End Page breadcrumb -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    <div class="container-default">


        <div class="row">

            <div class="col-md-12 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-title">
                       掉线通知
                        <ul class="panel-tools">

                            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>

                        </ul>
                    </div>

                    <div class="panel-body">
                        <form  id="frmdata" onsubmit="return false;"  method="post" class="form-horizontal">
                             <div class="form-group">
                              <label for="input002" class="col-sm-2 control-label form-label">开关</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="email_status">
                                     <option <?=$erow['email_status']==0?"selected":""?> value="0">关闭</option>
                                      <option <?=$erow['email_status']==1?"selected":""?> value="1">开启</option>
                                  </select>
                                </div>
                            </div>
                            
                              <div class="form-group">
                                            <label class="col-sm-2 control-label form-label">SMTP</label>
                                         <div class="col-sm-10">
                                              <input type="text" name="email_smtp" value="<?=$erow['email_smtp']?>" class="form-control" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label form-label">端口</label>
                                          <div class="col-sm-10">
                                              <input type="text" name="email_port" value="<?=$erow['email_port']?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                         <label class="col-sm-2 control-label form-label">邮箱账号</label>
                                            <div class="col-sm-10">
                                              <input type="text" name="email_name" value="<?=$erow['email_name']?>" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label form-label">邮箱授权码</label>
                                           <div class="col-sm-10">
                                              <input type="text" name="email_pass" value="<?=$erow['email_pass']?>" class="form-control" />
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-sm-2 control-label form-label">支付宝开关</label>
                                           <div class="col-sm-10">
                                              <select class="form-control" name="ali_tz">
                                                 <option <?=$erow['ali_tz']==0?"selected":""?> value="0">关闭</option>
                                                  <option <?=$erow['ali_tz']==1?"selected":""?> value="1">开启</option>
                                              </select>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-sm-2 control-label form-label">微信开关</label>
                                            <div class="col-sm-10">
                                              <select class="form-control" name="wx_tz">
                                                 <option <?=$erow['wx_tz']==0?"selected":""?> value="0">关闭</option>
                                                  <option <?=$erow['wx_tz']==1?"selected":""?> value="1">开启</option>
                                              </select>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-sm-2 control-label form-label">QQ开关</label>
                                           <div class="col-sm-10">
                                              <select class="form-control" name="qq_tz">
                                                 <option <?=$erow['qq_tz']==0?"selected":""?> value="0">关闭</option>
                                                  <option <?=$erow['qq_tz']==1?"selected":""?> value="1">开启</option>
                                              </select>
                                            </div>
                                        </div>
                          

                            <div class="form-group">
                                <label for="input001" class="col-sm-2 control-label form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary submit">保存配置</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div class="panel panel-default">

                    <div class="panel-title">
                        使用说明
                        <ul class="panel-tools">

                            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>

                        </ul>
                    </div>

                    <div class="panel-body">
                   1.请输入你的邮箱账号和配置<br>
2.邮箱密码不是登录密码[授权密码]<br>
3.端口自行测试：465/587
<br>4.QQ邮箱发件教程→
<a href="http://t.z74d.cn/news/3.html" target="_blank" title="易支付地址" style="color: rgb(51, 51, 51); text-decoration-line: none;">http://t.z74d.cn/news/3.html</a>
</span>
</strong>
<br>

	 		</div>
		</div><br/><br/>
   		<div class="form-group">
       		<div class="col-sm-offset-2 col-sm-10" style="display: none;" id="tis-div"> <div class="alert alert-info" id="tis-msg">信息！请注意这个信息。 </div> </div>
<pre>
<font color="green">
如果为QQ邮箱需先开通SMTP，且要填写QQ邮箱独立密码。
邮箱SMTP服务器可以百度一下，例如QQ邮箱的即为 smtp.qq.com。
邮箱SMTP端口默认为25，SSL的端口是465。</font>
<hr>
关于邮件发送失败问题的解决方法：
1.检查空间是否未开启fsockopen函数支持，如果未开启可以到空间控制面板开启或联系主机商，
2.可能发信邮箱不支持smtp发信，可以到邮箱的设置页面进行开启。另外新注册的网易邮箱普遍不支持发信，老邮箱才可以，如果遇到这种情况请到淘宝买老邮箱账号或者使用139邮箱。
3.如果发信邮箱是QQ邮箱要申请授权码，需要到QQ邮箱网页版的设置页面进行设置并申请授权码，SMTP密码一栏即填写授权码（非QQ密码），端口是465，并开启SSL模式。
        </pre>
			</div>
		</div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
</div>
<!-- End Content -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- Start Footer -->
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
                                location.href="./emailtz.php";
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
<?php
include "foot.php";
?>
<!-- End Footer -->
<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="assets/js/plugins.js"></script>
</body>
</html>