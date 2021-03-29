<?php 

    session_start();

    require "function.php";

    if( isset($_POST["login"]) ){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

        if( mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ){

                $_SESSION["login"] = $username;

                header("Location: form.php");
                exit;
            }else{
                echo "<script>alert('Username dan Password Tidak Sesuai');</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/stylelogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
            
            <form method="POST" action="">
                <h1>Masuk</h1>
                
                <hr>

                <i class="fa icon">&#xf007;</i>
                <input class="field" type="text" name="username" required placeholder="Username">
                
                <br>

                <i class="fa icon">&#xf084;</i>
                <input class="field" type="password" name="password" required placeholder="Password">

                <br>

                <input class="btn" type="submit" name="login" value="Masuk"> <input type="reset" name="reset" value="Reset" class="btn">

                <hr>

                <p>Belum punya akun?<a href="signup.php" class="ini">Daftar disini</a></p> 
            </form>
               
    </body>
</html>