<?php



use Core\Validator;
use Core\Database;

$config = require base_url('config.php');
$db = new Database($config['database']);

$errors = [];

if (! Validator::string($_POST['title'], 1, 1000)) {
    $errors['title'] = 'A body of no more than 1,000 characters is required.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO notes(title, user_id) VALUES(:title, :user_id)', [
    'title' => $_POST['title'],
    'user_id' => 1
]);

header('location: /notes');
die();
