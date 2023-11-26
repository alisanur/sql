<?php
require "koneksi.php";
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect ke halaman login jika pengguna belum login
    exit();
}

$username = $_SESSION["username"];

$query = "SELECT * FROM pesan WHERE Nama_Pengguna = '$username'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="tampil.css">
</head>

<body>
    <h2>Daftar Pesanan</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Pesanan</th>
            <th>Jumlah Pesanan</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["Nama"] . "</td>";
            echo "<td>" . $row["Pesanan"] . "</td>";
            echo "<td>" . $row["Jumlah_Pesanan"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
