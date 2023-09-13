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
 if (! $form->validate($email, $password) ){
     view('sessions/create.view.php', [
         'errors' => $form->errors()
     ]);
     exit();
 }

 $auth = new Authenticator();
if ( $auth->attempt($email, $password)){
   redirect('/');
}

view('sessions/create.view.php');


