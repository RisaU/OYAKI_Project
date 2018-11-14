<?php  
  $category = "";
  if(isset($_POST['category'])) {
    $category = $_POST['category'];
  }
  foreach($posts as $post) { 
    if($post['category'] == $_POST['category']) {
?>

  <div class="post col-xs-12 col-md-6 col-lg-4">
    <?php if($post['img_src']) { ?>
      <div class="headerImg">
        <img src=<?php echo $post['img_src'] ?>>
      </div>
    <?php } ?>
    <h2>
      <a href="single.php?page=<?php echo $post['id']?>"><?php echo $post['title'] ?></a>
    </h2>
    <time id="uploadtime" datetime="<?php echo $post['post_date']?>">
      <span>Date: </span>
      <?php echo $post['post_date']?>
    </time>
    <div id="category">Category: <a href="#"><?php echo $post["category"] ?></a></div>
  </div><!-- post col-xs-6 col-lg-4 -->
<?php 
  }
} 
?>