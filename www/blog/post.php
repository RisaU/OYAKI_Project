<?php 
require_once "./dbConnect.php";

$error = $title = $content = '';

$db = new dbConnect();

$posts = $db->select("SELECT * FROM post ORDER BY no DESC");

if (@$_POST['submit']) {
  $title = mysqli_real_escape_string($_POST["title"]);
   $content = mysqli_real_escape_string($_POST["content"]);

  if(!$title) $error .= "No title.<br>";
   
   if(mb_strlen($title) > 80) {
    $error .= "The title is too long. <br>";
  }

  if(!$content) $error .= "No content.<br>";

  if(!$error) {
    $sql = "INSERT INTO post(title, content) 
            VALUES ('" . $title . "', '". $content ."');";
    $db->plural($sql);

    header("Location: index.php");
    exit();
  }
}

require_once "t_post.php";
?>