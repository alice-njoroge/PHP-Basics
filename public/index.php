<?php
const BASE_URL = __DIR__ . '/../';
require BASE_URL . "core/functions.php";

spl_autoload_register(function ($class) {
    // Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_url("{$class}.php");
});
require base_url("core/router.php");







