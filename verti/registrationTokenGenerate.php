<?php
    require "config/config.php";
    $token = $_GET["token"];
    
    $query ="
    INSERT INTO admin(
        register_token
    ) VALUES (
        '$token'
    )
    ";

    if(mysqli_query($db, $query)){
        header('Location: /dashboard/admin?adminToken=' . $token);

    }else{
        echo "query error" . mysqli_error($db);
    }
?>