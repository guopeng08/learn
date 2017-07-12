<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/7 0007
 * Time: 20:41
 */
header('content-type:text/html;charset=utf-8');
$a = 100;
$b = 0;
try{
    //如果除数为0  异常
    if($b == 0){
        throw new Exception('除数不能为0', 190);
    }
    $res = $a/$b;
    echo "iloveyou";
}catch(Exception $e){
    //获取异常信息
    echo $e->getMessage().'<br>';
    //获取异常编号
    echo $e->getCode().'<br>';
    //获取发生异常的文件
    echo $e->getFile().'<br>';
    //获取反生异常的行号
    echo $e->getLine();
}














