<?php


use core\Database;
use core\Validator;
use core\App;

//validate the email and password -- not empty and in correct format
$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$db = App::resolve(Database::class);


//validate email and password
if (!Validator::email($email) ||! Validator::string($password, 7)) {
    $errors['email'] = "A valid email address and password must be provided";
}


if (! empty($errors)) {
     view('sessions/create.view.php', [
        'errors' => $errors
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


