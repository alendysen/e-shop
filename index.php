<?php

define('ENVIRONMENT', 'development');

switch (ENVIRONMENT)
{
        case 'development':
                error_reporting(-1);
                ini_set('display_errors', 1);
        break;

        case 'testing':
        case 'production':
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
                ini_set('display_errors', 0);
        break;

        default:
                header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
                echo 'The application environment is not set correctly.';
                exit(1); // EXIT_* constants not yet defined; 1 is EXIT_ERROR, a generic error.
}

define('APP_PATH', realpath('app'). '/');

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path ke folder core
define('COREPATH', str_replace('\\', '/', realpath('core')));

// Path ke file ini
define('BASEPATH', str_replace(SELF, '', __FILE__));

require_once 'Core/Exception.php';
require_once 'Core/Loader.php';

try{
	Core\Router::dispatch();
}
catch (Core\ClassNotFoundException $e){
    echo $e->getMessage();
    exit();
}
catch (Exception $e){
    echo $e->getMessage();
    exit();
}
