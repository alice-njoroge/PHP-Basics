<?php
$config = require "config.php";
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db->query('insert into notes(title, user_id) values(:title, :user_id)', [
        'title' => $_POST['title'],
        'user_id'=> 1
    ]);
}

$heading = "Create a Note";

require "views/note-create.view.php";