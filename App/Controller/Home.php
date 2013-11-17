<?php

namespace App\Controller;

/**
* Home
*/
class Home extends \Core\Controller
{

	function __construct()
	{
		parent::__construct();
		$this->post = new \App\Model\Posts;
	}

	public function index()
	{
		$this->post->select();
		$this->view->assign('listUser', $this->post->getResult());
		$this->view->assign('title', 'Home');
		$this->view->draw('index');
	}
}
