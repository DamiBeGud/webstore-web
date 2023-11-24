<ul class="list-group mb-3">
          
            
<?php
    // require "functions/getQuery.function.php";
    $token = $_GET["token"];
    $query = "SELECT * FROM user WHERE token = '$token'";
    $result = getQuery($query);
    if ($result=="Nothing Found") {
        return;
    }else{
    foreach ($result as $row) {
        $products = $row["cart"];
        $productsArray = explode(',', $products);
        if($row["cart"] == "undefined"){
            echo"You have 0 Products in Cart";
            return;
        }else{

        // var_dump($row);
        $queryIDs = "";
        foreach ($productsArray as $product) {
            if($queryIDs == ""){
                $queryIDs = $product;
            }else{
                $queryIDs = $queryIDs . "," . $product;
            }
        }
        $query = "SELECT * FROM products WHERE id IN ($queryIDs)";
        $result = getQuery($query);
        // var_dump($query);
        if ($result=="Nothing Found") {
            echo "There are 0 Products in Cart";
        }else{
            $total = 0;
        foreach ($result as $row) {
            $total += $row["price"];
            ?>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div><h6 class="my-0"><?= $row["name"]?></h6></div>
                <span class="text-muted">$<?= $row["price"]?></span>
          </li>
    <?php

}
}
}
}
}
?>
          <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <?php echo"<strong>$$total $</strong>" ?>
          </li>
        </ul>