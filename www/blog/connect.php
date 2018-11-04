<?php 

class dbConnect {

  const DB_HOST = "localhost";
  const DB_NAME = "oyaki";
  const DB_USER = "root";
  const DB_PASSWORD = "";

  public function __construct()
  {
    $this->pdo();
  }
  public function pdo () {

    $options = array(
      // set UTF-8
      PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'"
    );
  
    // display error msg(except for notice)
    error_reporting(E_ALL & ~E_NOTICE);
  
    // connect DB
    try {
      $db = new PDO(
        'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASSWORD, $options
      );
      // throw an error
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage() . "<br>";
      die();
    }

  }

}

?>