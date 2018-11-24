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
  <link rel="stylesheet" href="./../css/shop.css">

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Chewy|Fredoka+One|Permanent+Marker" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
  <!-- [if lt IE9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!-- js -->
  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
  <script>
    window.jQuery || document.write('<script type="text/javascript" src="../js/jquery-3.2.1.min.js"><\/script>');
  </script>

  <script src="../js/function.js"></script>
</head>
<body id="showcart">
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
				<li><a href="./../blog/index.php">BLOG</a></li>
        <li><a href="./index.php">SHOP</a></li>
			</ul>
		</div><!-- menu -->
	</nav><!-- mainNav -->
</header>
<main>
  <section class="mainContents">
    <?php echo $display_block; ?>
  </section>
</main>
</body>
</html>