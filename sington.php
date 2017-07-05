<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/5 0005
 * Time: 23:04
 */

class Sington{
    private static $instance=null;

    /*
     * 单例的方法
     * */
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance=new self();
        }

        return self::$instance;
    }

    /*
     * 防止克隆
     * */
    private function __clone()
    {
        // TODO: Implement __clone() method.
        die('clone can not allow');
    }

}

$sington=Sington::getInstance();