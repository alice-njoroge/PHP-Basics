<?php

use core\Router;
use core\Session;

session_start();

const BASE_URL = __DIR__ . '/../';
require BASE_URL . "core/functions.php";
require BASE_URL. "vendor/autoload.php";


require base_url("bootstrap.php");

$router = new Router();
$routes = require base_url("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();









