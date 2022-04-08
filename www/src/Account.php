<?php

namespace textreview;

use textreview\Database;
use Exception;

class Account extends Database {
  private $dbconnection;

  public function __construct() {
    parent::__construct();
    $this -> dbconnection = parent::getConnection();
  }

  public function create( $email, $password ) {
    $errors = array();
    $response = array();
    // check if email is valid
    if( !filter_var( $email, FILTER_VALIDATE_EMAIL) ) {
      $errors["email"] = "Invalid email address";
    }
    // check password length
    if( strlen($password) < 8 ) {
      $errors["password"] = "Password must be longer than 8 characters";
    }

    if( count($errors) == 0 ) {
      // create the account
      $query = "INSERT INTO account (email,password,created,updated,status) 
      VALUES( ?, ?, NOW(), NOW(), 1 )";
      $statement = $this -> dbconnection -> prepare( $query );
      $hashed = password_hash( $password, PASSWORD_DEFAULT );
      $statement -> bind_param( "ss" , $email, $hashed );
      // try to execute statement
      try{
        if( !$statement -> execute() ) {
          throw new Exception("account cannot be created");
        }
        else {
          $response["success"] = true;
          $response["message"] = "Account has been created!";
        }
      }
      catch( Exception $exc ) {
        $errors["system"] = $exc -> getMessage();
        if( $this -> dbconnection -> errno == "1062") {
          $errors["account"] = "The email address already exists";
        }
        $response["success"] = false;
        $response["message"] = "Account cannot be created";
        $response["errors"] = $errors;
      }
    }
    else {
      // return errors to user
      $response["success"] = false;
      $response["message"] = "Account cannot be created";
      $response["errors"] = $errors;
    }

    return $response;
  }

  public function login( $email, $password ) {
    $errors = array();
    $response = array();

    $query = "
    SELECT 
    id, email, password, status
    FROM account
    WHERE status = 1 
    AND
    email = ?
    ";

    $statement = $this -> dbconnection -> prepare( $query );
    $statement -> bind_param( "s", $email );

    try {
      if( !$statement -> execute() ) {
        throw new Exception("Error executing query");
      }
      else {
        $result = $statement -> get_result();
        if( $result -> num_rows == 0 ) {
          throw new Exception("Account does not exist");
        }
        else {
          $account_data = $result -> fetch_assoc();
          if( password_verify( $password, $account_data["password"] ) ) {
            $response["success"] = true;
            $response["id"] = $account_data["id"];
            $response["email"] = $account_data["email"];
            return $response;
          }
          else {
            throw new Exception("Password is incorrect");
          }
        }
      }
    }
    catch ( Exception $exc ) {
      $errors["system"] = $exc -> getMessage();
      $response["success"] = false;
      $response["errors"] = $errors;
      return $response;
    }
  }
}
?>