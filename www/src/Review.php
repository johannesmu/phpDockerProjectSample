<?php
namespace textreview;

use textreview\Database;
use Exception;

class Review extends Database {
  private $dbconnection;

  public function __construct() {
    parent::__construct();
    $this -> dbconnection = parent::getConnection();
  }

  public function addReview( $book_id, $account_id, $title, $text ) {
    if( empty($book_id) || empty($account_id) || empty($title) || empty($text) ) {
      return false;
    }
    // if none is empty
    $query = "
    INSERT INTO review ( book_id, account_id, title, text, created, updated, active )
    VALUES ( ?, ?, ?, ?, NOW(), NOW(), 1 )
    ";
    // pass query to database through database connection
    try{
      $statement = $this -> dbconnection -> prepare($query);
      if( !$statement ) { 
        throw new Exception("query error"); 
      }
      $statement -> bind_param( "iiss", $book_id, $account_id, $title, $text );
      if( !$statement -> execute() ) {
        throw new Exception("execute error");
      }
      else {
        return true;
      }
    }
    catch( Exception $exc ) {
      error_log( $exc -> getMessage() );
    }
  }

  public function getBookReviews( $book_id ) {
    $query = "
    SELECT 
    id,
    book_id,
    account_id,
    title,
    text
    FROM
    review
    WHERE book_id = ?
    ";
    try{
      $statement = $this -> dbconnection -> prepare( $query );
      if( !$statement ) { 
        throw new Exception("query error"); 
      }
      $statement -> bind_param( "i", $book_id );
      if( !$statement -> execute() ) {
        throw new Exception("execute error");
      }
      else {
        $result = $statement -> get_result();
        $reviews = array();
        while( $row = $result -> fetch_assoc() ) {
          array_push( $reviews, $row );
        }
        return $reviews;
      }
    }
    catch( Exception $exc ) {
      error_log( $exc -> getMessage() );
    }
  }

  public function getUserReviews( $account_id ) {
    $query = "
    SELECT 
    id,
    book_id,
    account_id,
    title,
    text
    FROM
    review
    WHERE account_id = ?
    ";
    try{
      $statement = $this -> dbconnection -> prepare( $query );
      if( !$statement ) { 
        throw new Exception("query error"); 
      }
      $statement -> bind_param( "i", $account_id );
      if( !$statement -> execute() ) {
        throw new Exception("execute error");
      }
      else {
        $result = $statement -> get_result();
        $reviews = array();
        while( $row = $result -> fetch_assoc() ) {
          array_push( $reviews, $row );
        }
        return $reviews;
      }
    }
    catch( Exception $exc ) {
      error_log( $exc -> getMessage() );
    }
  }
}
?>