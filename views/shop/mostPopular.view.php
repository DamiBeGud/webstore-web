<div class="container text-center">
    <h2 class="display-6 py-5">Most Popular</h2>

    <div class="d-flex justify-content-between align-items-center flex-column flex-lg-row my-5" id="popular">

    <?php
        $query ="SELECT * FROM products LIMIT 3";

        $result = getQuery($query);
        foreach ($result as $row) {
    ?>
<div class="card m-2">
    <a href="/shop/product?id=<?=$row["id"]?>">
        <img src="<?=$row["image_url"]?>" class="card-img-top" height="300">
    </a>
    <div class="card-body">
        <p class="card-text fw-bold"><?=$row["name"]?></p>
        <small class="text-secondary"><?=$row["price"]?>$</small>
    </div>
</div>
    <?php
        }
    ?>
    </div>
</div>