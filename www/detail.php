<?php
// enable composer autoloading
require("vendor/autoload.php");

use textreview\Book;

// global variable
$book_id = $_GET['id'];
// echo $book_id;

$book = new Book();
$detail = $book -> getDetail($book_id);
$book_title = $detail['book_title'];

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render("detail.html.twig", [
  "page_title" => "TextReview $book_title",
  "book" => $detail
  ] );

?>