<?php
$config = require "config.php";
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $title = trim($_POST['title']);

    if (empty($title)) {
        $errors['body'] = "A body is required";
    }

    if (strlen($_POST['title']) > 100){
        $errors['body'] = "title cannot be more than 100 characters.";
    }

    if (empty($errors)){
        $db->query('insert into notes(title, user_id) values(:title, :user_id)', [
            'title' => $title,
            'user_id' => 1
        ]);
    }
}

$heading = "Create a Note";

require "views/note-create.view.php";