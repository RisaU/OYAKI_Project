<?php 
require_once "dbCon.php";
    session_start();

    // connect to DB
    $mysqli = doDB();

    $display_block = "<h1>Your Shopping Cart</h1>";

    // check for cart items based on user session id
    $get_cart_sql = "SELECT st.id, si.item_title, si.item_price,
                    st.sel_item_qty, st.sel_item_size, st.sel_item_color
                    FROM store_shoppertrack AS st
                    LEFT JOIN store_items AS si
                    ON si.id = st.sel_item_id
                    WHERE session_id = '" . $_COOKIE['PHPSESSID'] . "'";

    $get_cart_res = mysqli_query($mysqli, $get_cart_sql)
                    or die(mysqli_error($mysqli));

    if (mysqli_num_rows($get_cart_res) < 1) {
        // print message
        $display_block .= "<p>You have no items in your cart.
                        Please <a href=\"index.php\">continue to shop</a>!</p>";

    } else {
        // get info and build cart display
        $display_block .= <<<END_OF_TEXT
        <table>
            <tr>
                <th>Title</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
END_OF_TEXT;
        $totalPrice = 0;
        while ($cart_info = mysqli_fetch_array($get_cart_res)) {
            $id = $cart_info['id'];
            $item_title = stripcslashes($cart_info['item_title']);
            $item_price = $cart_info['item_price'];
            $item_qty = $cart_info['sel_item_qty'];
            $item_color = $cart_info['sel_item_color'];
            $item_size = $cart_info['sel_item_size'];
            $subtotal_price = sprintf("%.02f", $item_price * $item_qty);
        
            $totalPrice += $subtotal_price;

            $display_block .= <<<END_OF_TEXT
            <tr>
                <td>$item_title<br></td>
                <td>$item_size<br></td>
                <td>$item_color<br></td>
                <td>\$ $item_price<br></td>
                <td>$item_qty<br></td>
                <td>\$ $subtotal_price<br></td>
                <td><a href="removefromcart.php?id=$id">remove</a></td>       
            </tr>
END_OF_TEXT;
        }
        $display_block .= "<tr><th colspan=5>Total</th><td>\$ "
                        . sprintf("%.02f", $totalPrice)."</td><td></td></tr>";
        $display_block .= "</table>";
    }
    if (mysqli_num_rows($get_cart_res) > 0) {
        $display_block .= <<<END_OF_TEXT
        <div class="base">
            <a href="index.php">Go back to shopping</a>　
            <a href="checkout.php">Checkout</a>
        </div>
END_OF_TEXT;
    }

    // free result
    mysqli_free_result($get_cart_res);

    // close connection to DB
    mysqli_close($mysqli);
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>My Store</title>

<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th {
        border: 1px solid black;
        padding: 6px;
        font-weight: bold;
        background: #ccc;
        text-align: center;
    }
    td {
        border: 1px solid black;
        padding: 6px;
        vertical-align: top;
        text-align: center;
    }
</style>

</head>
<body>
    <?php echo $display_block; ?>

</body>
</html>