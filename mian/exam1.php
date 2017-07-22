<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/17
 * Time: 19:22
 */

/**
 * 计算$b相对于$a的相对路径
 * @param string $a
 * @param string $b
 * @return string
 */
function getRelativePath($a, $b) {
    $relativePath = "";
    $pathA = explode('/', dirname($a));
    $pathB = explode('/', dirname($b));
    $n = 0;
    $len = count($pathB) > count($pathA) ? count($pathA) : count($pathB);
    do {
        if ( $n >= $len || $pathA[$n] != $pathB[$n] ) {
            break;
        }
    } while (++$n);
    $relativePath .= str_repeat('../', count($pathB) - $n);
    $relativePath .= implode('/', array_splice($pathA, $n));
    return $relativePath;
}

$a = '/a/b/c/d/d.php';
$b = '/a/b/1/2/c.php';

$res = getRelativePath($a, $b);
var_dump($res);

/*
*  url地址正则匹配
   参考地址:http://www.w3school.com.cn/php/php_form_url_email.asp 
*/
$url='http://www.baidu.com/index.php?id=1&name=user1';
$a=preg_match_all("/(http|ftp):\/\/(www.)?(\S*)(\?\S*\&\S*)?/",$url,$match);
$b=preg_match_all("/(.*)\/\/[a-zA-Z0-9_.\/]+/",$url,$match2);
$c=preg_match_all("/(.*)\/\/(.*)\?(.*)?/",$url,$match3);
$d=preg_match_all("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
=~_|]/i",$url,$match4);
var_dump($match4);

/*邮箱*/
$email='18224577619@163.com';
$newemail=preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email,$match);
var_dump($match);

/*名字*/
$name='zhangsan';
$newname=preg_match_all("/^[a-zA-Z ]*$/", $name, $matches);
var_dump($matches);

/*手机号*/
$phone=15517378106;
$matches=preg_match_all("/^1[34578]\d{9}$/", $phone, $mobile);
var_dump($mobile);

/*
 *排序算法
 参考:http://www.php100.com/html/php/rumen/2013/1029/6333.html
 1.冒泡(从小到大)
 2.快速(从小到大)
 3.选择排序(从小到大)
 4.插入排序
 */
function mysort($arr){
    for($i=0;$i<count($arr);$i++){
        for($j=0;$j<count($arr)-1;$j++){
            if($arr[$j]>$arr[$j+1]){
                $tmp=$arr[$j];
                $arr[$j]=$arr[$j+1];
                $arr[$j+1]=$tmp;
            }
        }
    }

    return $arr;
}

function quicksort($arr){
    $length=count($arr);
    if($length<=1){
        return $arr;
    }

    $mid=$arr[0];
    $left=array();
    $right=array();
    for($i=1;$i<$length;$i++){
        if($arr[$i]>$mid){
            $right[]=$arr[$i];
        }else{
            $left[]=$arr[$i];
        }
    }

    $left=quicksort($left);
    $right=quicksort($right);

    return array_merge($left,array($mid),$right);
}

function select_sort($arr) {
    for($i=0,$len=count($arr);$i<$len-1;$i++){
        $p=$i;
        for($j=$i+1;$j<$len;$j++){
            if($arr[$p]>$arr[$j]){
                $p=$j;
            }
        }

        if($p!=$i){
            $tmp=$arr[$p];
            $arr[$p]=$arr[$i];
            $arr[$i]=$tmp;
        }
    }

    return $arr;
}


function insert_sort($arr) {
    for($i=1, $len=count($arr); $i<$len; $i++) {
        //获得当前需要比较的元素值。
        $tmp = $arr[$i];
        //内层循环控制 比较 并 插入
        for($j=$i-1;$j>=0;$j--) {
            if($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置
                //将后边的元素与前面的元素互换
                $arr[$j+1] = $arr[$j];
                //将前面的数设置为 当前需要交换的数
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素
                //由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    
    return $arr;
}

$arr=array(10,9,6,8,4,5);
$sort=mysort($arr);
echo '<hr>';
var_dump($sort);

$sort=quicksort($arr);
echo '<hr>';
var_dump($sort);

$sort=select_sort($arr);
echo '<hr>';
var_dump($sort);

$sort=insert_sort($arr);
echo '<hr>';
var_dump($sort);










?>