<?php
 class liyongzhen 
 {
 	public static  $liyong;
 	public function __construct($liyong)
 	{
 		// $this->$liyong=$liyong;
 		self::$liyong = $liyong;
 		$this->test();
 	}
 	public function test ()
 	{
 		$a = self::$liyong = 123312;
 		// $a = self::$liyong;
 		var_dump($a);
 	}
 }

 $b = new liyongzhen('3333');
 // var_dump($b);
 $c = $b->test();

/**
 * 获取数组中最小的K个数
 */

function replaceMaxValue($arr,$otherNum){
    $max = $arr[0];
    for($i = 1; $i < count($arr); $i++){
        if($arr[$i] > $max){
            $max = &$arr[$i];
        }
    }
    if($otherNum < $max){
        $max = $otherNum;
    }
    return $arr;
}

function getTop($arr, $topNum){
    $topK = array_slice($arr, 0, $topNum);
    $other = array_slice($arr,$topNum);
    foreach($other as $value){
        $topK = replaceMaxValue($topK,$value);
    }
    return $topK;
}

print_r(getTop(array(1,2,5,6,7,976,0,4,123,4,5),6));










?>