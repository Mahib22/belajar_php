<?php 

    require "function.php";

    if( isset($_POST["regis"]) ) {

        if( registrasi($_POST) > 0 ) {
            header("Location: barang.php");
        }else{
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/stylelogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
            
            <form class="up" method="POST" action="">
                <h1>Daftar</h1>

                <hr>

                <i class="fa icon">&#xf007;</i>
                <input class="field" type="text" name="username" required placeholder="Username" id="username">

                <br>

                <i class="fa icon">&#xf084;</i>
                <input class="field" type="password" name="password" required placeholder="Password" id="password">

                <br>

                <i class="fa icon">&#xf560;</i>
                <input class="field" type="password" name="password2" required placeholder="Konfirmasi Password" id="password2">
                
                <br><br>

                <input class="btn" type="submit" name="regis" value="Daftar"> <input type="reset" name="reset" value="Reset" class="btn">

                <hr>

                <p class="in"><a href="login.php" class="ini">Sudah punya akun?</a></p> 
            </form>
               
    </body>
</html>