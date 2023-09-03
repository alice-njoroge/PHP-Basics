<?php

use core\Router;

const BASE_URL = __DIR__ . '/../';
require BASE_URL . "core/functions.php";

spl_autoload_register(function ($class) {
    // Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_url("{$class}.php");
});

$router = new Router();
$routes = require base_url("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);







