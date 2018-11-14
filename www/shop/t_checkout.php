<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"><!-- encode -->
  <!-- <link rel="shortcut icon" href="favicon.ico"> --><!-- ファビコン -->
  <title>おやき - OYAKI - | Checkout</title>
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



<body id="checkout">
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
			</ul>
		</div><!-- menu -->
	</nav><!-- mainNav -->
</header>
<main>
<section class="mainContents">
  <div class="base">
    <?php if ($error) echo "<div class=\"error\">$error</div>" ?>
    <h2>Item list</h2>
    <table>
      <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Subtotal</th>
      </tr>
      <?php $totalPrice = 0; ?>
      <?php for($i=0;$i<count($items);$i++) { 
      $subtotal = sprintf("%.02f", $items[$i][2] * $items[$i][3]);
      $totalPrice += $subtotal;
      ?>
      <tr>
        <td><?php echo stripcslashes($items[$i][1]); ?></td>
        <td>$ <?php echo $items[$i][2]; ?></td>
        <td><?php echo $items[$i][3]; ?></td>
        
        <td>$ <?php echo $subtotal; ?></td>
      </tr>
    <?php } 
    ?>
      <tr id='totalTr'>
        <td colspan=2></td>
        <th id='total'>Total</th>
        <td id='totalPrice'><?php echo sprintf("%.02f", $totalPrice); ?></td>
      </tr>
      </table>
    <h2>Payment infomation</h2>
    <form action="checkout.php" method="post" name="checkoutFomr">
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?php echo $name; ?>" autofocus></dd>
      
        <dt>Address</dt>
        <dd><input type="text" name="address" size="60" value="<?php echo $address; ?>"></dd>

        <dt>City</dt>
        <dd><input type="text" name="city" size="60" value="<?php echo $city; ?>"></dd>

        <dt>State</dt>
        <dd><input type="text" name="state" size="10" value="<?php echo $state; ?>"></dd>

        <dt>Zip</dt>
        <dd><input type="text" name="zip" size="4" value="<?php echo $zip; ?>"></dd>

        <dt>Phone Number</dt>
        <dd><input type="text" name="tel" value="<?php echo $tel; ?>"></dd>

        <dt>Email</dt>
        <dd><input type="email" name="email" value="<?php echo $email; ?>"></dd>
      </dl>
      <p class="submit">
        <input type="submit" name="submit" value="checkout" id="checkoutBtn">
      </p>
    </form>
  </div>
  <div class="btnSection">
            <div class="basicBtn">
                <a href="index.php">Go back to shopping</a>　
            </div>
            <div class="basicBtn">
                <a href="checkout.php">Proceed to Checkout</a>
            </div>
        </div>
</section>
</main>
</body>
</html>