<?php 
    require "config/config.php";

    $id = $_GET["id"];
    
        $query = "
        UPDATE messages
        SET answered = 1
        WHERE id = $id
        ";
    
        var_dump($query);
        if(mysqli_query($db, $query)){
            header('Location: /dashboard/messages');
    
        }else{
            echo "query error" . mysqli_error($db);
        }

    ?>