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

function filterByAuthor($books, $author)
{
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


<?php
//list of my favourite movies

$movies = [
    [
        "name" => "cursed away",
        "releaseYear" => 2019
    ], [
        "name" => "6 feet under",
        "releaseYear" => 2011
    ], [
        "name" => "Mr and Mrs Smith",
        "releaseYear" => 2012
    ]
];

$filterByYear = function ($movies){
    $filteredMovies = [];
    foreach($movies as $movie){
        if ($movie['releaseYear'] > 2015){
            $filteredMovies[] = $movie;
        }
    }
    return $filteredMovies;
}

?>


<ul>
    <?php foreach($filterByYear($movies) as $movie) : ?>
    <li>
        <?= $movie['name']; ?>
    </li>
    <?php endforeach;?>
</ul>
</body>
</html>