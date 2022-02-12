<?php
/**
 * 二维码列表
 **/
include("../core/common.php");
$title = '二维码列表';
include './head.php';
if ($islogin == 1) {
} else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$sql = "1";
if ($_GET['pid'] != '') {
    $pids = $_GET['pid'];
    $sql = "`pid`='$pids'";
}
$numrows = $DB->query("SELECT * from pay_qrlist WHERE {$sql}")->rowCount();
$pageSize = 30;
$pageTotal = intval($numrows / $pageSize);
if ($numrows % $pageSize) $pageTotal++;
$nowPage = intval($_GET['page']);
if ($nowPage <= 0 || $nowPage > $pageTotal) $nowPage = 1;
$offSet = $pageSize * ($nowPage - 1);
?>
<main class="lyear-layout-content">
    <div class="container-fluid">
        <?php
        $my = isset($_GET['my']) ? $_GET['my'] : null;
        if ($my == 'delete') {
            $id = $_GET['id'];
            $rows = $DB->query("select * from pay_qrlist where id='$id' limit 1")->fetch();
            if (!$rows) showmsg('当前记录不存在！', 3);
            $sql = "DELETE FROM pay_qrlist WHERE id='$id'";
            if ($DB->exec($sql)) showmsg('删除二维码成功！<br/><br/><a href="./ewm.php">>>返回二维码列表</a>', 1);
            else showmsg('删除二维码失败！' . $DB->errorCode(), 4);
        } else {
        ?>
        <div class="center-block" style="float: none;">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">二维码列表</h3></div>
                <div class="panel-body">
                    <form action="ewm.php" method="GET">
                        <div class="form-group input-group-sm">
                            <select class="form-control" name="page">
                                <?php
                                for ($i = 1; $i < $nowPage; $i++) echo '<option value="' . $i . '">第 ' . $i . ' 页</option>';
                                echo '<option value="' . $i . '" selected>第 ' . $i . ' 页</option>';
                                for ($i = $nowPage + 1; $i <= $pageTotal; $i++) echo '<option value="' . $i . '">第 ' . $i . ' 页</option>';
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group-sm">
                            <input type="text" class="form-control" name="pid" placeholder="搜索PID" value="<?php echo $pids; ?>">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary btn-block">提交信息</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>商户号</th>
                                <th>二维码类型</th>
                                <th>二维码金额</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $offSet = $pageSize * ($nowPage - 1);
                            $rs = $DB->query("SELECT * FROM pay_qrlist WHERE {$sql} order by id desc limit $offSet,$pageSize");
                            while ($res = $rs->fetch()) {
                                echo '<tr><td><b>' . $res['pid'] . '</b></td><td>' . ($res['type'] == 'wxpay' ? '微信' : ($res['type'] == 'alipay' ? '支付宝' : 'QQ钱包')) . '</td><td>' . ($res['money'] > 0 ? $res['money'] : '通用') . '</td><td>' . $res['addtime'] . ' </td><td><a href="ewm.php?my=delete&id=' . $res['id'] . '" class="btn btn-xs btn-danger"><span class="am-icon-trash-o">删除</span></a></td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</main>
<?php
include 'foot.php';
?>
