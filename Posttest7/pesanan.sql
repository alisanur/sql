-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2023 pada 02.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Pesanan` varchar(255) NOT NULL,
  `Jumlah_Pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`Id`, `Nama`, `Pesanan`, `Jumlah_Pesanan`) VALUES
(19, 'lisa', 'latte', 8),
(20, 'kina', 'Fracapucino', 3),
(21, 'Maya', 'Americano', 1),
(22, 'Bina', 'ColdCoffe', 2),
(23, 'Dila', 'Flat white', 3),
(24, 'Gita', 'Frape', 1),
(25, 'Julia', 'Coffe Mocha', 2),
(26, 'Rita', 'Mochacino', 2),
(27, 'wdd', 'wdew', 3),
(28, 'kis', 'Flat White', 2),
(29, 'lia', 'Caramel Macchiato', 3),
(30, 'gita', 'latte', 3),
(31, 'buna', '', 2),
(32, 'hina', 'Caffe Mocha', 3),
(33, 'huba', 'Chocolate Frappucino', 2),
(34, 'fika', 'Caramel Macchiato', 3),
(35, 'tyia', 'Flat White', 2),
(36, 'cinta', 'milo', 1),
(39, 'kalsd', 'Caramel Macchiato', 3),
(40, 'gtrg', 'Caramel Macchiato', 3),
(42, 'q', 'Caramel Macchiato', 2),
(46, 'ed', 'Caramel Macchiato', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `nohp`, `password`) VALUES
(10, 'fia', '', '', '$2y$10$63nhZ/oLf6KulLEb602GDOf8anBJRortkXC8POfVLwsid3u1eg35y'),
(11, 'luna', '', '', '$2y$10$HdmERPSOGwlZw0j/xcVO/OwUek7otAw9HybqK4IjoSY3UkIAYIRDq'),
(12, 'Rita', '', '', '$2y$10$gKVH.OKfr/MsWz9/hnPfgu.jlDZxw0jzSPEmw2c8g/WqBgEskXqLS'),
(13, 'nia', '', '', '$2y$10$6nnYLpXP2C7cnwUN1dbtvu4EuvExvCY4E.IvGf4KoDFQa2frkai2u'),
(14, 'bina', 'z@gmail.com', '', '$2y$10$pRppU6yOOvm1a.p/xQ2oJOsbi1hoO.PBFO2MR175vbjxx6QaASrsW'),
(15, 'dira', 'd@gmail.com', '123456789', '$2y$10$xnBm0SgvFirLdYcQYiT74OAA4ARVAJHjaOR7Kzg4wE4BFLMUs4B0W'),
(16, 'q', 'q@gmail.com', '1233243', '$2y$10$bqvStQa9XdUzYL1Z5nK2MuFwVNsXUVk5YngYxS.QgVIG/8T2gdyfq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
