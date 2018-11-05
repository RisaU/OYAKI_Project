<?php 

class dbConnect {

  const DB_HOST = "localhost";
  const DB_NAME = "oyaki";
  const DB_USER = "root";
  const DB_PASSWORD = "";
  private $db;

  public function __construct()
  {
    $this-> $db = $this->pdo();
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
      $pdo = new PDO(
        'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASSWORD, $options
      );
      // throw an error
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage() . "<br>";
      die();
    }
    return $pdo;
  }

  public function select($sql) 
  {
    $stmt = $this->$db->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);// 連想配列

    return $items;
  }

  // SELECT, INSERT, UPDATE, DELETE
  public function plural($sql, $item = null)
  {
    $stmt = $this->$db->prepare($sql);

    if (empty($item)) {
      $res = $stmt->execute();
    } else {
      $res = $stmt->execute(array(':id'=>$item));
    }
     return $res;
  }

}




?>