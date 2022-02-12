<?php
if($_GET['qrcode']){
include("../core/common.php");
exit(qrcode($_GET['qrcode']));
}
$title='用户中心';
include './head.php';
?>
<?php
$orders=$DB->query("SELECT count(*) from pay_order WHERE pid={$pid} and software=1")->fetchColumn();

$lastday=date("Y-m-d",strtotime("-1 day")).' 00:00:00';
$today=date("Y-m-d").' 00:00:00';

$order_today=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=1 and endtime>='$today'")->fetchColumn();

$order_lastday=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and status=1 and software=1 and addtime>='$lastday' and endtime<'$today'")->fetchColumn();

$settle_money=$DB->query("SELECT sum(money) from pay_order where pid={$pid} and software=1 and status=1")->fetchColumn();

$rs=$DB->query("SELECT * from pay_order where pid={$pid} and status=1 and software=1");
$max_settle=0;
$chart='';
$i=0;
while($row = $rs->fetch())
{
	if($row['money']>$max_settle)$max_settle=$row['money'];
	if($i<9)$chart.='['.$i.','.$row['money'].'],';
	$i++;
}
$chart=substr($chart,0,-1);
?> 

<script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
var audio=document.createElement('audio');  
var play = function (s) {
    var URL = 'https://fanyi.baidu.com/gettts?lan=zh&text=' + encodeURIComponent(s) + '&spd=5&source=web'

    if(!audio){
        audio.controls = false  
        audio.src = URL 
        document.body.appendChild(audio)  
    }
    audio.src = URL  
    audio.play();
}
if( !$.cookie('zero_play')){
	play('您好，欢迎使用本码支付系统，平台每日会对交易流水大的商户进行抽查,请不要用于违规站点! 严禁一切淫秽、涉赌、政治、钓鱼、诈骗、理财、借贷、封建迷信等非法网站（包括各类侵犯版权的网站）的接入！私自接入将冻结账户，如有代收款没有提现将不予提现，有疑问请联系平台客服');
	var cookietime = new Date(); 
	cookietime.setTime(cookietime.getTime() + (10*60*1000));
	$.cookie('zero_play', false, { expires: cookietime });
}

</script>
<!---------------------------------------------------额度套餐 开始------------------------------------------------------------>
<script type="text/javascript">
function duihuan(e){
		  	var d = $(e).val();
		  	var ii = layer.load(2, {shade:[0.1,'#fff']});
          window.location.href="edtaocan.php?tcid="+d
	  	
}
</script>
<div class="modal fade" align="left" id="edtc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">额度套餐</h4>
      </div>
		<tbody>
		<tr>
         <div class="modal-body">
<div class="panel panel-primary">
	  <table class="table table-bordered">
		<tbody>
		<tr>
    
	<td align="center"><div class="form-group">
		<label>选择你要充值的套餐包:</label><br></label><br><select class="form-control" name="duihuan"  id="duihuan" onchange="duihuan(this);">
		<option value="1">请选择要充值的套餐</option>
		<option value="1">套餐一：<?php echo $conf['edtc1jg']?>元充值<?php echo $conf['edtc1ed']?>软件额度</option>
		<option value="2">套餐二：<?php echo $conf['edtc2jg']?>元充值<?php echo $conf['edtc2ed']?>软件额度</option>
		<option value="3">套餐三：<?php echo $conf['edtc3jg']?>元充值<?php echo $conf['edtc3ed']?>软件额度</option>
		<option value="4">套餐四：<?php echo $conf['edtc4jg']?>元充值<?php echo $conf['edtc4ed']?>软件额度</option>
		</select>
		</div>
			</td>
		</tr>
		</tbody>
		</table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

<!---------------------------------------------------额度套餐 结束------------------------------------------------------------>
<!---------------------------------------------------充值额度 开始------------------------------------------------------------>
<div class="modal fade" align="left" id="czed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">充值额度</h4>
      </div>
		<tbody>
		<tr>
		<tr>
		<div class="panel panel-info">
		<div class="panel-body">
            <h4 class="modal-title" id="">1元充值<?php echo $conf['edczbl']; ?>软件额度 需要多少冲多少 </h4>
   
        <form name="alipayment" action="payapi.php" method="get" target="_blank">
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">充值帐号</div>
			<input type="text" name="WIDsubject" value="充值额度|<?php echo $pid?>" class="form-control" required/>
		  </div></div>
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">充值金额</div>
			<input type="text" name="WIDtotal_fee" value="" class="form-control" required/>
		  </div></div>
		  <dd>
          <label><input type="radio" name="type" value="alipay" checked=""><img src="/assets/img/alipay.gif" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="支付宝"/></label> <label><input type="radio" name="type" value="qqpay"><img src="/assets/img/qqpay.jpg" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="QQ钱包"/></label> <label><input type="radio" name="type" value="wxpay"><img src="/assets/img/weixin.gif" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="微信支付"/></label>
          </dd>
					<button class="btn btn-block btn-info" type="submit">确 认 充 值</button>
	    </form>
		</div>
      </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
               </div>

      </div>
    </div>
  </div>


<!---------------------------------------------------充值额度 结束------------------------------------------------------------>
<!---------------------------------------------------转让额度 开始------------------------------------------------------------>
<div class="modal fade" align="left" id="edzz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">额度转让</h4>
      </div>
		<tbody>
		<tr>
		<tr>
		<div class="panel panel-info">
		<div class="panel-body">
            <h4 class="modal-title" id="">将你账户下的软件额度转账给其他商户</h4>
   
        <form name="alipayment" action="edzr.php" method="get" target="_blank">
          		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">转出商户</div>
			<input type="text" name="zcpid" value="<?php echo $pid?>" class="form-control" required/>
		  </div></div>
               		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">转出秘钥</div>
			<input type="text" name="zckey" value="<?php echo authcode($userrow['key'], 'DECODE', $conf['KEY']);?>" class="form-control" required/>
		  </div></div>
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">转入商户</div>
			<input type="text" name="srpid" value="" class="form-control" required/>
		  </div></div>
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">转出额度</div>
			<input type="text" name="zzed" value="" class="form-control" required/>
		  </div></div>
	
					<button class="btn btn-block btn-info" type="submit">确 认 转 账</button>
	    </form>
		</div>
      </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
               </div>
         </div>
    </div>
  </div>


<!---------------------------------------------------转让额度 结束------------------------------------------------------------>

  <!-- content start --> 
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
<label for="file"></label><input type="file" accept="image/*" multiple>
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
<button type="sumbit" class="btn btn-primary btn-block" onclick="add_qr();">确定添加</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
 <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">用户中心</h1>
<marquee scrollamount="8" direction="left" align="Middle" style="font-weight: bold;line-height: 20px;font-size: 20px;color: #FF0000;"><?php echo $conf['gonggao']?></marquee></div>
	  <div class="row">
                    <div class="wrapper">
                        <div class="col-lg-4 col-md-6">
                            <div class="panel b-a">
                                <div class="panel-heading bg-info dk no-border wrapper-lg"></div>
                                <div class="text-center m-b clearfix">
                                    <div class="thumb-lg avatar m-t-n-xl">
                                        <img alt="image" class="b b-3x b-white" src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $userrow['qq']?>&spec=100">
                                    </div>
                                    <div class="h4 font-thin m-t-sm"><?php echo $userrow['qq']?></div>
                                    <span class="text-muted text-xs block">商户ID:<?php echo $pid?></span>
                                </div>
                                  <li class="list-group-item">
                                    <span class="badge bg-info"><?php echo authcode($userrow['key'], 'DECODE', $conf['KEY']);?></span>
                                    <i class="fa fa-asterisk fa-fw text-muted"></i> 商户密钥</li>
                          <li class="list-group-item">
                                  <a href="#" data-toggle="modal" data-target="#edzz" id="edzz" class="badge bg-info"><span class="badge btn-danger btn-xs">额度转账</span> </A>
                    <i class="fa fa-jpy fa-fw text-muted"></i> 
                                   <a href="#" data-toggle="modal" data-target="#edtc" id="edtc" class="badge bg-info"><span class="badge btn-danger btn-xs">额度套餐</span> </A>
                    <i class="fa fa-jpy fa-fw text-muted"></i> 
                                   <a href="#" data-toggle="modal" data-target="#czed" id="czed" class="badge bg-info"><span class="badge btn-danger btn-xs">充值额度</span> </A>
                                    当前软件版额度：￥<?php echo $userrow['paymb']?>
                           
                          
                                 
                                
                                </ul>
                                  <div>
                                </div>
                            </div>

                          		
		<div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">在线测试（使用当前登录的商户进行测试）</h3></div>
		<div class="panel-body">
        <form name="alipayment" action="./SDK/epayapi.php" method="post" target="_blank">
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">商品名称</div>
			<input type="text" name="WIDsubject" value="测试商品" class="form-control" required/>
		  </div></div>
		  <div class="form-group">
			<div class="input-group"><div class="input-group-addon">付款金额</div>
			<input type="text" name="WIDtotal_fee" value="1.00" class="form-control" required/>
		  </div></div>
		  <dd>
          <label><input type="radio" name="type" value="alipay" checked=""><img src="/assets/img/alipay.gif" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="支付宝"/></label> <label><input type="radio" name="type" value="qqpay"><img src="/assets/img/qqpay.jpg" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="QQ钱包"/></label> <label><input type="radio" name="type" value="wxpay"><img src="/assets/img/weixin.gif" style="max-width: 47.5%;display:inline-block;vertical-align:middle;" title="微信支付"/></label>
          </dd>
					<button class="btn btn-block btn-info" type="submit">确 认</button>
	    </form>
		</div>
      </div>
              </div>
                        </div>
                        	 <div class="col-lg-4 col-md-6">
          <div class="row row-sm text-center">
            <div class="col-xs-6">
              <div class="panel padder-v item">
                <div class="h1 text-info font-thin h1"><?php echo $orders?>个</div>
                <span class="text-muted text-xs">订单总数</span>
                <div class="top text-right w-full">
                  <i class="fa fa-caret-down text-warning m-r-sm"></i>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">￥<?php echo $settle_money?sprintf("%.2f",$settle_money):'0.00'?></span>
                <span class="text-muted text-xs">总收入数</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-caret-down text-muted m-r-sm"></i>
                </span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="block panel padder-v bg-info item">
                <span class="text-white font-thin h1 block">￥<?php echo $order_today?sprintf("%.2f",$order_today):'0.00'?></span>
                <span class="text-muted text-xs">今日收入</span>
                <span class="top">
                  <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
                </span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="panel padder-v item">
                <div class="font-thin h1">￥<?php echo $order_lastday?sprintf("%.2f",$order_lastday):'0.00'?></div>
                <span class="text-muted text-xs">昨日收入</span>
                <div class="bottom">
                  <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
                </div>
              </div>
            </div>
            <div class="col-xs-12 m-b-md">
              <div class="r bg-light dker item">
	  <table class="table table-bordered">
		<tbody>
		<tr>
			<td align="center"><font color="#808080">支付宝通道：<?php echo ($userrow['ali_login']>=time())?'√监控正常':'X监控异常';?></i></font></td>
			<td align="center"><font color="#808080">Q  Q通道：<?php echo ($userrow['qq_login']>=time())?'√监控正常':'X监控异常';?></font></td>
			<td align="center"><font color="#808080">微  信通道：<?php echo ($userrow['wx_login']>=time())?'√监控正常':'X监控异常';?></font></td>
		</tr>
		</tbody>
		</table>
                </div>
              </div>
            </div>
          </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading font-bold">平台公告</h3></div>
		<div class="panel-body">
		<h5 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
		<div class="form-group">问:为什么我没有额度？<br>
		答:完成实名认证自动赠送额度(<a href="userinfo.php" class="btn btn-xs btn-info"><span class="am-icon-pencil-square-o"><span class="am-icon-pencil-square-o">点此认证</span></a>)<br></h5>
		    <h5 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
		问:为什么监控配置不正确？<br>
		答:首先配置"支付设置"里面的支付时间,然后设置监控地址的监控周期即可<br></h5>
		<h5 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
		问:什么是云端支付？<br>
		答:使用cookie进行监控个人，支付宝，QQ钱包账单，有收款并通知平台<br></h5>
		<h5 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
		问:云端支付是否安全？<br>
		答:大可以放心,云端无任何获取支付密码的机构,无法对您的资金进行操作<br></h5>
		<h5 class="list-group-item"><span class="pull-right"> </span><em class="fa fa-fw fa-volume-up mr"></em>
		问:如何配置软件？<br>
		答:下载软件(<a href="/user/down.php" class="btn btn-xs btn-info"><span class="am-icon-pencil-square-o"><span class="am-icon-pencil-square-o">点此下载软件</span></a>)->登录软件->配置软件->上传收款二维码->完成<br></h5>
		</div>
      </div>
		</div>
</footer>
	</div>
    </div>
  </div>
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
                images_upload(this.files)
            });
        });
        var images_upload = function(files) {
            var flag = 0;
            $('textarea').empty();
            $(files).each(function(key, value) {
                $('#pic_url').val('上传中');
                $('#qr_url').val('识别中');
                image_form = new FormData();
                image_form.append('file', value);
              	console.log(image_form);
                $.ajax({
                    url: 'https://api.yum6.cn/sinaimg.php?type=multipart',
                    type: 'POST',
                    data: image_form,
                    mimeType: 'multipart/form-data',
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {
                        flag++;
                        if (typeof data.pid != 'undefined') {
                            $('#pic_url').val('https://ww1.sinaimg.cn/large/'+data.pid + '.jpg\n');
							$.post('?qrcode=https://ww1.sinaimg.cn/large/'+data.pid + '.jpg\n','',function(qr_url){//二维码解码
							$('#qr_url').val(qr_url);
							},"html");
                           // $('.mselector > button')[0].innerHTML = '成功 ' + flag + '/' + files.length;
                          //  var apc = "<img src='https://ww1.sinaimg.cn/large/" + data.pid + ".jpg'><p>https://ww1.sinaimg.cn/large/" + data.pid + ".jpg</p><br>";
                        } else {
                          // $('#pic_url').val('第' + flag + '张上传失败');
                        } if (flag == $("input[type='file']")[0].files.length) {
                            if (typeof data.pid != 'undefined') {
                              //  $('#pic_url').val('上传成功');
                            } else {
                                $('#pic_url').val('上传失败');
                               // $('#pic_url').val(data.error_msg + '\n');
                                alert(data.error_msg)
                            }
                        }
                    },
                    error: function(XMLResponse) {
                        alert("error:" + XMLResponse.responseText)
                    }
                })
            })
        };	
  </script>
<?php include 'foot.php';?>