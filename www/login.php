<?php
require("vendor/autoload.php");

use textreview\Account;
use textreview\Session;

$account = new Account();

$result = null;
$user_email = null;
$user_password = null;

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $user_email = $_POST["email"];
  $user_password = $_POST["password"];
  if( strlen($user_email) > 0 && strlen($user_password) > 0 ) {
    $result = $account -> login( $user_email, $user_password );
    if( $result["success"] == true ) {
      Session::set("email", $user_email);
      Session::set("account_id", $result["id"] );
      //redirect user to home page after login is successful
      header("location:index.php");
    }
  }
}

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

$site_name = "TextReview";

echo $twig -> render(
  "login.html.twig", 
  [
    "page_title" => "Login to TextReview", 
    "site_name" => $site_name,
    "result" => $result,
    "email" => $user_email,
    "password" => $user_password
  ] );
?>