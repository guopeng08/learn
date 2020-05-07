<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/7 0007
 * Time: 10:37
 */

/*
 *经典算法题
 *
 *1.猴子苹果分赃题
 *
 */
ini_set("display_errors", "stderr");  //ini_set函数作用：为一个配置选项设置值，
error_reporting(E_ALL);     //显示所有的错误信息

//for ($s = 5;;$s++) {
//    if ($s % 5 == 1) {
//        $l = $s - round($s / 5) - 1;
//        if ($l % 5 == 1) {
//            $q = $l - round($l / 5) - 1;
//            if ($q % 5 == 1) {
//                $w = $q - round($q / 5) - 1;
//                if ($w % 5 == 1) {
//                    $x = $w - round($w / 5) - 1;
//                    if ($x % 5 == 1) {
//                        $y = $x - round($x / 5) - 1;
//                        if ($y % 5 == 1) {
//                            echo $s;
//                            exit;
//                        }
//                    }
//
//                }
//            }
//
//        }
//
//    }
//
//}


/*
 *猴子当大王问题
 *
 */
function monkeyKing($n,$m){
    $monkeys=range(1,$n);
    $i=0;
    $k=$n;
    while(count($monkeys)>1){
        if(($i+1)%$m==0){
            unset($monkeys[$i]);
        }else{
            array_push($monkeys,$monkeys[$i]);
            unset($monkeys[$i]);
//            echo '<br>';
//            echo $i;
//            var_dump($monkeys);
        }
        $i++;
    }

    return current($monkeys);
}

$monkey = monkeyKing(5,2);
echo '最后的猴子编号是:'.$monkey;
echo '<hr>';

/*
 *
 *汉诺塔游戏 不清楚
 *
 */
function hanou($n,$x,$y,$z){
    if($n==1){
       echo '移动片1从'.$x.'到'.$z."<br>";
    }else{
        hanou($n-1,$x,$z,$y);
        echo '移动片'.$n.'从'.$x.'到'.$z."<br>";
        hanou($n-1,$y,$x,$z);
    }
}
hanou(3,'A','B','C');

echo '<hr>';
/*
 * 约瑟夫环
 *
 */
echo '<pre>';
define('N',41);//参与总人数
define('M',3);//每到3自杀1人
$man=array(0);

$count = 1;
$i=0;
$pos=-1;
$alive =2;

while($count<=N){
    do{
        $pos=($pos+1)%N;//环状处理
        if(@$man[$pos]==0){
            $i++;
            if($i==M){
                $i=0;
                break;
            }

        }
    }while(1);

    $man[$pos]=$count;
    $count++;
}


//截取对应最大键对应的键名
arsort($man,SORT_NUMERIC);
$arr=array_slice($man,0,$alive,true);

echo "约瑟夫环排列";
for($i=0;$i<N;$i++){
    echo " ".$man[$i];
}

echo "<br>L表示要救的".$alive."个人要放的位置：";
for($i=0;$i<N;$i++){
    if(isset($arr[$i]) && $man[$i]==$arr[$i]){
        echo "L";
    }else{
        echo "D";
    }

    if(($i+1)%5==0){
        echo " ";
    }

}

/*
 *
 *5.阿姆斯壮数
 *
 */
echo '<hr>';
for ($i = 1; $i < 9; $i++) {
    for ($j = 0; $j <= 9; $j++) {
        for ($m = 0; $m <= 9; $m++) {
            if (pow($i,3)+pow($j,3)+pow($m,3)==100*$i+10*$j+$m) {
                echo $i.$j.$m." ";
            }
        }
    }
}


/*
 * 6.获取规定的排列组合 不清楚
 *
 */
//echo '<hr>';
//define('N1',3);
//$num =array();
//for($i=1;$i<=N1;$i++)
//    $num[$i]=$i;
//perm($num,1);
//function perm($num, $i)
//{
//    if ($i < N1) {
//        for ($j = $i; $j <= N1; $j++) {
//            $tmp = $num[$j];
//            //旋转最右边数字到最左边
//            for ($k = $j; $k > $i; $k--)
//                $num[$k] = $num[$k - 1];
//            $num[$i] = $tmp;
//            perm($num, $i + 1);
//
//            //还原
//            for ($k = $i; $k < $j; $k++)
//                $num[$k] = $num[$k + 1];
//            $num[$j] = $tmp;
//
//
//        }
//    } else {
//        //显示此次排序
//        for ($j = 1; $j <= N1; $j++) {
//            printf("%d", $num[$j]);
//            printf("<br>");
//        }
//
//    }
//
//}


/*
 *实现洗牌算法
 *
 */
echo '<hr>';
$card_nums=54;
function wash_card($card_nums){
    $cards=$tmp=array();
    for($i=0;$i<$card_nums;$i++){
        $tmp[$i]=$i;
    }

    for($i=0;$i<$card_nums;$i++){
        $index=rand(0,$card_nums-$i-1);
        $cards[$i]=$tmp[$index];
        unset($tmp[$index]);

        $tmp=array_values($tmp);
    }

    return $cards;
}
print_r(wash_card($card_nums));

/*
 *
 *斐波那契数列
 *
 *$k 代表月份
 */
echo '<hr>';
function peibo($k){
    $k1 = 1;//上个月兔子数量
    $k2 = 0;//上上个月兔子数量
    $sum= 0;//总和

    for($i=1;$i<$k;$i++){
       $sum = $k1+$k2;
       $k2=$k1;
       $k1=$sum;
    }

    echo $sum;
}

peibo(12);

echo '<hr>';
/*
 *杨辉三角
 *
 */
function yanghui($k){
    for($i=0;$i<$k;$i++){
        $a[$i][0]=1;
        $a[$i][$i]=1;
    }

    //把第一位和最后一位的值保存到数组中
    for($i=2;$i<$k;$i++){
        for($j=1;$j<$i;$j++){
            $a[$i][$j]=$a[$i-1][$j-1]+$a[$i-1][$j];
        }
    }

    //打印
    for($i=0;$i<$k;$i++){
        for($j=0;$j<=$i;$j++){
            echo $a[$i][$j].'&nbsp;';
        }
        echo '<br>';

    }
}

yanghui(6);

echo '<hr>';
/*
 *牛的数量有多少
 *
 */
function bull($n)
{
    static $num = 1;
    for ($j = 1; $j <= $n; $j++) {
        if ($j >= 4 && $j < 15) {
            $num++;
            bull($n - $j);
        }

        if ($j == 20) {
            $num--;
        }

    }

    return $num;
}

echo bull(8);

/*
 *
 *百钱买百鸡
 *
 */
echo '<hr>';
for ($i = 1; $i < 100; $i++) {
    for ($j = 1; $j < 100; $j++) {
        for ($k = 3; $k < 100; $k = $k + 3) {
            if (($i + $j + $k == 100) && ($i * 5 + $j * 3 + $k / 3 == 100)) {
                echo "公鸡：" . $i . "母鸡：" . $j . "小鸡：" . $k . '<br>';
            }

        }

    }

}

echo '<hr>';

/*
 *
 *可以经过多少个路口
 *
 */
function lukou()
{
    for ($sum = 100000, $num = 0; $sum >= 5000;) {
        if ($sum >= 50000) {
            $sum = 0.95 * $sum;
        } else {
            $sum = $sum - 5000;
        }

        $num++;
    }

    echo $num;
}

lukou();

echo '<hr>';
$k=100;
$sum=100;
for ($i=1;$i<=10;$i++){
    $k=$k/2;
    $sum+=$k;
}

echo "共经过".$sum."第10次反弹".$k."米";
echo '<hr>';
/*
 *
 *1000以内的完数
 *
 */
for($i=2;$i<1000;$i++){
    $sum=0;
    for($k=2;$k<=$i/2;$k++){
        if($i%$k==0){
            $sum+=$k;
        }
    }

    if($sum+1==$i){
        echo $i." ";
    }

}

/*
 *
 *猴子吃了多少桃子
 *
 */
echo '<hr>';
$s=0;
$n=1;//最后一天桃子数量
for($i=1;$i<10;$i++){
    $s=($n+1)*2;
    $n=$s;
}

echo "第一天摘了".$s."个桃子".'<br>';

/*
 *
 *三色旗问题 不太清楚这个
 *
 */
define("BLUE", "b");
define("WHITE", "w");
define("RED", "r");
function SWAP($x, $y, &$color)
{
    $temp = $color[$x];
    $color[$x] = $color[$y];
    $color[$y] = $temp;
}

$color = array('r', 'b', 'r', 'w', 'r', 'r', 'w', 'b', 'b', 'r');
$wFlag = 0;
$bFlag = 0;

$rFlag = count($color) - 1;

echo '旗子开始的排列顺序：';
for ($i = 0; $i < count($color); $i++)
    echo $color[$i];
echo '<br>';

while ($wFlag <= $rFlag) {
    if ($color[$wFlag] == WHITE) {
        $wFlag++;
    } elseif ($color[$wFlag] == BLUE) {
        SWAP($bFlag, $wFlag, $color);
        $bFlag++;
        $wFlag++;
    } else {
        while ($wFlag < $rFlag && $color[$rFlag] == RED)
            $rFlag--;
        SWAP($rFlag, $wFlag, $color);
        $rFlag--;

    }
}

echo '排序后的旗子：';
for($i=0;$i<count($color);$i++)
    echo $color[$i];
    echo '<br>';

    





