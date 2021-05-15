<?php 
session_start();
if (isset($_COOKIE['login'])){
    if($_COOKIE['login'] == 'true'){
        $_SESSION["login"] = true;
    }
}


if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

if (isset($_POST["logout"])) {
    header("Location: logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <h1>Selamat datang  !!!</h1>
    <form action="" method="post">
        <button type="submit" name="logout">Log Out</button>
    </form>
</div>
</body>
</html>