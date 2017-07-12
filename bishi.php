<?php

header("content-type:text/html;charset=utf-8");
 
function str_rev_gb($str){
    //判断输入的是不是utf8类型的字符，否则退出
    if(!is_string($str)||!mb_check_encoding($str,'UTF-8')){
       exit("输入类型不是UTF8类型的字符串");
    }
    $array=array();
    //将字符串存入数组
    $l=mb_strlen($str,'UTF-8');
    $j=$k=0;
    for($i=0;$i<$l;$i++){
       $array[]=mb_substr($str,$i,1,'UTF-8');
    }


    //反转字符串
    krsort($array);
    //拼接字符串
    $string=implode($array);
    return $string;
}
$str1 = "Englist";
$str2 = "English中国";
$str3 = "Eng中是lish国但g";
$str4 = "中华be人民共rt和国";
echo $str1."->".str_rev_gb($str1)."<br>";
echo $str2."->".str_rev_gb($str2)."<br>";
echo $str3."->".str_rev_gb($str3)."<br>";
echo $str4."->".str_rev_gb($str4)."<br>";
$arr=range('a', 'z');
//var_dump($arr);die;
function get_extension($file)
{
    echo substr(strrchr($file, '.'), 1);
}
//1.php文件的扩展
$url='http://www.test.com.cn/abc/dec/fg.php?id=2';
$arr=parse_url($url);
$file=basename($arr['path']);

$ext=explode('.',$file);
//echo $ext[1];
//get_extension('adfd.php');

$a = 1;
$b =& $a;
unset ($a);
echo $b;





?>