<?php

namespace app\core;

/**
 * Core controller
 * used for ACL (account control).
 */
abstract class Controller {
    /**
     * @var
     */
    public $route;
    /**
     * @var \app\core\View
     */
    public $view;
    /**
     * @var
     */
    public $acl;
    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route) {
		$this->route = $route;
        $this->view = new View($this->route);
		$this->model = $this->loadModel($route['controller']);
	}
    /**
     * @param $model
     * @return mixed
     */
    public function loadModel($model) {
		$path = 'app\models\\' . ucfirst($model);
		if (class_exists($path)) {
			return new $path();
		}
		return false;
	}
}