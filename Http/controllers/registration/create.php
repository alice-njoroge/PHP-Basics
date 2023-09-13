<?php


use core\Session;

view('registration/create.view.php', [
    'errors' => Session::get('errors')
]);