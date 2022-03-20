<?php
// enable composer autoloading
require("vendor/autoload.php");

use textreview\Book;

// global variable
$book_id = $_GET['id'];
echo $book_id;

$book = new Book();
$detail = $book -> getDetail($book_id);


?>