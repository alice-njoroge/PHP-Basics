<?php
require "functions.php";
require "Database.php";

// connect to db and execute a query


$db = new Database();
$posts = $db->query("select * from posts")->fetchall(PDO::FETCH_ASSOC);

foreach ($posts as $post){
    echo "<li>" . $post['title'] . "</li>";
}
