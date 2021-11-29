-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2019 at 10:27 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bptik`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`username`, `password`, `tipe`) VALUES
('A001', 'A001', 'admin'),
('P001', 'P001', 'peserta'),
('P005', 'P0055', 'peserta');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_domisili`
--

CREATE TABLE `alamat_domisili` (
  `id_domisili` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `kd_pos` varchar(10) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_domisili`
--

INSERT INTO `alamat_domisili` (`id_domisili`, `id_prov`, `id_kab`, `kd_pos`, `alamat`) VALUES
(1, 11, 1102, '1234', 'aaaa'),
(2, 11, 1107, '423432', 'alamat'),
(3, 33, 3327, 'pos123', '321'),
(4, 32, 3206, 'pos123', '321'),
(5, 32, 3214, '4234', 'ppopop'),
(6, 36, 3602, '12321', 'banten');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_ktp`
--

CREATE TABLE `alamat_ktp` (
  `id_ktp` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `kd_pos` varchar(10) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_ktp`
--

INSERT INTO `alamat_ktp` (`id_ktp`, `id_prov`, `id_kab`, `kd_pos`, `alamat`) VALUES
(1, 1101, 11, '123', 'asda'),
(2, 11, 1107, '123', 'Aaaa'),
(3, 11, 1109, 'poss', 'ASDAS'),
(4, 32, 3209, 'poss', 'asd'),
(5, 11, 1102, '123', 'alamat'),
(6, 32, 3202, '123', 'jkt');

-- --------------------------------------------------------

--
-- Table structure for table `desk_program`
--

CREATE TABLE `desk_program` (
  `id_desk` int(11) NOT NULL,
  `kd_pelatihan` varchar(5) NOT NULL,
  `desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desk_program`
--

INSERT INTO `desk_program` (`id_desk`, `kd_pelatihan`, `desk`) VALUES
(12, '12334', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `d_pelatihan`
--

CREATE TABLE `d_pelatihan` (
  `kd_pelatihan` varchar(12) NOT NULL,
  `judul_pelatihan` varchar(50) NOT NULL,
  `sts` varchar(5) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `gelombang` int(15) NOT NULL,
  `id_soal` int(15) NOT NULL,
  `waktu_pengerjaan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_pelatihan`
--

INSERT INTO `d_pelatihan` (`kd_pelatihan`, `judul_pelatihan`, `sts`, `tgl_buka`, `tgl_tutup`, `tgl_pelaksanaan`, `tgl_selesai`, `gelombang`, `id_soal`, `waktu_pengerjaan`) VALUES
('1', 'Programer', 'umum', '2019-11-06', '2019-11-07', '2019-11-08', '2019-11-09', 1, 11, 20),
('2', 'Pelatihan Junior Office Application', 'umum', '2019-12-05', '2019-12-06', '2019-12-09', '2019-12-11', 1, 11, 15),
('3', 'Pelatihan Junior Web Programming', 'umum', '2019-12-05', '2019-12-06', '2019-12-08', '2019-12-10', 1, 11, 20),
('4', 'Pelatihan Teknisi Muda Jaringan Komputer', 'umum', '2019-12-05', '2019-12-07', '2019-12-08', '2019-12-10', 1, 11, 20),
('5', 'Programming Essentials in Python', 'umum', '2019-12-05', '2019-12-07', '2019-12-08', '2019-12-10', 1, 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `kd_peserta` int(11) NOT NULL,
  `j_benar` int(11) NOT NULL,
  `j_salah` int(11) NOT NULL,
  `j_kososng` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal`, `kd_peserta`, `j_benar`, `j_salah`, `j_kososng`) VALUES
(1, 11, 5, 6, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `jenjang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `jenjang`) VALUES
(11, 'SMA'),
(12, 'SMK'),
(13, 'D1'),
(14, 'D2'),
(15, 'D3'),
(16, 'S1'),
(17, 'S2'),
(18, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `nm_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_jenjang`, `nm_jurusan`) VALUES
(1101, 11, 'IPA'),
(1102, 11, 'IPS'),
(1201, 12, 'Rekayasa Perangkat Lunak'),
(1202, 12, 'Teknik Komputer jaringan'),
(1203, 12, 'Multimedia'),
(1204, 12, 'Akutansi'),
(1205, 12, 'Pemasaran');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `kabupaten` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `id_prov`, `kabupaten`) VALUES
(1101, 11, 'Kabupaten Simeulue\r'),
(1102, 11, 'Kabupaten Aceh Singkil\r'),
(1103, 11, 'Kabupaten Aceh Selatan\r'),
(1104, 11, 'Kabupaten Aceh Tenggara\r'),
(1105, 11, 'Kabupaten Aceh Timur\r'),
(1106, 11, 'Kabupaten Aceh Tengah\r'),
(1107, 11, 'Kabupaten Aceh Barat\r'),
(1108, 11, 'Kabupaten Aceh Besar\r'),
(1109, 11, 'Kabupaten Pidie\r'),
(1110, 11, 'Kabupaten Bireuen\r'),
(1111, 11, 'Kabupaten Aceh Utara\r'),
(1112, 11, 'Kabupaten Aceh Barat Daya\r'),
(1113, 11, 'Kabupaten Gayo Lues\r'),
(1114, 11, 'Kabupaten Aceh Tamiang\r'),
(1115, 11, 'Kabupaten Nagan Raya\r'),
(1116, 11, 'Kabupaten Aceh Jaya\r'),
(1117, 11, 'Kabupaten Bener Meriah\r'),
(1118, 11, 'Kabupaten Pidie Jaya\r'),
(1171, 11, 'Kota Banda Aceh\r'),
(1172, 11, 'Kota Sabang\r'),
(1173, 11, 'Kota Langsa\r'),
(1174, 11, 'Kota Lhokseumawe\r'),
(1175, 11, 'Kota Subulussalam\r'),
(1201, 12, 'Kabupaten Nias\r'),
(1202, 12, 'Kabupaten Mandailing Natal\r'),
(1203, 12, 'Kabupaten Tapanuli Selatan\r'),
(1204, 12, 'Kabupaten Tapanuli Tengah\r'),
(1205, 12, 'Kabupaten Tapanuli Utara\r'),
(1206, 12, 'Kabupaten Toba Samosir\r'),
(1207, 12, 'Kabupaten Labuhan Batu\r'),
(1208, 12, 'Kabupaten Asahan\r'),
(1209, 12, 'Kabupaten Simalungun\r'),
(1210, 12, 'Kabupaten Dairi\r'),
(1211, 12, 'Kabupaten Karo\r'),
(1212, 12, 'Kabupaten Deli Serdang\r'),
(1213, 12, 'Kabupaten Langkat\r'),
(1214, 12, 'Kabupaten Nias Selatan\r'),
(1215, 12, 'Kabupaten Humbang Hasundutan\r'),
(1216, 12, 'Kabupaten Pakpak Bharat\r'),
(1217, 12, 'Kabupaten Samosir\r'),
(1218, 12, 'Kabupaten Serdang Bedagai\r'),
(1219, 12, 'Kabupaten Batu Bara\r'),
(1220, 12, 'Kabupaten Padang Lawas Utara\r'),
(1221, 12, 'Kabupaten Padang Lawas\r'),
(1222, 12, 'Kabupaten Labuhan Batu Selatan\r'),
(1223, 12, 'Kabupaten Labuhan Batu Utara\r'),
(1224, 12, 'Kabupaten Nias Utara\r'),
(1225, 12, 'Kabupaten Nias Barat\r'),
(1271, 12, 'Kota Sibolga\r'),
(1272, 12, 'Kota Tanjung Balai\r'),
(1273, 12, 'Kota Pematang Siantar\r'),
(1274, 12, 'Kota Tebing Tinggi\r'),
(1275, 12, 'Kota Medan\r'),
(1276, 12, 'Kota Binjai\r'),
(1277, 12, 'Kota Padangsidimpuan\r'),
(1278, 12, 'Kota Gunungsitoli\r'),
(1301, 13, 'Kabupaten Kepulauan Mentawai\r'),
(1302, 13, 'Kabupaten Pesisir Selatan\r'),
(1303, 13, 'Kabupaten Solok\r'),
(1304, 13, 'Kabupaten Sijunjung\r'),
(1305, 13, 'Kabupaten Tanah Datar\r'),
(1306, 13, 'Kabupaten Padang Pariaman\r'),
(1307, 13, 'Kabupaten Agam\r'),
(1308, 13, 'Kabupaten Lima Puluh Kota\r'),
(1309, 13, 'Kabupaten Pasaman\r'),
(1310, 13, 'Kabupaten Solok Selatan\r'),
(1311, 13, 'Kabupaten Dharmasraya\r'),
(1312, 13, 'Kabupaten Pasaman Barat\r'),
(1371, 13, 'Kota Padang\r'),
(1372, 13, 'Kota Solok\r'),
(1373, 13, 'Kota Sawah Lunto\r'),
(1374, 13, 'Kota Padang Panjang\r'),
(1375, 13, 'Kota Bukittinggi\r'),
(1376, 13, 'Kota Payakumbuh\r'),
(1377, 13, 'Kota Pariaman\r'),
(1401, 14, 'Kabupaten Kuantan Singingi\r'),
(1402, 14, 'Kabupaten Indragiri Hulu\r'),
(1403, 14, 'Kabupaten Indragiri Hilir\r'),
(1404, 14, 'Kabupaten Pelalawan\r'),
(1405, 14, 'Kabupaten S I A K\r'),
(1406, 14, 'Kabupaten Kampar\r'),
(1407, 14, 'Kabupaten Rokan Hulu\r'),
(1408, 14, 'Kabupaten Bengkalis\r'),
(1409, 14, 'Kabupaten Rokan Hilir\r'),
(1410, 14, 'Kabupaten Kepulauan Meranti\r'),
(1471, 14, 'Kota Pekanbaru\r'),
(1473, 14, 'Kota D U M A I\r'),
(1501, 15, 'Kabupaten Kerinci\r'),
(1502, 15, 'Kabupaten Merangin\r'),
(1503, 15, 'Kabupaten Sarolangun\r'),
(1504, 15, 'Kabupaten Batang Hari\r'),
(1505, 15, 'Kabupaten Muaro Jambi\r'),
(1506, 15, 'Kabupaten Tanjung Jabung Timur\r'),
(1507, 15, 'Kabupaten Tanjung Jabung Barat\r'),
(1508, 15, 'Kabupaten Tebo\r'),
(1509, 15, 'Kabupaten Bungo\r'),
(1571, 15, 'Kota Jambi\r'),
(1572, 15, 'Kota Sungai Penuh\r'),
(1601, 16, 'Kabupaten Ogan Komering Ulu\r'),
(1602, 16, 'Kabupaten Ogan Komering Ilir\r'),
(1603, 16, 'Kabupaten Muara Enim\r'),
(1604, 16, 'Kabupaten Lahat\r'),
(1605, 16, 'Kabupaten Musi Rawas\r'),
(1606, 16, 'Kabupaten Musi Banyuasin\r'),
(1607, 16, 'Kabupaten Banyu Asin\r'),
(1608, 16, 'Kabupaten Ogan Komering Ulu Selatan\r'),
(1609, 16, 'Kabupaten Ogan Komering Ulu Timur\r'),
(1610, 16, 'Kabupaten Ogan Ilir\r'),
(1611, 16, 'Kabupaten Empat Lawang\r'),
(1671, 16, 'Kota Palembang\r'),
(1672, 16, 'Kota Prabumulih\r'),
(1673, 16, 'Kota Pagar Alam\r'),
(1674, 16, 'Kota Lubuklinggau\r'),
(1701, 17, 'Kabupaten Bengkulu Selatan\r'),
(1702, 17, 'Kabupaten Rejang Lebong\r'),
(1703, 17, 'Kabupaten Bengkulu Utara\r'),
(1704, 17, 'Kabupaten Kaur\r'),
(1705, 17, 'Kabupaten Seluma\r'),
(1706, 17, 'Kabupaten Mukomuko\r'),
(1707, 17, 'Kabupaten Lebong\r'),
(1708, 17, 'Kabupaten Kepahiang\r'),
(1709, 17, 'Kabupaten Bengkulu Tengah\r'),
(1771, 17, 'Kota Bengkulu\r'),
(1801, 18, 'Kabupaten Lampung Barat\r'),
(1802, 18, 'Kabupaten Tanggamus\r'),
(1803, 18, 'Kabupaten Lampung Selatan\r'),
(1804, 18, 'Kabupaten Lampung Timur\r'),
(1805, 18, 'Kabupaten Lampung Tengah\r'),
(1806, 18, 'Kabupaten Lampung Utara\r'),
(1807, 18, 'Kabupaten Way Kanan\r'),
(1808, 18, 'Kabupaten Tulangbawang\r'),
(1809, 18, 'Kabupaten Pesawaran\r'),
(1810, 18, 'Kabupaten Pringsewu\r'),
(1811, 18, 'Kabupaten Mesuji\r'),
(1812, 18, 'Kabupaten Tulang Bawang Barat\r'),
(1871, 18, 'Kota Bandar Lampung\r'),
(1872, 18, 'Kota Metro\r'),
(1901, 19, 'Kabupaten Bangka\r'),
(1902, 19, 'Kabupaten Belitung\r'),
(1903, 19, 'Kabupaten Bangka Barat\r'),
(1904, 19, 'Kabupaten Bangka Tengah\r'),
(1905, 19, 'Kabupaten Bangka Selatan\r'),
(1906, 19, 'Kabupaten Belitung Timur\r'),
(1971, 19, 'Kota Pangkal Pinang\r'),
(2101, 21, 'Kabupaten Karimun\r'),
(2102, 21, 'Kabupaten Bintan\r'),
(2103, 21, 'Kabupaten Natuna\r'),
(2104, 21, 'Kabupaten Lingga\r'),
(2105, 21, 'Kabupaten Kepulauan Anambas\r'),
(2171, 21, 'Kota B A T A M\r'),
(2172, 21, 'Kota Tanjung Pinang\r'),
(3101, 31, 'Kabupaten Kepulauan Seribu\r'),
(3171, 31, 'Kota Jakarta Selatan\r'),
(3172, 31, 'Kota Jakarta Timur\r'),
(3173, 31, 'Kota Jakarta Pusat\r'),
(3174, 31, 'Kota Jakarta Barat\r'),
(3175, 31, 'Kota Jakarta Utara\r'),
(3201, 32, 'Kabupaten Bogor\r'),
(3202, 32, 'Kabupaten Sukabumi\r'),
(3203, 32, 'Kabupaten Cianjur\r'),
(3204, 32, 'Kabupaten Bandung\r'),
(3205, 32, 'Kabupaten Garut\r'),
(3206, 32, 'Kabupaten Tasikmalaya\r'),
(3207, 32, 'Kabupaten Ciamis\r'),
(3208, 32, 'Kabupaten Kuningan\r'),
(3209, 32, 'Kabupaten Cirebon\r'),
(3210, 32, 'Kabupaten Majalengka\r'),
(3211, 32, 'Kabupaten Sumedang\r'),
(3212, 32, 'Kabupaten Indramayu\r'),
(3213, 32, 'Kabupaten Subang\r'),
(3214, 32, 'Kabupaten Purwakarta\r'),
(3215, 32, 'Kabupaten Karawang\r'),
(3216, 32, 'Kabupaten Bekasi\r'),
(3217, 32, 'Kabupaten Bandung Barat\r'),
(3271, 32, 'Kota Bogor\r'),
(3272, 32, 'Kota Sukabumi\r'),
(3273, 32, 'Kota Bandung\r'),
(3274, 32, 'Kota Cirebon\r'),
(3275, 32, 'Kota Bekasi\r'),
(3276, 32, 'Kota Depok\r'),
(3277, 32, 'Kota Cimahi\r'),
(3278, 32, 'Kota Tasikmalaya\r'),
(3279, 32, 'Kota Banjar\r'),
(3301, 33, 'Kabupaten Cilacap\r'),
(3302, 33, 'Kabupaten Banyumas\r'),
(3303, 33, 'Kabupaten Purbalingga\r'),
(3304, 33, 'Kabupaten Banjarnegara\r'),
(3305, 33, 'Kabupaten Kemen\r'),
(3306, 33, 'Kabupaten Purworejo\r'),
(3307, 33, 'Kabupaten Wonosobo\r'),
(3308, 33, 'Kabupaten Magelang\r'),
(3309, 33, 'Kabupaten Boyolali\r'),
(3310, 33, 'Kabupaten Klaten\r'),
(3311, 33, 'Kabupaten Sukoharjo\r'),
(3312, 33, 'Kabupaten Wonogiri\r'),
(3313, 33, 'Kabupaten Karanganyar\r'),
(3314, 33, 'Kabupaten Sragen\r'),
(3315, 33, 'Kabupaten Grobogan\r'),
(3316, 33, 'Kabupaten Blora\r'),
(3317, 33, 'Kabupaten Rembang\r'),
(3318, 33, 'Kabupaten Pati\r'),
(3319, 33, 'Kabupaten Kudus\r'),
(3320, 33, 'Kabupaten Jepara\r'),
(3321, 33, 'Kabupaten Demak\r'),
(3322, 33, 'Kabupaten Semarang\r'),
(3323, 33, 'Kabupaten Temanggung\r'),
(3324, 33, 'Kabupaten Kendal\r'),
(3325, 33, 'Kabupaten Batang\r'),
(3326, 33, 'Kabupaten Pekalongan\r'),
(3327, 33, 'Kabupaten Pemalang\r'),
(3328, 33, 'Kabupaten Tegal\r'),
(3329, 33, 'Kabupaten Brebes\r'),
(3371, 33, 'Kota Magelang\r'),
(3372, 33, 'Kota Surakarta\r'),
(3373, 33, 'Kota Salatiga\r'),
(3374, 33, 'Kota Semarang\r'),
(3375, 33, 'Kota Pekalongan\r'),
(3376, 33, 'Kota Tegal\r'),
(3401, 34, 'Kabupaten Kulon Progo\r'),
(3402, 34, 'Kabupaten Bantul\r'),
(3403, 34, 'Kabupaten Gunung Kidul\r'),
(3404, 34, 'Kabupaten Sleman\r'),
(3471, 34, 'Kota Yogyakarta\r'),
(3501, 35, 'Kabupaten Pacitan\r'),
(3502, 35, 'Kabupaten Ponorogo\r'),
(3503, 35, 'Kabupaten Trenggalek\r'),
(3504, 35, 'Kabupaten Tulungagung\r'),
(3505, 35, 'Kabupaten Blitar\r'),
(3506, 35, 'Kabupaten Kediri\r'),
(3507, 35, 'Kabupaten Malang\r'),
(3508, 35, 'Kabupaten Lumajang\r'),
(3509, 35, 'Kabupaten Jember\r'),
(3510, 35, 'Kabupaten Banyuwangi\r'),
(3511, 35, 'Kabupaten Bondowoso\r'),
(3512, 35, 'Kabupaten Situbondo\r'),
(3513, 35, 'Kabupaten Probolinggo\r'),
(3514, 35, 'Kabupaten Pasuruan\r'),
(3515, 35, 'Kabupaten Sidoarjo\r'),
(3516, 35, 'Kabupaten Mojokerto\r'),
(3517, 35, 'Kabupaten Jombang\r'),
(3518, 35, 'Kabupaten Nganjuk\r'),
(3519, 35, 'Kabupaten Madiun\r'),
(3520, 35, 'Kabupaten Magetan\r'),
(3521, 35, 'Kabupaten Ngawi\r'),
(3522, 35, 'Kabupaten Bojonegoro\r'),
(3523, 35, 'Kabupaten Tuban\r'),
(3524, 35, 'Kabupaten Lamongan\r'),
(3525, 35, 'Kabupaten Gresik\r'),
(3526, 35, 'Kabupaten Bangkalan\r'),
(3527, 35, 'Kabupaten Sampang\r'),
(3528, 35, 'Kabupaten Pamekasan\r'),
(3529, 35, 'Kabupaten Sumenep\r'),
(3571, 35, 'Kota Kediri\r'),
(3572, 35, 'Kota Blitar\r'),
(3573, 35, 'Kota Malang\r'),
(3574, 35, 'Kota Probolinggo\r'),
(3575, 35, 'Kota Pasuruan\r'),
(3576, 35, 'Kota Mojokerto\r'),
(3577, 35, 'Kota Madiun\r'),
(3578, 35, 'Kota Surabaya\r'),
(3579, 35, 'Kota Batu\r'),
(3601, 36, 'Kabupaten Pandeglang\r'),
(3602, 36, 'Kabupaten Lebak\r'),
(3603, 36, 'Kabupaten Tangerang\r'),
(3604, 36, 'Kabupaten Serang\r'),
(3671, 36, 'Kota Tangerang\r'),
(3672, 36, 'Kota Cilegon\r'),
(3673, 36, 'Kota Serang\r'),
(3674, 36, 'Kota Tangerang Selatan\r'),
(5101, 51, 'Kabupaten Jembrana\r'),
(5102, 51, 'Kabupaten Tabanan\r'),
(5103, 51, 'Kabupaten Badung\r'),
(5104, 51, 'Kabupaten Gianyar\r'),
(5105, 51, 'Kabupaten Klungkung\r'),
(5106, 51, 'Kabupaten Bangli\r'),
(5107, 51, 'Kabupaten Karang Asem\r'),
(5108, 51, 'Kabupaten Buleleng\r'),
(5171, 51, 'Kota Denpasar\r'),
(5201, 52, 'Kabupaten Lombok Barat\r'),
(5202, 52, 'Kabupaten Lombok Tengah\r'),
(5203, 52, 'Kabupaten Lombok Timur\r'),
(5204, 52, 'Kabupaten Sumbawa\r'),
(5205, 52, 'Kabupaten Dompu\r'),
(5206, 52, 'Kabupaten Bima\r'),
(5207, 52, 'Kabupaten Sumbawa Barat\r'),
(5208, 52, 'Kabupaten Lombok Utara\r'),
(5271, 52, 'Kota Mataram\r'),
(5272, 52, 'Kota Bima\r'),
(5301, 53, 'Kabupaten Sumba Barat\r'),
(5302, 53, 'Kabupaten Sumba Timur\r'),
(5303, 53, 'Kabupaten Kupang\r'),
(5304, 53, 'Kabupaten Timor Tengah Selatan\r'),
(5305, 53, 'Kabupaten Timor Tengah Utara\r'),
(5306, 53, 'Kabupaten Belu\r'),
(5307, 53, 'Kabupaten Alor\r'),
(5308, 53, 'Kabupaten Lembata\r'),
(5309, 53, 'Kabupaten Flores Timur\r'),
(5310, 53, 'Kabupaten Sikka\r'),
(5311, 53, 'Kabupaten Ende\r'),
(5312, 53, 'Kabupaten Ngada\r'),
(5313, 53, 'Kabupaten Manggarai\r'),
(5314, 53, 'Kabupaten Rote Ndao\r'),
(5315, 53, 'Kabupaten Manggarai Barat\r'),
(5316, 53, 'Kabupaten Sumba Tengah\r'),
(5317, 53, 'Kabupaten Sumba Barat Daya\r'),
(5318, 53, 'Kabupaten Nagekeo\r'),
(5319, 53, 'Kabupaten Manggarai Timur\r'),
(5320, 53, 'Kabupaten Sabu Raijua\r'),
(5371, 53, 'Kota Kupang\r'),
(6101, 61, 'Kabupaten Sambas\r'),
(6102, 61, 'Kabupaten Bengkayang\r'),
(6103, 61, 'Kabupaten Landak\r'),
(6104, 61, 'Kabupaten Pontianak\r'),
(6105, 61, 'Kabupaten Sanggau\r'),
(6106, 61, 'Kabupaten Ketapang\r'),
(6107, 61, 'Kabupaten Sintang\r'),
(6108, 61, 'Kabupaten Kapuas Hulu\r'),
(6109, 61, 'Kabupaten Sekadau\r'),
(6110, 61, 'Kabupaten Melawi\r'),
(6111, 61, 'Kabupaten Kayong Utara\r'),
(6112, 61, 'Kabupaten Kubu Raya\r'),
(6171, 61, 'Kota Pontianak\r'),
(6172, 61, 'Kota Singkawang\r'),
(6201, 62, 'Kabupaten Kotawaringin Barat\r'),
(6202, 62, 'Kabupaten Kotawaringin Timur\r'),
(6203, 62, 'Kabupaten Kapuas\r'),
(6204, 62, 'Kabupaten Barito Selatan\r'),
(6205, 62, 'Kabupaten Barito Utara\r'),
(6206, 62, 'Kabupaten Sukamara\r'),
(6207, 62, 'Kabupaten Lamandau\r'),
(6208, 62, 'Kabupaten Seruyan\r'),
(6209, 62, 'Kabupaten Katingan\r'),
(6210, 62, 'Kabupaten Pulang Pisau\r'),
(6211, 62, 'Kabupaten Gunung Mas\r'),
(6212, 62, 'Kabupaten Barito Timur\r'),
(6213, 62, 'Kabupaten Murung Raya\r'),
(6271, 62, 'Kota Palangka Raya\r'),
(6301, 63, 'Kabupaten Tanah Laut\r'),
(6302, 63, 'Kabupaten Kota Baru\r'),
(6303, 63, 'Kabupaten Banjar\r'),
(6304, 63, 'Kabupaten Barito Kuala\r'),
(6305, 63, 'Kabupaten Tapin\r'),
(6306, 63, 'Kabupaten Hulu Sungai Selatan\r'),
(6307, 63, 'Kabupaten Hulu Sungai Tengah\r'),
(6308, 63, 'Kabupaten Hulu Sungai Utara\r'),
(6309, 63, 'Kabupaten Tabalong\r'),
(6310, 63, 'Kabupaten Tanah Bumbu\r'),
(6311, 63, 'Kabupaten Balangan\r'),
(6371, 63, 'Kota Banjarmasin\r'),
(6372, 63, 'Kota Banjar Baru\r'),
(6401, 64, 'Kabupaten Paser\r'),
(6402, 64, 'Kabupaten Kutai Barat\r'),
(6403, 64, 'Kabupaten Kutai Kartanegara\r'),
(6404, 64, 'Kabupaten Kutai Timur\r'),
(6405, 64, 'Kabupaten Berau\r'),
(6406, 64, 'Kabupaten Malinau\r'),
(6407, 64, 'Kabupaten Bulungan\r'),
(6408, 64, 'Kabupaten Nunukan\r'),
(6409, 64, 'Kabupaten Penajam Paser Utara\r'),
(6410, 64, 'Kabupaten Tana Tidung\r'),
(6471, 64, 'Kota Balikpapan\r'),
(6472, 64, 'Kota Samarinda\r'),
(6473, 64, 'Kota Tarakan\r'),
(6474, 64, 'Kota Bontang\r'),
(7101, 71, 'Kabupaten Bolaang Mongondow\r'),
(7102, 71, 'Kabupaten Minahasa\r'),
(7103, 71, 'Kabupaten Kepulauan Sangihe\r'),
(7104, 71, 'Kabupaten Kepulauan Talaud\r'),
(7105, 71, 'Kabupaten Minahasa Selatan\r'),
(7106, 71, 'Kabupaten Minahasa Utara\r'),
(7107, 71, 'Kabupaten Bolaang Mongondow Utara\r'),
(7108, 71, 'Kabupaten Siau Tagulandang Biaro\r'),
(7109, 71, 'Kabupaten Minahasa Tenggara\r'),
(7110, 71, 'Kabupaten Bolaang Mongondow Selatan\r'),
(7111, 71, 'Kabupaten Bolaang Mongondow Timur\r'),
(7171, 71, 'Kota Manado\r'),
(7172, 71, 'Kota Bitung\r'),
(7173, 71, 'Kota Tomohon\r'),
(7174, 71, 'Kota Kotamobagu\r'),
(7201, 72, 'Kabupaten Banggai Kepulauan\r'),
(7202, 72, 'Kabupaten Banggai\r'),
(7203, 72, 'Kabupaten Morowali\r'),
(7204, 72, 'Kabupaten Poso\r'),
(7205, 72, 'Kabupaten Donggala\r'),
(7206, 72, 'Kabupaten Toli-Toli\r'),
(7207, 72, 'Kabupaten Buol\r'),
(7208, 72, 'Kabupaten Parigi Moutong\r'),
(7209, 72, 'Kabupaten Tojo Una-Una\r'),
(7210, 72, 'Kabupaten Sigi\r'),
(7271, 72, 'Kota Palu\r'),
(7301, 73, 'Kabupaten Kepulauan Selayar\r'),
(7302, 73, 'Kabupaten Bulukumba\r'),
(7303, 73, 'Kabupaten Bantaeng\r'),
(7304, 73, 'Kabupaten Jeneponto\r'),
(7305, 73, 'Kabupaten Takalar\r'),
(7306, 73, 'Kabupaten Gowa\r'),
(7307, 73, 'Kabupaten Sinjai\r'),
(7308, 73, 'Kabupaten Maros\r'),
(7309, 73, 'Kabupaten Pangkajene Dan Kepulauan\r'),
(7310, 73, 'Kabupaten Barru\r'),
(7311, 73, 'Kabupaten Bone\r'),
(7312, 73, 'Kabupaten Soppeng\r'),
(7313, 73, 'Kabupaten Wajo\r'),
(7314, 73, 'Kabupaten Sidenreng Rappang\r'),
(7315, 73, 'Kabupaten Pinrang\r'),
(7316, 73, 'Kabupaten Enrekang\r'),
(7317, 73, 'Kabupaten Luwu\r'),
(7318, 73, 'Kabupaten Tana Toraja\r'),
(7322, 73, 'Kabupaten Luwu Utara\r'),
(7325, 73, 'Kabupaten Luwu Timur\r'),
(7326, 73, 'Kabupaten Toraja Utara\r'),
(7371, 73, 'Kota Makassar\r'),
(7372, 73, 'Kota Pare-Pare\r'),
(7373, 73, 'Kota Palopo\r'),
(7401, 74, 'Kabupaten Buton\r'),
(7402, 74, 'Kabupaten Muna\r'),
(7403, 74, 'Kabupaten Konawe\r'),
(7404, 74, 'Kabupaten Kolaka\r'),
(7405, 74, 'Kabupaten Konawe Selatan\r'),
(7406, 74, 'Kabupaten Bombana\r'),
(7407, 74, 'Kabupaten Wakatobi\r'),
(7408, 74, 'Kabupaten Kolaka Utara\r'),
(7409, 74, 'Kabupaten Buton Utara\r'),
(7410, 74, 'Kabupaten Konawe Utara\r'),
(7471, 74, 'Kota Kendari\r'),
(7472, 74, 'Kota Baubau\r'),
(7501, 75, 'Kabupaten Boalemo\r'),
(7502, 75, 'Kabupaten Gorontalo\r'),
(7503, 75, 'Kabupaten Pohuwato\r'),
(7504, 75, 'Kabupaten Bone Bolango\r'),
(7505, 75, 'Kabupaten Gorontalo Utara\r'),
(7571, 75, 'Kota Gorontalo\r'),
(7601, 76, 'Kabupaten Majene\r'),
(7602, 76, 'Kabupaten Polewali Mandar\r'),
(7603, 76, 'Kabupaten Mamasa\r'),
(7604, 76, 'Kabupaten Mamuju\r'),
(7605, 76, 'Kabupaten Mamuju Utara\r'),
(8101, 81, 'Kabupaten Maluku Tenggara Barat\r'),
(8102, 81, 'Kabupaten Maluku Tenggara\r'),
(8103, 81, 'Kabupaten Maluku Tengah\r'),
(8104, 81, 'Kabupaten Buru\r'),
(8105, 81, 'Kabupaten Kepulauan Aru\r'),
(8106, 81, 'Kabupaten Seram Bagian Barat\r'),
(8107, 81, 'Kabupaten Seram Bagian Timur\r'),
(8108, 81, 'Kabupaten Maluku Barat Daya\r'),
(8109, 81, 'Kabupaten Buru Selatan\r'),
(8171, 81, 'Kota Ambon\r'),
(8172, 81, 'Kota Tual\r'),
(8201, 82, 'Kabupaten Halmahera Barat\r'),
(8202, 82, 'Kabupaten Halmahera Tengah\r'),
(8203, 82, 'Kabupaten Kepulauan Sula\r'),
(8204, 82, 'Kabupaten Halmahera Selatan\r'),
(8205, 82, 'Kabupaten Halmahera Utara\r'),
(8206, 82, 'Kabupaten Halmahera Timur\r'),
(8207, 82, 'Kabupaten Pulau Morotai\r'),
(8271, 82, 'Kota Ternate\r'),
(8272, 82, 'Kota Tidore Kepulauan\r'),
(9101, 91, 'Kabupaten Fakfak\r'),
(9102, 91, 'Kabupaten Kaimana\r'),
(9103, 91, 'Kabupaten Teluk Wondama\r'),
(9104, 91, 'Kabupaten Teluk Bintuni\r'),
(9105, 91, 'Kabupaten Manokwari\r'),
(9106, 91, 'Kabupaten Sorong Selatan\r'),
(9107, 91, 'Kabupaten Sorong\r'),
(9108, 91, 'Kabupaten Raja Ampat\r'),
(9109, 91, 'Kabupaten Tambrauw\r'),
(9110, 91, 'Kabupaten Maybrat\r'),
(9171, 91, 'Kota Sorong\r'),
(9401, 94, 'Kabupaten Merauke\r'),
(9402, 94, 'Kabupaten Jayawijaya\r'),
(9403, 94, 'Kabupaten Jayapura\r'),
(9404, 94, 'Kabupaten Nabire\r'),
(9408, 94, 'Kabupaten Kepulauan Yapen\r'),
(9409, 94, 'Kabupaten Biak Numfor\r'),
(9410, 94, 'Kabupaten Paniai\r'),
(9411, 94, 'Kabupaten Puncak Jaya\r'),
(9412, 94, 'Kabupaten Mimika\r'),
(9413, 94, 'Kabupaten Boven Digoel\r'),
(9414, 94, 'Kabupaten Mappi\r'),
(9415, 94, 'Kabupaten Asmat\r'),
(9416, 94, 'Kabupaten Yahukimo\r'),
(9417, 94, 'Kabupaten Pegunungan Bintang\r'),
(9418, 94, 'Kabupaten Tolikara\r'),
(9419, 94, 'Kabupaten Sarmi\r'),
(9420, 94, 'Kabupaten Keerom\r'),
(9426, 94, 'Kabupaten Waropen\r'),
(9427, 94, 'Kabupaten Supiori\r'),
(9428, 94, 'Kabupaten Mamberamo Raya\r'),
(9429, 94, 'Kabupaten Nduga\r'),
(9430, 94, 'Kabupaten Lanny Jaya\r'),
(9431, 94, 'Kabupaten Mamberamo Tengah\r'),
(9432, 94, 'Kabupaten Yalimo\r'),
(9433, 94, 'Kabupaten Puncak\r'),
(9434, 94, 'Kabupaten Dogiyai\r'),
(9435, 94, 'Kabupaten Intan Jaya\r'),
(9436, 94, 'Kabupaten Deiyai\r'),
(9471, 94, 'Kota Jayapura \r');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `option_1` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) NOT NULL,
  `option_4` varchar(50) NOT NULL,
  `option_5` varchar(50) NOT NULL,
  `jawaban` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_soal`, `pertanyaan`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `jawaban`) VALUES
(1, 11, 'User atau Operator Komputer dalam Istilah Komputer disebut dengan..?', 'Brainware', 'Fireware', 'Software', 'Hardware', 'Tuperware', 'A'),
(2, 11, 'CPU Merupakan Singkatan dari ', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Cee Pee Uuu', 'Central Producing Unit', 'C'),
(3, 11, 'Jaringan dari elemen-elemen yang saling berhubungan adalah ?', 'pentium', 'instal', 'system', 'data', 'media', 'C'),
(4, 11, 'Berikut merupakan elemen-elemen sistem komputer kecuali ?', 'Fireware', 'Brainware', 'Software', 'Hadware', 'Tuperware', 'A'),
(5, 11, 'Program yang berisi perinta-perintah / perangkat lunak disebut ?', 'Pentium', 'Brainware', 'Hardware', 'Tuperware', 'Software', 'E'),
(6, 11, 'Proses memasukkan dan memasang software ke dalam komputer disebut...?', 'data', 'instal', 'loading', 'online', 'offline', 'B'),
(7, 11, 'Berikut yang bukan termasuk alat output adalah...?', 'KeyBoard', 'Speaker', 'Motherboard', 'Monitor', 'Printer', 'A'),
(8, 11, 'Tanda panah (tanda lain) yang mewakili posisi gerakan mouse disebut dengan...?', 'Kursor', 'Mouese', 'Pointer', 'Printer', 'Panter', 'C'),
(9, 11, 'Fungsi printer adalah untuk...?', 'mengeluarkan suara', 'mencetak dokumen', 'menyimpan dokumen', 'menghapus dokumen', 'salah semua', 'B'),
(10, 11, 'USB merupakan singkatan dari ?', 'Universal serial bus', 'Unit serial bus', 'Universal Serial Bus', 'Unit serial bots', 'Unit serial booster', 'C'),
(11, 11, 'Salah satu perangkat Lunak pengolah kata adalah ?', 'Ms.Word', 'Winamp', 'CC cleaner', 'Jet audio', 'Smadav', 'A'),
(12, 11, 'Program yang digunakan untuk disain gambar adalah..?', 'Ms.Exel', 'Media Player', 'Power Point', 'Photoshop', 'Ms.Word', 'E'),
(13, 11, 'Yang bukan termasuk Hadware / Perangkat Keras adalah.?', 'CPU', 'Keyboard', 'Ms.Office', 'Printer', 'Mouse', 'C'),
(14, 11, 'Siapa presiden pertama Indonesia ?', 'Megawati Soekarno Puteri', 'Ki Hajar Dewantara', 'Suharto', 'Soekarno', 'Joko Widodo', 'D'),
(15, 11, 'Yang bukan termasuk Hadware / Perangkat Keras adal...', 'CPU', 'Media Player', 'USB', 'Printer', 'Tuperware', 'B'),
(16, 11, 'USB merupakan singkatan dari ?', 'Universal serial bus', 'Unit serial bus', 'Universal Serial Bus', 'Unit serial bots', 'Unit serial booster', 'C'),
(17, 11, '	\r\nCPU Merupakan Singkatan dari', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Cee Pee Uuu', 'Central Producing Unit', 'C'),
(18, 11, 'CPU Merupakan Singkatan dari', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Cee Pee Uuu', 'Central Producing Unit', 'C'),
(19, 11, 'CPU Merupakan Singkatan dari', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Cee Pee Uuu', 'Central Producing Unit', 'C'),
(20, 11, 'CPU Merupakan Singkatan dari ?', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Cee Pee Uuu', 'Central Producing Unit', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `kd_peserta` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `ktp` text NOT NULL,
  `foto` text NOT NULL,
  `status_peserta` enum('Umum','ASN') NOT NULL,
  `created` datetime NOT NULL,
  `id_domisili` int(11) NOT NULL,
  `id_ktp` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_riw_pendidikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`kd_peserta`, `nama`, `username`, `email`, `nik`, `tmp_lahir`, `tgl_lahir`, `jekel`, `agama`, `no_hp`, `ktp`, `foto`, `status_peserta`, `created`, `id_domisili`, `id_ktp`, `id_pekerjaan`, `id_riw_pendidikan`) VALUES
(1, 'Rathdikha oktavian', 'A001', 'rathdikhaghani02@gmail.com', '12341', 'Karawang', '2019-11-04', 'L', 'islam', '085227832360', 'pbo02.png', 'pbo01.png', 'Umum', '2019-11-25 03:40:44', 1, 1, 1, 1),
(2, 'sadsadasviansadas', 'A002', 'rathdikhaghani02@gmail.com', '12341', 'Karawang', '2019-11-12', 'P', 'kristen', '085227832360', 'pbo02.png', 'pbo02.png', 'Umum', '2019-11-25 05:08:44', 2, 2, 2, 2),
(3, 'Rathdikha oktavian', 'A003', 'rathdikhaghani02@gmail.com', '12341', 'Karawang', '2019-11-06', 'L', 'budha', '085227832360', 'pbo01.png', 'prosedural01.png', 'Umum', '2019-11-25 05:20:57', 3, 3, 3, 3),
(4, 'Rathdikha oktavian', 'A004', 'rathdikhaghani02@gmail.com', '12341', 'Karawang', '2019-11-13', 'P', 'kristen', '085227832360', 'pbo01.png', 'prosedural02.png', 'Umum', '2019-11-25 05:23:02', 4, 4, 4, 4),
(5, 'no 5', 'P005', 'rathdikhaghani02@gmail.com', '555', 'Karawang', '2019-11-12', 'L', 'budha', '085227832360', 'pbo01.png', 'prosedural01.png', 'ASN', '2019-11-25 05:38:24', 5, 5, 5, 5),
(6, 'peserta 01', 'P001', 'rathdikhaghani02@gmail.com', '12341', 'Karawang', '2006-02-06', 'L', 'kristen', '085227832360', 'pbo01.png', 'pbo01.png', 'Umum', '2019-12-05 09:33:43', 6, 6, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_pelatihan`
--

CREATE TABLE `peserta_pelatihan` (
  `kd_pespel` int(12) NOT NULL,
  `kd_pelatihan` int(12) NOT NULL,
  `kd_peserta` int(12) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_pelatihan`
--

INSERT INTO `peserta_pelatihan` (`kd_pespel`, `kd_pelatihan`, `kd_peserta`, `tgl_daftar`, `ket`) VALUES
(2, 1, 3, '2019-11-30 00:00:00', 'tunggu'),
(3, 1, 5, '2019-11-30 06:09:36', 'lolos'),
(4, 5, 6, '2019-12-05 09:36:32', 'mulai');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `provinsi`) VALUES
(11, 'Aceh\r'),
(12, 'Sumatera Utara\r'),
(13, 'Sumatera Barat\r'),
(14, 'Riau\r'),
(15, 'Jambi\r'),
(16, 'Sumatera Selatan\r'),
(17, 'Bengkulu\r'),
(18, 'Lampung\r'),
(19, 'Kepulauan Bangka Belitung\r'),
(21, 'Kepulauan Riau\r'),
(31, 'DKI Jakarta'),
(32, 'Jawa Barat\r'),
(33, 'Jawa Tengah\r'),
(34, 'DI Yogyakarta'),
(35, 'Jawa Timur\r'),
(36, 'Banten\r'),
(51, 'Bali\r'),
(52, 'Nusa Tenggara Barat\r'),
(53, 'Nusa Tenggara Timur\r'),
(61, 'Kalimantan Barat\r'),
(62, 'Kalimantan Tengah\r'),
(63, 'Kalimantan Selatan\r'),
(64, 'Kalimantan Timur\r'),
(71, 'Sulawesi Utara\r'),
(72, 'Sulawesi Tengah\r'),
(73, 'Sulawesi Selatan\r'),
(74, 'Sulawesi Tenggara\r'),
(75, 'Gorontalo\r'),
(76, 'Sulawesi Barat\r'),
(81, 'Maluku\r'),
(82, 'Maluku Utara\r'),
(91, 'Papua Barat\r'),
(94, 'Papua\r');

-- --------------------------------------------------------

--
-- Table structure for table `riwa_pekerjaan`
--

CREATE TABLE `riwa_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `sts_pekerjaan` varchar(11) NOT NULL,
  `nm_tmp_kerja` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwa_pekerjaan`
--

INSERT INTO `riwa_pekerjaan` (`id_pekerjaan`, `sts_pekerjaan`, `nm_tmp_kerja`, `pekerjaan`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, '1101', 'qeq', 'asdsa', '2019-11-10', '2019-11-11'),
(2, 'Bekerja', 'aa', 'ddd', '2019-11-22', '2019-11-28'),
(3, 'Bekerja', 'aa', 'ddd', '2019-11-19', '2019-08-28'),
(4, 'Bekerja', 'aa', 'ddd', '2019-11-14', '2019-11-26'),
(5, 'Bekerja', 'aa', 'ddd', '2019-11-07', '2019-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `riwa_pendidikan`
--

CREATE TABLE `riwa_pendidikan` (
  `id_riw_pendidikan` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `file_ijazah_depan` text NOT NULL,
  `file_ijazah_belakang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwa_pendidikan`
--

INSERT INTO `riwa_pendidikan` (`id_riw_pendidikan`, `id_jenjang`, `id_jurusan`, `file_ijazah_depan`, `file_ijazah_belakang`) VALUES
(1, 11, 1201, 'asd', 'asd'),
(2, 11, 1101, 'prosedural01.png', 'prosedural02.png'),
(3, 12, 1203, 'pbo02.png', 'prosedural01.png'),
(4, 12, 1205, 'pbo01.png', 'prosedural01.png'),
(5, 11, 1101, 'pbo01.png', 'pbo01.png'),
(6, 11, 1101, 'Screenshot from 2019-01-06 14-39-40.png', 'prosedural01.png');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `nama_soal` varchar(255) NOT NULL,
  `jml_soal` int(11) NOT NULL,
  `minimal_benar` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `passing_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `nama_soal`, `jml_soal`, `minimal_benar`, `total_nilai`, `passing_grade`) VALUES
(11, 'soal111p', 20, 15, 100, 75),
(12, 'soal122', 20, 15, 100, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `alamat_domisili`
--
ALTER TABLE `alamat_domisili`
  ADD PRIMARY KEY (`id_domisili`),
  ADD KEY `kd_kab` (`id_kab`),
  ADD KEY `kd_prov` (`id_prov`);

--
-- Indexes for table `alamat_ktp`
--
ALTER TABLE `alamat_ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indexes for table `desk_program`
--
ALTER TABLE `desk_program`
  ADD PRIMARY KEY (`id_desk`);

--
-- Indexes for table `d_pelatihan`
--
ALTER TABLE `d_pelatihan`
  ADD PRIMARY KEY (`kd_pelatihan`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`),
  ADD KEY `id_prov` (`id_prov`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`kd_peserta`),
  ADD KEY `id_domisili` (`id_domisili`),
  ADD KEY `id_ktp` (`id_ktp`),
  ADD KEY `id_riw_pendidikan` (`id_riw_pendidikan`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `peserta_pelatihan`
--
ALTER TABLE `peserta_pelatihan`
  ADD PRIMARY KEY (`kd_pespel`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `riwa_pekerjaan`
--
ALTER TABLE `riwa_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `riwa_pendidikan`
--
ALTER TABLE `riwa_pendidikan`
  ADD PRIMARY KEY (`id_riw_pendidikan`),
  ADD KEY `id_jenjang` (`id_jenjang`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_domisili`
--
ALTER TABLE `alamat_domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `alamat_ktp`
--
ALTER TABLE `alamat_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `desk_program`
--
ALTER TABLE `desk_program`
  MODIFY `id_desk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1206;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9472;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `riwa_pekerjaan`
--
ALTER TABLE `riwa_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `riwa_pendidikan`
--
ALTER TABLE `riwa_pendidikan`
  MODIFY `id_riw_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_domisili`
--
ALTER TABLE `alamat_domisili`
  ADD CONSTRAINT `alamat_domisili_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`),
  ADD CONSTRAINT `alamat_domisili_ibfk_2` FOREIGN KEY (`id_kab`) REFERENCES `kabupaten` (`id_kab`);

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`id_domisili`) REFERENCES `alamat_domisili` (`id_domisili`),
  ADD CONSTRAINT `peserta_ibfk_3` FOREIGN KEY (`id_ktp`) REFERENCES `alamat_ktp` (`id_ktp`),
  ADD CONSTRAINT `peserta_ibfk_4` FOREIGN KEY (`id_riw_pendidikan`) REFERENCES `riwa_pendidikan` (`id_riw_pendidikan`),
  ADD CONSTRAINT `peserta_ibfk_5` FOREIGN KEY (`id_pekerjaan`) REFERENCES `riwa_pendidikan` (`id_riw_pendidikan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `riwa_pekerjaan`
--
ALTER TABLE `riwa_pekerjaan`
  ADD CONSTRAINT `riwa_pekerjaan_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `peserta` (`id_pekerjaan`);

--
-- Constraints for table `riwa_pendidikan`
--
ALTER TABLE `riwa_pendidikan`
  ADD CONSTRAINT `riwa_pendidikan_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`),
  ADD CONSTRAINT `riwa_pendidikan_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
