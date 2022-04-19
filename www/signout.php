<?php
require("vendor/autoload.php");

use textreview\Session;

// unset the session variables for email and account_id
Session::unset("email");
Session::unset("account_id");

header("location: index.php");
?>