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


$aa=10+"10%"+"$100";
var_dump($aa);
if(10!==false){
    echo "1111";
}else{
    echo '2222';
}


function test() {
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
    echo '$foo in current scope: ' . $foo . "\n";
}

$foo = "Example content";
test();

$i =  1 ; //从第1圈开始跑
do{  //跑10圈
    echo "在跑第".$i."圈。";
    $i++;
}while($i<=10);

$str="http://www.test.com.cn/abc/de/fg.php?id=1";
$str2=parse_url($str);
$str3=pathinfo($str2['path']);

// echo $str3[extension];
// echo "<br>";
// echo ".{$str3[extension]}";



function getExt($url){
$arr = parse_url($url);
$file = basename($arr['path']);
$ext = explode(".",$file);
return $ext[1];
}

echo function_exists('print');
$a = array(1=>5,5=>8,22,2=>'8',81);
var_dump($a);

for($i=0;$i<10;$i++){
print $i;
}

$fruits = array('strawberry'=>'red', 'banana'=>'yellow');
echo "A banana is $fruits[banana]";









?>