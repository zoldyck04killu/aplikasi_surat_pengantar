-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2019 at 03:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_surat_pengantar`
--

-- --------------------------------------------------------

--
-- Table structure for table `akte_kelahiran`
--

CREATE TABLE `akte_kelahiran` (
  `id_akte` int(100) NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anakke` int(5) NOT NULL,
  `jekel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cetak` int(5) NOT NULL DEFAULT 0,
  `tanggal_permohonan` date NOT NULL,
  `tgl_pengambilan` date DEFAULT NULL,
  `surat_pengantar_ttd` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akte_kelahiran`
--

INSERT INTO `akte_kelahiran` (`id_akte`, `nama`, `tanggal_lahir`, `tempat_lahir`, `nama_ayah`, `nama_ibu`, `anakke`, `jekel`, `agama`, `nik`, `pekerjaan`, `keperluan`, `ket`, `status_cetak`, `tanggal_permohonan`, `tgl_pengambilan`, `surat_pengantar_ttd`, `user`) VALUES
(3123126, 'Budi Sucipto', '2019-07-01', 'Kelua', 'Sukisno', 'Marwah', 2, 'laki-laki', 'Islam', '18172312', 'Mahasiswa asas', 'akte lahiran', 'pembuatan akta kelahiran', 0, '2019-07-19', '2019-07-29', '$', 'koko'),
(3123127, 'Buidy asasas', '2019-06-25', 'Tanjung', 'bambang', 'suci', 4, 'laki-laki', 'islam', '12162312', 'swasta', 'kartu keluarga', 'permohonan kartu keluarga', 1, '2019-07-22', '2019-07-31', 'Img-156377786591.', 'budi'),
(3123128, 'asdad', '2019-07-15', 'asawd', 'asdd', 'wdawd', 3, 'laki-laki', 'adawd', '23123123', 'sdasda', 'adaw', 'dwdddasw', 0, '2019-07-22', '2019-07-30', 'Img-156377760315.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_cetak`
--

CREATE TABLE `hasil_cetak` (
  `id_cetak` int(200) NOT NULL,
  `nik` bigint(200) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `jenis_permohonan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_cetak`
--

INSERT INTO `hasil_cetak` (`id_cetak`, `nik`, `nama`, `tgl_permohonan`, `status`, `jenis_permohonan`) VALUES
(16, 123121, 'sasasa', '2019-07-19', 0, 'KTP'),
(17, 123121, 'dodo', '2019-07-19', 0, 'Kartu Keluarga'),
(20, 18172312, 'Budi', '2019-07-19', 0, 'Akte Kelahiran'),
(21, 2312, 'asad', '2019-07-20', 0, 'KTP'),
(22, 12312312, 'aasas', '2019-07-20', 0, 'KTP'),
(23, 12312, 'sasaw', '2019-07-20', 0, 'KTP'),
(24, 12312, 'sasaw', '2019-07-20', 0, 'KTP'),
(25, 98172312, 'Budiy', '2019-07-22', 0, 'KTP'),
(26, 273826323, 'Buidya', '2019-07-22', 0, 'Kartu Keluarga'),
(27, 12162312, 'Buidy', '2019-07-22', 0, 'Akte Kelahiran'),
(28, 8362321716, 'Budis', '2019-07-22', 0, 'KTP'),
(29, 981236123, 'sasjas', '2019-07-22', 0, 'Akte Kelahiran'),
(30, 23123123, 'asdad', '2019-07-22', 0, 'Akte Kelahiran'),
(31, 1231231, 'ssss', '2019-07-22', 0, 'KTP'),
(32, 2212313, 'asasas', '2019-07-24', 0, 'KTP'),
(33, 2212313, 'asasas', '2019-07-24', 0, 'KTP'),
(34, 12312312, 'Syarif', '2019-07-24', 0, 'KTP'),
(35, 12312312, 'Syarif', '2019-07-24', 0, 'KTP'),
(36, 6756756, 'sasas', '2019-07-24', 0, 'Kartu Keluarga'),
(37, 876382432, 'aas', '2019-07-27', 0, 'KTP');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` int(200) NOT NULL,
  `nik` bigint(200) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cetak` int(5) NOT NULL DEFAULT 0,
  `tanggal_permohonan` date NOT NULL,
  `tgl_pengambilan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `nik`, `nama`, `alamat`, `telp`, `status_cetak`, `tanggal_permohonan`, `tgl_pengambilan`) VALUES
(6, 630904300996008, 'Akhmad Syarif', 'jln Basuki Rahmat', '087716514565', 1, '2019-07-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE `ktp` (
  `id_ktp` int(200) NOT NULL,
  `nik` bigint(100) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jekel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kab` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kawin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cetak` int(5) NOT NULL DEFAULT 0,
  `tanggal_permohonan` date NOT NULL,
  `tgl_pengambilan` date DEFAULT NULL,
  `tgl_berfoto` date DEFAULT NULL,
  `keperluan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pengantar_ttd` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`id_ktp`, `nik`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `alamat`, `telp`, `rt`, `rw`, `desa`, `kec`, `kab`, `agama`, `kewarganegaraan`, `pekerjaan`, `status_kawin`, `status_cetak`, `tanggal_permohonan`, `tgl_pengambilan`, `tgl_berfoto`, `keperluan`, `surat_pengantar_ttd`, `user`) VALUES
(5, 123121, 'sasasa', '2019-07-30', 'tanjung', 'laki-laki', 'jln.basuki rahmat', '087715212', '2', '2', 'agung', 'tanjung', 'tabalong', 'islam', 'WANI', 'programmer', 'Sudah', 0, '2019-07-19', '2019-07-20', NULL, 'KTP', 'Img-156358843792.jpg', 'koko'),
(6, 123121, 'bamang', '2019-06-27', 'Murung Pudak', 'laki-laki', 'jln. plamboyan', '08771251243', '2', '1', 'Murung Pudak', 'Murung Pudak', 'tabalong', 'islam', 'WNI', 'Pegawai Tambang', 'Sudah', 0, '2019-07-19', '2019-08-21', NULL, 'KK', 'Img-156358872144.jpg', 'koko'),
(7, 12312, 'sasaw', '2019-07-22', 'qsasa', 'laki-laki', 'asas', '121312', '1', '2', 'asxasx', 'asawd', 'scdcsd', 'scsc', 'adae', 'adadef', 'Sudah', 0, '2019-07-20', '2019-07-31', '2019-07-30', 'KTP', 'Img-156397243230.', '1231312'),
(8, 98172312, 'Budiy', '2019-07-30', 'Tanjung', 'laki-laki', 'jln tanjung', '0877235231', '1', '3', 'Agung', 'Tanjung', 'Tabalong', 'Islam', 'WNI', 'swasta', 'Sudah', 0, '2019-07-22', '2019-07-30', '2019-07-28', 'KTP', '$ ', 'budi'),
(9, 273826323, 'Buidya', '2019-07-29', 'Tanjung', 'laki-laki', 'jln Basuki Rahmat', '0877236321', '1', '2', 'Agung', 'Tanjung', 'Tabalong', 'Islamn', 'WNI', 'swasta', 'Sudah', 0, '2019-07-22', '2019-07-30', NULL, 'KK', NULL, 'budi'),
(10, 8362321716, 'Budis', '2019-07-30', 'Tanjung', 'laki-laki', 'jln Basuki Rahmat', '08772352323', '1', '2', 'Tanjung', 'Tanjung', 'Tabalong', 'islam', 'wni', 'swasta', 'Sudah', 0, '2019-07-22', NULL, '2019-07-29', 'KTP', '$', 'budi'),
(11, 1231231, 'ssss', '2019-07-23', 'asas', 'laki-laki', 'asas', '12312312', '2', '1', 'asas', 'asas', 'asas', 'asas', 'asas', 'asas', 'Sudah', 0, '2019-07-22', '2019-07-29', '2019-07-26', 'KTP', '$', 'budi'),
(12, 12312312, 'Syarif', '2019-07-22', 'aasas', 'laki-laki', 'asdasd', '2313123', '1', '2', 'asads', 'dawdas', 'awdaw', 'wadwds', 'dawdw', 'awdasdw', 'Sudah', 0, '2019-07-24', '2019-07-31', '2019-07-29', 'KTP', '$', 'budi'),
(13, 6756756, 'sasas asasd', '2019-07-18', 'asas', 'laki-laki', 'asdacas', '214123', '1', '2', 'asasd', 'awdasdaw', 'asdawd sdsve', 'sfsef', 'asda', 'awdwd', 'Sudah', 0, '2019-07-24', '2019-07-30', NULL, 'KK', '$', 'budi'),
(14, 876382432, 'aas', '2019-07-30', 'msvdhsd', 'laki-laki', 'jln', '983728423', '1', '2', 'jshdjh', 'jvvj', 'gvh', 'jhbhd', 'vsdh', 'skjbdje', 'Sudah', 0, '2019-07-27', '2019-07-31', NULL, 'KTP', '$', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saran` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`nik`, `saran`) VALUES
('123', 'bla bla bla bla blas jasbagcsac');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', '$2y$10$PQoM7kJJEQ3MpEIRglI/supSWRjxb65zymOafthLHmOZxGCSSmS5W', 2),
(3, 'koko', '$2y$10$pKoReVjO5lBhDSSkWc1KPuBNK/1kS3uLCSymhEk95Hb6/AsGJnj0.', 1),
(4, '1231312', '$2y$10$Cxb/mSrmcprgOA7DI6k9o.XfyjuFcftVDuDLLL3H8m0zAll5ZIGYO', 1),
(6, 'budi', '$2y$10$9WeUL75583Rbtr4aB3k84O./Vq8svveR1kinnmRM0zMgav2b3tU8m', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akte_kelahiran`
--
ALTER TABLE `akte_kelahiran`
  ADD PRIMARY KEY (`id_akte`);

--
-- Indexes for table `hasil_cetak`
--
ALTER TABLE `hasil_cetak`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akte_kelahiran`
--
ALTER TABLE `akte_kelahiran`
  MODIFY `id_akte` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3123129;

--
-- AUTO_INCREMENT for table `hasil_cetak`
--
ALTER TABLE `hasil_cetak`
  MODIFY `id_cetak` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id_kk` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id_ktp` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
