<?php
namespace textreview;

use textreview\Database;
use Exception;

class Book extends Database {
  private $dbconnection;
  public function __construct()
  {
    // call the __construct() method of the Database class to initialise
    parent::__construct();
    // get the connection after it's been created and keep a reference in 
    // a local variable called $db_connection
    $this -> dbconnection = parent::getConnection();
  }

  public function getItems() 
  {
    $query = "
    SELECT 
      book.book_id,
      book_title,
      tagline,
      isbn13,
      year,
      pages,
      book_image.image_id,
      image.file_name AS picture
      FROM book 
      INNER JOIN book_image
      ON book.book_id = book_image.book_id
      INNER JOIN image
      ON book_image.image_id = image.image_id
      WHERE 1
    ";

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
      else 
      {
        $books = array();
        $items = array();
        $result = $statement -> get_result();
        while( $row = $result -> fetch_assoc() ) 
        {
          array_push( $items, $row );
        }
        $books["total"] = count($items);
        $books["items"] = $items;

        return $books;
      }
      return null;
    }
    catch ( Exception $exception ) 
    {
      echo $exception -> getMessage();
    }
  }

  public function getDetail( $book_id ) {
    $query = "
    SELECT 
      book.book_id AS id,
      book_title,
      tagline,
      isbn13,
      isbn10,
      year,
      pages,
      image.file_name AS picture,
      author.first AS author_first,
      author.last AS author_last,
      publisher.name AS publisher
      FROM book 
      INNER JOIN book_image
      ON book.book_id = book_image.book_id
      INNER JOIN image
      ON book_image.image_id = image.image_id
      INNER JOIN book_author
      ON book.book_id = book_author.book_id
      INNER JOIN author
      ON book_author.author_id = author.author_id
      INNER JOIN book_publisher
      ON book.book_id = book_publisher.book_id
      INNER JOIN publisher
      ON book_publisher.publisher_id = publisher.publisher_id
      WHERE book.book_id = ?
    ";
    try {
      $statement = $this -> dbconnection -> prepare( $query );
      if( !$statement ) {
        throw new Exception("query error");
      }
      $statement -> bind_param( "i", $book_id );
      if( !$statement -> execute() ) {
        throw new Exception("query error");
      }
      else {
        $result = $statement -> get_result();
        $detail = $result -> fetch_assoc();
        return $detail;
      }
    }
    catch( Exception $exc) {
      echo $exc -> getMessage();
      return false;
    }
  }
}
