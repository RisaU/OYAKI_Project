<?php 
require_once "./dbConnect.php";

$error = $title = $content = '';


if (@$_POST['submit']) {
  if(!$_POST["title"]) $error .= "No title.<br>";
   
   if(mb_strlen($_POST["title"]) > 80) {
    $error .= "The title is too long. <br>";
  }

  if(!$_POST["content"]) $error .= "No content.<br>";
 
  if(!$error) {
    $db = new dbConnect();

    //$title = mysqli_real_escape_string($db, $_POST["title"]);
    //$content = mysqli_real_escape_string($db, $_POST["content"]);
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO post(title, content) 
            VALUES ('" . $title . "', '". $content ."');";
    $db->plural($sql);

    header("Location: index.php");
    exit();
  }
}

require_once "t_post.php";
?>