<?php

/* ----------------------------------------------------------
	
	URI Class
	
---------------------------------------------------------- */

class Uri {
	
	var $segment, $uri_string;
	
	public function get($num = 0) {
		if ($num > 0) $num--;
		return $this->segment[$num];
	}
	
	function __construct() {
		$this->uri_string = trim($_SERVER[QUERY_TYPE], '/');
		$this->segment = explode('/', $this->uri_string);
	}
}

?>