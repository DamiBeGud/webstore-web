<?php 

 function getQuery($query){
        $db = new mysqli("localhost", "root","","online_store");
        $queryRun = $db -> query($query);
        if($queryRun -> num_rows > 0){
            // var_dump($queryRun->num_rows);
            return $queryRun;
        }else{
            return $queryRun = "Nothing Found";
        }
    }
?>