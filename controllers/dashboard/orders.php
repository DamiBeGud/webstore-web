<?php require"views/dashboard/head.view.php" ?>
<?php require"views/dashboard/nav.view.php" ?>

<div class="conteiner p-5">
    <div class="conteiner p-5">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Address</th>
              <th scope="col">ZIP</th>
              <th scope="col">Country</th>
              <th scope="col">Products</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>


          <?php
            // require "functions/getQuery.function.php";
            $query ="SELECT * FROM orders ORDER BY id DESC";
            $result = getQuery($query);
            foreach ($result as $row) {
                if($row["status"] == 0){
                    $status = "not sent";
                } else{
                    $status = "sent";
                }
                ?>
            <tr>
              <th scope="row"><?= $row["id"]?></th>
              <td><?= $row["first_name"]?></td>
              <td><?= $row["last_name"]?></td>
              <td><?= $row["address"]?></td>
              <td><?= $row["zip"]?></td>
              <td><?= $row["country"]?></td>
              <td><?= $row["products"]?></td>
              <td><?= $status?></td>
              <td>
                <form action="/update/order?id=<?= $row["id"]?>" method="post"><button>Sent</button></form>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
    </div>
</div>
<?php require"views/dashboard/footer.view.php" ?>
