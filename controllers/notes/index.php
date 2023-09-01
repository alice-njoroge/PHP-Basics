<?php

use core\Database;

$config = require base_url("config.php");
$db = new Database($config['database']);

$notes = $db->query("select * from notes")->all();


view("notes/index.view.php", [
    'heading' => "My Notes",
    'notes'=> $notes
]);
