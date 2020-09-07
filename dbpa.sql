-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 02:28 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_blog`
--

CREATE TABLE `bukti_blog` (
  `id_bukti_blog` int(11) NOT NULL,
  `id_blog` int(11) DEFAULT NULL,
  `id_indikator_blog` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_blog`
--

INSERT INTO `bukti_blog` (`id_bukti_blog`, `id_blog`, `id_indikator_blog`, `isi_bukti`) VALUES
(1, 1, 2, '3');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bukuajar`
--

CREATE TABLE `bukti_bukuajar` (
  `id_bukti_bukuajar` int(11) NOT NULL,
  `id_bukuajar` int(11) DEFAULT NULL,
  `id_indikator_bukuajar` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_bukuajar`
--

INSERT INTO `bukti_bukuajar` (`id_bukti_bukuajar`, `id_bukuajar`, `id_indikator_bukuajar`, `isi_bukti`) VALUES
(1, 1, 1, 'SOAL_TP_MODUL_4.docx'),
(2, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_haki`
--

CREATE TABLE `bukti_haki` (
  `id_bukti_haki` int(11) NOT NULL,
  `id_haki` int(11) DEFAULT NULL,
  `id_indikator_haki` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_haki`
--

INSERT INTO `bukti_haki` (`id_bukti_haki`, `id_haki`, `id_indikator_haki`, `isi_bukti`) VALUES
(11, 7, 1, 'Praktikum_5_APSI6.pdf'),
(12, 7, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_penelitian`
--

CREATE TABLE `bukti_penelitian` (
  `id_bukti_penelitian` int(11) NOT NULL,
  `id_penelitian` int(11) DEFAULT NULL,
  `id_indikator_penelitian` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_penelitian`
--

INSERT INTO `bukti_penelitian` (`id_bukti_penelitian`, `id_penelitian`, `id_indikator_penelitian`, `isi_bukti`) VALUES
(1, 1, 1, 'test'),
(2, 1, 2, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pengmas`
--

CREATE TABLE `bukti_pengmas` (
  `id_bukti_pengmas` int(11) NOT NULL,
  `id_pengmas` int(11) DEFAULT NULL,
  `id_indikator_pengmas` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_pengmas`
--

INSERT INTO `bukti_pengmas` (`id_bukti_pengmas`, `id_pengmas`, `id_indikator_pengmas`, `isi_bukti`) VALUES
(3, 3, 1, 'Praktikum_5_APSI.pdf'),
(4, 3, 2, 'Template_TP.docx'),
(5, 1, 1, 'Template_TP.docx'),
(6, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_publikasi`
--

CREATE TABLE `bukti_publikasi` (
  `id_bukti_publikasi` int(11) NOT NULL,
  `id_publikasi` int(11) DEFAULT NULL,
  `id_indikator_publikasi` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_publikasi`
--

INSERT INTO `bukti_publikasi` (`id_bukti_publikasi`, `id_publikasi`, `id_indikator_publikasi`, `isi_bukti`) VALUES
(7, 5, 2, 'xnbc'),
(8, 5, 4, 'erd3.jpeg'),
(9, 5, 5, 'contoh-kasus-data-basdat23.pdf'),
(10, 5, 6, ''),
(11, 5, 7, ''),
(12, 6, 2, 'erd3.jpeg'),
(13, 6, 4, 'ISO13407.pdf'),
(14, 6, 5, ''),
(15, 6, 6, ''),
(16, 6, 7, ''),
(17, 7, 2, 'Jurnal_6_-_Join.docx'),
(18, 7, 4, 'Jurnal_6_-_Join1.docx'),
(19, 7, 5, ''),
(20, 7, 6, ''),
(21, 7, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_sertifikasi`
--

CREATE TABLE `bukti_sertifikasi` (
  `id_bukti_sertifikasi` int(11) NOT NULL,
  `id_sertifikasi` int(11) DEFAULT NULL,
  `id_indikator_sertifikasi` int(11) DEFAULT NULL,
  `isi_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_sertifikasi`
--

INSERT INTO `bukti_sertifikasi` (`id_bukti_sertifikasi`, `id_sertifikasi`, `id_indikator_sertifikasi`, `isi_bukti`) VALUES
(1, 1, 1, 'Surat_Rekomendasi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_kk` int(11) DEFAULT NULL,
  `notif_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama`, `username`, `password`, `no_telp`, `email`, `foto`, `status`, `id_kk`, `notif_token`) VALUES
(1, '07840011', 'Dedy Rahman Wijaya', 'drw', '01d782c25cd0e1d3e45ba6abbf395024', '082240664693', 'dedyrw@tass.telkomuniversity.ac.id', 'profil4.png', 'Aktif', 4, ''),
(2, '14790020', 'Hanung Nindito Prasetyo', 'hnp', '01d782c25cd0e1d3e45ba6abbf395024', '082240614592', 'hanungnp@tass.telkomuniversity.ac.id', 'profil2.jpg', 'Aktif', 4, ''),
(3, '14740031', 'Wawa Wikusna', 'wiu', '01d782c25cd0e1d3e45ba6abbf395024', '081325315711', 'wawa_wikusna@tass.telkomuniversity.ac.id', 'profil9.jpg', 'Aktif', 4, ''),
(4, '09770043', 'Agus Pratondo', 'aup', '01d782c25cd0e1d3e45ba6abbf395024', '081123678334', 'agus@tass.telkomuniversity.ac.id', 'profil12.jpg', 'Aktif', 4, ''),
(5, '14870095', 'Bayu Rima Aditya', 'byu', '01d782c25cd0e1d3e45ba6abbf395024', '081134521887', 'bayu@tass.telkomuniversity.ac.id', 'profil111.jpg', 'Aktif', 4, ''),
(6, '10810024', 'Eka Widhi Yunarso', 'ewd', '01d782c25cd0e1d3e45ba6abbf395024', '08122378513', ' ekawidhi@tass.telkomuniversity.ac.id', 'profil13.jpg', 'Aktif', 4, ''),
(7, '14750035', 'Elis Hernawati', 'elt', '01d782c25cd0e1d3e45ba6abbf395024', '082240035983', 'elishernawati@tass.telkomuniversity.ac.id', 'profil10.jpg', 'Aktif', 4, ''),
(17, '15640027', 'Ely Rosely', 'elr', '01d782c25cd0e1d3e45ba6abbf395024', '08156157171', 'ely.rosely@tass.telkomuniversity.ac.id', 'profil3.png', 'Aktif', 4, ''),
(18, '14860006', 'Ferra Arik Tridalestari', 'fra', '01d782c25cd0e1d3e45ba6abbf395024', '08220599884', 'ferraarik@tass.telkomuniversity.ac.id', 'profil5.jpg', 'Aktif', 4, ''),
(19, '08810079', 'Guntur Prabawa Kusuma', 'gtr', '01d782c25cd0e1d3e45ba6abbf395024', '08122859700', 'guntur@tass.telkomuniversity.ac.id', 'profil7.jpg', 'Aktif', 4, ''),
(20, '12730018', 'Inne Gartina Husein', 'ine', '01d782c25cd0e1d3e45ba6abbf395024', '08117891889', 'inne@tass.telkomuniversity.ac.id', 'profil14.jpg', 'Aktif', 4, ''),
(21, '12700043', 'RA. Paramita Mayadewi', 'prm', '01d782c25cd0e1d3e45ba6abbf395024', '081321659546', 'paramita@tass.telkomuniversity.ac.id', 'profil8.jpg', 'Aktif', 4, ''),
(22, '07810044', 'Siska Komala Sari', 'sks', '01d782c25cd0e1d3e45ba6abbf395024', '081320198038', 'siska@tass.telkomuniversity.ac.id', 'profil6.jpg', 'Aktif', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_blog`
--

CREATE TABLE `indikator_blog` (
  `id_indikator_blog` int(11) NOT NULL,
  `nama_indikator` varchar(35) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_blog`
--

INSERT INTO `indikator_blog` (`id_indikator_blog`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(2, 'Jumlah Postingan', 'text', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_bukuajar`
--

CREATE TABLE `indikator_bukuajar` (
  `id_indikator_bukuajar` int(11) NOT NULL,
  `nama_indikator` varchar(35) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_bukuajar`
--

INSERT INTO `indikator_bukuajar` (`id_indikator_bukuajar`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(1, 'Draft Buku Ajar', 'file', 'Triwulan1', 1),
(2, 'Submit Penerbit', 'file', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_haki`
--

CREATE TABLE `indikator_haki` (
  `id_indikator_haki` int(11) NOT NULL,
  `nama_indikator` varchar(35) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_haki`
--

INSERT INTO `indikator_haki` (`id_indikator_haki`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(1, 'Submit Pendaftaran', 'file', 'Triwulan1', 1),
(2, 'Sertifikat HAKI', 'file', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_penelitian`
--

CREATE TABLE `indikator_penelitian` (
  `id_indikator_penelitian` int(11) NOT NULL,
  `nama_indikator` varchar(35) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_penelitian`
--

INSERT INTO `indikator_penelitian` (`id_indikator_penelitian`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(1, 'Submit Proposal', 'file', 'Triwulan1', 1),
(2, 'Monev 1', 'file', 'Triwulan1', 1),
(4, 'Bukti Publikasi', 'file', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_pengmas`
--

CREATE TABLE `indikator_pengmas` (
  `id_indikator_pengmas` int(11) NOT NULL,
  `nama_indikator` varchar(35) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_pengmas`
--

INSERT INTO `indikator_pengmas` (`id_indikator_pengmas`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(1, 'Submit Proposal', 'file', 'Triwulan1', 1),
(2, 'Laporan Akhir', 'file', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_publikasi`
--

CREATE TABLE `indikator_publikasi` (
  `id_indikator_publikasi` int(11) NOT NULL,
  `nama_indikator` varchar(30) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_publikasi`
--

INSERT INTO `indikator_publikasi` (`id_indikator_publikasi`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(2, 'Draft Paper', 'file', 'Triwulan1', 1),
(4, 'Final Paper', 'file', 'Triwulan1', 1),
(5, 'Bukti Submit Paper', 'file', 'Triwulan1', 1),
(6, 'Acceptance Paper', 'file', 'Triwulan1', 1),
(7, 'Bukti Publikasi', 'file', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_sertifikasi`
--

CREATE TABLE `indikator_sertifikasi` (
  `id_indikator_sertifikasi` int(11) NOT NULL,
  `nama_indikator` varchar(35) NOT NULL,
  `komponen_input` text NOT NULL,
  `periode` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_sertifikasi`
--

INSERT INTO `indikator_sertifikasi` (`id_indikator_sertifikasi`, `nama_indikator`, `komponen_input`, `periode`, `status`) VALUES
(1, 'Sertifikat Kompetensi', 'file', 'Triwulan1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `judul` text NOT NULL,
  `link` text NOT NULL,
  `poster` varchar(999) NOT NULL,
  `id_pengelola` int(11) DEFAULT NULL,
  `id_receiver` int(11) NOT NULL,
  `viewed` tinyint(1) NOT NULL,
  `isDosen` tinyint(1) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `isBroadcast` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `jenis`, `judul`, `link`, `poster`, `id_pengelola`, `id_receiver`, `viewed`, `isDosen`, `id_item`, `id_sender`, `isBroadcast`) VALUES
(1, 'Seminar', 'Seminar Nasional', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-3.jpg', 2, 0, 0, 0, 0, 0, 0),
(2, 'Kegiatan', 'Publikasi Ilmiah', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-4.jpg', 2, 0, 0, 0, 0, 0, 0),
(3, 'Seminar', 'Seminar Teknologi dan Informasi', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-5.jpg', 2, 0, 0, 0, 0, 0, 0),
(9, 'Seminar', 'GTAR 2015, Strengthening Indonesia Competitiveness in the Globalization Era 3.0', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-6.jpg', 2, 0, 0, 0, 0, 0, 0),
(11, 'Seminar', 'Seminar Nasional Multi Disiplin Ilmu VIII', 'http://www.budiluhur.ac.id/seminar-nasional-multidisiplin-ilmu-senmi-2017/', 'seminar-7.jpg', 2, 0, 0, 0, 0, 0, 0),
(38, 'Seminar', 'IMBC 2017', 'http://lppm.bsi.ac.id/?asset=seminar', 'IMG-20170110-WA0000.jpg', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelompokkeahlian`
--

CREATE TABLE `kelompokkeahlian` (
  `id_kk` int(11) NOT NULL,
  `namaKK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelompokkeahlian`
--

INSERT INTO `kelompokkeahlian` (`id_kk`, `namaKK`) VALUES
(1, 'Wakil Dekan II'),
(2, 'IO and Maintenance of Telecommunication'),
(3, 'Interactive System'),
(4, 'IT Gov and Enterprise System'),
(5, 'Sistem Informasi Akuntasi'),
(6, 'Programming and Interactive Multimedia '),
(7, 'Commerce Management'),
(8, 'Embedded and Network System');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `keterangan` text,
  `status` int(11) DEFAULT NULL,
  `url` text,
  `judul` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notif`, `hak_akses`, `keterangan`, `status`, `url`, `judul`) VALUES
(2, 1, 'Ditolak karena cek lagi', 0, 'http://localhost/imon/c_pencapaian/detailPencapaian?menu=pencapaian', 'Integrated and Efficient Attendance Management System Based On Radio Frequency Identification (RFID)'),
(4, 1, 'Ditolak karena cek inputan lagi', 0, 'http://localhost/imon/c_perencanaan/tampilPerencanaan?menu=perencanaan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `id_pengelola` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `level` int(5) NOT NULL,
  `id_kk` int(11) DEFAULT NULL,
  `notif_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id_pengelola`, `nip`, `nama`, `username`, `password`, `no_telp`, `email`, `foto`, `status`, `level`, `id_kk`, `notif_token`) VALUES
(1, '3554654656', 'Wakil Dekan', 'wadekfit', '01d782c25cd0e1d3e45ba6abbf395024', '086434355465', 'wadekfit@gmail.com', 'profil15.jpg', 'Aktif', 1, 1, ''),
(2, '11810053', 'Heru Nugroho', 'kkitgov', '01d782c25cd0e1d3e45ba6abbf395024', '081394322043', 'heru@tass.telkomuniversity.ac.id', 'profil11.jpg', 'Aktif', 2, 4, ''),
(3, '14761395-2', 'Giva Andriana Mutiara', 'gva', '01d782c25cd0e1d3e45ba6abbf395024', '08122025687', 'giva.andriana@tass.telkomuniversity.ac.id', 'profil10.jpg', 'Aktif', 2, 8, ''),
(4, '11810053', 'Rahmat Hidayat', 'rhm', '01d782c25cd0e1d3e45ba6abbf395024', '082240664693', 'rahmathidayat@gmail.com', '', 'Aktif', 2, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id_perencanaan` int(11) NOT NULL,
  `rpenelitian` int(11) NOT NULL,
  `rpublikasi` int(11) NOT NULL,
  `rpengmas` int(11) NOT NULL,
  `rhaki` int(11) NOT NULL,
  `rbukuajar` int(11) NOT NULL,
  `rsertifikasi` int(11) NOT NULL,
  `rpostingan` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perencanaan`
--

INSERT INTO `perencanaan` (`id_perencanaan`, `rpenelitian`, `rpublikasi`, `rpengmas`, `rhaki`, `rbukuajar`, `rsertifikasi`, `rpostingan`, `periode`, `tahun`, `status`, `id_dosen`) VALUES
(3, 3, 2, 2, 0, 0, 0, 2, 'Triwulan1', 2016, 'Disetujui', 1),
(6, 1, 1, 0, 0, 1, 0, 1, 'Triwulan2', 2016, 'Disetujui', 1),
(10, 2, 1, 0, 1, 0, 0, 1, 'Triwulan3', 2016, 'Menunggu', 1),
(12, 1, 2, 3, 1, 0, 0, 0, 'Triwulan4', 2016, 'Ditolak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_blog`
--

CREATE TABLE `pk_blog` (
  `id_pencapaian` int(11) NOT NULL,
  `tgl_posting` date NOT NULL,
  `judul` text NOT NULL,
  `link` text NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk_blog`
--

INSERT INTO `pk_blog` (`id_pencapaian`, `tgl_posting`, `judul`, `link`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(1, '2017-06-09', 'Teknologi dan Penerapannya', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-the-globalization', 'Triwulan1', '2017-06-09', '2017-06-16', 2017, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_bukuajar`
--

CREATE TABLE `pk_bukuajar` (
  `id_pencapaian` int(11) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `status_bukuajar` varchar(30) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk_bukuajar`
--

INSERT INTO `pk_bukuajar` (`id_pencapaian`, `nama_penulis`, `judul`, `nama_penerbit`, `status_bukuajar`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(1, 'Dedy Rahman Wijaya', 'Modul Pemrograman Web', 'Informatika', 'Release', 'Triwulan1', '2017-06-09', '2017-06-30', 2017, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_haki`
--

CREATE TABLE `pk_haki` (
  `id_pencapaian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `status_haki` varchar(30) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk_haki`
--

INSERT INTO `pk_haki` (`id_pencapaian`, `nama`, `judul`, `tanggal`, `status_haki`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(7, 'Dedy Rahman Wijaya', 'Aplikasi Proyek Akhir', '2017-06-09', 'Diterima', 'Triwulan1', '2017-06-09', '2017-06-23', 2017, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_penelitian`
--

CREATE TABLE `pk_penelitian` (
  `id_pencapaian` int(11) NOT NULL,
  `ketua` varchar(30) NOT NULL,
  `judul` text NOT NULL,
  `anggota` text NOT NULL,
  `jumlah_dana` varchar(25) NOT NULL,
  `jenis_penelitian` varchar(35) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_penelitian`
--

INSERT INTO `pk_penelitian` (`id_pencapaian`, `ketua`, `judul`, `anggota`, `jumlah_dana`, `jenis_penelitian`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(1, 'Riyanarto Sarno', 'Pengaruh Internet Terhadap Pendidikan di Indonesia', '3', '2000000', 'PDI', 'Triwulan1', '2017-05-18', '2017-05-31', 0, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_pengmas`
--

CREATE TABLE `pk_pengmas` (
  `id_pencapaian` int(11) NOT NULL,
  `judul` text NOT NULL,
  `anggota` text NOT NULL,
  `jumlah_dana` varchar(25) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_pengmas`
--

INSERT INTO `pk_pengmas` (`id_pencapaian`, `judul`, `anggota`, `jumlah_dana`, `ketua`, `tanggal`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(1, 'Pemanfaatan Limbah untuk Menghasilkan Produk yang Berkualitas demi Meningkatan Lapangan Kerja', 'Enny Zulaika, Dedy Rahman Wijaya', 'Rp 3000000', 'Riyanarto Sarn', '2009-09-03', 'Triwulan1', '0000-00-00', '0000-00-00', 2017, 'Menunggu', 1),
(3, 'Telkom University Mengajar', 'Enny Zulaika, Dedy Rahman Wijaya', 'Rp 2000000', 'Riyanarto Sarn', '2017-06-09', 'Triwulan1', '2017-06-08', '2017-06-24', 2017, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_publikasi`
--

CREATE TABLE `pk_publikasi` (
  `id_pencapaian` int(11) NOT NULL,
  `jenis_publikasi` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `tempat_terbit` varchar(90) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_terbit` date NOT NULL,
  `link` text NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_publikasi`
--

INSERT INTO `pk_publikasi` (`id_pencapaian`, `jenis_publikasi`, `judul`, `tempat_terbit`, `keterangan`, `tgl_terbit`, `link`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(5, 'Jurnal Internasional', 'Sensor Array Optmazion for Mobile Electronic Nose : Wavelet Transform and Filter Base Feature Selction Approach', 'Bandung', 'Vol. 1', '0000-00-00', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-the-globalization', 'Triwulan1', '2017-05-23', '2017-05-31', 2017, 'Disetujui', 1),
(6, 'Jurnal Internasional', 'INTEGRATED AND EFFICIENT ATTENDANCE MANAGEMENT SYSTEM BASED ON RADIO FREQUENCY IDENTIFICATION (RFID)', 'Bandung', 'Vol.1', '0000-00-00', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-the-globalization', 'Triwulan1', '2017-06-13', '2017-06-30', 2017, 'Ditolak', 1),
(7, 'Jurnal Internasional', 'Information Quality Ratio as a novel metric for mother wavelet selection', 'Bandung', 'Publikasi Ilmiah', '2017-03-05', 'http://itges.rg.telkomuniversity.ac.id/?page_id=3140', 'Triwulan1', '2017-01-11', '2017-06-21', 2017, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_sertifikasi`
--

CREATE TABLE `pk_sertifikasi` (
  `id_pencapaian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_sertifikat` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk_sertifikasi`
--

INSERT INTO `pk_sertifikasi` (`id_pencapaian`, `nama`, `no_sertifikat`, `tanggal`, `periode`, `tgl_awal`, `tgl_akhir`, `tahun`, `status`, `id_dosen`) VALUES
(1, 'Sertifikasi IC3', '887HF82JKY', '0000-00-00', 'Triwulan1', '2017-05-18', '2017-05-30', 0, 'Disetujui', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roadmap`
--

CREATE TABLE `roadmap` (
  `id_roadmap` int(11) NOT NULL,
  `penelitian_unggulan` varchar(999) NOT NULL,
  `bidang_penelitian` varchar(999) NOT NULL,
  `produk` varchar(300) NOT NULL,
  `alat` varchar(50) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `kegiatan` varchar(500) NOT NULL,
  `sub_bidang` varchar(500) NOT NULL,
  `luaran` varchar(500) NOT NULL,
  `target_hibah` varchar(500) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roadmap`
--

INSERT INTO `roadmap` (`id_roadmap`, `penelitian_unggulan`, `bidang_penelitian`, `produk`, `alat`, `tahun`, `kegiatan`, `sub_bidang`, `luaran`, `target_hibah`, `judul`, `id_dosen`) VALUES
(11, 'National Standards of Information Security Competency ', 'IT Resource Management System', 'Framework, Curricula, Certifications, Research Studies', 'NICE, ISACA, AIS, Delphi Study, PLS Method', '', '', '', '', '', '', 1),
(16, 'National Standards of Information Security Competency ', 'IT Resource Management', 'Framework, Curricula, Certifications, Research Studies', ' Framework, Curricula, Certifications, Research St', '2017', 'The key competences identified in the existing literature for information security', 'IT Resources Competence', 'Journal indexed in Scopus', 'Penelitian Hibah bersaing', 'The set cybersecurity competences are of current and future importance for mobile application developers', 1),
(19, 'National Standards of Information Security Competency ', 'IT Resource Management', 'Framework, Curricula, Certifications, Research Studies', ' Framework, Curricula, Certifications, Research St', '2016', 'The key competences identified in the existing literature for information security', 'IT Resources Competence', 'Journal indexed in Scopus', 'Penelitian Dana Internal', 'The initial classification for competence areas in the Information Security domain', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_blog`
--
ALTER TABLE `bukti_blog`
  ADD PRIMARY KEY (`id_bukti_blog`),
  ADD KEY `id_blog` (`id_blog`),
  ADD KEY `id_indikator_blog` (`id_indikator_blog`);

--
-- Indexes for table `bukti_bukuajar`
--
ALTER TABLE `bukti_bukuajar`
  ADD PRIMARY KEY (`id_bukti_bukuajar`),
  ADD KEY `id_bukuajar` (`id_bukuajar`),
  ADD KEY `id_indikator_bukuajar` (`id_indikator_bukuajar`);

--
-- Indexes for table `bukti_haki`
--
ALTER TABLE `bukti_haki`
  ADD PRIMARY KEY (`id_bukti_haki`),
  ADD KEY `id_haki` (`id_haki`),
  ADD KEY `id_indikator_haki` (`id_indikator_haki`);

--
-- Indexes for table `bukti_penelitian`
--
ALTER TABLE `bukti_penelitian`
  ADD PRIMARY KEY (`id_bukti_penelitian`),
  ADD KEY `id_penelitian` (`id_penelitian`),
  ADD KEY `id_indikator_penelitian` (`id_indikator_penelitian`);

--
-- Indexes for table `bukti_pengmas`
--
ALTER TABLE `bukti_pengmas`
  ADD PRIMARY KEY (`id_bukti_pengmas`),
  ADD KEY `id_pengmas` (`id_pengmas`),
  ADD KEY `id_indikator_pengmas` (`id_indikator_pengmas`);

--
-- Indexes for table `bukti_publikasi`
--
ALTER TABLE `bukti_publikasi`
  ADD PRIMARY KEY (`id_bukti_publikasi`),
  ADD KEY `id_publikasi` (`id_publikasi`),
  ADD KEY `id_indikator_publikasi` (`id_indikator_publikasi`);

--
-- Indexes for table `bukti_sertifikasi`
--
ALTER TABLE `bukti_sertifikasi`
  ADD PRIMARY KEY (`id_bukti_sertifikasi`),
  ADD KEY `id_sertifikasi` (`id_sertifikasi`),
  ADD KEY `id_indikator_sertifikasi` (`id_indikator_sertifikasi`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_kk` (`id_kk`) USING BTREE;

--
-- Indexes for table `indikator_blog`
--
ALTER TABLE `indikator_blog`
  ADD PRIMARY KEY (`id_indikator_blog`);

--
-- Indexes for table `indikator_bukuajar`
--
ALTER TABLE `indikator_bukuajar`
  ADD PRIMARY KEY (`id_indikator_bukuajar`);

--
-- Indexes for table `indikator_haki`
--
ALTER TABLE `indikator_haki`
  ADD PRIMARY KEY (`id_indikator_haki`);

--
-- Indexes for table `indikator_penelitian`
--
ALTER TABLE `indikator_penelitian`
  ADD PRIMARY KEY (`id_indikator_penelitian`);

--
-- Indexes for table `indikator_pengmas`
--
ALTER TABLE `indikator_pengmas`
  ADD PRIMARY KEY (`id_indikator_pengmas`);

--
-- Indexes for table `indikator_publikasi`
--
ALTER TABLE `indikator_publikasi`
  ADD PRIMARY KEY (`id_indikator_publikasi`);

--
-- Indexes for table `indikator_sertifikasi`
--
ALTER TABLE `indikator_sertifikasi`
  ADD PRIMARY KEY (`id_indikator_sertifikasi`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- Indexes for table `kelompokkeahlian`
--
ALTER TABLE `kelompokkeahlian`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id_pengelola`),
  ADD UNIQUE KEY `id_kk` (`id_kk`);

--
-- Indexes for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id_perencanaan`),
  ADD KEY `id_dosen` (`id_dosen`) USING BTREE;

--
-- Indexes for table `pk_blog`
--
ALTER TABLE `pk_blog`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pk_bukuajar`
--
ALTER TABLE `pk_bukuajar`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pk_haki`
--
ALTER TABLE `pk_haki`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pk_penelitian`
--
ALTER TABLE `pk_penelitian`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pk_pengmas`
--
ALTER TABLE `pk_pengmas`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pk_publikasi`
--
ALTER TABLE `pk_publikasi`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `pk_sertifikasi`
--
ALTER TABLE `pk_sertifikasi`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `roadmap`
--
ALTER TABLE `roadmap`
  ADD PRIMARY KEY (`id_roadmap`),
  ADD KEY `id_dosen` (`id_dosen`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_blog`
--
ALTER TABLE `bukti_blog`
  MODIFY `id_bukti_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bukti_bukuajar`
--
ALTER TABLE `bukti_bukuajar`
  MODIFY `id_bukti_bukuajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bukti_haki`
--
ALTER TABLE `bukti_haki`
  MODIFY `id_bukti_haki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bukti_penelitian`
--
ALTER TABLE `bukti_penelitian`
  MODIFY `id_bukti_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bukti_pengmas`
--
ALTER TABLE `bukti_pengmas`
  MODIFY `id_bukti_pengmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bukti_publikasi`
--
ALTER TABLE `bukti_publikasi`
  MODIFY `id_bukti_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `bukti_sertifikasi`
--
ALTER TABLE `bukti_sertifikasi`
  MODIFY `id_bukti_sertifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `indikator_blog`
--
ALTER TABLE `indikator_blog`
  MODIFY `id_indikator_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indikator_bukuajar`
--
ALTER TABLE `indikator_bukuajar`
  MODIFY `id_indikator_bukuajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indikator_haki`
--
ALTER TABLE `indikator_haki`
  MODIFY `id_indikator_haki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indikator_penelitian`
--
ALTER TABLE `indikator_penelitian`
  MODIFY `id_indikator_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `indikator_pengmas`
--
ALTER TABLE `indikator_pengmas`
  MODIFY `id_indikator_pengmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indikator_publikasi`
--
ALTER TABLE `indikator_publikasi`
  MODIFY `id_indikator_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `indikator_sertifikasi`
--
ALTER TABLE `indikator_sertifikasi`
  MODIFY `id_indikator_sertifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kelompokkeahlian`
--
ALTER TABLE `kelompokkeahlian`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id_perencanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pk_blog`
--
ALTER TABLE `pk_blog`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pk_bukuajar`
--
ALTER TABLE `pk_bukuajar`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pk_haki`
--
ALTER TABLE `pk_haki`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pk_penelitian`
--
ALTER TABLE `pk_penelitian`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pk_pengmas`
--
ALTER TABLE `pk_pengmas`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pk_publikasi`
--
ALTER TABLE `pk_publikasi`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pk_sertifikasi`
--
ALTER TABLE `pk_sertifikasi`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roadmap`
--
ALTER TABLE `roadmap`
  MODIFY `id_roadmap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukti_blog`
--
ALTER TABLE `bukti_blog`
  ADD CONSTRAINT `fk_bblog` FOREIGN KEY (`id_blog`) REFERENCES `pk_blog` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bindikator` FOREIGN KEY (`id_indikator_blog`) REFERENCES `indikator_blog` (`id_indikator_blog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_bukuajar`
--
ALTER TABLE `bukti_bukuajar`
  ADD CONSTRAINT `fk_baindikator` FOREIGN KEY (`id_indikator_bukuajar`) REFERENCES `indikator_bukuajar` (`id_indikator_bukuajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bbukuajar` FOREIGN KEY (`id_bukuajar`) REFERENCES `pk_bukuajar` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_haki`
--
ALTER TABLE `bukti_haki`
  ADD CONSTRAINT `fk_bhaki` FOREIGN KEY (`id_haki`) REFERENCES `pk_haki` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hindikator` FOREIGN KEY (`id_indikator_haki`) REFERENCES `indikator_haki` (`id_indikator_haki`);

--
-- Constraints for table `bukti_penelitian`
--
ALTER TABLE `bukti_penelitian`
  ADD CONSTRAINT `fk_bipenelitian` FOREIGN KEY (`id_indikator_penelitian`) REFERENCES `indikator_penelitian` (`id_indikator_penelitian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bpenelitian` FOREIGN KEY (`id_penelitian`) REFERENCES `pk_penelitian` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_pengmas`
--
ALTER TABLE `bukti_pengmas`
  ADD CONSTRAINT `fk_bpengmas` FOREIGN KEY (`id_pengmas`) REFERENCES `pk_pengmas` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pindikator2` FOREIGN KEY (`id_indikator_pengmas`) REFERENCES `indikator_pengmas` (`id_indikator_pengmas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_publikasi`
--
ALTER TABLE `bukti_publikasi`
  ADD CONSTRAINT `fk_bpublikasi` FOREIGN KEY (`id_publikasi`) REFERENCES `pk_publikasi` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pindikator3` FOREIGN KEY (`id_indikator_publikasi`) REFERENCES `indikator_publikasi` (`id_indikator_publikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_sertifikasi`
--
ALTER TABLE `bukti_sertifikasi`
  ADD CONSTRAINT `fk_bsertifikasi` FOREIGN KEY (`id_sertifikasi`) REFERENCES `pk_sertifikasi` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sindikator` FOREIGN KEY (`id_indikator_sertifikasi`) REFERENCES `indikator_sertifikasi` (`id_indikator_sertifikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_kk` FOREIGN KEY (`id_kk`) REFERENCES `kelompokkeahlian` (`id_kk`);

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `fk_pengelola` FOREIGN KEY (`id_pengelola`) REFERENCES `pengelola` (`id_pengelola`);

--
-- Constraints for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD CONSTRAINT `fk_idkk` FOREIGN KEY (`id_kk`) REFERENCES `kelompokkeahlian` (`id_kk`);

--
-- Constraints for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD CONSTRAINT `fk_idDosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_blog`
--
ALTER TABLE `pk_blog`
  ADD CONSTRAINT `fk_dblog` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_bukuajar`
--
ALTER TABLE `pk_bukuajar`
  ADD CONSTRAINT `fk_dbukuajar` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_haki`
--
ALTER TABLE `pk_haki`
  ADD CONSTRAINT `fk_dhaki` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_penelitian`
--
ALTER TABLE `pk_penelitian`
  ADD CONSTRAINT `fk_dpenelitian` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_pengmas`
--
ALTER TABLE `pk_pengmas`
  ADD CONSTRAINT `fk_dpengmas` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_publikasi`
--
ALTER TABLE `pk_publikasi`
  ADD CONSTRAINT `fk_dpublikasi` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `pk_sertifikasi`
--
ALTER TABLE `pk_sertifikasi`
  ADD CONSTRAINT `fk_dsertifikasi` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `roadmap`
--
ALTER TABLE `roadmap`
  ADD CONSTRAINT `fk_rmdosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
