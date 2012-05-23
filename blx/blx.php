<?php

define('SYSTEM_PATH', dirname(__FILE__).'/');// define system path

define('CACHE_PATH', SYSTEM_PATH.'cache/');// define cache path
define('LOG_PATH', SYSTEM_PATH.'log/');// define log path

require_once(SYSTEM_PATH.'core/blx.class.php');// load core

$blx = new Blx();

if (!empty($cfg['autoload']['module'])) {
	foreach($cfg['autoload']['module'] as $v) $blx->add_task('load_'.$v, 'init', 'load', $v);
}

if (!empty($cfg['autoload']['function'])) {
	foreach($cfg['autoload']['function'] as $v) $blx->add_function($v);
}

$blx->add_task('test', 'output', array('log', 'set'), get_random_string(64));

/* ----------------------------------------------------------
	
	DO Tasks!
	
---------------------------------------------------------- */

$blx->do_task('init');
$blx->do_task('output');

/* ----------------------------------------------------------
	
	Debug
	
---------------------------------------------------------- */

echo '<pre>';
print_r($blx);
echo '</pre>';
?>