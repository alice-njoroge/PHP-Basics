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
