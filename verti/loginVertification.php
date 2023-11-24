<?php
    // require "views/dashboard/addNewProduct.view.php";
    // require "config/config.php";
    require "functions/getQuery.function.php";
    $user_name = $_REQUEST["user_name"];
    $password = $_REQUEST["password"];
    $query = "SELECT * FROM admin WHERE user_name = '$user_name'";
    // var_dump($query);

    $result = getQuery($query);
    if($result == "Nothing Found"){
        return header("Location: /login");
    }else{
        foreach ($result as $row) {
            if($row["password"] == $password){
            return header("Location: /dashboard/verti?user_name=$user_name");
                }else{
                    return header("Location: /login");
                }
    }
}
?>