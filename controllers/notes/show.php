<?php

use core\Database;
use core\Response;

$config = require  base_url("config.php");
$db = new Database($config['database']);

$id = $_GET['id'];
$currentUserId = 1;


$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

authorize($note['user_id'] !== $currentUserId, Response::FORBIDDEN);

view("notes/show.view.php", [
    'heading' => "Note",
    'note'=> $note
]);