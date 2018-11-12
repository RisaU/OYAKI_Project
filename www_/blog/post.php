<?php 
require_once "./dbConnect.php";

$error = $title = $content = '';
$fileName = "";
$imageDir = "images";
$filePath = "";


if (@$_POST['submit']) {
  if(!$_POST["title"]) $error .= "No title.<br>";
   
   if(mb_strlen($_POST["title"]) > 80) {
    $error .= "The title is too long. <br>";
  }

  if(!$_POST["content"]) $error .= "No content.<br>";
 
  // img file
  if (isset($_FILES['upfile']['error']) 
    && is_int($_FILES['upfile']['error']) 
    && $_FILES["upfile"]["name"] !== "") {

      // error check
      switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK: // OK
            break;
        case UPLOAD_ERR_NO_FILE:   // unselected
          echo 'Unselected';
          break;
        case UPLOAD_ERR_INI_SIZE:  // 
          echo 'The size is too big';
          break;
        default:
          echo 'An error occured';
          break;
      }
    $tmp = pathinfo($_FILES["upfile"]["name"]);
    $extension = $tmp["extension"];
    if($extension === "jpg" || $extension === "jpeg" || $extension === "JPG" || $extension === "JPEG"){
        $extension = "jpg";
    } else {
      echo "the file is not available";
      exit(1);
    }
    $fileName = $_FILES["upfile"]["name"];

    // Avoid name confliction(add current time to file name)
    $time = new DateTime();
    $time = $time->format('YmdHis');
    $name = basename($fileName, ".jpg");
    $fileName = $name . $time . "." . $extension;
  }

  if(!$error) {
    $db = new dbConnect();

    //$title = mysqli_real_escape_string($db, $_POST["title"]);
    //$content = mysqli_real_escape_string($db, $_POST["content"]);
    $title = $_POST["title"];
    $content = $_POST["content"];
    
    // get current time 
    $now = new DateTime(); 
    $now = $now->format('Y-m-d H:i:s'); 

    $filePath = "./" . $imageDir . "/" . $fileName;

    $sql = "INSERT INTO post(title, content, category, img_src, post_date) 
            VALUES ('" . $title . "', '". $content ."', 'blog', '"
              . $filePath . "' , '" . $now . "');";

    $db->plural($sql);

    // $hoge = $_SERVER['PHP_SELF'];

    // upload image to img folder
    $targetDir = dirname(__FILE__) . "/" . $imageDir . "/";
    move_uploaded_file($_FILES['upfile']['tmp_name'], $targetDir.$fileName);

    header("Location: index.php");
    exit();
  }
}

require_once "t_post.php";
?>