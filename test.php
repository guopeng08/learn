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


$filename="123.jpg";
//方法一：
function get_ext($file_name){
    return array_pop(explode('.', $file_name));
    //用.号对字符串进行分组
}
echo get_ext($filename);
//方法二：
$fileEx=strtolower(substr(strrchr($filename,"."),1));
echo $fileEx;
//方法三：
$extend=pathinfo($filename);
echo $extend['extension'];
//方法四：
$filetype=array("image/gif","image/jpeg");
//判断文件扩展名类型是否在该 数组中
if(in_array($_FILES['file']['type'],$filetype)){
//针对上传文件判断
    echo $_FILES['file']['type'];
}







?>