<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'oyaki');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


$options = array(
  // set UTF-8
  PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'"
);

// display error msg(except for notice)
error_reporting(E_ALL & ~E_NOTICE);

// connect DB
try {
  $db = new PDO(
    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, $options
  );
  // throw an error
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo $e->getMessage() . "<br>";
  exit;
}

$st = $db->query("SELECT * FROM post ORDER BY no DESC");
$posts = $st->fetchAll();

for($i=0; $i<count($posts); $i++) {
  $st = $db->query(
        "SELECT * FROM comment WHERE post_no={$posts[$i]['no']} ORDER BY no DESC"
  );
  $posts[$i]['comments'] = $st->fetchAll();
}

require_once 't_index.php';







































?>