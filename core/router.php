<?php
$routes = require base_url("routes.php");

function abort ($code = 404){
    http_response_code($code);
    require base_url("views/{$code}.php");
    die();
}

function routeToController ($uri, $routes){
    if (array_key_exists($uri, $routes)){
        require  base_url($routes[$uri]);
    } else{
        abort(404);
    }
}
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
