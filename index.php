<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>

<body>
<?php
$books = [
    [
        "name" => "Now I am Known",
        "author" => "Peter",
        "publishURL" => "site@example.com",
        "publishYear" => "2003"
    ],
    [
        "name" => "The culture map",
        "author" => "Emily",
        "publishURL" => "site@example.com",
        "publishYear" => "2007"
    ]
];

function filterByAuthor($books, $author){
    $filteredBooks = [];
    foreach ($books as $book) {
        if ($book['author'] === $author) {
            $filteredBooks[] = $book;
        }
    }
    return $filteredBooks;
}

?>

<ul>
    <?php foreach (filterByAuthor($books, 'Emily') as $book) : ?>
        <li>
            <?= $book['name']; ?>
        </li>
    <?php endforeach; ?>

</ul>
</body>
</html>