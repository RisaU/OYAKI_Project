<?php
if(isset($_POST) 
  && isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

  require_once 'dbConnect.php';
  $category = '';
  $sql = "";

  if(isset($_POST['category']) && ($_POST['category'] !== 'all')){
    $category  = $_POST['category'];
    $sql = "SELECT id, title, category, img_src, post_date 
            FROM post 
            WHERE category = '$category'
            ORDER BY id DESC";
  } else {
    $sql = "SELECT id, title, category, img_src, post_date 
            FROM post ORDER BY id DESC";
  }
  
  // connect DB
  $db = new dbConnect();
  $posts = $db->select($sql);

  foreach($posts as $post) { 
    echo  "<div class='post col-xs-12 col-md-6 col-lg-4'>";
    if($post['img_src']) { 
      echo "<div class='headerImg'>";
      echo "<img src='" . $post['img_src'] . "'>";
      echo "</div>";
    }
    
    echo "<h2>";
    echo "<a href='single.php?page=". $post['id'] ."'>" . $post['title'] . "</a>";
    echo "</h2>";
    echo "<time id='uploadtime' datetime='" . $post['post_date'] . "'>";
    echo "<span>Date: </span>";
    echo $post['post_date'];
    echo "</time>";
    echo "<div id='category'>Category: <a href='#'>" . $post["category"] . "</a></div>";
    echo "</div><!-- post col-xs-6 col-lg-4 -->";
  }


}


?>