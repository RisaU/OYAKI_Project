<?php 
require_once "dbCon.php";
    // connect to DB
    $mysqli = doDB();

    $display_block = "<h1>My Categories</h1>
                        <div id='wrapper'>
                          <p id='directive'>Select a categroy to see its items.</p>";

    // show categories first
    $get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";
    $get_cats_res = mysqli_query($mysqli, $get_cats_sql)
                    or die(mysqli_error($mysqli));;
    
    if (mysqli_num_rows($get_cats_res) < 1) {
        $display_block = "<p><em>Sorry, no categories to browse.</em></p>";
    } else {
        while ($cats = mysqli_fetch_array($get_cats_res)) {
            $cat_id = $cats['id'];
            $cat_title = stripslashes($cats['cat_title']);
            $cat_desc = stripslashes($cats['cat_desc']);
/*
            $display_block .= "<p><strong><a href=\"" .  $_SERVER['PHP_SELF'] 
                            . "?cat_id=" . $cat_id . "\">" . $cat_title . "</a></strong><br>"
                            . $cat_desc . "</p>";
*/  
            $display_block .= "<div class='hidden_box'><label for='catList". $cat_id . "'>" . $cat_title . "</label>"
                            . "<p class='desc'>" . $cat_desc . "</p>"
                            . "<input type='checkbox' id='catList" . $cat_id . "'>";

            if (isset($_GET['cat_id']) && ($_GET['cat_id'] == $cat_id)) {
                // create safe value for use 
                $safe_cat_id = mysqli_real_escape_string($mysqli, $_GET['cat_id']);
            } 

            // get items
            $get_items_sql = "SELECT id, item_title, item_price FROM store_items
                                WHERE cat_id = '" . $cat_id . "' ORDER BY item_title";
            $get_items_res = mysqli_query($mysqli, $get_items_sql)
                            or die(mysqli_error($mysqli));
            
            if (mysqli_num_rows($get_items_res) < 1) {
                $display_block = "<p><em>Sorry, no items in this ategory.</em></p>";
            } else {
                $display_block .= "<ul class='hidden_show'>";
                while($items = mysqli_fetch_array($get_items_res)) {
                    $item_id = $items['id'];
                    $item_title = stripcslashes($items['item_title']);
                    $item_price = $items['item_price'];

                    $display_block .= "<li><a href=\"showitem.php?item_id="
                                    . $item_id . "\">" . $item_title . "</a>
                                    (\$" . $item_price . ")</li>";
                }
                $display_block .= "</ul></div>";// div='hidden_box'
            }
            // free results
            mysqli_free_result($get_items_res);
        }
    }
    $display_block .= "</div>"; // id="wrapper"
    // free results
    mysqli_free_result($get_cats_res);

    
    // close connection to MySQL
    mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Categories</title>
    <link href="https://fonts.googleapis.com/css?family=Changa:700" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/seestore.css">
</head>
<body>
    <a href="checkout.php">Checkout</a>
    <?php echo $display_block; ?>
</body>
</html>