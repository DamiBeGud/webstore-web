<?php require"views/dashboard/head.view.php" ?>
<?php require"views/dashboard/nav.view.php" ?>
<div class="conteiner p-5">
    <div class="conteiner p-5">

    <h1 class="text-center">Admin Page</h1>
    <br/>
    <div class="conteiner p-5">
        <form action="" method="post" id="generateInviteURLForm" hidden>
            <button id="generateInviteURL"></button>
        </form>
        <p>Generate registration link for new Admin by clicking on the button bellow</p>
        <?php
            if(isset($_GET["adminToken"])){
                $adminToken = $_GET["adminToken"];
        ?>
        <small id="inviteURL">http://localhost:3000/register?registerToken=<?=$adminToken?></small><br/><br/>
        <?php
            }        
        ?>

        <button type="button" class="btn btn-primary" onclick="generateInviteURL()">Generate</button>
        <script>
            function generateInviteURL(){
                const token = (Math.random() + 1).toString(36).substring(2) + (Math.random() + 1).toString(36).substring(2) + (Math.random() + 1).toString(36).substring(2);
                document.getElementById('generateInviteURLForm').setAttribute('action', '/registration/create/token?token=' + token)
                document.getElementById('generateInviteURL').click()
            }
        </script>
    </div>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
            </tr>
          </thead>
          <tbody>
          <?php
            // require "functions/getQuery.function.php";
            $query ="SELECT id, user_name FROM admin";
            $result = getQuery($query);
            foreach ($result as $row) {
                ?>
            <tr>
              <th scope="row"><?= $row["id"]?></th>
              <td><?= $row["user_name"]?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
    </div>
</div>
<?php require"views/dashboard/footer.view.php" ?>