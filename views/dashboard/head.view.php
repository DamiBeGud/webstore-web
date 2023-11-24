<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>


    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body onload="auth()">
  <?php
    require "config/adminToken.php";
    foreach ($adminTokens as $token) {
      ?>
      <p class="tokenCheck" hidden><?=$token?></p>
      <?php
    }
  ?>

  <a href="/login" id="btn" hidden></a>

<script>
  function auth(){
    let adminToken =localStorage.getItem('adminToken')
    let adminTokens = document.getElementsByClassName('tokenCheck')
    console.log(adminTokens)
  
    let adminTokensArray = new Array
      for(let token of adminTokens){
        adminTokensArray.push(token.innerText)
        // console.log(token.innerText)
      }
    console.log(adminTokensArray)
    let auth = adminTokensArray.filter((token)=> token === adminToken)
    if(auth.length === 0){
      console.log('logout')
      document.getElementById('btn').click()
      // document.getElementById('authForm').setAttribute('action', '/auth?admin_token=' + adminToken)
    }
  }
</script>