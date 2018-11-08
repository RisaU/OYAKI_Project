<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Shopping list</title>
<!-- <link rel="stylesheet" href="showcart.css"> -->
</head>
<body>
<h1>Checkout Form</h1>
<div class="base">
  <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
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
    <tr><th colspan=3>Total</th><td><?php echo sprintf("%.02f", $totalPrice); ?></td></tr>
    </table>
  <h2>Payment info</h2>
  <form action="checkout.php" method="post" name="checkoutFomr">
    <dl>
      <dt>Name</dt>
      <dd><input type="text" name="name" value="<?php echo $name; ?>" autofocus></dd>
    
      <dt>Address</dt>
      <dd><input type="text" name="address" size="60" value="<?php echo $address; ?>"></dd>

      <dt>City</dt>
      <dd><input type="text" name="city" size="60" value="<?php echo $city; ?>"></dd>

      <dt>State</dt>
      <dd><input type="text" name="state" size="6" value="<?php echo $state; ?>"></dd>

      <dt>Zip</dt>
      <dd><input type="text" name="zip" size="4" value="<?php echo $zip; ?>"></dd>

      <dt>Phone Number</dt>
      <dd><input type="text" name="tel" value="<?php echo $tel; ?>"></dd>

      <dt>Email<dt>
      <dd><input type="email" name="email" value="<?php echo $email; ?>"></dd>

    <p>
      <input type="submit" name="submit" value="checkout">
    </p>
  </form>
</div>
<div class="base">
  <a href="index.php">Back to shopping</a>　
  <a href="showcart.php">Back to Cart</a>
</div>
</body>
</html>