<?php
require 'koneksi.php';

$query = "SELECT * FROM order";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
</head>

<body>
    <h1>Daftar Pesanan</h1>
    <table>
        <tr>
            <th>ID Pesanan</th>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['menu_nama'] . "</td>";
            echo "<td>" . $row['jumlah'] . "</td>";
            echo "<td>Rp" . number_format($row['total_harga'], 2) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
