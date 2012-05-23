<?php

class Log {
	
	public function set($msg = "message", $lv = 0) {
		global $blx;
		$blx->add_function('file');
		
		$filename = LOG_PATH.date('Y-m-d').'.log';
		
		$content = "";
		if (is_readable($filename)) $content = get_file($filename);
		
		$content .= '['.date('Y-m-d h:i:s').'] '.$msg."\n";
		
		#print $content.'<br />';
		
		set_file($filename, $content);
	}
	
	function __construct() {
		#$this->set('test');
	}
}

?>