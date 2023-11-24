<?php 
require "views/partials/dropdownCategory.partial.php";


$id = $_GET["id"];
$query = "SELECT * FROM products WHERE id = $id";
$result = getQuery($query);

foreach ($result as $row) {
    ?>
<div class="conteiner">
    <div class="conteiner p-5">
        <form action="/update/product?id=<?=$row["id"]?>" method="post">
            <div class="row form-floating mb-1">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Name" value="<?=$row["name"]?>"/>
                <label>Name</label>
            </div>
            <div class="row form-floating mb-1">
                <textarea type="text" class="form-control" id="floatingInput" name="description" placeholder="Description"><?=$row["description"]?></textarea>
                <label>Description</label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">$</span>
                </div>
                <input type="number" class="form-control" placeholder="Price" name="price" value="<?=$row["price"]?>" aria-label="Price" aria-describedby="basic-addon1">
            </div>
            <div class="form-group col-md-4">
                <label for="suitType">Suit Type</label>
                <select id="suitType" class="form-control" name="product_type">
                    <?php dropdown("product_type");?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="suitType">Fit Style</label>
                <select id="suitType" class="form-control" name="product_style">
                    <?php dropdown("product_style");?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="suitType">Color Option</label>
                <select id="suitType" class="form-control" name="product_color">
                    <?php dropdown("product_color");?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="suitType">Occasion-Specific</label>
                <select id="suitType" class="form-control" name="product_occasion">
                    <?php dropdown("product_occasion");?>
                </select>
            </div>
            <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
            <script src="../../index.js">
                
            </script>

                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" value="abc" onchange="getFile(event)">
                        <input type="text" id="imageURL" name="image_url" value="<?=$row["image_url"]?>"hidden/>
                    </div>
                    <!-- ADD IMAGE HERE -->
                    <div class="input-group-append">
                        <button type="button" class="input-group-text" id="uploadButton" onclick="uploadImage()">Upload</button type="button">
                    </div>
                </div>
                <img src="<?=$row["image_url"]?>" width="100px" height="100px"/>

            



            <p class="text-warning">If you want to change Image for Product make sure to clikc Upload Button before submiting form</p>
            <button class="btn btn-primary">Edit Product</button>
        </form>
    </div>
</div>
<?php
}
?>
