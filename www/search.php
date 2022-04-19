<?php
// enable composer autoloading
require("vendor/autoload.php");

use textreview\Search;

$search = new Search();

// super global $_GET is used to access search term in variable called "query"
$search_term = $_GET["query"];
// echo "You are looking for " . $search_term;

$search_result = $search -> lookUp( $search_term );

//print_r( $search_result );
$site_name = "Textreview";
$count = count( $search_result );
// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "search.html.twig", 
  [
    "page_title" => "Search result for $search_term",  
    "result" => $search_result,
    "site_name" => $site_name,
    "total" => $count
  ] );
?>