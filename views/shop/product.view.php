<?php 
    // require "functions/getQuery.function.php";

    $product_id = $_GET["id"];
    $query = "SELECT * FROM products WHERE id = $product_id";

    $result = getQuery($query);

    foreach ($result as $row) {
?>
<form action="/update/token?>" method="post" id ="cartForm<?= $row["id"]?>"hidden>
    <input type="text" name="cart" id="cart<?= $row["id"]?>" value=""/>
    <input type="text" name="token" id="token<?= $row["id"]?>" value=""/>
    <button id="cartButton<?= $row["id"]?>"></button>
</form>

<div class="conteiner p-5">
<div class="conteiner mx-5 position-relative">
<a href="/shop" class="position-absolute" style="top:0; right:0;">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
</a>
    <div class="row">
        <div class="col">
            <img src="<?= $row["image_url"] ?>" class="img-fluid"/>
        </div>
        <div class="col conteiner">
            <br />
            <h2><?= $row["name"] ?></h2>
            <small><?= $row["description"] ?></small>
            <div class="conteiner">
                <br />
                <div class="row align-items-center">
                <small class="text-secondary col"><?= $row["price"] ?> $</small>
                <button class="btn btn-primary col" id="<?= $row["id"]?>" onclick="addProductToCart(event)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16" id="<?= $row["id"]?>">
                    <path id="<?= $row["id"]?>" d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                    <path id="<?= $row["id"]?>" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
}
?>

<script>
  function addProductToCart(e){
    console.log(e.target.id);
    if(e.target.id !=""){
    const storage = localStorage.getItem('cart')
    const token = localStorage.getItem('token')
    // console.log('token : ' + token)
    Storage.prototype.setObj = function(key, obj) {
        return this.setItem(key, JSON.stringify(obj))
    }
    Storage.prototype.getObj = function(key) {
        return JSON.parse(this.getItem(key))
    }
    if(storage){
        console.log(storage)
        const cart = localStorage.getObj('cart')
        
        cart.cart.push(e.target.id)
        console.log(cart)
        localStorage.setObj('cart', cart)
        let cartItems
        const cartString = cart.cart.forEach(element => {
            if(cartItems === undefined){
                cartItems = element
            }else{
                cartItems = cartItems + ',' + element
            }
        })
          document.getElementById('cart' + e.target.id).value = cartItems
          document.getElementById('token' + e.target.id).value = token
          document.getElementById('cartButton' + e.target.id).click()    

    }else{
        const cart = {
            cart:[]
        }
        cart.cart.push(e.target.id)
        localStorage.setObj('cart', cart)
          document.getElementById('cart' + e.target.id).value = e.target.id
          document.getElementById('token' + e.target.id).value = token
          document.getElementById('cartButton' + e.target.id).click()    


    }
  }
}
</script>
