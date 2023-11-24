<script> 
    const token = (Math.random() + 1).toString(36).substring(2) + (Math.random() + 1).toString(36).substring(2) + (Math.random() + 1).toString(36).substring(2);
    // console.log(token)
    localStorage.setItem('adminToken', token)
</script>
<a href="" id="redirect"></a>
<script>
    <?php
        $user_name = $_GET["user_name"]
    ?>
    document.getElementById("redirect").setAttribute('href', '/auth?adminToken=' + token + '&user_name=' + "<?=$user_name?>")
    document.getElementById("redirect").click()
</script>