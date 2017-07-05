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
 // echo $c;











?>