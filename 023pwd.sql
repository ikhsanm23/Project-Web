-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2023 pada 19.52
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
-- Database: `023pwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `nama_artis` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artists`
--

INSERT INTO `artists` (`id`, `nama_artis`, `deskripsi`, `image_path`) VALUES
(1, 'Coldplay', 'An English rock band formed in London in 1996.', 'coldplay.jpg'),
(2, 'Taylor Swift', 'An American singer-songwriter known for her narrative songs about her personal life.', 'taylor_swift.jpg'),
(3, 'Bruno Mars', 'An American singer, songwriter, record producer, and performer.', 'bruno_mars.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konser`
--

CREATE TABLE `konser` (
  `id` int(11) NOT NULL,
  `nama_konser` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konser`
--

INSERT INTO `konser` (`id`, `nama_konser`, `tanggal`, `lokasi`) VALUES
(1, 'ikhsan maulana', '2023-12-20', 'nbintan'),
(2, 'hahahaha', '2023-12-21', 'nbintan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tikett`
--

CREATE TABLE `tikett` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nik` int(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `konser` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tikett`
--

INSERT INTO `tikett` (`id`, `nama`, `alamat`, `nik`, `jumlah`, `konser`, `kategori`) VALUES
(19, 'Ikhsan Maulana', 'jln bintan 7', 12355352, 1, 'coldplay', 'vip'),
(20, 'Farid', 'jogja', 313331, 2, 'taylor', 'vip'),
(21, 'Mail', 'Malay', 2147483647, 3, 'bruno', 'reguler'),
(22, 'Zulham', 'Pleret', 2147483647, 4, 'bruno', 'vip'),
(23, 'Jokowi', 'jakarta', 2147483647, 3131313, 'coldplay', 'reguler'),
(25, 'paiman', 'klaten', 2147483647, 21, 'coldplay', 'reguler');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(4, 'ikhsan123', '$2y$10$6hGJzbMu6NCVuJHwMSKZrO.R4ZdM0LI18VRWmfjY/6G3M/6y3.7hi'),
(13, 'IkhsanMaulana16', '$2y$10$Hke45oU/GQzWoH/y9QCC/OiSFJfUj9pZjtlcQw5V9cFeci1SQb2pu'),
(14, 'ikhsan123131', '$2y$10$9CIr7da6C//oP.eBGESG/e5047M32mAE8sgW.Q7a5MQK6cLsfzAhm'),
(15, '2100018023', '$2y$10$7EEumEsycv0WgB5HmcSKwufxwL.tP1UtybiTHKRqOazEhhIc.LbtG'),
(16, 'paiman', '$2y$10$PX8JSRPP0GrkA9okbVrTXu9piKwP/Qa0IyclQryKkRVxPAJrfzTju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konser`
--
ALTER TABLE `konser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tikett`
--
ALTER TABLE `tikett`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konser`
--
ALTER TABLE `konser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tikett`
--
ALTER TABLE `tikett`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
