-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 07:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_login` int(16) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_role` varchar(20) NOT NULL,
  `id_kecamatan` varchar(20) NOT NULL,
  `id_desa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contoh`
--

CREATE TABLE `contoh` (
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_desa`
--

CREATE TABLE `data_desa` (
  `id_ds` tinyint(1) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_desa` varchar(20) NOT NULL,
  `id_kec` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(20) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_desa`
--

INSERT INTO `data_desa` (`id_ds`, `nik`, `id_desa`, `id_kec`, `nama`, `kode`, `alamat`, `kodepos`, `nohp`, `website`, `email`) VALUES
(1, '508', '3507010004', '3507010', 'Risma Dewi ', '0123456789', 'Jl. Panji, Penarukan, Kec. Kepanjen, Kabupaten Malang, Jawa Timur', '65153', '234545546', 'https://malangkab.go.id/mlg/default/home', 'info@malang.id'),
(2, '2233', '3507090011', '3507090', 'kaka', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pejabat`
--

CREATE TABLE `data_pejabat` (
  `nip` int(11) NOT NULL,
  `nm_pejabat` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `id_desa` varchar(20) NOT NULL,
  `id_kec` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pejabat`
--

INSERT INTO `data_pejabat` (`nip`, `nm_pejabat`, `jabatan`, `pangkat`, `id_desa`, `id_kec`) VALUES
(123, 'Kim Jun Myeon', 'Sekretaris Desa', 'ygioohhoj', '3507010004', '3507010'),
(8565376, 'KIM', 'Kepala Desa', 'ygioohhoj', '3507010004', '3507010');

-- --------------------------------------------------------

--
-- Table structure for table `data_request`
--

CREATE TABLE `data_request` (
  `id_request` int(20) NOT NULL,
  `id_berkas` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `acc` date NOT NULL,
  `form_tambahan` varchar(255) NOT NULL DEFAULT '0',
  `no_urut` int(11) NOT NULL,
  `id_kec` varchar(20) NOT NULL,
  `id_desa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_request`
--

INSERT INTO `data_request` (`id_request`, `id_berkas`, `nik`, `nip`, `keperluan`, `keterangan`, `tanggal_request`, `status`, `acc`, `form_tambahan`, `no_urut`, `id_kec`, `id_desa`) VALUES
(42, '11', '1204', '', '', 'tes2', '2022-11-24 00:50:17', 1, '2022-11-24', '', 7, '3507010', '3507010004'),
(46, '12', '1204', '', '', 'Indonesia', '2022-11-24 00:55:33', 1, '2022-11-16', '', 9, '3507010', '3507010004'),
(48, '1', '2711', '', '', 'tes haha', '2022-11-24 01:54:04', 1, '0000-00-00', '', 10, '3507010', '3507010004'),
(49, '18', '2711', '', '', 'Mau Nikah', '2022-11-24 01:59:14', 1, '2022-11-22', '', 12, '3507010', '3507010004'),
(50, '2', '1201', '', 'Data Lengkap', 'succes', '2022-11-24 01:17:54', 1, '0000-00-00', '', 5, '3507010', '3507010004'),
(51, '1', '2711', '', 'lengkap', 'tes1', '2022-11-24 00:43:36', 1, '0000-00-00', '', 4, '3507010', '3507010004'),
(52, '1', '3333', '', '', 'domisili', '2022-11-23 04:56:08', 0, '0000-00-00', '', 0, '3507260', '3507260014'),
(53, '2', '2711', '', 'lengkap', 'tess', '2022-11-24 01:25:13', 1, '0000-00-00', '', 6, '3507010', '3507010004'),
(54, '2', '2711', '', 'SKU', 'tess', '2022-11-24 01:12:50', 1, '2022-11-08', '', 11, '3507010', '3507010004'),
(55, '2', '2711', '', '', 'texx', '2022-12-07 04:04:46', 1, '2022-12-07', '', 18, '3507010', '3507010004'),
(56, '3', '3509166409020001', '', '', 'mjdjfjdfjs', '2022-12-07 05:03:59', 0, '0000-00-00', 'Luas_Tanah,nama_anak', 0, '3507140', '3507140002'),
(57, '3', '2711', '', '', 'njdfdbvnd', '2022-12-07 05:03:59', 1, '2022-12-06', 'Luas_Tanah,nama_anak', 13, '3507010', '3507010004'),
(58, '3', '2711', '', 'jhjn', 'ghjsdfjs', '2022-12-07 04:16:32', 1, '2022-12-14', 'luas_tanah:1', 16, '3507010', '3507010004'),
(59, '3', '2711', '', '', 'cdf', '2022-12-07 04:01:34', 1, '2022-12-07', 'luas_tanah:123', 17, '3507010', '3507010004'),
(60, '5', '2711', '', '', 'jdfhs', '2022-12-07 04:34:37', 1, '2022-11-28', 'nm_organisasi:ndsnm,f,alamat_organisasi:dfsdnvm,nm_ketua:fdfds,', 19, '3507010', '3507010004');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sku`
--

CREATE TABLE `data_request_sku` (
  `id_request_sku` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `usaha` varchar(30) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'USAHA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_request_sku`
--

INSERT INTO `data_request_sku` (`id_request_sku`, `nik`, `tanggal_request`, `usaha`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(10, '3509166409020001', '2022-10-10 01:34:13', 'Pakaian', 'SKU', 'Surat sedang dalam proses cetak', 'USAHA', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_surat`
--

CREATE TABLE `data_surat` (
  `id_surat` int(11) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `template` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `nik` varchar(16) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(225) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `idpekerjaan` varchar(20) NOT NULL,
  `status_warga` varchar(30) NOT NULL,
  `warganegara` varchar(10) NOT NULL,
  `status_nikah` varchar(20) NOT NULL,
  `id_kec` varchar(50) NOT NULL,
  `id_desa` varchar(50) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kodepos` varchar(20) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_anak` varchar(200) NOT NULL,
  `tempat_lahir_anak` varchar(100) NOT NULL,
  `tanggal_lahir_anak` varchar(100) NOT NULL,
  `jekel_anak` varchar(100) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `nm_organisasi` varchar(100) NOT NULL,
  `alamat_organisasi` varchar(100) NOT NULL,
  `nm_ketua` varchar(100) NOT NULL,
  `nik_ayah` varchar(100) NOT NULL,
  `nik_ibu` varchar(100) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `tahun_usaha` varchar(100) NOT NULL,
  `alamat_usaha` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `idpekerjaan`, `status_warga`, `warganegara`, `status_nikah`, `id_kec`, `id_desa`, `rt`, `rw`, `kode`, `kodepos`, `nohp`, `website`, `email`, `nama_anak`, `tempat_lahir_anak`, `tanggal_lahir_anak`, `jekel_anak`, `sekolah`, `jurusan`, `semester`, `nm_organisasi`, `alamat_organisasi`, `nm_ketua`, `nik_ayah`, `nik_ibu`, `nama_usaha`, `tahun_usaha`, `alamat_usaha`, `tujuan`) VALUES
('0605', '1234', 'Pemohon', 'Byun Baekhyun', '1992-05-06', 'seoul', 'Laki-Laki', '', 'Seoul', '', '8', '', '', '', '3507010-3507010004', '3507010004', '01', '09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('1112', '1234', 'Admin Desa', 'berlian', '0000-00-00', '', '', '', '', '', '', '', '', '', '3507090', '3507090001', '', '', '', '', '081', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('1201', '1234', 'Pemohon', 'D.O. Kyungsoo', '1993-01-12', 'seoul', 'Laki-Laki', 'Islam', ' Seoul', '', '0', 'Sekolah', '', '', '3507010', '3507010004', '02', '09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('1204', '1234', 'Pemohon', 'Oh Sehun', '1994-04-12', 'seoul', 'Laki-Laki', '', 'Seoul', '', '0', '', '', '', '3507010', '3507010004', '02', '02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('123', '123', 'Admin Desa', 'jhjhjk', '0000-00-00', '', '', '', '', '', '', '', '', '', '3507070', '3507070007', '', '', '', '', '12345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('1401', '1234', 'Pemohon', 'Kim Jongin', '1994-01-14', 'seoul', 'Laki-Laki', '', 'Seoul', '', '0', '', '', '', '3507010', '3507010004', '01', '01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2', '2', 'Admin Desa', 'coba', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', '0', 'Kerja', '', '', '3507140', '3507140002', '0', '0', '252525', '68171', '085', 'youtube', 'malang@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2109', '1234', 'Pemohon', 'Kim Jongdae', '1992-09-21', 'seoul', 'Laki-Laki', '', 'Seoul', '', '0', '', '', '', '3507010', '3507010004', '08', '09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2205', '1234', 'Pemohon', 'Kim Jun Myeon', '1991-05-22', 'seoul', 'Laki-Laki', '', 'Seoul', '', '0', '', '', '', '3507010', '3507010004', '03', '022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2233', '1234', 'Admin Desa', 'kaka', '0000-00-00', '', '', '', '', '', '', '', '', '', '3507090', '3507090011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2409', '1234', 'Admin Desa', 'aku', '0000-00-00', '', 'Perempuan', '', 'Jl. Panji, Penarukan, Kec. Kepanjen, Kabupaten Malang, Jawa Timur 65163', '', '0', '', '', '', '3507040', '3507040005', '001', '022', '240902', '65163', '081', 'web', 'malang@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('240902', '123456', 'Pemohon', 'Risma Dewi Septiani', '2002-09-24', 'Jember', 'Perempuan', '', '', '', '', '', '', '', '3507010', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2603', '1234', 'Pemohon', 'Kim Minseok', '1990-03-26', 'seoul', 'Laki-Laki', '', 'Seoul', '', '0', '', '', '', '3507010', '3507010004', '04', '07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2708', 'risma', 'Pemohon', 'Park', '2020-11-27', 'seoul', 'Laki-Laki', 'Islam', ' Korea', '', '0', 'Sekolah', '', '', '3507040', '3507040005', '003', '022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('2711', '1234', 'Pemohon', 'Park\'Chanyeol#!_aasd', '1992-11-27', 'seoul', 'Laki-Laki', 'Islam', '    Seoul', '', '8', 'Sekolah', '', '', '3507010', '3507010004', '008', '012', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('3', '3', 'Admin Pemkab', 'Admin Pemkab', '2022-10-10', 'hhjsj', 'Laki-laki', 'Islam', 'tesssss', '98867564', '0', 'kerja', '', '', '', '', '0', '0', '', '', '', '', 'nofairaamin@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('300', '1234', 'Admin Desa', 'nofa', '2022-10-17', 'Madura', 'Perempuan', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('3333', '123456', 'Pemohon', 'Nofa', '2002-12-13', 'Jember', 'Laki-Laki', 'Islam', '', '', '6', 'Sekolah', 'WNI', 'Belum Kawin', '3507260-3507260014', '3507260014', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('3509166409020001', '123456', 'Pemohon', 'Risma', '2002-09-24', 'Jember', 'Perempuan', 'Islam', '                         Jl Dimaruddin Cangkring Jenggawah', '081553201636', '0', 'Sekolah', 'WNI', 'Belum Kawin', '3507140', '3507140002', '1', '3', '', '', '', '', 'saviramasita@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('508', '123456789', 'Admin Desa', 'EXO', '0000-00-00', '', 'Laki-Laki', '', 'Seoul', '', '0', '', '', '', '3507010', '3507010004', '008', '012', '240902', '68171', '081234567892', 'https://en.wikipedia.org/wiki/Exo', 'exo@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('5555', '1234', 'Admin Desa', 'Junior', '0000-00-00', '', '', '', '', '', '', '', '', '', '3507260', '3507260014', '', '', '', '', '084', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_berkas`
--

CREATE TABLE `master_berkas` (
  `id_berkas` int(10) NOT NULL,
  `judul_berkas` varchar(255) NOT NULL,
  `kode_berkas` varchar(10) NOT NULL,
  `kode_belakang` varchar(10) NOT NULL,
  `template` text NOT NULL,
  `form_tambahan` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_berkas`
--

INSERT INTO `master_berkas` (`id_berkas`, `judul_berkas`, `kode_berkas`, `kode_belakang`, `template`, `form_tambahan`) VALUES
(1, 'Surat Keterangan<br>Domisili Duplikat', '2023', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan , Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaan</td>\r\n			<td>: $pekerjaan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat<br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Dengan ini menerangkan bahwa benar yang bersangkutan berdomisili $alamat sesuai dengan alamat sebagaimana tersebut di atas.&nbsp;di $alamat_domisili. $domisili_sejak. Sejak tahun $domisili_sejak sampai dengan sekarang. Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</span></span></p>\r\n', 'Alamat_Domisili,Domisili_Sejak,Tujuan_Permohonan,Keterangan_Tambahan'),
(2, 'Surat<br>Rekomendasi', '207', '26.2009/VI', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan , Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaan</td>\r\n			<td>: $pekerjaan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat<br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Surat rekomendasi ini dibuat untuk $tujuan_permohonan $keterangan_tambahan.</p>\r\n\r\n<p>Demikian rekomendasi ini dibuat dan diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya</p>\r\n', 'Tujuan_Permohonan,Keterangan_Tambahan'),
(3, 'Surat Keterangan Tanah Tidak Sengketa', '210', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan , Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaan</td>\r\n			<td>: $pekerjaan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat<br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Berdasarkan Surat Pengantar Ketua RT. $rt RW. $rw no. $no_pengantar Tanggal $tanggal_permohonan. Dengan ini menyatakan bahwa nama tersebut diatas adalah benar pemilik atas sebidang tanah seluas $luas_tanah&nbsp;m2, yang terletak di $lokasi_tanah&nbsp; berdasarkan $jenis_surat_tanah&nbsp;dengan nomor: $nomor_surat_tanah tidak dalam sengketa dengan pihak manapun. Surat keterangan ini dibuat untuk $tujuan_permohonan. Demikian Surat Keterangan ini diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.</p>\r\n', 'No_Pengantar,Tanggal_Permohonan,Luas_Tanah,_Lokasi_Tanah,Jenis_Surat_Tanah,Nomor_Surat_Tanah,_$Tujuan_Permohonan,'),
(4, 'Surat Keterangan Penghasilan Orangtua', '211', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:701px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaan</td>\r\n			<td>: $status_warga</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			Desa $desa, Kecamatan $kecamatan<br />\r\n			Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Adalah Orang Tua/Wali dari:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:716px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama_anak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir_anak, $tanggal_lahir_anak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jkl_anak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Agama</td>\r\n			<td>: $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat</td>\r\n			<td>: $alamat RT, $rt RW, $rw<br />\r\n			Desa $desa, Kecamatan $kecamatan<br />\r\n			Kabupaten Malang</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nama Sekolah/Universitas</td>\r\n			<td>: $sekolah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jurusan/Program Studi</td>\r\n			<td>: $jurusan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester</td>\r\n			<td>: $semester</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>$no_pengantar_rt Berdasarkan surat pengantar dari ketua RT No. $no_pengantar_rt dengan&nbsp;ini menyatakan bahwa yang bersangkutan diatas memang benar berpenghasilan kurang lebih $jumlah_penghasilan perbulan. Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p>Demikian surat keterangan ini dibuat atas permintaan yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.</p>\r\n', 'Nama_Anak,Tempat_Lahir_Anak,Tanggal_Lahir_Anak,Jenis_Kelamin_Anak,Agama_Anak,Alamat_Anak,Nama_Sekolah,Jurusan,Semester'),
(5, 'Surat Keterangan Domisili Organisasi', '220', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan , Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama Organisasi</td>\r\n			<td>$nama_organisasi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat Organisasi</td>\r\n			<td>$alamat_organisasi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ketua</td>\r\n			<td>$ketua</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Membenarkan bahwa Organisasi tersebut benar berdomisili di wilayah Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten . Sejak tahun $berdomisili_sejak sampai dengan sekarang $domisili_sekarang.</p>\r\n\r\n<p>Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p>Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>\r\n', 'nm_organisasi,alamat_organisasi,nm_ketua'),
(6, 'Surat Keterangan Lainnya', '299', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa : </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Surat Keterangan ini dibuat untuk keperluan $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p>Demikian surat pernyataan ini dibuat , atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>\r\n', '0'),
(7, 'Surat Keterangan Kehilangan', '337', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat , atas perhatian dan kerjasamanya kami ucapkan terima kasih. </span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa : </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Nama tersebut diatas adalah benar warga ini Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten. Dengan ini menerangkan bahwa yang bersangkutan telah kehilangan, berupa: $keterangan_tambahan Surat Keterangan ini dibuat untuk $tujuan_permohonan</p>\r\n\r\n<p>Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p>\r\n', '0'),
(8, 'Surat Keterangan Kelakuan Baik', '339', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten menerangkan dengan sebenarnya, bahwa : </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK AYAH</td>\r\n			<td>: $nik_ayah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK IBU</td>\r\n			<td>: $nik_ibu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Bahwa Orang Tersebut tidak pernah melakukan perbuatan melawan HUKUM</p>\r\n\r\n<p>Surat Keterangan ini dibuat untuk $tujuan_permohonan.</p>\r\n\r\n<p>Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p>\r\n', 'Nik_Ayah,Nik_Ibu_'),
(9, 'Surat Keterangan Tidak Mampu (Prasejahtera)', '401', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa : </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Nama tersebut diatas adalah benar $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten. Berdasarkan keterangan yang ada pada kami benar bahwa yang bersangkutan tergolong keluarga yang tidak mampu. Surat Keterangan ini dibuat untuk $tujuan_permohonan, $keterangan_tambahan</p>\r\n\r\n<p>Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p>\r\n', '0'),
(10, 'Surat Keterangan<br><br>Domisili Lembaga', '413.21', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa :</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:215px; width:670px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama Lembaga</td>\r\n			<td>: $nama_lembaga</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat Lembaga</td>\r\n			<td>: $alamat_lembaga</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nama Pengasuh</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat / Tgl Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			Desa $desa, Kecamatan $kecamatan<br />\r\n			Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Membenarkan bahwa Organisasi tersebut benar berdomisili di wilayah Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten .Sejak tahun $domisili_sejak sampai dengan sekarang $domisili_sekarang. </span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Surat Keterangan ini dibuat untuk $tujuan_permohonan $keterangan_tambahan</span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</span></span></p>\r\n', 'Nama_Lembaga,_Alamat_Lembaga,Nama_Pengasuh'),
(11, 'Surat Keterangan<br><br>Tidak Mampu', '465.3', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa : </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Nama tersebut diatas adalah benar $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten. Berdasarkan keterangan yang ada pada kami benar bahwa yang bersangkutan tergolong keluarga yang tidak mampu. Surat Keterangan ini dibuat untuk $tujuan_permohonan, $keterangan_tambahan.</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</span></span></p>\r\n', '0'),
(12, 'Surat Keterangan<br><br>Domisili', '471.1', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dengan ini menerangkan bahwa benar yang bersangkutan berdomisili $alamat&amp;nbsp;sesuai dengan alamat sebagaimana tersebut di atas. di $alamat_domisili $domisili_sejak. Sejak tahun $domisili_sejak&amp;nbsp;sampai dengan sekarang.&amp;nbsp;Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</span></span></p>\r\n', '0'),
(13, 'Surat Keterangan Beda Identitas', '471.11', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaan</td>\r\n			<td>: $status_warga</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat<br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td>: $alamat RT, $rt RW, $rw<br />\r\n			Desa $desa, Kecamatan $kecamatan,<br />\r\n			Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Adalah Orang Tua/Wali dari:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama Lengkap</td>\r\n			<td>$nm_anak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>$tempat_lahir_anak, $tgl_lahir_anak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>$jekel_anak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Agama</td>\r\n			<td>$agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat<br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td>$alamat RT.$rt RW.$rw<br />\r\n			Desa $desa, Kecamatan $kecamatan<br />\r\n			Kabupaten Malang</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nama Sekolah / Universitas</td>\r\n			<td>$sekolah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jurusan/Program Studi</td>\r\n			<td>$jurusan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester</td>\r\n			<td>$semester</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>$no_pengantar_rt Berdasarkan surat pengantar dari ketua RT No. $no_pengantar_rt dengan ini menyatakan bahwa yang bersangkutan diatas memang benar berpenghasilan kurang lebih $jumlah_penghasilan&amp;nbsp;perbulan. Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat atas permintaan yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '0'),
(14, 'Surat Keterangan Kematian', '472.12', '', '<p><span style=\"font-size:11pt\">Yang bertan<span style=\"font-family:Times New Roman,Times,serif\">da tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:235px; width:689px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bin/Binti</td>\r\n			<td>: $nm_ayah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaaan</td>\r\n			<td>: $status_warga</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Telah meninggal dunia pada:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:106px; width:439px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Tanggal</td>\r\n			<td>: $tanggal_kematian</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jam</td>\r\n			<td>: $waktu</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat Meninggal</td>\r\n			<td>: $tempat_kematian</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sebab Kematian</td>\r\n			<td>: $sebab_kematian</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Surat Keterangan ini dibuat berdasarkan keterangan pelapor:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:80px; width:440px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nm_pelapor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nk_pelapor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat</td>\r\n			<td>: $almt_pelapor</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan.</p>\r\n\r\n<p>Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>\r\n\r\n<p>&nbsp;\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</span></span></p>\r\n</p>\r\n', 'Bin/Binti,Tanggal_Kematian,Jam_Kematian,Tempat_Meninggal,Sebab_Kematian'),
(15, 'Surat Keterangan Usaha', '504', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kbaupaten $kabupaten memberikan rekomendasi kepada: </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:681px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama</td>\r\n			<td>: $nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NIK</td>\r\n			<td>: $nik</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jenis Kelamin</td>\r\n			<td>: $jekel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tempat, Tanggal Lahir</td>\r\n			<td>: $tempat_lahir, $tanggal_lahir</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warganegara/Agama</td>\r\n			<td>: $warganegara, $agama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pekerjaan</td>\r\n			<td>: $status_warga</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Status Pernikahan</td>\r\n			<td>: $status_nikah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat<br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td>: $alamat RT.$rt RW.$rw<br />\r\n			Desa $desa, Kecamatan $kecamatan<br />\r\n			Kabupaten Malang</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Sesuai dengan surat pengantar ketua RT No. $no_pengantar_rt dan keterangan yang bersangkutan benar nama tersebut diatas mempunyai usaha sebagai berikut :</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:106px; width:338px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama Usaha</td>\r\n			<td>: $nama_usaha</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mulai Usaha Sejak</td>\r\n			<td>: $mulai_usaha_sejak</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat Usaha</td>\r\n			<td>: $alamat_usaha</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tujuan</td>\r\n			<td>: $tujuan_usaha</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya. </span></span></p>\r\n', 'Nama_Usaha,Mulai_Usaha_Sejak,Alamat_Usaha,Tujuan_Usaha'),
(16, 'Surat Keterangan Domisili Perusahaan', '530', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:80px; width:392px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Nama Organisasi</td>\r\n			<td>: $nama_organisasi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Alamat Organisasi</td>\r\n			<td>: $alamat</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ketua</td>\r\n			<td>: $nama_ketua</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Membenarkan bahwa Organisasi tersebut benar berdomisili di wilayah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten $domisili_sejak&amp;nbsp; Sejak tahun $domisili_sejak sampai dengan sekarang.</p>\r\n\r\n<p>Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat , atas perhatian dan kerjasamanya kami ucapkan terima kasih. </span></span></p>\r\n', 'Nama_OrganisasiAlamat_Organisasi,Ketua_Organisasi'),
(17, 'Surat Pernyataan Lainnya', '399', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa : </span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Surat Pernyataan ini dibuat untuk keperluan $tujuan_permohonan, $keterangan_tambahan</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11.0pt\">Demikian surat pernyataan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</span></span></p>\r\n', '0'),
(18, 'Surat Keterangan Belum Menikah', '472.2', '', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Yang bertanda tangan dibawah ini jabatan $jabatan Desa $desa, Kecamatan $kecamatan, Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:251px; width:578px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Nama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">NIK</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $nik</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Jenis Kelamin</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $jekel</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tempat, Tanggal Lahir</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $tempat_lahir, $tanggal_lahir</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Warganegara/Agama</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $warganegara, $agama</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Pekerjaan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_warga</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Status Pernikahan</span></span></td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $status_nikah</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat</span></span><br />\r\n			<br />\r\n			&nbsp;</td>\r\n			<td><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">: $alamat RT.$rt RW.$rw<br />\r\n			&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n			&nbsp; Kabupaten Malang</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Nama tersebut diatas adalah benar warga Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten. Berdasarkan pernyataan yang bersangkutan Tanggal $tanggal_permohonan_format dengan ini menerangkan bahwa benar Belum Pernah Menikah dengan siapapun. Surat keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11pt\">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</span></span></p>\r\n', '0'),
(49, '', '', '', '', 'luas_tanah');

-- --------------------------------------------------------

--
-- Table structure for table `mst_desa`
--

CREATE TABLE `mst_desa` (
  `id_kec` int(15) NOT NULL,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `nm_desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='master desa' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_desa`
--

INSERT INTO `mst_desa` (`id_kec`, `id_desa`, `nm_desa`) VALUES
(3507010, 3507010001, 'SUMBEROTO'),
(3507010, 3507010002, 'PURWOREJO'),
(3507010, 3507010003, 'MENTARAMAN'),
(3507010, 3507010004, 'DONOMULYO'),
(3507010, 3507010005, 'TEMPURSARI'),
(3507010, 3507010006, 'TLOGOSARI'),
(3507010, 3507010007, 'KEDUNGSALAM'),
(3507010, 3507010008, 'BANJARJO'),
(3507010, 3507010009, 'TULUNGREJO'),
(3507010, 3507010010, 'PURWODADI'),
(3507020, 3507020001, 'ARJOSARI'),
(3507020, 3507020002, 'TUMPAKREJO'),
(3507020, 3507020003, 'KALIASRI'),
(3507020, 3507020004, 'PUTUKREJO'),
(3507020, 3507020005, 'SUMBERPETUNG'),
(3507020, 3507020006, 'KALIPARE'),
(3507020, 3507020007, 'SUKOWILANGUN'),
(3507020, 3507020008, 'ARJOWILANGUN'),
(3507020, 3507020009, 'KALIREJO'),
(3507030, 3507030001, 'SUMBERMANJING KULON'),
(3507030, 3507030002, 'PANDANREJO'),
(3507030, 3507030003, 'SUMBERKERTO'),
(3507030, 3507030004, 'SEMPOL'),
(3507030, 3507030005, 'PAGAK'),
(3507030, 3507030006, 'SUMBERREJO'),
(3507030, 3507030007, 'GAMPINGAN'),
(3507030, 3507030008, 'TLOGOREJO'),
(3507040, 3507040001, 'BANDUNGREJO'),
(3507040, 3507040002, 'SUMBERBENING'),
(3507040, 3507040003, 'SRIGONCO'),
(3507040, 3507040004, 'WONOREJO'),
(3507040, 3507040005, 'BANTUR'),
(3507040, 3507040006, 'PRINGGODANI'),
(3507040, 3507040007, 'REJOSARI'),
(3507040, 3507040008, 'WONOKERTO'),
(3507040, 3507040009, 'REJOYOSO'),
(3507040, 3507040010, 'KARANGSARI'),
(3507050, 3507050001, 'TUMPAKREJO'),
(3507050, 3507050002, 'SINDUREJO'),
(3507050, 3507050003, 'GAJAHREJO'),
(3507050, 3507050004, 'SIDODADI'),
(3507050, 3507050005, 'GEDANGAN'),
(3507050, 3507050006, 'SEGARAN'),
(3507050, 3507050007, 'SUMBEREJO'),
(3507050, 3507050008, 'GIRIMULYO'),
(3507060, 3507060001, 'SITIARJO'),
(3507060, 3507060002, 'TAMBAKREJO'),
(3507060, 3507060003, 'KEDUNGBANTENG'),
(3507060, 3507060004, 'TAMBAKASRI'),
(3507060, 3507060005, 'TEGALREJO'),
(3507060, 3507060006, 'RINGINKEMBAR'),
(3507060, 3507060007, 'SUMBERAGUNG'),
(3507060, 3507060008, 'HARJOKUNCARAN'),
(3507060, 3507060009, 'ARGOTIRTO'),
(3507060, 3507060010, 'RINGINSARI'),
(3507060, 3507060011, 'DRUJU'),
(3507060, 3507060012, 'SUMBERMANJING WETAN'),
(3507060, 3507060013, 'KLEPU'),
(3507060, 3507060014, 'SEKARBANYU'),
(3507060, 3507060015, 'SIDOASRI'),
(3507070, 3507070001, 'SUKODONO'),
(3507070, 3507070002, 'SRIMULYO'),
(3507070, 3507070003, 'BATURETNO'),
(3507070, 3507070004, 'BUMIREJO'),
(3507070, 3507070005, 'SUMBERSUKO'),
(3507070, 3507070006, 'AMADANOM'),
(3507070, 3507070007, 'DAMPIT'),
(3507070, 3507070008, 'PAMOTAN'),
(3507070, 3507070009, 'MAJANGTENGAH'),
(3507070, 3507070010, 'REMBUN'),
(3507070, 3507070011, 'POJOK'),
(3507070, 3507070012, 'JAMBANGAN'),
(3507080, 3507080001, 'PURWODADI'),
(3507080, 3507080002, 'PUJIHARJO'),
(3507080, 3507080003, 'SUMBERTANGKIL'),
(3507080, 3507080004, 'KEPATIHAN'),
(3507080, 3507080005, 'JOGOMULYAN'),
(3507080, 3507080006, 'TIRTOYUDO'),
(3507080, 3507080007, 'GADUNGSARI'),
(3507080, 3507080008, 'TLOGOSARI'),
(3507080, 3507080009, 'SUKOREJO'),
(3507080, 3507080010, 'AMPELGADING'),
(3507080, 3507080011, 'TAMANKUNCARAN'),
(3507080, 3507080012, 'WONOAGUNG'),
(3507080, 3507080013, 'TAMANSATRIYAN'),
(3507090, 3507090001, 'LEBAKHARJO'),
(3507090, 3507090002, 'WIROTAMAN'),
(3507090, 3507090003, 'TAMANASRI'),
(3507090, 3507090004, 'SONOWANGI'),
(3507090, 3507090005, 'TIRTOMARTO'),
(3507090, 3507090006, 'PURWOHARJO'),
(3507090, 3507090007, 'SIDORENGGO'),
(3507090, 3507090008, 'TIRTOMOYO'),
(3507090, 3507090009, 'TAWANGAGUNG'),
(3507090, 3507090010, 'SIMOJAYAN'),
(3507090, 3507090011, 'ARGOYUWONO'),
(3507090, 3507090012, 'MULYOASRI'),
(3507090, 3507090013, 'TAMANSARI'),
(3507100, 3507100001, 'DAWUHAN'),
(3507100, 3507100002, 'SUMBEREJO'),
(3507100, 3507100003, 'PANDANSARI'),
(3507100, 3507100004, 'NGADIRESO'),
(3507100, 3507100005, 'KARANGANYAR'),
(3507100, 3507100006, 'JAMBESARI'),
(3507100, 3507100007, 'PAJARAN'),
(3507100, 3507100008, 'ARGOSUKO'),
(3507100, 3507100009, 'NGEBRUK'),
(3507100, 3507100010, 'KARANGNONGKO'),
(3507100, 3507100011, 'WONOMULYO'),
(3507100, 3507100012, 'BELUNG'),
(3507100, 3507100013, 'WONOREJO'),
(3507100, 3507100014, 'PONCOKUSUMO'),
(3507100, 3507100015, 'WRINGINANOM'),
(3507100, 3507100016, 'GUBUKKLAKAH'),
(3507100, 3507100017, 'NGADAS'),
(3507110, 3507110001, 'SUMBERPUTIH'),
(3507110, 3507110002, 'WONOAYU'),
(3507110, 3507110003, 'BAMBANG'),
(3507110, 3507110004, 'BRINGIN'),
(3507110, 3507110005, 'DADAPAN'),
(3507110, 3507110006, 'PATOKPICIS'),
(3507110, 3507110007, 'BLAYU'),
(3507110, 3507110008, 'CODO'),
(3507110, 3507110009, 'SUKOLILO'),
(3507110, 3507110010, 'KIDANGBANG'),
(3507110, 3507110011, 'SUKOANYAR'),
(3507110, 3507110012, 'WAJAK'),
(3507110, 3507110013, 'NGEMBAL'),
(3507120, 3507120001, 'KEMULAN'),
(3507120, 3507120002, 'TAWANGREJENI'),
(3507120, 3507120003, 'SAWAHAN'),
(3507120, 3507120004, 'UNDAAN'),
(3507120, 3507120005, 'GEDOG KULON'),
(3507120, 3507120006, 'GEDOG WETAN'),
(3507120, 3507120007, 'TALOK'),
(3507120, 3507120008, 'SEDAYU'),
(3507120, 3507120009, 'TANGGUNG'),
(3507120, 3507120010, 'JERU'),
(3507120, 3507120011, 'TUREN'),
(3507120, 3507120012, 'PAGEDANGAN'),
(3507120, 3507120013, 'SANANKERTO'),
(3507120, 3507120014, 'SANANREJO'),
(3507120, 3507120015, 'KEDOK'),
(3507120, 3507120016, 'TALANGSUKO'),
(3507120, 3507120017, 'TUMPUKRENTENG'),
(3507130, 3507130001, 'SUKONOLO'),
(3507130, 3507130002, 'GADING'),
(3507130, 3507130003, 'KREBET'),
(3507130, 3507130004, 'BAKALAN'),
(3507130, 3507130005, 'SUDIMORO'),
(3507130, 3507130006, 'KASRI'),
(3507130, 3507130007, 'PRINGU'),
(3507130, 3507130008, 'KASEMBON'),
(3507130, 3507130009, 'KUWOLU'),
(3507130, 3507130010, 'KREBET SENGGRONG'),
(3507130, 3507130011, 'LUMBANGSARI'),
(3507130, 3507130012, 'WANDANPURO'),
(3507130, 3507130013, 'BULULAWANG'),
(3507130, 3507130014, 'SEMPALWADAK'),
(3507140, 3507140001, 'SUKOREJO'),
(3507140, 3507140002, 'BULUPITU'),
(3507140, 3507140003, 'SUKOSARI'),
(3507140, 3507140004, 'PANGGUNGREJO'),
(3507140, 3507140005, 'GONDANGLEGI KULON'),
(3507140, 3507140006, 'GONDANGLEGI WETAN'),
(3507140, 3507140007, 'SEPANJANG'),
(3507140, 3507140008, 'PUTAT KIDUL'),
(3507140, 3507140009, 'PUTAT LOR'),
(3507140, 3507140010, 'UREK UREK'),
(3507140, 3507140011, 'KETAWANG'),
(3507140, 3507140012, 'GANJARAN'),
(3507140, 3507140013, 'PUTUKREJO'),
(3507140, 3507140014, 'SUMBERJAYA'),
(3507150, 3507150001, 'KANIGORO'),
(3507150, 3507150002, 'BALEARJO'),
(3507150, 3507150003, 'KADEMANGAN'),
(3507150, 3507150004, 'SUWARU'),
(3507150, 3507150005, 'CLUMPRIT'),
(3507150, 3507150006, 'SIDOREJO'),
(3507150, 3507150007, 'PAGELARAN'),
(3507150, 3507150008, 'BANJAREJO'),
(3507150, 3507150009, 'BRONGKAL'),
(3507150, 3507150010, 'KARANGSUKO'),
(3507160, 3507160001, 'JENGGOLO'),
(3507160, 3507160002, 'SENGGURUH'),
(3507160, 3507160003, 'KEMIRI'),
(3507160, 3507160004, 'TEGALSARI'),
(3507160, 3507160005, 'MANGUNREJO'),
(3507160, 3507160006, 'PANGGUNGREJO'),
(3507160, 3507160007, 'KEDUNGPEDARINGAN'),
(3507160, 3507160008, 'PENARUKAN'),
(3507160, 3507160009, 'CEPOKOMULYO'),
(3507160, 3507160010, 'KEPANJEN'),
(3507160, 3507160011, 'TALANGAGUNG'),
(3507160, 3507160012, 'DILEM'),
(3507160, 3507160013, 'ARDIREJO'),
(3507160, 3507160014, 'SUKORAHARJO'),
(3507160, 3507160015, 'CURUNG REJO'),
(3507160, 3507160016, 'JATIREJOYOSO'),
(3507160, 3507160017, 'NGADILANGKUNG'),
(3507160, 3507160018, 'MOJOSARI'),
(3507170, 3507170001, 'KARANGKATES'),
(3507170, 3507170002, 'SUMBERPUCUNG'),
(3507170, 3507170003, 'JATIGUWI'),
(3507170, 3507170004, 'SAMBIGEDE'),
(3507170, 3507170005, 'SENGGRENG'),
(3507170, 3507170006, 'TERNYANG'),
(3507170, 3507170007, 'NGEBRUK'),
(3507180, 3507180001, 'SLOROK'),
(3507180, 3507180002, 'JATIKERTO'),
(3507180, 3507180003, 'NGADIREJO'),
(3507180, 3507180004, 'KARANGREJO'),
(3507180, 3507180005, 'KROMENGAN'),
(3507180, 3507180006, 'PENIWEN'),
(3507180, 3507180007, 'JAMBUWER'),
(3507190, 3507190001, 'NGAJUM'),
(3507190, 3507190002, 'PALAAN'),
(3507190, 3507190003, 'NGASEM'),
(3507190, 3507190004, 'BANJARSARI'),
(3507190, 3507190005, 'KRANGGAN'),
(3507190, 3507190006, 'KESAMBEN'),
(3507190, 3507190007, 'BABADAN'),
(3507190, 3507190008, 'BALESARI'),
(3507190, 3507190009, 'MAGUAN'),
(3507200, 3507200001, 'KLUWUT'),
(3507200, 3507200002, 'PLANDI'),
(3507200, 3507200003, 'PLAOSAN'),
(3507200, 3507200004, 'KEBOBANG'),
(3507200, 3507200005, 'BANGELAN'),
(3507200, 3507200006, 'SUMBERDEM'),
(3507200, 3507200007, 'SUMBERTEMPUR'),
(3507200, 3507200008, 'WONOSARI'),
(3507210, 3507210001, 'SUMBERSUKO'),
(3507210, 3507210002, 'MENDALANWANGI'),
(3507210, 3507210003, 'SITIREJO'),
(3507210, 3507210004, 'PARANGARGO'),
(3507210, 3507210005, 'GONDOWANGI'),
(3507210, 3507210006, 'PANDANREJO'),
(3507210, 3507210007, 'PETUNGSEWU'),
(3507210, 3507210008, 'SUKODADI'),
(3507210, 3507210009, 'SIDORAHAYU'),
(3507210, 3507210010, 'JEDONG'),
(3507210, 3507210011, 'DALISODO'),
(3507210, 3507210012, 'PANDANLANDUNG'),
(3507220, 3507220001, 'PERMANU'),
(3507220, 3507220002, 'KARANGPANDAN'),
(3507220, 3507220003, 'GLANGGANG'),
(3507220, 3507220004, 'SUTOJAYAN'),
(3507220, 3507220005, 'WONOKERSO'),
(3507220, 3507220006, 'KARANGDUREN'),
(3507220, 3507220007, 'PAKISAJI'),
(3507220, 3507220008, 'JATISARI'),
(3507220, 3507220009, 'WADUNG'),
(3507220, 3507220010, 'GENENGAN'),
(3507220, 3507220011, 'KEBONAGUNG'),
(3507220, 3507220012, 'KENDALPAYAK'),
(3507230, 3507230001, 'TAMBAKASRI'),
(3507230, 3507230002, 'TANGKILSARI'),
(3507230, 3507230003, 'JAMBEARJO'),
(3507230, 3507230004, 'JATISARI'),
(3507230, 3507230005, 'PANDANMULYO'),
(3507230, 3507230006, 'NGAWONGGO'),
(3507230, 3507230007, 'PURWOSEKAR'),
(3507230, 3507230008, 'GUNUNGRONGGO'),
(3507230, 3507230009, 'GUNUNGSARI'),
(3507230, 3507230010, 'TAJINAN'),
(3507230, 3507230011, 'RANDUGADING'),
(3507230, 3507230012, 'SUMBERSUKO'),
(3507240, 3507240001, 'NGINGIT'),
(3507240, 3507240002, 'KIDAL'),
(3507240, 3507240003, 'KAMBINGAN'),
(3507240, 3507240004, 'PANDANAJENG'),
(3507240, 3507240005, 'PULUNGDOWO'),
(3507240, 3507240006, 'BOKOR'),
(3507240, 3507240007, 'SLAMET'),
(3507240, 3507240008, 'WRINGINSONGO'),
(3507240, 3507240009, 'JERU'),
(3507240, 3507240010, 'MALANGSUKO'),
(3507240, 3507240011, 'TUMPANG'),
(3507240, 3507240012, 'TULUSBESAR'),
(3507240, 3507240013, 'BENJOR'),
(3507240, 3507240014, 'DUWET'),
(3507240, 3507240015, 'DUWET KRAJAN'),
(3507250, 3507250001, 'SEKARPURO'),
(3507250, 3507250002, 'AMPELDENTO'),
(3507250, 3507250003, 'SUMBERKRADENAN'),
(3507250, 3507250004, 'KEDUNGREJO'),
(3507250, 3507250005, 'BANJARREJO'),
(3507250, 3507250006, 'PUCANG SONGO'),
(3507250, 3507250007, 'SUKOANYAR'),
(3507250, 3507250008, 'SUMBERPASIR'),
(3507250, 3507250009, 'PAKISKEMBAR'),
(3507250, 3507250010, 'PAKISJAJAR'),
(3507250, 3507250011, 'BUNUTWETAN'),
(3507250, 3507250012, 'ASRIKATON'),
(3507250, 3507250013, 'SAPTORENGGO'),
(3507250, 3507250014, 'MANGLIAWAN'),
(3507250, 3507250015, 'TIRTOMOYO'),
(3507260, 3507260001, 'KENONGO'),
(3507260, 3507260002, 'NGADIREJO'),
(3507260, 3507260003, 'TAJI'),
(3507260, 3507260004, 'PANDANSARI LOR'),
(3507260, 3507260005, 'SUKOPURO'),
(3507260, 3507260006, 'SIDOREJO'),
(3507260, 3507260007, 'SUKOLILO'),
(3507260, 3507260008, 'SIDOMULYO'),
(3507260, 3507260009, 'GADING KEMBAR'),
(3507260, 3507260010, 'KEMANTREN'),
(3507260, 3507260011, 'ARGOSARI'),
(3507260, 3507260012, 'SLAMPAREJO'),
(3507260, 3507260013, 'KEMIRI'),
(3507260, 3507260014, 'JABUNG'),
(3507260, 3507260015, 'GUNUNG JATI'),
(3507270, 3507270001, 'SIDOLUHUR'),
(3507270, 3507270002, 'SRIGADING'),
(3507270, 3507270003, 'SIDODADI'),
(3507270, 3507270004, 'BEDALI'),
(3507270, 3507270005, 'KALIREJO'),
(3507270, 3507270006, 'MULYOARJO'),
(3507270, 3507270007, 'SUMBER NGEPOH'),
(3507270, 3507270008, 'SUMBER PORONG'),
(3507270, 3507270009, 'TURIREJO'),
(3507270, 3507270010, 'LAWANG'),
(3507270, 3507270011, 'KETINDAN'),
(3507270, 3507270012, 'WONOREJO'),
(3507280, 3507280001, 'LANGLANG'),
(3507280, 3507280002, 'TUNJUNGTIRTO'),
(3507280, 3507280003, 'BANJARARUM'),
(3507280, 3507280004, 'WATUGEDE'),
(3507280, 3507280005, 'DENGKOL'),
(3507280, 3507280006, 'WONOREJO'),
(3507280, 3507280007, 'BATURETNO'),
(3507280, 3507280008, 'TAMANHARJO'),
(3507280, 3507280009, 'LOSARI'),
(3507280, 3507280010, 'PAGENTAN'),
(3507280, 3507280011, 'PURWOASRI'),
(3507280, 3507280012, 'KLAMPOK'),
(3507280, 3507280013, 'GUNUNGREJO'),
(3507280, 3507280014, 'CANDIRENGGO'),
(3507280, 3507280015, 'ARDIMULYO'),
(3507280, 3507280016, 'RANDUAGUNG'),
(3507280, 3507280017, 'TOYOMARTO'),
(3507290, 3507290001, 'TEGALGONDO'),
(3507290, 3507290002, 'KEPUHARJO'),
(3507290, 3507290003, 'NGENEP'),
(3507290, 3507290004, 'NGIJO'),
(3507290, 3507290005, 'AMPELDENTO'),
(3507290, 3507290006, 'GIRIMOYO'),
(3507290, 3507290007, 'BOCEK'),
(3507290, 3507290008, 'DONOWARIH'),
(3507290, 3507290009, 'TAWANGARGO'),
(3507300, 3507300001, 'KUCUR'),
(3507300, 3507300002, 'KALISONGO'),
(3507300, 3507300003, 'KARANGWIDORO'),
(3507300, 3507300004, 'PETUNG SEWU'),
(3507300, 3507300005, 'SELOREJO'),
(3507300, 3507300006, 'TEGALWERU'),
(3507300, 3507300007, 'LANDUNGSARI'),
(3507300, 3507300008, 'GADINGKULON'),
(3507300, 3507300009, 'MULYOAGUNG'),
(3507300, 3507300010, 'SUMBERSEKAR'),
(3507310, 3507310001, 'BENDOSARI'),
(3507310, 3507310002, 'SUKOMULYO'),
(3507310, 3507310003, 'PUJON KIDUL'),
(3507310, 3507310004, 'PANDESARI'),
(3507310, 3507310005, 'PUJON LOR'),
(3507310, 3507310006, 'NGROTO'),
(3507310, 3507310007, 'NGABAB'),
(3507310, 3507310008, 'TAWANGSARI'),
(3507310, 3507310009, 'MADIREDO'),
(3507310, 3507310010, 'WIYUREJO'),
(3507320, 3507320001, 'PAGERSARI'),
(3507320, 3507320002, 'SIDODADI'),
(3507320, 3507320003, 'BANJAREJO'),
(3507320, 3507320004, 'PURWOREJO'),
(3507320, 3507320005, 'NGANTRU'),
(3507320, 3507320006, 'BANTUREJO'),
(3507320, 3507320007, 'PANDANSARI'),
(3507320, 3507320008, 'MULYOREJO'),
(3507320, 3507320009, 'SUMBERAGUNG'),
(3507320, 3507320010, 'KAUMREJO'),
(3507320, 3507320011, 'TULUNGREJO'),
(3507320, 3507320012, 'WATUREJO'),
(3507320, 3507320013, 'JOMBOK'),
(3507330, 3507330001, 'PONDOK AGUNG'),
(3507330, 3507330002, 'BAYEM'),
(3507330, 3507330003, 'PAIT'),
(3507330, 3507330004, 'WONOAGUNG'),
(3507330, 3507330005, 'KASEMBON'),
(3507330, 3507330006, 'SUKOSARI');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kec`
--

CREATE TABLE `mst_kec` (
  `id_kab` int(6) NOT NULL,
  `id_kec` int(15) UNSIGNED NOT NULL,
  `nm_kec` varchar(100) NOT NULL,
  `id` int(10) NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Master Kecamatan' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mst_kec`
--

INSERT INTO `mst_kec` (`id_kab`, `id_kec`, `nm_kec`, `id`, `lat`, `lon`) VALUES
(3507, 3507010, 'DONOMULYO', 1, '-8.205294', '112.465749'),
(3507, 3507020, 'KALIPARE', 2, '-8.130392', '112.490033'),
(3507, 3507030, 'PAGAK', 3, '-8.225561', '112.525724'),
(3507, 3507040, 'BANTUR', 4, '-8.316290', '112.580140'),
(3507, 3507050, 'GEDANGAN', 5, '-8.293016', '112.648128'),
(3507, 3507060, 'SUMBERMANJING', 6, '-8.279160', '112.690124'),
(3507, 3507070, 'DAMPIT', 7, '-8.211620', '112.748740'),
(3507, 3507080, 'TIRTO YUDO', 8, '-8.226911', '112.833019'),
(3507, 3507090, 'AMPELGADING', 9, '-8.234253', '112.877614'),
(3507, 3507100, 'PONCOKUSUMO', 10, '-8.042339', '112.772831'),
(3507, 3507110, 'WAJAK', 11, '-8.102281', '112.730014'),
(3507, 3507120, 'TUREN', 12, '-8.169703', '112.689289'),
(3507, 3507130, 'BULULAWANG', 13, '-8.077809', '112.641241'),
(3507, 3507140, 'GONDANGLEGI', 14, '-8.176056', '112.635597'),
(3507, 3507150, 'PAGELARAN', 15, '-8.196001', '112.619690'),
(3507, 3507160, 'KEPANJEN', 16, '-8.129795', '112.566069'),
(3507, 3507170, 'SUMBER PUCUNG', 17, '-8.156720', '112.474036'),
(3507, 3507180, 'KROMENGAN', 18, '-8.130392', '112.490033'),
(3507, 3507190, 'NGAJUM', 19, '-8.096410', '112.540818'),
(3507, 3507200, 'WONOSARI', 20, '-8.033284', '112.497726'),
(3507, 3507210, 'WAGIR', 21, '-8.009080', '112.572365'),
(3507, 3507220, 'PAKISAJI', 22, '-8.061095', '112.601634'),
(3507, 3507230, 'TAJINAN', 23, '-8.049637', '112.681640'),
(3507, 3507240, 'TUMPANG', 24, '-8.004532', '112.762905'),
(3507, 3507250, 'PAKIS', 25, '-7.959228', '112.716598'),
(3507, 3507260, 'JABUNG', 26, '-7.945133', '112.734132'),
(3507, 3507270, 'LAWANG', 27, '-7.836950', '112.697052'),
(3507, 3507280, 'SINGOSARI', 28, '-7.893844', '112.662868'),
(3507, 3507290, 'KARANGPLOSO', 29, '-7.891528', '112.594329'),
(3507, 3507300, 'DAU', 30, '-7.914286', '112.585860'),
(3507, 3507310, 'PUJON', 31, '-7.850562', '112.481230'),
(3507, 3507320, 'NGANTANG', 32, '-7.846667', '112.371903'),
(3507, 3507330, 'KASEMBON', 33, '-7.783796', '112.311111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dasawisma`
--

CREATE TABLE `tbl_dasawisma` (
  `iddasawisma` int(11) NOT NULL,
  `nama_dasawisma` varchar(100) DEFAULT NULL,
  `kd_kec` varchar(8) DEFAULT NULL,
  `kd_desa` varchar(10) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_dasawisma`
--

INSERT INTO `tbl_dasawisma` (`iddasawisma`, `nama_dasawisma`, `kd_kec`, `kd_desa`, `rw`, `rt`) VALUES
(3, 'Maju Jaya Sentosa', '3507010', '3507010005', '001', '002'),
(8, 'Maju Jaya Mapan', '3507040', '3507040005', '001', '002'),
(9, 'majumundur', '3507240', '3507240008', '04', '3'),
(10, 'Dasawisma-Langlang', '3507280', '3507280001', '001', '001'),
(11, 'Dasawisma-Tunjungtirto', '3507280', '3507280002', '001', '001'),
(12, 'Dasawisma-Banjararum', '3507280', '3507280003', '001', '001'),
(13, 'Dasawisma-Watugede', '3507280', '3507280004', '001', '001'),
(14, 'Dasawisma-Dengkol', '3507280', '3507280005', '001', '001'),
(15, 'Dasawisma-Wonorejo', '3507280', '3507280006', '001', '001'),
(16, 'Dasawisma-Baturetno', '3507280', '3507280007', '001', '001'),
(17, 'Dasawisma-Tamanharjo', '3507280', '3507280008', '001', '001'),
(18, 'Dasawisma-Losari', '3507280', '3507280009', '001', '001'),
(19, 'Dasawisma-Pagentan', '3507280', '3507280010', '001', '001'),
(20, 'Dasawisma-Purwoasri', '3507280', '3507280011', '001', '001'),
(21, 'Dasawisma-Klampok', '3507280', '3507280012', '001', '001'),
(22, 'Dasawisma-Gunungrejo', '3507280', '3507280013', '001', '001'),
(23, 'Dasawisma-Candirenggo', '3507280', '3507280014', '001', '001'),
(24, 'Dasawisma-Ardimulyo', '3507280', '3507280015', '001', '001'),
(25, 'Dasawisma-Randuagung', '3507280', '3507280016', '001', '001'),
(26, 'Dasawisma-Toyomarto', '3507280', '3507280017', '001', '001'),
(27, 'Coba', '3507100', '3507100001', '005', '002'),
(28, 'Dasawisma gatau', '3507130', '3507130013', '001', '002'),
(29, 'Dasawisma tigapuluh', '3507120', '3507120016', '001', '002'),
(30, 'Dasawisma sepuluh', '3507120', '3507120016', '001', '002'),
(31, 'Dasawisma tigaratus', '3507080', '3507080010', '001', '002'),
(32, 'Dasawisma tigaratus', '3507080', '3507080010', '001', '002'),
(33, 'Dasawisma gatau', '3507100', '3507100013', '005', '005'),
(34, 'Dasawisma tigaratus', '3507080', '3507080001', '001', '005'),
(35, 'uwuuwuuw', '3507080', '3507080001', '001', '002'),
(36, 'asdasd', '3507010', '3507010001', '11', '11'),
(37, 'SegerBaru', '3507010', '3507010001', '002', '005'),
(38, 'SegerBaru', '3507010', '3507010001', '005', '002'),
(39, 'cobakec', '3507060', '3507060001', '111', '111'),
(40, 'cobakec', '3507060', '3507060001', '111', '111'),
(41, 'cobakec', '3507060', '3507060001', '111', '111'),
(42, 'cobakec', '3507060', '3507060001', '111', '111'),
(43, 'cobakec', '3507060', '3507060001', '111', '111'),
(44, 'cobakec', '3507060', '3507060001', '111', '111'),
(45, 'cobakec', '3507060', '3507060001', '111', '111'),
(46, 'cobakec', '3507060', '3507060001', '111', '111'),
(47, 'cobades', '3507010', '3507010005', '001', '002'),
(48, 'Dasawisma gatau', '3507080', '3507080001', '005', '005'),
(49, 'Dasawisma gatau', '3507080', '3507080001', '005', '005'),
(50, 'Dimana Saja', '3507110', '3507110001', '001', '001'),
(51, 'Dimana Saja', '3507110', '3507110001', '001', '001'),
(52, 'rw', '3507040', '3507040001', '002', '005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `idpekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`idpekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Petani'),
(2, 'Nelayan'),
(3, 'Pedagang'),
(4, 'PNS/TNI/Polri'),
(5, 'Pegawai Swasta'),
(6, 'Wiraswasta'),
(7, 'Pensiunan'),
(8, 'Pekerja Lepas'),
(9, 'Tidak/Belum Bekerja'),
(10, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(2) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin Pemkab'),
(2, 'Kapala Desa'),
(3, 'Admin Desa'),
(4, 'Pemohon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `data_desa`
--
ALTER TABLE `data_desa`
  ADD PRIMARY KEY (`id_ds`);

--
-- Indexes for table `data_pejabat`
--
ALTER TABLE `data_pejabat`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_request`
--
ALTER TABLE `data_request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_surat`
--
ALTER TABLE `data_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `master_berkas`
--
ALTER TABLE `master_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `mst_desa`
--
ALTER TABLE `mst_desa`
  ADD PRIMARY KEY (`id_kec`,`id_desa`) USING BTREE;

--
-- Indexes for table `mst_kec`
--
ALTER TABLE `mst_kec`
  ADD PRIMARY KEY (`id`,`id_kec`,`id_kab`) USING BTREE;

--
-- Indexes for table `tbl_dasawisma`
--
ALTER TABLE `tbl_dasawisma`
  ADD PRIMARY KEY (`iddasawisma`) USING BTREE;

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`idpekerjaan`) USING BTREE;

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_login` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_desa`
--
ALTER TABLE `data_desa`
  MODIFY `id_ds` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pejabat`
--
ALTER TABLE `data_pejabat`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `data_request`
--
ALTER TABLE `data_request`
  MODIFY `id_request` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_surat`
--
ALTER TABLE `data_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_berkas`
--
ALTER TABLE `master_berkas`
  MODIFY `id_berkas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mst_kec`
--
ALTER TABLE `mst_kec`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_dasawisma`
--
ALTER TABLE `tbl_dasawisma`
  MODIFY `iddasawisma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `idpekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD CONSTRAINT `data_request_sku_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
