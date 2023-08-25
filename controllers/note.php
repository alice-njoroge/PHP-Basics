<?php

$config = require "config.php";
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id'=> $id])->fetch();

if(! $note){
    abort();
}

$currentUserId = 1;

if ($note['user_id']  !== $currentUserId){
    abort(Response::FORBIDDEN);
}

$heading = "Note";

require "views/note.view.php";