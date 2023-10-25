<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $pesanan = mysqli_real_escape_string($conn, $_POST["pesanan"]);
    $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

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

    <div class="pesan" id="pesan">
    <div class="order-form">
        <form action="" method="post">
            <div class="form-content">
                <label for="nama">Nama:</label>
                <span></span>
                <input type="text" id="nama" name="nama" required />
            </div>
            <div class="form-content">
                <label for="pesanan">Pesanan:</label>
                <span></span>
                <input type="text" id="pesanan" name="pesanan" required />
            </div>
            <div class="form-content">
                <label for="jumlah">Jumlah:</label>
                <span></span>
                <input type="number" id="jumlah" name="jumlah" required />
            </div>
            <div class="button-container">
                <button type="submit" name="tambah">Tambah Pesanan</button>
                <a href="index.html">Kembali ke Menu Utama</a>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
