<?php
    require "config/config.php";

    $first_name =  $_REQUEST['first_name'];
    $last_name =  $_REQUEST['last_name'];
    $email =  $_REQUEST['email'];
    $address =  $_REQUEST['address'];
    $country =  $_REQUEST['country'];
    $zip =  $_REQUEST['zip'];
    $products =  $_REQUEST['products'];
    $total_amount = $_REQUEST['total_amount'];
    $token = $_REQUEST['token'];

    $query = "INSERT INTO orders(
        first_name,
        last_name,
        email,
        address,
        country,
        zip,
        products,
        total_amount
    ) VALUES (
        '$first_name',
        '$last_name',
        '$email',
        '$address',
        '$country',
        '$zip',
        '$products',
        '$total_amount'
    )";

if(mysqli_query($db, $query)){
    $query ="
    UPDATE user
    SET cart = ''
    WHERE token = '$token'
    ";
    if(mysqli_query($db, $query)){
        header('Location: /cart/payment/success');
    }else{
        echo "query error" . mysqli_error($db);
    }

}else{
    echo "query error" . mysqli_error($db);
}
?>