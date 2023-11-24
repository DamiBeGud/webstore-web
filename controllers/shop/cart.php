<?php require "views/shop/head.view.php"; ?>
<?php require "views/shop/nav.view.php";?>
<br/>

<div class="conteiner p-5" id="cartFrame">
<?php
    $token = $_GET["token"];
    $query = "SELECT * FROM user WHERE token = '$token'";
    $result = getQuery($query);
    if ($result=="Nothing Found") {
        return;
    }else{
    foreach ($result as $row) {
        $products = $row["cart"];
        $productsArray = explode(',', $products);
        if($row["cart"] == "" || $row["cart"] =="undefined"){
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
        foreach ($result as $row) {
            ?>
<div class="conteiner">
<div class="alert alert-light alert-dismissible fade show" role="alert">
   <div class="d-flex justify-content-between">
        <img src="<?= $row["image_url"]?>" class="img-fluid" style="width: 100px;"/>
        <div class="conteiner">
            <h2><?= $row["name"]?></h2>
            <small><?= $row["price"]?>$</small>
        </div>
   </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" token="<?= $token?>" onclick="removeProduct(event)" id="<?= $row["id"]?>"></button>
</div>
</div>
<br/>
<br/>
<form action="/update/token/cart" method="post" id ="cartForm<?= $row["id"]?>"hidden>
    <input type="text" name="cart" id="cart<?= $row["id"]?>" value=""/>
    <input type="text" name="token" id="token<?= $row["id"]?>" value=""/>
    <button id="cartButton<?= $row["id"]?>"></button>
</form>
<?php

}
}
}
}
}
?>
<br/>
<a href="/cart/payment?token=<?=$token?>" class="btn btn-primary">Proceed with Payment</a>
<br/>
<script>
    Storage.prototype.setObj = function(key, obj) {
        return this.setItem(key, JSON.stringify(obj))
    }
    Storage.prototype.getObj = function(key) {
        return JSON.parse(this.getItem(key))
    }

    function removeProduct(e){
        e.preventDefault()
        let token = e.target.getAttribute('token')
        console.log("token 1 : " + token)
        let cartArray = new Array
        let newCart = localStorage.getObj('cart')
        cartArray = newCart.cart.filter((item)=>{
            return item !== e.target.id
        })
        localStorage.setObj('cart', {cart:cartArray})
        let cartItems
        cartArray.forEach(element => {
            if(cartItems === undefined){
                cartItems = element
            }else{
                cartItems = cartItems + ',' + element
            }
        })
        
        console.log(cartItems)
        document.getElementById('cart' + e.target.id).value = cartItems
        document.getElementById('token' + e.target.id).value = token
        console.log("token" + token)
        console.log(document.getElementById('token' + e.target.id).value, document.getElementById('cart' + e.target.id).value)
        document.getElementById('cartButton' + e.target.id).click() 
       
    }
</script>
</div>
<?php require "views/shop/footer.view.php";?>