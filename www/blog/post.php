<?php 
require_once "./connect.php";

$error = $title = $content = '';

$db = new dbConnect();
$st = $db->query("SELECT * FROM post ORDER BY no DESC");
$posts = $st->fetchAll();

echo $posts;

// if (@$_POST['submit']) {

// }







?>