<?php
    require 'koneksi.php';

    if(isset($_POST['regis'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $gambar = $_FILES['gambar']['username'];
        $explode = explode('.',$gambar);
        $ekstensi = strtolower (end($explode));
        $gambar_baru = "$username.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_username'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if(move_uploaded_file($tmp,'img/'.$gambar_baru)) {
            $result = mysqli_query($conn, "insert into user 
            (id, username, password, gambar) 
            values ('', '$username', '$password', '$gambar_baru')");
        }

        if(mysqli_fetch_assoc($result)){
            echo "
                <script>
                    alert('Username telah digunakan!');
                    document.location.href = 'regis.php';
                </script>
            ";
        } else {
            // 92
            if($password === $cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);

                $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$gambar')");
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
</head>
<body>
    <h1>Registrasi</h1>
    <form action="" method="post">
        <label for="">Username</label> <br>
        <input type="text" name="username" id=""> <br>
        <label for="">Password</label> <br>
        <input type="password" name="password" id=""> <br>
        <label for="">Konfirmasi Password</label> <br>
        <input type="password" name="cpassword" id=""> <br>
        <label for=""> Upload Gambar</label>
        <input type="file" name="gambar" id=""> <br>
        <button type="submit" name="regis">Registrasi</button>
    </form>
</body>
</html>