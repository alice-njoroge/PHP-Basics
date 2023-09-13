<?php
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die ();
}

function urlIs($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}

function authorize($condition, $status)
{
    if ($condition) {
        abort($status);
    }
}

function base_url($path){
    return BASE_URL . $path;
}

function view($path, $attributes = []){
    extract($attributes);
    require base_url( 'views/' .$path);
}

function abort($code = 404)
{
    http_response_code($code);

    require base_url("views/{$code}.php");

    die();
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}


