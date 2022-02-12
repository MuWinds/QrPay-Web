	var Zheight=document.documentElement.scrollHeight;
	var Zwidth = document.documentElement.scrollWidth;
	var Kheight = document.documentElement.clientHeight;
			function shanchutishi(){
				
					var zhezhao = document.getElementById("zhezhao");
					var tishik = document.getElementById("tishik");
				if(zhezhao){
					document.body.removeChild(zhezhao);
					document.body.removeChild(tishik);
				}
						
					
						
			}
				function tishi(img,wenzi,time){
					var zhezhao = document.createElement("div");
				   zhezhao.id="zhezhao";
				   zhezhao.style.height=Zheight+"px";
				   document.body.appendChild(zhezhao);
				var tishik = document.createElement("div");
				   	tishik.id="tishik";
				   	tishik.innerHTML="<div class=\"tsk-img\" align=\"center\">\
		<img src=\"images/icon/"+img+".png\"></div>\
		<div align=\"center\">\
			<p id=\"tsk-p\">"+wenzi+"</p>\
			</div>";
				   document.body.appendChild(tishik);
				    var DHeight= tishik.offsetHeight;
				   var DWidth = tishik.offsetWidth;
				   tishik.style.top=(Kheight-DHeight)/2+"px";	
				    tishik.style.left=(Zwidth-DWidth)/2+"px";	
				   setTimeout("shanchutishi()",time);
				}

	function byId(id){
			return typeof(id) ==="string"?document.getElementById(id):id;
		}
	function Newopen(url){
		window.open(url);
	}