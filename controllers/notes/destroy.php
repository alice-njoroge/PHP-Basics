<?php
use Core\Database;

$config = require base_url('config.php');
$db = new Database($config['database']);

$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


authorize($note['user_id'] !== $currentUserId, 403);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();