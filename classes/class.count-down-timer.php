<?php 

/*
 * This class is responisble to run count down timer
 * */
class CountDownTimer{
	
	private $short_code = "down_timer";
	
	private $timer_action_script = '<div id="%s"></div>
			<script type="text/javascript">
				jQuery(function () {					
					austDay = new Date(%s, %s - 1, %s);
					jQuery("#%s").countdown({until: austDay});			
				});
			</script>';
	
		
	function __construct(){
		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_the_scripts'));
		add_shortcode($this->short_code, array(&$this, 'parse_short_code'));
	}
	
	//enqueue the scripts for timer
	function enqueue_the_scripts(){
		global $ptb;
		
		//js
		wp_enqueue_script( 'jquery' );
		wp_register_script('jquery-count-down-timer', $ptb->get_ptb_url() . 'assets/timer/jquery.countdown.min.js', array('jquery'));
		wp_enqueue_script( 'jquery-count-down-timer' );
		
		//css
		wp_register_style('css-count-down-timer', $ptb->get_ptb_url() . 'assets/timer/jquery.countdown.css');
		wp_enqueue_style('css-count-down-timer');
	}
	
	
	//get the timer
	function parse_short_code($attr){
		global $post;
		$end = $attr['end'];
		$id = "wp-down-counter-" . $post->ID;
		return $this->get_timer($end, $id);
	}
		
	//get the timer
	function get_timer($end = null, $id = ''){
		if(empty($end) || empty($id)) return 'Ending date is abset for Timer';
		
		$time_stamp = strtotime($end);
		$year = date("Y", $time_stamp);
		$month = date('m', $time_stamp);
		$day = date('d', $time_stamp);
		return $this->get_timer_script($id, $year, $month, $day);
		
		/**
		return '<div id="defaultCountdown"></div><script type="text/javascript">
		jQuery(function () {
			var austDay = new Date();
			austDay = new Date(austDay.getFullYear(), 10 - 1, 12);
			jQuery("#defaultCountdown").countdown({until: austDay});			
		});
		</script>';
		*/
				
	}
	
	
	function get_timer_script($id, $year, $month, $day){
		return sprintf($this->timer_action_script, $id, $year, $month, $day, $id);
	}
	
}

?>