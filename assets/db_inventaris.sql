-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2022 at 04:07 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_tidak_tetap`
--

DROP TABLE IF EXISTS `barang_tidak_tetap`;
CREATE TABLE IF NOT EXISTS `barang_tidak_tetap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_tidak_tetap`
--

INSERT INTO `barang_tidak_tetap` (`id`, `nama_barang`, `jumlah`, `keterangan`) VALUES
(2, 'KERTAS HVS A4', 1000, 'Buram'),
(3, 'KERTAS HVS A3', 12, 'Putih'),
(4, 'KALENDER 2022', 10, 'KALENDER');

-- --------------------------------------------------------

--
-- Table structure for table `elektronik`
--

DROP TABLE IF EXISTS `elektronik`;
CREATE TABLE IF NOT EXISTS `elektronik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `nomor_seri_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elektronik`
--

INSERT INTO `elektronik` (`id`, `nama_barang`, `nomor_seri_barang`, `jumlah`, `kondisi`, `image`, `status`) VALUES
(2, 'LAPTOP ACER ASPIRE ONE ', 'LPT001PK', 11, 1, 'output-onlinejpgtools2.jpg', 0),
(3, 'LAMPU', '12368712HH', 21, 1, 'output-onlinejpgtools3.jpg', 0),
(4, 'PRINTER EPSON A900', 'AVSU898', 4, 1, 'pemadaman.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`, `url`) VALUES
(1, 'Kendaraan', 'kendaraan'),
(2, 'Elektronik', 'elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bbm`
--

DROP TABLE IF EXISTS `jenis_bbm`;
CREATE TABLE IF NOT EXISTS `jenis_bbm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_bbm` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bbm`
--

INSERT INTO `jenis_bbm` (`id`, `nama_jenis_bbm`) VALUES
(1, 'PERTALITE'),
(2, 'PERTAMAX'),
(4, 'PERTAMAX TURBO');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ranmor`
--

DROP TABLE IF EXISTS `jenis_ranmor`;
CREATE TABLE IF NOT EXISTS `jenis_ranmor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_ranmor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_ranmor`
--

INSERT INTO `jenis_ranmor` (`id`, `nama_jenis_ranmor`) VALUES
(1, 'SPM'),
(3, 'KBM');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_ranmor` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe_ranmor` varchar(255) NOT NULL,
  `unit_pengguna` int(11) NOT NULL,
  `no_pol` varchar(255) NOT NULL,
  `no_rangka` varchar(255) NOT NULL,
  `no_mesin` varchar(255) NOT NULL,
  `tahun_perolehan` int(11) NOT NULL,
  `asal_perolehan` varchar(255) NOT NULL,
  `kondisi_ranmor` int(11) NOT NULL,
  `jenis_bbm` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `jenis_ranmor`, `merk`, `tipe_ranmor`, `unit_pengguna`, `no_pol`, `no_rangka`, `no_mesin`, `tahun_perolehan`, `asal_perolehan`, `kondisi_ranmor`, `jenis_bbm`, `file`, `status`) VALUES
(1, 1, 'HONDA', 'MOTOR', 1, 'AD 0000 BB', '123123HHJ1239217UHH', '31293HGJHJH123', 2022, 'POLDA JATENGG', 1, 2, '_21_minimalist-iron-man-wallpaper_Iron-Man-4k-Ultra-HD-Wallpaper-Background-Image-1.jpg', 0),
(2, 1, 'SUZUKI', 'MOBIL', 1, 'AD 0000 CC', '130912809JBJH', '3812039JBDJSJ', 2021, 'POLDA DIY', 1, 2, '01__pt_gin_Surat_kesanggupan_tutor_Bayu_Prastyo_10-01-2022.pdf', 1),
(3, 1, 'Kawasaki', 'MOTOR', 1, 'AB 0000 BB', '123123HHJ1239217ULL', '31293HGJHJ131', 2022, 'POLDA JATENG', 1, 1, '01__pt_gin_Surat_kesanggupan_tutor_Bayu_Prastyo_10-01-2022.pdf', 0),
(5, 1, 'COBA MERK', 'COBA TIPE', 1, 'B 0001 XY', '123123HHJ1239217UHHDAJBJS123', '3812039JBDJSJASAHAS', 2022, 'POLDA JATENG', 1, 2, '_21_minimalist-iron-man-wallpaper_Iron-Man-4k-Ultra-HD-Wallpaper-Background-Image-.jpg', 1),
(6, 3, 'HONDA', 'JAZZ', 1, 'AB 0001 XZ', '138129038SIHFSI23', '21312312ASDAIH', 2021, 'POLDA JATENG', 1, 4, 'output-onlinejpgtools.jpg', 0),
(8, 3, 'SUZUKI', 'GSX 150 RR', 1, 'AB 9898 OP', '3456789EDTY9876RDTY', '3245678OIUYT34567IHJG', 2022, 'POLDA JOGJA', 1, 2, 'SeekPng_com_user-png_7297561.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

DROP TABLE IF EXISTS `kondisi`;
CREATE TABLE IF NOT EXISTS `kondisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`) VALUES
(1, 'BAIK'),
(2, 'RUSAK RINGAN'),
(4, 'RUSAK PARAH');

-- --------------------------------------------------------

--
-- Table structure for table `level_pengguna`
--

DROP TABLE IF EXISTS `level_pengguna`;
CREATE TABLE IF NOT EXISTS `level_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_pengguna`
--

INSERT INTO `level_pengguna` (`id`, `nama_level`) VALUES
(1, 'admin'),
(2, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jenis_pinjam` int(11) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `nama_barang` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama`, `jenis_pinjam`, `nama_unit`, `nama_barang`, `tgl_pinjam`, `tgl_kembali`, `keterangan`) VALUES
(1, 'Bayu Prastyo', 1, 'UNIT TEST', 1, '2022-04-26', '2022-04-30', 'Pinjam Untuk Kepentingan Bla Bla'),
(2, 'Esti Setyaningrum', 1, 'UNIT TEST', 2, '2022-05-07', '2022-05-31', 'Peminjaman Kendaraan '),
(3, 'Tes Nama', 1, 'UNIT TEST', 3, '2022-05-07', '2022-05-28', 'Tes Keterangan'),
(4, 'Nurdin Ardhi', 1, 'UNIT TEST', 2, '2022-05-09', '2022-05-09', 'Anu'),
(5, 'BonaVentura', 1, 'UNIT TEST', 2, '2022-05-09', '2022-05-10', 'A'),
(6, 'Ilyas NF', 1, 'UNIT TEST', 5, '2022-05-11', '2022-05-13', 'Pinjam Satria F'),
(7, 'Esti Setyaningrum', 2, 'UNIT TEST', 2, '2022-05-11', '2022-05-12', 'Pinjam Laptop'),
(8, 'Bayu Prastyo', 2, 'UNIT TEST', 2, '2022-05-13', '2022-05-13', 'Pinjam Laptop Coba'),
(9, 'Miftah', 2, 'UNIT TEST', 3, '2022-05-13', '2022-05-13', 'ABC'),
(10, 'Faisal', 1, 'UNIT TEST', 2, '2022-05-13', NULL, 'Keterangan'),
(11, 'ISNAN', 1, 'UNIT TEST', 6, '2022-05-13', '2022-05-17', 'ISNAN'),
(12, 'NamedBay', 1, 'UNIT TEST', 3, '2022-05-13', '2022-05-13', 'A'),
(13, 'Isnan', 2, 'UNIT TEST', 3, '2022-05-13', '2022-05-13', 'A'),
(14, 'Test Last', 1, 'UNIT TEST', 5, '2022-05-16', '2022-05-16', 'Keterangan Test'),
(15, 'Test Last', 2, 'UNIT TEST', 3, '2022-05-16', '2022-05-16', 'Test'),
(16, 'Tes Pinjam', 2, 'UNIT TEST', 2, '2022-05-16', '2022-05-17', 'A'),
(17, 'Coba Lagi', 1, 'UNIT TEST', 5, '2022-05-16', '2022-05-16', '123'),
(18, 'tes', 1, 'UNIT TEST', 1, '2022-05-16', '2022-05-16', 'tes'),
(19, 'Tes Chart', 1, 'UNIT TEST', 5, '2022-11-17', '2022-05-17', 'ABC'),
(20, 'TEST UPDATE BARANG DAN UNIT', 1, 'UNIT UPDATE', 5, '2022-05-17', NULL, 'TEST UPDATE BARANG DAN UNIT'),
(21, 'TEST UPDATE NAMA UNIT BARANG', 2, 'UNIT TEST UPDATE', 4, '2022-05-17', '2022-05-17', 'KETERANGAN TEST UPDATE'),
(22, 'sS12)*%$#;\'', 1, 'asASS', 8, '2022-05-17', '2022-05-17', 'SAS9891`82`92981`2\'\'`12\'`12'),
(23, 'asAS982^*(@!@*@#(@#*@#(((@#*)!@)(!@@#)~~~~````2021012', 2, 'asASasdssaasdasd', 3, '0000-00-00', '0000-00-00', 'ASKJaksjkASi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `level`, `is_active`) VALUES
(1, 'admin', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', 'Admin', 1, 1),
(2, 'petugas', '$2y$10$pwQLe1vob0n8lw8A6/t29Ok.RHxQZ.cBj2E2/GEy8IxDDQKxgR/nq', 'Petugas', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_pengguna`
--

DROP TABLE IF EXISTS `unit_pengguna`;
CREATE TABLE IF NOT EXISTS `unit_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_pengguna` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_pengguna`
--

INSERT INTO `unit_pengguna` (`id`, `unit_pengguna`) VALUES
(1, 'UNIT LAKA'),
(2, 'UNIT LAKA TUNGGAL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
