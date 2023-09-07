<?php


use core\Database;
use core\Validator;
use core\App;
use \Http\Forms\LoginForm;

//validate the email and password -- not empty and in correct format
$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$form = new LoginForm($email, $password);
 if (! $form->validate($email, $password) ){
     view('sessions/create.view.php', [
         'errors' => $form->errors()
     ]);
     exit();
 }

//find if there is such a matching user in the db
$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

//is password correct? then add the email to the session and reroute the user to home page
if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);
        header('location: /');
        exit();
    }
}


