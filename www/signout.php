<?php
// enable composer autoloading
require("vendor/autoload.php");

use textreview\Session;

Session::unset("email");
Session::unset("account_id");

// redirect user
header("location:index.php");
?>