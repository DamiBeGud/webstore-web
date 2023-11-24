<?php
    require "config/config.php";
    require "functions/getQuery.function.php";

    $adminTokens = [];
    $query="
        SELECT login_token FROM admin
    ";
    $result = getQuery($query);
    foreach ($result as $row) {
        $adminTokens[] = $row["login_token"];

    }
?>