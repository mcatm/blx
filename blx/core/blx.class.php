<?php

/* ----------------------------------------------------------
	
	blx core
	
---------------------------------------------------------- */

class Blx {
	
	var $task;
	
	// すべてのモジュールは、blxのオブジェクトとして生成される
	public function load($class) {
		require_once($class.'.class.php');
		$this->$class = new $class();
	}
	
	//taskを追加
	//@key : action_key
	//@callback : function name (if it's array, 1st arg is class name)
	//@arg : argument
	//@order : action order (action from 0)
	
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
		foreach($this->task[$key] as $t) {
			if (is_array($t['callback'])) {
				$this->$t['callback'][0]->$t['callback'][1]($t['arg']);
			} else {
				$this->$t['callback']($t['arg']);
			}
		}
	}
}

?>