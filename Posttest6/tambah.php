<?php
require "koneksi.php";

if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $pesanan = $_POST["pesanan"];
    $jumlah = $_POST["jumlah"];

    $query = "INSERT INTO pesan (Nama, Pesanan, Jumlah_Pesanan) VALUES ('$nama', '$pesanan', '$jumlah')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: proses_pesanan.php");
        exit();
    } else {
        echo "Gagal menambahkan pesanan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <link rel="stylesheet" href="tambah.css">
</head>

<body>
    <form action="" method="post">
        <label for="">Nama: </label>
        <input type="text" name="nama" required><br>
        <label for="">Pesanan: </label>
        <input type="text" name="pesanan" required><br>
        <label for="">Jumlah Pesanan: </label>
        <input type="number" name="jumlah" required><br>
        <div class="button-container">
            <button type="submit" name="tambah">Tambah Pesanan</button> 
            <a href="proses_pesanan.php">Kembali ke Pesanan Anda</a>
        </div>
    </form>
    
</body>

</html>
