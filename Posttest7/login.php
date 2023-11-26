<?php
session_start();
require 'admin_config.php';
require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah login admin
    if ($username === $adminUsername && password_verify($password, $adminPasswordHash)) {
        $_SESSION['admin_login'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: admin.php');
        exit;
    }

    // Periksa apakah login user biasa
    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            header('Location: user.html');
            exit;
        }
    }

    // Jika tidak ada yang cocok, set flag error
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(
                to bottom right,
                rgba(96, 76, 76, 0.6),
                rgba(96, 76, 76, 0.6)
            ),
            url("img/bg-image1.jpg");
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        form {
            position: relative;
            width: 300px;
            height: 300px;
            background-color: transparent;
            border: 1px solid rgb(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 8px 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: black;
        }

        label {
            display: block;
            margin-bottom: 5px 5px;
            color: black;
        }

        input {
            width: 100%;
            padding: 8px 20px;
            margin-bottom: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'> Username/Password Salah! </p>";
    }
    ?>
    <form action="" method="post">
    <h1>Login</h1>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" required> <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required> <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>
