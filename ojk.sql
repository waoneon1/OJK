-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2014 at 08:55 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ojk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
`No` int(11) NOT NULL,
  `Kode_Barang` int(11) NOT NULL,
  `Jenis_Barang` varchar(255) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Stok_Barang` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`No`, `Kode_Barang`, `Jenis_Barang`, `Keterangan`, `Stok_Barang`) VALUES
(1, 452001, 'Kertas Surat ukuran A4 berlogo OJK 80 gram (Warna)', 'Rim', 49),
(2, 452002, 'Kertas Surat ukuran A4 berlogo OJK 80 gram (Abu - Abu)', 'Rim', 2),
(3, 452003, 'Kertas Surat ukuran Folio berlogo OJK 80 gram', 'Rim', 20),
(4, 452004, 'Kertas Surat ukuran Folio berlogo OJK 70 gram', 'Rim', 20),
(5, 452005, 'Sampul surat ukuran 11 cm x 23,5 Cm berlogo OJK', 'Lembar', 20),
(6, 452006, 'Sampul surat ukuran 24 Cm x 34,5 cm berlogo OJK', 'Lembar', 20),
(7, 452007, 'Sampul surat ukuran 16.5 x 24 cm berlogo OJK', 'Lembar', 20),
(8, 452008, 'Sampul surat coklat ukuran  40 cm x 50 cm', 'Lembar', 20),
(9, 452009, 'Tanda Terima surat keluar berlogo OJK', 'Lembar', 20),
(10, 452010, 'Tanda Terima surat Masuk berlogo OJK', 'Lembar', 20),
(11, 452011, 'Lembar Disposisi Pejabat berlogo OJK', 'Buku', 20),
(12, 452012, 'Map Merah berlogo OJK', 'Lembar', 20),
(13, 452013, 'Map Putih berlogo OJK', 'Lembar', 20),
(14, 452014, 'Kertas memo ukuran 10 cm x 10 cm berlogo OJK', 'Pak', 20),
(15, 452015, 'Kertas Foto Copy/ HVS 80 Gram # Kuarto', 'Rim', 20),
(16, 452016, 'Kertas Foto Copy/HVS 80 Gram # Folio', 'Rim', 20),
(17, 452017, 'Kertas Electronic White Board', 'Roll', 20),
(18, 452018, 'Dus Arsip', 'Buah', 20),
(19, 452019, 'Folder Warna Hijau / Map Kuping Hijau', 'Buah', 20),
(20, 452020, 'Folder Warna Hijau Kuping Tengah', 'Buah', 20),
(21, 452021, 'Folder Warna Hijau Kuping Kanan', 'Buah', 20),
(22, 452022, 'Post Id 7,5cm x 7,5 cm', 'Pak', 20),
(23, 452023, 'Post Id sign here', 'Pak', 20),
(24, 452024, 'Clip Binder No. 105', 'Pak', 20),
(25, 452025, 'Clip Binder No. 107', 'Pak', 20),
(26, 452026, 'Clip Binder No. 155', 'Pak', 20),
(27, 452027, 'Clip Binder No. 111', 'Pak', 20),
(28, 452028, 'Clip Binder No. 200', 'Pak', 20),
(29, 452029, 'Clip Binder No. 260', 'Pak', 20),
(30, 452030, 'Paper Clip plastik No. 303 (Kecil)', 'Pak', 20),
(31, 452031, 'Paper Clip plastik No. 5 (Besar)', 'Pak', 20),
(32, 452032, 'Kawat Spiral A4 Ring 35 11 mm', 'Dus', 20),
(33, 452033, 'Kawat Spiral A4 Ring 35 9,5 mm', 'Dus', 20),
(34, 452034, 'Kawat Spiral A4 Ring 35 8 mm', 'Dus', 20),
(35, 452035, 'Kawat Spiral A4 Ring 35 4,5 mm', 'Dus', 20),
(36, 452036, 'Spidol Permanen Warna Biru No.100 (Besar)', 'Buah', 20),
(37, 452037, 'Spidol Permanen Warna Hitam No.100 (Besar)', 'Buah', 20),
(38, 452038, 'Spidol Permanen Warna Merah No.100 (Besar)', 'Buah', 20),
(39, 452039, 'Spidol Whiteboard Warna Biru No.100 (Besar)', 'Buah', 20),
(40, 452040, 'Spidol Whiteboard Warna Merah No.100 (Besar)', 'Buah', 20),
(41, 452041, 'Spidol Whiteboard Warna Hitam No.100 (Besar)', 'Buah', 20),
(42, 452042, 'Spidol Whiteboard Warna Biru No.70', 'Buah', 20),
(43, 452043, 'Spidol Whiteboard Warna Merah No.70', 'Buah', 20),
(44, 452044, 'Spidol Whiteboard Warna Hitam No.70', 'Buah', 20),
(45, 452045, 'Stabillo Boss Merah', 'Buah', 20),
(46, 452046, 'Stabillo Boss Biru', 'Buah', 20),
(47, 452047, 'Stabillo Boss Hijau', 'Buah', 20),
(48, 452048, 'Stabillo Boss Kuning', 'Buah', 20),
(49, 452049, 'Pinsil Hitam Steadlert HB', 'Buah', 20),
(50, 452050, 'Tinta Stempel Warna Biru', 'Buah', 20),
(51, 452051, 'Tinta Stempel Warna Hitam', 'Buah', 20),
(52, 452052, 'Tinta Stempel Warna Merah', 'Buah', 20),
(53, 452053, 'Cutter A-,300', 'Buah', 20),
(54, 452054, 'Cutter L,500', 'Buah', 20),
(55, 452055, 'Isi Cutter A-,300 (isi 5 bh)', 'Pak', 20),
(56, 452056, 'Isi Cutter L,500 (isi 5 bh)', 'Pak', 20),
(57, 452057, 'Gunting besar', 'Buah', 20),
(58, 452058, 'Karet Penghapus Staedler', 'Buah', 20),
(59, 452059, 'Corection Tape / Tipp-ex Kertas', 'Buah', 20),
(60, 452060, 'Penghapus White Board', 'Buah', 20),
(61, 452061, 'Perforator No. 22', 'Buah', 20),
(62, 452062, 'Rautan Pensil', 'Buah', 20),
(63, 452063, 'Pita Mesin Tik Swallow (Hitam)', 'Buah', 20),
(64, 452064, 'Map Gantung (isi 50 bh)', 'Pak', 20),
(65, 452065, 'Map Plastik Snelhecter', 'Buah', 20),
(66, 452066, 'Ordner Plastik # 7 cm', 'Buah', 20),
(67, 452067, 'Penggaris Plastik # 30 cm', 'Buah', 20),
(68, 452068, 'Penggaris Plastik # 40 cm', 'Buah', 20),
(69, 452069, 'Cellulose Tape Sedang', 'Buah', 20),
(70, 452070, 'Plakband  #2" Warna Biru', 'Buah', 20),
(71, 452071, 'Plakband  #2" Warna Hitam', 'Buah', 20),
(72, 452072, 'Plakband  #2" Warna Bening', 'Buah', 20),
(73, 452073, 'Dispenser Cellulose Tape', 'Buah', 20),
(74, 452074, 'Dipsenser Plakband', 'Buah', 20),
(75, 452075, 'Lem Kristal', 'kg', 20),
(76, 452076, 'Lem Cair Povinal', 'Buah', 20),
(77, 452077, 'Sponbank', 'Buah', 20),
(78, 452078, 'Rak Stempel 1 susun', 'Buah', 20),
(79, 452079, 'Bantalan Stempel No.0 (Sedang)', 'Buah', 20),
(80, 452080, 'Stempel Tanggal', 'Buah', 20),
(81, 452081, 'Hechtmachine HD 10 (Kecil)', 'Buah', 20),
(82, 452082, 'Hechtmachine HD 30 (Sedang)', 'Buah', 20),
(83, 452083, 'Staples (nieces) No. 10 - 1M (4 mm)', 'Buah', 20),
(84, 452084, 'Staples (nieces) No. 3 - 1M (5 mm)', 'Buah', 20),
(85, 452085, 'Staples Nieces Heavy Duty 3/8" 1210, 1213, 1215, 1217 FA-H', 'Buah', 20),
(86, 452086, 'Pembuka Nieces (Staples Remover)', 'Buah', 20),
(87, 452087, 'Batu batrei AA', 'Buah', 20),
(88, 452088, 'Batu batrei AAA', 'Buah', 20),
(89, 452089, 'Karet Gelang', 'Pak', 20),
(90, 452090, 'Cover LHP', 'Lembar', 20),
(91, 452091, 'Back Cover LHP', 'Lembar', 20),
(92, 452092, 'Mica Plastik', 'Lembar', 20),
(93, 442001, 'Toner Cartridge Docuprint 340  ', 'Buah', 20),
(94, 442002, 'Toner Cartridge HP Laser Jet 1200  (15A)', 'Buah', 20),
(95, 442003, 'Toner Cartridge HP Laser Jet 1320 (49A)', 'Buah', 20),
(96, 442004, 'Toner Printer Fuji Xerox C2535A  Cyan (C )', 'Buah', 20),
(97, 442005, 'Toner Printer Fuji Xerox C2535A  Yellow (Y)', 'Buah', 20),
(98, 442006, 'Toner Printer Fuji Xerox C2535A  Magenta (M )', 'Buah', 20),
(99, 442007, 'Toner Printer Fuji Xerox C2535A  Black (K)', 'Buah', 20),
(100, 442008, 'Toner Printer Fuji Xerox Mesin Fax PE 220', 'Buah', 20),
(101, 442009, 'Toner HP Deskjet 460 Warna (95)', 'Buah', 20),
(102, 442010, 'Toner HP Deskjet 460 Black  (94)', 'Buah', 20),
(103, 442011, 'Compac Disk R # 700 MB', 'Buah', 20),
(104, 442012, 'DVD- R plus', 'Buah', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_permintaanbrg`
--

CREATE TABLE IF NOT EXISTS `tb_permintaanbrg` (
`id` int(10) NOT NULL,
  `NIP` int(50) DEFAULT NULL,
  `Kode_Transaksi` varchar(255) DEFAULT NULL,
  `Kode_Barang` varchar(255) DEFAULT NULL,
  `Jumlah_Permintaan` int(10) DEFAULT NULL,
  `Tanggal_Permintaan` date DEFAULT NULL,
  `NIP_Admin` varchar(50) DEFAULT NULL,
  `Jml_Disetujui` int(50) NOT NULL DEFAULT '0',
  `Status` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_permintaanbrg`
--

INSERT INTO `tb_permintaanbrg` (`id`, `NIP`, `Kode_Transaksi`, `Kode_Barang`, `Jumlah_Permintaan`, `Tanggal_Permintaan`, `NIP_Admin`, `Jml_Disetujui`, `Status`) VALUES
(1, 1110011, 'T0001', ' 452001', 6, '2014-11-02', NULL, 0, 0),
(2, 1110011, 'T0001', ' 452001', 5, '2014-11-02', NULL, 0, 0),
(3, 1110011, 'T0001', ' 452001', 16, '2014-11-02', '9990099', 10, 1),
(4, 1110046, 'T0012', ' 452001', 6, '2014-11-02', '9990099', 0, 1),
(7, 1110016, 'T0013', '452053', 6, '2014-11-04', NULL, 0, 0),
(8, 1110016, 'T0013', '452054', 6, '2014-11-04', NULL, 0, 0),
(9, 1110016, 'T0013', '452056', 7, '2014-11-04', NULL, 0, 0),
(10, 1110016, 'T0013', '452086', 11, '2014-11-04', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(5) NOT NULL,
  `NIP` int(50) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Level` tinyint(10) DEFAULT NULL,
  `niplg` int(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `NIP`, `Pass`, `Nama`, `Level`, `niplg`) VALUES
(1, 1234, '1234', 'Zeus', 0, 9990099),
(2, 11, 'pena', 'Avinda Rachmasari', 1, 1110011),
(3, 1110046, 'suci', 'Suci Masithoh Afsari Dewi', 1, 1110046),
(4, 1110016, '1234', 'Dharmawan Sukma', 1, 1110016);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`No`), ADD UNIQUE KEY `Kode_Barang` (`Kode_Barang`);

--
-- Indexes for table `tb_permintaanbrg`
--
ALTER TABLE `tb_permintaanbrg`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
MODIFY `No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `tb_permintaanbrg`
--
ALTER TABLE `tb_permintaanbrg`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
