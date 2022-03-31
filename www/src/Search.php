<?php
namespace textreview;

use textreview\Database;
use Exception;

class Search extends Database {
  private $dbconnection;
  public function __construct()
  {
    parent::__construct();
    $this -> dbconnection = parent::getConnection();
  }
  public function lookUp( $term ) {
    $query = "
    SELECT book_title 
    FROM book 
    WHERE book_title LIKE ?";
    $statement = $this -> dbconnection -> prepare( $query );
    $search_term = "%$term%";
    $statement -> bind_param("s", $search_term );
    try {
      if( !$statement -> execute() ) {
        throw new Exception("query error");
      }
      else {
        $search_result = array();
        $result = $statement -> get_result();
        while( $row = $result -> fetch_assoc() ) {
          array_push( $search_result, $row );
        }
        return $search_result;
      }
    }
    catch( Exception $exc) {
      echo $exc -> getMessage();
    }
  }
}
?>