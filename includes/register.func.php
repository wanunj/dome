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

if(!function_exists('_alert_back')){
    exit('_alert_back()函数不存在，请检查！');
}

/**
*_check_username  
*@access public
*@param string $_string  受污污染的用户名
*@param int $_min_num  最小位数
*@param int $_max_num  最大位数
*@return string  过滤后的用户名
*/
function _check_username($_string,$_min_num,$_max_num){
    // 去掉两边的空格
    $_string=trim($_string);
    // 长度小于两位或者大于20位
    if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){
        _alert_back('长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');
    }
    // 限制敏感字符
    $_char_pattern='/[<>\'\"\ \  ]/';
    if(preg_match($_char_pattern,$_string)){
        _alert_back('用户名不得包含敏感字符!');
    }
    // 限制敏感用户名
    $_mg[0]='999';
    $_mg[1]='888';
    $_mg[2]='777';
    // 告訴用戶，由哪些不能注冊
    $_mg_string='';
    foreach($_mg as $value){
        $_mg_string .=$value.',';
    }
    //这里采用的绝对匹配
    if(in_array($_string,$_mg)){
        _alert_back($_mg_string.'以上敏感用户名不得注册!');
    }
    // 将用户名转义输入
    //return mysql_real_escape_string($_string);
    return $_string;
}

/**
*_check_password  验证密码
*@access public
*@param string $_first_pass
*@param string $_end_pass
*@param int $_min_num
*return string $_first_pass  返回一个加密后的密码
*/
function _check_password($_first_pass,$_end_pass,$_min_num){
    // 判断密码
    if(strlen($_first_pass)<$_min_num){
        _alert_back('密码不得小于'.$_min_num.'位！');
    }
    //密码和确认密码必须一致
    if($_first_pass!=$_end_pass){
        _alert_back('密码和确认密码不一致!');
    }
    // 返回密码
    return sha1($_first_pass);
}

/**
*_check_question  返回密码提示
*@access public
*@param string $_string
*@param int $_min_num
*@param int $_max_num
*return string $_first_pass  返回密码提示
*/
function _check_question($_string,$_min_num,$_max_num){
    // 长度小于4位或者大于20位
    if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){
        _alert_back('密码提示不得小于'.$_min_num.'位或者大于'.$_max_num.'位');
    }
    // 返回密码提示
    //return mysql_real_escape_string($_string);
    return $_string;
}


function _check_answer($_ques,$_answ,$_min_num,$_max_num){
    // 长度小于4位或者大于20位
    if(mb_strlen($_answ,'utf-8')<$_min_num||mb_strlen($_answ,'utf-8')>$_max_num){
        _alert_back('密码回答不得小于'.$_min_num.'位或者大于'.$_max_num.'位');
    }
    // 密码提示与回答不得一致
    if($_ques==$_answ){
        _alert_back('密码提示与回答不得一致！');
    }
    // 加密返回回答
    return sha1($_answ);
}




?>