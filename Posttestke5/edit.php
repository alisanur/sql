<?php
require "koneksi.php";

if(isset($_GET["Id"])){
    $id = $_GET["Id"];
    $result = mysqli_query($conn, "SELECT * FROM pesan WHERE Id = '$id'");
    $pesan = mysqli_fetch_assoc($result);

    if(isset($_POST["ubah"])){
        $nama = $_POST["nama"];
        $pesanan = $_POST["pesanan"];
        $jumlah = $_POST["jumlah"];

        $query = "UPDATE pesan SET Nama='$nama', Pesanan='$pesanan', Jumlah_Pesanan='$jumlah' WHERE Id='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: proses_pesanan.php");
            exit();
        } else {
            echo "Gagal mengedit pesanan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="tambah.css">
</head>

<body>
    <form action="" method="post">
        <label for="">Nama: </label>
        <input type="text" name="nama" value="<?= $pesan['Nama']; ?>" required><br>
        <label for="">Pesanan: </label>
        <input type="text" name="pesanan" value="<?= $pesan['Pesanan']; ?>" required><br>
        <label for="">Jumlah Pesanan: </label>
        <input type="number" name="jumlah" value="<?= $pesan['Jumlah_Pesanan']; ?>" required><br>
        <div class="button-container">
            <button type="submit" name="ubah">Ubah Pesanan</button>
            <a href="proses_pesanan.php">Kembali ke Pesanan Anda</a>
        </div>
    </form>
    
</body>

</html>
