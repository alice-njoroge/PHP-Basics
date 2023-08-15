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
    ],
    [
        "name" => "Seen and Mehr",
        "author" => "German",
        "publishURL" => "site@example.com",
        "publishYear" => "2005"
    ]
];
//making the inbuilt PHP filter function

$filteredItems = array_filter($books, function ($book){
    return $book["publishYear"] > 2004 && $book["publishYear"] < 2010;
});


require "index.view.php";