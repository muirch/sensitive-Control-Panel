<?php

namespace app\controllers;

use app\core\Controller;

/**
 * Class MainController
 * @package app\controllers
 */
class MainController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function indexAction()
    {
        $params = [
            'uptime' => $this->model->serverUpTime(),
            'stats' => $this->model->serverStats(),
        ];
        $this->view->render($params);
    }
}