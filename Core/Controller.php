<?php
namespace Core;

/**
* Controller
*/
class Controller
{

	function __construct()
	{
		$this->config = new \Config\Application;
		\Lib\RainTPL\RainTPL::$tpl_dir = BASEPATH . "App/View/" . strtolower(Common::getClass($this)) . '/'; // template directory
		\Lib\RainTPL\RainTPL::$cache_dir = BASEPATH . "tmp/"; // cache directory
		$this->view = new \Lib\RainTPL\RainTPL();
	}
}
