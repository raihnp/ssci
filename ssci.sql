-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 06:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssci`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `pin` int(6) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `tentor` varchar(50) NOT NULL,
  `qrcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `tgl`, `nama`, `foto`, `level`) VALUES
(1, '18-12-2021 22:33:49', 'zabina', '61bdff5d86b89.jpg', 1),
(2, '18-12-2021 23:22:30', 'admin1', '61be0ac6e0008.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `tawar1` varchar(20) NOT NULL,
  `kategori1` varchar(10) NOT NULL,
  `tingkat1` varchar(20) NOT NULL,
  `tingkata1` varchar(30) NOT NULL,
  `tingkatb1` varchar(30) NOT NULL,
  `tingkatc1` varchar(30) NOT NULL,
  `harga1` varchar(20) NOT NULL,
  `tawar2` varchar(20) NOT NULL,
  `kategori2` varchar(10) NOT NULL,
  `tingkat2` varchar(20) NOT NULL,
  `tingkata2` varchar(30) NOT NULL,
  `tingkatb2` varchar(30) NOT NULL,
  `tingkatc2` varchar(30) NOT NULL,
  `harga2` varchar(20) NOT NULL,
  `tawar3` varchar(20) NOT NULL,
  `kategori3` varchar(10) NOT NULL,
  `tingkat3` varchar(20) NOT NULL,
  `tingkata3` varchar(30) NOT NULL,
  `tingkatb3` varchar(30) NOT NULL,
  `tingkatc3` varchar(30) NOT NULL,
  `harga3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `tgl`, `tawar1`, `kategori1`, `tingkat1`, `tingkata1`, `tingkatb1`, `tingkatc1`, `harga1`, `tawar2`, `kategori2`, `tingkat2`, `tingkata2`, `tingkatb2`, `tingkatc2`, `harga2`, `tawar3`, `kategori3`, `tingkat3`, `tingkata3`, `tingkatb3`, `tingkatc3`, `harga3`) VALUES
(1, '20-10-2021 17:01:43', 'Penawaran 2021/2022', 'Platinum', 'Untuk Kelas 12 SMA', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 12.350.000', 'Penawaran 2021/2022', 'Gold', 'Untuk Kelas 12 SMA', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 11.700.000', 'Penawaran 2021/2022', 'Silver', 'Untuk Kelas 12 SMA', '3 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 9.100.000');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `tgl`, `foto`, `judul`, `subject`, `link`) VALUES
(2, '05-01-2022 20:45:30', '615aedd5ede45.jpg', '10 SMA Terbaik di Yogyakarta 2021', 'Berbeda dari tahun sebelumnya, sekolah yang diikutkan dalam pemeringkatan ini adalah sekolah dengan jumlah peserta yang mengikuti UTBK 2021 lebih dari 40 orang.', 'https://drive.google.com/file/d/1au84cA-sYZfk0OftIzM7_0PYLxWrwQju/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `id` varchar(7) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `judul1` varchar(200) NOT NULL,
  `link1` varchar(255) NOT NULL,
  `judul2` varchar(200) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `judul3` varchar(200) NOT NULL,
  `link3` varchar(255) NOT NULL,
  `judul4` varchar(200) NOT NULL,
  `link4` varchar(255) NOT NULL,
  `judul5` varchar(200) NOT NULL,
  `link5` varchar(255) NOT NULL,
  `judul6` varchar(200) NOT NULL,
  `link6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `tgl`, `judul1`, `link1`, `judul2`, `link2`, `judul3`, `link3`, `judul4`, `link4`, `judul5`, `link5`, `judul6`, `link6`) VALUES
(1, '18-10-2021 07:34:49', 'Cara Hitung Nilai UTBK 2021 Pakai Sistem IRT', 'https://maukuliah.id/blog/cara-hitung-nilai-utbk-2021-pakai-sistem-irt/', '10 SMA Terbaik se-Indonesia Berdasarkan Nilai UTBK ', 'https://tekno.tempo.co/read/1515655/10-sma-terbaik-se-indonesia-berdasarkan-nilai-utbk', 'Kapan Pendaftaran UTBK SBMPTN 2022/2023 Dilaksanakan?', 'https://mamikos.com/info/kapan-pendaftaran-utbk-sbmptn-dilaksanakan-mhs/', 'EMPAT', 'https://qameo.pameo.co/join-us/', 'LIMA', 'LIMALIMALIMA', 'ENAM', 'ENAMENAMENAM');

-- --------------------------------------------------------

--
-- Table structure for table `privat`
--

CREATE TABLE `privat` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `tawar1` varchar(20) NOT NULL,
  `kategori1` varchar(20) NOT NULL,
  `tingkat1` varchar(20) NOT NULL,
  `tingkata1` varchar(30) NOT NULL,
  `tingkatb1` varchar(30) NOT NULL,
  `tingkatc1` varchar(30) NOT NULL,
  `harga1` varchar(20) NOT NULL,
  `tawar2` varchar(20) NOT NULL,
  `kategori2` varchar(10) NOT NULL,
  `tingkat2` varchar(20) NOT NULL,
  `tingkata2` varchar(30) NOT NULL,
  `tingkatb2` varchar(30) NOT NULL,
  `tingkatc2` varchar(30) NOT NULL,
  `harga2` varchar(20) NOT NULL,
  `tawar3` varchar(20) NOT NULL,
  `kategori3` varchar(10) NOT NULL,
  `tingkat3` varchar(20) NOT NULL,
  `tingkata3` varchar(30) NOT NULL,
  `tingkatb3` varchar(30) NOT NULL,
  `tingkatc3` varchar(30) NOT NULL,
  `harga3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privat`
--

INSERT INTO `privat` (`id`, `tgl`, `tawar1`, `kategori1`, `tingkat1`, `tingkata1`, `tingkatb1`, `tingkatc1`, `harga1`, `tawar2`, `kategori2`, `tingkat2`, `tingkata2`, `tingkatb2`, `tingkatc2`, `harga2`, `tawar3`, `kategori3`, `tingkat3`, `tingkata3`, `tingkatb3`, `tingkatc3`, `harga3`) VALUES
(1, '20-12-2021 18:53:25', 'Penawaran 2021/2022', 'program 4 sesi', 'Untuk Kelas 12 SMA', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 12.350.000', 'Penawaran 2021/2022', 'Gold', 'Untuk Kelas 12 SMA', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 11.700.000', 'Penawaran 2021/2022', 'Silver', 'Untuk Kelas 12 SMA', '3 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 9.100.000');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL,
  `foto4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id`, `tgl`, `foto1`, `foto2`, `foto3`, `foto4`) VALUES
(1, '13-01-2022 21:50:26', '61dd78058c20f.jpg', '61dba39798e03.jpg', '6220dfc3b4976.jpg', '61e03c32874f4.png');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `utk_tgl` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `text` varchar(15) NOT NULL,
  `tentor` varchar(20) NOT NULL,
  `code` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`id`, `utk_tgl`, `jam`, `text`, `tentor`, `code`) VALUES
(1, '11/12/2021', '13.00', 'fisika', 'pak eko', 'SSCI02345679'),
(2, '13/12/2021', '19.00', 'kimia', 'ibu anik', 'SSCI01245689'),
(3, '11/12/2021', '13.00', 'kimia', 'Bu Tanti', 'SSCI02456789'),
(4, '2/1/2022', '17.00 - 19.00', 'Fisika', 'Faudan', 'SSCI01456789'),
(5, '29/12/2021', '15.00', 'Sejarah', 'Pak Slamet', 'SSCI12345679');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `tgl`, `rating`) VALUES
(6, '17-09-2021 19:05:11', 5),
(8, '17-09-2021 20:45:11', 5),
(9, '22-09-2021 11:26:31', 3),
(10, '23-09-2021 09:30:10', 2),
(11, '06-10-2021 13:21:40', 4),
(12, '06-10-2021 13:22:01', 5),
(13, '18-10-2021 07:35:17', 5),
(14, '20-10-2021 19:59:57', 5),
(15, '20-10-2021 20:20:36', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sd`
--

CREATE TABLE `sd` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `tawar1` varchar(20) NOT NULL,
  `kategori1` varchar(10) NOT NULL,
  `tingkat1` varchar(20) NOT NULL,
  `tingkata1` varchar(30) NOT NULL,
  `tingkatb1` varchar(30) NOT NULL,
  `tingkatc1` varchar(30) NOT NULL,
  `harga1` varchar(20) NOT NULL,
  `tawar2` varchar(20) NOT NULL,
  `kategori2` varchar(10) NOT NULL,
  `tingkat2` varchar(20) NOT NULL,
  `tingkata2` varchar(30) NOT NULL,
  `tingkatb2` varchar(30) NOT NULL,
  `tingkatc2` varchar(30) NOT NULL,
  `harga2` varchar(20) NOT NULL,
  `tawar3` varchar(20) NOT NULL,
  `kategori3` varchar(10) NOT NULL,
  `tingkat3` varchar(20) NOT NULL,
  `tingkata3` varchar(30) NOT NULL,
  `tingkatb3` varchar(30) NOT NULL,
  `tingkatc3` varchar(30) NOT NULL,
  `harga3` varchar(20) NOT NULL,
  `tawar4` varchar(20) NOT NULL,
  `kategori4` varchar(10) NOT NULL,
  `tingkat4` varchar(20) NOT NULL,
  `tingkata4` varchar(30) NOT NULL,
  `tingkatb4` varchar(30) NOT NULL,
  `tingkatc4` varchar(30) NOT NULL,
  `harga4` varchar(20) NOT NULL,
  `tawar5` varchar(20) NOT NULL,
  `kategori5` varchar(10) NOT NULL,
  `tingkat5` varchar(20) NOT NULL,
  `tingkata5` varchar(30) NOT NULL,
  `tingkatb5` varchar(30) NOT NULL,
  `tingkatc5` varchar(30) NOT NULL,
  `harga5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sd`
--

INSERT INTO `sd` (`id`, `tgl`, `tawar1`, `kategori1`, `tingkat1`, `tingkata1`, `tingkatb1`, `tingkatc1`, `harga1`, `tawar2`, `kategori2`, `tingkat2`, `tingkata2`, `tingkatb2`, `tingkatc2`, `harga2`, `tawar3`, `kategori3`, `tingkat3`, `tingkata3`, `tingkatb3`, `tingkatc3`, `harga3`, `tawar4`, `kategori4`, `tingkat4`, `tingkata4`, `tingkatb4`, `tingkatc4`, `harga4`, `tawar5`, `kategori5`, `tingkat5`, `tingkata5`, `tingkatb5`, `tingkatc5`, `harga5`) VALUES
(1, '20-10-2021 20:15:06', 'Penawaran 2021/2022', 'Platinum', 'Untuk Kelas 6 SD', '4 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 10 siswa ', 'Rp 12.350.000', 'Penawaran 2021/2022', 'Gold', 'Untuk Kelas 6 SD', '4 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 15 siswa ', 'Rp 9.750.000', 'Penawaran 2021/2022', 'Silver', 'Untuk kelas 6 SD', '4 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 7.410.000', 'Penawaran 2021/2022', 'Populer', 'Untuk kelas 5 SD', '3 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 7.410.000', 'Penawaran 2021/2022', 'Promo', 'Untuk kelas 5 SD', '4 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 12.350.000');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `program` varchar(50) NOT NULL,
  `sekolah` varchar(35) NOT NULL,
  `tgl_lahir` varchar(12) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hobi` varchar(20) NOT NULL,
  `daftar` varchar(20) NOT NULL,
  `jadwal` varchar(30) NOT NULL,
  `prestasi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `ortu` varchar(40) NOT NULL,
  `alamatortu` text NOT NULL,
  `kotaortu` varchar(20) NOT NULL,
  `telponortu` varchar(20) NOT NULL,
  `hportu` varchar(20) NOT NULL,
  `emailortu` varchar(30) NOT NULL,
  `pekerjaanortu` varchar(20) NOT NULL,
  `keteranganortu` text NOT NULL,
  `promosi` varchar(20) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `kategori`, `nilai`, `harga`, `tgl`, `nama`, `jk`, `pin`, `jenjang`, `kelas`, `program`, `sekolah`, `tgl_lahir`, `tempat_lahir`, `alamat`, `kota`, `telpon`, `hp`, `email`, `hobi`, `daftar`, `jadwal`, `prestasi`, `keterangan`, `foto`, `ortu`, `alamatortu`, `kotaortu`, `telponortu`, `hportu`, `emailortu`, `pekerjaanortu`, `keteranganortu`, `promosi`, `penerima`, `status`, `img`) VALUES
(1, '', '', '', '', 'SATRYA ADJIE RAHARDANI', 'L', '2812', 'SMA', '2', 'REG2IPA-211', 'SMA Negeri 4 Jogjakarta', '19/05/2004', 'Jogjakarta', 'BESI BARU E 45', 'Sleman', '08122510999', '089659705090', '', '', '06/05/2020', 'Senin-Rabu-Jumat sesi 1', '4 SEMESTER SISWA BARU | WA DYAH GOLD 2TH', '', '61bd493af0c0d.jpg', 'MONA AIRIN', 'BESI BARU E 45', 'Sleman', '', '', '', 'PNS', '', '', 'Diah', 'Aktif', ''),
(2, '', '', '', '', 'AISYAH ROHMATUNNISA', 'P', '9687', 'SMA', '3', 'GOLD3IPA-351', 'SMA Negeri 1 Jogjakarta', '22/09/2002', 'Bantul', 'KASIHAN RT 05 TAMANTIRTO KASIHAN ', 'Bantul', '081328705185', '081392987274', '', '', '06/05/2020', '', 'SISWA BARU WA DYAH| DISKON PROMO ORTU GURU SEN-KAM', 'TANPA JAMINAN', '61cc4b731ae27.png', 'MUHKAMAD WAKID', 'KASIHAN RT 05 TAMANTIRTO KASIHAN ', 'Bantul', '', '', '', 'PNS', '', 'Event', 'Diah', 'Aktif', ''),
(3, '', '', '', '', 'ALYYA KUSDAIVA AFFANDI', 'L', '3437', 'SMA', '3', 'GOLD3IPA-352', 'SMA Negeri 11 Jogjakarta', '09/12/2002', 'Sleman', 'PERUM. TIRTASANI D - 11 GAMPING', 'Sleman', '085282134366', '089638411897', '', '', '08/05/2020', '', 'SISWA LANJUTAN |DISKON PROMO GURU+TUNAI BONUS KELA', 'TANPA JAMINAN', '61cc3e7f47813.jpg', 'KUSWARDANI DWI ATMINI', 'PERUM. TIRTASANI D - 11 GAMPING', 'Sleman', '', '', '', 'Dosen', '', 'Teman', 'Diah', '', ''),
(4, '', '', '', '', 'RIFDAH AFUW SALSABIIL', 'P', '2187', 'SMA', '3', 'GOLD3IPA-351', 'SMA Negeri 2 Jogjakarta', '01/12/2002', 'Jogjakarta', 'KADIREJO 1 RT 7/02 PURWOMARTANI KALASAN SLEMAN YK', 'Jogjakarta', '085100547847', '087736840004,+628', 'rifdahsalsabiil@gmail.com ', '', '08/05/2020', '', 'SISWA LANJUTAN |DISKON GURU 50%', 'TANPA JAMINAN', '61cc3f4d23749.jpg', 'YUYUN PURBOKUSUMA', 'KADIREJO 1 RT 7/02 PURWOMARTANI KALASAN SLEMAN YK', 'Jogjakarta', '', '', '', 'Guru', '', 'Event', 'Diah', '', ''),
(5, '', '', '', '', 'DENDY ANDHIKA', 'L', '3750', 'SMA', '3', 'SILVER3IPS-342', 'SMA Bopkri 1 Jogjakarta', '05/08/2002', 'Jogjakarta', 'BANTULAN RT 01 RW 04 SIDOARUM, GODEAN ', 'Sleman', '', '088225482397', '', '', '08/05/2020', '', 'SISWA LANJUTAN _ ASLI PROGRAM GOLD IPA (LINTAS JUR', 'TANPA JAMINAN', '61cc3f7d9b005.jpg', 'FITRI ANI ASTARI ', 'BANTULAN RT 01 RW 04 SIDOARUM, GODEAN ', 'Sleman', '', '', '', 'Wiraswasta', '', 'Event', 'Diah', '', ''),
(6, '', '', '', '', 'KEVIN PUTRA ADI NUGROHO', 'L', '2500', 'SMA', '3', 'SILVER3IPS-342', 'SMA Bopkri 1 Jogjakarta', '01/01/2001', 'Sleman', 'PERUMAHAN JAMBON ADEN 20', 'Sleman', '0817277591', '081227045900', '', '', '08/05/2020', '', 'SISWA LANJUTAN_ASLI PROG. GOLD IPA (LINJUR)', 'TANPA JAMINAN', '61cc3fbb121e6.jpg', 'TOTOK SUBIANTORO', 'PERUMAHAN JAMBON ADEN 20', 'Sleman', '', '', '', 'Wiraswasta', '', 'Kerabat/Saudara', 'Diah', '', ''),
(7, '', '', '', '', 'FEISAL IKHROM', 'L', '6250', 'SMA', '3', 'LOLOS SBMPTN 2021', 'SMA Negeri 7 Jogjakarta', '05/06/2003', 'Jogjakarta', 'JANTEN RT.02 NGESTIHARJO KASIHAN', 'Bantul', '088806021019', '085729693789', 'feisalikhrom20@gmail.com', '', '08/05/2020', '', 'SISWA LANJUTAN_351', 'UNY', '61cc42a8748f6.jpg', 'PANUT', 'JANTEN RT.02 NGESTIHARJO KASIHAN', 'Bantul', '', '', '', 'PNS', '', 'Event', 'Diah', '', ''),
(8, '', '', '', '', 'INDRA DEWA RAMADHAN', 'L', '7187', 'SMA', '3', 'GOLD3IPA-371', 'SMA Bopkri 1 Jogjakarta', '06/11/2003', 'Jogjakarta', 'JL. BAROKAH KADIPIRO NO. 490 YK', 'Jogjakarta', '082133185285', '082135700706', '', '', '08/05/2020', '', 'SISWA LANJUTAN', 'TANPA JAMINAN', '61cc42de0adb1.jpg', 'AGUS HADI PURWANTO', 'JL. BAROKAH KADIPIRO NO. 490 YK', 'Jogjakarta', '', '', '', 'Swasta', '', 'Event', 'Diah', '', ''),
(9, '', '', '', '', 'FAYA HUSNA FITRIANA', 'P', '2187', 'SMA', '3', 'LOLOS SBMPTN 2021', 'SMA Negeri 11 Jogjakarta', '07/12/2002', 'Sleman', 'NGEBO SUKOHARJO NGAGLIK ', 'Sleman', '', '0895605914745', 'fayahusnafitriana@gmail.com', '', '08/05/2020', '', 'SISWA LANJUTAN', 'SISTEM INFORMASI GEOGRAFIS UGM', '61cc437e5891e.jpg', 'SUROSO', 'NGEBO SUKOHARJO NGAGLIK ', 'Sleman', '', '', '', 'Swasta', '', 'Event', 'Diah', '', ''),
(10, '', '', '', '', 'DHEA ADALATI AZZAHRA', 'P', '9375', 'SMA', '3', 'LOLOS SNMPTN 2021', 'MAN 1 Jogjakarta', '06/05/2003', 'Jogjakarta', 'PERUM GRIYA AMBARKETAWANG PERMAI I 12 AMBARKETAWANG SLEMAN YK', 'Jogjakarta', '085741860001', '082324527937', '', '', '08/05/2020', '', 'SISWA LANJUTAN', 'TEKNIK LINGKUNGAN UPN', '61cc43a34c904.jpg', 'AWANG M', 'PERUM GRIYA AMBARKETAWANG PERMAI I 12 AMBARKETAWANG SLEMAN YK', 'Jogjakarta', '', '', '', 'Ibu Rumah Tangga', '', 'Event', 'Diah', '', ''),
(11, '', '', '', '', 'MUHAMMAD RABITH DZAKI ', 'L', '625', 'SMA', '3', 'GOLD3IPS-362', 'MAN 1 Jogjakarta', '27/08/2003', 'Sleman', 'JL. BIMO 14 SEMBEGO RT.02 RW.38 MAGUWOHARJO ', 'Sleman', '08156724333', '06285741752885', '', '', '08/05/2020', '', 'LINTAS JURUSAN IPA KE IPS', 'TANPA JAMINAN', '61cc43cd97aa5.jpg', 'ZAMAKHSARI', 'JL. BIMO 14 SEMBEGO RT.02 RW.38 MAGUWOHARJO ', 'Sleman', '', '', '', 'PNS', '', 'Event', 'Diah', '', ''),
(12, '', '', '', '', 'M. HANIEF FATKHAN NASHRULLAH', 'L', '8750', 'SMA', '3', 'LOLOS SBMPTN 2021', 'SMA Negeri 8 Jogjakarta', '23/02/2003', 'Bojonegoro', 'JL NOTO SUKARDJO RT 02 RW 25 DONOHARJO, NGAGLIK, SLEMAN', 'Sleman', '08122708950', '081222291400', '', '', '08/05/2020', '', 'SISWA LANJUTAN 353 311', 'T. FISIKA ITB / T. FISIKA UGM', '61cc43facb2bd.jpg', 'TRI NOVITA H', 'JL NOTO SUKARDJO RT 02 RW 25 DONOHARJO, NGAGLIK, SLEMAN', 'Sleman', '', '', '', 'PNS', '', 'Event', 'Diah', '', ''),
(13, '', '', '', '', 'MUHAMMAD BRIZAN PRASANTYO', 'L', '5000', 'SMA', '3', 'LOLOS SBMPTN 2021', 'SMA Negeri 11 Jogjakarta', '12/07/2001', 'Jogjakarta', 'DS. SENDANGTIRTO BERBAH RT 01 RW 14 SLEMAN YK', 'Sleman', '', '083869142564', '', '', '08/05/2020', '', 'SISWA LANJUTAN', 'AGRIBISNIS UGM', '61cc4426ca193.jpg', 'DR. PRASENO SD MK', 'DS. SENDANGTIRTO BERBAH RT 01 RW 14 SLEMAN YK', 'Sleman', '', '', '', 'Swasta', '', 'Event', 'Diah', '', ''),
(14, '', '', '', '', 'MUHAMMAD RAIHAN RAJENDRA PUTRA', 'L', '4687', 'SMA', '3', 'GOLD3IPA-351', 'SMA Negeri 11 Jogjakarta', '02/10/2002', 'Malang', 'PERUM. ADARA CITRA A 1 PURWOMARTANI KALASAN', 'Sleman', '081328508484', '083829634647', '', '', '08/05/2020', '', 'DAFTAR MARET WA DYAH | BONUS BIMBEL KLS 11 GOLD355', '', '61cc444c242a3.jpg', 'DIAH ANINDITA', 'PERUM. ADARA CITRA A 1 PURWOMARTANI KALASAN', 'Sleman', '', '', '', 'Swasta', '', 'Teman', 'Diah', '', ''),
(15, '', '', '', '', 'ARINDA ENGI NURFAIZA', 'P', '8125', 'SMA', '3', 'SILVER3IPS-341', 'SMA Negeri 2 Sleman', '09/04/2003', 'Jogjakarta', 'GETAS KALONGAN, TLOGOADI, MLATI', 'Sleman', '0895377278218', '0895377278218', 'arindanurfaiza41435@gmail.com', '', '08/05/2020', '', 'SISWA LANJUTAN_SISWA GOLD', '', '61cc44cc5383c.jpg', 'LEGIYANTO', 'GETAS KALONGAN, TLOGOADI, MLATI', 'Sleman', '', '', '', 'Swasta', '', 'Kerabat/Saudara', 'Diah', '', ''),
(16, '', '', '', '', 'DEVADA ALFA D. NGANGI', 'L', '3750', 'SMA', '3', 'GOLD3IPS-362', 'SMA Bopkri 1 Jogjakarta', '06/12/2003', 'Bitung', 'JL. JAMBON III KRICAK TEGALREJO', 'Jogjakarta', '08114999600', '08114301222', 'devadaaifa03@gmail.com', '', '08/05/2020', '', 'SISWA LANJUTAN', '', '61cc44fd5028f.jpg', 'MEIKE PANGKEREGO', 'JL. JAMBON III KRICAK TEGALREJO', 'Jogjakarta', '', '', '', 'Swasta', '', 'Event', 'Diah', '', ''),
(17, '', '', '', '', 'HALIMATUS SYADIYAH', 'P', '5937', 'SMA', '3', 'TRANSIT 3 SMA', 'SMA Negeri 2 Jogjakarta', '04/08/2002', 'Bantul', 'JL. KALIURANG KM.5,8 NO. 25 MANGGUNG CATUR TUNGGAL', 'Sleman', '085743352644', '081578375490', '', '', '08/05/2020', '', 'UPGRADE SELGOLD-IPA', '', 'emon1.jpg', 'SARINEM', 'JL. KALIURANG KM.5,8 NO. 25 MANGGUNG CATUR TUNGGAL', 'Sleman', '', '', '', 'Swasta', '', 'Teman', 'Diah', '', ''),
(18, '', '', '', '', 'REVARIO RAVANELEE KITARO', 'L', '2500', 'SMA', '2', 'REG2IPA-211', 'SMA Negeri 8 Jogjakarta', '29/04/2005', 'Jogjakarta', 'JL WIYORO BARU 2. GG. FLAMBOYAN RT.10 BATU RETNO BANGUNTAPAN', 'Bantul', '087839327344', '087736394855', '', '', '08/05/2020', '', 'ASLI GOLD NAMBAH UNTUK 2TH|BIAYA 7,8JT  | WA DYAH', '', '61cc454b8e7d6.jpg', 'KASPOMO', 'JL WIYORO BARU 2. GG. FLAMBOYAN RT.10 BATU RETNO BANGUNTAPAN', 'Bantul', '', '', '', 'Swasta', '', 'Brosur', 'Diah', '', ''),
(19, '', '', '', '', 'BINTANG MAHIJA ARYACETTA', 'L', '9375', 'SMA', '2', 'REG2IPA-211', 'SMA Negeri 9 Jogjakarta', '30/10/2004', 'Bantul', 'PERUM PESONA HARAPAN KAU H-3 KLAJURAN GODEAN ', 'Bantul', '081227068780', '082135858029', '', '', '08/05/2020', '', '1 TAHUN SISWA BARU', '', '61cc457321770.jpg', 'INDRA GUNAWAN', 'PERUM PESONA HARAPAN KAU H-3 KLAJURAN GODEAN ', 'Bantul', '', '', '', 'Swasta', '', 'Brosur', 'Diah', '', ''),
(20, '', '', '', '', 'K RIDWAN S', 'L', '6904', 'SMA', '3', 'LOLOS SBMPTN 2021', 'SMA Negeri 7 Jogjakarta', '11/02/2003', 'Jogjakarta', 'SAMBIREJO KG 2/ 39 D RT 002 RW 001 PRENGGAN KOTAGEDE', 'Jogjakarta', '089669670853', '', '', '', '11/05/2020', '', 'SISWA LANJUTAN PUTRA ', 'ELINS UGM', '61cc45c86b335.jpg', 'A SHOLEH', 'SAMBIREJO KG 2/ 39 D RT 002 RW 001 PRENGGAN KOTAGEDE', 'Jogjakarta', '', '', '', 'Dosen', '', 'Kerabat/Saudara', 'Diah', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sma`
--

CREATE TABLE `sma` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `tawar1` varchar(20) NOT NULL,
  `kategori1` varchar(10) NOT NULL,
  `tingkat1` varchar(20) NOT NULL,
  `tingkata1` varchar(30) NOT NULL,
  `tingkatb1` varchar(30) NOT NULL,
  `tingkatc1` varchar(30) NOT NULL,
  `harga1` varchar(20) NOT NULL,
  `tawar2` varchar(20) NOT NULL,
  `kategori2` varchar(10) NOT NULL,
  `tingkat2` varchar(20) NOT NULL,
  `tingkata2` varchar(30) NOT NULL,
  `tingkatb2` varchar(30) NOT NULL,
  `tingkatc2` varchar(30) NOT NULL,
  `harga2` varchar(20) NOT NULL,
  `tawar3` varchar(20) NOT NULL,
  `kategori3` varchar(10) NOT NULL,
  `tingkat3` varchar(20) NOT NULL,
  `tingkata3` varchar(30) NOT NULL,
  `tingkatb3` varchar(30) NOT NULL,
  `tingkatc3` varchar(30) NOT NULL,
  `harga3` varchar(20) NOT NULL,
  `tawar4` varchar(20) NOT NULL,
  `kategori4` varchar(10) NOT NULL,
  `tingkat4` varchar(20) NOT NULL,
  `tingkata4` varchar(30) NOT NULL,
  `tingkatb4` varchar(30) NOT NULL,
  `tingkatc4` varchar(30) NOT NULL,
  `harga4` varchar(20) NOT NULL,
  `tawar5` varchar(20) NOT NULL,
  `kategori5` varchar(10) NOT NULL,
  `tingkat5` varchar(20) NOT NULL,
  `tingkata5` varchar(30) NOT NULL,
  `tingkatb5` varchar(30) NOT NULL,
  `tingkatc5` varchar(30) NOT NULL,
  `harga5` varchar(20) NOT NULL,
  `tawar6` varchar(20) NOT NULL,
  `kategori6` varchar(10) NOT NULL,
  `tingkat6` varchar(20) NOT NULL,
  `tingkata6` varchar(30) NOT NULL,
  `tingkatb6` varchar(30) NOT NULL,
  `tingkatc6` varchar(30) NOT NULL,
  `harga6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sma`
--

INSERT INTO `sma` (`id`, `tgl`, `tawar1`, `kategori1`, `tingkat1`, `tingkata1`, `tingkatb1`, `tingkatc1`, `harga1`, `tawar2`, `kategori2`, `tingkat2`, `tingkata2`, `tingkatb2`, `tingkatc2`, `harga2`, `tawar3`, `kategori3`, `tingkat3`, `tingkata3`, `tingkatb3`, `tingkatc3`, `harga3`, `tawar4`, `kategori4`, `tingkat4`, `tingkata4`, `tingkatb4`, `tingkatc4`, `harga4`, `tawar5`, `kategori5`, `tingkat5`, `tingkata5`, `tingkatb5`, `tingkatc5`, `harga5`, `tawar6`, `kategori6`, `tingkat6`, `tingkata6`, `tingkatb6`, `tingkatc6`, `harga6`) VALUES
(1, '20-10-2021 09:40:57', 'Penawaran 2021/2022', 'Platinum', 'Untuk Kelas 12 SMA', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', 'Program Penjaminan', 'Rp 12.350.000', 'Penawaran 2021/2022', 'Gold', 'Untuk Kelas 12 SMA', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 11.700.000', 'Penawaran 2021/2022', 'Silver', 'Untuk Kelas 12 SMA', '3 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 9.100.000', 'Penawaran 2021/2022', 'Gold', 'Untuk Kelas 11 SMA', '3 Sesi /Minggu - 2 semester da', '4 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', 'Rp 16.900.000', 'Penawaran 2021/2022', 'Progres', 'Untuk Kelas 11 SMA', '3 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 8.125.000', 'Penawaran 2021/2022', 'Progres', 'Untuk Kelas 10 SMA', '3 Sesi /Minggu - 2 semester', 'Ruang kelas ber ac - kapasitas', '', 'Rp 8.125.000');

-- --------------------------------------------------------

--
-- Table structure for table `smp`
--

CREATE TABLE `smp` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `tawar1` varchar(20) NOT NULL,
  `kategori1` varchar(10) NOT NULL,
  `tingkat1` varchar(20) NOT NULL,
  `tingkata1` varchar(30) NOT NULL,
  `tingkatb1` varchar(30) NOT NULL,
  `tingkatc1` varchar(30) NOT NULL,
  `harga1` varchar(20) NOT NULL,
  `tawar2` varchar(20) NOT NULL,
  `kategori2` varchar(10) NOT NULL,
  `tingkat2` varchar(20) NOT NULL,
  `tingkata2` varchar(30) NOT NULL,
  `tingkatb2` varchar(30) NOT NULL,
  `tingkatc2` varchar(30) NOT NULL,
  `harga2` varchar(20) NOT NULL,
  `tawar3` varchar(20) NOT NULL,
  `kategori3` varchar(10) NOT NULL,
  `tingkat3` varchar(20) NOT NULL,
  `tingkata3` varchar(30) NOT NULL,
  `tingkatb3` varchar(30) NOT NULL,
  `tingkatc3` varchar(30) NOT NULL,
  `harga3` varchar(20) NOT NULL,
  `tawar4` varchar(20) NOT NULL,
  `kategori4` varchar(10) NOT NULL,
  `tingkat4` varchar(20) NOT NULL,
  `tingkata4` varchar(30) NOT NULL,
  `tingkatb4` varchar(30) NOT NULL,
  `tingkatc4` varchar(30) NOT NULL,
  `harga4` varchar(20) NOT NULL,
  `tawar5` varchar(20) NOT NULL,
  `kategori5` varchar(10) NOT NULL,
  `tingkat5` varchar(20) NOT NULL,
  `tingkata5` varchar(30) NOT NULL,
  `tingkatb5` varchar(30) NOT NULL,
  `tingkatc5` varchar(30) NOT NULL,
  `harga5` varchar(20) NOT NULL,
  `tawar6` varchar(20) NOT NULL,
  `kategori6` varchar(10) NOT NULL,
  `tingkat6` varchar(20) NOT NULL,
  `tingkata6` varchar(30) NOT NULL,
  `tingkatb6` varchar(30) NOT NULL,
  `tingkatc6` varchar(30) NOT NULL,
  `harga6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smp`
--

INSERT INTO `smp` (`id`, `tgl`, `tawar1`, `kategori1`, `tingkat1`, `tingkata1`, `tingkatb1`, `tingkatc1`, `harga1`, `tawar2`, `kategori2`, `tingkat2`, `tingkata2`, `tingkatb2`, `tingkatc2`, `harga2`, `tawar3`, `kategori3`, `tingkat3`, `tingkata3`, `tingkatb3`, `tingkatc3`, `harga3`, `tawar4`, `kategori4`, `tingkat4`, `tingkata4`, `tingkatb4`, `tingkatc4`, `harga4`, `tawar5`, `kategori5`, `tingkat5`, `tingkata5`, `tingkatb5`, `tingkatc5`, `harga5`, `tawar6`, `kategori6`, `tingkat6`, `tingkata6`, `tingkatb6`, `tingkatc6`, `harga6`) VALUES
(1, '20-10-2021 20:16:08', 'Penawaran 2021/2022', 'Platinum', 'Kelas 9 SMP', '4 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 10 siswa ', 'Rp 12.350.000', 'Penawaran 2021/2022', 'Gold', 'Kelas 9 SMP', '4 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 15 siswa ', 'Rp 9.750.000', 'Penawaran 2021/2022', 'Silver', 'Kelas 9 SMP', '3 Sesi per minggu selama 2 Sem', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 7.410.000', 'Penawaran 2021/2022', 'Unggulan', 'Kelas 8 SMP', '3 Sesi / Minggu - 4 semester', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 12.350.000', 'Penawaran 2021/2022', 'Progres', 'Kelas 8 SMP', '3 Sesi / Minggu - 2 semester', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 7.410.000', 'Penawaran 2021/2022', 'Reguler', 'Kelas 7 SMP', '3 Sesi / Minggu - 2 semester', 'Ruang kelas ber ac', 'kapasitas 15 siswa', 'Rp 7.410.000');

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `hits` varchar(11) NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(1, '127.0.0.1', '20211006', '42', '1633523220'),
(2, '::1', '20211006', '1', '1633520442'),
(3, '127.0.0.1', '20211007', '28', '1633613789'),
(4, '127.0.0.1', '20211008', '18', '1633712185'),
(5, '127.0.0.1', '20211009', '100', '1633798765'),
(6, '::1', '20211009', '2', '1633785780'),
(7, '127.0.0.1', '20211010', '10', '1633830386'),
(8, '127.0.0.1', '20211011', '40', '1633962168'),
(9, '127.0.0.1', '20211012', '6', '1634040964'),
(10, '127.0.0.1', '20211013', '1', '1634092303'),
(11, '127.0.0.1', '20211014', '44', '1634230778'),
(12, '127.0.0.1', '20211015', '79', '1634317160'),
(13, '127.0.0.1', '20211016', '178', '1634375690'),
(14, '127.0.0.1', '20211017', '296', '1634487667'),
(15, '127.0.0.1', '20211018', '45', '1634570577'),
(16, '::1', '20211018', '4', '1634557437'),
(17, '127.0.0.1', '20211019', '20', '1634660488'),
(18, '127.0.0.1', '20211020', '73', '1634745181'),
(19, '127.0.0.1', '20211021', '5', '1634811563'),
(20, '127.0.0.1', '20211023', '41', '1634973192'),
(21, '127.0.0.1', '20211024', '36', '1635069225'),
(22, '127.0.0.1', '20211025', '11', '1635163097'),
(23, '127.0.0.1', '20211027', '32', '1635342735'),
(24, '127.0.0.1', '20211029', '36', '1635520416'),
(25, '127.0.0.1', '20211030', '1', '1635561781'),
(26, '127.0.0.1', '20211031', '5', '1635681378'),
(27, '127.0.0.1', '20211101', '1', '1635739398'),
(28, '127.0.0.1', '20211109', '1', '1636473104'),
(29, '127.0.0.1', '20211111', '7', '1636645527'),
(30, '127.0.0.1', '20211113', '5', '1636808338'),
(31, '127.0.0.1', '20211114', '2', '1636884334'),
(32, '127.0.0.1', '20211115', '57', '1636974979'),
(33, '127.0.0.1', '20211116', '14', '1637070425'),
(34, '127.0.0.1', '20211117', '27', '1637168111'),
(35, '127.0.0.1', '20211118', '4', '1637234689'),
(36, '127.0.0.1', '20211119', '13', '1637333390'),
(37, '127.0.0.1', '20211120', '4', '1637405592'),
(38, '127.0.0.1', '20211127', '5', '1638020576'),
(39, '127.0.0.1', '20211129', '4', '1638172963'),
(40, '127.0.0.1', '20211202', '9', '1638456351'),
(41, '127.0.0.1', '20211203', '11', '1638535820'),
(42, '127.0.0.1', '20211204', '29', '1638617010'),
(43, '127.0.0.1', '20211205', '15', '1638674662'),
(44, '127.0.0.1', '20211207', '5', '1638887752'),
(45, '127.0.0.1', '20211208', '60', '1638981964'),
(46, '127.0.0.1', '20211209', '19', '1639061316'),
(47, '127.0.0.1', '20211210', '17', '1639155489'),
(48, '127.0.0.1', '20211211', '14', '1639233221'),
(49, '127.0.0.1', '20211212', '1', '1639307949'),
(50, '127.0.0.1', '20211213', '1', '1639394641'),
(51, '127.0.0.1', '20211216', '1', '1639656319'),
(52, '127.0.0.1', '20211217', '12', '1639740500'),
(53, '127.0.0.1', '20211218', '19', '1639842522'),
(54, '127.0.0.1', '20211219', '6', '1639930581'),
(55, '127.0.0.1', '20211220', '20', '1640002696'),
(56, '127.0.0.1', '20211221', '12', '1640087521'),
(57, '127.0.0.1', '20211223', '8', '1640235210'),
(58, '127.0.0.1', '20211224', '12', '1640358444'),
(59, '127.0.0.1', '20211228', '14', '1640682054'),
(60, '127.0.0.1', '20211229', '29', '1640794493'),
(61, '::1', '20211229', '1', '1640774113'),
(62, '127.0.0.1', '20211230', '7', '1640876105'),
(63, '127.0.0.1', '20211231', '3', '1640948865'),
(64, '127.0.0.1', '20220101', '5', '1641047626'),
(65, '127.0.0.1', '20220102', '2', '1641131876'),
(66, '127.0.0.1', '20220103', '12', '1641212324'),
(67, '127.0.0.1', '20220105', '16', '1641393308'),
(68, '127.0.0.1', '20220109', '1', '1641735817'),
(69, '127.0.0.1', '20220110', '10', '1641814396'),
(70, '127.0.0.1', '20220111', '10', '1641906983'),
(71, '127.0.0.1', '20220113', '3', '1642085430'),
(72, '127.0.0.1', '20220118', '5', '1642508313'),
(73, '127.0.0.1', '20220128', '190', '1643384727'),
(74, '127.0.0.1', '20220129', '1', '1643428492'),
(75, '127.0.0.1', '20220130', '1', '1643545161'),
(76, '127.0.0.1', '20220131', '7', '1643633608'),
(77, '127.0.0.1', '20220201', '10', '1643723662'),
(78, '127.0.0.1', '20220203', '5', '1643887030'),
(79, '127.0.0.1', '20220204', '1', '1643971183'),
(80, '127.0.0.1', '20220205', '5', '1644076926'),
(81, '127.0.0.1', '20220206', '1', '1644107071'),
(82, '127.0.0.1', '20220210', '3', '1644497000'),
(83, '127.0.0.1', '20220213', '1', '1644715828'),
(84, '127.0.0.1', '20220218', '1', '1645181384'),
(85, '127.0.0.1', '20220220', '30', '1645372647'),
(86, '127.0.0.1', '20220222', '10', '1645547440'),
(87, '127.0.0.1', '20220223', '14', '1645627988'),
(88, '127.0.0.1', '20220224', '11', '1645705489'),
(89, '127.0.0.1', '20220225', '29', '1645804727'),
(90, '127.0.0.1', '20220226', '1', '1645879546'),
(91, '127.0.0.1', '20220227', '24', '1645974111'),
(92, '127.0.0.1', '20220228', '1', '1646018158'),
(93, '127.0.0.1', '20220302', '4', '1646219995'),
(94, '::1', '20220302', '1', '1646220619'),
(95, '127.0.0.1', '20220303', '25', '1646321617'),
(96, '127.0.0.1', '20220304', '4', '1646395004'),
(97, '127.0.0.1', '20220307', '3', '1646669384'),
(98, '127.0.0.1', '20220308', '10', '1646747100'),
(99, '127.0.0.1', '20220309', '7', '1646838002');

-- --------------------------------------------------------

--
-- Table structure for table `teman`
--

CREATE TABLE `teman` (
  `id_teman` int(11) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL,
  `rekomen` varchar(50) NOT NULL,
  `telpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `lengkap` varchar(100) NOT NULL,
  `panggilan` varchar(50) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `lulusan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`id`, `code`, `tgl`, `lengkap`, `panggilan`, `pelajaran`, `lulusan`, `foto`, `status`) VALUES
(1, 't1', '22-12-2021 11:50:29', 'Bunda Esty', 'Bunda Esty', 'kimia', 'S1 Kimia UGM', '61c2ae952c15b.png', 'Aktif'),
(2, 't2', '22-12-2021 11:50:29', 'Bunda Ety', 'Bunda Ety', 'Fisika', 'S1 Fisika UGM', '61c2ae952c3c8.png', 'Aktif'),
(3, 't3', '22-12-2021 11:50:29', 'Kak Akhmadi', 'Kak Akhmadi', 'Matematika', 'S1 Matematika UGM', '61c2ae952c54f.png', 'Aktif'),
(4, 't4', '22-12-2021 11:50:29', 'Kak Mega', 'Kak Mega', 'Matematika', 'S1 Matematika UGM', '61c2ae952c6ce.png', 'Aktif'),
(5, '', '22-12-2021 11:50:29', 'Om Ito', 'Om Ito', 'Fisika', 'S1 Fisika UGM', '61c2ae952c84b.png', ''),
(6, '', '22-12-2021 11:50:29', 'Pak Prono', 'Pak Prono', 'Kimia', 'S1 Kimia UGM', '6161083b78a80.jpg', ''),
(7, '', '22-12-2021 11:50:29', 'Pak Salimi', 'Pak Salimi', 'Fisika', 'Fisika UGM', '6161083b78bad.jpg', ''),
(8, 't8', '22-12-2021 11:50:29', 'Bunda Asih', 'Bunda Asih', 'Matematika', 'S1 Matematika UGM', '6161083b78cd8.jpg', 'Aktif'),
(9, '', '22-12-2021 11:50:29', 'Kak Caterina', 'Kak Caterina', 'Kimia', 'S1 Kimia UGM', '6161083b78dfd.jpg', ''),
(10, '', '22-12-2021 11:50:29', 'Bunda Ely', 'Bunda Ely', 'Fisika', 'S1 Fisika UGM', '6161083b78f22.jpg', ''),
(11, '', '22-12-2021 11:50:29', 'Bunda Eny', 'Bunda Eny', 'Matematika', 'S1 Matematika UGM', '6161083b79699.jpg', ''),
(12, '', '22-12-2021 11:50:29', 'Kak Feny', 'Kak Feny', 'Fisika', 'S1 Fisika UGM', '6161083b79828.jpg', ''),
(13, '', '22-12-2021 11:50:29', 'Kak Yenny', 'Kak Yenny', 'Fisika', 'S1 Fisika UGM', '6161083b799bb.jpg', ''),
(14, '', '22-12-2021 11:50:29', 'Bunda Ipeh', 'Bunda Ipeh', 'Kimia', 'S1 Kimia UGM', '6161083b79b07.jpg', ''),
(15, '', '22-12-2021 11:50:29', 'Kak Aminin', 'Kak Aminin', 'Matematika', 'S1 Matematika UGM', '6161083b79c31.jpg', ''),
(16, '', '22-12-2021 11:50:29 ', 'Kak Ara', 'Kak Ara', 'Fisika', 'S1 Fisika UGM', '6161083b79d58.jpg', ''),
(17, '', '22-12-2021 11:50:29 ', 'Kak Indi ', 'Kak Indi', 'Kimia', 'S1 Kimia UGM', '6161083b79e8e.jpg', ''),
(18, '', '22-12-2021 11:50:29 ', 'Kak Nurul', 'Kak Nurul', 'Matematika', 'S1 Matematika UGM', '6161083b7a023.jpg', ''),
(19, '', '22-12-2021 11:50:29 ', 'Kak Santi', 'Kak Santi', 'Fisika', 'S1 Fisika UGM', '6161083b7a14b.jpg', ''),
(20, '', '22-12-2021 11:50:29 ', 'Ms Henny Smith', 'Ms Henny Smith', 'Bahasa Inggris', 'S1 Sastra Inggris UGM', '6161083b7a26f.jpg', ''),
(21, '', '22-12-2021 11:50:29', 'Bunda Parda', 'Bunda Parda', 'Fisika', 'S1 Fisika UGM', '61610bce41757.jpg', ''),
(22, '', '22-12-2021 11:50:29', 'Bunda Putri', 'Bunda Putri', 'Kimia', 'S1 Kimia UGM', '61610bce41a8c.jpg', ''),
(23, '', '22-12-2021 11:50:29', 'Bunda X', 'Bunda X', 'Matematika', 'S1 Matematika UGM', '61610bce41c6e.jpg', ''),
(24, '', '22-12-2021 11:50:29', 'Pak Sosio', 'Pak Sosio', 'Sosiologi', 'S1 Sosiologi UGM', '61610bce41df8.jpg', ''),
(25, '', '22-12-2021 11:50:29', 'Bunda Tanaya', 'Bunda Tanaya', 'Kimia', 'S1 Kimia UGM', '61c2ae952d681.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `nama1` varchar(20) NOT NULL,
  `testi1` varchar(50) NOT NULL,
  `asal1` varchar(30) NOT NULL,
  `foto1` varchar(50) NOT NULL,
  `nama2` varchar(20) NOT NULL,
  `testi2` varchar(50) NOT NULL,
  `asal2` varchar(30) NOT NULL,
  `foto2` varchar(50) NOT NULL,
  `nama3` varchar(20) NOT NULL,
  `testi3` varchar(50) NOT NULL,
  `asal3` varchar(30) NOT NULL,
  `foto3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`id`, `tgl`, `nama1`, `testi1`, `asal1`, `foto1`, `nama2`, `testi2`, `asal2`, `foto2`, `nama3`, `testi3`, `asal3`, `foto3`) VALUES
(3, '18-10-2021 07:36:54', 'Zabina', 'Terimakasih SSCI', 'Teknik Industri UGM', '6155307cef27f.jpg', 'Naya', 'Asik...Ramai ..Seru', 'SMA 1 Yogya', '6155307cef3b8.jpg', 'Novan', 'SSCI TeOPe', 'UIN Yogyakarta', '616cc1a68dd65.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_tentor` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `tgl`, `id_admin`, `id_tentor`, `id_siswa`, `user`, `pass`, `level`, `status`, `foto`) VALUES
(1, '18-12-2021 22:33:49', 1, 0, 0, 'zabina', '$2y$10$bDcYkRZO1rO08f7iz8Ra9eoY7k7wV67MfwZfDFtYQUMg7yzUDp5jm', 1, 'Aktif', '61bdff5d86b89.jpg'),
(2, '18-12-2021 23:22:30', 2, 0, 0, 'admin1', '$2y$10$AC5dyV02UPdOmzI/A4sYeup2mza20j/oDI.RXApxiFb3.guHTPu7i', 2, 'Aktif', '61be0ac6e0008.jpg'),
(12, '23-Feb-2022 19:09:22', 0, 2, 0, 't2', '$2y$10$RsVB8cmP7jZTUOaqvuig9u2VfVzzuxND2iRALKAU/7Qp4HsrOu6oG', 3, 'Aktif', '61c2ae952c3c8.png'),
(13, '23-Feb-2022 10:11:32', 0, 0, 1, '2812', '$2y$10$Ib2vri09vlWhUDB83yr3TeEYpmnzF0YNyVujslN6aBVccopl8CKoO', 4, 'Aktif', '61bd493af0c0d.jpg'),
(14, '23-Feb-2022 18:11:48', 0, 1, 0, 't1', '$2y$10$Yos2aMW1pXb8FmJC90nl2.N2PuIWML5PQEtBkj3bcxdoPfwI8Xbg.', 3, 'Aktif', '61c2ae952c15b.png'),
(15, '23-Feb-2022 20:25:22', 0, 3, 0, 't3', '$2y$10$ECjTzkbkmEwkrbleYl6bA.Q.EVVEAU2rbgbPm6X/1H0QVgkNI.vFy', 3, 'Aktif', '61c2ae952c54f.png'),
(22, '23-Feb-2022 20:53:05', 0, 8, 0, 't8', '$2y$10$1ip9Rl8S1gf7byys080xueZh6eessDt9wwKmwZOEndbUaTeSZS1nS', 3, 'Aktif', '6161083b78cd8.jpg'),
(23, '23-Feb-2022 20:57:44', 0, 4, 0, 't4', '$2y$10$5Ds5N0bGFKPLWoAhMJuFeO/R5PYRnlJ0M1l12b3clwwfUrli7muGe', 3, 'Aktif', '61c2ae952c6ce.png'),
(30, '25-Feb-2022 19:14:54', 0, 0, 2, '9687', '$2y$10$ZKqxUk73DeFH6rbp.mDoDOvdiX8msgUbudts.EJFUr4eff2cvGiRu', 4, 'Aktif', '61cc4b731ae27.png');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `tgl`, `judul`, `link`, `foto`) VALUES
(1, '27-02-2022 21:58:32', 'NOAH Menghapus Jejakmu', 'NOAH Menghapus Jejakmu', '621b9198199f4.jpg'),
(2, '03-03-2022 21:30:30', 'SSCIntersolusi', 'ssci', '6220d106ca151.jpg'),
(3, '03-03-2022 21:31:45', 'Profile Karyawan', 'profile', '6220d151b7fa9.jpg'),
(4, '19-11-2021 21:38:17', 'Gym Class Heroes Stereo Hearts', 'Gym Class Heroes Stereo Hearts ft Adam Levine', '6174cb0537888.jpg'),
(5, '03-03-2022 21:37:17', 'Maroon 5', 'Maroon 5  Girls Like You', '6220d29d2e0d0.jpg'),
(6, '19-11-2021 21:38:17', 'NOAH', 'NOAH Wanitaku', '6174cb0537bbd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vtesti`
--

CREATE TABLE `vtesti` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `foto1` varchar(50) NOT NULL,
  `link1` varchar(255) NOT NULL,
  `foto2` varchar(50) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `foto3` varchar(50) NOT NULL,
  `link3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vtesti`
--

INSERT INTO `vtesti` (`id`, `tgl`, `foto1`, `link1`, `foto2`, `link2`, `foto3`, `link3`) VALUES
(1, '24-10-2021 16:17:56', '617524c40e64d.jpg', 'Kenapa Perjalanan', '617524c40e8a3.jpg', 'Lebih Berat Mana', '617524c40eb21.jpg', 'Seberapa Tinggi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privat`
--
ALTER TABLE `privat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `sd`
--
ALTER TABLE `sd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sma`
--
ALTER TABLE `sma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smp`
--
ALTER TABLE `smp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teman`
--
ALTER TABLE `teman`
  ADD PRIMARY KEY (`id_teman`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vtesti`
--
ALTER TABLE `vtesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privat`
--
ALTER TABLE `privat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sd`
--
ALTER TABLE `sd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `sma`
--
ALTER TABLE `sma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smp`
--
ALTER TABLE `smp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `teman`
--
ALTER TABLE `teman`
  MODIFY `id_teman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tentor`
--
ALTER TABLE `tentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vtesti`
--
ALTER TABLE `vtesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
