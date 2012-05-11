<?php

/* ----------------------------------------------------------
	
	blx core
	
---------------------------------------------------------- */

class Blx {
	
	var $task;
	
	// すべてのモジュールは、blxのオブジェクトとして生成される
	public function load($class) {
		
		if (is_readable(SITE_PATH.'modules/'.$class.'.class.php')) {
			$filepath = SITE_PATH.'modules/'.$class.'.class.php';
		} elseif (is_readable(SITE_PATH.'modules/'.$class.'/'.$class.'.class.php')) {
			$filepath = SITE_PATH.'modules/'.$class.'/'.$class.'.class.php';
		} elseif (!$filepath && is_readable(SYSTEM_PATH.'core/'.$class.'.class.php')) {
			$filepath = SYSTEM_PATH.'core/'.$class.'.class.php';
		}
		
		if (isset($filepath) && !$this->$class) {
			require_once($filepath);
			$this->$class = new $class();
		}
	}
	
	/* ----------------------------------------------------------
		
		add_task
		
		@key : action_key
		@callback : function name (if it's array, 1st arg is class name)
		@arg : argument
		@order : action order (action from 0)
	
	---------------------------------------------------------- */
	
	public function add_task($key, $callback, $arg = array(), $order = 0) {
		$this->task[$key][] = array(
			'callback'	=> $callback,
			'arg'			=> $arg,
			'order'		=> $order
		);
	}
	
	//taskを削除
	public function remove_task() {
		
	}
	
	//アクション！
	public function do_task($key) {
		if (isset($this->task[$key])) {
			foreach($this->task[$key] as $t) {
				if (is_array($t['callback'])) {
					$this->$t['callback'][0]->$t['callback'][1]($t['arg']);
				} else {
					$this->$t['callback']($t['arg']);
				}
			}
		}
	}
}

?>