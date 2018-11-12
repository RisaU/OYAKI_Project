<?php 
require_once "dbConnect.php";

// header('Content-type: text/plain; charset= UTF-8');
// if(!isset($_GET)) {

// } else {
//     // var_dump($_POST['data']);
//     var_dump($_GET);
//     exit();
// }


// connect DB
$db = new dbConnect();
$sql = "SELECT id, title, category, img_src, post_date FROM post ORDER BY id DESC";
$posts = $db->select($sql);
// var_dump($posts);

$sql = "SELECT DISTINCT(category) FROM post;";
$categories = $db->select($sql);

require_once 't_index.php';


?>