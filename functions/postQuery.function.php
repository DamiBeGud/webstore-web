<?php 
    require "config/config.php";

    $name =  $_REQUEST['name'];
    $description =  $_REQUEST['description'];
    $price =  $_REQUEST['price'];
    $product_type =  $_REQUEST['product_type'];
    $product_style =  $_REQUEST['product_style'];
    $product_color =  $_REQUEST['product_color'];
    $product_occasion =  $_REQUEST['product_occasion'];
    $image_url =  $_REQUEST['image_url'];
    

    
    $query = "INSERT INTO products(
        name,
        description,
        price,
        type_id,
        style_id,
        color_id,
        occasion_id,
        image_url
    ) VALUES (
        '$name',
        '$description',
        '$price',
        '$product_type',
        '$product_style',
        '$product_color',
        '$product_occasion',
        '$image_url'

    )";

    if(mysqli_query($db, $query)){
        header('Location: /dashboard/products?newProduct=success');

    }else{
        echo "query error" . mysqli_error($db);
    }
    ?>