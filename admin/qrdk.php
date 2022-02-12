    <?php
    require '../core/common.php';
    if ($islogin == 1) {
    } else
        exit ( "<script language='javascript'>window.location.href='./login.php';</script>" );
    ?>

<?php
if(isset($_GET['id']));
{
$sss=$_GET['id'];
$rs = $DB->query ( "SELECT * FROM  `pay_settle` WHERE  `id` LIKE  '$sss'" );
$row = $rs->fetch () ;

  if(!$row['id']){
echo '提现订单不存在';
exit;
}


$id=$row['id'];
  $rs = $DB->query ( "UPDATE `pay_settle` SET  `status` =  '2' WHERE  `pay_settle`.`id` =$id;" );
$row = $rs->fetch () ;
 exit ( "<script language='javascript'>alert('确认打款成功！');window.location.href='./slist.php'</script>" );
}
?>
