<?php
require '../core/common.php';

@header('Content-Type: text/html; charset=UTF-8');
$type=daddslashes($_GET['type']);
$trade_no=daddslashes($_GET['trade_no']);
$sitename=base64_decode(daddslashes($_GET['sitename']));
$row=$DB->query("SELECT * FROM pay_order WHERE trade_no='{$trade_no}' limit 1")->fetch();
if(!$row)sysmsg('该订单号不存在，请返回来源地重新发起请求！');

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="<?php echo $conf['web_name']?>" name="description"/>
    <meta name="author" content="auth.opawl.cn" />
    <title>在线支付 | 收银台</title>
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>
<body class="authentication-bg">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <span><font color="white" size="5"><b>收银台</b></font></span>
                        </div>
                        <div class="card-body">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">请选择一种支付方式完成支付￥<?php echo $row['money']?>元</h4>
                            </div>
                            <div class="form-group mb-3">
                                    <label>这里是收银台哦~</label>
                                    <input class="form-control" type="text" value="商品名称：<?php echo $row['name']?>" disabled="">
                                    <input class="form-control" type="text" value="创建时间：<?php echo $row['addtime']?>" disabled="">
                                    <input class="form-control" type="text" value="交易订单号：<?php echo $row['trade_no']?>" disabled="">
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <a href="submit.php?type=alipay&trade_no=<?php echo $trade_no?>"><button class="btn btn-primary">支付宝</button></a>&nbsp;<a href="submit.php?type=wxpay&trade_no=<?php echo $trade_no?>"><button class="btn btn-primary">微信支付</button></a>&nbsp;<a href="submit.php?type=qqpay&trade_no=<?php echo $trade_no?>"><button class="btn btn-primary">QQ钱包</button></a>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- App js -->
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/qcloud_util.js"></script>
<script>




    // 订单详情
    $('#orderDetail .arrow').click(function (event) {
        if ($('#orderDetail').hasClass('detail-open')) {
            $('#orderDetail .detail-ct').slideUp(500, function () {
                $('#orderDetail').removeClass('detail-open');
            });
        } else {
            $('#orderDetail .detail-ct').slideDown(500, function () {
                $('#orderDetail').addClass('detail-open');
            });
        }
    });
</script>
</body>
</html>