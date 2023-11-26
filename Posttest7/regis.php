<?php
    require 'koneksi.php';

    if(isset($_POST['regis'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $result = mysqli_query($conn, 'SELECT * FROM user WHERE username = "$username"');

        if(mysqli_fetch_assoc($result)){
            echo "
                <script>
                    alert('username telah digunakan!');
                    document.location.href = 'regis.php';
                </script>
            ";
        } else {
            if($password === $cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);

                $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username','$email', '$nohp', '$password')");
                if(mysqli_affected_rows($conn) > 0){
                    echo "
                        <script>
                            alert('Registrasi Berhasil!');
                            document.location.href = 'login.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Registrasi Gagal!');
                            document.location.href = 'regis.php';
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Konfirmasi Password tidak sesuai!');
                        document.location.href = 'regis.php';
                    </script>
                ";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
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
            height: 500px;
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
    <form action="" method="post">
        <h1>Registrasi</h1>
        <label for="">Username</label> <br>
        <input type="text" name="username" id=""> <br>
        <label for="email">Email</label> <br>
        <input type="email" name="email" id=""> <br>
        <label for="nohp">NoTelp</label> <br>
        <input type="nohp" name="nohp" id=""> <br>
        <label for="">Password</label> <br>
        <input type="password" name="password" id=""> <br>
        <label for="">Konfirmasi Password</label> <br>
        <input type="password" name="cpassword" id=""> <br>
        <button type="submit" name="regis">Registrasi</button>
    </form>
</body>
</html>