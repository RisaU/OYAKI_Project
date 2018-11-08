<?php
require_once "dbCon.php";
session_start();

$error = "";
$name = "";
$address = "";
$city = '';
$state = "";
$zip = '';
$tel = "";
$email = '';
$itemTotal = 0;
$shippingTotal = 0;

$db = doDB();

// get cart items based on user session id
$sql = "SELECT st.id, si.item_title, si.item_price,
        st.sel_item_qty, st.sel_item_size, st.sel_item_color
        FROM store_shoppertrack AS st
        LEFT JOIN store_items AS si
        ON si.id = st.sel_item_id
        WHERE session_id = '" . $_COOKIE['PHPSESSID'] . "'";  

$res = mysqli_query($db, $sql) 
  or die(mysqli_error($db));

if (mysqli_num_rows($res) < 1) {
  // print message
  $body .= "<p>You have no items in your cart.
                  Please <a href=\"index.php\">continue to shop</a>!</p>";
} else {
  // item list
  $items = mysqli_fetch_all($res);
}

if(@$_POST['submit']) {
  $name = htmlspecialchars($_POST['name']);
  $address = htmlspecialchars($_POST['address']);
  $city = htmlspecialchars($_POST['city']);
  $state = htmlspecialchars($_POST['state']);
  $zip = htmlspecialchars($_POST['zip']);
  $tel = htmlspecialchars($_POST['tel']);
  $email = htmlspecialchars($_POST['email']);

  if(!$name) $error .= "Please enter your name.<br>";
  if(!$address) $error .= "Please enter your address.<br>";
  if(!$city) $error .= "Please enter your city.<br>";
  if(!$state) $error .= "Please enter your state.<br>";
  if(!$zip) $error .= "Please enter your zip.<br>";
  if(!$tel) $error .= "Please enter your phone number.<br>";
  if(!$email) $error .= "Please enter your email address.<br>";

  if(preg_match('/[^\d]/', $tel)) $error .= "Incorrect number.<br>";

  if(!$error) {
    $now = new DateTime(); 
    $now = $now->format('Y-m-d H:i:s'); 

    // get total cost(item_total)
    $sql = "SELECT sum(si.item_price * st.sel_item_qty) AS totalPrice
            FROM store_shoppertrack AS st
            LEFT JOIN store_items AS si
            ON si.id = st.sel_item_id
            WHERE session_id = '" . $_COOKIE['PHPSESSID'] . "'";

    $res = mysqli_query($db, $sql) 
      or die(mysqli_error($db));
    
    $tmp = mysqli_fetch_array($res);
    $itemTotal = $tmp["totalPrice"];
    
    // $db = doDB();
    // $body = "You done checkout.\n\n"
    //       . "Name: " . $name . "\n"
    //       . "Address: " . $address . "\n"
    //       . "City: " . $city . "\n"
    //       . "State: " . $state . "\n"
    //       . "Zip: " . $zip . "\n"
    //       . "Phone Number: " . $tel . "\n"
    //       . "Email: " . $email . "\n";

    $sql = "INSERT INTO store_orders(order_date,order_name,order_address,order_city
            ,order_state,order_zip,order_tel,order_email,item_total,shipping_total
            ,authorization,status)
      VALUES(
          '". $now ."'
          ,'". $name . "'
          ,'". $address . "'
          ,'". $city . "'
          ,'". $state . "'
          ,'". $zip . "'
          ,'". $tel . "'
          ,'". $email . "'
          , ". $itemTotal . "
          , ". $shippingTotal . "
          , 'hoge'
          , 'processed'       
    )";
    $res = mysqli_query($db, $sql) 
      or die(mysqli_error($db));

    $_COOKIE['PHPSESSID'] = null;
    require_once 't_checkout_done.php';
  }
}
require_once 't_checkout.php';

?>