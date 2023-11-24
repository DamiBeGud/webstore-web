<?php 
if(isset($_GET['id'])){
    $product_id = $_GET['id'];


    $db = new mysqli("localhost", "root","","online_store");
    $sql = "DELETE FROM products WHERE id = $product_id";

    if ($db->query($sql) === TRUE) {
        header('Location: /dashboard/products');
        
    } else {
    echo "Error deleting record: " . $conn->error;
    }
}


?>