<?php

namespace app\core;

/**
 * Router class
 */
class Router {
    /**
     * @var array
     */
    protected $routes = [];
    /**
     * @var array
     */
    protected $params = [];
    /**
     * Router constructor.
     */
    public function __construct() {
		$arr = require 'app/configs/routes.php';
		foreach ($arr as $key => $val) {
			$this->add($key, $val);
		}
	}
	/**
	 * Adds all routes from and prepares its for match function
	 */
    public function add($route, $params) {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }
	/**
	 * Uses routes from add function and checks if requisted url equals to url from configs
	 */
    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
	/**
	 * Runs application
	 */
    public function run(){
        if ($this->match()) {
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}