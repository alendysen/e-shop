<?php

namespace Core;
/**
 * Class MyException
 */
class MyException extends \Exception
{

    /**
     *
     * $code
     * jika 0 maka ....
     */
    public function __construct($message, $code = 0)
    {
        echo '<pre>';
        parent::__construct($message, $code);
        $this->addExceptionToLogFile();
    }

    public function __toString()
    {
        return __CLASS__ . ":
        Exception code = [{$this->code}]: \n
        Exception message ={$this->message}\n";
    }

    public function addExceptionToLogFile() {
        # TODO add message to log file
    }
}


/**
* ClassNotFoundException
*/
class ClassNotFoundException extends \Exception
{
	public function __construct($class)
    {
        echo '<pre>';
        echo "$class not found \n";
        echo '</hr>';
        parent::__construct($class);
    }
}
