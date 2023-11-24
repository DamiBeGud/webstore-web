
<div class="container p-5">
  <div class="row justify-content-center p-5">
    <div class="col-6 p-5">
        <h1 class="text-center">Store Admin</h1>
        <h2 class="text-center">Register</h2>
        <br/>
            <form action="" method="post" id="regForm">
                <div class="form-group mb-2 ">
                    <label for="exampleInputEmail1 ">Username</label>
                    <input type="text" class="form-control" placeholder="username" name="user_name">
                </div>
                <div class="form-group mb-2 ">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                </div>
                <div class="form-group mb-2 ">
                    <label for="exampleInputPassword1">Repete Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="repetePassword">
                </div>
                <p id="passwordErr"></p>
                <button type="button" class="btn btn-primary" onclick="register()">Register</button>
                <button type="submit" class="btn btn-primary" id="registerButton"hidden></button>
            </form>
        </div>
    </div>
</div>
<script>
    function register(){
        let password = document.getElementById('password')
        let repetePassword = document.getElementById('repetePassword')
        let token = document.getElementById('registerToken').innerText

        if(password.value === repetePassword.value){
            document.getElementById('regForm').setAttribute('action', '/register/verti?registerToken=' + token)
            document.getElementById('registerButton').click()
        }else{
            document.getElementById('passwordErr').innerText = "Password Fileds must be same"
            password.value = ""
            repetePassword.value = ""
        }
    }
</script>

<?php require "views/dashboard/footer.view.php" ?>