<?php

namespace app\core;

/**
 * View class for
 */
class View {
    /**
     * @var string
     */
    public $path;
    /**
     * @var
     */
    public $route;
    /**
     * @var string
     */
    public $layout = 'core';
    /**
     * View constructor.
     * @param $route
     */
    public function __construct($route) {
        $this->route = $route;
		$this->path = $route['controller'] . '/' . $route['action'];
	}
    /**
     * @param $p_title
     * @param array $params
     */
    public function render($params = []) {
		extract($params);
		$path = 'app/views/' . $this->path . '.php';
		if (file_exists($path)) {
			ob_start();
			require 'app/views/' . $this->path . '.php';
			$content = ob_get_clean();
			require 'app/views/layouts/' . $this->layout . '.php';
		} else {
			View::errorCode(404);
		}
	}
    /**
     * @param $url
     */
    public function redirect($url) {
		header('Location: ' . $url);
		exit;
	}
    /**
     * @param $code
     */
    public static function errorCode($code) {
		http_response_code($code);
		$path = 'app/views/errors/' . $code . '.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}
    /**
     * @param $status
     * @param $message
     */
    public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}
    /**
     * @param $url
     */
    public function location($url) {
		exit(json_encode(['url' => $url]));
	}
}