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
    }

    public function index()
    {
        \Core\Common::c($this->config->database());
    }
}
