<?php

define('SYSTEM_PATH', dirname(__FILE__).'/');// define system path

require_once(SYSTEM_PATH.'core/blx.class.php');// load core

$blx = new Blx();

//URIの処理
$blx->add_task('init', 'load', 'uri');
$blx->add_task('init', array('uri', 'set_mode'));
$blx->add_task('output', array('uri', 'test'), '1');

//出力の処理
$blx->add_task('init', 'load', 'output');

/* ----------------------------------------------------------
	
	DO Tasks!
	
---------------------------------------------------------- */

$blx->do_task('init');

if ('admin' === MODE) {
	$blx->load('admin');
	$blx->add_task('admin_init', array('admin', 'init'));
}

$blx->do_task('output');

exit(MODE);

#echo '<pre>';
#print_r($blx);
#echo '</pre>';
?>