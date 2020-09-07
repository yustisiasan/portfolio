-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 06:57 AM
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
(1, 1, 1, 'test');

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
(1, 1, 1, ''),
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
(1, 2, 2, 'Panduan_Ujian_IC3_FIT.pdf'),
(2, 2, 4, ''),
(3, 3, 2, 'Panduan Ujian IC3 FIT.pdf'),
(4, 3, 4, 'Panduan Ujian IC3 FIT.pdf'),
(5, 4, 2, 'Panduan_Ujian_IC3_FIT6.pdf'),
(6, 4, 4, 'Panduan_Ujian_IC3_FIT7.pdf');

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
  `id_kk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama`, `username`, `password`, `no_telp`, `email`, `foto`, `status`, `id_kk`) VALUES
(1, '9866543445', 'Shinichi Kudo', 'kudo', '5500f8a543609946bedf4307b4be8422', '082240664693', 'kudo@gmail.com', 'conan.jpg', 'Aktif', 4),
(2, '3866543445', 'Conan Edogawa', 'edogawa31', 'bab6eed0f7cd8bd721e728003b63b54d', '096', 'jaajaja', 'assets/images/164767_8fdad96c-5b6d-11e4-bb16-b7fa4908a8c2.jpg', 'Aktif', 2),
(3, '3846543445', 'FERA ARIK', 'FRA', 'FRA', '396', 'jaajaSa', '', 'Aktif', 3),
(4, '3866543445', 'BAYU RIMA', 'BYU', 'BYU', '096', 'jaajaja', '', 'Aktif', 3),
(5, '3866543445', 'SISKA KOMALASARI', 'SKS', 'SKS', '096', 'jaajaja', '', 'Aktif', 4),
(6, '3866543445', 'REZA BUDIAWAN', 'RBD', 'fae291bfd0b7c9b6425841579cefc879', '096', 'jaajaja', '', 'Aktif', 4),
(7, '3866543445', 'HANUNG NINDITO', 'HNP', 'HNP', '096', 'jaajaja', '', 'Aktif', 3),
(17, '6583481734', 'Yustisia Susandi', 'yustisiasan', '5500f8a543609946bedf4307b4be8422', '082240664693', 'yustisiasan@gmail.com', '', 'Aktif', NULL),
(18, '9876534567', 'Annisa Ghani', 'aganpou', '01d782c25cd0e1d3e45ba6abbf395024', '082240664693', 'annisa.ghani.permana@gmail.com', '', 'Tidak Aktif', NULL);

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
(2, 'Acceptance Letter', 'text', 'Triwulan 1', 0);

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
(1, 'Indikator 1', 'text', 'Triwulan 1', 0);

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
(1, 'Indikator 1', 'text', 'Triwulan 1', 1),
(2, 'Test Indikator', 'file', 'Triwulan 1', 1),
(4, 'Abstrak', 'text', 'Triwulan 1', 0);

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
(1, 'Acceptance Letter', 'file', 'Triwulan 1', 1),
(2, 'Abstrak', 'text', 'Triwulan 1', 1);

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
(1, 'Acceptance Letter', 'file', 'Triwulan 1', 0);

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
(2, 'Acceptance Letter', 'file', 'Triwulan 1', 1),
(4, 'Submitted', 'file', 'Triwulan 1', 1),
(5, 'Bukti Publikasi', 'text', 'Triwulan 1', 1);

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
(1, 'Test Sertifikasi', 'file', 'Triwulan 1', 1),
(2, 'Acceptance Letter', 'text', 'Triwulan 1', 0);

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
  `id_pengelola` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `jenis`, `judul`, `link`, `poster`, `id_pengelola`) VALUES
(1, 'Seminar', 'Seminar Nasional', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-3.jpg', 2),
(2, 'Kegiatan', 'Publikasi Ilmiah', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-4.jpg', 2),
(3, 'Seminar', 'Seminar Teknologi dan Informasi', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-5.jpg', 2),
(9, 'Seminar', 'GTAR 2015, Strengthening Indonesia Competitiveness in the Globalization Era 3.0', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'seminar-6.jpg', 2),
(11, 'Seminar', 'Seminar Nasional Multi Disiplin Ilmu VIII', 'http://www.budiluhur.ac.id/seminar-nasional-multidisiplin-ilmu-senmi-2017/', 'seminar-7.jpg', 2),
(38, 'Seminar', 'IMBC 2017', 'http://lppm.bsi.ac.id/?asset=seminar', 'IMG-20170110-WA0000.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelompokkeahlian`
--

CREATE TABLE `kelompokkeahlian` (
  `id_kk` int(11) NOT NULL,
  `namaKK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelompokkeahlian`
--

INSERT INTO `kelompokkeahlian` (`id_kk`, `namaKK`) VALUES
(1, 'Wakil Dekan II'),
(2, 'Installation, Operation and Maintenance of Telecom'),
(3, 'Interactive System'),
(4, 'IT Gov and Enterprise System'),
(5, 'Sistem Informasi Akuntasi'),
(6, 'Programming and Interactive Multimedia '),
(7, 'Commerce Management'),
(8, 'Embedded and Network System');

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
  `id_kk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id_pengelola`, `nip`, `nama`, `username`, `password`, `no_telp`, `email`, `foto`, `status`, `level`, `id_kk`) VALUES
(1, '3554654656', 'Wakil Dekan II', 'wadekfit', '01d782c25cd0e1d3e45ba6abbf395024', '086434355465', 'wadekfit@gmail.com', 'assets/images/img.jpg', 'Aktif', 1, 1),
(2, '2364635735', 'Ran Mouri', 'ran', '0420d605d97eb746182ce4101970b03a', '08978011931', 'ran@gmail.com', 'ranmouri.jpg', 'Aktif', 2, 2);

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
(3, 3, 2, 2, 0, 0, 0, 0, 'Triwulan 1', 2016, 'Disetujui', 1),
(6, 1, 1, 0, 0, 1, 0, 1, 'Triwulan 2', 2016, 'Disetujui', 1),
(7, 0, 1, 1, 3, 2, 1, 1, 'Triwulan 1', 2017, 'Disetujui', 1),
(8, 1, 2, 1, 0, 0, 1, 1, 'Triwulan 2', 2017, 'Disetujui', 1),
(9, 1, 1, 1, 0, 1, 0, 0, 'Triwulan 4', 2018, 'Menunggu', 1),
(10, 2, 1, 0, 1, 0, 0, 1, 'Triwulan 3', 2016, 'Disetujui', 1),
(11, 1, 2, 3, 0, 1, 1, 0, 'Triwulan 3', 2017, 'Menunggu', 1),
(12, 1, 2, 3, 1, 0, 0, 0, 'Triwulan 4', 2016, 'Disetujui', 1),
(13, 2, 1, 1, 0, 0, 0, 0, 'Triwulan 4', 2017, 'Menunggu', 1);

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
  `status_no_indikator` int(11) NOT NULL DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status_no_indikator` int(11) DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `bukti` varchar(500) NOT NULL,
  `sertifikat` varchar(500) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` int(11) NOT NULL,
  `status_no_indikator` int(11) NOT NULL DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk_haki`
--

INSERT INTO `pk_haki` (`id_pencapaian`, `nama`, `judul`, `tanggal`, `status_haki`, `bukti`, `sertifikat`, `periode`, `tgl_awal`, `tgl_akhir`, `status_no_indikator`, `status`, `id_dosen`) VALUES
(1, '', 'GTAR 2015, Strengthening Indonesia Competitiveness in the Globalization Era 3.0', '2017-05-18', 'Diterima', '201-581-1-SM.pdf', '', 'Triwulan 1', '2017-05-14', 2017, 0, 'Menunggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pk_penelitian`
--

CREATE TABLE `pk_penelitian` (
  `id_pencapaian` int(11) NOT NULL,
  `bukti` varchar(90) NOT NULL,
  `ketua` varchar(30) NOT NULL,
  `judul` text NOT NULL,
  `anggota` text NOT NULL,
  `jumlah_dana` varchar(25) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `jenis_penelitian` varchar(35) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status_no_indikator` int(11) NOT NULL DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_penelitian`
--

INSERT INTO `pk_penelitian` (`id_pencapaian`, `bukti`, `ketua`, `judul`, `anggota`, `jumlah_dana`, `periode`, `jenis_penelitian`, `tgl_awal`, `tgl_akhir`, `status_no_indikator`, `status`, `id_dosen`) VALUES
(1, '2_-PEDOMAN-BEASISWA-BBP-PPA-2015.docx', 'Shinichi Kudo', 'Pengaruh Internet Terhadap Pendidikan di Indonesia', '3', '0', 'Triwulan 1', 'Dana Mandiri', '2017-05-18', '2017-05-31', 0, 'Menunggu', 1);

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
  `proposal` varchar(999) NOT NULL,
  `tanggal` date NOT NULL,
  `periode` varchar(30) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status_no_indikator` int(11) NOT NULL DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_pengmas`
--

INSERT INTO `pk_pengmas` (`id_pencapaian`, `judul`, `anggota`, `jumlah_dana`, `ketua`, `proposal`, `tanggal`, `periode`, `tgl_awal`, `tgl_akhir`, `status_no_indikator`, `status`, `id_dosen`) VALUES
(1, 'apapun', '-yana\r\n-yuna', '564', 'mugn', 'yr', '2009-09-03', '', '0000-00-00', '0000-00-00', 0, '', NULL);

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
  `status_no_indikator` int(11) NOT NULL DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pk_publikasi`
--

INSERT INTO `pk_publikasi` (`id_pencapaian`, `jenis_publikasi`, `judul`, `tempat_terbit`, `keterangan`, `tgl_terbit`, `link`, `periode`, `tgl_awal`, `tgl_akhir`, `status_no_indikator`, `status`, `id_dosen`) VALUES
(1, 'PDI', 'Pengaruh Gadget', 'Bandung', 'Apa aja deh', '2017-03-14', 'cobacoba.com', '', '0000-00-00', '0000-00-00', 0, '', NULL),
(2, 'test', 'test', 'test', 'test', '2017-05-17', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-thhttp://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-th', 'Triwulan 1', '2017-05-16', '2017-05-17', 0, 'Menunggu', 1),
(3, 'jenis', 'judul', 'tempat', 'ket', '2017-05-16', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-the-globalization', 'Triwulan 1', '2017-05-16', '2017-05-31', 0, 'Menunggu', 1),
(4, 'jenis', 'Pengaruh Gadget terhadap Prestasi Mahasiswa', 'test', 'test', '2017-05-17', 'http://telkomuniversity.ac.id/news/gtar-2015-strengthening-indonesia-competitiveness-in-the-globalization', 'Triwulan 1', '2017-05-16', '2017-05-24', 0, 'Menunggu', 1);

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
  `status_no_indikator` int(11) NOT NULL DEFAULT '0',
  `status` varchar(35) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pk_sertifikasi`
--

INSERT INTO `pk_sertifikasi` (`id_pencapaian`, `nama`, `no_sertifikat`, `tanggal`, `periode`, `tgl_awal`, `tgl_akhir`, `status_no_indikator`, `status`, `id_dosen`) VALUES
(1, 'Sertifikasi IC3', '887HF82JK', '2017-05-02', 'Triwulan 1', '2017-05-18', '2017-05-30', 0, 'Menunggu', 1);

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
(11, 'National Standards of Information Security Competency ', 'IT Resource Management', 'Framework, Curricula, Certifications, Research Studies', 'NICE, ISACA, AIS, Delphi Study, PLS Method', '', '', '', '', '', '', 1),
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
  MODIFY `id_bukti_blog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bukti_bukuajar`
--
ALTER TABLE `bukti_bukuajar`
  MODIFY `id_bukti_bukuajar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bukti_haki`
--
ALTER TABLE `bukti_haki`
  MODIFY `id_bukti_haki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bukti_penelitian`
--
ALTER TABLE `bukti_penelitian`
  MODIFY `id_bukti_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bukti_pengmas`
--
ALTER TABLE `bukti_pengmas`
  MODIFY `id_bukti_pengmas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bukti_publikasi`
--
ALTER TABLE `bukti_publikasi`
  MODIFY `id_bukti_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bukti_sertifikasi`
--
ALTER TABLE `bukti_sertifikasi`
  MODIFY `id_bukti_sertifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `indikator_blog`
--
ALTER TABLE `indikator_blog`
  MODIFY `id_indikator_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indikator_bukuajar`
--
ALTER TABLE `indikator_bukuajar`
  MODIFY `id_indikator_bukuajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indikator_haki`
--
ALTER TABLE `indikator_haki`
  MODIFY `id_indikator_haki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `indikator_penelitian`
--
ALTER TABLE `indikator_penelitian`
  MODIFY `id_indikator_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indikator_pengmas`
--
ALTER TABLE `indikator_pengmas`
  MODIFY `id_indikator_pengmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indikator_publikasi`
--
ALTER TABLE `indikator_publikasi`
  MODIFY `id_indikator_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `indikator_sertifikasi`
--
ALTER TABLE `indikator_sertifikasi`
  MODIFY `id_indikator_sertifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id_perencanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pk_blog`
--
ALTER TABLE `pk_blog`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pk_bukuajar`
--
ALTER TABLE `pk_bukuajar`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pk_haki`
--
ALTER TABLE `pk_haki`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pk_penelitian`
--
ALTER TABLE `pk_penelitian`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pk_pengmas`
--
ALTER TABLE `pk_pengmas`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pk_publikasi`
--
ALTER TABLE `pk_publikasi`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `fk_bblog` FOREIGN KEY (`id_blog`) REFERENCES `pk_blog` (`id_pencapaian`),
  ADD CONSTRAINT `fk_bindikator` FOREIGN KEY (`id_indikator_blog`) REFERENCES `indikator_blog` (`id_indikator_blog`);

--
-- Constraints for table `bukti_bukuajar`
--
ALTER TABLE `bukti_bukuajar`
  ADD CONSTRAINT `fk_baindikator` FOREIGN KEY (`id_indikator_bukuajar`) REFERENCES `indikator_bukuajar` (`id_indikator_bukuajar`),
  ADD CONSTRAINT `fk_bbukuajar` FOREIGN KEY (`id_bukuajar`) REFERENCES `pk_bukuajar` (`id_pencapaian`);

--
-- Constraints for table `bukti_haki`
--
ALTER TABLE `bukti_haki`
  ADD CONSTRAINT `fk_bhaki` FOREIGN KEY (`id_haki`) REFERENCES `pk_haki` (`id_pencapaian`),
  ADD CONSTRAINT `fk_hindikator` FOREIGN KEY (`id_indikator_haki`) REFERENCES `indikator_haki` (`id_indikator_haki`);

--
-- Constraints for table `bukti_penelitian`
--
ALTER TABLE `bukti_penelitian`
  ADD CONSTRAINT `fk_bipenelitian` FOREIGN KEY (`id_indikator_penelitian`) REFERENCES `indikator_penelitian` (`id_indikator_penelitian`),
  ADD CONSTRAINT `fk_bpenelitian` FOREIGN KEY (`id_penelitian`) REFERENCES `pk_penelitian` (`id_pencapaian`);

--
-- Constraints for table `bukti_pengmas`
--
ALTER TABLE `bukti_pengmas`
  ADD CONSTRAINT `fk_bpengmas` FOREIGN KEY (`id_pengmas`) REFERENCES `pk_pengmas` (`id_pencapaian`),
  ADD CONSTRAINT `fk_pindikator2` FOREIGN KEY (`id_indikator_pengmas`) REFERENCES `indikator_pengmas` (`id_indikator_pengmas`);

--
-- Constraints for table `bukti_publikasi`
--
ALTER TABLE `bukti_publikasi`
  ADD CONSTRAINT `fk_bpublikasi` FOREIGN KEY (`id_publikasi`) REFERENCES `pk_publikasi` (`id_pencapaian`),
  ADD CONSTRAINT `fk_pindikator3` FOREIGN KEY (`id_indikator_publikasi`) REFERENCES `indikator_publikasi` (`id_indikator_publikasi`);

--
-- Constraints for table `bukti_sertifikasi`
--
ALTER TABLE `bukti_sertifikasi`
  ADD CONSTRAINT `fk_bsertifikasi` FOREIGN KEY (`id_sertifikasi`) REFERENCES `pk_sertifikasi` (`id_pencapaian`),
  ADD CONSTRAINT `fk_sindikator` FOREIGN KEY (`id_indikator_sertifikasi`) REFERENCES `indikator_sertifikasi` (`id_indikator_sertifikasi`);

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
