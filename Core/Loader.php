<?php

namespace Core;

spl_autoload_register('Core\Loader::autoload');
/**
* Loader
*/
class Loader
{
	static function autoload($className)
	{
		$className = ltrim($className, '\\');
		$fileName  = '';
		$namespace = '';
		if ($lastNsPos = strrpos($className, '\\')) {
			$namespace = substr($className, 0, $lastNsPos);
			$className = substr($className, $lastNsPos + 1);
			$fileName  = BASEPATH . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
		}
		$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

		require $fileName;
	}
}

/*
static public function load($class)
	{
		$filename = BASEPATH . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
		if (file_exists($filename)) {
			require $filename;
		}else{
			throw new MyException("Gagal load file $filename", 1);
		}

	}
*/
