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

if(isset($_POST["kembali"])){
    header("Location: index.php");
    exit;
}
if (!isset($_POST["rpassword"])){
    if (!isset($_POST["rcpassword"])){
        $rpassword = 0;
        $rcpassword = 1;
    }
} else {
    $rpassword = $_POST["rpassword"];
    $rcpassword = $_POST["rcpassword"];
}
if ($rpassword == $rcpassword){
    if (isset($_POST["daftar"])){
        $nama = $_POST["rnama"];
        $username = $_POST["rusername"];
        $password = $_POST["rpassword"];
        mysqli_query($conn,"INSERT INTO users (nama,username,`password`) VALUES ('$nama','$username','$password')");
        header("Location: login.php");
        exit;
    } else {echo "<h2>password dan Confirm password harus sama </h2> ";}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="container">
    <h1>Register</h1>
    <form action="" method="post">
    <table>
        <tr>
            <td><label for="$rnama">Nama</label></td>
            <td><input type="text" name="rnama" id="rnama" required></td>
        </tr>
        <tr>
            <td><label for="$rusername">Username</label></td>
            <td><input type="text" name="rusername" id="rusername" required></td>
        </tr>
        <tr>
            <td><label for="$rpassword">Password</label></td>
            <td><input type="password" name="rpassword" id="rpassword" required></td>
        </tr>
        <tr>
            <td><label for="$rcpassword">Confirm-Password</label></td>
            <td><input type="password" name="rcpassword" id="rcpassword" required></td>
        </tr>
        <tr>
            <td><button type="submit" name="daftar">Daftar</button></td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>