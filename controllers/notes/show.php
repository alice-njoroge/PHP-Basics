<?php

$config = require "config.php";
$db = new Database($config['database']);

$id = $_GET['id'];
$currentUserId = 1;
$heading = "Note";

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

authorize($note['user_id'] !== $currentUserId, Response::FORBIDDEN);

require "views/notes/show.view.php";