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
// 防止非法调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

/**
*_runtime()是用来获取执行耗时
*@access public 
*@return float 表示返回出来的是一个浮点型数字
*/
function _runtime(){
    $_mtime=explode(' ',microtime());
    return $_mtime[1]+$_mtime[0];
}

/**
*_code()是验证码函数
*@access public
*@param int $_width  表示验证码的长度
*@param int $_height  表示验证码的高端
*@param int $_rnd_color 表示验证码的位数
*@param bool $_flag  表示验证码是否需要边框
*@return void   这个函数执行后产生一个验证码
*/
function _code($_width=75,$_height=25,$_rnd_color=4,$_flag=false){   
    // 创建随机码
    $_nmsg='';
    for($i=0;$i<4;$i++){
        $_nmsg .=dechex(mt_rand(0,15));
    }
    // 保存在session
    $_SESSION['code']=$_nmsg;
    // 创建一张图像
    $_img=imagecreatetruecolor($_width,$_height);
    //白色
    $_white=imagecolorallocate($_img,255,255,255);
    //填充
    imagefill($_img,0,0,$_white);
    if($_flag){
        //黑色,边框
        $_black=imagecolorallocate($_img,0,0,0);
        imagerectangle($_img,0,0,$_width-1,$_height-1,$_black);
    }
    //随机画出6个线条
    for ($i=0;$i<6;$i++){
        $_rnd_color=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
        imageline($_img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$_rnd_color);
    }
    // 随机雪花
    for($i=0;$i<100;$i++){
        $_rnd_color=imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
        imagestring($_img,1,mt_rand(1,$_width),mt_rand(1,$_height),'*',$_rnd_color);
    }
    //输出验证码
    // for ($i=0;$i<strlen($_SESSION['code']);$i++) {
    // 	$_rnd_color = imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
    // 	imagestring($_img,5,$i*$_width/$_rnd_code+mt_rand(1,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rnd_color);
    // }
    //输出图像
    ob_clean();
    header('Content-Type:image/png');
    imagePng($_img);
    //销毁
    imagedestroy($_img);
}



 





?>