<?php

function get_random_string($size = 8) {
	$charlist = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-";
	mt_srand();
	$str = "";
	for ($i = 0; $i < $size; $i++) $str .= $charlist[mt_rand(0, strlen($charlist)-1)];
	return $str;
}


?>