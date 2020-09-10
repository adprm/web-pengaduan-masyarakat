-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2020 pada 06.34
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(27, 'Aditiya Permana', 'aditiyaprmn00@gmail.com', 'my_profile.jpeg', '$2y$10$GZfSl8fMZKBPPGCEp1N9CusV20LijrSZdfdEr9VtJ5ITwgUX88J2q', 1, 1, 1599504982),
(32, 'Haya Winata', 'haya@gmail.com', 'default.jpg', '$2y$10$pZFHhWCS.Ao.eJEsRIx8e.0HH.UdkNI4w/NdlLSZ8dYYigAbvgaAe', 2, 1, 1599577135),
(33, 'Kevin Renaldo', 'kevin@gmail.com', 'default.jpg', '$2y$10$4Qc8UQVBZg8mx1/iKcgiHu.zJ9zs4IoIvDPMSMktj6DEyV3pQX7DS', 2, 1, 1599577186),
(34, 'Kaisar', 'kaisar@gmail.com', 'default.jpg', '$2y$10$NRnnTrxQkRqVK0M/BNXLa.sajWUnF971Hff/Hsyext75qAoDgXWI2', 2, 1, 1599577219),
(35, 'Hanif Lubis', 'hanif@gmail.com', 'default.jpg', '$2y$10$kIB2L/O3/7z7pQmV.XYtAOOBYDZl5TbSWSULg1QTws7TNm1qI/XAm', 2, 1, 1599577247),
(36, 'Alamsyah', 'alam@gmail.com', 'default.jpg', '$2y$10$wW9vlmU6rjciESA6i1N.we3TMlE6fWG7ICy7LOkZdRxPK7m6j001W', 2, 1, 1599577284);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(14, 1, 2),
(15, 1, 7),
(16, 2, 4),
(17, 1, 5),
(20, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Form Laporan'),
(5, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_report`
--

CREATE TABLE `user_report` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `nik` varchar(64) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `village` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `date_reported` int(11) NOT NULL,
  `file` varchar(64) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_report`
--

INSERT INTO `user_report` (`id`, `name`, `nik`, `rt`, `rw`, `village`, `title`, `description`, `type`, `date_reported`, `file`) VALUES
('5f57a6d18c382', 'Alamsyah', '0311192857689401', 1, 4, 'Kelapa Jaya', 'Banjir', 'Beberapa pemukiman warga terkena dampak dari banjir, saat ini semua warga sedang berada di dalam pengungsian dan sangat membutuhkan bantuan pasokan makanan dan pakaian.', 'Bencana Alam', 1599579857, '5f57a6d18c382.jpeg'),
('5f57a769d43b0', 'Hanif Lubis', '3299000709012871', 2, 4, 'Bantar Kebak', 'Butuh Bantuan Pendidikan', 'Beberapa anak-anak masih terdapat belum mendapatkan pendidikan yang layak.', 'Pendidikan', 1599580009, '5f57a769d43b0.jpg'),
('5f5943e93ebb6', 'Kevin Renaldo', '87501982746661110', 4, 2, 'Bemo Setia', 'DBD', 'Banyak anak dari beberapa anggota keluarga di lingkungan rumah saya terkena penyakit DBD, akibat gigitan nyamuk demam berdarah, saya ingin mengusulkan untuk diadakannya foging.', 'Kesehatan', 1599685609, 'default.jpg'),
('5f59a93f29dc7', 'Kaisar', '00998461729875091', 7, 4, 'Pasir Kuda', 'Narkoba', 'Terdapat rumah yang menjadi tempat penyuludpan barang barang narkoba, seperti ganja, sabu-sabu, dll.', 'Narkoba', 1599711551, '5f59a93f29dc7.jpg'),
('5f59a9e6ba062', 'Haya Winata', '0238777110002954', 4, 6, 'Bumi Putri', 'Jembatan Ambruk', 'Sebuah jembatan ambruk akibat air sungai yang meluap derasnya di sertai banjir bandang.', 'Bencana Alam', 1599711718, '5f59a9e6ba062.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Manajemen', 'menu/submenu', 'fas fa-fa-fw fa-folder-open', 1),
(6, 1, 'Wewenang Akses', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Ubah Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Laporkan!', 'report/addreport', 'fas fa-fw fa-headset', 1),
(10, 5, 'Data Laporan', 'report', 'fas fa-fw fa-tasks', 1),
(11, 1, 'Data Pengguna', 'admin/datamember', 'fas fa-fw fa-users', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(8, 'aa@gmail.com', 'Wag8dsxx6ziM9O8n/HisVkGyy9+az5XeumzNuaJMGg4=', 1599579296);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
