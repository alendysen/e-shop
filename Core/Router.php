<?php
namespace Core;

class Router
{
	public $routes;
	public $params = array();
	public $request_uri;

	static function dispatch()
	{
		$self = new Router;
		$self->request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
		if (empty($self->request_uri[0]) || stristr($self->request_uri[0], 'index.php')) {
			$self->params['controller'] = \Config\Application::$default_controller;
			$self->params['method'] = 'index';
		}else{
			$self->params['controller'] = ucfirst($self->request_uri[0]);
			array_shift($self->request_uri);
			$self->params['method'] = $self->request_uri[0] ? $self->request_uri[0] : 'index';
			array_shift($self->request_uri);
		}
		$controller = 'App\Controller\\'.$self->params['controller'];
		$cont = new $controller;
		call_user_func_array(array($cont, $self->params['method']), $self->request_uri);
		return $self;
	}
}
