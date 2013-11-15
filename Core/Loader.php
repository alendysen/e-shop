<?php

namespace Core;

spl_autoload_register('Core\Loader::load');
/**
* Loader
*/
class Loader
{
	static public function load($class)
	{
		$filename = BASEPATH . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
		if (file_exists($filename)) {
			require $filename;
		}else{
			throw new MyException("Gagal load file $filename", 1);
		}

	}
}
