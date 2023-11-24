<?php 
    require "config/config.php";

    $id = $_GET["id"];
        $query = "
        UPDATE orders
        SET status = 1
        WHERE id = $id
        ";
    
        var_dump($query);
        if(mysqli_query($db, $query)){
            header('Location: /dashboard/orders');
    
        }else{
            echo "query error" . mysqli_error($db);
        }

    ?>