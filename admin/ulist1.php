<?php
/**
 * 商户列表
 **/
include("../core/common.php");
$title = '商户列表';
include './head.php';
if ($islogin == 1) {
} else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
    <main class="lyear-layout-content">
        <div class="container-fluid">
            <div class="center-block" style="float: none;">
                <?php
                $my = isset($_GET['my']) ? $_GET['my'] : null;
                if ($my == 'edit') {
                    $pid = $_GET['pid'];
                    $row = $DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
                    ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">修改商户信息</h3></div>
                        <div class="panel-body">
                            <form action="./ulist.php?my=edit_submit&pid=<?php echo $pid; ?>" method="POST">
                                <div class="form-group">
                                    <label>结算账号:</label><br>
                                    <input type="text" class="form-control" name="account" value="<?php echo $row['account']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>结算姓名:</label><br>
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>商户余额:</label><br>
                                    <input type="text" class="form-control" name="money" value="<?php echo $row['money']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>自定义分成比例:</label><br>
                                    <input type="text" class="form-control" name="rate" value="<?php echo $row['rate']; ?>" placeholder="填写百分数，例如98.5">
                                    <pre><font color="green">填写则此分成比例优先</font></pre>
                                </div>
                                <div class="form-group">
                                    <label>是否认证:</label><br><select class="form-control" name="issmrz" default="<?php echo $row['issmrz']; ?>">
                                        <option value="0">0_否</option>
                                        <option value="1">1_是</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>是否激活:</label><br><select class="form-control" name="active" default="' . $row['active'] . '">
                                        <option value="1">1_激活</option>
                                        <option value="0">0_封禁</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="确定修改"></form>
                            <br/><a href="./ulist.php">>>返回商户列表</a>
                        </div>
                    </div>
                    <script>
                        var items = $("select[default]");
                        for (i = 0; i < items.length; i++) {
                            $(items[i]).val($(items[i]).attr("default") || 0);
                        }
                    </script>
                    <?php
                } elseif ($my == 'edit_submit') {
                    $pid = $_GET['pid'];
                    $rows = $DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
                    if (!$rows) showmsg('当前记录不存在！', 3);
                    $account = $_POST['account'];
                    $username = $_POST['username'];
                    $money = $_POST['money'];
                    $rate = $_POST['rate'];
                    $issmrz = $_POST['issmrz'];
                    $active = $_POST['active'];
                    if ($account == NULL or $username == NULL) {
                        showmsg('保存错误,请确保加*项都不为空!', 3);
                    } else {
                        $sql = "update `pay_user` set `account` ='{$account}',`username` ='{$username}',`money` ='{$money}',`rate` ='$rate',`issmrz` ='$issmrz',`active` ='$active' where `pid`='$pid'";
                        if ($_POST['resetkey'] == 1) {
                            $key = random(32);
                            $sqs = $DB->exec("update `pay_user` set `key` ='{$key}' where `pid`='$pid'");
                        }
                        if ($DB->exec($sql) || $sqs) showmsg('修改商户信息成功！<br/><br/><a href="./ulist.php">>>返回商户列表</a>', 1);
                        else showmsg('修改商户信息失败！' . $DB->errorCode(), 4);
                    }
                } elseif ($my == 'delete') {
                    $pid = $_GET['pid'];
                    $rows = $DB->query("select * from pay_user where pid='$pid' limit 1")->fetch();
                    if (!$rows) showmsg('当前记录不存在！', 3);
                    $urls = explode(',', $rows['url']);
                    $sql = "DELETE FROM pay_user WHERE pid='$pid'";
                    if ($DB->exec($sql)) showmsg('删除商户成功！<br/><br/><a href="./ulist.php">>>返回商户列表</a>', 1);
                    else showmsg('删除商户失败！' . $DB->errorCode(), 4);
                }
                else {
                $sql = "1";
                if ($_GET['kw']) {
                    $type = $_GET['type'];
                    $kw = $_GET['kw'];
                    if ($type == 0) $name = 'pid';
                    if ($type == 1) $name = 'qq';
                    if ($type == 2) $name = 'account';
                    if ($type == 3) $name = 'username';
                    $sql = "`$name` LIKE '%{$kw}%'";
                }
                $numrows = $DB->query("SELECT * from pay_user WHERE {$sql}")->rowCount();
                $pageSize = 30;
                $pageTotal = intval($numrows / $pageSize);
                if ($numrows % $pageSize) $pageTotal++;
                $nowPage = intval($_GET['page']);
                if ($nowPage <= 0 || $nowPage > $pageTotal) $nowPage = 1;
                $offSet = $pageSize * ($nowPage - 1);
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">商户列表</h3></div>
                    <div class="panel-body">
                        <form action="ulist.php" method="GET">
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
                                <select name="type" class="form-control">
                                    <option value="0">商户号</option>
                                    <option value="1">QQ号</option>
                                    <option value="2">结算账号</option>
                                    <option value="3">结算姓名</option>
                                </select>
                            </div>
                            <div class="form-group input-group-sm">
                                <input type="text" class="form-control" name="kw" placeholder="搜索内容" value="<?php echo $kw; ?>">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary btn-block">提交信息</button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>商户号</th>
                                    <th>今日流水</th>
                                    <th>QQ号</th>
                                    <th>余额</th>
                                    <th>软件额度</th>
                                    <th>结算账号/姓名</th>
                                    <th>状态</th>
                                    <th>是否认证</th>
                                    <th>商户操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $offSet = $pageSize * ($nowPage - 1);
                                $rs = $DB->query("SELECT * FROM pay_user WHERE {$sql} order by pid desc limit $offSet,$pageSize");
                                while ($res = $rs->fetch()) {
                                    $today = strtotime(date("Y-m-d") . ' 00:00:00');
                                    $order_today = $DB->query("SELECT sum(money) from pay_order where pid={$res['pid']} and status=1 and software=1 and endtime>='$today'")->fetchColumn();
                                    $order_today = $order_today ? sprintf("%.2f", $order_today) : '0.00';
                                    echo '<tr><td><b>' . $res['pid'] . '</b></td><td>' . $order_today . '元</td><td>' . $res['qq'] . '</td><td>' . $res['money'] . '</td><td>' . $res['paymb'] . '</td><td>' . $res['account'] . '<br/>' . $res['username'] . '</td><td>' . ($res['active'] == 1 ? '<font color=green>正常</font>' : '<font color=red>封禁</font>') . '</td><td>' . ($res['issmrz'] == 1 ? '<font color=green>已认证</font>' : '<font color=red>未认证</font>') . '</td><td><a href="./edcz.php?pid=' . $res['pid'] . '" class="btn btn-xs btn-info">额度充值</a>.' . '&nbsp;<a href="./ulist.php?my=edit&pid=' . $res['pid'] . '" class="btn btn-xs btn-info">编辑</a>.' . '&nbsp;<a href="./ulist.php?my=delete&pid=' . $res['pid'] . '" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此商户吗？\');">删除</a></td></tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
include 'foot.php';
?>