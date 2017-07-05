<?php

	$arr=array('one','two','three','four');
	//用户自定义函数
	function u_sort($a,$b){
		$a=strlen($a);
		$a=strlen($b);
		if($a==0) return 0;
		if($a>$b) return 1;
				  return -1;
	}

	$test=usort($arr,'u_sort');
	echo '<pre>';
	var_dump($arr);

	/*二维数组排序1*/	
	function array_unique_fb2($array2D)
	{
		$map = array();
		$temp2 = array();
		$k = 0;
		foreach ($array2D as $key => $value) 
		{
			$temp_key = $value['keyword'];


			if ($map[$temp_key]) {
				continue;
			}
			$map[$temp_key] = 1;
			$temp2[$k]['name'] = $value['name'];
			$temp2[$k]['keyword'] = $value['keyword'];
			
			$k++;
		}
		return $temp2;
	}


	/*二维数组去重2*/
	function array_unique_fb3($array2D)
	{
		$map = array();
		$temp2 = array();
		foreach ($array2D as $key => $value) 
		{
			if(in_array($value['keyword'], $temp2)){
				unset($array2D[$key]);
			}else{
				$temp2[]=$value['keyword'];
			}

		}
		return $array2D;
	}


	$arr=array(
		0=>array('name'=>'xiao','keyword'=>'1111'),	
		1=>array('name'=>'ming','keyword'=>'2222'),
		2=>array('name'=>'li','keyword'=>'1111'),	
		3=>array('name'=>'zhao','keyword'=>'3333'),
		);
	$result=array_unique_fb3($arr);
	echo "<pre>";
	// var_dump($result);


	// 二维数组去重
	$public_info=array(
		array('name'=>'张三','score'=>60),
		array('name'=>'李四','score'=>90),
		array('name'=>'马六','score'=>30),
		array('name'=>'王五','score'=>100),
		array('name'=>'李四','score'=>80),
		);
	for ($i=0;$i<count($public_info);$i++) {
	    for ($j=$i+1;$j<count($public_info);$j++) {
	        if ($public_info[$j]['name'] == $public_info[$i]['name']) {
	            $public_info[$i]['score'] .= ',' . $public_info[$j]['score'];
	            unset($public_info[$j]);
	        }
	    }
	}

	var_dump($public_info);


	/*多维数组排序*/
	$a=array(
		array('name'=>'张三','score'=>60),
		array('name'=>'李四','score'=>90),
		array('name'=>'马六','score'=>30),
		array('name'=>'王五','score'=>100),
		array('name'=>'王二','score'=>80),
		);
	$score=array();
	foreach($a as $k => $v){
		$score[$k]=$v['score'];
	}
	array_multisort($score,$a);
	// var_dump($score);
	// var_dump($a);



	/** 
	* 二维数组根据某个字段排序 
	* 功能：按照用户的年龄倒序排序 
	* 
	*/  
	$arrUsers = array(  
		array(  
		'id'   => 1,  
		'name' => '张三',  
		'age'  => 25,  
		),  
		array(  
		'id'   => 2,  
		'name' => '李四',  
		'age'  => 23,  
		),  
		array(  
		'id'   => 3,  
		'name' => '王五',  
		'age'  => 40,  
		),  
		array(  
		'id'   => 4,  
		'name' => '赵六',  
		'age'  => 31,  
		),  
		array(  
		'id'   => 5,  
		'name' => '黄七',  
		'age'  => 20,  
		),  
	);   


	$sort = array(  
	'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
	'field'     => 'age',       //排序字段  
	);  
	$arrSort = array();  
	foreach($arrUsers AS $uniqid => $row){  
		foreach($row AS $key=>$value){  
		$arrSort[$key][$uniqid] = $value;  
		}  
	}  
	if($sort['direction']){  
		array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);  
	}  

	var_dump($arrUsers);

	
	// while each
	$contact = array("ID" => 1,"姓名" => "高某","公司" => "A公司","地址" => "北京市");
 
	while(list($key,$value) = each($contact)){
		echo "<dd>$key : $value</dd>";
	}


	






?>