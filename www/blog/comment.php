<?php 
require_once "./dbConnect.php";

$post_id = $error = $name = $content = '';

if(@$_POST['submit']) {
  $post_id = strip_tags($_POST['post_id']);
  $name = strip_tags($_POST['name']);
  $content = strip_tags($_POST['content']);

  if(!$name) $error .= 'No name.<br>';
  if(!$content) $error .= 'No content.<br>';

  if(!$error) {
    $db = new dbConnect();
    $sql = "INSERT INTO comment(post_id, name, content)
      VALUES (". $post_id .",'". $name . "', '" . $content . "')";

    $db->plural($sql);
    header("Location: single.php?page=$post_id");
    exit();
  } 
} else {
  $post_id = strip_tags($_GET['id']);
}
require_once 't_comment.php';
?>