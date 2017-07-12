<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/7 0007
 * Time: 20:43
 */
header('content-type:text/html;charset=utf-8');
// NPC
date_default_timezone_set('PRC');
class MyException extends Exception{
    //展现异常信息
    public function show(){
        //异常信息
        $message = $this->getMessage();
        //获取文件
        $file = $this->getFile();
        //获取行号
        $line = $this->getLine();
        //获取异常编号
        $code = $this->getCode();
        //引入模板文件
        include "no_template.php";
    }
    //[2015-09-30 11:30:30] D:\wamp\www\class\lamp117\OOP6\myException.class.php 行号 31 编号 101
    public function log(){
        //拼接字符串
        $str = "[".date('Y-m-d H:i:s')."] ".$this->getFile()." 行号 ".$this->getLine()." 编号 ".$this->getCode()."\r\n";
        //拼接日志路径
        $log = "./log/".date('Ymd').".log";
        //写入文件
        file_put_contents($log, $str, FILE_APPEND);
    }
}
// try{
//  throw new MyException('数据库连接失败啦 ', 101);
// }catch(MyException $e){
// 	//展现异常信息
// 	// $e->show();
// 	//将异常信息写入日志中
// 	$e->log();
// }
set_exception_handler('solveException');
function solveException(MyException $e){
    $e->show();
}
throw new MyException('离下课还有十五分钟', 100);