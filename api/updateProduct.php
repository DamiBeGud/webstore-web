
<?php 
    require "config/config.php";
    $id = $_GET["id"];
    $name =  $_REQUEST['name'];
    $description =  $_REQUEST['description'];
    $price =  $_REQUEST['price'];
    $product_type =  $_REQUEST['product_type'];
    $product_style =  $_REQUEST['product_style'];
    $product_color =  $_REQUEST['product_color'];
    $product_occasion =  $_REQUEST['product_occasion'];
    $image_url =  $_REQUEST['image_url'];
    
        $query = "
        UPDATE products
        SET 
        name ='$name',
        description='$description',
        price =$price,
        type_id =$product_type,
        style_id =$product_style,
        color_id=$product_color,
        occasion_id=$product_occasion,
        image_url ='$image_url'
        WHERE id = $id
        ";
    
        var_dump($query);
        if(mysqli_query($db, $query)){
            header('Location: /dashboard/products');
    
        }else{
            echo "query error" . mysqli_error($db);
        }
    ?>