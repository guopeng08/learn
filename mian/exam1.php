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