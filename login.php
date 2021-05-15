<?php 
session_start();
if (isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "quizlogin";

$conn = mysqli_connect($servername,$username,$pass,$dbname);

if ( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username= '$username'");

    if(mysqli_num_rows($result) == 1 ) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]){
            $_SESSION["login"] = true;
            if (isset($_POST["remember"])){
                setcookie('login','true', time() + 3600);
            }
            header("Location: index.php");
            exit;
        }
    }
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <table>
                <tr>
                    
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username" id="username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Pasword</label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
            </table>
            <div class="cekbox">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <p>Belum punya akun ? <a href="register.php">Daftar</a><br>
            <button type="submit" name="login">Sign In</button>
            
        </form>
    </div>
</body>
</html>