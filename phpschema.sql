-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2017 at 02:18 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpschema`
--

-- --------------------------------------------------------

--
-- Table structure for table `air_bersih`
--

CREATE TABLE IF NOT EXISTS `air_bersih` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_sumber_air_bersih` enum('Bak penampung air hujan','Beli dari tangki swasta','Depot isi ulang','Embung','Hidran umum','Mata Air','Sungai','PAM','Pipa','Sumber Lain','Sumur Gali','Sumur Pompa','Sungai') NOT NULL,
  `jumlah_unit` decimal(10,2) DEFAULT '0.00',
  `pemanfaatan_kk` decimal(10,2) DEFAULT '0.00',
  `kondisi` enum('Baik','Rusak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `air_bersih`
--

INSERT INTO `air_bersih` (`id`, `id_desa`, `tanggal`, `jenis_sumber_air_bersih`, `jumlah_unit`, `pemanfaatan_kk`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-29', 'Sungai', '121.12', '12.21', 'Rusak', '2017-06-02 02:38:15', '2017-06-01 19:38:15'),
(2, 1, '2017-07-01', 'Bak penampung air hujan', '12.12', '1.22', 'Rusak', '2017-06-01 19:36:41', '2017-06-01 19:36:41'),
(3, 1, '2018-08-22', 'Bak penampung air hujan', '12.12', '2.11', 'Rusak', '2017-06-01 19:58:36', '2017-06-01 19:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `air_panas`
--

CREATE TABLE IF NOT EXISTS `air_panas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_sumber` enum('Geiser','Gunung Berapi') NOT NULL,
  `jumlah_lokasi` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pemanfaatan` enum('Wisata','Pengobatan','Energi') NOT NULL,
  `kepemilikan` enum('Pemda','Swasta','Adat Atau Perorangan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `air_panas`
--

INSERT INTO `air_panas` (`id`, `id_desa`, `tanggal`, `jenis_sumber`, `jumlah_lokasi`, `pemanfaatan`, `kepemilikan`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-07', 'Geiser', '121.12', 'Pengobatan', 'Adat Atau Perorangan', '2017-06-02 16:16:50', '2017-06-02 09:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `apotik_hidup`
--

CREATE TABLE IF NOT EXISTS `apotik_hidup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_tanaman_apotik_hidup` int(11) NOT NULL COMMENT 'ref tabel komuditas',
  `luas_produksi_ha` decimal(10,2) DEFAULT '0.00',
  `hasil_produksi_ha` decimal(10,2) NOT NULL DEFAULT '0.00',
  `jumlah_produksi_ton` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `apotik_hidup`
--

INSERT INTO `apotik_hidup` (`id`, `id_desa`, `tanggal`, `nama_tanaman_apotik_hidup`, `luas_produksi_ha`, `hasil_produksi_ha`, `jumlah_produksi_ton`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-01', 339, '1.21', '23.00', 1214, '2017-06-01 15:06:04', '2017-06-01 08:05:59'),
(5, 1, '2017-06-20', 345, '12.00', '23.00', 35, '2017-06-01 08:25:58', '2017-06-01 08:25:58'),
(6, 1, '2016-05-07', 336, '4.54', '45.00', 49, '2017-06-01 09:27:31', '2017-06-01 09:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `batas_wilayah`
--

CREATE TABLE IF NOT EXISTS `batas_wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `tahun_pembentukan` int(11) NOT NULL,
  `luas_desa` decimal(10,2) NOT NULL,
  `nama_kepala_desa` varchar(50) NOT NULL,
  `desa_sebelah_utara` varchar(150) DEFAULT NULL,
  `desa_sebelah_timur` varchar(150) DEFAULT NULL,
  `desa_sebelah_selatan` varchar(150) DEFAULT NULL,
  `desa_sebelah_barat` varchar(150) DEFAULT NULL,
  `kecamatan_sebelah_utara` varchar(150) DEFAULT NULL,
  `kecamatan_sebelah_timur` varchar(150) DEFAULT NULL,
  `kecamatan_sebelah_selatan` varchar(150) DEFAULT NULL,
  `kecamatan_sebelah_barat` varchar(150) DEFAULT NULL,
  `penetapan_batas` enum('ada','tidak ada') NOT NULL,
  `perdes_no` varchar(150) DEFAULT NULL,
  `perda_no` varchar(150) DEFAULT NULL,
  `peta_wilayah` enum('ada','tidak ada') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_desa` (`id_desa`,`bulan`,`tahun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `batas_wilayah`
--

INSERT INTO `batas_wilayah` (`id`, `id_desa`, `bulan`, `tahun`, `tahun_pembentukan`, `luas_desa`, `nama_kepala_desa`, `desa_sebelah_utara`, `desa_sebelah_timur`, `desa_sebelah_selatan`, `desa_sebelah_barat`, `kecamatan_sebelah_utara`, `kecamatan_sebelah_timur`, `kecamatan_sebelah_selatan`, `kecamatan_sebelah_barat`, `penetapan_batas`, `perdes_no`, `perda_no`, `peta_wilayah`, `created_at`, `updated_at`) VALUES
(5, 1, 5, 2016, 1985, '15660.00', 'Samsudine', 'Tidak Tahu', 'Tidak Tahu', 'Tidak Tahu', 'Tidak Tahu', '', '', '', '', 'tidak ada', '', '', 'tidak ada', '2017-05-30 00:20:41', '2017-05-30 00:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `dampak_pengolahan_hutan`
--

CREATE TABLE IF NOT EXISTS `dampak_pengolahan_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_dampak` enum('Berubahnya Fungsi Hutan','Hilangnya daerah tangkapan air','Hilangnya Sumber Mata Air','Kebakaran Hutan','Kemusnahan flora fauna dan satwa langka','Kerusakan biota/plasma nutfah hutan','Longsor/Erosi','Musnahnya Habitat Binatang Hutan','Pencemaran Air','Pencemaran Udara','Terjadinya kekeringan/sulit air','Terjadinya lahan kritis') DEFAULT NULL,
  `keterangan` enum('Ya','TIdak') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_produksi_galian`
--

CREATE TABLE IF NOT EXISTS `deposit_produksi_galian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_bahan_galian` int(11) NOT NULL,
  `status` enum('Ada Tapi Belum Produktif','Ada Dan Sudah Produktif') NOT NULL,
  `hasil_produksi` enum('Kecil','Sedang','Besar') NOT NULL,
  `di_jual_langsung_ke_konsumen` enum('Ya','Tidak') NOT NULL,
  `di_jual_melalui_kud` enum('Ya','Tidak') NOT NULL,
  `di_jual_melalui_tengkulak` enum('Ya','Tidak') NOT NULL,
  `di_jual_melalui_pengecer` enum('Ya','Tidak') NOT NULL,
  `di_jual_ke_perusahaan` enum('Ya','Tidak') NOT NULL,
  `di_jual_ke_lumbung_desa_kelurahan` enum('Ya','Tidak') NOT NULL,
  `tidak_dijual` enum('Ya','Tidak') NOT NULL,
  `kepemilikan` enum('Pemerintah','Swasta','Perorangan','Adat','Lainnya') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `deposit_produksi_galian`
--

INSERT INTO `deposit_produksi_galian` (`id`, `id_desa`, `tanggal`, `jenis_bahan_galian`, `status`, `hasil_produksi`, `di_jual_langsung_ke_konsumen`, `di_jual_melalui_kud`, `di_jual_melalui_tengkulak`, `di_jual_melalui_pengecer`, `di_jual_ke_perusahaan`, `di_jual_ke_lumbung_desa_kelurahan`, `tidak_dijual`, `kepemilikan`, `created_at`, `updated_at`) VALUES
(3, 1, '2016-08-24', 280, 'Ada Dan Sudah Produktif', 'Sedang', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Perorangan', '2017-06-01 14:02:19', '2017-06-01 07:02:10'),
(4, 1, '2017-06-15', 259, 'Ada Tapi Belum Produktif', 'Besar', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Swasta', '2017-06-01 13:45:00', '2017-05-31 22:45:54'),
(5, 1, '2017-06-22', 259, 'Ada Dan Sudah Produktif', 'Kecil', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Pemerintah', '2017-06-01 13:44:57', '2017-06-01 02:19:33'),
(6, 1, '2017-06-04', 259, 'Ada Tapi Belum Produktif', 'Kecil', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Swasta', '2017-06-01 03:04:09', '2017-06-01 03:04:09'),
(7, 1, '2017-06-14', 263, 'Ada Tapi Belum Produktif', 'Kecil', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Perorangan', '2017-06-01 14:01:15', '2017-06-01 07:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(350) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `id_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Sengkati Kecil', 1, '2017-05-27 18:20:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_hutan`
--

CREATE TABLE IF NOT EXISTS `hasil_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_komoditas` int(11) DEFAULT NULL,
  `hasil_produksi` decimal(10,3) DEFAULT '0.000',
  `satuan` enum('BATANG/TH','LITER/TH','M3/TH','TON/TH') DEFAULT NULL,
  `dijual_langsung_ke_konsumen` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_kepasar` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_melalui_KUD` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_melalui_tengkulak` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_melalui_pengecer` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_ke_lumbung_desa_atau_kelurahan` enum('Ya','Tidak') DEFAULT NULL,
  `tidak_dijual` enum('Ya','Tidak') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pangan`
--

CREATE TABLE IF NOT EXISTS `hasil_pangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `komuditas` int(11) NOT NULL COMMENT 'referensi ke table komuditas',
  `luas_produksi` decimal(10,2) DEFAULT NULL,
  `hasil_produksi` decimal(10,2) DEFAULT '0.00',
  `harga_lokal` decimal(10,2) DEFAULT '0.00',
  `nilai_produksi_tahun_ini` decimal(16,2) NOT NULL,
  `biaya_pemupukan` decimal(16,2) DEFAULT '0.00',
  `biaya_bibit` decimal(16,2) DEFAULT '0.00',
  `biaya_obat` decimal(16,2) DEFAULT '0.00',
  `biaya_lainnya` decimal(16,2) DEFAULT '0.00',
  `saldo_produksi` decimal(16,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_desa` (`id_desa`,`tanggal`,`komuditas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hasil_pangan`
--

INSERT INTO `hasil_pangan` (`id`, `id_desa`, `tanggal`, `komuditas`, `luas_produksi`, `hasil_produksi`, `harga_lokal`, `nilai_produksi_tahun_ini`, `biaya_pemupukan`, `biaya_bibit`, `biaya_obat`, `biaya_lainnya`, `saldo_produksi`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-07-12', 2, '1.00', '2.00', '150000.00', '300000.00', '12000.00', '12500.00', '0.00', '0.00', '288000.00', '2017-06-01 06:07:22', '2017-06-01 06:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_desa`
--

CREATE TABLE IF NOT EXISTS `identitas_desa` (
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pum` varchar(15) NOT NULL,
  `luas_desa` decimal(10,2) NOT NULL,
  `tinggi_dpl` decimal(5,2) NOT NULL,
  `garis_bujur` double NOT NULL,
  `garis_lintang` double NOT NULL,
  `berbatas_negara` tinyint(1) NOT NULL DEFAULT '0',
  `berbatas_provinsi` tinyint(1) NOT NULL,
  `berbatas_kabupaten` tinyint(1) NOT NULL,
  `berbatas_kecamatan` tinyint(1) NOT NULL,
  `status` enum('desa','nagari','kelurahan') NOT NULL DEFAULT 'desa',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_desa`),
  UNIQUE KEY `kode_pum` (`kode_pum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas_desa`
--

INSERT INTO `identitas_desa` (`id_desa`, `kode_pum`, `luas_desa`, `tinggi_dpl`, `garis_bujur`, `garis_lintang`, `berbatas_negara`, `berbatas_provinsi`, `berbatas_kabupaten`, `berbatas_kecamatan`, `status`, `created_at`, `updated_at`) VALUES
(1, '1504052017', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 'desa', '2017-05-30 10:35:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lahan`
--

CREATE TABLE IF NOT EXISTS `jenis_lahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sawah_irigasi_teknis` decimal(10,2) DEFAULT '0.00',
  `sawah_irigasi_setengah_teknis` decimal(10,2) DEFAULT NULL,
  `sawah_tadah_hujan` decimal(10,2) DEFAULT '0.00',
  `sawah_pasang_surut` decimal(10,2) DEFAULT '0.00',
  `luas_tanah_sawah` int(11) NOT NULL,
  `tanah_rawa` decimal(10,2) DEFAULT '0.00',
  `pasang_surut` decimal(10,2) DEFAULT '0.00',
  `lahan_gambut` decimal(10,2) DEFAULT '0.00',
  `situ_waduk_danau` decimal(10,2) DEFAULT '0.00',
  `luas_tanah_basah` decimal(10,2) DEFAULT '0.00',
  `tanah_bengkok` decimal(10,2) DEFAULT '0.00',
  `tanah_titi_sarah` decimal(10,2) DEFAULT '0.00',
  `kebun_desa` decimal(10,2) DEFAULT '0.00',
  `sawah_desa` decimal(10,2) DEFAULT '0.00',
  `kas_desa_kelurahan` decimal(10,2) DEFAULT '0.00',
  `lokasi_tanah_kas_desa` enum('Didalam Desa','DiLuar Desa','Sebagian Diluar Desa') NOT NULL,
  `lapangan_olahraga` decimal(10,2) DEFAULT '0.00',
  `perkantoran_pemerintah` decimal(10,2) DEFAULT '0.00',
  `ruang_publik_taman_kota` decimal(10,2) DEFAULT '0.00',
  `tempat_pemakaman_umum` decimal(10,2) DEFAULT '0.00',
  `tempat_pembuangan_sampah` decimal(10,2) DEFAULT '0.00',
  `bangunan_sekolah_perguruan_tinggi` decimal(10,2) DEFAULT '0.00',
  `pertokoan` decimal(10,2) DEFAULT '0.00',
  `fasilitas_pasar` decimal(10,2) DEFAULT '0.00',
  `terminal` decimal(10,2) DEFAULT '0.00',
  `jalan` decimal(10,2) DEFAULT '0.00',
  `daerah_tangkapan_air` decimal(10,2) DEFAULT '0.00',
  `usaha_perikanan` decimal(10,2) DEFAULT '0.00',
  `sutet_aliran_listrik_tegang_tinggi` decimal(10,2) DEFAULT '0.00',
  `luas_tanah_fasilitas_umum` decimal(10,2) DEFAULT '0.00',
  `tega_ladang` decimal(10,2) DEFAULT '0.00',
  `pemukiman` decimal(10,2) DEFAULT '0.00',
  `pekarangan` decimal(10,2) DEFAULT '0.00',
  `luas_tanah_kering` decimal(10,2) DEFAULT NULL,
  `hutan_lindung` decimal(10,2) DEFAULT '0.00',
  `perkebunan_rakyat` decimal(10,2) DEFAULT '0.00',
  `perkebunan_negara` decimal(10,0) DEFAULT '0',
  `perkebunan_swasta` decimal(10,2) DEFAULT '0.00',
  `perkebunan_perorangan` decimal(10,2) DEFAULT '0.00',
  `luas_tanah_perkebunan` int(11) NOT NULL,
  `hutan_produksi_tetap` decimal(10,2) DEFAULT '0.00',
  `hutan_produksi_terbatas` decimal(10,2) DEFAULT '0.00',
  `hutan_produksi` decimal(10,2) DEFAULT '0.00',
  `hutan_konservasi` decimal(10,2) DEFAULT '0.00',
  `hutan_adat` decimal(10,2) DEFAULT '0.00',
  `hutan_asli` decimal(10,2) DEFAULT '0.00',
  `hutan_sekunder` decimal(10,2) DEFAULT '0.00',
  `hutan_buatan` decimal(10,2) DEFAULT '0.00',
  `hutan_mangrove` decimal(10,2) DEFAULT '0.00',
  `suaka_alam` decimal(10,2) DEFAULT '0.00',
  `suaka_margasatwa` decimal(10,2) DEFAULT '0.00',
  `hutan_suaka` int(11) NOT NULL,
  `hutan_rakyat` decimal(10,2) DEFAULT '0.00',
  `luas_tanah_hutan` int(11) NOT NULL,
  `luas_desa_kelurahan` decimal(10,2) DEFAULT '0.00',
  `total_luas_entri_data` int(11) NOT NULL,
  `selisih_luas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_desa_2` (`id_desa`,`tanggal`),
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jenis_lahan`
--

INSERT INTO `jenis_lahan` (`id`, `id_desa`, `tanggal`, `sawah_irigasi_teknis`, `sawah_irigasi_setengah_teknis`, `sawah_tadah_hujan`, `sawah_pasang_surut`, `luas_tanah_sawah`, `tanah_rawa`, `pasang_surut`, `lahan_gambut`, `situ_waduk_danau`, `luas_tanah_basah`, `tanah_bengkok`, `tanah_titi_sarah`, `kebun_desa`, `sawah_desa`, `kas_desa_kelurahan`, `lokasi_tanah_kas_desa`, `lapangan_olahraga`, `perkantoran_pemerintah`, `ruang_publik_taman_kota`, `tempat_pemakaman_umum`, `tempat_pembuangan_sampah`, `bangunan_sekolah_perguruan_tinggi`, `pertokoan`, `fasilitas_pasar`, `terminal`, `jalan`, `daerah_tangkapan_air`, `usaha_perikanan`, `sutet_aliran_listrik_tegang_tinggi`, `luas_tanah_fasilitas_umum`, `tega_ladang`, `pemukiman`, `pekarangan`, `luas_tanah_kering`, `hutan_lindung`, `perkebunan_rakyat`, `perkebunan_negara`, `perkebunan_swasta`, `perkebunan_perorangan`, `luas_tanah_perkebunan`, `hutan_produksi_tetap`, `hutan_produksi_terbatas`, `hutan_produksi`, `hutan_konservasi`, `hutan_adat`, `hutan_asli`, `hutan_sekunder`, `hutan_buatan`, `hutan_mangrove`, `suaka_alam`, `suaka_margasatwa`, `hutan_suaka`, `hutan_rakyat`, `luas_tanah_hutan`, `luas_desa_kelurahan`, `total_luas_entri_data`, `selisih_luas`, `created_at`, `status`, `updated_at`) VALUES
(4, 1, '2017-06-01', '20000.00', '20000.00', '10000.00', '90000.00', 140000, '90000.00', '90000.00', '90000.00', '90000.00', '360000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', 'Didalam Desa', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '1530000.00', '90000.00', '90000.00', '90000.00', '270000.00', '90000.00', '0.00', '0', '0.00', '66.00', 66, '90000.00', '90000.00', '270000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', '90000.00', 720000, '90000.00', 180900, '900.00', 270975, -89100, '2017-06-01 03:04:04', '', '2017-05-31 20:03:59'),
(6, 1, '2017-05-16', '1.21', '1.21', '1.21', '1.21', 1221, '12.12', '1.22', '12.21', '12.00', '112.12', '1.21', '1.21', '12.12', '12.12', '1.21', 'DiLuar Desa', '1.23', '3.23', '23.32', '3.23', '23.23', '23.23', '23.23', '3.23', '23.00', '2.32', '2.32', '3.23', '3.23', '23.23', '2.32', '2.32', '32.00', '23.23', '2.32', '0.00', '0', '0.00', '0.00', 0, '2.32', '23.23', '32.00', '2.32', '23.23', '3.23', '2.32', '2.32', '2.32', '2.32', '2.32', 2, '2.32', 2, '232.00', 32, 2323, '2017-05-31 07:50:43', '', '2017-05-31 07:50:43'),
(8, 1, '2017-05-31', '12.00', '21.00', '2.00', '1.00', 36, '12.00', '21.00', '21.00', '12.00', '66.00', '3.00', '3.00', '3.00', '3.00', '3.00', 'DiLuar Desa', '23.00', '1.00', '1.00', '2.12', '21.00', '12.00', '12.00', '21.00', '12.00', '12.00', '12.00', '12.00', '1.12', '156.24', '1.00', '12.00', '21.00', '34.00', '12.00', '1.21', '12', '12.00', '12.00', 37, '12.00', '2.32', '26.32', '21.00', '12.00', '23.00', '21.00', '12.00', '12.00', '12.00', '12.00', 125, '12.00', 163, '3000.00', 492, 2988, '2017-05-31 09:10:24', '', '2017-05-31 09:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produksi_ikan`
--

CREATE TABLE IF NOT EXISTS `jenis_produksi_ikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_ikan` int(11) NOT NULL COMMENT 'rferensi tabel komuditas',
  `hasil_produksi_ton_pertahun` decimal(10,2) DEFAULT '0.00',
  `harga_jual_rp_perton` decimal(10,2) DEFAULT '0.00',
  `nilai_produksi_rp` int(11) DEFAULT NULL,
  `nilai_bahan_baku_yang_rp` decimal(10,2) DEFAULT '0.00',
  `nilai_bahan_penolong_yang_rp` decimal(10,2) DEFAULT '0.00',
  `biaya_antara_yang_dihabiskan_rp` decimal(10,2) DEFAULT '0.00',
  `saldo_produksi_rp` int(11) DEFAULT NULL,
  `jumlah_jenis_usaha_perikanan` decimal(10,2) DEFAULT '0.00',
  `dijual_langsung_ke_konsumen` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_ke_pasar_desa_kelurahan` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_melalui_KUD` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_melalui_tengkulak` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_melalui_pengecer` enum('Ya','Tidak') DEFAULT NULL,
  `dijual_ke_lumbung_desa_kelurahan` enum('Ya','Tidak') DEFAULT NULL,
  `tidak_dijual` enum('Ya','Tidak') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_produksi_ikan`
--

INSERT INTO `jenis_produksi_ikan` (`id`, `id_desa`, `tanggal`, `nama_ikan`, `hasil_produksi_ton_pertahun`, `harga_jual_rp_perton`, `nilai_produksi_rp`, `nilai_bahan_baku_yang_rp`, `nilai_bahan_penolong_yang_rp`, `biaya_antara_yang_dihabiskan_rp`, `saldo_produksi_rp`, `jumlah_jenis_usaha_perikanan`, `dijual_langsung_ke_konsumen`, `dijual_ke_pasar_desa_kelurahan`, `dijual_melalui_KUD`, `dijual_melalui_tengkulak`, `dijual_melalui_pengecer`, `dijual_ke_lumbung_desa_kelurahan`, `tidak_dijual`, `created_at`, `updated_at`) VALUES
(2, 1, '2014-08-02', 375, '2.00', '2.00', 4, '2.00', '1.00', '2.00', 1, '22.00', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', '2017-06-02 12:40:35', '2017-06-02 12:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `kode` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `kode`) VALUES
(1, 'Mersam', '15.04.01'),
(2, 'Muara Tembesi', '15.04.02'),
(3, 'Muara Bulian', '15.04.03'),
(4, 'Batin XXIV', '15.04.04'),
(5, 'Pemayung', '15.04.05'),
(6, 'Maro Sebo Ulu', '15.04.06'),
(7, 'Bajubang', '15.04.07'),
(8, 'Maro Sebo Ilir', '15.04.08');

-- --------------------------------------------------------

--
-- Table structure for table `kepemilikan_lahan_hutan`
--

CREATE TABLE IF NOT EXISTS `kepemilikan_lahan_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `milik_negara_ha` decimal(10,3) DEFAULT '0.000',
  `milik_adat_atau_ulayat_ha` decimal(10,3) DEFAULT '0.000',
  `perhutanan_instansi_sektoral_ha` decimal(10,3) DEFAULT '0.000',
  `milik_masyarakat_perorangan_ha` decimal(10,3) DEFAULT '0.000',
  `luas_hutan_ha` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kepemilikan_lahan_hutan`
--

INSERT INTO `kepemilikan_lahan_hutan` (`id`, `id_desa`, `tanggal`, `milik_negara_ha`, `milik_adat_atau_ulayat_ha`, `perhutanan_instansi_sektoral_ha`, `milik_masyarakat_perorangan_ha`, `luas_hutan_ha`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-16', '10.000', '10.000', '1210.000', '10.000', 400, '2017-06-03 10:08:26', '2017-06-03 03:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `kepemilikan_lahan_pangan`
--

CREATE TABLE IF NOT EXISTS `kepemilikan_lahan_pangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_desa` int(11) NOT NULL,
  `memiliki_kurang_10_ha` int(11) DEFAULT '0',
  `memiliki_10_sd_50_ha` int(11) DEFAULT '0',
  `memiliki_50_sd_100_ha` int(11) DEFAULT '0',
  `memiliki_lebih_dari_100_ha` int(11) DEFAULT '0',
  `jumlah_keluarga_memiliki_lahan` int(11) NOT NULL DEFAULT '0',
  `jumlah_keluarga_tidak_memiliki_lahan` int(11) NOT NULL DEFAULT '0',
  `jumlah_keluarga_petani_tanaman_pangan` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tanggal` (`tanggal`,`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kepemilikan_lahan_pangan`
--

INSERT INTO `kepemilikan_lahan_pangan` (`id`, `tanggal`, `id_desa`, `memiliki_kurang_10_ha`, `memiliki_10_sd_50_ha`, `memiliki_50_sd_100_ha`, `memiliki_lebih_dari_100_ha`, `jumlah_keluarga_memiliki_lahan`, `jumlah_keluarga_tidak_memiliki_lahan`, `jumlah_keluarga_petani_tanaman_pangan`, `created_at`, `updated_at`) VALUES
(2, '2017-05-31', 1, 8, 6, 7, 12, 33, 2, 35, '2017-05-31 03:24:50', '2017-05-31 09:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `komuditas`
--

CREATE TABLE IF NOT EXISTS `komuditas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tipe` enum('pangan','buah','hutan','ternak','ikan','kebun','galian','apotik','produksiikan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=464 ;

--
-- Dumping data for table `komuditas`
--

INSERT INTO `komuditas` (`id`, `nama`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'Jagung', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(2, 'Kacang kedelai', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(3, 'Kacang tanah', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(4, 'Kacang panjang', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(5, 'Kacang mede', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(6, 'Kacang merah', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(7, 'Padi sawah', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(8, 'Padi ladang', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(9, 'Ubi kayu', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(10, 'Ubi jalar', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(11, 'Cabe', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(12, 'Bawang Merah', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(13, 'Bawang putih', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(14, 'Tomat', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(15, 'Sawi', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(16, 'Kentang', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(17, 'Kubis', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(18, 'Mentimun', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(19, 'Buncis', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(20, 'Brocoli', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(21, 'Terong', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(22, 'Bayam', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(23, 'Kangkung', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(24, 'Kacang turis', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(25, 'Umbi-umbian lain', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(26, 'Selada', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(27, 'Talas', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(28, 'Wortel', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(29, 'Tumpang Sari', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(30, 'Jeruk', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(31, 'Alpokat', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(32, 'Mangga', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(33, 'Rambutan', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(34, 'Manggis', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(35, 'Salak', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(36, 'Apel', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(37, 'Pepaya', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(38, 'Belimbing', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(39, 'Durian', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(40, 'Sawo', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(41, 'Duku', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(42, 'Kokosan', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(43, 'Pisang', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(44, 'Markisa', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(45, 'Lengkeng', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(46, 'Semangka', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(47, 'Limau', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(48, 'Jeruk nipis', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(49, 'Melon', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(50, 'Jambu air', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(51, 'Nangka', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(52, 'Sirsak', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(53, 'Kedondong', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(54, 'Anggur', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(55, 'Melinjo', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(56, 'Nenas', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(57, 'Jambu klutuk', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(58, 'Murbei', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(78, 'Jamur', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(80, 'Kelapa', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(81, 'Kelapa sawit', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(82, 'Kopi', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(83, 'Cengkeh', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(84, 'Coklat', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(85, 'Pinang', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(86, 'Lada', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(87, 'Karet', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(88, 'Jambu Mete', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(89, 'Tembakau', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(90, 'Pala', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(91, 'Vanili', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(92, 'Jarak pagar', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(93, 'Jarak kepyar', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(94, 'Tebu', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(95, 'Kapuk', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(96, 'Kemiri', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(97, 'Teh', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(98, 'Kayu', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(99, 'Madu lebah', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(100, 'Rotan', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(101, 'Damar', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(102, 'Bambu', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(103, 'Jati', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(104, 'Nilam', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(105, 'Lontar', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(106, 'Sagu', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(107, 'Enau', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(108, 'Mahoni', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(109, 'Cemara', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(110, 'Kayu cendana', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(111, 'Kayu gaharu', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(112, 'Sarang burung', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(113, 'Meranti', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(114, 'Kayu besi', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(115, 'Kayu ulin', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(116, 'Kemenyan', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(117, 'Gambir', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(118, 'Minyak kayu putih', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(119, 'Gula enau', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(120, 'Gula lontar', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(121, 'Arang', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(122, 'Sapi', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(123, 'Kerbau', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(124, 'Babi', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(125, 'Ayam kampung', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(126, 'Jenis ayam broiler', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(127, 'Bebek', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(128, 'Kuda', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(129, 'Kambing', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(130, 'Domba', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(131, 'Angsa', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(132, 'Burung puyuh', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(133, 'Kelinci', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(135, 'Anjing', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(136, 'Kucing', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(137, 'Ular cobra', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(138, 'Burung onta', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(139, 'Ular pithon', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(140, 'Burung cendrawasih', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(141, 'Burung kakatua', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(142, 'Burung beo', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(143, 'Burung merak', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(144, 'Burung langka lainnya', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(145, 'Buaya', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(146, 'Tuna', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(147, 'Salmon', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(148, 'Tongkol/cakalang', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(149, 'Hiu', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(150, 'Kakap', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(151, 'Tenggiri', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(152, 'Jambal', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(153, 'Pari', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(154, 'Kuwe', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(155, 'Belanak', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(156, 'Cumi', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(157, 'Gurita', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(158, 'Sarden', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(159, 'Bawal', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(160, 'Baronang', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(161, 'Kembung', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(162, 'Ikan ekor kuning', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(163, 'Kerapu/Sunuk', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(164, 'Teripang', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(165, 'Barabara', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(166, 'Cucut', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(167, 'Layur', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(168, 'Ayam-ayam', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(169, 'Udang/lobster', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(170, 'Tembang', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(171, 'Bandeng', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(172, 'Nener', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(173, 'Kerang', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(174, 'Kepiting', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(175, 'Mas', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(176, 'Rajungan', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(177, 'Mujair', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(178, 'Lele', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(179, 'Gabus', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(180, 'Patin', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(181, 'Nila', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(182, 'Sepat', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(183, 'Gurame', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(184, 'Belut', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(185, 'Penyu', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(186, 'Rumput laut', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(187, 'Kodok', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(188, 'Katak', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(209, 'Kulit kerang', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(244, 'Burung Merpati', 'ternak', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(245, 'Ijuk Enau', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(246, 'Kayu Sengon', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(247, 'Kayu Bakar', 'hutan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(249, 'Matoa', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(251, 'Tuna', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(253, 'Kacang Hijau', 'pangan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(254, 'Teri', 'ikan', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(255, 'Stroberi', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(256, 'Kemiri', 'kebun', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(257, 'Kesemek', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(258, 'Gandaria', 'buah', '2017-05-31 17:09:21', '0000-00-00 00:00:00'),
(259, 'Aluminium', 'galian', '2017-06-01 09:48:07', NULL),
(260, 'Batu Apung', 'galian', '2017-06-01 09:48:07', NULL),
(261, 'Batu Cadas', 'galian', '2017-06-01 09:48:07', NULL),
(262, 'Batu Gamping', 'galian', '2017-06-01 09:48:07', NULL),
(263, 'Batu Gips', 'galian', '2017-06-01 09:48:07', NULL),
(264, 'Batu Granit', 'galian', '2017-06-01 09:48:07', NULL),
(265, 'Batu Gunung', 'galian', '2017-06-01 09:48:07', NULL),
(266, 'Batu Kali', 'galian', '2017-06-01 09:48:07', NULL),
(267, 'Batu Kapur', 'galian', '2017-06-01 09:48:07', NULL),
(268, 'Batu Marmer', 'galian', '2017-06-01 09:48:07', NULL),
(269, 'Batu Putih', 'galian', '2017-06-01 09:48:07', NULL),
(270, 'Batu Trass', 'galian', '2017-06-01 09:48:07', NULL),
(271, 'Batubara', 'galian', '2017-06-01 09:48:07', NULL),
(272, 'Belerang', 'galian', '2017-06-01 09:48:07', NULL),
(273, 'Biji Besi', 'galian', '2017-06-01 09:48:07', NULL),
(274, 'Aluminium', 'galian', '2017-06-01 09:48:26', NULL),
(275, 'Batu Apung', 'galian', '2017-06-01 09:48:26', NULL),
(276, 'Batu Cadas', 'galian', '2017-06-01 09:48:26', NULL),
(277, 'Batu Gamping', 'galian', '2017-06-01 09:48:26', NULL),
(278, 'Batu Gips', 'galian', '2017-06-01 09:48:26', NULL),
(279, 'Batu Granit', 'galian', '2017-06-01 09:48:26', NULL),
(280, 'Batu Gunung', 'galian', '2017-06-01 09:48:26', NULL),
(281, 'Batu Kali', 'galian', '2017-06-01 09:48:26', NULL),
(282, 'Batu Kapur', 'galian', '2017-06-01 09:48:26', NULL),
(283, 'Batu Marmer', 'galian', '2017-06-01 09:48:26', NULL),
(284, 'Batu Putih', 'galian', '2017-06-01 09:48:26', NULL),
(285, 'Batu Trass', 'galian', '2017-06-01 09:48:26', NULL),
(286, 'Batubara', 'galian', '2017-06-01 09:48:26', NULL),
(287, 'Belerang', 'galian', '2017-06-01 09:48:26', NULL),
(288, 'Biji Besi', 'galian', '2017-06-01 09:48:26', NULL),
(289, 'Boixit', 'galian', '2017-06-01 09:55:14', '2017-05-31 17:00:00'),
(290, 'Emas', 'galian', '2017-06-01 09:59:53', NULL),
(291, 'Garam', 'galian', '2017-06-01 09:59:53', NULL),
(292, 'Gas Alam', 'galian', '2017-06-01 09:59:53', NULL),
(293, 'Gips', 'galian', '2017-06-01 09:59:53', NULL),
(294, 'Kuningan', 'galian', '2017-06-01 09:59:53', NULL),
(295, 'Mangan', 'galian', '2017-06-01 09:59:53', NULL),
(296, 'Minyak', 'galian', '2017-06-01 09:59:53', NULL),
(297, 'Minyak Bumi', 'galian', '2017-06-01 09:59:53', NULL),
(298, 'Nikel', 'galian', '2017-06-01 09:59:53', NULL),
(299, 'Pasir', 'galian', '2017-06-01 09:59:53', NULL),
(300, 'Pasir Batu', 'galian', '2017-06-01 09:59:53', NULL),
(301, 'Pasir Besi', 'galian', '2017-06-01 09:59:53', NULL),
(302, 'Pasir Kwarsa', 'galian', '2017-06-01 09:59:53', NULL),
(303, 'Perak', 'galian', '2017-06-01 09:59:53', NULL),
(304, 'Perunggu', 'galian', '2017-06-01 09:59:53', NULL),
(305, 'Tanah Liat', 'galian', '2017-06-01 09:59:53', NULL),
(306, 'Tanah Garam', 'galian', '2017-06-01 09:59:53', NULL),
(307, 'Tembaga', 'galian', '2017-06-01 09:59:53', NULL),
(308, 'Timah', 'galian', '2017-06-01 09:59:53', NULL),
(309, 'Uranium', 'galian', '2017-06-01 09:59:53', NULL),
(310, 'Emas', 'galian', '2017-06-01 10:00:02', NULL),
(311, 'Garam', 'galian', '2017-06-01 10:00:02', NULL),
(312, 'Gas Alam', 'galian', '2017-06-01 10:00:02', NULL),
(313, 'Gips', 'galian', '2017-06-01 10:00:02', NULL),
(314, 'Kuningan', 'galian', '2017-06-01 10:00:02', NULL),
(315, 'Mangan', 'galian', '2017-06-01 10:00:02', NULL),
(316, 'Minyak', 'galian', '2017-06-01 10:00:02', NULL),
(317, 'Minyak Bumi', 'galian', '2017-06-01 10:00:02', NULL),
(318, 'Nikel', 'galian', '2017-06-01 10:00:02', NULL),
(319, 'Pasir', 'galian', '2017-06-01 10:00:02', NULL),
(320, 'Pasir Batu', 'galian', '2017-06-01 10:00:02', NULL),
(321, 'Pasir Besi', 'galian', '2017-06-01 10:00:02', NULL),
(322, 'Pasir Kwarsa', 'galian', '2017-06-01 10:00:02', NULL),
(323, 'Perak', 'galian', '2017-06-01 10:00:02', NULL),
(324, 'Perunggu', 'galian', '2017-06-01 10:00:02', NULL),
(325, 'Tanah Liat', 'galian', '2017-06-01 10:00:02', NULL),
(326, 'Tanah Garam', 'galian', '2017-06-01 10:00:02', NULL),
(327, 'Tembaga', 'galian', '2017-06-01 10:00:02', NULL),
(328, 'Timah', 'galian', '2017-06-01 10:00:02', NULL),
(329, 'Uranium', 'galian', '2017-06-01 10:00:02', NULL),
(331, 'Akar Wangi', 'apotik', '2017-06-01 10:10:56', NULL),
(334, 'Buah Merah', 'apotik', '2017-06-01 10:16:41', NULL),
(335, 'Daun Dewa', 'apotik', '2017-06-01 10:16:41', NULL),
(336, 'Daun Sereh', 'apotik', '2017-06-01 10:16:41', NULL),
(337, 'Daun Sirih', 'apotik', '2017-06-01 10:16:41', NULL),
(338, 'Dewi-Dewi', 'apotik', '2017-06-01 10:16:41', NULL),
(339, 'Jahe', 'apotik', '2017-06-01 10:16:41', NULL),
(340, 'Jamur', 'apotik', '2017-06-01 10:16:41', NULL),
(341, 'Kayu Manis', 'apotik', '2017-06-01 10:16:41', NULL),
(342, 'Kencur', 'apotik', '2017-06-01 10:16:41', NULL),
(343, 'Kumis Kucing', 'apotik', '2017-06-01 10:16:41', NULL),
(344, 'Kunyit', 'apotik', '2017-06-01 10:16:41', NULL),
(345, 'Lengkuas', 'apotik', '2017-06-01 10:16:41', NULL),
(346, 'Mahkota Dewa', 'apotik', '2017-06-01 10:16:41', NULL),
(347, 'Mengkudu', 'apotik', '2017-06-01 10:16:41', NULL),
(348, 'Sambiloto', 'apotik', '2017-06-01 10:16:41', NULL),
(349, 'Temu Hitam', 'apotik', '2017-06-01 10:16:41', NULL),
(350, 'Temu Kunci', 'apotik', '2017-06-01 10:16:41', NULL),
(351, 'Temu Putih', 'apotik', '2017-06-01 10:16:41', NULL),
(352, 'Temu Putri', 'apotik', '2017-06-01 10:16:41', NULL),
(353, 'Temulawak', 'apotik', '2017-06-01 10:16:41', NULL),
(354, 'Buah Merah', 'apotik', '2017-06-01 10:16:46', NULL),
(355, 'Daun Dewa', 'apotik', '2017-06-01 10:16:46', NULL),
(356, 'Daun Sereh', 'apotik', '2017-06-01 10:16:46', NULL),
(357, 'Daun Sirih', 'apotik', '2017-06-01 10:16:46', NULL),
(358, 'Dewi-Dewi', 'apotik', '2017-06-01 10:16:46', NULL),
(359, 'Jahe', 'apotik', '2017-06-01 10:16:46', NULL),
(360, 'Jamur', 'apotik', '2017-06-01 10:16:46', NULL),
(361, 'Kayu Manis', 'apotik', '2017-06-01 10:16:46', NULL),
(362, 'Kencur', 'apotik', '2017-06-01 10:16:46', NULL),
(363, 'Kumis Kucing', 'apotik', '2017-06-01 10:16:46', NULL),
(364, 'Kunyit', 'apotik', '2017-06-01 10:16:46', NULL),
(365, 'Lengkuas', 'apotik', '2017-06-01 10:16:46', NULL),
(366, 'Mahkota Dewa', 'apotik', '2017-06-01 10:16:46', NULL),
(367, 'Mengkudu', 'apotik', '2017-06-01 10:16:46', NULL),
(368, 'Sambiloto', 'apotik', '2017-06-01 10:16:46', NULL),
(369, 'Temu Hitam', 'apotik', '2017-06-01 10:16:46', NULL),
(370, 'Temu Kunci', 'apotik', '2017-06-01 10:16:46', NULL),
(371, 'Temu Putih', 'apotik', '2017-06-01 10:16:46', NULL),
(372, 'Temu Putri', 'apotik', '2017-06-01 10:16:46', NULL),
(373, 'Temulawak', 'apotik', '2017-06-01 10:16:46', NULL),
(374, 'Ayam-Ayam', 'produksiikan', '2017-06-02 17:55:20', NULL),
(375, 'Bandeng', 'produksiikan', '2017-06-02 17:55:20', NULL),
(376, 'Barabara', 'produksiikan', '2017-06-02 17:55:20', NULL),
(377, 'Baronang', 'produksiikan', '2017-06-02 17:55:20', NULL),
(378, 'Bawal', 'produksiikan', '2017-06-02 17:55:20', NULL),
(379, 'Belanak', 'produksiikan', '2017-06-02 17:55:20', NULL),
(380, 'Belut', 'produksiikan', '2017-06-02 17:55:20', NULL),
(381, 'Cucut', 'produksiikan', '2017-06-02 17:55:20', NULL),
(382, 'Cumi', 'produksiikan', '2017-06-02 17:55:20', NULL),
(383, 'Gabus', 'produksiikan', '2017-06-02 17:55:20', NULL),
(384, 'Gurami', 'produksiikan', '2017-06-02 17:55:20', NULL),
(385, 'Gurita', 'produksiikan', '2017-06-02 17:55:20', NULL),
(386, 'Hiu', 'produksiikan', '2017-06-02 17:55:20', NULL),
(387, 'Ikan Ekor Kuning', 'produksiikan', '2017-06-02 17:55:20', NULL),
(388, 'Jambal', 'produksiikan', '2017-06-02 17:55:20', NULL),
(389, 'Ayam-Ayam', 'produksiikan', '2017-06-02 17:55:24', NULL),
(390, 'Bandeng', 'produksiikan', '2017-06-02 17:55:24', NULL),
(391, 'Barabara', 'produksiikan', '2017-06-02 17:55:24', NULL),
(392, 'Baronang', 'produksiikan', '2017-06-02 17:55:24', NULL),
(393, 'Bawal', 'produksiikan', '2017-06-02 17:55:24', NULL),
(394, 'Belanak', 'produksiikan', '2017-06-02 17:55:24', NULL),
(395, 'Belut', 'produksiikan', '2017-06-02 17:55:24', NULL),
(396, 'Cucut', 'produksiikan', '2017-06-02 17:55:24', NULL),
(397, 'Cumi', 'produksiikan', '2017-06-02 17:55:24', NULL),
(398, 'Gabus', 'produksiikan', '2017-06-02 17:55:24', NULL),
(399, 'Gurami', 'produksiikan', '2017-06-02 17:55:24', NULL),
(400, 'Gurita', 'produksiikan', '2017-06-02 17:55:24', NULL),
(401, 'Hiu', 'produksiikan', '2017-06-02 17:55:24', NULL),
(402, 'Ikan Ekor Kuning', 'produksiikan', '2017-06-02 17:55:24', NULL),
(403, 'Jambal', 'produksiikan', '2017-06-02 17:55:24', NULL),
(404, 'Kakap', 'produksiikan', '2017-06-02 18:01:46', NULL),
(405, 'Katak', 'produksiikan', '2017-06-02 18:01:46', NULL),
(406, 'Kembung', 'produksiikan', '2017-06-02 18:01:46', NULL),
(407, 'Kepiting', 'produksiikan', '2017-06-02 18:01:46', NULL),
(408, 'Kerang', 'produksiikan', '2017-06-02 18:01:46', NULL),
(409, 'Kurapo/Sunuk', 'produksiikan', '2017-06-02 18:01:46', NULL),
(410, 'Kodok', 'produksiikan', '2017-06-02 18:01:46', NULL),
(411, 'Kulit Kerang', 'produksiikan', '2017-06-02 18:01:46', NULL),
(412, 'Kuwe', 'produksiikan', '2017-06-02 18:01:46', NULL),
(413, 'Layur', 'produksiikan', '2017-06-02 18:01:46', NULL),
(414, 'Lele', 'produksiikan', '2017-06-02 18:01:46', NULL),
(415, 'Mas', 'produksiikan', '2017-06-02 18:01:46', NULL),
(416, 'Mujair', 'produksiikan', '2017-06-02 18:01:46', NULL),
(417, 'Nener', 'produksiikan', '2017-06-02 18:01:46', NULL),
(418, 'Nila', 'produksiikan', '2017-06-02 18:01:46', NULL),
(419, 'Pari', 'produksiikan', '2017-06-02 18:01:46', NULL),
(420, 'Patin', 'produksiikan', '2017-06-02 18:01:46', NULL),
(421, 'Penyu', 'produksiikan', '2017-06-02 18:01:46', NULL),
(422, 'Rajungan', 'produksiikan', '2017-06-02 18:01:46', NULL),
(423, 'Rumput Laut', 'produksiikan', '2017-06-02 18:01:46', NULL),
(424, 'Salmon', 'produksiikan', '2017-06-02 18:01:46', NULL),
(425, 'Sarden', 'produksiikan', '2017-06-02 18:01:46', NULL),
(426, 'Sepat', 'produksiikan', '2017-06-02 18:01:46', NULL),
(427, 'Tembang', 'produksiikan', '2017-06-02 18:01:46', NULL),
(428, 'Tenggiri', 'produksiikan', '2017-06-02 18:01:46', NULL),
(429, 'Teri', 'produksiikan', '2017-06-02 18:01:46', NULL),
(430, 'Teripang', 'produksiikan', '2017-06-02 18:01:46', NULL),
(431, 'Tongkol/Cakalang', 'produksiikan', '2017-06-02 18:01:46', NULL),
(432, 'Tona', 'produksiikan', '2017-06-02 18:01:46', NULL),
(433, 'Udang/Lobster', 'produksiikan', '2017-06-02 18:01:46', NULL),
(434, 'Kakap', 'produksiikan', '2017-06-02 18:01:51', NULL),
(435, 'Katak', 'produksiikan', '2017-06-02 18:01:51', NULL),
(436, 'Kembung', 'produksiikan', '2017-06-02 18:01:51', NULL),
(437, 'Kepiting', 'produksiikan', '2017-06-02 18:01:51', NULL),
(438, 'Kerang', 'produksiikan', '2017-06-02 18:01:51', NULL),
(439, 'Kurapo/Sunuk', 'produksiikan', '2017-06-02 18:01:51', NULL),
(440, 'Kodok', 'produksiikan', '2017-06-02 18:01:51', NULL),
(441, 'Kulit Kerang', 'produksiikan', '2017-06-02 18:01:51', NULL),
(442, 'Kuwe', 'produksiikan', '2017-06-02 18:01:51', NULL),
(443, 'Layur', 'produksiikan', '2017-06-02 18:01:51', NULL),
(444, 'Lele', 'produksiikan', '2017-06-02 18:01:51', NULL),
(445, 'Mas', 'produksiikan', '2017-06-02 18:01:51', NULL),
(446, 'Mujair', 'produksiikan', '2017-06-02 18:01:51', NULL),
(447, 'Nener', 'produksiikan', '2017-06-02 18:01:51', NULL),
(448, 'Nila', 'produksiikan', '2017-06-02 18:01:51', NULL),
(449, 'Pari', 'produksiikan', '2017-06-02 18:01:51', NULL),
(450, 'Patin', 'produksiikan', '2017-06-02 18:01:51', NULL),
(451, 'Penyu', 'produksiikan', '2017-06-02 18:01:51', NULL),
(452, 'Rajungan', 'produksiikan', '2017-06-02 18:01:51', NULL),
(453, 'Rumput Laut', 'produksiikan', '2017-06-02 18:01:51', NULL),
(454, 'Salmon', 'produksiikan', '2017-06-02 18:01:51', NULL),
(455, 'Sarden', 'produksiikan', '2017-06-02 18:01:51', NULL),
(456, 'Sepat', 'produksiikan', '2017-06-02 18:01:51', NULL),
(457, 'Tembang', 'produksiikan', '2017-06-02 18:01:51', NULL),
(458, 'Tenggiri', 'produksiikan', '2017-06-02 18:01:51', NULL),
(459, 'Teri', 'produksiikan', '2017-06-02 18:01:51', NULL),
(460, 'Teripang', 'produksiikan', '2017-06-02 18:01:51', NULL),
(461, 'Tongkol/Cakalang', 'produksiikan', '2017-06-02 18:01:51', NULL),
(462, 'Tona', 'produksiikan', '2017-06-02 18:01:51', NULL),
(463, 'Udang/Lobster', 'produksiikan', '2017-06-02 18:01:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_hutan`
--

CREATE TABLE IF NOT EXISTS `kondisi_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_hutan` enum('Hutan Bakau/Mangrove','Hutan Lindung','Hutan Produksi','Hutan Suaka Alam','Hutan Suaka Margasatwa') DEFAULT NULL,
  `kondisi_baik_ha` decimal(10,3) DEFAULT '0.000',
  `kondisi_rusak_ha` decimal(10,3) DEFAULT '0.000',
  `jumlah_luas_hutan_ha` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kualitas_air_minum`
--

CREATE TABLE IF NOT EXISTS `kualitas_air_minum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_air_minum` enum('Bak penampung air hujan','Beli dari tangki swasta','Depot isi ulang','Embung','Hidran umum','Mata Air','Sungai','PAM','Pipa','Sumber Lain','Sumur Gali','Sumur Pompa') NOT NULL,
  `baik` enum('Ya','TIdak') NOT NULL,
  `berbau` enum('Ya','Tidak') NOT NULL,
  `berwarna` enum('Ya','Tidak') NOT NULL,
  `berasa` enum('Ya','Tidak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kualitas_air_minum`
--

INSERT INTO `kualitas_air_minum` (`id`, `id_desa`, `tanggal`, `jenis_air_minum`, `baik`, `berbau`, `berwarna`, `berasa`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-07-01', 'Depot isi ulang', 'Ya', 'Tidak', 'Tidak', 'Ya', '2017-06-01 21:44:31', '2017-06-01 21:44:31'),
(2, 1, '2015-04-02', 'Hidran umum', 'Ya', 'Tidak', 'Ya', 'Tidak', '2017-06-02 04:47:23', '2017-06-01 21:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `potensi_pemanfaatan_air`
--

CREATE TABLE IF NOT EXISTS `potensi_pemanfaatan_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_potensi_air_dan_sumber_daya_air` enum('Bendungan/Waduk/Situ (Ha)','Danau (Ha)','Embung-Embung (Ha)','Jebakan Air (Ha)','Mata Air (Buah)','Rawa (Ha)','Sungai (Buah)') NOT NULL,
  `jumlah_buah_atau_luas_ha` decimal(10,3) NOT NULL DEFAULT '0.000',
  `debit_atau_volume` enum('Kecil','Sedang','Besar') NOT NULL,
  `kondisi` enum('','Berkurangnya biota sungai','Berlumpur','Jernih dan Tidak Tercemar/memenuhi baku mutu air','Kering','Keruh','Pendangkalan/Pengendapan Lumpur Tinggi','Tercemar') DEFAULT NULL,
  `pemanfaatan` enum('','Air baku untuk pengolahan air minum','Prasarana transportasi','Pembangkit listrik','Perikanan darat maupun laut','Irigasi','Cuci Dan Mandi','Sayuran','Pembudidayaan Hutan Mangrove','Buang air besar','Dan Lain-lain') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `potensi_pemanfaatan_air`
--

INSERT INTO `potensi_pemanfaatan_air` (`id`, `id_desa`, `tanggal`, `jenis_potensi_air_dan_sumber_daya_air`, `jumlah_buah_atau_luas_ha`, `debit_atau_volume`, `kondisi`, `pemanfaatan`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-07-01', '', '6656.500', 'Sedang', 'Kering', '', '2017-06-02 17:08:45', '2017-06-02 10:08:45'),
(3, 1, '2018-03-15', '', '0.000', 'Besar', '', '', '2017-06-02 10:10:15', '2017-06-02 10:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `potensi_wisata`
--

CREATE TABLE IF NOT EXISTS `potensi_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi_atau_area_wisata` enum('Agrowisata','Air Terjun','Arung Jeram','Cagar Budaya','Danau','Goa','Gunung','Hutan Khusus','Wisata Laut','Padang Savana','Situs Sejarah dan Museum') NOT NULL,
  `keberadaan` enum('Ada','Tidak Ada') NOT NULL,
  `luas_ha` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tingkat_pemanfaatan` enum('Aktif','Pasif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`),
  KEY `id_desa_2` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `potensi_wisata`
--

INSERT INTO `potensi_wisata` (`id`, `id_desa`, `tanggal`, `lokasi_atau_area_wisata`, `keberadaan`, `luas_ha`, `tingkat_pemanfaatan`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-08', 'Wisata Laut', 'Tidak Ada', '12.12', 'Pasif', '2017-06-01 07:41:22', '2017-06-01 00:41:16'),
(2, 1, '2017-06-07', 'Goa', 'Tidak Ada', '45.55', 'Aktif', '2017-06-01 00:41:38', '2017-06-01 00:41:38'),
(3, 1, '2017-06-06', 'Padang Savana', 'Tidak Ada', '0.90', 'Aktif', '2017-06-01 09:26:56', '2017-06-01 09:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ikan_laut`
--

CREATE TABLE IF NOT EXISTS `produksi_ikan_laut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_dan_alat_produksi` enum('Jala (Unit)','Jermal (Unit)','Keramba (Unit)','Pancing (Unit)','Pukat (Unit)','Tambak (Ha)') NOT NULL,
  `jumlah_alat_atau_luas` decimal(10,3) DEFAULT '0.000',
  `hasil_produksi_ton_pertahun` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `produksi_ikan_laut`
--

INSERT INTO `produksi_ikan_laut` (`id`, `id_desa`, `tanggal`, `jenis_dan_alat_produksi`, `jumlah_alat_atau_luas`, `hasil_produksi_ton_pertahun`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-15', '', '98988.900', '999.89', '2017-06-02 18:36:24', '2017-06-02 11:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `produksi_ikan_tawar`
--

CREATE TABLE IF NOT EXISTS `produksi_ikan_tawar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_dan_sarana_produksi` enum('Danau (m2)','Empang/Kolam (m2)','Jala (Unit)','Keramba (Unit)','Pancingan (Unit)','Rawa (m2)','Sawah (m2)','Sungai (m2)') NOT NULL,
  `jumlah_alat_atau_luas` decimal(10,3) DEFAULT '0.000',
  `hasil_produksi_ton_pertahun` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_desa` (`id_desa`,`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `produksi_ikan_tawar`
--

INSERT INTO `produksi_ikan_tawar` (`id`, `id_desa`, `tanggal`, `jenis_dan_sarana_produksi`, `jumlah_alat_atau_luas`, `hasil_produksi_ton_pertahun`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-07', 'Rawa (m2)', '990.090', '9.09', '2017-06-02 11:51:04', '2017-06-02 11:51:04'),
(3, 1, '2017-06-14', '', '0.000', '0.00', '2017-06-02 18:51:41', '2017-06-02 11:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_publik`
--

CREATE TABLE IF NOT EXISTS `ruang_publik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_ruang_publik_atau_taman` enum('Hutan Kota','Taman Bermain','Taman Desa/Kel','Taman Kota','Tanah Adat','Tanah Kas Adat') NOT NULL,
  `keberadaan` enum('Ada','Tidak Ada') NOT NULL,
  `luas_m2` decimal(10,0) DEFAULT '0',
  `tingkat_pemanfaatan` enum('Aktif','Pasif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tanggal` (`tanggal`),
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ruang_publik`
--

INSERT INTO `ruang_publik` (`id`, `id_desa`, `tanggal`, `jenis_ruang_publik_atau_taman`, `keberadaan`, `luas_m2`, `tingkat_pemanfaatan`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-14', 'Taman Kota', 'Ada', '9', 'Aktif', '2017-06-01 08:38:16', '2017-06-01 01:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1',
  `usertype` enum('desa','nondesa') NOT NULL,
  `remember_token` varchar(350) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `aktif`, `usertype`, `remember_token`, `created_at`, `updated_at`, `nama`, `email`) VALUES
(1, '1504052017', '$2y$10$pbexnW4X.h5AtZG8p7aW1eV8SfXtKjYKkiGGmJqJnpjgiIGxF7Sjm', 1, 'desa', 'RSaX4pr8zJyuTAx9fXCni3UAtEnpH00AShoQiO8LmwgrGPU6gyHxNIVaLsBP', '2017-05-27 11:14:25', '2017-05-30 09:52:00', 'Operator Desa', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `id_desa`, `id_kecamatan`, `id_kabupaten`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 1, '2017-05-27 18:20:25', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
