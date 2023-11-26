<?php
require "koneksi.php";

if (isset($_POST["tambah"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // upload
    $foto = $_FILES['foto']['name'];
    $explode = explode('.',$foto);
    $ekstensi = strtolower (end($explode));
    $foto_baru ="$nama.$ekstensi";
    $tmp = $_FILES['foto']['tmp_name'];

    if(move_uploaded_file($tmp,'img/'.$gambar_baru)) {
        $result = mysqli_query($conn, "insert into user 
        (id, username, password, foto) 
        values ('', '$username', '$password', '$foto_baru')");

        if ($result) {
            echo "
                    <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'database_user.php';
                    </script>
                ";
        } else {
            echo error_log ($result)."
                <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'tambahdatauser.php';
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
    <title>Tambah Data</title>
</head>

<body>
<form action="" method="post">
        <label for="">username: </label>
        <input type="text" name="nama" required><br>
        <label for="">password: </label>
        <input type="text" name="pesanan" required><br>
        <label for=""> Upload Gambar</label>
        <input type="file" name="gambar" id=""> <br>
        <div class="button-container">
            <button type="submit" name="tambah">Tambah Pesanan</button> 
            <a href="proses_pesanan.php">Kembali ke Pesanan Anda</a>
        </div>
    </form>
    <a href="database_user.php">Kembali ke home</a>
</body>

</html>