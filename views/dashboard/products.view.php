<?php 
require "views/partials/dropdownCategory.partial.php";
?>




<div class="d-flex">
    
<!-- CATEGORYS -->
<div class="conteiner bg-primary gap-3">
<a href="/dashboard/products" class="btn btn-success m-2">All Products</a>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Suit Types
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php dropdownLink("product_type");?>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Fit Styles
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php dropdownLink("product_style");?>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Color Options
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       <?php dropdownLink("product_color");?>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Occasion-Specific
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php dropdownLink("product_occasion");?>
      </div>
      
    </div>
    <a href="/dashboard/products/add" class="btn btn-success m-2">Add new Product</a>

</div>

<!-- ITEMS -->
<div class="d-flex flex-wrap">
  
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
 renderProducts($query);
?>



</div>

<?php require "views/partials/addProductSuccess.partial.php" ?>
