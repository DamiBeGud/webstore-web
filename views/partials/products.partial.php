<?php 
function renderProducts($query){
  $result = getQuery($query);
  // var_dump($result->num_rows);
  // var_dump($result["field_count"]);

  if($result === "Nothing Found"){
    echo"No Products found";
  }else{

    foreach ($result as $row) {
      ?>

<div class="card m-2">
  <a href="#" style="text-decoration: none; color: black">    
    <img src="<?= $row["image_url"]?>" class="card-img-top" height="300">
    <div class="card-body">
      <p class="card-text fw-bold"><?= $row["name"]?></p>
      <div class="d-flex justify-content-center gap-1">
        <a href="/dashboard/products/edit?id=<?= $row["id"]?>" class="btn btn-primary">Edit</a>
        <a href="/delete/product?id=<?=$row["id"]?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </a>
</div>

<?php
}}}
?>

<?php 
function renderProductsShop($query){
  $result = getQuery($query);
  // var_dump($result->num_rows);
  // var_dump($result["field_count"]);

  if($result === "Nothing Found"){
    echo"No Products found";
  }else{

    foreach ($result as $row) {
      ?>

<form action="/update/token?>" method="post" id ="cartForm<?= $row["id"]?>"hidden>
    <input type="text" name="cart" id="cart<?= $row["id"]?>" value=""/>
    <input type="text" name="token" id="token<?= $row["id"]?>" value=""/>
    <button id="cartButton<?= $row["id"]?>"></button>
</form>
<div class="card m-2">
  <a href="/shop/product?id=<?= $row["id"]?>" style="text-decoration: none; color: black" id="<?= $row["id"]?>" class="getID">  
            <img src="<?= $row["image_url"]?>" class="card-img-top" height="300">
  </a>
            <div class="card-body">
            <a href="/shop/product?id=<?= $row["id"]?>" style="text-decoration: none; color: black" id="<?= $row["id"]?>" class="getID">  
                <p class="card-text fw-bold"><?= $row["name"]?></p>
          </a>
                <div class="conteiner">
                  <div class="row align-items-center">
                    <small class="text-secondary col"><?= $row["price"]?> $</small>
                    <button class="btn btn-primary col" id="<?= $row["id"]?>" onclick="addProductToCart(event)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16" id="<?= $row["id"]?>">
                      <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z" id="<?= $row["id"]?>"/>
                      <path id="<?= $row["id"]?>" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                    </button>
                  </div>
                </div>
            </div>
</div>
<?php
}}}
?>