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
//设置字符编码
header('Content-Type:text/html;charset=utf-8');

// 防止非法调用
if(!defined('IN_TG')){
    exit('Access Defined!');
}

/**
 *_connect()连接数据库
 * @access public
 * @return  void
 */
function _connect(){
    //global 全局变量
    global $_conn;
    if (!$_conn=@mysql_connect(DB_HOST,DB_USER,DB_PWD)){
        exit('数据库连接失败');
    }
}

/**
 *_select_db()选择数据库
 * @return void
 */
function _select_db(){
    if (!mysql_select_db(DB_NAME)){
        exit('找不到指定数据库'.mysql_error());
    }
}

/**
 *_set_names()选择字符集
 * @return void
 */
function _set_names(){
    if (!mysql_query('SET NAMES UTF8')){
        exit('字符集错误');
    }
}

/**
 * @param $_sql
 * @return resource
 */
function _query($_sql){
    if (!$_result=mysql_query($_sql)){
        exit('SQL执行失败'.mysql_error());
    }
    return $_result;
}

/**
 * _fetch_array()  只能获取指定数据集的一条数据组
 * @param $_sql
 * @return array
 */
function _fetch_array($_sql){
    return mysql_fetch_array(_query($_sql),MYSQL_ASSOC);
}

/**
 * _fetch_array_list() 可以返回指定数据集的所有数据
 * @param $_result
 * @return array
 */
function _fetch_array_list($_result){
    return mysql_fetch_array($_result,MYSQL_ASSOC);
}

/**
 * _affected_rows()表示影响到的记录数
 * @return int
 */
function _affected_rows(){
    return mysql_affected_rows();
}

/**
 * @param $_sql
 * @param $_info
 */
function _is_repeat($_sql, $_info){
    if (_fetch_array($_sql)){
        _alert_back($_info);
    }
}

function _close(){
    if (!mysql_close()){
        _alert_back('关闭异常');
    }
}

/**
 * _num_rows() 结果集
 * @param $_result
 * @return int
 */
function _num_rows($_result){
    return mysql_num_rows($_result);
}

/**
 * _free_result()  销毁结果集
 * @param $_result
 * @return bool
 */
function _free_result($_result){
    return mysql_free_result($_result);
}


















