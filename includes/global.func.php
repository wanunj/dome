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

/**
*_runtime()是用来获取执行耗时
*@access public 表示函数对外公开
*@return float 表示返回出来的是一个浮点型数字
*/
function _runtime(){
    $_mtime=explode(' ',microtime());
    return $_mtime[1]+$_mtime[0];
}



 





?>