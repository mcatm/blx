<?php

define('SYSTEM_PATH', dirname(__FILE__).'/');// define system path

require_once(SYSTEM_PATH.'config.php');// load config
require_once(SYSTEM_PATH.'core/blx.class.php');// load core

$blx = new Blx();

//URIの処理
$blx->add_task('init', 'load', 'uri');

// Do Init
$blx->do_task('init');
?>