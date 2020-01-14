-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2020 at 07:07 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `_local_konsumsi-pangan.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nohp` varchar(200) NOT NULL,
  `noktp` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `nohp`, `noktp`, `alamat`, `level`) VALUES
('admin', '$2y$10$AMrFNGU2Gv6LDa4.FxQHKOSGoZsdF59iiDCrwV.XurQRi5BR.Q7Ey', 'Admin Web', '087866574857', '643384249284', 'Banjarbaru', 'admin'),
('budi', '$2y$10$jSpEXwU1QTZtzLiy5atn6O1qF6Er8kOk3yFM5/q9b9aYaLsVQ1Dmu', 'Budi', '085276758475', '643384249284', 'Banjarmasin', 'user'),
('nisa', '$2y$10$ZacDreYtQOiOzHaWZRCwxubMNrlfFw6Nb6NUrKsDKjMMltuLfZ3v.', 'Nisa Munajati', '085375583654', '637868768766', 'Rantau', 'user'),
('ovi', '$2y$10$2MWCZcK4rzLeGj.9.76bQ.A36Glcbgibr..ZtIjT1INlT9cftXgRS', 'Ovi Lina', '08782332675', '98695857575875', 'Banjarmasin', 'user'),
('rini', '$2y$10$s.nCgd4d1K8.L9rsVIdMc.LXLh3qVXfS4oZyi/WqhoWCXRYRAEReK', 'Rini Andriani', '08782332675', '637868768766', 'Banjarmasin', 'user'),
('sani', '$2y$10$wcar1HI9bhn5dV8kbdZUvOjUliscahDu2rXrh2hdw/tx2Sk54.YIy', 'Sani', '0878576564674', '87678577598598', 'Martapura', 'user'),
('syarif', '$2y$10$AFbYFisX0Kiyhc0P7O8xiOBbBZYUeqsuGLhl7OiEJYFaTxFSeecZC', 'Ali Syarif', '0886767587', '98689869869', 'Martapura', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `dkbm`
--

CREATE TABLE IF NOT EXISTS `dkbm` (
  `kode` varchar(200) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `energi` float NOT NULL,
  `protein` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkbm`
--

INSERT INTO `dkbm` (`kode`, `nama`, `jenis`, `energi`, `protein`) VALUES
('005', 'Beras Giling', '01', 360, 6.8),
('008', 'Jagung Pipilan', '01', 345, 9.1),
('051', 'Kentang', '02', 83, 0.2),
('056', 'Ketela Pohon', '02', 154, 1),
('068', 'Tepung Terigu', '01', 333, 9),
('069', 'Ubi Jalar', '02', 114, 0.8),
('101', 'Sagu', '02', 353, 0.7),
('145', 'Kelapa Muda', '05', 17, 0.2),
('149', 'Kemiri', '05', 636, 19),
('170', 'Biji Jambu Mate', '05', 629, 21.5),
('209', 'Daging Ayam', '03', 302, 18.2),
('219', 'Daging Sapi', '03', 207, 18.8),
('238', 'Telur Ayam', '03', 162, 12.8),
('271', 'Ikan Mas', '03', 86, 16),
('356', 'Gula Kelapa', '07', 386, 3),
('514', 'Susu Sapi', '03', 61, 3.2),
('521', 'Lemak Kerbau / Sapi', '04', 818, 1.5),
('526', 'Minyak Kelapa', '04', 870, 1),
('527', 'Minyak Kelapa Sawit', '04', 902, 0),
('535', 'Gula Aren', '07', 368, 0),
('538', 'Gula Pasir', '07', 364, 0),
('707', 'Kacang Hijau', '06', 109, 8.7),
('709', 'Kacang Kedelai', '05', 521, 32.2),
('717', 'Kacang Tanah', '06', 564, 25.5),
('856', 'Sayur Lodeh', '08', 240, 9.1),
('858', 'Sayur Sop', '08', 27, 1.3),
('900', 'Bakso', '09', 190, 10.3),
('906', 'Cake Bolu', '09', 435, 7.1);

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `dibaca` int(10) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `dibaca`, `isi`, `tanggal`) VALUES
(1, 'Selamat Datang', 52, '<p><strong><img style="float: left; padding-right: 20px; border-width: 2px;" src="source/admin/images.jpeg" alt="" width="500" /></strong><strong>Tugas, Fungsi dan Struktur Organisasi</strong><br />Tugas SKPD Dinas Ketahanan Pangan Kabupaten Banjar berdasarkan Peraturan Daerah Nomor 13 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah adalah Dinas Ketahanan Pangan tipe B menyelenggarakan urusan pemerintahan bidang Ketahanan Pangan Dan berdasarkan Peraturan Bupati Banjar Nomor 63 Tahun 2016 Tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi Serta Tata Kerja Dinas ketahanan Pangan adalah melaksanakan penyusunan dan pelaksanaan kebijakan daerah di bidang ketahanan pangan yang meliputi ketersediaan dan kerawanan pangan, distribusi pangan dan harga, konsumsi dan keamanan pangan.</p>\r\n<p><strong>Fungsi Dinas Ketahanan Pangan Kabupaten Banjar adalah ;</strong><br />Dinas mempunyai tugas membantu Bupati melaksanakan urusan pemerintahan dan pelayanan umum dalam bidang Pangan yang menjadi kewenangan Daerah dan Tugas Pembantuan yang diberikan kepada Daerah. Untuk melaksanakan tugas sebagaimana dimaksud, Dinas mempunyai fungsi : <br />a. perumusan kebijakan teknis dalam bidang Pangan, sesuai dengan kebijakan umum yang ditetapkan oleh Bupati;<br />b. pelaksanaan kebijakan teknis dan perencanaan program bidang Pangan;<br />c. pemantauan, evaluasi dan pelaporan dibidang Pangan;<br />d. pelaksanaan administrasi dinas dibidang Pangan; dan<br />e. pelaksanaan fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya.</p>', '2019-05-19'),
(2, 'Tentang Gizi', 106, '<p><strong>Pertama,<br /></strong>Susunan makanan yang terdiri atas 4 kelompok ini, belum tentu sehat, bergantung apakah porsi dan jenis zat gizinya sesuai dengan kebutuhan. Contoh, jika pola makan kita sebagian besar porsinya terdiri atas sumber karbohidrat (nasi), sedikit sumber protein, sedikit sayur dan buah sebagai sumber vitamin, maka pola makan tersebut tidak dapat dianggap sehat. Sebaliknya, jika pola makan kita terlalu banyak sumber lemak dan protein seperti hidangan yang banyak daging dan minyak atau lemak, tetapi sedikit sayur dan buah, maka pola makan itu tak dapat dianggap sehat.</p>\r\n<p><strong>Kedua,</strong><br />Susu bukan "makanan sempurna" seperti anggapan umum selama ini. Dengan anggapan itu banyak orang, termasuk kalangan pemerintah, menganggap susu merupakan "jawaban" atas masalah gizi[9]. Sebenarnya, susu adalah sumber protein hewani yang juga terdapat pada telur, ikan dan daging.<br />Oleh karena itu di dalam PGS, susu ditempatkan dalam satu kelompok dengan sumber protein hewani lain. Dari segi kualitas protein, telur dalam ilmu gizi dikenal lebih baik dari susu karena daya cerna protein telur lebih tinqggi daripada susu.</p>\r\n<p><strong>Ketiga,</strong><br />Slogan 4S5S yang dipopulerkan oleh Prof. Poerwo Soedarmo, Bapak Gizi Indonesia, pada tahun 1950-an dianggap tak lagi sesuai dengan perkembangan iptek gizi, seperti halnya slogan "Basic Four" di Amerika yang merupakan acuan awal 4S5S pada masa itu. "Basic Four" dari AS yang diciptakan tahun 1940-an bertujuan mencegah pola makan orang Amerika yang cenderung banyak lemak, tinggi gula, dan kurang serat. Namun, setelah dievaluasi tahun 1970-an, ternyata slogan tersebut tidak memperbaiki pola makan penduduk Amerika, yang disertai dengan meningkatnya penyakit degeneratif terkait gizi. Sejak itu, slogan "Basic Four" diperbarui dan disempurnakan menjadi "Nutrition Guide for Balance Diet" dengan visual piramida.<br />Di Indonesia "Nutrition Guide for Balance Diet" diterjemahkan menjadi PGS yang juga menggunakan visual piramida. Berbeda dengan Nutrition Guide AS yang berlaku untuk usia di atas 2 tahun, di Indonesia PGS berlaku sejak bayi dengan memasukkan ASI eksklusif sebagai Gizi Seimbang.</p>', '2019-05-19'),
(3, 'Tentang B2SA', 113, '<p>Pola makan B2SA merupakan pola makan yang menggunakan susunan makanan untuk sekali makan atau untuk sehari menurut waktu makan (pagi, siang dan sore/malam), yang mengandung zat gizi untuk memenuhi kebutuhan tubuh dengan jumlah yang memenuhi kaidah gizi seimbang yang sesuai dengan daya terima (selera, budaya) dan kemampuan daya beli masyarakat serta aman untuk di konsumsi. Berikut beberapa alasan kenapa kita haruss mengkonsumsi pangan yang B2SA:</p>\r\n<p><strong>Beragam</strong> artinya pangan yang dikonsumsi berbagai macam, baik hewani maupun nabati, baik sumber karbohidrat, protein, vitamin dan mineral. Setiap jenis/kelompok pangan mempunyai kelebihan atau kekurangan nutrisi/gizi tertentu, sehingga dengan mengkonsumsi pangan yang beragam maka nutrisi/gizi dari berbagai pangan saling menutupi sesuai dengan kebutuhan tubuh kita. Selain itu juga kenapa harus beragam, sejalan dengan salah satu Rencana Strategis Kementrian Pertanian yang salah satunya adalah Peningkatan Diversifikasi pangan, jadi disini diharapkan masyarakat tidak hanya tergantung pada satu jenis pangan tertentu saja. Misalnya tergantung pada beras atau terigu saja.<br /><strong>Bergizi</strong> artinya pangan yang dikonsumsi harus mengandung gizi. Gizi adalah unsur yang ada dalam makanan yang dapat dimanfaatkan langsung oleh tubuh. Manfaat itu antara lain memelihara tubuh serta mengganti jaringan tubuh yang rusak, memproduksi energi, mengatur metabolisme dan mengatur berbagai keseimbangan air, mineral serta cairan tubuh lainnya , sebagai mekanisme pertahanan tubuh terhadap berbagai penyakit.<br /><strong>Berimbang</strong> artinya pangan yang dikonsumsi harus seimbang dari berbagia jenis/kelompok pangan serta sumber karbohidrat, protein, vitamin dan mineral. Konsumsi pangan dikatakan seimbang tergantung pada umur, jenis kelamin, aktivitas, ukuran tubuh dan keadaan fisiologi. Seimbang disini maksudnya adalah: Seimbang jumlah antar kelompok pangan (pangan pokok, lauk pauk, sayur dan buah), Seimbang jumlah antar waktu (3 kali makan sehari)<br /><strong>Aman</strong> Artinya Pangan yang dikonsumsi bebas dari kemungkinan cemaran biologis, kimia dan benda lain yang dapat menganggu, merugikan, dan membahayakan kesehatan manusia baik secara langsung ataupun tidak langsung (jangka panjang).</p>', '2019-05-19'),
(4, 'Tentang Pola Konsumsi', 22, '<p>Kegiatan konsumsi, pola pengeluaran antar rumah tangga tidak akan pernah sama persis. Akan tetapi memiliki perbedaan keteraturan dalam pola pengeluaran secara umum. Pola pengeluaran ini bisa juga disebut pola konsumsi (sebab konsumsi merupakan suatu bentuk pengeluaran). Pola konsumsi berasal dari kata pola dan konsumsi. pola adalah bentuk (struktur) yang tetap, sedangkan konsumsi adalah pengeluaran yang dilakukan oleh individu/kelompok dalam rangka pemakaian barang dan jasa hasil produksi untuk memenuhi kebutuhan. Jadi, pola konsumsi adalah bentuk (struktur) pengeluaran individu/kelompok dalam rangka pemakaian barang dan jasa hasil produksi guna memenuhi kebutuhan.</p>\r\n<p>Samuelson dan Nordhaus (2004) menjelaskan keteraturan pola konsumsi secara umum yang dilakukan oleh rumah tangga atau keluarga. Keluarga-keluarga miskin membelanjakan pendapatan mereka terutama untuk memenuhi kebutuhan hidup berupa makanan dan perumahan. Setelah pendapatan meningkat, pengeluaran makan menjadi naik sehingga makanan menjadi bervariasi. Akan tetapi ada batasan uang ekstra yang digunakan untuk pengeluaran makanan ketika pendapatan mereka naik. Oleh karena itu, ketika pendapatan semakin tinggi, proporsi pengeluaran makanan menjadi menurun dan akan beralih pada kebutuhan nonmakan seperti pakaian, rekreasi, barang mewah, dan tabungan.</p>\r\n<p>Pola konsumsi dapat dijadikan sebagai salah satu indikator kesejahteraan rumah tangga. Pola konsumsi yang didominasi pada pengeluaran makanan merupakan potret masyarakat dengan kesejahteraan yang masih rendah. Sebaliknya pola konsumsi yang didominasi pada pengeluaran nonmakanan merupakan gambaran dari rumah tangga yang lebih sejahtera. Hal ini disebabkan rumah tangga yang memiliki pendapatan rendah hanya dapat fokus memenuhi kebutuhan pokok demi keberlangsungan hidup rumah tangga sehingga pola konsumsi tampak dominan pada konsumsi makanan.</p>', '2019-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `jenispangan`
--

CREATE TABLE IF NOT EXISTS `jenispangan` (
  `kode` varchar(200) NOT NULL,
  `nama` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispangan`
--

INSERT INTO `jenispangan` (`kode`, `nama`) VALUES
('01', 'Padi - Padian'),
('02', 'Umbi - Umbian'),
('03', 'Pangan Hewani'),
('04', 'Minyak dan Lemak'),
('05', 'Buah/Biji Berminyak'),
('06', 'Kacang - Kacangan'),
('07', 'Gula'),
('08', 'Sayur dan Buah'),
('09', 'Jajanan');

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi`
--

CREATE TABLE IF NOT EXISTS `konsumsi` (
  `id` int(11) NOT NULL,
  `sample` varchar(200) NOT NULL,
  `dkbm` varchar(200) NOT NULL,
  `berat` float NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumsi`
--

INSERT INTO `konsumsi` (`id`, `sample`, `dkbm`, `berat`, `tanggal`) VALUES
(2, '1104', '005', 1500, '2020-01-01'),
(3, '1104', '238', 500, '2020-01-01'),
(4, '1104', '856', 1000, '2020-01-01'),
(5, '1104', '526', 100, '2020-01-01'),
(6, '1105', '008', 1500, '2020-01-01'),
(7, '1105', '051', 500, '2020-01-01'),
(8, '1105', '149', 100, '2020-01-01'),
(9, '1106', '005', 1200, '2020-01-01'),
(10, '1106', '209', 300, '2020-01-01'),
(11, '1106', '535', 200, '2020-01-01'),
(12, '1107', '005', 1200, '2020-01-01'),
(13, '1107', '068', 200, '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `kode` varchar(100) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `desa` varchar(200) NOT NULL,
  `argeokologi` varchar(200) NOT NULL,
  `ekonomi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`kode`, `wilayah`, `desa`, `argeokologi`, `ekonomi`) VALUES
('01', '1', 'Gambut', 'Pertanian', 'Tertinggal'),
('02', '1', 'Sungai Tabuk', 'Pertanian', 'Tertinggal'),
('03', '1', 'Pengaron', 'Pertanian', 'Tertinggal'),
('04', '1', 'Martapura Timur', 'Pertanian', 'Tertinggal'),
('05', '1', 'Martapura Barat', 'Pertanian', 'Tertinggal'),
('06', '1', 'Martapura', 'Pertanian', 'Sedang'),
('07', '1', 'Kertak Hanyar', 'Pertanian', 'Tertinggal'),
('08', '1', 'Mataraman', 'Pertanian', 'Sedang'),
('09', '1', 'Karang Intan', 'Pertanian', 'Maju');

-- --------------------------------------------------------

--
-- Table structure for table `rt_sample`
--

CREATE TABLE IF NOT EXISTS `rt_sample` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `jumlahorang` int(11) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_sample`
--

INSERT INTO `rt_sample` (`id`, `nama`, `alamat`, `jumlahorang`, `lokasi`) VALUES
(1104, 'Amir', 'Gambut', 4, '01'),
(1105, 'Budi', 'Gambut', 6, '01'),
(1106, 'Umar', 'Sungai Tabuk', 3, '02'),
(1107, 'Helmi', 'Sungai Tabuk', 2, '02');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `penanggungjawab` varchar(200) NOT NULL,
  `jumlahpenduduk` int(11) NOT NULL,
  `lajupertumbuhan` varchar(200) NOT NULL,
  `besarkeluarga` int(11) NOT NULL,
  `umr` int(11) NOT NULL,
  `ake_konsumsi` int(11) NOT NULL,
  `akp_konsumsi` int(11) NOT NULL,
  `ake_ketersediaan` int(11) NOT NULL,
  `akp_ketersediaan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `tahun`, `kode`, `nama`, `penanggungjawab`, `jumlahpenduduk`, `lajupertumbuhan`, `besarkeluarga`, `umr`, `ake_konsumsi`, `akp_konsumsi`, `ake_ketersediaan`, `akp_ketersediaan`) VALUES
(1, 2020, '15', 'Kabupaten Banjar', 'Dinas Ketahanan Pangan', 546990, '2.11 %', 5, 2085000, 2150, 57, 2200, 57);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dkbm`
--
ALTER TABLE `dkbm`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenispangan`
--
ALTER TABLE `jenispangan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `konsumsi`
--
ALTER TABLE `konsumsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `rt_sample`
--
ALTER TABLE `rt_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konsumsi`
--
ALTER TABLE `konsumsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rt_sample`
--
ALTER TABLE `rt_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1108;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
