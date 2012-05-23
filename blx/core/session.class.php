<?php

/* ----------------------------------------------------------
	
	blx core > session
	
---------------------------------------------------------- */

class Session {
	
	function __construct() {
		global $blx;
		$blx->add_function('string');
		
		#$blx->log->set(get_random_string(64));
	}
}

?>