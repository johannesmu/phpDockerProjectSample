<?php
// enable composer autoloading
require("vendor/autoload.php");

//request classes from autoloader
use textreview\Book;

$book = new Book();
$items = $book -> getItems();
$site_name = "Textreview";

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );
// json --> { "name" : "lucy", "location" : "melbourne" }
echo $twig -> render(
  "home.html.twig", 
  [
    "page_title" => "TextReview", 
    "greeting" => "Hello there", 
    "books" => $items,
    "site_name" => $site_name
  ] );
?>