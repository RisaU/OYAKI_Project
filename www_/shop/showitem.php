<?php 
require_once "dbCon.php";
    session_start();

    // connect to DB
    $mysqli = doDB();

    $display_block = "<h1>My Store - Item Detail</h1>";

    // create safe values for use
    $safe_item_id = mysqli_real_escape_string($mysqli, $_GET['item_id']);

    // validate item
    $get_item_sql = "SELECT c.id AS cat_id, c.cat_title, si.item_title, 
                    si.item_price, si.item_desc, si.item_image 
                    FROM store_items AS si 
                    LEFT JOIN store_categories AS c 
                    ON c.id=si.cat_id
                    WHERE si.id='" . $safe_item_id . "'";
    
    $get_item_res = mysqli_query($mysqli, $get_item_sql)
                    or die(mysqli_error($mysqli));


                    
    if (mysqli_num_rows($get_item_res) < 1) {
        // invalid item
        $display_block .= "<p><em>Invalid item selection.</em></p>";
    } else {
        // valide item, get info
        while ($item_info = mysqli_fetch_array($get_item_res)) {

            $cat_id = $item_info['cat_id'];
            $cat_title = strtoupper(stripslashes($item_info['cat_title']));
            $item_title = stripslashes($item_info['item_title']);
            $item_price = $item_info['item_price'];
            $item_desc = stripslashes($item_info['item_desc']);
            $item_image = $item_info['item_image'];

            // get number of item stock
            $sql = "SELECT item_id, stock_qty FROM store_item_stock
                    WHERE item_id=" . $safe_item_id . ";";
            $res = mysqli_query($mysqli, $sql);
            $tmp = mysqli_fetch_assoc($res);
            $item_stock = $tmp["stock_qty"];
        }
        // make breadcrumb trail & display of item
        $display_block .= <<<END_OF_TEXT
        <div id='wrapper'>
            <p id="directive">You are viewintg</p>
            <div id="breadcrumbs">
                <a href="index.php?cat_id=$cat_id">$cat_title</a>
                &gt; $item_title
            </div>
            <div id="showItem">
                <div style="float: left;">
                    <img src="./images/$item_image" alt="$item_title">        
                </div>
                <div style="float: left; padding-left: 12px;">
                    <p><strong>Description: </strong><br>$item_desc</p>
                    <p><strong>Price:</strong>\$$item_price</p>
                    <p><strong>Stock:</strong>$item_stock</p>
                    <form method="post" action="addtocart.php">
        
END_OF_TEXT;

        // free result
        mysqli_free_result($get_item_res);
        
        $display_block .= "<p><label for=\"sel_item_qty\">Select Quantity:<label>
                            <select id=\"sel_item_qty\" name=\"sel_item_qty\">";

        // $i = quantity of items
        for($i=1;$i<11;$i++) {
            $display_block .= "<option value=\"" . $i . "\">" . $i . "</option>";
        }

        $display_block .= <<<END_OF_TEXT
            </select></p>
            <input type="hidden" name="sel_item_id" value="$_GET[item_id]">
            <button class="simpleButton" type="submit" name="submit" value="submit">Add to Cart</button>
            </form>
            </div>
            </div> <!-- showItem -->
        </div> <!-- wrapper -->
END_OF_TEXT;

    }
    // close connection to DB
    mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Store</title>
    <style type=”text/css”>
        label {font-weight: bold;}
    </style>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/showitem.css">
</head>
<body>
    <?php echo $display_block; ?>
</body>
</html>