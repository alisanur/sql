<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hasil-pesanan">
        <h2>Terima kasih, <?php echo $_GET["nama"]; ?>!</h2>
        <p>Anda telah memesan <?php echo $_GET["jumlah"]; ?> <?php echo $_GET["menu"]; ?>.</p>
        <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->
    </div>
</body>
</html>
