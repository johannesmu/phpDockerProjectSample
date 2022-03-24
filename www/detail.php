<?php
// enable composer autoloading
require("vendor/autoload.php");

use textreview\Book;

// global variable
$book_id = $_GET['id'];

$book = new Book();
$detail = $book -> getDetail($book_id);
$title = $detail["book_title"];

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "detail.html.twig", 
  ["page_title" => "TextReview/$title", 
  "greeting" => "Hello there", 
  "book" => $detail ] 
);
?>