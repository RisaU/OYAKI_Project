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
<body id="post">
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
  <form method="post" action="comment.php">
    <div class="post">
      <h2>Add New Comment</h2>
      <p>Name: </p>
      <p><input type="text" name="name" size="40"  
          value="<?php echo $name ?>"></p>
      <p>Comment</p>
      <p><textarea name="content" row="8" col="40">
        <?php echo $content ?></textarea>
      </p>
      <input type="hidden" name="post_id"
        value="<?php echo $post_id ?>">

      <input type="submit" name="submit" value="post" id="submitBtn">
      <p><?php echo $error ?></p>
    </div>
  </form>
</section>
</main>
</html>