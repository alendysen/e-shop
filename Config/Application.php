<?php

namespace Config;

/**
* class Config\Application
*
* configurasi utama aplikasi
*/

class Application
{
	static $config = array('default_controller' => 'Home');

	public function __construct()
	{
		switch (ENVIRONMENT) {
			case 'development':
				self::$config = array_merge(self::$config, Environments\Development::$config);
				break;
			case 'testing':
				self::$config = array_merge(self::$config, Environments\Testing::$config);
				break;
			case 'production':
				self::$config = array_merge(self::$config, Environments\Production::$config);
				break;
		}
	}

	static public function set($property, $val){
		self::$config[$property] = $val;
	}

	static public function __callStatic($name, $arg)
	{
		return self::$config[$name];
	}

	public function __call($name, $arg)
	{
		return self::$config[$name];
	}
}
