<?php 
    require "config/config.php";

   $name =  $_REQUEST['name'];
   $email =  $_REQUEST['email'];
   $title =  $_REQUEST['title'];
   $message =  $_REQUEST['message'];

   $query = "INSERT INTO messages(
    name,
    email,
    title,
    message
) VALUES (
    '$name',
    '$email',
    '$title',
    '$message'
)";

if(mysqli_query($db, $query)){
    header('Location: /');

}else{
    echo "query error" . mysqli_error($db);
}
?>
