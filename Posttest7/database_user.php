<?php
require "koneksi.php";

$result = mysqli_query($conn, "select * from user");

$user = [];

while ($row = mysqli_fetch_assoc($result)) {
    $user[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    //$sql = "INSERT INTO user (username, password , gambar) VALUES ('$username', '$password', '$gambar')";

    if (mysqli_query($conn, $sql)) {
        header("Location: databese_user.php"); // Redirect ke halaman index.php setelah menyimpan data
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stars Coffee - Profil Anda</title>
    <link rel="stylesheet" href="php.css">
</head>
<body>
    

    <div class="content-pesanan">
        <div class="result-box">
        
        <h3>Profil Anda:</h3>
    <table border="1">
    
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>NoTelp</th>
            <th>Password</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($user as $usr) : ?>
        
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?= $usr["username"] ?> </td>
                <td> <?= $usr["email"] ?> </td>
                <td> <?= $usr["nohp"] ?> </td>
                <td> <?= $usr["password"] ?> </td>
                <td><a href="tambah.php">Tambah</a></td>
                <td><a href="editdatauser.php?id=<?=$usr["id"];?>">Edit</a></td>
                <td><a href="hapus.php?id=<?=$usr["id"];?>">hapus</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
            <!-- Tambahkan tombol kembali ke halaman menu utama-->
            <div class="button-box">
                <a href="user.html">Kembali ke Menu</a>
            </div>
        </div>
    </div>
</body>
</html>

