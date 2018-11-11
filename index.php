<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * sensitive Control Panel
 * @author Ivan Muir aka sensitivesouris <mimuir@ya.ru>
 * @copyright 2018 sensitivesouris <sensou.me>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @version indev
 */
use app\core\Router;
/**
 * Autoload method for MVC and composer
 */
require_once 'autoload.php';
set_include_path(get_include_path() . PATH_SEPARATOR . 'vendor/phpseclib');
include('Net/SSH2.php');
/**
 * Start of session
 */
session_start();
/**
 * Starts application's Router
 */
$app = new Router;
$app->run();