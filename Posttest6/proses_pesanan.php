<?php
require "koneksi.php";

$result = mysqli_query($conn, "select * from pesan");

$pesan = [];

while ($row = mysqli_fetch_assoc($result)) {
    $pesan[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $menu = mysqli_real_escape_string($conn, $_POST["menu"]);
    $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

    $sql = "INSERT INTO pesan (Nama, Pesanan, Jumlah_Pesanan) VALUES ('$nama', '$menu', '$jumlah')";

    if (mysqli_query($conn, $sql)) {
        header("Location: proses_pesanan.php"); 
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
    <title>Stars Coffee - Pesanan Anda</title>
    <link rel="stylesheet" href="php.css">
</head>
<body>
    
    

    <div class="content-pesanan">
        <div class="result-box">
        
        <h3>Pesanan Anda:</h3>
    <table border="1">
    
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pesanan</th>
            <th>Jumlah Pesanan</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($pesan as $psn) : ?>
        
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?= $psn["Nama"] ?> </td>
                <td> <?= $psn["Pesanan"] ?> </td>
                <td> <?= $psn["Jumlah_Pesanan"] ?> </td>
                <td><a href="tambah.php">Tambah</a></td>
                <td><a href="edit.php?Id=<?=$psn["Id"];?>">Edit</a></td>
                <td><a href="hapus.php?Id=<?=$psn["Id"];?>">hapus</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
            <!-- Tambahkan tombol kembali ke halaman menu utama-->
            <div class="button-box">
                <a href="index.html">Kembali ke Menu</a>
            </div>
        </div>
    </div>z
</body>
</html>

