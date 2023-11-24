<?php 
require "views/partials/dropdownCategory.partial.php"
?>
<div class="d-flex">
    
<!-- CATEGORYS -->
<div class="conteiner bg-primary gap-3">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Suit Types
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php dropdownLinkShop("product_type");?>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Fit Styles
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php dropdownLinkShop("product_style");?>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Color Options
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php dropdownLinkShop("product_color");?>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Occasion-Specific
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php dropdownLinkShop("product_occasion");?>
      </div>
    </div>
    <a href="/shop" class="btn btn-success m-2">All Products</a>

</div>

<!-- ITEMS -->
<div class="d-flex flex-wrap">
  <!-- <script src="../../index.js"></script> -->
    <?php
 require "views/partials/products.partial.php";
 if(isset($_GET['table']) && isset($_GET['id'])){
    $table = $_GET['table'];
    $id = $_GET['id'];
    
    $tableArray = array(
      "product_color"=>"color_id",
      "product_occasion"=>"occasion_id",
      "product_style"=>"style_id",
      "product_type"=>"type_id"
    );
    $query = "SELECT * FROM `products` WHERE $tableArray[$table] = $id";
 }else{
   $query = "SELECT * FROM products"; 
}
 renderProductsShop($query);
?>
</div>
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

</div>