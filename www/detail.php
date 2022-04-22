<?php
// enable composer autoloading
require("vendor/autoload.php");

use textreview\Book;
use textreview\Session;
use textreview\Review;


// global variable
$book_id = $_GET['id'];
// echo $book_id;

$book = new Book();
$detail = $book -> getDetail($book_id);
$book_title = $detail['book_title'];
$site_name = "Textreview";
$email = Session::get("email");
$account_id = Session::get("account_id");
// instantiate the review class
$review = new Review();
// true if user has just submitted a review
$submitting = false;
// false if review submission fails
$success = true;
// message to show the user after submission
$message = "";

// if a review is submitted (via POST request)
if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $title = $_POST["title"];
  $text = $_POST["text"];
  // create the review
  $add = $review -> addReview($book_id, $account_id, $title, $text );
  if( $add == true ) {
    // tell user review has been posted
    $submitting = true;
    $success = true;
    $message = "Your review has been submitted";
  }
  else {
    // tell user review is not created
    $submitting = true;
    $success = false;
    $message = "Your review cannot be submitted";
  }
}

// get book reviews
$book_reviews = $review -> getBookReviews( $book_id );
// check if user has a review for this book
$user_book_review = $review -> getUserReviewForBook( $book_id, $account_id);
if( $user_book_review ) {
  $reviewed_by_user = true;
}
else {
  $reviewed_by_user = false;
}

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render("detail.html.twig", [
  "page_title" => "TextReview $book_title",
  "book" => $detail,
  "site_name" => $site_name,
  "email" => $email,
  "account_id" => $account_id,
  "reviews" => $book_reviews,
  "submitting" => $submitting,
  "success" => $success,
  "message" => $message,
  "reviewed" => $reviewed_by_user
  ] 
);

?>