-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 03:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `nama_peminjam` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL,
  `tanggal_pinjam` varchar(191) NOT NULL,
  `tanggal_pengembalian` varchar(191) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id`, `nama_peminjam`, `kelas`, `tanggal_pinjam`, `tanggal_pengembalian`, `barang_id`, `jumlah_pinjam`) VALUES
(3, 'udin', 'x rpl 3', '2020-01-11', '2020-01-18', 7, 1);

--
-- Triggers `pinjam`
--
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER DELETE ON `pinjam` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah=jumlah+OLD.jumlah_pinjam
    WHERE id = OLD.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam_barang` AFTER INSERT ON `pinjam` FOR EACH ROW BEGIN
	UPDATE barang SET jumlah=jumlah-NEW.jumlah_pinjam
    WHERE id = NEW.barang_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `fk_pinjam_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
