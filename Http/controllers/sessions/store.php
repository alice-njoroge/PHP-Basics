<?php


use core\Authenticator;
use core\Database;
use core\App;
use \Http\Forms\LoginForm;

//validate the email and password -- not empty and in correct format
$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$form = new LoginForm();
if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('password', 'No matching account for that email and password');
}

$_SESSION['_flashed']['errors'] = $form->errors();

redirect('/login');


