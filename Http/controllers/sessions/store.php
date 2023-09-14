<?php


use core\Authenticator;
use core\Database;
use core\App;
use core\Session;
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

Session::flash('errors',$form->errors());
Session::flash('old', [
    'email' => $email
]);

redirect('/login');


