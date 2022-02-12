<?php
include("../core/common.php");
$title='系统配置';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
	<div class="container" style="padding-top:70px;">
    <div class="col-md-12 center-block" style="float: none;">
<?php
$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='site_n'){
	saveSetting('sitename',$_POST['sitename']);
	saveSetting('title',$_POST['title']);
	saveSetting('keywords',$_POST['keywords']);
	saveSetting('description',$_POST['description']);
	saveSetting('qq',$_POST['qq']);
	saveSetting('qq_qun',$_POST['qq_qun']);
	saveSetting('zero_pid',$_POST['zero_pid']);
	saveSetting('zero_key',$_POST['zero_key']);
	saveSetting('admin_user',$_POST['admin_user']);
	saveSetting('admin_pass',$_POST['admin_pass']);

    saveSetting('edczbl',$_POST['edczbl']);
    saveSetting('huiyuan',$_POST['huiyuan']);
    saveSetting('huiyuan1',$_POST['huiyuan1']);
    saveSetting('huiyuan2',$_POST['huiyuan2']);
    saveSetting('huiyuan3',$_POST['huiyuan3']);
    saveSetting('gjclj',$_POST['gjclj']);
    saveSetting('zczsed',$_POST['zczsed']);
  
  
  
	$ad=$CACHE->clear();
	if($ad)showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='site'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站基本配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=site_n" method="POST" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="sitename" value="<?php echo $conf['sitename']; ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">标题栏后缀</label>
	  <div class="col-sm-10"><input type="text" name="title" value="<?php echo $conf['title']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" value="<?php echo $conf['keywords']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站描述</label>
	  <div class="col-sm-10"><input type="text" name="description" value="<?php echo $conf['description']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">客服ＱＱ</label>
	  <div class="col-sm-10"><input type="text" name="qq" value="<?php echo $conf['qq']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">官方QQ群</label>
	  <div class="col-sm-10"><input type="text" name="qq_qun" value="<?php echo $conf['qq_qun']; ?>" class="form-control"/></div>
	</div><br/>
            	<div class="form-group">
	  <label class="col-sm-2 control-label">注册赠送额度</label>
	  <div class="col-sm-10"><input type="text" name="zczsed" value="<?php echo $conf['zczsed']; ?>" class="form-control"/><pre><font color="green">不赠送就填写0</font></pre></div>
	</div><br/>
        	<div class="form-group">
	  <label class="col-sm-2 control-label">额度充值比例</label>
	  <div class="col-sm-10"><input type="text" name="edczbl" value="<?php echo $conf['edczbl']; ?>" class="form-control"/><pre><font color="green">设置1元充值多少额度，输入100则代表1元充值100元软件额度</font></pre></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">全局充值会员价格·必须</label>
	  <div class="col-sm-10"><input type="text" name="huiyuan" value="<?php echo $conf['huiyuan']; ?>" class="form-control"/><pre><font color="green">用2678400除于你要[多少元]一个月，得出来的数字填进去实际情况必须跟规格符合</font></pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">充值会员月规格</label>
	  <div class="col-sm-10"><input type="text" name="huiyuan1" value="<?php echo $conf['huiyuan1']; ?>" class="form-control"/><pre><font color="green">网站显示多少钱一个月 只作网站显示跟收款金额实际到账天数为全局设置的</font></pre></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">充值会员季规格</label>
	  <div class="col-sm-10"><input type="text" name="huiyuan2" value="<?php echo $conf['huiyuan2']; ?>" class="form-control"/><pre><font color="green">网站显示多少钱一个季 只作网站显示跟收款金额实际到账天数为全局设置的</font></pre></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">充值会员年规格</label>
	  <div class="col-sm-10"><input type="text" name="huiyuan3" value="<?php echo $conf['huiyuan3']; ?>" class="form-control"/><pre><font color="green">网站显示多少钱一年 只作网站显示跟收款金额实际到账天数为全局设置的</font></pre></div>
	</div><br/>
			<div class="form-group">
	  <label class="col-sm-2 control-label">商品关键词拦截</label>
	  <div class="col-sm-10"><input type="text" name="gjclj" value="<?php echo $conf['gjclj']; ?>" class="form-control"/><pre><font color="green">商品关键词拦截 |分开 </font></pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">收款商户PID</label>
	  <div class="col-sm-10"><input type="text" name="zero_pid" value="<?php echo $conf['zero_pid']; ?>" class="form-control"/><pre><font color="green">当前网站前台商户，用于商户额度充值收款使用，上传二维码默认使用码支付收款，不上传二维码用对接的易支付收款</font></pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">收款商户KEY</label>
	  <div class="col-sm-10"><input type="text" name="zero_key" value="<?php echo $conf['zero_key']; ?>" class="form-control"/><pre><font color="green">当前网站前台商户，用于商户额度充值收款使用，上传二维码默认使用码支付收款，不上传二维码用对接的易支付收款</font></pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">后台帐号</label>
	  <div class="col-sm-10"><input type="text" name="admin_user" value="<?php echo $conf['admin_user']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">后台密码 </label>
	  <div class="col-sm-10"><input type="text" name="admin_pass" value="<?php echo $conf['admin_pass']; ?>" class="form-control"/><pre><font color="green">此密码与微信免挂软件通知地址adminkey同步 否则不能回调</font></pre></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}elseif($mod=='gonggao_n'){
	saveSetting('gonggao',$_POST['gonggao']);
	saveSetting('gong',$_POST['gong']);
	$ad=$CACHE->clear();
	if($ad)showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='gonggao'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站公告配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=gonggao_n" method="POST" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页通知公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="gonggao" rows="6"><?php echo htmlspecialchars($conf['gonggao']);?></textarea></div>
	  <div class="panel-body">
	  	<div class="form-group">
	  <label class="col-sm-2 control-label">弹窗公告</label>
	  <div class="col-sm-10"><textarea class="form-control" name="gong" rows="6"><?php echo htmlspecialchars($conf['gong']);?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}elseif($mod=='else_n'){
	saveSetting('local_domain',$_POST['local_domain']);
	saveSetting('haoservice_key',$_POST['haoservice_key']);
	saveSetting('qrcode_key',$_POST['qrcode_key']);
	saveSetting('qqjump',$_POST['qqjump']);
	saveSetting('qqcheck',$_POST['qqcheck']);
	saveSetting('captcha_open',$_POST['captcha_open']);
	saveSetting('captcha_id',$_POST['captcha_id']);
	saveSetting('captcha_key',$_POST['captcha_key']);
	$ad=$CACHE->clear();
	if($ad)showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='else'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">其他功能配置</div></h3>
<div class="panel-body">
  <form action="./set.php?mod=else_n" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
	  <label class="col-sm-2 control-label">本站域名</label>
	  <div class="col-sm-10"><input type="text" name="local_domain" value="<?php echo $conf['local_domain']; ?>" class="form-control" placeholder=""/>
	<pre><font color="green">不用带http://.../</font></pre></div>
	</div><br/>

	<div class="form-group">
	  <label class="col-sm-2 control-label">QQ打开跳转浏览器</label>
	  <div class="col-sm-10"><select class="form-control" name="qqjump" default="<?php echo $conf['qqjump']?>"><option value="0">关闭</option><option value="1">开启</option></select></div>
	</div><br/>

	<div class="form-group">
	  <label class="col-sm-2 control-label">开启滑动验证码</label>
	  <div class="col-sm-10"><select class="form-control" name="captcha_open" default="<?php echo $conf['captcha_open']?>"><option value="0">关闭</option><option value="1">开启</option></select><pre><font color="green">用于登录,注册等等 </font></pre></div>
	</div><br/>
<?php 	echo '<div id="captcha_frame" style="';
echo ($conf['captcha_open']==0 ? 'display:none;' : 'NULL');
echo '">';?>
<script>
$("select[name=\'captcha_open\']").change(function(){
	if($(this).val() == 1){
		$("#captcha_frame").css("display","inherit");
	}else{
		$("#captcha_frame").css("display","none");
	}
});
</script>
	<div class="form-group">
	  <label class="col-sm-2 control-label">极限验证码ID</label>
	  <div class="col-sm-10"><input type="text" name="captcha_id" value="<?php echo $conf['captcha_id']?>" class="form-control"/></div>
	</div>
	<div class="form-group">
	  <label class="col-sm-2 control-label">极限验证码KEY</label>
	  <div class="col-sm-10"><input type="text" name="captcha_key" value="<?php echo $conf['captcha_key']?>" class="form-control"/>
	  <pre><a href="http://www.geetest.com/apply.html" rel="noreferrer" target="_blank">注册极限验证码</a></pre></div>
	</div><br/>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}elseif($mod=='mail_n'){
	saveSetting('mail_smtp',$_POST['mail_smtp']);
	saveSetting('mail_port',$_POST['mail_port']);
	saveSetting('mail_name',$_POST['mail_name']);
	saveSetting('mail_pwd',$_POST['mail_pwd']);
	$ad=$CACHE->clear();
	if($ad)showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='mail'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">发件邮箱配置</div></h3>
<div class="panel-body">
  <form action="./set.php?mod=mail_n" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
	  <label class="col-sm-2 control-label">邮箱SMTP地址</label>
	  <div class="col-sm-10"><input type="text" name="mail_smtp" value="<?php echo $conf['mail_smtp']; ?>" class="form-control" placeholder=""/></div>
	</div><br/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">邮箱SMTP端口</label>
	  <div class="col-sm-10"><input type="text" name="mail_port" value="<?php echo $conf['mail_port']; ?>" class="form-control" placeholder=""/>
	<pre><font color="green">其他端口如果不行的请填写端口：465</font></pre></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱账号</label>
	  <div class="col-sm-10"><input type="text" name="mail_name" value="<?php echo $conf['mail_name']; ?>" class="form-control"/></div>
		</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱密码（授权码）</label>
	  <div class="col-sm-10"><input type="text" name="mail_pwd" value="<?php echo $conf['mail_pwd']; ?>" class="form-control"/></div>
		</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}elseif($mod=='defend_n'){
	$defendid=$_POST['defendid'];
	$file="<?php\r\n//防CC模块设置\r\ndefine('CC_Defender', ".$defendid.");\r\n?>";
	if(file_put_contents(SYSTEM_ROOT.'base.php',$file))showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='defend'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">防CC模块设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=defend_n" method="post" class="form-horizontal" role="form">
  <!--input type="hidden" name="do" value="submit"/-->
    <div class="form-group">
	  <label class="col-sm-2 control-label">CC防护等级</label>
	  <div class="col-sm-10"><select class="form-control" name="defendid" default="<?php echo CC_Defender;?>">
	  <option value="0">关闭</option>
	  <option value="1">低(推荐)</option>
	  <option value="2">中</option>
	  <option value="3">高</option>
	  </select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>CC防护说明<br/>
高：全局使用防CC，会影响网站APP和对接软件的正常使用<br/>
中：会影响搜索引擎的收录，建议仅在正在受到CC攻击且防御不佳时开启<br/>
低：用户首次访问进行验证（推荐）<br/>
</div>
</div>
<?php
}elseif($mod=='template_n'){
	$template=$_POST['template'];
	$cdnserver=$_POST['cdnserver'];
	if (Template::exists($template)==false) {
		showmsg('该模板首页文件不存在！',3);
	}
	saveSetting('template',$template);
	saveSetting('cdnserver',$cdnserver);
	$ad=$CACHE->clear();
	if($ad)showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='template'){
	$mblist=Template::getList();
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">首页模板设置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=template_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">选择模板</label>
	  <?php echo'<div class="col-sm-10"><select class="form-control" name="template" default="';
echo $conf['template'];
echo '">
	  ';
foreach($mblist as $row){echo '<option value="'.$row.'">'.$row.'</option>';
}echo '	  </select></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">静态资源CDN</label>
	  <div class="col-sm-10"><select class="form-control" name="cdnserver" default="';
echo $conf['cdnserver'];
echo '">';?>
	  <option value="0">关闭</option>
	  <option value="1">CDN一号</option>
	  </select></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
<div class="panel-footer">
<span class="glyphicon glyphicon-info-sign"></span>
网站模板对应template目录里面的名称，会自动获取
</div>
</div>
<?php
}elseif($mod=='pay_n'){
	saveSetting('money_rate',$_POST['money_rate']);
	saveSetting('block_account',$_POST['block_account']);
	
	saveSetting('transfer_type',$_POST['transfer_type']);
	saveSetting('app_id',$_POST['app_id']);
	saveSetting('alipay_public_key',$_POST['alipay_public_key']);
	saveSetting('merchant_private_key',$_POST['merchant_private_key']);
	
	saveSetting('alipay_api',trim($_POST['alipay_api']));
    saveSetting('alipay_pid',trim($_POST['alipay_pid']));
    saveSetting('alipay_key',trim($_POST['alipay_key']));
    saveSetting('alipay_eurl',trim($_POST['alipay_eurl']));
    saveSetting('alipay_epid',trim($_POST['alipay_epid']));
    saveSetting('alipay_ekey',trim($_POST['alipay_ekey']));
    saveSetting('alipay2_api',trim($_POST['alipay2_api']));
	
    
    saveSetting('qqpay_api',trim($_POST['qqpay_api']));
    saveSetting('qqpay_pid',trim($_POST['qqpay_pid']));
    saveSetting('qqpay_subid',trim($_POST['qqpay_subid']));
    saveSetting('qqpay_key',trim($_POST['qqpay_key']));
    saveSetting('qqpay_eurl',trim($_POST['qqpay_eurl']));
    saveSetting('qqpay_epid',trim($_POST['qqpay_epid']));
    saveSetting('qqpay_ekey',trim($_POST['qqpay_ekey']));
	
	
    saveSetting('wxpay_api',trim($_POST['wxpay_api']));
    saveSetting('wxpay_pid',trim($_POST['wxpay_pid']));
    saveSetting('wxpay_subid',trim($_POST['wxpay_subid']));
    saveSetting('wxpay_key',trim($_POST['wxpay_key']));
    saveSetting('wxpay_eurl',trim($_POST['wxpay_eurl']));
    saveSetting('wxpay_epid',trim($_POST['wxpay_epid']));
    saveSetting('wxpay_ekey',trim($_POST['wxpay_ekey']));
	$ad=$CACHE->clear();
	if($ad)showmsg('<blockquote class="blockquote mb-10">修改成功！</blockquote>',1);
	else showmsg('<blockquote class="blockquote mb-10">修改失败！<br/>'.$DB->errorCode().'</blockquote>',4);
}elseif($mod=='pay'){
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">易支付接口对接设置</h3></div>
<div class="panel-body">';
echo '<form action="./set.php?mod=pay_n" class="form-horizontal" method="POST">
		<div class="form-group">
	  <label class="col-sm-2 control-label">分润比例（百分数）</label>
	  <div class="col-sm-10"><input type="text" name="money_rate" value="'.$conf['money_rate'].'" class="form-control"/>
	
	<div class="form-group">
	  <label class="col-sm-2 control-label">拉黑支付宝账号</label>
	  <div class="col-sm-10"><input type="text" name="block_account" value="'.$conf['block_account'].'" class="form-control"/><pre><font color="green">用“|”隔开,填写则绑定这些支付宝账号的商户无法使用本站</font></pre>
	
	<div class="form-group">
		<label class="col-lg-3 control-label">支付宝代收款</label>
		<div class="col-lg-8">
			<select class="form-control" name="alipay_api" default="';
                        echo $conf['alipay_api'];
                        echo '">';
						if($conf['alipay_api']==0){
						echo '<option value="0">关闭</option>
					
						<option value="2">易支付免签约接口</option>
						</select>';
						}elseif($conf['alipay_api']==1){
						echo '
						<option value="2">易支付免签约接口</option>
						<option value="0">关闭</option></select>';
						}elseif($conf['alipay_api']==2){
						echo '<option value="2">易支付免签约接口</option>
						<option value="0">关闭</option></select>';
						}elseif($conf['alipay_api']==3){
						echo '
						<option value="2">易支付免签约接口</option>

						<option value="0">关闭</option></select>';
						}
		echo '<pre id="payapi_06"  style="';
                        if ($conf['alipay_api'] != 3) {
                            echo 'display:none;';
                        }
                        echo '">
		</div>
	</div>
	<div id="payapi_01" style="';
                        if ($conf['alipay_api'] != 1) {
                            echo 'display:none;';
                        }
                        echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">合作者身份(PID)</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_pid" class="form-control" value="';
                        echo $conf['alipay_pid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">安全校验码(Key)</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_key" class="form-control" value="';
                        echo $conf['alipay_key'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">支付宝手机网站支付</label>
		<div class="col-lg-8">
			<select class="form-control" name="alipay2_api" default="';
                        echo $conf['alipay2_api'];
                        echo '">';
						if($conf['alipay2_api']==0){
						echo '<option value="0">关闭</option>
						<option value="1">支付宝手机网站支付接口</option>
						</select>';
						}else{
						echo '<option value="1">支付宝手机网站支付接口</option>
						<option value="0">关闭</option>
						</select>';
						}
			 echo '<pre id="payapi_02"  style="';
                        if ($conf['alipay2_api'] != 1) {
                            echo 'display:none;';
                        }
                        echo '">相关信息与以上支付宝即时到账接口一致，开启前请确保已开通支付宝手机支付，否则会导致手机用户无法支付！</pre>
		</div>
	</div>
	</div>
	<div id="payapi_08" style="';
                        if ($conf['alipay_api'] != 2) {
                            echo 'display:none;';
                        }
                        echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付地址</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_eurl" class="form-control" value="';
                        echo $conf['alipay_eurl'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付Pid</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_epid" class="form-control" value="';
                        echo $conf['alipay_epid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付Key</label>
		<div class="col-lg-8">
			<input type="text" name="alipay_ekey" class="form-control" value="';
                        echo $conf['alipay_ekey'];
                        echo '">
		</div>
	</div>
	</div>
	
	
	
	
	
	
	
	
	<div class="form-group">
		<label class="col-lg-3 control-label">QQ钱包支付接口</label>
		<div class="col-lg-8">
			<select class="form-control" name="qqpay_api" default="';
                        echo $conf['qqpay_api'];
                        echo '">';
						if($conf['qqpay_api']==0){
						echo '<option value="0">关闭</option>

						<option value="2">易支付免签约接口</option></select>';
						}elseif($conf['qqpay_api']==1){
						echo '
						<option value="2">易支付免签约接口</option>
						<option value="0">关闭</option></select>';
						}elseif($conf['qqpay_api']==2){
						echo '<option value="2">易支付免签约接口</option>
					
						<option value="0">关闭</option></select>';
						}
		echo '<pre id="payapi_05" style="';
                        if ($conf['qqpay_api'] != 1) {
                            echo 'display:none;';
                        }
                        echo '">
		</div>
	</div>
						<!--/div>
						</div>
	<div id="payapi_05" style="';
                        if ($conf['qqpay_api'] != 1) {
                            echo 'display:none;';
                        }
                        echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">QQ钱包商户号</label>
		<div class="col-lg-8">
			<input type="text" name="qqpay_pid" class="form-control" value="';
                        echo $conf['qqpay_pid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">子商户号</label>
		<div class="col-lg-8">
			<input type="text" name="qqpay_subid" class="form-control" value="';
                        echo $conf['qqpay_subid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">API密钥</label>
		<div class="col-lg-8">
			<input type="text" name="qqpay_key" class="form-control" value="';
                        echo $conf['qqpay_key'];
                        echo '">
		</div>
	</div>
	</div-->
	<div id="payapi_09" style="';
                        if ($conf['qqpay_api'] != 2) {
                            echo 'display:none;';
                        }
                        echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付地址</label>
		<div class="col-lg-8">
			<input type="text" name="qqpay_eurl" class="form-control" value="';
                        echo $conf['qqpay_eurl'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付Pid</label>
		<div class="col-lg-8">
			<input type="text" name="qqpay_epid" class="form-control" value="';
                        echo $conf['qqpay_epid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付Key</label>
		<div class="col-lg-8">
			<input type="text" name="qqpay_ekey" class="form-control" value="';
                        echo $conf['qqpay_ekey'];
                        echo '">
		</div>
	</div>
	</div>

	
	
	
	
	
	
	
	
	
	
	
	
	<div class="form-group">
		<label class="col-lg-3 control-label">微信支付接口</label>
		<div class="col-lg-8">
			<select class="form-control" name="wxpay_api" default="';
                        echo $conf['wxpay_api'];
                        echo '">';
						if($conf['wxpay_api']==0){
						echo '<option value="0">关闭</option>
						<option value="2">易支付免签约接口</option></select>';
						}elseif($conf['wxpay_api']==1){
						echo '
						<option value="2">易支付免签约接口</option>
						<option value="0">关闭</option></select>';
						}elseif($conf['wxpay_api']==2){
						echo '<option value="2">易支付免签约接口</option>

						<option value="0">关闭</option></select>';
						}elseif($conf['wxpay_api']==3){
						echo '

						<option value="2">易支付免签约接口</option>
						<option value="0">关闭</option></select>';
						}
		echo '
						<!--/div>
						</div>
			<div id="payapi_04" style="';
                        if ($conf['wxpay_api'] != 1 || $conf['wxpay_api'] != 3) {
                            echo 'display:none;';
                        }
                        echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">微信APPID</label>
		<div class="col-lg-8">
			<input type="text" name="wxpay_pid" class="form-control" value="';
                        echo $conf['wxpay_pid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">微信MCHID</label>
		<div class="col-lg-8">
			<input type="text" name="wxpay_subid" class="form-control" value="';
                        echo $conf['wxpay_subid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">微信Key</label>
		<div class="col-lg-8">
			<input type="text" name="wxpay_key" class="form-control" value="';
                        echo $conf['wxpay_key'];
                        echo '">
		</div>
	</div>
	</div-->
	<pre id="payapi_04"  style="';
                        if ($conf['wxpay_api'] != 1 && $conf['wxpay_api'] != 3) {
                            echo 'display:none;';
                        }
                        echo '"><font color="green">*微信支付接口配置请修改other/wxpay/WxPay.Config.php</font></pre>
		</div>
	</div>
		<div id="payapi_10" style="';
                        if ($conf['wxpay_api'] != 2) {
                            echo 'display:none;';
                        }
                        echo '">
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付地址</label>
		<div class="col-lg-8">
			<input type="text" name="wxpay_eurl" class="form-control" value="';
                        echo $conf['wxpay_eurl'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付Pid</label>
		<div class="col-lg-8">
			<input type="text" name="wxpay_epid" class="form-control" value="';
                        echo $conf['wxpay_epid'];
                        echo '">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">易支付Key</label>
		<div class="col-lg-8">
			<input type="text" name="wxpay_ekey" class="form-control" value="';
                        echo $conf['wxpay_ekey'];
                        echo '">
		</div>
	</div>
	</div>
	';
                        echo '	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<script>
$("select[name=\'alipay_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_01").css("display","inherit");
		$("#payapi_06").css("display","none");
		$("#payapi_08").css("display","none");
	}else if($(this).val() == 2){
		$("#payapi_08").css("display","inherit");
		$("#payapi_01").css("display","none");
		$("#payapi_06").css("display","none");
	}else if($(this).val() == 3){
		$("#payapi_01").css("display","none");
		$("#payapi_06").css("display","inherit");
		$("#payapi_08").css("display","none");
	}else{
		$("#payapi_01").css("display","none");
		$("#payapi_06").css("display","none");
		$("#payapi_08").css("display","none");
	}
});
$("select[name=\'alipay2_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_02").css("display","inherit");
	}else{
		$("#payapi_02").css("display","none");
	}
});
$("select[name=\'qqpay_api\']").change(function(){
	if($(this).val() == 1){
		$("#payapi_05").css("display","inherit");
		$("#payapi_09").css("display","none");
	}else if($(this).val() == 2){
		$("#payapi_09").css("display","inherit");
		$("#payapi_05").css("display","none");
	}else{
		$("#payapi_05").css("display","none");
		$("#payapi_09").css("display","none");
	}
});
$("select[name=\'wxpay_api\']").change(function(){
	if($(this).val() == 1 || $(this).val() == 3){
		$("#payapi_04").css("display","inherit");
		$("#payapi_10").css("display","none");
	}else if($(this).val() == 2){
		$("#payapi_10").css("display","inherit");
		$("#payapi_04").css("display","none");
	}else{
		$("#payapi_04").css("display","none");
		$("#payapi_10").css("display","none");
	}
});
</script>';

}?>
<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
    </div>
<?php 
include './foot.php';
?>