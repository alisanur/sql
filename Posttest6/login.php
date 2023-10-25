<?php
session_start();
require 'koneksi.php';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        var_dump($row);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            header('Location: user.html');
            exit;
        }
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if ($username === $adminUsername && password_verify($password, $adminPasswordHash)) {
            $_SESSION['admin_login'] = true;
            $_SESSION['admin_username'] = $username;
            header('Location: about.html');
            exit;
            } 
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'> Username/Password Salah! </p>";
    } else {
        echo "<p style='color: red; display:none;'> Username/Password Salah! </p>";
    }
    ?>
    <form action="" method="post">
        <label for="">Username : </label>
        <input type="text" name="username" id=""> <br>
        <label for="">Password : </label>
        <input type="password" name="password" id=""> <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>