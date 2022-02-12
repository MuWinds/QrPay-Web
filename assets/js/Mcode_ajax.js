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
function login(){//商户登录
        var pid= $("#pid").val();  
        var pass= $("#pass").val();  
        var openid= $("#openid").val();
		var geetest_challenge=$("input[name='geetest_challenge']").val();
		var geetest_validate=$("input[name='geetest_validate']").val();
		var geetest_seccode=$("input[name='geetest_seccode']").val();
		  	var ii = layer.load(3, {shade:[0.1,'#fff']});
		  	$.ajax({
				type : "POST",
				url : "ajax.php?act=login",
			data : {"pid":pid,"pass":pass,"openid":openid,"geetest_challenge":geetest_challenge,"geetest_validate":geetest_validate,"geetest_seccode":geetest_seccode},
				dataType : 'json',
				success : function(data) {					  
					  layer.close(ii);
					  layer.msg(data.msg);
					  if(data.code==1){
						setTimeout(function () {
							location.href="./";
						}, 1000); //延时1秒跳转
					  }
				},
				error:function(data){
					layer.close(ii);
					layer.msg('服务器错误');
					}
			});
		  	
}
function reg(){//商户注册 
        var pass= $("#pass").val();  
        var qq= $("#qq").val(); 
        var code= $("#code").val();    
		var geetest_challenge=$("input[name='geetest_challenge']").val();
		var geetest_validate=$("input[name='geetest_validate']").val();
		var geetest_seccode=$("input[name='geetest_seccode']").val();
		  	var ii = layer.load(3, {shade:[0.1,'#fff']});
		  	$.ajax({
				type : "POST",
				url : "ajax.php?act=reg",
				data : {"pass":pass,"qq":qq,"code":code,"geetest_challenge":geetest_challenge,"geetest_validate":geetest_validate,"geetest_seccode":geetest_seccode},
				dataType : 'json',
				success : function(data) {					  
					  layer.close(ii);
					  layer.msg(data.msg);
					  if(data.code==1){
						setTimeout(function () {
							location.href="./";
						}, 1000); //延时1秒跳转
					  }
				},
				error:function(data){
					layer.close(ii);
					layer.msg('服务器错误');
					}
			});
		  	
}

	$("#editSettle").click(function(){//修改商户信息
        var qq= $("#qq").val(); 
        var pass= $("#pass").val(); 
        var outtime= $("#outtime").val(); 
        var repeat= $("#repeat").val(); 
		if(qq=='' || pass=='' || repeat==''){layer.alert('请确保各项不能为空！');return false;}
		var ii = layer.load(3, {shade:[0.1,'#fff']});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=edit",
			data : {qq:qq,pass:pass,outtime:outtime,repeat:repeat},
			dataType : 'json',
			success : function(data) {
				layer.close(ii);
				layer.alert(data.msg);
			}
		});
	});	
	$("#smrz").click(function(){//实名认证
        var account= $("#account").val();  
        var username= $("#username").val(); 
        var cardNo= $("#cardNo").val(); 
		if(account=='' || username=='' || cardNo==''){layer.alert('请确保各项不能为空！');return false;}
		var ii = layer.load(3, {shade:[0.1,'#fff']});
		$.ajax({
			type : "POST",
			url : "ajax.php?act=smrz",
			data : {account:account,username:username,cardNo:cardNo},
			dataType : 'json',
			success : function(data) {
				layer.close(ii);
				layer.alert(data.msg);
			}
		});
	});
function add_qr(){//添加二维码
        var pic_url= $("#pic_url").val();  
        var qr_url= $("#qr_url").val();  
        var type= $("#type").val(); 
        var money= $("#money").val(); 
		  	var ii = layer.load(3, {shade:[0.1,'#fff']});
		  	$.ajax({
				type : "POST",
				url : "ajax.php?act=add_qr",
				data : {"pic_url":pic_url,"qr_url":qr_url,"type":type,"money":money},
				dataType : 'json',
				success : function(data) {					  
					  layer.close(ii);
					  layer.msg(data.msg);
						setTimeout(function () {
						    	location.reload();
							//location.href="./software.php";
						}, 2000); //延时2秒跳转
					  
					  /*if(data.code!=1){
						 setTimeout(function () {
								$('#ADD_QR').modal({
								keyboard: true
							});
						}, 3000); //延时1秒跳转
					  }*/
				},
				error:function(data){
					layer.close(ii);
					layer.msg('服务器错误');
					}
			});
		  	
}
function add_qr1(){//添加二维码
        var pic_url= $("#pic_url").val();  
        var qr_url= $("#qr_url").val();  
        var type= $("#type").val(); 
        var money= $("#money").val(); 
		  	var ii = layer.load(3, {shade:[0.1,'#fff']});
		  	$.ajax({
				type : "POST",
				url : "ajax.php?act=add_qr1",
				data : {"pic_url":pic_url,"qr_url":qr_url,"type":type,"money":money},
				dataType : 'json',
				success : function(data) {					  
					  layer.close(ii);
					  layer.msg(data.msg);
						setTimeout(function () {
						    	location.reload();
							//location.href="./software.php";
						}, 2000); //延时2秒跳转
					  
					  /*if(data.code!=1){
						 setTimeout(function () {
								$('#ADD_QR').modal({
								keyboard: true
							});
						}, 3000); //延时1秒跳转
					  }*/
				},
				error:function(data){
					layer.close(ii);
					layer.msg('服务器错误');
					}
			});
		  	
}
function edit_qr(id){//编辑二维码
	layer.alert('无法编辑,请删除了重新上传');
}
function dell_qr(id){//删除二维码
        var id= id; 
		  	var ii = layer.load(2, {shade:[0.1,'#fff']});
		  	$.ajax({
				type : "POST",
				url : "ajax.php?act=dell_qr",
				data : {"id":id},
				dataType : 'json',
				success : function(data) {					  
					  layer.close(ii);
					  layer.msg(data.msg);
					  if(data.code==1){
						setTimeout(function () {
						    
						    	location.reload();
						//	location.href="./software.php";
						}, 2000); //延时1秒跳转
					  }
				},
				error:function(data){
					layer.close(ii);
					layer.msg('服务器错误');
					}
			});
		  	
}
function supp_order(out_trade_no,trade_no){//漏单补单 
		  	var ii = layer.load(3, {shade:[0.1,'#fff']});
		  	$.ajax({
				type : "POST",
				url : "ajax.php?act=supp_order",
				data : {"out_trade_no":out_trade_no,"trade_no":trade_no},
				dataType : 'json',
				success : function(data) {					  
					  layer.close(ii);
					  layer.msg(data.msg);
					 /* if(data.code==1){
						setTimeout(function () {
							location.href="./";
						}, 1000); //延时1秒跳转
					  }*/
				},
				error:function(data){
					layer.close(ii);
					layer.msg('服务器错误');
					}
			});
		  	
}