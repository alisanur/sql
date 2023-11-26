<?php
require "koneksi.php";
$id = $_GET["id"];

$result = mysqli_query($conn, "select * from user where id = '$id'");

$user = [];

while ($row = mysqli_fetch_assoc($result)) {
    $user[] = $row;
}

$user = $user[0];

if (isset($_POST["edit"])) {
    $nama = $_POST["username"];
    $nim = $_POST["password"];

    $result = mysqli_query($conn, "update user set username = '$username', password = '$password', foto = '$gambar' where id = '$id'");

    if ($result) {
        echo "
                <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'database_user.php';
                </script>
            ";
    } else {
        echo "
            <script>
            alert('Data Gagal Diubah!');
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data User</title>
</head>

<body>
    <form action="" method="post">
        <label for="">username : </label>
        <input type="text" name="username" id="" value="<?=$user["username"]?>"> <br>
        <label for="">password</label>
        <input type="text" name="password" id="" value="<?=$user["password"]?>"> <br>
        <button type="submit" name="ubah">Ubah</button>
    </form>
    <a href="database_user.php">Kembali ke home</a>
</body>

</html>