<?php
$config = require "config.php";
require 'Validator.php';

$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];


    if (! Validator::string($_POST['title'], 1, 100)) {
        $errors['body'] = "A title of max 100 characters is required";
    }

    if (empty($errors)){
        $db->query('insert into notes(title, user_id) values(:title, :user_id)', [
            'title' => trim($_POST['title']),
            'user_id' => 1
        ]);
    }
}

$heading = "Create a Note";

require "views/note-create.view.php";