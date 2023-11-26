<?php
require "koneksi.php";

if(isset($_GET["Id"])){
    $id = $_GET["Id"];
    $query = "DELETE FROM pesan WHERE Id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
            <script>
            alert('Pesanan Berhasil Dihapus!');
            document.location.href = 'admin.php';
            </script>
            ";
        exit();
    } else {
        echo "Gagal menghapus pesanan.";
    }
}
?>
