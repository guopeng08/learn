<?php
// excel
$sale = array(
	array('north' =>'northeast' ,'time'=>'2015-01-02',12.56 ),
	array('north' =>'north' ,'time'=>'2015-06-04',12.56 ),
	array('southeast' =>'southeast' ,'time'=>'2016-05-08',12.56 ),
	array('southwest' =>'southwest' ,'time'=>'2017-07-02',14.56 ),
 );

ob_start();
$fh=fopen('php://output', 'w')or die('can not open file');

foreach ($sale as $key => $value) {
	if (fputcsv($fh, $value)===false) {
		die('can not write csv');
	}
}

fclose($fh)or die('can not close php://');

$output=ob_get_contents();
var_dump($output);
ob_end_clean();


$a = 1;$x = &$a;$b = $a++; 
// echo $b;
// echo $x;

$str='abcdefghij';
function str_cut($str){
	$str=strrev($str);	
	$arr=str_split($str,3);
	$newstr=implode(',',$arr);	
	
	return strrev($newstr);
}

$newstr=str_cut($str);

var_dump($newstr);


?>