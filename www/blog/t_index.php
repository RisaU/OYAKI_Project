<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"><!-- encode -->
<!-- <link rel="shortcut icon" href="favicon.ico"> --><!-- ファビコン -->
<title>おやき - OYAKI -</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="author" content="Risa Ueda">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><!-- 互換表示させない -->
<meta http-equiv="Content-Style-Type" content = "text/css">
<meta http-equiv="Content-Style-Type" content="text/javascript">
<meta http-equiv="Content-Language" content="ja">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<meta name = "ROBOTS" content = "NONE">
<meta name = "ROBOTS" content = "NOINDEX,NOFOLLOW">
<!-- css -->
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/blog.css">

<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Chewy|Fredoka+One|Permanent+Marker" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
<!-- [if lt IE9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- js -->
<script src="../js/jquery-3.2.1.min.js"></script><!-- jQuery本体 -->
<script src="../js/function.js"></script>
<script>
</script>
</head>
<body id="blog">
<header>
	<nav class="mainNav">
		<div class="drawer">
			<a class="navbar_brand" href="../index.html"><img src="../images/logo.png" alt="logo"></a>
			<div class="navbar_toggle">
				<span></span>
				<span></span>
				<span></span>
			</div> <!-- navbar_toggle -->
		</div><!-- drawer -->
		<div id="" class="menu">
			<ul class="Chewy">
				<li><a href="../index.html" id="current-page">HOME</a></li>
				<li><a href="../about.html">ABOUT</a></li>
				<li><a href="../underConstruction.html">MENU</a></li>
				<li><a href="../contact.html">CONTACT</a></li>
				<li><a href="./index.php">BLOG</a></li>
			</ul>
		</div><!-- menu -->
	</nav><!-- mainNav -->
</header>
<main>
  <section class="mainContents">
    <!-- arrow Botton -->
    <div class="btnSection">
      <div class="basicBtn" id="prev">
        <a href="./index.php?page=<?php echo($page - 1); ?>">&lt;&nbsp;Prev</a>
      </div>
      <div class="basicBtn" id="next">
        <a href="./index.php?page=<?php echo($page + 1); ?>">Next&nbsp;&gt;</a>
      </div>
    </div><!-- btnSection -->
    <!-- <h1>Blog</h1> -->
    <?php  foreach($posts as $post) { ?>
      <div class="post">
        <h2><?php echo $post['title'] ?></h2>
        <time id="uploadtime" datetime="<?php echo $post['post_date']?>">
          <span>Date: </span>
          <?php echo $post['post_date']?>
        </time>
        <div id="theme">Theme: <a href="#"><?php echo $post["category"] ?></a></div>
        <?php if($post['img_src']) { ?>
          <div id="headerImg">
            <img src=<?php echo $post['img_src'] ?> width="500" height="400">
          </div>
        <?php } ?>
        <div id="blogtext"><?php echo nl2br($post['content']) ?></div>
        <?php foreach($post['comments'] as $comment) { ?>
          <div class='comment'>
            <h3><?php echo $comment['name'] ?></h3>
            <p><?php echo nl2br($comment['content']) ?></p>
          </div>
        <?php } ?>
        <p class="comment_link">
          Post date: <?php echo $post['time'] ?>
          <a href="comment.php?id=<?php echo $post['id'] ?>">Comment</a>
        </p>
      </div><!-- post -->
      <?php } ?>
      <!-- arrow Botton -->
      <div class="btnSection">
            <div class="basicBtn" id="prev">
              <a href="./index.php?page=<?php echo($page - 1); ?>">&lt;&nbsp; Prev</a>
            </div>
            <div class="basicBtn" id="next">
              <a href="./index.php?page=<?php echo($page + 1); ?>">Next &nbsp;&gt;</a>
          </div>
      </div>
    </section>

  </main>
</body>
</html>