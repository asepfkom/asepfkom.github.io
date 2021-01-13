-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2019 pada 18.14
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `status_anggota` enum('Active','Not Active','','') NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_anggota`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `email`, `telepon`, `instansi`, `username`, `password`, `tanggal`) VALUES
(3, 5, 'Active', 'Muhamad Annas', 'muhamadannas@gmail.com', '082212345677', 'Fakultas Komputer', 'muhamad', 'a9ecd0eb1004e7f1fca778d5961b335e042073d4', '2018-12-16 11:44:10'),
(4, 5, 'Not Active', 'Rido Roma', 'rido34@gmail.com', '082212345678', 'Fakultas Kehutanan', 'rido', '739685efb37fcce3e776945b3098d97460fb1f86', '2018-12-16 11:44:51'),
(5, 11, '', 'Algajali', 'algaja@gmail.com', '089977724124', 'Ilmu Komputer', 'algajali', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-18 14:30:04'),
(6, 11, 'Not Active', 'Kaja', 'kaja@gmail.com', '09231244124214', 'DOkter', 'kaja', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-18 14:40:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahasa`
--

CREATE TABLE IF NOT EXISTS `bahasa` (
  `id_bahasa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahasa` varchar(3) NOT NULL,
  `nama_bahasa` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bahasa`),
  UNIQUE KEY `kode_bahasa` (`kode_bahasa`,`nama_bahasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'ID', 'Bahasa Indonesia', 'Bahasa Indonesia Lengkap Sekali', 1, '2018-12-16 14:50:38'),
(2, 'ING', 'Bahasa Inggris', 'Grammer ', 2, '2018-12-16 14:51:37'),
(3, 'SND', 'Sunda', 'Bahasa', 3, '2019-08-24 13:31:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_berita` enum('Publish','Draft','','') NOT NULL,
  `jenis_berita` enum('Berita','Slider','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `judul_berita` (`judul_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
(19, 1, '8-jenis-kupu-kupu', '8 Jenis Kupu Kupu', '<p>ksadh sadfasdas asfnaskf asfasf sadsad</p>', 'apol.jpg', 'Publish', 'Slider', '2018-12-26 07:56:59'),
(20, 11, 'pertemuan-penting', 'Pertemuan Penting', '<p>sadasd sadkasl safasf safas</p>', 'din-syamsuddin-di-dagestanjpg.jpg', 'Publish', 'Berita', '2019-03-20 00:13:53'),
(21, 11, 'kedatangan-pejabat-daerah-ke-kuningan', 'Kedatangan Pejabat Daerah Ke Kuningan', '<p>sadasd sadasd asdasd adsaf</p>\r\n<p>sfasf</p>\r\n<p>safasf</p>', 'jokowi3.jpg', 'Publish', 'Slider', '2019-03-20 00:12:58'),
(22, 11, 'pejabatan-daerah-rapat', 'Pejabatan Daerah Rapat', '<p>asdsad sadasd asdasd sadas</p>', 'din-syamsuddin-kolaborasi-rusia-dunia-islam-jadi-alternatif-atasi-masalah-peradaban-naQ4t9p4lp.jpg', 'Publish', 'Slider', '2019-03-20 00:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `subjek_buku` varchar(255) NOT NULL,
  `letak_buku` varchar(50) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `kolasi` int(11) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `nomor_seri` varchar(50) DEFAULT NULL,
  `status_buku` enum('Publish','Not Publish','Missing','') NOT NULL,
  `ringkasan` text,
  `cover_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `nomor_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
(4, 1, 1, 1, 'Tutorial PHP', 'Hendra Herlambang', '', '23', '1234', 5, 'Informatika', 2018, 'aasfsf', 'Publish', 'safasfasfasf\r\nsafasfas\r\nasfasfas\r\nasfasfas', 'Cara_Menggunakan_Akai_di_Mobile_Legend1.jpg', 5, '2018-12-21 13:57:56', '2018-12-25 14:12:25'),
(5, 1, 3, 2, 'RPL', 'Agus Hartono', 'sfsaf', 'sfasf', '123467', 333, 'Bandung', 2008, '3456', 'Publish', 'sadfnklasnfklas fasflk asf kjas fas fkjbasdfksdfbkjsdbfldskbfkjsab fksdfvvasfkjsavdfkjvsdkfvkjsdvfsdvf', '2.jpg', 7, '2018-12-21 16:00:28', '2018-12-25 14:12:52'),
(6, 11, 1, 1, 'sdsasadasd', 'safsaf', '222', '222', 'SAFSAFsad', 35, 'saff', 2019, 'wqeqwe', 'Publish', 'wqewqe', '5_JENIS_IKAN_ARWANA_PALING_Indah1.jpg', 22, '2018-12-26 08:08:23', '2019-03-19 23:55:40'),
(7, 11, 1, 1, 'Kemerdekaan Indonesia', 'Herlambang', 'kemerdekaan', 'PL2', 'NKRI', 1, 'Indah Sentosa', 2017, 'rtyu', 'Publish', 'sd', 'cara-ampuh-mengatasi-nyeri-haid3.jpg', 4, '2019-08-26 17:09:14', '2019-08-26 15:09:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_buku`
--

CREATE TABLE IF NOT EXISTS `file_buku` (
  `id_file_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_file_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `file_buku`
--

INSERT INTO `file_buku` (`id_file_buku`, `id_user`, `id_buku`, `judul_file`, `nama_file`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 1, 4, 'PHP', 'contoh_surat_lamaran.pdf', 'sfsdf', 1, '2018-12-22 01:58:21'),
(9, 1, 2, 'safasf', 'Clinic_Of_Indonesia.docx', 'safasf', 4, '2018-12-22 08:41:41'),
(11, 1, 5, 'Jaringan', 'Transkip_Nilai.pdf', 'Jaringan', 45, '2018-12-22 09:15:29'),
(12, 1, 5, 'BP 4', 'Undangan_Interview_PT_Unitama_Sari_Mas_-_Surabaya.pdf', 'BP 5', 33, '2018-12-22 09:01:40'),
(13, 1, 4, 'PHP 4', 'OFFICER_DEVELOPMENT_PROGRAM_a1f11.pdf', 'PHP 4', 5, '2018-12-27 07:51:43'),
(14, 1, 4, 'asdasd', 'Hasil_Seleksi_Administrasi_CPNS_Pemkot_Bandung_2018_(1).pdf', 'sadasd', 5, '2018-12-27 07:52:58'),
(15, 1, 6, 'Teknik', 'Bank_BTPN.pdf', 'ddfasfasdf', 4, '2018-12-30 07:05:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(255) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis`),
  UNIQUE KEY `kode_jenis` (`kode_jenis`,`nama_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'FSK', 'Fisika', 'Tentang fisika', 1, '2018-12-21 12:27:05'),
(2, 'TI', 'Teknik Informatika', 'TentangTI', 2, '2018-12-21 12:27:26'),
(3, 'RPL', 'Rekayasa Perangkat Lunak', 'Tentang RPL', 3, '2018-12-21 12:27:56'),
(4, 'K123', 'Komputer', 'Tentang Komputer', 5, '2019-08-24 13:30:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE IF NOT EXISTS `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `map` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `max_hari_peminjaman` int(11) DEFAULT NULL,
  `max_jumlah_peminjaman` int(11) DEFAULT NULL,
  `denda_perhari` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `telepon`, `alamat`, `max_hari_peminjaman`, `max_jumlah_peminjaman`, `denda_perhari`, `tanggal_update`) VALUES
(1, 11, 'SI Perpustakaan', 'Dimana anda dapat belajar', 'Perusahan ini bergerak dibidang jasa asuransi														', 'Kata kunci untuk google																																', 'perpus@gmail.com', 'https://perpustkaan2.000webhostapp.com', 'uniku.jpg', 'uniku1.jpg', 'http://facebook.com/perpustakaan', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.6676401751047!2d108.0423047!3d-6.8102209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68d4b5de28d3e1%3A0xd51feed70c6ca1b7!2sKantor+Desa+Pamulihan!5e0!3m2!1sid!2sid!4v1546321974047" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>																										', '																																																		', '082214627973', 'Jalan Gatot Subroto No. 23 Kec. Cipicung Kab. Kuningan 													', 7, 2, 2000, '2019-09-02 15:10:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url`, `target`, `tanggal`) VALUES
(1, 'Sistem Informasi', 'http://healty-clinik.com/oke/ada', '_self', '2019-08-21 15:31:36'),
(2, 'Mencari Ilham', 'http://healty-clinik.com/oke', '_blank', '2019-08-21 15:42:23'),
(3, 'Nengok AJa', 'http://healty-clinik.com/kwl', '_parent', '2019-08-21 15:42:59'),
(4, 'Makalah', 'http://makalah.com', '_top', '2019-08-21 15:43:33'),
(5, 'Bersama Kita Tingkatkan Ilmu', 'http://pintar.com', '_blank', '2019-08-24 13:32:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text NOT NULL,
  `status_kembali` enum('Belum','Sudah','Hilang','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
(2, 4, 6, 11, '2019-03-29', '2019-04-05', 'tes', 'Hilang', '2019-08-21 14:16:55'),
(5, 6, 6, 11, '2019-08-29', '2019-08-24', 'sdas', 'Belum', '2019-08-22 12:52:34'),
(6, 4, 5, 11, '2019-08-23', '2019-08-23', 'zdas', 'Belum', '2019-08-21 14:37:05'),
(7, 5, 5, 11, '2019-08-29', '2019-09-20', '', 'Belum', '2019-08-21 14:37:21'),
(8, 5, 3, 11, '2019-08-29', '2019-08-30', '', 'Belum', '2019-08-21 14:39:24'),
(9, 5, 3, 11, '2019-08-27', '2019-09-02', '', 'Belum', '2019-08-21 14:40:04'),
(10, 4, 4, 11, '2019-08-28', '2019-09-02', '', 'Belum', '2019-08-21 14:45:49'),
(11, 5, 6, 11, '2019-08-12', '2019-08-23', 'xZX', 'Belum', '2019-08-22 12:50:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'Asep Syarif Hidayat', 'asepfkom2@gmail.com', 'asep', '02071995', 'Admin', NULL, 'tes', '2019-03-17 02:13:26'),
(11, 'Asep Syarif Hi', 'asep@gmail.com', 'asep2', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Admin', '', '', '2019-08-27 12:51:55'),
(12, 'Bima Sakti', 'bimabimasakti@gmail.com', 'bimasakti', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Admin', NULL, 'Pemain Bola', '2019-03-17 12:22:50'),
(13, 'Rumasih', 'rumasih@gmail.com', 'rumasih', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'User', NULL, 'Cantik', '2019-08-27 12:49:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE IF NOT EXISTS `usulan` (
  `id_usulan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `keterangan` text,
  `nama_pengusul` varchar(255) NOT NULL,
  `email_pengusul` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `status_usulan` varchar(20) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usulan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_address`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
(1, 'Kiat sukses Menjadi Penguasaha', 'Asep Syarif Hidayat', 'Informatika', '', 'herman zumapo', 'heman@gmail.com', '::1', 'Pending', '2018-12-30 11:40:07', '2018-12-30 10:40:07'),
(2, 'Sang Saka Menaklukan Awan', 'Hendra Kusuma', 'PT Erlangga', 'Cerita Fiksi', 'Muhammad ', 'muhammad@yahoo.com', '::1', 'Diterima', '2019-08-24 15:35:38', '2019-08-24 13:35:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
