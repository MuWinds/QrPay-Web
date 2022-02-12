<?php
$u = $_GET["u"];
$m=$_GET["m"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://gw.alipayobjects.com/as/g/h5-lib/alipayjsapi/3.1.1/alipayjsapi.min.js"></script>
</head>
<body>
<script>
    function returnApp() {
        AlipayJSBridge.call("exitApp")
    }

    function ready(a) {
        window.AlipayJSBridge ? a && a() : document.addEventListener("AlipayJSBridgeReady", a, !1)
    }

    ready(function() {
        try {
            var userId = "<?php echo $u?>";
            var money = "<?php echo $m?>";
            var remark = "";
            var a = {
                actionType: "scan",
                u: userId,
                a: money,
                m: remark,
                biz_data: {
                    s: "money",
                    u: userId,
                    a: money,
                    m:  remark
                }
            }
        } catch (b) {
            returnApp()
        }
        AlipayJSBridge.call("startApp", {
            appId: "20000123",
            param: a
        }, function(a) {})
    });
    document.addEventListener("resume", function(a) {
        returnApp()
    });
</script>
</body>
 

</html>
    
<script>//禁止右键

function click(e) {

if (document.all) {

if (event.button==2||event.button==3) { alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");

oncontextmenu='return false';

}

}

if (document.layers) {

if (e.which == 3) {

oncontextmenu='return false';

}

}

}

if (document.layers) {

document.captureEvents(Event.MOUSEDOWN);

}

document.onmousedown=click;

document.oncontextmenu = new Function("return false;")

document.onkeydown =document.onkeyup = document.onkeypress=function(){ 

if(window.event.keyCode == 12) { 

window.event.returnValue=false;

return(false); 

} 

}

</script>



  <script>//禁止F12

function fuckyou(){

window.close(); //关闭当前窗口(防抽)

window.location="about:blank"; //将当前窗口跳转置空白页

}



function click(e) {

if (document.all) {

  if (event.button==2||event.button==3) { 

alert("欢迎光临寒舍，有什么需要帮忙的话，请与站长联系！谢谢您的合作！！！");

oncontextmenu='return false';

}



}

if (document.layers) {

if (e.which == 3) {

oncontextmenu='return false';

}

}

}

if (document.layers) {

fuckyou();

document.captureEvents(Event.MOUSEDOWN);

}

document.onmousedown=click;

document.oncontextmenu = new Function("return false;")

document.onkeydown =document.onkeyup = document.onkeypress=function(){ 

if(window.event.keyCode == 123) { 

fuckyou();

window.event.returnValue=false;

return(false); 

} 

}

</script>



