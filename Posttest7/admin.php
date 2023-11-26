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
        header("Location: proses_pesanan.php"); // Redirect ke halaman index.php setelah menyimpan data
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "select * from user");

$user = [];

while ($row = mysqli_fetch_assoc($result)) {
    $user[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    //$sql = "INSERT INTO user (username, password , gambar) VALUES ('$username', '$password', '$gambar')";

    if (mysqli_query($conn, $sql)) {
        header("Location: databese_user.php"); // Redirect ke halaman index.php setelah menyimpan data
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en" class="dark-mode">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stars Coffee</title>
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Stars Coffee</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <header>
      <div class="logo">
        <a href="#"
          ><b>Stars <span>Coffee</span></b></a
        >
      </div>

      <nav>
        <ul>
          <li>
            <a href="#"><b>Home</b></a>
          </li>
          <li>
            <a href="logout.php"><b>Log Out</b></a>
          </li>
        </ul>
      </nav>
    </header>

    <div id="content" class="content">
      <h2>Selamat datang Di Stars Coffee</h2>
      <div id="current-time"></div>
    </div>

    <script>
      // Fungsi untuk mendapatkan waktu saat ini
      function getCurrentTime() {
        const now = new Date();
        const days = [
          "Minggu",
          "Senin",
          "Selasa",
          "Rabu",
          "Kamis",
          "Jumat",
          "Sabtu",
        ];
        const months = [
          "Januari",
          "Februari",
          "Maret",
          "April",
          "Mei",
          "Juni",
          "Juli",
          "Agustus",
          "September",
          "Oktober",
          "November",
          "Desember",
        ];
        const day = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();

        // Menampilkan informasi waktu pada elemen dengan id "current-time"
        document.getElementById(
          "current-time"
        ).textContent = `${day}, ${date} ${month} ${year} ${hours}:${minutes}:${seconds}`;
      }

      // Memanggil fungsi getCurrentTime() setiap detik untuk memperbarui waktu secara real-time
      setInterval(getCurrentTime, 1000);
    </script>

    <div class="contact" id="contact">
      <div class="contact-box">
        <!-- <div class="contact-image">
          <img src="img/bg-image.jpeg" /> -->
        </div>
      </div>
      <!-- <div class="contact-box">
        <div class="contact-body">
        <div class="content-pesanan">
        <div class="result-box">
         -->
        <h3>DataBase Pesanan</h3> 
        <td><a href="tambah.php">Tambah</a></td>
    <table border="1">
    
    
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pesanan</th>
            <th>Jumlah Pesanan</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($pesan as $psn) : ?>
        
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?= $psn["Nama"] ?> </td>
                <td> <?= $psn["Pesanan"] ?> </td>
                <td> <?= $psn["Jumlah_Pesanan"] ?> </td>
                <td><a href="edit.php?Id=<?=$psn["Id"];?>">Edit</a></td>
                <td><a href="hapus.php?Id=<?=$psn["Id"];?>">hapus</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
            <!-- Tambahkan tombol kembali ke halaman menu utama-->
            <!-- <div class="button-box">
                <a href="index.html">Kembali ke Menu</a>
            </div> -->
        </div>
    </div>
        </div>
      </div>
    </div>

        
        <h3>DATABASE USER</h3>
    <table border="1">
    
    <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>NoTelp</th>
        </tr>
        <?php $i = 1;
        foreach ($user as $usr) : ?>
        
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?= $usr["username"] ?> </td>
                <td> <?= $usr["email"] ?> </td>
                <td> <?= $usr["nohp"] ?> </td>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
            <!-- Tambahkan tombol kembali ke halaman menu utama-->
            <!-- <div class="button-box">
                <a href="user.html">Kembali ke Menu</a>
            </div> -->
        </div>
    </div>

    <div class="footer">
      <div class="footer-box">
        <div class="social-media">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="copyright">
          <label>Copyright &copy; 2023</label>
        </div>
        <div class="brand">
          <label>Stars <span>Coffee</span></label>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
