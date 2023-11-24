<?php
    require "config/config.php";

    $token = $_GET["registerToken"];

    $user_name = $_REQUEST["user_name"];
    $password = $_REQUEST["password"];

    $query = "
    UPDATE admin
    SET user_name = '$user_name' , password='$password'
    WHERE register_token = '$token'
    ";
    var_dump($query);
    if(mysqli_query($db, $query)){
        header('Location: /login');

    }else{
        echo "query error" . mysqli_error($db);
    }

?>