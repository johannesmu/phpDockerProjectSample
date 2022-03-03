<?php
echo "hello world";
// phpinfo();
$myvar = 20;
$myname = "Johannes";
echo $myname . " " . $myvar;
$user = "root";
$pass = "password";
$name = "db_data";
$host = "db";
$connection = mysqli_connect( $host ,$user,$pass,$name, 3306);
if( $connection ) {
  echo "success!";
}
else {
  echo "dammmit!";
}

?>