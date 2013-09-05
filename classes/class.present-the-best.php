<?php 
/*
 * Controller class
 * */

class PresentTheBest{
	
	var $timer;
	
	
	function __construct(){
		include $this->get_ptb_dir() . 'classes/class.count-down-timer.php';
		$this->timer = new CountDownTimer();
		
		do_action('present_the_best_init');
	}
	
	//get the rul
	function get_ptb_url(){
		return PRESENTTHEBEST_URI;
	}
	
	
	//get the directory
	function get_ptb_dir(){
		return PRESENTTHEBEST_DIR;
	}
	
}

?>