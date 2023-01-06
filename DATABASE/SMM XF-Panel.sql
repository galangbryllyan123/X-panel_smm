-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 11, 2016 at 08:01 PM
-- Server version: 5.1.73-community
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `panelxf_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE IF NOT EXISTS `api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apikey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `apikey`, `nama`, `username`) VALUES
(1, '6a2684afea93c224839ebaee1f7f27ad', 'Al Fiin', 'Pro'),
(2, '43679f844e2fb93860fe99d545a991d8', 'Rama Dot ID', 'rama01'),
(3, '4b3a47df34256a1421b9473f024b756c', 'Dolly Hamonangan', 'Dolly7291'),
(4, '1ac808deb0161f435f19bc66d60a2c0d', 'Al Fiin', 'admin.alfiin'),
(5, '4ed0932eae6d8eb2633c3fce9c80903c', 'Muhammad Ripat', 'vppanel'),
(6, '552a045149a13ac093239dddbead1082', 'Steven Stone Kane', 'steven'),
(7, '2be44030b7cd059cae0ee5502c374f6e', 'Nuzul', 'nuzul'),
(8, 'd18761f8dd3287d8aa05710b0463b32a', 'Muhammad Ripat', 'admin.ripat'),
(9, 'a9bc0180913a76a4cde0496bc7928fdc', 'Arief Richman', 'admin.mv'),
(10, '4710031767c732df1b863634575e261b', 'Fariz', 'Fariz'),
(11, '9804024f95cb8a2dbf204484df204730', 'Muhammad Faisal', 'faisal');

-- --------------------------------------------------------

--
-- Table structure for table `generator`
--

CREATE TABLE IF NOT EXISTS `generator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` int(20) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `aktif` varchar(200) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `historyall`
--

CREATE TABLE IF NOT EXISTS `historyall` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `pembeli` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `barang` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Proccess','Success','Gagal') COLLATE utf8_swedish_ci NOT NULL,
  `data` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=409 ;

--
-- Dumping data for table `historyall`
--

INSERT INTO `historyall` (`id`, `no`, `pembeli`, `barang`, `harga`, `status`, `data`, `tanggal`) VALUES
(398, 'XK5D8', 'adityashop', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '19000', 'Proccess', ' Devidfacayprasetya', '2016-05-06'),
(397, 'W8063', 'adityashop', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '1900', 'Proccess', ' adit23_shop', '2016-05-06'),
(396, 'KV60Y', 'aryl123', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '2280', 'Proccess', ' tamaomakito87', '2016-05-06'),
(395, 'H7O64', 'aryl123', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '2280', 'Proccess', ' tamaomakito87', '2016-05-06'),
(394, '2V9V6', 'aryl123', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '2280', 'Proccess', ' tamaomakito87', '2016-05-06'),
(393, 'F6U86', 'adityashop', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '3800', 'Proccess', ' adit23_shop', '2016-05-06'),
(392, '2H246', 'Muhammad Varrel', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '1900', 'Proccess', ' varrel99', '2016-05-06'),
(391, '01UOX', 'Aditya Firmansyah', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '1900', 'Proccess', ' aqshall_f', '2016-05-06'),
(390, 'A2Q4C', 'Iqbal Ramatullah', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '1900', 'Proccess', ' https://www.instagram.com/iqbalrahmatullah2/', '2016-05-06'),
(389, 'OFW40', 'Aditya Firmansyah', 'Instagram Followers Super Fast Server 1 | Max 8000 Followers', '1900', 'Proccess', ' adit23_shop', '2016-05-06'),
(388, '9521', 'Farid David Sisances', '1000 Follower Instagram Code 145', '27000', 'Proccess', '  dicky.ibrahims', '2016-05-05'),
(387, '8063', 'Bimo Alif Prayudha', '700 Follower Instagram Code 145', '18900', 'Proccess', '  bimo009', '2016-05-05'),
(386, '6886', 'Luthfi', '100 Like Instagram Code 126', '1300', 'Proccess', ' https://www.instagram.com/luthfi_akmal_aji/', '2016-05-04'),
(385, '7811', 'Luthfi', '200 Follower Instagram Code 145', '5400', 'Proccess', '  luthfi_akmal_aji', '2016-05-04'),
(384, '3778', 'Luthfi', '100 Like Facebook Code 80', '2300', 'Proccess', ' https://m.facebook.com/profile.php?ref_component=mbasic_home_header', '2016-05-04'),
(383, '1518', 'Aditya Firmansyah', '200 Follower Instagram Code 145', '5400', 'Proccess', '  adit23_shop', '2016-05-04'),
(382, '1201', 'Aditya Firmansyah', '300 Follower Instagram Code 145', '8100', 'Proccess', '  ekaa_nurmalia_putri', '2016-05-03'),
(381, '8163', 'Aryl Luftian', '100 Follower Instagram Code 145', '2700', 'Proccess', '  tamaomakito87', '2016-05-02'),
(380, '3608', 'Aryl Luftian', '200 Follower Instagram Code 145', '5400', 'Proccess', '  tamaomakito87', '2016-05-02'),
(379, '6464', 'Aditya Firmansyah', '200 Follower Instagram Code 106', '5600', 'Proccess', '  adit23_shop', '2016-05-01'),
(378, '1952', 'Aditya Firmansyah', '100 Follower Instagram Code 145', '2700', 'Proccess', '  adit23_shop', '2016-04-30'),
(377, '5467', 'Aditya Firmansyah', '500 Follower Instagram Code 145', '13500', 'Proccess', '  adit23_shop', '2016-04-30'),
(376, '1181', 'Aditya Firmansyah', '100 Follower Instagram Code 102', '2700', 'Proccess', '  iqbalrahmatullah2', '2016-04-30'),
(375, '9558', 'Aditya Firmansyah', '1000 Follower Instagram Code 145', '27000', 'Proccess', '  eaea', '2016-04-30'),
(374, '6869', 'Aditya Firmansyah', '100 Follower Instagram Code 145', '2700', 'Proccess', '  adit23_shop', '2016-04-30'),
(373, '8043', 'Aditya Firmansyah', '100 Follower Instagram Code 145', '2700', 'Proccess', '  adit23_shop', '2016-04-30'),
(399, '975959', 'admin.mv', 'Facebook Photo/Post Likes Fast', '19000', '', 'Username :  Jumlah : 1000', '2016-05-10'),
(400, '223546', 'admin.mv', 'Instagram Followers Super Fast Server 1', '1600', '', 'Username :  Jumlah : 100', '2016-05-10'),
(401, '336883', 'admin.mv', 'Instagram Followers HQ Fast Server 3', '1900', '', 'Username :  Jumlah : 100', '2016-05-10'),
(402, '761308', 'admin.mv', 'Instagram Followers HQ Fast Server 2', '1700', '', 'Username :  Jumlah : 100', '2016-05-10'),
(403, '602132', 'Fariz', 'Instagram Followers Super Fast Server 1', '1800', '', 'Username :  Jumlah : 100', '2016-05-10'),
(404, '439782', 'admin.mv', 'Instagram Likes Super Fast', '2000', '', 'Username :  Jumlah : 100', '2016-05-11'),
(405, '531011', 'admin.mv', 'Facebook Photo/Post Likes Fast', '1800', '', 'Username :  Jumlah : 100', '2016-05-11'),
(406, '927826', 'admin.mv', 'Instagram Followers Super Fast Server 1', '1800', '', 'Username :  Jumlah : 100', '2016-05-11'),
(407, '355902', 'admin.mv', 'Facebook Photo/Post Likes Fast', '1800', '', 'Username :  Jumlah : 100', '2016-05-11'),
(408, '583405', 'admin.mv', 'Instagram Followers Super Fast Server 1', '2160', '', 'Username :  Jumlah : 120', '2016-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `level` enum('Admin','Reseller','Agen','Member','MemberFree','MemberVip','Banned') COLLATE utf8_swedish_ci NOT NULL,
  `saldo` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `poin` bigint(100) NOT NULL,
  `uplink` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `facebook`, `username`, `password`, `nama`, `level`, `saldo`, `poin`, `uplink`) VALUES
(5, '100010413010910', 'faisal', 'faisal123', 'Muhammad Faisal', 'Member', '4000', 0, 'Arief Richman'),
(65, '1', 'Seller323', 'Cardingpepek323', 'Seller', 'Member', '5000', 2, 'admin.mv'),
(64, '100006597093097', 'rifki', 'rifkiaja', 'Muhammad Rifki', 'Member', '5000', 2, 'admin.mv'),
(63, '1', 'radja', 'radja110297', 'Radja Manopo', 'Member', '5000', 2, 'admin.mv'),
(62, '100011585198765', 'ananda', 'ananda1221', 'Ananda Come Back', 'Member', '5000', 2, 'admin.mv'),
(61, '100011585198765', 'Fariz', 'Gatau', 'Fariz', 'Agen', '32206', 2, 'admin.mv'),
(60, '100010413010910', 'admin.mv', 'XFPANEL123', 'Arief Richman', 'Admin', '199882863', 123123122123, 'HOSTING');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
