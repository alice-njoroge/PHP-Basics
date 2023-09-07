<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

view('notes/edit.view.php', [
    'heading' => 'Edit a Note',
    'note' => $note,
    'errors' => []]);