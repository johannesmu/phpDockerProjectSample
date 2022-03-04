<?php
namespace textreview;

use textreview\Database;
use Exception;

class Book extends Database {
  private $dbconnection;
  public function __construct()
  {
    parent::__construct();
    $this -> dbconnection = parent::getConnection();
  }

  public function getItems() 
  {
    $query = "SELECT * FROM book";
    try
    {
      $statement = $this -> dbconnection -> prepare( $query );
      if( !$statement ) 
      {
        throw new Exception("problem with query " . $query );
      }
      if( !$statement -> execute() ) 
      {
        throw new Exception("query failed to execute");
      }
    }
    catch ( Exception $exception ) 
    {
      echo $exception -> getMessage();
    }
  }
}
?>