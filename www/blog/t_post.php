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
  <form method="post" action="post.php" enctype="multipart/form-data">
  <section class="mainContents">
      <h2>Add New Post</h2>
      <p id="error"><?php echo $error ?></p>
      <h3>Title</h3>
      <p>
        <input type="text" name="title" size="40" 
          value="<?php echo $title ?>">
      </p>
      <h3>Content</h3>
      <p>
        <textarea name="content" rows="8" cols="40">
        <?php echo $content ?></textarea>
      </p>
      <p>
        <input type="file" name="upfile">
      </p>
      <p>* Only JPG is allowed.</p>
      <p class="submit">
        <input type="submit" name="submit" id="submitBtn" value="post">
      </p>
      
    </section><!-- post -->
  </form>
</main>
</body>
