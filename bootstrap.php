<?php

use core\Database;
use core\Container;
use core\App;

$container = new Container();

$container->bind('core\Database', function () {
    $config = require base_url('config.php');
    return new Database($config['database']);

});

$db = $container->resolve('core\Database');

App::setContainer($container);


