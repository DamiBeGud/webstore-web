<?php 
    require "config/config.php";
    require "config/adminToken.php";

    $adminToken = $_GET["adminToken"];
    $user_name = $_GET["user_name"];
    $adminTokens[] = $adminToken;
    var_dump($user_name);
    $query = "
    UPDATE admin
    SET 
    login_token ='$adminToken'
    WHERE user_name = '$user_name'
    ";
    var_dump($query);
    if(mysqli_query($db, $query)){
        header('Location: /dashboard');

    }else{
        echo "query error" . mysqli_error($db);
    }
?>