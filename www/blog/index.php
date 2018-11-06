<?php

require_once "dbConnect.php";

//"SELECT * FROM oyaki.post WHERE no = (SELECT COUNT(no) FROM oyaki.post);"
// show all pages
// $sql = "SELECT * FROM post ORDER BY no DESC";

// connect DB
$db = new dbConnect();
$sql = "";

$res = $db->select("SELECT COUNT(id) as last_page FROM oyaki.post");
$maxPage = $res[0]['last_page'];


$page = $_REQUEST['page'];
// if no request, show latest page
if($page == "") {
  $page = $maxPage;
} 
// if $page is less than 1, put 1 into $page
$page = max($page, 1); // @memo shold change this later..

// if request page is larger than max page, show latest page
$page = min($page, $maxPage);

$sql = "SELECT DISTINCT category FROM oyaki.post;";
$categories = $db->select($sql);

$sql = "SELECT * FROM oyaki.post WHERE id = " . $page . ";";
$posts = $db->select($sql);

for($i=0; $i<count($posts); $i++) {
  $sql = "SELECT * FROM comment WHERE post_id={$posts[$i]['id']} ORDER BY id DESC";
  $posts[$i]['comments'] = $db->select($sql);
}



require_once 't_index.php';







































?>