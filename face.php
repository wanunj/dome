<?php
/**
* TestGuest Version1.0
* ================================================
* Copy 2017-4-9
* Web: http://www.yc60.com
* ================================================
* Author: Lee
* Date: 2017-4-9
*/
// 定义常量，用来指定本页内容
define('SCRIPT','face');

// 定义常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';   //转换成硬路径，速度更快

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>>多用户留言系统--头像选择</title>
<?php
    require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/opener.js"></script>
</head>
<body>
    <div id="face">
        <h3>选择头像</h3>
        <dl>
            <?php foreach(range(1,9) as $num) {?>
            <dd><img src="face/m0<?php echo $num?>.gif" alt="face/m0<?php echo $num?>.gif" title="头像<?php echo $num?>"></dd>
            <?php }?>

        </dl>
        <dl>
            <?php foreach(range(10,64) as $num) {?>
            <dd><img src="face/m<?php echo $num?>.gif" alt="face/m<?php echo $num?>.gif" title="头像<?php echo $num?>"></dd>
            <?php }?>
            
        </dl>
    </div>

</body>
</html>