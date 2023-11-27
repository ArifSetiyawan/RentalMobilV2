-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6657
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rental_mobil
CREATE DATABASE IF NOT EXISTS `rental_mobil` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `rental_mobil`;

-- Dumping structure for table rental_mobil.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `Id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `kd_bank` varchar(50) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `no_rekening` varchar(18) NOT NULL,
  PRIMARY KEY (`Id_bank`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.bank: ~3 rows (approximately)
INSERT INTO `bank` (`Id_bank`, `kd_bank`, `nama_bank`, `no_rekening`) VALUES
	(1, 'BNK01', 'BCA', '3275459943589'),
	(2, 'BNK02', 'BNI', '324555757868'),
	(3, 'BNK03', 'Mandiri', '324546776886');

-- Dumping structure for table rental_mobil.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `Id_cust` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(2) NOT NULL,
  `alamat` tinytext DEFAULT NULL,
  `no_telfon` varchar(15) DEFAULT NULL,
  `j_kelamin` enum('L','P') DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `isAktif` int(1) NOT NULL,
  `file_ktp` varchar(18) DEFAULT NULL,
  `file_KK` varchar(28) DEFAULT NULL,
  `rek_listrik` varchar(30) DEFAULT NULL,
  `bukti_keprumah` varchar(31) DEFAULT NULL,
  `Id_card` varchar(22) DEFAULT NULL,
  `file_SIM` varchar(18) DEFAULT NULL,
  `file_perusahaan` varchar(30) DEFAULT NULL,
  `file_NIB` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`Id_cust`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.customer: ~7 rows (approximately)
INSERT INTO `customer` (`Id_cust`, `nama`, `email`, `password`, `role`, `alamat`, `no_telfon`, `j_kelamin`, `keperluan`, `isAktif`, `file_ktp`, `file_KK`, `rek_listrik`, `bukti_keprumah`, `Id_card`, `file_SIM`, `file_perusahaan`, `file_NIB`) VALUES
	(1, 'Arif', 'muhammadarief252@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', '', NULL, '', 1, NULL, 'Report_Transaksi_(1)pdf11', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'Lynn', 'lyynnerlin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, NULL, NULL, NULL, '', 1, NULL, 'Report_Transaksi_(1)pdf11', NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'Muhammad Arif', 'arifnamikaze4@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Depok, Beji', '0859234563234', NULL, 'Perseorangan', 1, 'car-1jpg258176621.', 'Report_Transaksi_(1)pdf11', 'car-4jpg1843420364.jpg', 'car-5jpg861966496.jpg', 'car-6jpg604604744.jpg', 'car-2jpg1228454196', NULL, NULL),
	(7, 'Tiya', 'ariefsetiyawan3@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, NULL, NULL, NULL, '', 1, NULL, 'Report_Transaksi_(1)pdf11', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'Muhammad Arif Setiyawan ', 'muhamadarief251@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'test', '2124534114', 'P', 'Perusahaan', 1, NULL, 'Report_Transaksi_(1)pdf11', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'Farhana Talita', 'farhana@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, NULL, NULL, NULL, 'Perusahaan', 1, NULL, 'Report_Transaksi_(1)pdf11', NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'Farhana Talita', 'arifnamikaze3@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Beji, Depok', '0859234563234', 'L', 'Perseorangan', 1, '0XDuYVHH3vMcZTun6W', 'Report_Transaksi_(1)pdf11', 'laporan-transaksipdf1349715', 'SP_MCU_RSPJaya_(Annual_-_HO_', 'laporan-transaksipdf19', 'CskNiFIv7C3oWaS8Ma', NULL, NULL),
	(12, 'Wawan Sumono', 'wawan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Depok', '0859234563234', 'L', 'Perseorangan', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table rental_mobil.layanan
CREATE TABLE IF NOT EXISTS `layanan` (
  `Id_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `namaLayanan` varchar(30) DEFAULT NULL,
  `detailLayanan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_layanan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.layanan: ~4 rows (approximately)
INSERT INTO `layanan` (`Id_layanan`, `namaLayanan`, `detailLayanan`) VALUES
	(1, 'Sewa Mobil Lepas Kunci', 'Menyediakan layanan sewa mobil lepas kunci dengan beberapa persyaratan yang harus disetujui'),
	(2, 'Sewa Mobil Dengan Supir', 'Menyediakan layanan sewa mobil include dengan supir/driver yang akan menyetir'),
	(3, 'Sewa Mobil Pernikahan', 'Menyediakan layanan sewa mobil untuk acara pernikahan'),
	(4, 'Sewa Mobil Perusahaan', 'Menyediakan layanan sewa mobil untuk keperluan korporasi atau perusahaan');

-- Dumping structure for table rental_mobil.mobil
CREATE TABLE IF NOT EXISTS `mobil` (
  `Id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mobil` varchar(50) DEFAULT NULL,
  `produsen` varchar(50) DEFAULT NULL,
  `kode_type` int(1) NOT NULL,
  `nopol` varchar(9) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `BBM` varchar(15) DEFAULT NULL,
  `tahun_buat` varchar(4) DEFAULT NULL,
  `kapasitas` varchar(8) DEFAULT NULL,
  `transmisi` varchar(20) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `denda` bigint(20) DEFAULT NULL,
  `img_mobil` varchar(25) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id_mobil`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.mobil: ~10 rows (approximately)
INSERT INTO `mobil` (`Id_mobil`, `nama_mobil`, `produsen`, `kode_type`, `nopol`, `warna`, `BBM`, `tahun_buat`, `kapasitas`, `transmisi`, `harga`, `denda`, `img_mobil`, `deskripsi`, `status`) VALUES
	(7, 'Escape', 'Ford', 2, 'B 111 AAA', 'Hitam', 'Pertalite', '2021', '7', 'Matic', 500000, 50000, 'Mobil_204442634.png', 'Land Cruiser merupakan salah satu mobil Sport Utility Vehicle (SUV) terbaik ciptaan Toyota yang terkenal tangguh sejak tahun 1954 dan setelah dilakukan pengembangan pada tahun 1951.', 0),
	(16, 'Cadillac Escalade', 'General Motors', 2, 'B 888 CAD', 'Hitam', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_1301631121.png', 'Cadillac Escalade adalah sebuah mobil SUV mewah buatan pabrikan otomotif General Motors yang dijual dengan merk Cadillac. Cadillac Escalade diperkenalkan tahun 1999 sebagai hasil untuk melawan para kompetitor GM dari Jerman, Jepang, dan juga Ford. Sebelumnya, Ford juga merilis mobil serupa tahun 1998 dengan nama Lincoln Navigator. Escalade dibuat di pabrik GM di Arlington, Texas.', 0),
	(17, 'Grand Wagoneer', 'Jeep', 3, 'B 4127 ED', 'Broken White', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_1546222374.png', 'Wagoneer dan Grand Wagoneer generasi keempat adalah SUV ukuran penuh dan SUV mewah ukuran penuh berdasarkan sasis Ram 1500 (DT).Itu terungkap pada Maret 2021 untuk model tahun 2022 sebagai model andalan Jeep.Produksi Jeep Wagoneers generasi keempat dimulai pada 2021.', 0),
	(18, 'Bentayga', 'Bentley', 4, 'B 777', 'Broken Silver', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_900065676.png', 'Bentley Bentayga adalah sebuah kendaraan SUV mewah lima pintu yang dipasarkan oleh Bentley, dimulai dengan model tahun 2016. Bodinya diproduksi di Pabrik Volkswagen Zwickau-Mosel di Jerman, kemudian dicat oleh Paintbox Editions di Banbury, Inggris, dan akhirnya dirakit di pabrik Bentley di Crewe, Inggris.', 0),
	(19, 'Cullinan', 'Rolls Royce', 4, 'B 1 DSN', 'Putih', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_554022531.png', 'Crossover yang tetap dirancang bisa berjalan di pelbagai medan ditanamkan mesin V12 twin-turbo 6.75-liter yang disetel ulang agar mampu memuntahkan tenaga sebesar 571 hp dan torsi puncak 850 Nm sejak putaran mesin 1.600 rpm.', 0),
	(20, 'QX80', 'Infiniti', 2, 'B 6451 NS', 'Coklat', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_1533560931.png', 'Sport Utility Vehicle (SUV) besutan Infiniti dirilis pada tahun 2016 lalu. Dinamai Infiniti QX80 yang sekaligus menjadi generasi keduanya yang lebih memprioritaskan kenyamanan kelas satu dalam kabinnya.', 1),
	(21, 'Alpina XB7', 'BMW', 3, 'B 1429 SJ', 'Putih', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_235016970.png', 'Alpina XB7 versi paling kuat BMW dari BMW X7 2020 tiga baris SUV, 523-hp M50i, untuk tes jangka panjang 40.000 mil. Kami telah menikmati kekuatan yang disediakan oleh twin-turbo V-8, dan kemudi roda belakang serta suspensi yang lebih sporty membuatnya terasa kurang seperti SUV besar dan lebih seperti sedan berkinerja tinggi.', 1),
	(22, '63 AMG', 'Mercedes', 4, 'B 8753 JG', 'Hitam', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_1617439492.png', 'Mercedes-Benz AMG G63 memiliki dimensi panjang 4.764 mm, lebar 1.867 mm, dan tinggi 1.954 mm, serta dengan ground clearence 241 mm. Dari segi desain, mobil ini memiliki desain yang kotak namun begitu gagah untuk sebuah jip.', 1),
	(23, 'Mercedes E53', 'Mercedes', 2, 'B 8433 SG', 'Hitam', 'Pertalite', '2021', '7', 'Matic', 800000, 80000, 'Mobil_1228769222.png', NULL, 1),
	(27, 'Rush', 'Toyota', 2, 'B 38883 Z', 'Silver', 'Pertalite', '2021', '7', 'Matic', 500000, 50000, 'Mobil_1092173933.jpg', NULL, 1);

-- Dumping structure for table rental_mobil.role
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL,
  PRIMARY KEY (`Id_role`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.role: ~3 rows (approximately)
INSERT INTO `role` (`Id_role`, `role_name`) VALUES
	(1, 'Administrator'),
	(2, 'Customer'),
	(3, 'Petugas Lapangan');

-- Dumping structure for table rental_mobil.status
CREATE TABLE IF NOT EXISTS `status` (
  `Id_Status` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.status: ~16 rows (approximately)
INSERT INTO `status` (`Id_Status`, `Nama_Status`) VALUES
	(1, 'Rental Diproses'),
	(2, 'Verifikasi Data & Survei'),
	(3, 'Response Verifikasi & Survei'),
	(4, 'Open Negosiasi'),
	(5, 'Negosiasi Harga'),
	(6, 'Pembayaran DP'),
	(7, 'Konfirmasi Pembayaran DP'),
	(8, 'Pengantaran Mobil'),
	(9, 'Konfirmasi Pengantaran Mobil'),
	(10, 'Pelunasan Bayar'),
	(11, 'Konfirmasi Pelunasan Pembayaran'),
	(12, 'Rental Dimulai'),
	(13, 'Rental Dibatalkan'),
	(14, 'Pembayaran Denda'),
	(15, 'Konfirmasi Pembayaran Denda'),
	(16, 'Pengembalian Mobil'),
	(17, 'Konfirmasi Pengembalian Mobil'),
	(18, 'Rental Selesai');

-- Dumping structure for table rental_mobil.supir
CREATE TABLE IF NOT EXISTS `supir` (
  `Id_supir` int(2) NOT NULL AUTO_INCREMENT,
  `namasupir` varchar(30) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `noktp` varchar(30) DEFAULT NULL,
  `foto` varchar(25) DEFAULT NULL,
  `tarif` bigint(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id_supir`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table rental_mobil.supir: ~3 rows (approximately)
INSERT INTO `supir` (`Id_supir`, `namasupir`, `tgllahir`, `alamat`, `noktp`, `foto`, `tarif`, `status`) VALUES
	(1, 'Bambang', '1980-07-24', 'Pasar Minggu, Jakarta Selatan', '1234455678', 'muhamadarief2511242844748', 500000, 1),
	(4, 'test', '2023-05-16', 'test', '3423242424', 'muhamadarief251563199318.', 500000, 1),
	(5, 'test', '2023-07-16', 'hjgjhghgg', '3423242424', 'muhamadarief251365210910.', 500000, NULL);

-- Dumping structure for table rental_mobil.tblt_rental
CREATE TABLE IF NOT EXISTS `tblt_rental` (
  `id_rental` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(5) NOT NULL,
  `id_mobil` int(5) NOT NULL,
  `id_layanan` int(1) NOT NULL,
  `supir` int(5) DEFAULT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `DP` bigint(20) NOT NULL DEFAULT 0,
  `biaya_pelunasan` bigint(20) NOT NULL DEFAULT 0,
  `biaya_survei` bigint(20) NOT NULL DEFAULT 0,
  `biaya_antar` bigint(20) NOT NULL DEFAULT 0,
  `total_harga` bigint(20) NOT NULL DEFAULT 0,
  `harga_nego` bigint(20) NOT NULL DEFAULT 0,
  `total_denda` bigint(20) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `bukti_DP` varchar(23) DEFAULT NULL,
  `bukti_pelunasan` varchar(25) DEFAULT NULL,
  `bukti_pengantaran` varchar(27) DEFAULT NULL,
  `bukti_survei` varchar(26) DEFAULT NULL,
  `bukti_denda` varchar(27) DEFAULT NULL,
  `bukti_pengembalian` varchar(28) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `id_status` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_rental`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.tblt_rental: ~4 rows (approximately)
INSERT INTO `tblt_rental` (`id_rental`, `id_customer`, `id_mobil`, `id_layanan`, `supir`, `tgl_rental`, `tgl_kembali`, `DP`, `biaya_pelunasan`, `biaya_survei`, `biaya_antar`, `total_harga`, `harga_nego`, `total_denda`, `tgl_pengembalian`, `bukti_DP`, `bukti_pelunasan`, `bukti_pengantaran`, `bukti_survei`, `bukti_denda`, `bukti_pengembalian`, `notes`, `id_status`) VALUES
	(37, 10, 16, 1, NULL, '2023-07-13', '2023-07-15', 30000, 270000, 50000, 50000, 300000, 300000, 240000, NULL, 'bimbinganjpg479645592.j', 'IMG20220324124610jpg19020', 'IMG20220324124610jpg3893871', 'laporan-transaksipdf195875', 'Bukti_Denda2068806613.pdf', 'Pengembalian_19082666.pdf', 'awsdwdawda', 15),
	(38, 10, 17, 1, NULL, '2023-07-13', '2023-07-14', 85000, 765000, 0, 50000, 850000, 0, 160000, NULL, 'DP_Bayar925557334.pdf', 'Pelunasan_1896983082.pdf', 'Pengantaran_1008706567.pdf', NULL, 'Bukti_Denda1938467736.pdf', 'Pengembalian_686002421.pdf', NULL, 17),
	(39, 10, 19, 2, 1, '2023-07-17', '2023-07-17', 0, 0, 0, 50000, 550000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
	(40, 12, 7, 3, 0, '2023-07-18', '2023-07-18', 0, 0, 50000, 50000, 100000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
	(41, 12, 18, 1, 0, '2023-07-19', '2023-07-19', 0, 0, 0, 50000, 50000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- Dumping structure for table rental_mobil.type
CREATE TABLE IF NOT EXISTS `type` (
  `Id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rental_mobil.type: ~4 rows (approximately)
INSERT INTO `type` (`Id_type`, `nama_type`) VALUES
	(1, 'SEDAN'),
	(2, 'SUV (Special Utility Vehicle)'),
	(3, 'MPV (Multi Purpose Vehicle)'),
	(4, 'CUV (Crossover Utility Vehicle)');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
