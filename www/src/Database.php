<?php
namespace textreview;

use Exception;
use mysqli;

class Database
{
    private $username;
    private $password;
    private $host;
    private $db;
    private $port;
    private $db_connection;
    // function to set up the class (refer to magic methods in php)
    // https://www.php.net/manual/en/language.oop5.magic.php

    protected function __construct()
    {
        // populate the credentials from variables set using SetEnv in the .htaccess file
        $this -> username = getenv("dbuser");
        $this -> password = getenv("dbpass");
        $this -> host = getenv("dbhost");
        $this -> db = getenv("dbname");
        $this -> port = getenv("dbport");
    }
    private function connect()
    {
      try {
        if(!$this -> username || !$this -> password || !$this -> host || !$this -> db )
        {
          throw new Exception("missing a db credential");
        }
        $this -> connection = mysqli_connect(
          $this -> host,
          $this -> username,
          $this -> password,
          $this -> db,
          $this -> port
        );
      }
      catch( Exception $exc )
      {
        error_log("database error: " . $exc -> getMessage() );
      }
    }
    protected function getConnection()
    {
        return $this->db_connection;
    }
}
