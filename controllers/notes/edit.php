<?php

use core\Database;

$config = require  base_url("config.php");
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

view('notes/edit.view.php', [
    'heading' => 'Edit a Note',
    'note' => $note,
    'errors' => []]);