<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah"])) {
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $pesanan = mysqli_real_escape_string($conn, $_POST["pesanan"]);
    $jumlah = mysqli_real_escape_string($conn, $_POST["jumlah"]);

    $query = "INSERT INTO pesan (Nama, Pesanan, Jumlah_Pesanan) VALUES ('$nama', '$pesanan', '$jumlah')";
    $result = mysqli_query($conn, $query);

    if ($result) {
         echo "
            <script>
            alert('Pesanan Berhasil Ditambahkan!');
            document.location.href = 'user.html';
            </script>
            ";
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
    <style>
        /* Styling untuk pesan */
        .pesan {
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .order-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-content {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="pesan" id="pesan">
    <div class="order-form">
        <form action="" method="POST">
            <div class="form-content">
                <label for="nama">Nama:</label>
                <span></span>
                <input type="text" id="nama" name="nama" required />
            </div>
            <div class="form-content">
                <label for="pesanan">Pesanan:</label> <br>
                <label for="menu"></label>
                <select id="menu" name="pesanan" required>
                  <option value="Caramel Macchiato">Caramel Macchiato</option>
                  <option value="Flat White">Flat White</option>
                  <option value="Chocolate Frappucino">Chocolate Frappucino</option>
                  <option value="Frappucino Coffees">Frappucino Coffees</option>
                  <option value="Frappe">Frappe</option>
                  <option value="Caffe Mocha">Caffe Mocha</option>
                  <option value="Vanilla Frappucino">Vanilla Frappucino</option>
                  <option value="White Chocolate Mocha">White Chocolate Mocha</option>
                  <option value="WIce Latte">Ice Latte</option>
                </select>
            </div>
            <div class="form-content">
                <label for="jumlah">Jumlah:</label>
                <span></span>
                <input type="number" id="jumlah" name="jumlah" required />
            </div>
            <div class="button-container">
                <button type="submit" name="tambah">Kirim</button>
                <a href="user.html">Kembali</a>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
