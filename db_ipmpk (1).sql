-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 11:33 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ipmpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `post_id` int(11) NOT NULL,
  `post_judul` varchar(150) NOT NULL,
  `post_isi` text NOT NULL,
  `post_tanggal` date NOT NULL,
  `post_img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`post_id`, `post_judul`, `post_isi`, `post_tanggal`, `post_img`) VALUES
(18, 'IPMPK Kabupaten Inhil Peduli Lombok, NTB', '<p>Ikatan pelajar mahasiswa pemuda kempas (IPMPK) Kabupaten Indragiri Hilir beserta Karang taruna Kelurahan Kempas jaya Kecamatan Kempas dan Pengurus Kecamatan knpi kempas menyerahkan bantuan baju layak pakai untuk korban gempa lombok, Nusa Tenggara Barat, bantuan tersebut di dapat dari sumbangan anggota dan masyarakat Kecamatan kempas, dalam hal ini di serahkan langsung oleh sekretaris ikatan pelajar mahasiswa pemuda kempas Inhil Khairul Anwar. Rabu (29/8/2018)</p>\n\n<p>Khairul Anwar selaku sekretaris IPMPK dan koordinator dalam Penggalangan bantuan untuk korban gempa Lombok mengucapkan terimakasih kepada anggota dan masyarakat yang telah membantu, saya berharap kedepannya kita lebih peduli sesama, &ldquo;ungkapnya.</p>\n\n<p>Selanjutnya Khairul mengatakan Penyerahan bantuan ini langsung di terima oleh saudara Roni Fahriadi selaku Penasehat komunikasi musisi Inhil yang bertempat di Jalan Gunung daek lorong mataram III Tembilahan selanjutnya akan di kirim ke Lombok, NTB.</p>\n\n<p>Bliau sangat berterimakasih kepada IPMPK Inhil, Karang Taruna dan pk knpi kempas yg telah Peduli melakukan penggalangan untuk menyumbangkan baju layak pakai untuk korban gempa di lombok, semoga kedepannya kegiatan sangat positif seperti ini terus di galakkan sebagai motivasi bagi elemen lainnya untuk berbuat nyata sesama saudara kita. &ldquo;Ujarnya.&nbsp;<strong>[HD].</strong></p>\n', '2018-07-29', '909f66f4a780dcb6ca09141ee69f1da1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `iuran_kurban`
--

CREATE TABLE `iuran_kurban` (
  `Id_iuran` int(20) NOT NULL,
  `Id_kaskurban` int(100) NOT NULL,
  `Tanggal_setor` date NOT NULL,
  `Jumlah_setor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran_kurban`
--

INSERT INTO `iuran_kurban` (`Id_iuran`, `Id_kaskurban`, `Tanggal_setor`, `Jumlah_setor`) VALUES
(45, 143, '2020-12-03', 1000000),
(46, 143, '2020-12-07', 500000),
(48, 145, '2020-12-01', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `kas_kurban`
--

CREATE TABLE `kas_kurban` (
  `Id_kaskurban` int(100) NOT NULL,
  `Id_anggota` int(100) DEFAULT NULL,
  `Id_donatur` int(11) DEFAULT NULL,
  `Status` enum('Proses Iuran','Proses Pembelian','Selesai') NOT NULL,
  `Tanggal_mulai` date NOT NULL,
  `Tanggal_akhir` date NOT NULL,
  `Total_setor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas_kurban`
--

INSERT INTO `kas_kurban` (`Id_kaskurban`, `Id_anggota`, `Id_donatur`, `Status`, `Tanggal_mulai`, `Tanggal_akhir`, `Total_setor`) VALUES
(143, 1, NULL, 'Proses Iuran', '2020-12-02', '2021-06-30', 1500000),
(145, NULL, 1, 'Proses Iuran', '2020-12-01', '2021-05-31', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `kas_organisasi`
--

CREATE TABLE `kas_organisasi` (
  `id_KasOrganisasi` int(100) NOT NULL,
  `Id_anggota` int(100) NOT NULL,
  `Jumlah_setor` int(100) NOT NULL,
  `Tanggal_setor` date NOT NULL,
  `Jenis` enum('pemasukan','pengeluaran','','') NOT NULL,
  `Keterangan` enum('Iuran','Kegiatan','Lain Lain','') NOT NULL,
  `Diskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas_organisasi`
--

INSERT INTO `kas_organisasi` (`id_KasOrganisasi`, `Id_anggota`, `Jumlah_setor`, `Tanggal_setor`, `Jenis`, `Keterangan`, `Diskripsi`) VALUES
(20, 1, 200000, '2020-09-01', 'pemasukan', 'Lain Lain', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_anggota`
--

CREATE TABLE `user_anggota` (
  `Id_anggota` int(11) NOT NULL,
  `Role` enum('1','2','3','') NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `Jenis_kelamin` enum('Laki Laki','Perempuan','','') NOT NULL,
  `Agama` enum('Islam','Kristen','Budha','Hindu','Katolik') NOT NULL,
  `Status` enum('Pelajar','Mahasiswa','Pemuda','') NOT NULL,
  `Alamat_rumah` varchar(100) NOT NULL,
  `Hobi` varchar(50) NOT NULL,
  `No_HP` varchar(20) NOT NULL,
  `Medsos` varchar(50) NOT NULL,
  `Alamat_kost` varchar(100) NOT NULL,
  `Jabatan` enum('Ketua','Anggota','Bendahara','Sekertaris','Donatur','Wakil Ketua') NOT NULL,
  `User_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_anggota`
--

INSERT INTO `user_anggota` (`Id_anggota`, `Role`, `Username`, `Password`, `Nama`, `ttl`, `Jenis_kelamin`, `Agama`, `Status`, `Alamat_rumah`, `Hobi`, `No_HP`, `Medsos`, `Alamat_kost`, `Jabatan`, `User_img`) VALUES
(1, '1', 'takrirmas', '12345678', 'Takrir Mas,SP', 'Kempas jaya 08/02/1996', 'Laki Laki', 'Islam', 'Pemuda', 'Jl propinsi RT 001/ RW 003Kempas jaya', 'Traveling', '085263637352', ',,', 'jl mewah', 'Ketua', 'e35ec03f8aae3326f9ce862adcd1979b.png'),
(2, '1', 'adliarba', '12345678', 'Adli Arbariansyah\r\n', 'Pekanbaru/20-09-2001', 'Laki Laki', 'Islam', 'Mahasiswa', 'Sungai gantang kecil Desa sungai gantang', 'Browsing and Desain', '083186257014\r\n', '@arbariansyah', '', 'Wakil Ketua', 'avatar_male.png'),
(4, '2', 'yulisa', '12345678', 'Yulisa Rahma Yanti\r\n', 'Kempas Jaya / 31 Juli 2002', 'Perempuan', 'Islam', 'Pelajar', 'RT 01, RW 02 kempas Jaya', 'Sepak takraw, multimedia\r\n', '082260238867\r\n', 'Yulisa rahma yanti, yunji.cal_31', '', 'Sekertaris', 'avatar_female.png'),
(5, '2', 'zulfaningsih\r\n', '12345678', 'Zulfaningsih\r\n', 'Sei.ara 26 januari 2002', 'Laki Laki', 'Islam', 'Pemuda', 'Sei.ara', 'Membaca', '082298123602\r\n', 'Zulfa YL', '', 'Bendahara', 'avatar_male.png'),
(6, '3', 'diniputri', '12345678', 'Dini Putri Azhari\r\n', 'Bagan Jaya, 27 januari 2002', 'Perempuan', 'Islam', 'Pelajar', 'Jl. Lintas samudra, blok b1 Rumbay Jaya kec. Kempas', 'Membaca', '085320145498\r\n', 'Dini Putri Azhari , @dhinyputryazhari', '', 'Anggota', 'avatar_female.png'),
(7, '3', 'liaamel', '12345678', 'Lia Amelia Farmisah\r\n', 'Bone putra, 25 November 2002', 'Perempuan', 'Islam', 'Pelajar', 'Harapan tani Rt 023 Rw 007', 'Volly, travelling', '082226878996\r\n', 'Lia amelia farmisah', '', 'Anggota', 'avatar_female.png'),
(8, '3', 'amrinarosi', '12345678', 'Amrina Rosida\r\n', 'Kempas Jaya 14 Mei 2002', 'Perempuan', 'Islam', 'Mahasiswa', 'Blok d Kempas jaya', 'Membaca', '082283862694\r\n', 'Amrina145', '', 'Anggota', 'avatar_female.png'),
(9, '3', 'bagusper', '12345678', 'Muhammad alim bagus perwira\r\n', 'Tembilahan 01 Mei 2001', 'Perempuan', 'Islam', 'Pemuda', 'RT 01 RW 01 kelurahan harapan tani kecematan kempas kabupaten Indragiri hilir provinsi Riau', 'Olahraga,seni', '081268166650\r\n', '@Liim_x', '', 'Anggota', 'avatar_female.png'),
(10, '3', 'rayudi', '12345678', 'Rayudi\r\n', 'kempas jaya 30 12 2000', 'Laki Laki', 'Islam', 'Pemuda', 'Kempas jaya', 'Volly', '082134144697\r\n', '', '', 'Anggota', 'avatar_male.png'),
(11, '3', 'erwin', '12345678', 'Erwin', 'Kempas jaya, 16 Juni 1997', 'Laki Laki', 'Islam', 'Pemuda', 'Rw.01 Rt.02\r\n', 'Sepak bola, futsal', '082283862694', 'Erwin, @Erwin.phalo', '', 'Anggota', 'avatar_male.png'),
(12, '3', 'agussap', '12345678', 'Agus saputra', 'Pulau burung 15 08 1994', 'Laki Laki', 'Islam', 'Pemuda', 'Parit hidayat rt 12 rw 06 desa sungai gantang\r\n', 'Olahraga', '081268166650', 'Fb agoes sapoetra', '', 'Anggota', 'avatar_male.png'),
(13, '3', 'arifrahman', '12345678', 'Arif Rahman hakim', 'Nusantara jaya,08-12-2002', 'Laki Laki', 'Islam', 'Pemuda', 'Km 08,harapan tani', '', '082134144697', 'Instagram: ariprh.25', '', 'Anggota', 'avatar_male.png'),
(14, '3', 'syahrulm', '12345678', 'Muhammad Syahrul', 'Kempas jaya, 3 Oktober 1999', 'Laki Laki', 'Islam', 'Mahasiswa', 'RT 02/RW 01 Kempas Jaya\r\n', 'Futsal, sepak bola, voly dan lainnya', '081299664346', '@mhd_syahrul', '', 'Anggota', 'avatar_male.png'),
(15, '3', 'dwiyunianti', '12345678', 'Dwi Yunianti', 'Kempas jaya, 26 Juni 2000', 'Perempuan', 'Islam', 'Mahasiswa', 'Kempas Jaya, RW.5 RT.1 jalan patmo\r\n', 'Melagu', '082211545709', 'FB: Dwi Yunianti Instagram: dwiyunianti00', '', 'Anggota', 'avatar_female.png'),
(16, '3', 'maryadim', '12345678', 'Muhammad Maryadi', 'Kempas jaya, 30-03-1997', 'Laki Laki', 'Islam', 'Pemuda', 'Rw 01 Rt 02 Kempas jaya\r\n', '', '08127601440', '', '', 'Anggota', 'avatar_male.png'),
(17, '3', 'recsy', '12345678', 'Recsy Jusán', 'SUNGAI GUNTUNG 24 JULY 2000', 'Laki Laki', 'Islam', 'Mahasiswa', 'DESA PEKAN TUA\r\n', 'MAKAN MAKAN', '082268887326', 'Fb : Koko Recsy ig : koko_recsy24', '', 'Anggota', 'avatar_male.png'),
(18, '3', 'pfrianto', '12345678', 'Putra Frianto', 'Sei.gantang/09 Juni 2002', 'Laki Laki', 'Islam', 'Pelajar', 'Km 3 rt 19 RW 10 dusun simpang teluk Medan desa sei.gantang kec.kempas\r\n', 'Futsal', '081266590502', 'Putra', '', 'Anggota', 'avatar_male.png'),
(19, '3', 'fahrulrozi', '12345678', 'Muhammad Fahrul Rozi', 'Rumbai Jaya, 26 Juni 1998', 'Laki Laki', 'Islam', 'Mahasiswa', 'Desa Danau Pulai Indah\r\n', 'Berwirausaha', '082253406261', 'Muhammad Fahrul ROzi, fahrul.rozi98', '', 'Anggota', 'avatar_male.png'),
(20, '3', 'syahrul12', '12345678', 'Syahrul', 'Sialang panjang 17 mei 2003', 'Laki Laki', 'Islam', 'Pemuda', 'Sungai ara. Kec. Kempas\r\n', 'Vollyball', '085364342617', 'Fb.instagram', '', 'Anggota', 'avatar_male.png'),
(21, '3', 'febrymar', '12345678', 'Kholydhin Febry Maryono', 'Teluk Kiambang, 11-02-2000', 'Laki Laki', 'Islam', 'Mahasiswa', 'Jl. Pelabuhan Samudra II ,Prt. Sidomulyo ,Km.8\r\n', 'Olahraga', '082288467158', 'Kholydhin,khoo_241', '', 'Anggota', 'avatar_male.png'),
(22, '3', 'alfredo', '12345678', 'Alfredo Saputra', 'Rengat 16 November 2000', 'Laki Laki', 'Islam', 'Mahasiswa', 'Rw 6 Rt 4 Kempas Jaya\r\n', 'Olahraga/Volleyball', '085356847575', 'Alfredo Scout', '', 'Anggota', 'avatar_male.png'),
(23, '3', 'mahendra', '12345678', 'Mahendra', 'Kempas Jaya 09 Maret 2003', 'Laki Laki', 'Islam', 'Pelajar', 'Kempas Jaya blok b\r\n', 'Membaca', '081340623394', 'Mahendra, @mhndra0903', '', 'Anggota', 'avatar_male.png'),
(24, '3', 'khairilaz', '12345678', 'Khairil Azhar', 'Teluk Kiambang 09 Desember 2002', 'Laki Laki', 'Islam', 'Pelajar', 'RT 4 RW 1 Desa Teluk Kiambang\r\n', 'Traveling', '082285895905', 'Khairil Azhar', '', 'Anggota', 'avatar_male.png'),
(25, '3', 'Irfansyah', '12345678', 'Irfansyah', 'Rumbai jaya, km. 5 / 05-12-1998', 'Laki Laki', 'Islam', 'Mahasiswa', 'Kel. Harapan tani Rt. 06 Rw. 03\r\n', 'Traveling', '082284049950', 'Irfansyah, irfaan.syh', '', 'Anggota', 'avatar_male.png'),
(26, '3', 'sitifatimah', '12345678', 'Siti fatimah', '26 November 2001', 'Perempuan', 'Islam', 'Mahasiswa', 'Desa harapan tani, rt 005/ rw 003\r\n', 'Olahraga', '082288202259', 'Sitifatimah596', '', 'Anggota', 'avatar_female.png'),
(27, '3', 'restubagus', '12345678', 'Restu Bagus Ananda', 'Kempas Jaya / 30-maret', 'Laki Laki', 'Islam', 'Mahasiswa', 'RW.05 RT.01 Kempas Jaya\r\n', 'Seni Musik dan Teknologi', '081277522081', '@recthu', '', 'Anggota', 'avatar_male.png'),
(28, '3', 'mthandra', '12345678', 'Muhammad Thandra', 'Tembilhan 22 10 2001', 'Laki Laki', 'Islam', 'Pemuda', 'Harapan Tani\r\n', 'volly', '082287044670', '', '', 'Anggota', 'avatar_male.png'),
(29, '3', 'irvantan', '12345678', 'Irvan Tantowi', 'Irvan Tantowi	Rumbai jaya 16 Juli 2002', 'Laki Laki', 'Islam', 'Pelajar', 'Blok C Rumbai Jaya\r\n', 'SeniMusik & Sastra', '082385046975', 'Fb:Owi. Ig:Irvanpsht1922', '', 'Anggota', 'avatar_male.png'),
(30, '3', 'asrofi', '12345678', 'Asrofi', 'Kempas jaya 02 November 1998', 'Laki Laki', 'Islam', 'Mahasiswa', 'Kempas jaya\r\n', 'Futsal', '082386824301', '', '', 'Anggota', 'avatar_male.png'),
(31, '3', 'revigus', '12345678', 'Revi Gusriandi', 'Teluk Bunian 23 Agustus 1995', 'Laki Laki', 'Islam', 'Pemuda', 'Pasar Teluk Bunian\r\n', 'Game', '082284933860', 'Revi', '', 'Anggota', 'avatar_male.png'),
(32, '3', 'sintanur', '12345678', 'Sinta Nurani', 'Kempas Jaya,19 September 2002', 'Perempuan', 'Islam', 'Pelajar', 'Kempas Jaya Blok c\r\n', 'Olahraga', '081261808245', 'Fb,Instagram', '', 'Anggota', 'avatar_female.png'),
(33, '3', 'rismarah', '12345678', 'Risma Rahman', 'kempas jaya, 21 mei 1999', 'Perempuan', 'Islam', 'Mahasiswa', 'Jl. Pendidikan\r\n', 'Travelling', '082283858683', 'Fb Risma Rahman, instagram risma_rhmn21', '', 'Anggota', 'avatar_female.png'),
(34, '3', 'sriyati', '12345678', 'Sri yati', 'Politani 22_02_2004', 'Perempuan', 'Islam', 'Pelajar', 'Politani\r\n', 'Buat puisi', '082260514140', 'Wak keling', '', 'Anggota', 'avatar_female.png'),
(35, '3', 'sheliher', '12345678', 'Sheli hermila', 'Sungai gantang 25 juni', 'Perempuan', 'Islam', 'Mahasiswa', 'Sungai gantang\r\n', 'Nyanyi', '081262115282', 'Sheli hermila, @sheliherm_', '', 'Anggota', 'avatar_female.png'),
(36, '3', 'haslinda', '12345678', 'Haslinda', 'Nipah panjang 12-12-2003', 'Perempuan', 'Islam', 'Pelajar', 'Km 8 harapan tani\r\n', 'Membaca', '082287180725', 'Linda', '', 'Anggota', 'avatar_female.png'),
(37, '3', 'hikmahnur', '12345678', 'Hikmah nur imaniah', 'Sungai Gantang, 09 Juli 1999', 'Perempuan', 'Islam', 'Mahasiswa', 'Parit Bulan Menganbang\r\n', 'Menari', '082239265202', 'Hikmah Nur Imaniah', '', 'Anggota', 'avatar_female.png'),
(38, '3', 'rozapran', '12345678', 'R. Roza Prantika', 'Mumpa, 05 Mei 1999', 'Perempuan', 'Islam', 'Mahasiswa', 'Sungai sejuk\r\n', 'Jalan jalan', '081313367660', 'Ig: rajaprantika', '', 'Anggota', 'avatar_female.png'),
(39, '3', 'novitayola', '12345678', 'Novita Yola', 'Mumpa, 28-11-1999', 'Perempuan', 'Islam', 'Mahasiswa', 'Simpang 4 kuala rumbai\r\n', '', '082285262732', '@nvtyola_', '', 'Anggota', 'avatar_female.png'),
(40, '3', 'nurgayah', '12345678', 'Nurgayah', 'Rumbai / 29- september- 2001', 'Perempuan', 'Islam', 'Mahasiswa', 'Dusun rumbai sejuk\r\n', 'Menggambar', '082385893733', 'Nurgayah, @nurgayah45', '', 'Anggota', 'avatar_female.png'),
(41, '3', 'robiardian', '12345678', 'Robi Ardiansyah Putra', 'Guntung 09092000', 'Laki Laki', 'Islam', 'Mahasiswa', 'Rumbay\r\n', 'Pimpong', '082174353478', 'Robi_ardiansyah_putra', '', 'Anggota', 'avatar_male.png'),
(43, '3', 'agustina', '12345678', 'ANDI AGUSTINA', '2 Agustus 2003', 'Perempuan', 'Islam', 'Pelajar', 'KM 8 Harapan Tani\r\n', 'Voli', '082383574071', 'Andi Agustina,agustinaandi21', '', 'Anggota', 'avatar_female.png'),
(44, '3', 'karmila', '12345678', 'Karmila', 'Tembilahan. 04 juli 2004', 'Perempuan', 'Islam', 'Pelajar', 'Kelurahan harapan tani\r\n', 'Membaca', '082268604998', 'Fb: karmila. Ig:karmilafu_04', '', 'Anggota', 'avatar_female.png'),
(45, '3', 'rizkyagung', '12345678', 'RIZKI AGUNG PRATAMA', 'Bagan jaya,28,Desember,2002', 'Laki Laki', 'Islam', 'Pelajar', 'SUNGAI ARA\r\n', 'Olahraga', '082268707616', '082268707616	FB,agung putra pashter', '', 'Anggota', 'avatar_male.png'),
(46, '3', 'fauzanpur', '12345678', 'Fauzan purma ramadhan', 'Kuala enok, 11 desember 2000', 'Laki Laki', 'Islam', 'Mahasiswa', 'Sungai putat\r\n', 'Banyak', '082284050205', 'Fb : fauzan purma ramadhan ig : @fauzan_ramadhan45', '', 'Anggota', 'avatar_male.png'),
(47, '3', 'suriyah', '12345678', 'SURIYAH', 'SUHADA,15 NOVEMBER 1999', 'Perempuan', 'Islam', 'Mahasiswa', 'km8 ,harapan tani\r\n', 'membaca..', '082217005534', 'fb(suriyah),ig(suriyah457)', '', 'Anggota', 'avatar_female.png'),
(48, '3', 'renisep', '12345678', 'Reni septiana', 'Kuala Rumbai, 24-09-2001', 'Perempuan', 'Islam', 'Pemuda', 'Rumbai\r\n', 'Membaca', '082323375607', 'reniseptiana3842', '', 'Anggota', 'avatar_female.png'),
(49, '3', 'ratnakar', '12345678', 'Ratna Karmila', 'Rumbai/18 Februari 2001', 'Perempuan', 'Islam', 'Mahasiswa', 'Rumbai\r\n', 'Nonton', '082288790563', 'mailasyarba', '', 'Anggota', 'avatar_female.png'),
(50, '3', 'bagushadi', '12345678', 'bagus hadi nurrahmat', 'Tembilahan 23 agustus 2000', 'Laki Laki', 'Islam', 'Mahasiswa', 'Kempas', 'bola', '081363019268', 'bola', '', 'Anggota', 'avatar_male.png'),
(54, '3', 'hanissa', 'hanissa123', 'Hanissa', '2001-10-03', 'Perempuan', 'Islam', 'Mahasiswa', 'Rt 1 rw 2 parit buncit, kel. Kempas jaya, kec. Kempas', '', '082282657558', ',,', '', 'Anggota', 'avatar_female.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_donatur`
--

CREATE TABLE `user_donatur` (
  `Id_donatur` int(11) NOT NULL,
  `Role` int(1) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Jenis_kelamin` enum('Laki Laki','Perempuan','','') NOT NULL,
  `Agama` enum('Islam','Kristen','Budha','Hindu','Katolik') NOT NULL,
  `Alamat_rumah` varchar(100) NOT NULL,
  `No_HP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_donatur`
--

INSERT INTO `user_donatur` (`Id_donatur`, `Role`, `Username`, `Password`, `Nama`, `Jenis_kelamin`, `Agama`, `Alamat_rumah`, `No_HP`) VALUES
(1, 4, 'bnagantara', 'bnagantara123', 'saddan bima nagantara', 'Laki Laki', 'Islam', 'jl singosaren no 99', '089879689');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `iuran_kurban`
--
ALTER TABLE `iuran_kurban`
  ADD PRIMARY KEY (`Id_iuran`),
  ADD KEY `Id_kaskurban` (`Id_kaskurban`);

--
-- Indexes for table `kas_kurban`
--
ALTER TABLE `kas_kurban`
  ADD PRIMARY KEY (`Id_kaskurban`),
  ADD KEY `Id` (`Id_anggota`),
  ADD KEY `Id_donatur` (`Id_donatur`);

--
-- Indexes for table `kas_organisasi`
--
ALTER TABLE `kas_organisasi`
  ADD PRIMARY KEY (`id_KasOrganisasi`),
  ADD KEY `Id` (`Id_anggota`);

--
-- Indexes for table `user_anggota`
--
ALTER TABLE `user_anggota`
  ADD PRIMARY KEY (`Id_anggota`);

--
-- Indexes for table `user_donatur`
--
ALTER TABLE `user_donatur`
  ADD PRIMARY KEY (`Id_donatur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `iuran_kurban`
--
ALTER TABLE `iuran_kurban`
  MODIFY `Id_iuran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kas_kurban`
--
ALTER TABLE `kas_kurban`
  MODIFY `Id_kaskurban` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `kas_organisasi`
--
ALTER TABLE `kas_organisasi`
  MODIFY `id_KasOrganisasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_anggota`
--
ALTER TABLE `user_anggota`
  MODIFY `Id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_donatur`
--
ALTER TABLE `user_donatur`
  MODIFY `Id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iuran_kurban`
--
ALTER TABLE `iuran_kurban`
  ADD CONSTRAINT `iuran_kurban_ibfk_1` FOREIGN KEY (`Id_kaskurban`) REFERENCES `kas_kurban` (`Id_kaskurban`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kas_kurban`
--
ALTER TABLE `kas_kurban`
  ADD CONSTRAINT `kas_kurban_ibfk_1` FOREIGN KEY (`Id_anggota`) REFERENCES `user_anggota` (`Id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kas_kurban_ibfk_2` FOREIGN KEY (`Id_donatur`) REFERENCES `user_donatur` (`Id_donatur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kas_organisasi`
--
ALTER TABLE `kas_organisasi`
  ADD CONSTRAINT `kas_organisasi_ibfk_1` FOREIGN KEY (`Id_anggota`) REFERENCES `user_anggota` (`Id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
