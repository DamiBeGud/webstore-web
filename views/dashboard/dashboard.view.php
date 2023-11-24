<div class="conteiner">
        <div class="card m-2">
                <div class="card-header">
                    <h3 class="text-primary">Orders</h3>
                </div>
                <div class="card-body">
                <?php
                    // require "functions/getQuery.function.php";
                    $query = "
                    select count(*) from orders
                    ";
                    $result = getQuery($query);
                    $allOrders = 0;
                    foreach ($result as $row) {
                        $allOrders += $row["count(*)"];
                    }
                ?>
                    <div>All Orders: <span><?= $allOrders?></span></div>
                <?php
                    $query = "
                    select date(date), count(*) from orders
                    where MONTH(date) = MONTH(now())
                    and YEAR(date) = YEAR(now())
                    group by date(date)
                    ";
                    $result = getQuery($query);
                    $thisMonth = 0;
                    foreach ($result as $row) {
                        $thisMonth += $row["count(*)"];
                    }
                ?>
                    <div>This Month: <span><?= $thisMonth?></span></div>
                    <?php
                    $query = "
                    select date(date), count(*) from orders
                    where WEEK(date) = WEEK(now())
                    and MONTH(date) = MONTH(now())
                    and YEAR(date) = YEAR(now())
                    group by date(date)
                    ";
                    $result = getQuery($query);
                    $thisWeek = 0;
                    foreach ($result as $row) {
                        $thisWeek += $row["count(*)"];
                    }
                ?>
                    <div>This Week: <span><?= $thisWeek?></span></div>
                    <?php
                    $query = "
                    select  count(*) from orders
                    where status = 0
                    ";
                    $result = getQuery($query);
                    $waitingToBeShipped = 0;
                    foreach ($result as $row) {
                        $waitingToBeShipped += $row["count(*)"];
                    }
                ?>
                    <div>Waiting to be shipped <span><?=$waitingToBeShipped?></span></div>

                </div>
        </div>
        <div class="card m-2">
                <div class="card-header">
                    <h3 class="text-primary">Profit</h3>
                </div>
                <?php
                    $query = "
                    select total_amount from orders
                    where MONTH(date) = MONTH(now())
                    and YEAR(date) = YEAR(now())
                    ";
                    $result = getQuery($query);
                    $thisMonth = 0;
                    foreach ($result as $row) {
                        $thisMonth += $row["total_amount"];
                    }
                ?>
                <div class="card-body">
                    <div>This Month: <span><?=$thisMonth?></span>$</div>
                    <?php
                    $query = "
                    select total_amount from orders
                    where WEEK(date) = WEEK(now())
                    and MONTH(date) = MONTH(now())
                    and YEAR(date) = YEAR(now())
                    ";
                    $result = getQuery($query);
                    $thisWeek = 0;
                    foreach ($result as $row) {
                        $thisWeek += $row["total_amount"];
                    }
                ?>
                    <div>This Week: <span><?=$thisWeek?></span>$</div>
                    <?php
                    $query = "
                    select total_amount from orders
                    where DAY(date) = DAY(now())
                    and MONTH(date) = MONTH(now())
                    and YEAR(date) = YEAR(now())
                    ";
                    $result = getQuery($query);
                    $today = 0;
                    if ($result != "Nothing Found") {
                    foreach ($result as $row) {
                        $today += $row["total_amount"];
                    }
                }
                ?>
                    <div>Today: <span><?=$today?></span>$</div>
                </div>
        </div>
        <div class="card m-2">
                <div class="card-header">
                    <h3 class="text-primary">Messages</h3>
                    <?php
                    $query = "
                    select * from messages
                    ";
                    $result = getQuery($query);
                    $messages = 0;
                    $notAnswered = 0;
                    foreach ($result as $row) {
                        $messages += 1;
                        if($row["answered"] == 0){
                            $notAnswered++;
                        }
                    }
                    $answered = $messages - $notAnswered;
                ?>
                </div>
                <div class="card-body">
                    <div>All Messages <span><?=$messages ?></span></div>
                    <div>Answered <span><?=$answered?></span></div>
                    <div>Not Answered <span><?=$notAnswered ?></span></div>
                </div>
        </div>

    </div>