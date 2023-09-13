<?php

use core\Authenticator;
use core\Database;
use \core\Validator;
use \core\App;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$db = App::resolve(Database::class);

//validate email and password
if (!Validator::email($email)) {
    $errors['email'] = "A valid email address must be provided";
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "A password of minimum 7 characters is required";
}


if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
//check if an account already exists in the db
$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();


//if yes --> reroute to login but go home for now, since I dont have a login
if ($user) {
    header('location: /');
    exit();
} else {
    //if no --> register and login
    $db->query('INSERT INTO USERS (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login($user);

    header('location: /');
    exit();

}


