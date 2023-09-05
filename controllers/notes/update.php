<?php

use Core\Validator;
use core\App;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['title'], 1, 1000)) {
    $errors['title'] = 'A body of no more than 1,000 characters is required.';
}

$db->query('UPDATE notes set title = :title  WHERE id= :id ' , [
    'title' => $_POST['title'],
    'id' => $_POST['id']

]);

header('location: /notes');
die();
