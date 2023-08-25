<?php

$config = require "config.php";
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id'=> $id])->fetch();

$heading = "Note";

require "views/note.view.php";