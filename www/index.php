<?php
require('vendor/autoload.php');

use textreview\Book;

$books = new Book();
$items = $books -> getItems();

$loader = new Twig\Loader\FilesystemLoader('templates');
$twig = new Twig\Environment($loader, [
  "cache" => false,
]);
echo $twig -> render('home.html.twig', ['books' => $items, 'page_title' => 'TextReview'] );


?>           