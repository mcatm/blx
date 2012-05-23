<?php

$cfg = array();

define('SITE_PATH', dirname(__FILE__).'/');

define('QUERY_TYPE', 'REQUEST_URI');

$cfg['autoload']['module'] = array('log', 'session', 'uri', 'output');
$cfg['autoload']['function'] = array('string');


/*

$blx->add_task('init', 'load', 'string');//文字列の処理
$blx->add_task('init', 'load', 'file');//ファイルの管理
$blx->add_task('init', 'load', 'uri');//URIの処理
$blx->add_task('init', 'load', 'log');//記録処理
$blx->add_task('init', 'load', 'session');//セッション

*/

?>