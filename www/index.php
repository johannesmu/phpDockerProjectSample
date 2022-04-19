<?php
// enable composer autoloading
require("vendor/autoload.php");

//request classes from autoloader
use textreview\Book;
use textreview\Session;

$book = new Book();
$items = $book -> getItems();
$site_name = "Textreview";
$email = Session::get("email");

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "home.html.twig", 
  [
    "page_title" => "TextReview", 
    "greeting" => "Hello there", 
    "books" => $items,
    "site_name" => $site_name,
    "email" => $email
  ] );
?>