<div class="conteiner p-5">
    <div class="conteiner p-5">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Title</th>
              <th scope="col">Message</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>


          <?php
            // require "functions/getQuery.function.php";
            $query ="SELECT * FROM messages ORDER BY id DESC";
            $result = getQuery($query);
            foreach ($result as $row) {
                if($row["answered"] == 0){
                    $status = "not answered";
                } else{
                    $status = "answered";
                }
                ?>
            <tr>
              <th scope="row"><?= $row["id"]?></th>
              <td><?= $row["name"]?></td>
              <td><?= $row["email"]?></td>
              <td><?= $row["title"]?></td>
              <td><?= $row["message"]?></td>
              <td><?= $status?></td>
              <td>
                <form action="/update/message?id=<?=$row["id"]?>" method="post"><button>Answered</button></form>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
    </div>
</div>