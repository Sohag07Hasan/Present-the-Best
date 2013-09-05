<?php 

/*
 * Plugin Name: Present The Best
 * Author: Mahibul Hasan Sohag
 * Author uri: http://sohag07hasan.elance.com
 * plugin uri: http://www.presentsthebest.com/
 * */

define("PRESENTTHEBEST_FILE", __FILE__);
define("PRESENTTHEBEST_DIR", dirname(__FILE__) . '/');
define("PRESENTTHEBEST_URI", plugins_url('/', __FILE__));

include PRESENTTHEBEST_DIR . 'classes/class.present-the-best.php';
global $ptb;
$ptb = new PresentTheBest();


?>