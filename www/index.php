<?php
require('vendor/autoload.php');

use textreview\Book;

$books = new Book();
$items = $books -> getItems();

print_r( $items );

?>           