<?php
require_once 'dbCon.php';
session_start();
$id = 1;

if(@$_GET) {
    $id = htmlspecialchars($_GET['id']);
    //$id = $_GET['id'];
}
$db = doDB();
$sql = "SELECT * FROM store_orders WHERE id=" . $id . ";";
$res = mysqli_query($db, $sql) 
  or die(mysqli_error($db));


  $info = mysqli_fetch_assoc($res);

  // close session
  $_SESSION = array();
  session_destroy();

  require_once 't_checkout_done.php';

?>