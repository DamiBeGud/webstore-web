<?php 
    require "config/config.php";
        $cart =  $_REQUEST['cart'];
        $token =  $_REQUEST['token'];
        var_dump($cart, $token);
    
        // Pretvori array u coma separator i spremi kasnije treba da se to izvuce iz db i loopa za cart
    
    
        $query = "
        UPDATE user
        SET cart = '$cart'
        WHERE token = '$token'
        ";
    
        var_dump($query);
        if(mysqli_query($db, $query)){
            header('Location: /shop');
    
        }else{
            echo "query error" . mysqli_error($db);
        }

    ?>
    
    