<?php

if (!function_exists('get_file')) {
	function get_file($path) {
		return file_get_contents($path);
	}
}

if (!function_exists('set_file')) {
	function set_file($path, $content = "", $expire = "") {
		
		$path = pathinfo($path);
		$filepath = '/';
		
		foreach(explode('/', $path['dirname']) as $v){
			if (!empty($v)) {
				$filepath .= $v.'/';
				if (!is_readable($filepath)) mkdir($filepath);
			}
		}
		
		$filepath .= $path['basename'];
		return file_put_contents($filepath, $content);
	}
}



?>