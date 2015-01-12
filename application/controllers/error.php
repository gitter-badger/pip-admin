<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class Error extends Controller {
	
	function index()
	{
		$this->error404();
	}

	function error404()
	{
		echo '<h1>404 Error</h1>';
		echo '<p>Looks like this page doesn\'t exist</p>';
	}
    
}

?>
