<?php
namespace Core;

/**
* Common
*/
class Common
{
	// check something value
	static public function c()
	{
		echo "<pre style=\"margin: 100px;
padding: 30px;
border-width: 1px;
border-bottom-left-radius: 4px;
border-bottom-right-radius: 4px;
border-radius: 0;
background-color: #f7f7f9;
border: 1px solid #e1e1e8;
box-sizing: border-box;\">";
		for($i = 0; $i < func_num_args(); $i++){
	        print_r(func_get_arg($i));
	        echo "<hr/>";
	    }
		echo "</pre>";
	}
	static public function multidimensional_search($parents, $searched) {
		if (empty($searched) || empty($parents)) {
			return false;
		}

		foreach ($parents as $key => $value) {
			$exists = true;
			foreach ($searched as $skey => $svalue) {
				$exists = ($exists && IsSet($parents[$key][$skey]) && $parents[$key][$skey] == $svalue);
			}
			if($exists){ return $key; }
		}

		return false;
	}
}
