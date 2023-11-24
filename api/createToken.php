<?php 
    require "config/config.php";

    $token =  $_REQUEST['token'];
    $query = "INSERT INTO user(token) VALUES ('$token')";
    if(mysqli_query($db, $query)){
        header('Location: /');

    }else{
        echo "query error" . mysqli_error($db);
    }
?>