<?php
	//消除未定义变量php提示的warning
	//Attension: $str is a string!!!!
	function _get($str){ 
		$val = !empty($_GET[$str]) ? $_GET[$str] : null; 
		return $val; 
	} 
	
	function _post($str){ 
		$val = !empty($_POST[$str]) ? $_POST[$str] : null; 
		return $val; 
	} 
?>