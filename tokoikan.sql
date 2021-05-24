-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 04.25
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang_055` int(11) NOT NULL,
  `nama_barang_055` varchar(30) NOT NULL,
  `harga_barang_055` decimal(16,2) NOT NULL,
  `stok_barang_055` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang_055`, `nama_barang_055`, `harga_barang_055`, `stok_barang_055`) VALUES
(1, 'Gurami Putih', '40000.00', 435),
(2, 'Lele Jombo', '20000.00', 298),
(4, 'Emas Putih', '45000.00', 261);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi_055` int(11) NOT NULL,
  `harga_transaksi_055` decimal(16,2) NOT NULL,
  `jumlah_transaksi_055` int(11) NOT NULL,
  `total_transaksi_055` decimal(16,2) NOT NULL,
  `tanggal_transaksi_055` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `barang_id_055` int(11) DEFAULT NULL,
  `user_id_055` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi_055`, `harga_transaksi_055`, `jumlah_transaksi_055`, `total_transaksi_055`, `tanggal_transaksi_055`, `barang_id_055`, `user_id_055`) VALUES
(1, '45000.00', 20, '900000.00', '2021-05-24 01:52:56', 4, 1),
(2, '20000.00', 10, '200000.00', '2021-05-24 01:53:06', 2, 9),
(3, '40000.00', 4, '160000.00', '2021-05-22 01:53:35', 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user_055` int(11) NOT NULL,
  `nama_user_055` varchar(40) NOT NULL,
  `username_user_055` varchar(30) NOT NULL,
  `password_user_055` varchar(255) NOT NULL,
  `telepon_user_055` varchar(20) NOT NULL,
  `alamat_user_055` varchar(80) NOT NULL,
  `role_user_055` enum('admin','waiter','owner','customer') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user_055`, `nama_user_055`, `username_user_055`, `password_user_055`, `telepon_user_055`, `alamat_user_055`, `role_user_055`) VALUES
(1, 'Febri Hidayan', 'febrihidayan', '$argon2i$v=19$m=65536,t=4,p=1$UUp2MFJSQkRiVTRUbTVXSQ$Wf2Q7wzTMoMgR1ldaDAgEpPUYGgKNi/4uQLBcskL4o8', '082284502333', 'Jl. Suka Mulia Jakarta Selatan', 'customer'),
(3, 'Admin', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$NUVpcVBCVm96VUhCcnk4aw$UD/cIda/3B8MXTYW0V2SuVSA1GW/RQ7/PbySsaC4vQM', '08228438484', 'Jl. Durian Paus', 'admin'),
(4, 'Waiter', 'waiter', '$argon2i$v=19$m=65536,t=4,p=1$bGI3VjRwc0hxdk90NTZTZQ$8Ry8Ka92Ingz5RN0exMB5ajgmWMkluEyBrTeE74tjEI', '08318394449', 'Jl. Keberap Cak Dui', 'waiter'),
(5, 'Owner', 'owner', '$argon2i$v=19$m=65536,t=4,p=1$MXhUVTMwYnZKRFJ6RmdyNg$UioZNrvyT2l5qzac+I91Ee100IqIql6ohs99QDCVv8A', '082284502333', 'Jl. Indah Karya', 'owner'),
(9, 'Lisman', 'lisman', '$argon2i$v=19$m=65536,t=4,p=1$QUVhWGVxaUE1eFRHTjBJMw$+70bE0pph+FZQm8xXVUXj2eqIOf2bGSdP50oC830YrY', '082284502333', 'Jl. Garuda Murtama', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang_055`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi_055`),
  ADD KEY `barang_id_055` (`barang_id_055`),
  ADD KEY `user_id_055` (`user_id_055`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user_055`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang_055` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi_055` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user_055` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`barang_id_055`) REFERENCES `barang` (`id_barang_055`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user_id_055`) REFERENCES `users` (`id_user_055`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
