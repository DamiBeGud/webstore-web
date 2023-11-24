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
    
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jsonwebtoken/9.0.2/index.js" integrity="sha512-RXL0bGpRhGqIgv9FZ4AneJDhu45H8APjVTTUhRlEHaFkooaz1PNor74q2OB/jmq/XunG3qwZB1jaAHNZ1O9niA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* .cart::after{
            content: "0";
            font-size: 12px;  
        } */
        @media(width > 767px){
            .cart{
                position: absolute;
                top: 10px;
                right:10px;
            }
        }
        ul{
            list-style-type: none
        }
    </style>
</head>
<body onload="token()">
<form action="/create/token" method="post" hidden>
    <input type="text" name="token" id="token" value=""/>
    <input type="text" name="cart" id="cart" value=""/>
    <button id="tokenButton"></button>
</form>
    <script>
        function token(){
        const storage = localStorage.getItem('token')
        Storage.prototype.setObj = function(key, obj) {
            return this.setItem(key, JSON.stringify(obj))
        }
        Storage.prototype.getObj = function(key) {
            return JSON.parse(this.getItem(key))
        }
        if(!storage){
            
            const token = (Math.random() + 1).toString(36).substring(2) + (Math.random() + 1).toString(36).substring(2) + (Math.random() + 1).toString(36).substring(2);
            // console.log(token)
            localStorage.setItem('token', token)
            document.getElementById('token').value=token
            document.getElementById('tokenButton').click()
            
        }else{
            console.log(storage)

        }
    }
    </script>
    <?php
        require "functions/getQuery.function.php";
    ?>