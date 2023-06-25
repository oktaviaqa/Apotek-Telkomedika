-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 03:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkomedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `level` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `level`, `username`, `nama`, `email`, `password`, `foto`) VALUES
(19, 'admin', 'pia', 'oke', 'oktavia@gmail.com', '345', 'WhatsApp Image 2021-04-08 at 21.30.26.jpeg'),
(20, 'superadmin', 'pipiw', 'pia', 'sq@gmail.com', '222', '608281d097acb.png'),
(21, 'superadmin', 'xiexie', 'pppp', 'okta@gmail.com', '123', '608281843d2a7.jpeg'),
(22, 'superadmin', 'oktaviaq.a', 'ASIQUEEE', 'oktavia@gmail.com', '123', '6083407b09a93.jpeg'),
(24, 'admin', 'ihiy', 'uhuk', 'oktavia@gmail.com', '555', '608301530fab1.jpg'),
(27, 'admin', 'admin', 'oktavia', 'oktaviaq.a@gmail.com', 'admin', '60cd8ec47ad2c.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenisobat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id_jenis`, `nama_jenisobat`, `foto`) VALUES
(12, 'Bby care', '60cdf0c1b6ff6.png'),
(13, 'Obat', '60cdf0fe03467.png'),
(14, 'Beauty care', '60cdf127164c2.png'),
(15, 'Nutrisi', '60cdf13ad6afb.png'),
(16, 'Alat Kesehatan', '60cdf1700738a.png'),
(17, 'Home diagnostic', '60cdf18863be1.png');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `kemasan` varchar(1000) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(250) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kemasan`, `jenis_obat`, `nama_obat`, `harga`, `deskripsi`, `foto`) VALUES
(23, 'PC', 'Bby Care', 'DODO BOTOL PAHE', '46.860', 'Botol minum anak Dodo merupakan solusi botol minum terbaik, yang tidak mudah tumpah. Dilengkapi sedotan silicone, yang dapat memudahkan anak-anak untuk minum. Botol minum Dodo terbuat dari bahan plastik yang berkualitas yang tahan terhadap panas. ', '60d026ff1ecb0.png'),
(24, 'PC', 'Bby Care', 'MINYAK TELON MY BABY', '30.750', 'Minyak Telon yang dapat melindungi si Kecil dari gigitan nyamuk dan serangga hingga 8 jam. Dengan Eucalyptus, juga melindungi si Kecil dari bakteri dan virus. Dapat digunakan untuk berbagai keperluan, seperti meredakan perut kembung dan menghangatkan tubuh si Kecil.', '60d028c510d3d.png'),
(25, 'PC', 'Bby Care', 'BEDAK JHONSON', '19.668', 'JOHNSON’S® Baby Powder merupakan bedak yang terbuat dari talk murni. Bedak ini bebas kandungan pewarna dan pengawet. Wanginya lembut sehingga cocok untuk bayi. Bedak ini juga dapat mencegah iritasi, mengharumkan serta menyegarkan pada bayi', '60d029e3a85c4.png'),
(26, 'STRIP', 'Obat', 'PARACETAMOL', '4.590', 'Acetaminophen atau paracetamol adalah obat untuk penurun demam dan pereda nyeri, seperti nyeri haid dan sakit gigi. Paracetamol tersedia dalam bentuk tablet 500 mg dan 600 mg, sirup, drop, suppositoria, dan infus.', '60d02b7899698.png'),
(27, 'strip', 'Obat', 'MIXAGRIP', '4.590', 'Mixagrip bermanfaat untuk meredakan gejala flu dan batuk pada orang dewasa dan anak-anak. Mixagrip tersedia dalam varian Mixagrip Flu dan Mixagrip Flu &amp; Batuk.', '60d02d9424c83.png'),
(28, 'PC', 'Beauty Care', 'BEDAK MARCKS', '18.084', 'Bedak Marcks memiliki kandungan salicylic acid yang berfungsi untuk mengatasi jerawat yang tumbuh pada kulit wajah.  Agar tidak merasa ragu, ketahui kandungan sebelum menggunakannya', '60d02f3b73fbc.png'),
(29, 'Botol', 'Beauty Care', 'CETHAPIL', '97.214', 'Cetaphil Gentle Skin Cleanser adalah pembersih yang tepat untuk kulit kering bahkan sensitif. Formulanya lembut tanpa busa berlebih dan tanpa tambahan pewangi menjadikan kulitmu jadi bersih dan tetap lembap.', '60d032189abe4.png'),
(30, 'Dus', 'Nutrisi', 'NATUR E 32 KAPSUL', '35.072', 'Natur-E adalah suplemen yang bermanfaat untuk merawat kesehatan kulit. Suplemen ini mengandung vitamin E yang berasal dari bahan alami, seperti minyak biji gandum dan minyak biji bunga matahari.', '60d033968df0c.jpg'),
(31, 'strip', 'Alat Kesehatan', 'SENSITIF STRIP TES KEHAMILAN', '25.080', 'Sensitif Test Kehamilan merupakan alat uji kehamilan (Testpack) yang berbentuk stik yang dirancang untuk mengetahui sampel urin yang diproduksi sel telur yang telah dibuahi dan menempel di dinding rahim', '60d0350231bb4.jpg'),
(32, 'PC', 'Alat Kesehatan', 'MASKER', '7.260', 'Masker yang dilengkapi dengan 3 lapis filter, membantu melindungi dari partikel makro dan debu. - Anjuran Pakai Saat gejala flu Saat dekat bayi Saat bepergian. - Lapisan dalam yang nyaman bersentuhan dengan kulit dan menyalurkan udara bersih', '60d0368320519.jpg'),
(33, 'PC', 'Home Diagnostic', 'ACCU-CHECK ACTIVE', '501.600', '- Accu-Chek Active merupakan glukometer utama untuk diabetisi - Bisa untuk semua sampel darah ( kapiler, vena, arteri, neonatus ) - Volume sampel darah hanya 1-2 mikroliter - Cepat, hanya 5 detik - Desain trendy - Auto-on', '60d0378413e4d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `alamat`, `foto`) VALUES
(1, 'Darul', 'Laki-laki', 'Bangkalan', '609428f203bc8.jpg'),
(20, 'Fitri', 'Perempuan', 'Surabaya', '60942b8641c6c.jpg'),
(21, 'Munir', 'laki-laki', 'jakarta', '60942bf1dfb4d.jpg'),
(22, 'Adella', 'perempuan', 'Mojokerto', '60d03d1a611a8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(0, 'oktavia', 'user', '$2y$10$ayoUr3Ybd3hRf0LCRt2fU.HflUo3aLYvjSKDb/2zjzjwv0YlrbXVC'),
(5, 'piyok', 'oktaa', '123'),
(6, 'piyok', 'ichi', '$2y$10$qFbvta1YE0ehacZiMJcH7OqpI4PzqxOJV06mOubyz6eAhHRkrUiAG'),
(8, 'qa', 'pipiw', '$2y$10$UFXEBxHSLEvEGgyXVTu45eCHSyGublElvmZxKr43x48IDEOabSyEG'),
(9, 'via', 'oktaviaqa', '$2y$10$NEAMmiu.IUj5z3D9Nyr4V.q12m8q.q8rEqxS62lpPVx/UokhO89KK'),
(10, 'viaaaa', 'oktahaha', '$2y$10$0AKDC2Rv1ecCs7HgxGIxo.24EJAk9htjcrE5VpqmgS1/Q31mkYHOu'),
(11, 'hehew', 'hihi', '$2y$10$2lOGRwd/dGjGwVmWI7i2tu7Wa/VYypGEetydUjkGjN1oUELv0PxKu'),
(12, 'oktavia', 'oktaqa', '$2y$10$GreO27GjocYjmx1loC195eBaGP7DY/2KMniib7J3vzKdDWPampQf.'),
(13, 'oktaviaq.aaa', 'viaaaa', '$2y$10$KMw1HKoEMp3aMpnt.q35sOUeqVQyKYZpBV7Ojk0s5vGOQUb0EZ6MG'),
(14, 'adella', 'adellat', '$2y$10$ACl95EU3FgK16I6A/Aqe0e4/04NT3eBbZJMU/yK5fsS3Pw22i1Zhe'),
(15, 'hidayatur', 'hdytr', '$2y$10$SyXf8Agoi9CaB/ZV5m8Kw.K9.D6lWCuh8wWLF2pL.GAsQCFJvM10q'),
(16, 'fitri', 'fitri1', '$2y$10$47BROz1V3qUmav6p3437o.SpSZmTQSYn22SjppB6yn1uZrpv/3GB.'),
(17, 'okta', 'hehew', '$2y$10$OjT/so9Tvs5zMgpPKvF/Yun5Q2UqlZFJlJrws37TlouzTHZly3tB6'),
(18, 'piyok', 'ppp', '$2y$10$2hbpsN87LgPiJwY5UWq0N.jfSvknlrQDGfKKq8C6/ffYc/w/iVgNu'),
(19, 'oktavia', 'okta', '$2y$10$lVkk6mLsfRtqWl2gXP51Eekn.1ULcYjABKvHfImI6evC83TcnrS.O'),
(20, 'ww', 'aaa', '$2y$10$/uInOsAHEjXzfT1wUZmJN.TLKt52QBs/8oAvcRhME4cxlH5fwn8oK'),
(21, '', '', '$2y$10$DblHJvYgLyTWJtqhYlPV5O2g.lzbbIPozC8yhVpaqyQzTkhy6nytu'),
(22, 'oktavia', 'www', '$2y$10$S.ASJwMaV.iX4HCR8uNAz.gbNYBeWzGmbSPK58bYB64KGeiW.GQsu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
