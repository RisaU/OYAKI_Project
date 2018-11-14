<?php
var_dump($_POST['data']);
exit();

   header('Content-type: text/plain; charset= UTF-8');
    if(isset($_POST['data'])){
        $id = $_POST['data'];
        $str = "AJAX REQUEST SUCCESS\nuserid:".$id."\n";
        $result = nl2br($str);
        echo $result;
    }else{
        echo 'FAIL TO AJAX REQUEST';
    }
?>