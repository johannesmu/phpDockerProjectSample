<?php
// enable composer autoloading
require("vendor/autoload.php");

// declare classes used
use textreview\Search;

// capture search query url parameter
$search_query = $_GET["query"];

// instantiate the search class
$search = new Search();
print_r( $search -> lookUp($search_query) );

?>