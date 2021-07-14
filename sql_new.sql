-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 14 Jul 2021 pada 15.53
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `haifanidawisata`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pdelete_pendataan_warga` (IN `v_id` VARCHAR(10))  NO SQL
BEGIN
DELETE FROM pendataan_warga WHERE id_warga = v_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pinsert_registrasi_user` (IN `v_username` VARCHAR(10), IN `v_password` VARCHAR(100), IN `v_no_rumah` VARCHAR(10), IN `v_nama` VARCHAR(50), IN `v_foto` VARCHAR(100), IN `v_status` VARCHAR(20), IN `v_id` VARCHAR(10))  NO SQL
BEGIN
INSERT INTO pendataan_warga (id_warga, no_rumah, nama, username, password, foto_ktp, status) VALUES (v_id, v_no_rumah, v_nama, v_username, v_password, v_foto, v_status);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `priwayat_pembayaran_iuran` ()  BEGIN
SELECT id_warga,nama,friwayat_pendataan_warga(id) AS Status FROM riwayat_pendataan_warga;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `priwayat_pendataan_warga` ()  BEGIN
SELECT id_warga,nama,friwayat_pendataan_warga(id_warga) AS Status FROM riwayat_pendataan_warga;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pview_pendataan_warga` ()  NO SQL
BEGIN
SELECT * FROM pendataan_warga;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `friwayat_pembayaran_iuran` (`tagihan` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
DECLARE status VARCHAR(255);
DECLARE hasil VARCHAR(255);
SELECT IF(tanggal_diterima IS NOT NULL, 'Benar', 'Salah') INTO status FROM riwayat_pembayaran_iuran WHERE no_tagihan=tagihan;
IF status = 'Benar' THEN
SET hasil = 'Sudah Bayar Iuran';
ELSE
SET hasil = 'Belum Bayar Iuran';
END IF;
RETURN(hasil);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `friwayat_pendataan_warga` (`id` VARCHAR(20)) RETURNS VARCHAR(255) CHARSET latin1 BEGIN
DECLARE status VARCHAR(255);
DECLARE hasil VARCHAR(255);
SELECT IF(tanggal_ubah IS NOT NULL, 'Benar', 'Salah') INTO status FROM riwayat_pendataan_warga WHERE id_warga = id;
IF status = 'Benar' THEN
SET hasil = 'Terverifikasi';
ELSE
SET hasil = 'Belum Terverifikasi';
END IF;
RETURN(hasil);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fview_total_warga` () RETURNS VARCHAR(100) CHARSET latin1 NO SQL
    DETERMINISTIC
BEGIN
DECLARE total VARCHAR(100);
SELECT COUNT(id_warga) INTO total FROM pendataan_warga;
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen`
--

CREATE TABLE `agen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_agen` varchar(128) NOT NULL,
  `perwakilan` varchar(128) NOT NULL,
  `alamat_kantor` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agen`
--

INSERT INTO `agen` (`id`, `id_user`, `kode_agen`, `perwakilan`, `alamat_kantor`, `email`, `no_hp`) VALUES
(1, 0, '01030001', 'Kota Bandung', 'Dayeuhkolot', 'riniastkepsarlita@gmail.com', '08108209103');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_pemesanan_tiket`
--

CREATE TABLE `aktivitas_pemesanan_tiket` (
  `id` int(11) NOT NULL,
  `aktor` varchar(15) DEFAULT NULL,
  `nama_customer` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aktivitas_pemesanan_tiket`
--

INSERT INTO `aktivitas_pemesanan_tiket` (`id`, `aktor`, `nama_customer`, `waktu`, `aksi`) VALUES
(1, 'coba123', 'Haitsam', '2020-04-20 21:58:29', 'Pembatalan'),
(2, 'coba123', 'Olga', '2020-04-20 21:58:35', 'Pembatalan'),
(3, 'coba123', 'Haitsam', '2020-04-20 22:01:40', 'Pembatalan'),
(4, 'coba123', 'Haitsam', '2020-04-20 22:01:59', 'Pemberangkatan'),
(5, 'coba123', 'Isam aja', '2020-04-21 09:54:17', 'Pemberangkatan'),
(6, 'Admin', 'Haitsam', '2021-04-20 01:02:48', 'Pemberangkatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Ever too late to lose weight?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-22 00:00:00', '2021-03-31 00:00:00', 'post6.jpg'),
(2, 'Make your fitness Boost with us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-30 00:00:00', '2021-03-31 00:00:00', 'post1.jpg'),
(3, 'Ethernity beauty health diet plan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-25 00:00:00', '2021-03-25 00:00:00', 'post2.jpg'),
(4, 'Ever too late to lose weight?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-08 00:00:00', '2021-03-31 00:00:00', 'post3.jpg'),
(5, 'Make your fitness Boost with us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-27 00:00:00', '2021-03-18 00:00:00', 'post4.jpg'),
(6, 'Ethernity beauty health diet plan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-19 00:00:00', '2021-03-31 00:00:00', 'post5.jpg'),
(7, 'Berita <br>Hari Ini <span class=\"text-color\">COVID19</span>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.</p>', 'Muhammad Haitsam', '2021-03-20 21:43:37', '2021-03-20 21:47:25', 'covid.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_lunak`
--

CREATE TABLE `berkas_lunak` (
  `id` int(11) NOT NULL,
  `id_jamaah` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `scan_ktp` varchar(255) NOT NULL,
  `scan_kk` varchar(255) NOT NULL,
  `scan_rekam_medis` varchar(255) NOT NULL,
  `scan_paspor` varchar(255) NOT NULL,
  `scan_buku_nikah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas_lunak`
--

INSERT INTO `berkas_lunak` (`id`, `id_jamaah`, `foto`, `scan_ktp`, `scan_kk`, `scan_rekam_medis`, `scan_paspor`, `scan_buku_nikah`) VALUES
(1, 1, 'foto.jpg', '', '', 'bimbingan6701180123_TA_PA___Telkom_University.pdf', 'foto5.jpg', ''),
(2, 2, 'foto7.jpg', 'ahaitsam.jpg', '', '', '', ''),
(3, 3, '', '', '', '', '', ''),
(4, 4, '', '', '', '', '', ''),
(5, 5, '', '', '', '', '', ''),
(6, 6, '', '', '', '', '', ''),
(7, 7, '', '', '', '', '', ''),
(8, 9, '', '', '', '', '', ''),
(9, 10, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Boat House At India', '<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p>\r\n<blockquote>\r\n<i class=\"fa fa-quote-left\"></i>   There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. <i class=\"fa fa-quote-right\"></i>\r\n</blockquote>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users.</p>', 'Micheal', '2021-05-03 07:34:30', '2021-05-10 08:22:36', 'post3.jpg'),
(2, 'Last Year Adventure Trip Experiance', '<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p> <blockquote> <i class=\"fa fa-quote-left\"></i>   There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. <i class=\"fa fa-quote-right\"></i> </blockquote> <p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users.</p>', 'Rini Sarlita', '2021-05-10 22:08:53', '2021-05-10 22:09:59', 'post2.jpg'),
(3, 'Holiday Tours', '<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p> <blockquote> <i class=\"fa fa-quote-left\"></i>   There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. <i class=\"fa fa-quote-right\"></i> </blockquote> <p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users.</p>', 'Muhammad Haitsam', '2021-05-10 23:33:00', '2021-05-10 23:33:00', 'post1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran_paket`
--

CREATE TABLE `bukti_pembayaran_paket` (
  `id` int(11) NOT NULL,
  `id_jamaah` int(11) DEFAULT NULL,
  `id_rekening_tujuan` int(11) NOT NULL,
  `rekening_pengirim` varchar(255) NOT NULL,
  `bank_pengirim` varchar(255) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `nominal_transfer` float(16,2) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `kode_bayar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukti_pembayaran_paket`
--

INSERT INTO `bukti_pembayaran_paket` (`id`, `id_jamaah`, `id_rekening_tujuan`, `rekening_pengirim`, `bank_pengirim`, `nama_pengirim`, `waktu_transfer`, `nominal_transfer`, `bukti_pembayaran`, `catatan`, `status`, `kode_bayar`) VALUES
(1, 1, 3, '1203129039213', 'BNI', 'Hariadi Arfah', '2021-04-18 16:03:00', 28000000.00, 'WhatsApp_Image_2021-04-06_at_11_18_59.jpeg', 'Okey', 'Pembayaran valid', '69BD956F8ECD5FBCEC1A3C70150E9DC1'),
(2, 3, 3, '1203129039213', 'BNI', 'Hariadi Arfah', '2021-06-25 10:46:00', 120000000.00, 'Group_21.png', 'oke', 'Pembayaran valid', 'ADAF4772FF554A7B73AD1D5A90251452'),
(3, 4, 2, '1203129039213', 'BNI', 'Olga Paurenta', '2021-07-04 19:46:00', 300000000.00, '1200px-Telkom_University_Logo_svg.png', 'Terima Kasih', 'Pembayaran valid', 'A38D2D7C33017EDE97E7EFB971F0DC98'),
(4, 4, 3, '1234', 'BNI', 'Haitsam', '2021-07-05 08:27:00', 28000000.00, 'resize-pas_1.jpg', 'Terima kasih', 'Pembayaran valid', 'A38D2D7C33017EDE97E7EFB971F0DC98'),
(5, 7, 1, '1203129039213', 'BNI', 'Alya Putri Maharani', '2021-07-06 17:14:00', 28000000.00, '1200px-Telkom_University_Logo_svg1.png', 'oke', 'Belum dikonfirmasi', 'D8253C9EB740ECD2F49E8F65609EF57E'),
(8, NULL, 2, '1112111', 'BNI', 'aaasdasd', '2021-07-14 19:55:00', 2000000.00, 'Screen_Shot_2021-06-07_at_8_32_56_PM2.png', 'das asdasd asdada', 'Pembayaran valid', 'C3CBA32E7A319FED042ADC2CD6B23723');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_transfer`
--

CREATE TABLE `bukti_transfer` (
  `id` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_rekening_tujuan` int(11) NOT NULL,
  `rekening_pengirim` varchar(128) NOT NULL,
  `bank_pengirim` varchar(100) NOT NULL,
  `nama_pengirim` varchar(128) NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `nominal_transfer` float(14,2) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukti_transfer`
--

INSERT INTO `bukti_transfer` (`id`, `id_checkout`, `id_rekening_tujuan`, `rekening_pengirim`, `bank_pengirim`, `nama_pengirim`, `waktu_transfer`, `nominal_transfer`, `bukti_pembayaran`, `catatan`, `status`) VALUES
(1, 1, 2, '0123', 'BNI', 'Olga Paurenta', '2021-04-02 17:57:00', 2000000.00, 'Olga_Paurenta.png', 'makasih yak', 'Pembayaran tidak%20valid'),
(2, 1, 2, '012345', 'BNI', 'Olga Paurenta', '2021-04-02 17:57:00', 2000000.00, 'Olga_Paurenta1.png', 'makasih yak', 'Pembayaran valid'),
(3, 3, 1, '1203129039213', 'BNI', 'Hariadi Arfah', '2021-04-14 23:52:00', 207000.00, '0.jpg', 'makasih ya', 'Pembayaran tidak%20valid'),
(4, 5, 1, '1203129039213', 'BNI', 'Olga Paurenta', '2021-04-15 11:10:00', 12000.00, 'pempek.jpg', 'oke', 'Pembayaran valid'),
(5, 6, 1, '821982173', 'BNI', 'Olga Paurenta', '2021-04-08 17:28:00', 12000.00, 'foto.jpg', '', 'Pembayaran valid'),
(6, 8, 2, '1203129039213', 'BNI', 'Olga Paurenta', '2021-05-28 08:42:00', 12000.00, 'ahaitsam.jpg', 'makasih', 'Belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_hp_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `total_harga` float(14,2) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `id_metode_bayar` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id`, `id_user`, `kode_bayar`, `nama_penerima`, `no_hp_penerima`, `alamat_penerima`, `id_kurir`, `total_harga`, `waktu_pemesanan`, `id_metode_bayar`, `status`) VALUES
(1, 1, '8FB93EBCF40943DF5330353E99EF0AF2', 'Olga Paurenta', '081289182332', 'Medan', 2, 207000.00, '2021-04-02 17:41:04', 1, 'Pesanan diterima'),
(2, 1, '4102FE967A078974F3C1E7E262F35496', 'Olga Paurenta', '081201232133', 'Medan', 2, 256000.00, '2021-04-02 17:45:59', 1, 'Pesanan diterima'),
(3, 1, '12014315B3CF8568FDA938443AD17EEB', 'Hariadi Arfah', '02130129321', 'Goa Tallo', 3, 207000.00, '2021-04-02 23:46:56', 1, 'Menunggu konfirmasi pembayaran'),
(4, 1, 'F461ACCDCCD98119530336C1264B83DD', 'Peggy', '0821312312', 'coba', 1, 156000.00, '2021-04-04 14:37:21', 1, 'Pesanan diterima'),
(5, 1, 'C8B2FC07CE7D9D56697671F0DADF7E53', 'Peggy', '081210231', 'Bandung', 1, 12000.00, '2021-04-05 11:04:05', 1, 'Pesanan diterima'),
(6, 3, 'BBADBB7A82E6E8C6011F649A644E1851', 'Peggy', '0123456789', 'Medan', 4, 108000.00, '2021-04-06 13:27:37', 1, 'Pesanan dibatalkan'),
(7, 1, '3FCA8A16A43A25A62492938D96C8C21B', 'Hariadi Arfah', '1234', '', 2, 132000.00, '2021-04-06 13:47:17', 1, 'Pesanan diterima'),
(8, 1, '21E7BFBC9D9361F9358BD5B3921476DC', 'Muhammad Haitsam', '082117503125', 'Jl. Raya Cilamaya', 1, 12000.00, '2021-05-15 08:39:11', 1, 'Menunggu konfirmasi pembayaran'),
(9, 1, 'AAF416B3797230FE0E3B9C45A8927C98', 'Rini Sarlita', '082117503125', 'oke', 4, 60000.00, '2021-05-15 08:41:54', 1, 'Belum dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(128) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `footer` varchar(255) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `title`, `category`, `header`, `content`, `footer`, `last_updated`) VALUES
(1, 'Tentang Aplikasi', '', 'Illustration', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:54'),
(2, 'Hubungi Kami', '', 'Development Approach', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:49:49'),
(3, 'Bantuan', '', 'Illustration', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:44'),
(4, 'FAQ', '', 'Development Approach', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:52:18'),
(5, 'Pengaturan', '', '-', '-', '-', '2021-04-18 16:24:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `footer` varchar(256) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dashboard`
--

INSERT INTO `dashboard` (`id`, `header`, `title`, `content`, `footer`, `icon`, `contact`) VALUES
(1, 'Dashboard', 'Haifa Nida Admin', '<b>Haifa Nida Wisata</b> merupakan Travel yang menyediakan layanan perjalanan Haji dan Umrah. Nama Haifa sendiri diambil dari ketiga nama anak sang Owner, yaitu Haitsam, Iyad dan Aufa. perusahaan ini melayani konsumen dimulai dari pendaftaran, vaksin, pemesanan tiket pesawat dan hotel, bimbingan manasik, mengurus Visa hingga melayani konsumen dari mulai berangkat ke tanah suci hingga kembali ke tanah air. selain itu perusahaan ini memiliki beberapa usaha lainnya seperti restoran, toko oleh-oleh, penjualan tiket kereta dan pesawat, penyewaan tempat futsal dan fitnes hingga yayasan pendidikan.', 'Haifa Nida Wisata', 'fas fa-globe', '+62 811-1720-494');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `id` int(11) NOT NULL,
  `destinasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`id`, `destinasi`) VALUES
(1, 'Arab Saudi'),
(2, 'Timur Tengah'),
(3, 'Afrika'),
(4, 'Amerika'),
(5, 'Eropa'),
(6, 'Jepang'),
(7, 'Turki'),
(8, 'Singapura'),
(9, 'Australia'),
(10, 'Mesir'),
(11, 'Palestina'),
(12, 'Korea'),
(13, 'Cina'),
(14, 'Yogyakarta'),
(15, 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan_tiket`
--

CREATE TABLE `detail_pemesanan_tiket` (
  `id` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `kode_tiket` varchar(15) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan_tiket`
--

INSERT INTO `detail_pemesanan_tiket` (`id`, `book_id`, `kode_tiket`, `nama`, `status`) VALUES
(1, 'uZygwRy73fGuvQz', '0410BDGKRW', 'Haitsam', 'Berangkat'),
(2, 'uZygwRy73fGuvQz', '0510BDGKRW', 'Rini Sayang', 'has booked'),
(3, 'T1RPtgpvDbALXRc', '0410BDGJKT', 'Haitsam', 'has booked'),
(4, '4NDAdH3aGB57eWU', '0310BDGKRW', 'Delvira Nur Zahrah', 'has booked'),
(5, '7vYQdlxYAJrCE56', '0710BDGJKT', 'Muhammad Ashraf Hidayat', 'has booked'),
(6, 'jdfffKLto2v96Xv', '0813BDGCRB', 'Haitsam', 'has booked'),
(7, '2gpXxlrpQEUStvf', '0213BDGCRB', 'Isyana', 'has booked'),
(8, 'wDrjgUQKbh14UlV', '0210BDGKRW', 'Melia', 'has booked'),
(9, 'wDrjgUQKbh14UlV', '0710BDGKRW', 'Olga P', 'has booked');

--
-- Trigger `detail_pemesanan_tiket`
--
DELIMITER $$
CREATE TRIGGER `after_konfirmasi_detail_pemesanan_tiket` AFTER UPDATE ON `detail_pemesanan_tiket` FOR EACH ROW BEGIN
IF NEW.status="Berangkat" THEN 
INSERT INTO aktivitas_pemesanan_tiket
SET aksi = 'Pemberangkatan',
aktor = 'Admin',
waktu = NOW(),
nama_customer = OLD.nama;
ELSEIF NEW.status="Batal" THEN
INSERT INTO aktivitas_pemesanan_tiket
SET aksi = 'Pembatalan',
aktor = 'Admin',
waktu = NOW(),
nama_customer = OLD.nama;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `id_paket_wisata`, `fasilitas`, `icon`) VALUES
(1, 1, 'Transportasi', 'fa fa-car'),
(2, 1, 'Pesawat', 'fa fa-plane'),
(3, 1, 'Pemandangan', 'fa fa-binoculars'),
(4, 1, 'Makanan', 'fa fa-cutlery'),
(5, 1, 'Hotel', 'fa fa-building-o'),
(6, 2, 'Transportasi', 'fa fa-car'),
(7, 2, 'Pesawat', 'fa fa-plane'),
(8, 2, 'Pemandangan', 'fa fa-binoculars'),
(9, 2, 'Makanan', 'fa fa-cutlery'),
(10, 2, 'Hotel', 'fa fa-building-o'),
(11, 3, 'Transportasi', 'fa fa-car'),
(12, 3, 'Pesawat', 'fa fa-plane'),
(13, 3, 'Pemandangan', 'fa fa-binoculars'),
(14, 3, 'Makanan', 'fa fa-cutlery'),
(15, 3, 'Hotel', 'fa fa-building-o'),
(16, 4, 'Transportasi', 'fa fa-car'),
(17, 4, 'Pesawat', 'fa fa-plane'),
(18, 4, 'Pemandangan', 'fa fa-binoculars'),
(19, 4, 'Makanan', 'fa fa-cutlery'),
(20, 4, 'Hotel', 'fa fa-building-o'),
(21, 0, 'Transportasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar_hotel`
--

CREATE TABLE `fasilitas_kamar_hotel` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `fasilitas` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `haifa`
--

CREATE TABLE `haifa` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nomor_sk` varchar(128) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `nama_direktur` varchar(255) NOT NULL,
  `alamat_kantor` varchar(255) NOT NULL,
  `akreditasi` char(5) NOT NULL,
  `tanggal_akreditasi` date NOT NULL,
  `lembaga_akreditasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `haifa`
--

INSERT INTO `haifa` (`id`, `status`, `nomor_sk`, `tanggal_sk`, `nama_direktur`, `alamat_kantor`, `akreditasi`, `tanggal_akreditasi`, `lembaga_akreditasi`) VALUES
(1, 1, 'NOMOR 771 TAHUN 2017', '2017-10-02', 'HAITSAM', 'DUSUN KEDUNG ASEM RT/RW 008/004, DESA MEKARMAYA, KEC. CILAMAYA WETAN, KAB. KARAWANG, JAWA BARAT TELP. (0264) 8380278 EMAIL: HAIFANIDAWISATA@YAHOO.CO.ID', 'B', '2017-07-21', 'Kementerian Agama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haifa_menu`
--

CREATE TABLE `haifa_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `dropdown` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `haifa_menu`
--

INSERT INTO `haifa_menu` (`id`, `menu`, `url`, `dropdown`, `active`, `login`) VALUES
(1, 'Home', 'Home/', 0, 1, 0),
(2, 'Produk & Jasa', '#', 1, 1, 0),
(3, 'Informasi', '#', 1, 1, 0),
(4, 'Transaksi', '#', 1, 1, 1),
(5, 'Kelengkapan', '#', 1, 1, 1),
(6, 'Lainnya', '#', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `haifa_sub_menu`
--

CREATE TABLE `haifa_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `haifa_sub_menu`
--

INSERT INTO `haifa_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 2, 'Paket Wisata', 'PaketWisata/', 0),
(2, 2, 'Umroh dan Haji', 'PaketWisata/umroh', 1),
(3, 2, 'Online Shop', 'Produk/', 1),
(4, 2, 'Shuttle', 'Shuttle/', 1),
(5, 3, 'Informasi', 'Informasi/', 0),
(6, 3, 'Blog', 'Informasi/blog', 1),
(7, 3, 'Berita', 'Informasi/berita', 1),
(8, 3, 'Pengumuman', 'Informasi/pengumuman', 1),
(9, 3, 'Peraturan', 'Informasi/peraturan', 1),
(10, 3, 'Struktur Organisasi', 'Informasi/strukturOrganisasi', 1),
(11, 3, 'Jadwal Keberangkatan', 'Informasi/jadwalKeberangkatan', 1),
(12, 3, 'Jadwal Haifa Shuttle', 'Informasi/jadwalShuttle', 1),
(13, 3, 'Alamat Kantor, Cabang & Agent', 'Informasi/alamat', 1),
(14, 4, 'Keranjang', 'Transaksi/keranjang', 1),
(15, 4, 'Pesanan Saya', 'Transaksi/pesanan', 1),
(16, 4, 'Pembayaran Produk', 'Transaksi/PembayaranProduk', 1),
(17, 4, 'Pembayaran Paket Wisata', 'Transaksi/pembayaranPaketWisata', 0),
(18, 4, 'Pembayaran Paket Umroh & Haji', 'Transaksi/pembayaranUmroh', 0),
(19, 4, 'Riwayat Pembayaran', 'Transaksi/riwayatPembayaran', 1),
(20, 5, 'Kelengkapan', 'Kelengkapan/', 1),
(21, 5, 'Upload Berkas', 'Kelengkapan/uploadBerkas', 0),
(22, 5, 'Persyaratan', 'Kelengkapan/persyaratan', 1),
(23, 5, 'Kelengkapan Fasilitas', 'Kelengkapan/kelengkapan', 1),
(24, 6, 'Tentang Haifa Nida Wisata', 'Lainnya/tentang', 1),
(25, 6, 'Pengaturan', 'Lainnya/pengaturan', 0),
(26, 6, 'Hubungi Kami', 'Lainnya/hubungiKami', 1),
(27, 6, 'Bantuan', 'Lainnya/bantuan', 1),
(28, 6, 'FAQ', 'Lainnya/faq', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bintang` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `id` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `kode_agen` varchar(255) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_di_paspor` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `riwayat_umroh` enum('Pernah','Belum Pernah') DEFAULT NULL,
  `golongan_darah` char(5) DEFAULT NULL,
  `no_paspor` varchar(255) DEFAULT NULL,
  `tanggal_cetak_paspor` date DEFAULT NULL,
  `tempat_pembuatan_paspor` varchar(255) DEFAULT NULL,
  `tanggal_habis_berlaku_paspor` date DEFAULT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `total_tagihan` float(16,2) NOT NULL,
  `id_metode_bayar` int(11) NOT NULL,
  `total_bayar` float(16,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`id`, `kode_bayar`, `kode_agen`, `id_pemesan`, `id_paket_wisata`, `nama_lengkap`, `nama_di_paspor`, `no_ktp`, `kewarganegaraan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `email`, `no_hp`, `id_pendidikan`, `pekerjaan`, `riwayat_umroh`, `golongan_darah`, `no_paspor`, `tanggal_cetak_paspor`, `tempat_pembuatan_paspor`, `tanggal_habis_berlaku_paspor`, `waktu_pemesanan`, `total_tagihan`, `id_metode_bayar`, `total_bayar`, `status`) VALUES
(1, '69BD956F8ECD5FBCEC1A3C70150E9DC1', '', 1, 1, 'Muhammad Haitsam', 'Haitsam Bin Fahruroji', '32151518029900002', 'WNI', 'Madinah', '1999-02-18', 'Laki-laki', 'Jl. Raya Cilamaya, Dusun Kedung Asem, Desa Mekarmaya, Rt.08/Rw.04, Kec. Cilamaya Wetan, Kab, Karawang, Prov. Jawa Barat - 41384', 'haitsam03@gmail.com', '082117503125', 7, 'Mahasiswa', 'Pernah', 'A', 'A37F', '2019-02-06', 'Karawang', '2024-07-27', '2021-04-16 00:26:59', 28000000.00, 1, 28000000.00, 'Sudah Lunas'),
(2, '69BD956C70150E9DC1F8ECD5FBCEC1A3', '', 1, 1, 'Muhammad Haitsam', 'Haitsam Bin Fahruroji', '3215151802990002', 'WNI', 'Madinah', '1999-02-18', 'Laki-laki', 'Jl. Raya Cilamaya', 'haitsam03@gmail.com', '082117503125', 7, 'Mahasiswa', 'Pernah', 'A', 'AF1367O', '2021-04-26', 'Karawang', '2021-04-21', '2021-04-16 10:24:11', 42000000.00, 1, 0.00, 'Belum Lunas'),
(3, 'ADAF4772FF554A7B73AD1D5A90251452', '01030001', 1, 4, 'Muhammad Haitsam', 'Haitsam Bin Fahruroji', '32151518029900002', 'WNI', 'Madinah', '1999-02-18', 'Laki-laki', 'Cilamaya', 'haitsam03@gmail.com', '082117503125', 6, 'Mahasiswa', 'Pernah', 'A', 'AF1367O', '2021-05-17', 'Karawang', '2021-06-04', '2021-05-17 09:06:15', 290000000.00, 1, 120000000.00, 'Menunggu konfirmasi pembayaran'),
(4, 'A38D2D7C33017EDE97E7EFB971F0DC98', '', 1, 3, 'Muhammad Haitsam', 'Haitsam Bin Fahruroji', '32151518029900002', 'WNI', 'Madinah', '1999-02-18', 'Laki-laki', 'Cilamaya', 'haitsam03@gmail.com', '082117503125', 6, 'Mahasiswa', 'Pernah', 'A', 'AF1367O', '2021-07-04', 'Jakarta', '2021-07-04', '2021-07-04 19:39:31', 28000000.00, 1, 328000000.00, 'Sudah Lunas'),
(5, '5046D41AA32516B1AE9996DFE279A1D4', '', 1, 3, 'Muhammad Haitsam', 'Haitsam', '3215151802990002', 'WNI', 'Madinah', '1999-02-18', 'Laki-laki', 'Cilamaya', 'haitsam03@gmail.com', '082117503125', 6, 'Mahasiswa', 'Pernah', 'A', 'Act24324', '2021-07-05', 'Karawang', '2021-07-05', '2021-07-05 08:25:43', 28000000.00, 1, 0.00, 'Pesanan dibatalkan'),
(6, '3C6AB24555A51906D569CEAC9218D3C6', '', 1, 3, 'Olga paurenta', '', '3215151802990002', 'WNI', 'Medan', '2021-07-05', 'Perempuan', 'Medan', 'olgapaurenta11@gmail.com', '082198391', 5, 'Mahasiswa', 'Belum Pernah', 'O', '', '0000-00-00', '', '0000-00-00', '2021-07-05 08:57:09', 28000000.00, 1, 0.00, 'Belum Lunas'),
(7, 'D8253C9EB740ECD2F49E8F65609EF57E', '', 1, 3, 'Veny Wigiyanti', '', '123213213', 'WNI', 'Madinah', '2021-07-06', 'Laki-laki', 'cilamaya', 'haitsam03@gmail.com', '01234', 6, 'Mahasiswa', 'Belum Pernah', 'A', '', '0000-00-00', '', '0000-00-00', '2021-07-06 12:13:51', 28000000.00, 1, 0.00, 'Menunggu konfirmasi pembayaran'),
(8, 'D8253C9EB740ECD2F49E8F65609EF57E', '', 1, 3, 'Oliver Sykes', '', '123213213', 'WNI', 'Madinah', '2021-07-06', 'Laki-laki', 'cilamaya', 'haitsam03@gmail.com', '01234', 6, 'Mahasiswa', 'Belum Pernah', 'A', '', '2021-07-13', '', '2022-07-23', '2021-07-06 12:13:51', 28000000.00, 1, 0.00, 'Menunggu konfirmasi pembayaran'),
(9, 'C3CBA32E7A319FED042ADC2CD6B23723', '', 1, 3, 'Jumahid Habib', '', '12312312', '', '', '0000-00-00', '', 'Kepek 2, Kepek', '', '082137244805', 0, '', '', NULL, '', '0000-00-00', '', '0000-00-00', '2021-07-14 17:37:35', 28000000.00, 1, 2001000.00, 'Menunggu konfirmasi pembayaran'),
(10, 'C3CBA32E7A319FED042ADC2CD6B23723', '', 1, 3, 'Mangkato Indonesia', '', '12312311', '', '', '0000-00-00', '', 'Jalan Komplek Permata Buah Batu D 22', 'mangkato2021@gmail.com', '082137244805', 0, '', '', NULL, '', '0000-00-00', '', '0000-00-00', '2021-07-14 17:37:35', 28000000.00, 1, 2001000.00, 'Menunggu konfirmasi pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar_hotel`
--

CREATE TABLE `kamar_hotel` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `jenis_kamar` varchar(255) NOT NULL,
  `harga` float(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id` int(11) NOT NULL,
  `nama_kantor` varchar(128) NOT NULL,
  `nama_pimpinan` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `region` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nomor_telepon` varchar(128) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`id`, `nama_kantor`, `nama_pimpinan`, `alamat`, `region`, `email`, `nomor_telepon`, `latitude`, `longitude`) VALUES
(1, 'Kantor Pusat', 'Dr. H. Fakhrurrozi Lc. MA', 'DUSUN KEDUNG ASEM RT/RW 008/004, DESA MEKARMAYA, KEC. CILAMAYA WETAN, KAB. KARAWANG, JAWA BARAT TELP. (0264) 8380278 EMAIL: HAIFANIDAWISATA@YAHOO.CO.ID', 'Karawang', 'haifanidawisata12@gmaicom', '0226140312', '-6.252086735369111', '107.58178515435385'),
(2, 'Kantor Pemasaran Karawang', 'Hj. Ria Maelasari', 'Jl. R.A Kartini, No. 1, Karangpawitan, Kec. Karawang Barat, Kab. Karawang, Jawa Barat, 41312', 'Karawang', 'haifanidawisata12@gmail.com', '02121231', '-6.2996776663695355', '107.29938552988462'),
(3, 'Kantor Pemasaran Bandung', 'Marianah S.Pd', 'Jl. Batununggal', 'Bandung', 'haifanidawisata12@gmail.com', '081281923012', '-6.921285719712039', '107.62823347899933');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Busana Pria'),
(2, 'Busana Wanita'),
(3, 'Busana Anak-anak'),
(4, 'Makanan'),
(5, 'Alat Ibadah'),
(6, 'Mainan'),
(7, 'Perabotan'),
(8, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_notifikasi`
--

CREATE TABLE `kategori_notifikasi` (
  `id` int(11) NOT NULL,
  `kategori_notifikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_notifikasi`
--

INSERT INTO `kategori_notifikasi` (`id`, `kategori_notifikasi`) VALUES
(1, 'Notifikasi'),
(2, 'Pemesanan Produk'),
(3, 'Pemesanan Paket'),
(4, 'Blog'),
(5, 'Pengumuman'),
(6, 'Blog'),
(7, 'Berita'),
(8, 'Paket Wisata'),
(9, 'Kelengkapan'),
(10, 'Pembayaran\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id` int(11) NOT NULL,
  `kategori_wisata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id`, `kategori_wisata`) VALUES
(1, 'Umroh'),
(2, 'Haji'),
(3, 'Luar Negeri'),
(4, 'Dalam Negeri'),
(5, 'Luar Negeri Islami'),
(6, 'Dalam Negeri Islami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id` int(11) NOT NULL,
  `kelengkapan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelengkapan`
--

INSERT INTO `kelengkapan` (`id`, `kelengkapan`) VALUES
(1, 'ID Card'),
(2, 'ID SIPATUH'),
(3, 'Seragam Batik'),
(4, 'Koper'),
(5, 'Tas Kecil'),
(6, 'Slayer'),
(7, 'Mukenah'),
(8, 'Buku Manasik'),
(9, 'GPS'),
(10, 'Kain Ihrom'),
(11, 'Sabuk Ihrom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelengkapan_jamaah`
--

CREATE TABLE `kelengkapan_jamaah` (
  `id` int(11) NOT NULL,
  `id_jamaah` int(11) NOT NULL,
  `id_kelengkapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelengkapan_jamaah`
--

INSERT INTO `kelengkapan_jamaah` (`id`, `id_jamaah`, `id_kelengkapan`) VALUES
(1, 1, 1),
(3, 1, 2),
(5, 1, 3),
(7, 2, 5),
(8, 2, 8),
(9, 3, 1),
(10, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama_lengkap`, `jabatan`, `cabang`, `email`, `no_hp`) VALUES
(1, 'Fakhrurrozi', 'Komisaris Utama', 'Kantor Pusat', 'fakhry.elrazy@gmail.com', '081220747000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `kurir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `kurir`) VALUES
(1, 'JNE'),
(2, 'POS Indonesia'),
(3, 'SAP Express'),
(4, 'Sicepat'),
(5, 'J&T'),
(6, 'Standard Express');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maskapai`
--

CREATE TABLE `maskapai` (
  `id` int(11) NOT NULL,
  `maskapai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maskapai`
--

INSERT INTO `maskapai` (`id`, `maskapai`) VALUES
(1, 'Garuda Indonesia'),
(2, 'Saudia'),
(3, 'Etihad Airways'),
(4, 'Qatar Airways'),
(5, 'Emirates'),
(6, 'Turkish Airlines');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `metode_bayar`) VALUES
(1, 'Transfer'),
(2, 'Virtual Account'),
(3, 'OVO'),
(4, 'DANA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_notifikasi` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `waktu_notifikasi` datetime NOT NULL,
  `subjek` varchar(128) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `id_creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `id_kategori_notifikasi`, `sub_id`, `waktu_notifikasi`, `subjek`, `pesan`, `is_read`, `id_creator`) VALUES
(1, 1, 1, 1, '2021-07-04 13:36:00', 'Notification', 'Spending Alert: We\'ve noticed unusually high spending for your account.', 1, 0),
(2, 1, 10, NULL, '2021-07-04 13:41:00', 'Notifikasi', '$290.29 has been deposited into your account!', 1, NULL),
(3, 1, 5, 1, '2021-07-04 14:00:00', 'Anggota Eksekutif Baru	\r\n', 'A new monthly report is ready to download!', 1, NULL),
(4, 1, 10, 4, '2021-07-05 07:47:25', 'Pemesanan dibatalkan', 'Pemesanan Anda dibatalkan', 1, 1),
(5, 1, 10, 5, '2021-07-05 08:31:57', 'Pemesanan dibatalkan', 'Pemesanan Anda dibatalkan', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_unggulan`
--

CREATE TABLE `paket_unggulan` (
  `id` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_unggulan`
--

INSERT INTO `paket_unggulan` (`id`, `id_paket_wisata`) VALUES
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id` int(11) NOT NULL,
  `kode_paket` varchar(255) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga_paket` float(14,2) NOT NULL,
  `diskon` decimal(5,2) NOT NULL,
  `kualitas` varchar(255) NOT NULL,
  `bintang` enum('1','2','3','4','5') NOT NULL,
  `kuota` int(11) NOT NULL,
  `jumlah_terpesan` int(11) NOT NULL,
  `lama_wisata` int(11) NOT NULL,
  `id_kategori_wisata` int(11) NOT NULL,
  `id_destinasi` int(11) NOT NULL,
  `id_maskapai` int(11) NOT NULL,
  `tanggal_keberangkatan` date NOT NULL,
  `hotel_pertama` varchar(255) NOT NULL,
  `hotel_kedua` varchar(255) NOT NULL,
  `hotel_ketiga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tour_leader` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id`, `kode_paket`, `nama_paket`, `harga_paket`, `diskon`, `kualitas`, `bintang`, `kuota`, `jumlah_terpesan`, `lama_wisata`, `id_kategori_wisata`, `id_destinasi`, `id_maskapai`, `tanggal_keberangkatan`, `hotel_pertama`, `hotel_kedua`, `hotel_ketiga`, `deskripsi`, `tour_leader`, `gambar`, `aktif`) VALUES
(1, 'R1442-2', 'Umrah Ramadhan 1442 H', 42000000.00, '0.00', 'VVIP', '5', 30, 0, 12, 1, 1, 2, '2021-06-04', 'Sanabel', 'Hilton', '-', 'Umrah akhir Ramadhan, Shalat Idul Fitri di Masjidil Haram Makkah', 'Asep Maulana', '9cb616f9-462c-41e4-9c75-24436b24f74e.JPG', 1),
(2, 'M1443-1', 'Paket 1 Muharram', 28000000.00, '0.00', 'VIP', '4', 25, 1, 11, 1, 1, 3, '2021-07-08', 'Sanabel', 'Zam-zam Tower', '-', 'Oke', 'Iyad Musaddad', '9cb616f9-462c-41e4-9c75-24436b24f74e.JPG', 1),
(3, 'R1442-3', 'Umrah 1 Muharram 1443 H', 28000000.00, '0.00', 'Reguler', '5', 100, -2, 11, 1, 1, 1, '2022-03-29', 'Sanabel', 'Hilton', '-', 'Mantap', 'Rini Sarlita', 'Muharram.jpg', 1),
(4, 'C1444-1', 'Umroh bersama Ustadz Syafiq', 290000000.00, '0.00', 'Bintang 5', '5', 100, 0, 13, 1, 1, 1, '2021-09-10', 'Sanabel', 'Zam-zam Tower', '-', 'Umroh Bersama', 'Ustadz Syafiq Riza Basalamah', 'muharram21.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasokan`
--

CREATE TABLE `pasokan` (
  `id` int(11) NOT NULL,
  `pemasok` varchar(255) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `waktu_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasokan`
--

INSERT INTO `pasokan` (`id`, `pemasok`, `id_petugas`, `id_produk`, `jumlah`, `sub_total_harga`, `waktu_transaksi`) VALUES
(1, 'PT. Pempek Indonesia', 1, 14, 100, 700000.00, '2021-04-05 01:03:32'),
(2, 'PT. Seafood', 1, 1, 100, 1000000.00, '2021-04-05 01:10:22'),
(3, 'Pt. Seafood', 1, 1, 100, 1000000.00, '2021-04-04 00:00:00'),
(4, 'Pt. Seafood', 1, 2, 3, 10000.00, '2021-04-04 00:00:00'),
(5, 'Pt. Seafood', 1, 3, 3, 118000.00, '2021-04-04 00:00:00'),
(6, 'Pt. Seafood', 1, 4, 9, 300000.00, '2021-04-04 00:00:00'),
(7, 'Pt. Seafood', 1, 5, 9, 432000.00, '2021-04-04 00:00:00'),
(8, 'Pt. Seafood', 1, 6, 9, 118000.00, '2021-04-04 00:00:00'),
(9, 'Pt. Seafood', 1, 7, 9, 280000.00, '2021-04-04 00:00:00'),
(10, 'Pt. Seafood', 1, 8, 3, 110000.00, '2021-04-04 00:00:00'),
(11, 'Pt. Seafood', 1, 9, 8, 90000.00, '2021-04-04 00:00:00'),
(12, 'Pt. Seafood', 1, 10, 8, 170000.00, '2021-04-04 00:00:00'),
(13, 'Pt. Seafood', 1, 11, 8, 19000.00, '2021-04-04 00:00:00'),
(14, 'Pt. Seafood', 1, 12, 9, 180000.00, '2021-04-04 00:00:00'),
(15, 'Pt. Seafood', 1, 13, 9, 90000.00, '2021-04-04 00:00:00'),
(16, '', 1, 1, 2, 20000.00, '2021-04-05 07:58:38'),
(17, '', 1, 2, 30, 1260000.00, '2021-04-05 07:58:38'),
(18, '', 1, 3, 16, 608000.00, '2021-04-05 07:58:38'),
(19, 'PT. Pempek Indonesia', 1, 3, 10, 380000.00, '2021-04-06 13:22:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_tiket`
--

CREATE TABLE `pemesanan_tiket` (
  `id` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `waktu_pemesanan` datetime DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_tiket`
--

INSERT INTO `pemesanan_tiket` (`id`, `book_id`, `id_user`, `waktu_pemesanan`, `no_hp`, `email`, `jumlah`, `diskon`) VALUES
(1, 'zbxagnh9gCZ6QNj', 1, '0000-00-00 00:00:00', '082117503125', 'haitsam03@gmail.com', 2, '0.00'),
(2, 'SgCpocEuI84Px4R', 1, '0000-00-00 00:00:00', '082117503125', 'haitsam03@gmail.com', 2, '0.00'),
(3, 'uZygwRy73fGuvQz', 1, '0000-00-00 00:00:00', '082117503125', 'haitsam03@gmail.com', 2, '0.00'),
(4, 'T1RPtgpvDbALXRc', 1, '2021-04-21 10:51:56', '082117503125', 'haitsam03@gmail.com', 1, '0.00'),
(5, '4NDAdH3aGB57eWU', 1, '2021-04-21 11:03:52', '082117503125', 'haitsam03@gmail.com', 1, '0.00'),
(6, '7vYQdlxYAJrCE56', 1, '2021-04-21 11:13:13', '082117503125', 'haitsam03@gmail.com', 1, '0.00'),
(7, 'jdfffKLto2v96Xv', 1, '2021-05-14 01:44:33', '222222', 'haitsam03@gmail.com', 1, '0.00'),
(8, '2gpXxlrpQEUStvf', NULL, '2021-05-14 08:39:28', '082117503125', 'olgapaurenta11@gmail.com', 1, '0.00'),
(9, 'wDrjgUQKbh14UlV', 1, '2021-05-14 10:23:59', '082117503125', 'haitsam03@gmail.com', 2, '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'Tidak/Belum Tamat SD'),
(2, 'Tamat SD/Sederajat'),
(3, 'Tamat SLTP/Sederajat'),
(4, 'Tamat SLTA/Sederajat'),
(5, 'Tamat D1/D2'),
(6, 'Tamat Akademi/D3'),
(7, 'Tamat D4/S1'),
(8, 'Tamat S2'),
(9, 'Tamat S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Anggota Eksekutif Baru', '<p>namanya Sam</p>', 'Muhammad Ashraf Hidayat', '2021-03-18 09:17:28', '2021-03-20 20:49:58', 'bg-5.jpg'),
(2, 'dicoba', '<p>coba</p>', 'Delvira Nur Zahrah', '2021-03-19 05:48:04', '2021-03-19 05:48:04', 'bg-7 revisi.jpg'),
(3, 'Ever too late to lose weight?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima. \r\n</p>\r\n', 'Rini Sarlita', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post6.jpg'),
(4, 'Make your fitness Boost with us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'Olga Paurenta Simanihuruk', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post1.jpg'),
(5, 'Ethernity beauty health diet plan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post2.jpg'),
(6, 'Ever too late to lose weight?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post3.jpg'),
(7, 'Make your fitness Boost with us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post4.jpg'),
(8, 'Ethernity beauty health diet plan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post5.jpg'),
(9, 'Pengumuman <br>Pengajian <span class=\"text-color\">Bulanan</span>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'Muhammad Haitsam', '2021-03-20 21:54:41', '2021-03-20 21:54:41', 'bg-7.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan`
--

CREATE TABLE `peraturan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peraturan`
--

INSERT INTO `peraturan` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Larangan-larangan di PBB', '<p>1. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n<p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n\r\n', 'Delvira Nur Zahrah', '2021-04-10 07:07:23', '2021-04-10 07:07:30', '8c3ad9d7-2ae5-455a-a935-7da0dc17e957.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL,
  `id_jamaah` int(11) NOT NULL,
  `ktp` int(11) NOT NULL,
  `kk` int(11) NOT NULL,
  `foto34` int(11) NOT NULL,
  `foto46` int(11) NOT NULL,
  `paspor` int(11) NOT NULL,
  `visa` int(11) NOT NULL,
  `biometrik` int(11) NOT NULL,
  `suntik_vaksin` int(11) NOT NULL,
  `manasik` int(11) NOT NULL,
  `rekam_medis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `id_jamaah`, `ktp`, `kk`, `foto34`, `foto46`, `paspor`, `visa`, `biometrik`, `suntik_vaksin`, `manasik`, `rekam_medis`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(2, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_1`
--

CREATE TABLE `pertanyaan_1` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan_1`
--

INSERT INTO `pertanyaan_1` (`id`, `pertanyaan`) VALUES
(1, 'Apa nama mobil Favorit kamu?'),
(2, 'Siapa nama ibu kandung kamu?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_2`
--

CREATE TABLE `pertanyaan_2` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan_2`
--

INSERT INTO `pertanyaan_2` (`id`, `pertanyaan`) VALUES
(1, 'Apa warna favorit kamu?'),
(2, 'Apa kutipan kata favorit kamu?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_keamanan`
--

CREATE TABLE `pertanyaan_keamanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan_1` int(11) NOT NULL,
  `jawaban_1` varchar(255) NOT NULL,
  `id_pertanyaan_2` int(11) NOT NULL,
  `jawaban_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan_keamanan`
--

INSERT INTO `pertanyaan_keamanan` (`id`, `id_user`, `id_pertanyaan_1`, `jawaban_1`, `id_pertanyaan_2`, `jawaban_2`) VALUES
(1, 1, 1, 'Vios', 2, 'Menang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_wa` varchar(128) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `waktu_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `no_wa`, `subjek`, `pesan`, `status`, `bukti`, `waktu_kirim`) VALUES
(1, 'Muhammad Haitsam', 'haitsam03@gmail.com', '082117503125', '', 'Saya tidak bisa melakukan Registrasi', 'Sudah dikonfirmasi', '', '2021-04-20 10:49:59'),
(2, 'Haitsam', 'haitsam03@gmail.com', '+6282117503125', '', 'jangan coba-coba', 'Sudah dikonfirmasi', 'ahaitsam.jpg', '2021-04-20 10:51:23'),
(3, 'Rini Sarlita', 'riniastkepsarlita@gmail.com', '6287892990435', '', 'Percobaan', 'Belum dikonfirmasi', '', '2021-04-20 13:03:49'),
(4, 'Olga Paurenta', 'olgapaurenta11@gmail.com', '081394688093', '', 'jadi ceritanya begini, sudah', 'Belum dikonfirmasi', '', '2021-05-12 14:38:51'),
(5, 'Juda Pratama', 'judapratama@gmail.com', '082117503125', '', 'oke', 'Belum dikonfirmasi', 'foto.jpg', '2021-05-12 14:44:15'),
(6, 'Muhammad Haitsam', 'haitsam03@gmail.com', '082117503125', '', 'Enak banget', 'Belum dikonfirmasi', '', '2021-05-18 20:17:46'),
(7, 'Muhammad Haitsam', 'olgapaurenta11@gmail.com', '082117503125', '', 'Jangan makan daging babi!!!', 'Belum dikonfirmasi', '', '2021-05-20 12:56:50'),
(8, 'Juda Pratama', 'haitsam03@gmail.com', '082117503125', '', 'aku ga bisa reset passwod', 'Belum dikonfirmasi', '', '2021-05-23 21:05:29'),
(9, 'Haitsam', 'haitsam03@gmail.com', '082117503125', '', 'Terima Kasih', 'Belum dikonfirmasi', '', '2021-05-28 19:40:20'),
(10, 'Muhammad Haitsam', 'haitsam03@gmail.com', '082117503125', '', 'jadi begini,,,', 'Belum dikonfirmasi', '', '2021-06-16 21:41:06'),
(11, 'Rini Sarlita', 'riniastkepsarlita@gmail.com', '082117503125', '', 'Halo, saya ingin komplen mengenai anu', 'Belum dikonfirmasi', '', '2021-06-26 09:55:20'),
(12, 'Muhammad Haitsam', 'haitsam03@gmail.com', '082117503125', '', 'Saya berkeluh', 'Belum dikonfirmasi', '', '2021-07-04 19:34:43'),
(13, 'haitsam', 'haitsam03@gmail.com', '082117503125', '', 'oke', 'Belum dikonfirmasi', '', '2021-07-05 08:35:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kode_pesanan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_checkout`, `id_produk`, `kode_pesanan`, `jumlah`, `sub_total_harga`) VALUES
(1, 1, 1, '212F78F28139E55B2476554D6A10E0CC', 3, 147000.00),
(2, 1, 2, 'C622FCECF2FE3047D9022470D3511A67', 1, 60000.00),
(3, 2, 2, 'C85D7C10E7FB5323D1B5622F1FD80A5E', 1, 60000.00),
(4, 2, 1, '4754E0FAB372FC7EC1F99E1C3B2932A1', 4, 196000.00),
(5, 3, 1, '4E8852969C15557D994FDCDBDC1F4A2B', 3, 147000.00),
(6, 3, 2, 'CBA0D7D0798C16979420D4F8F1F0A607', 1, 60000.00),
(7, 4, 1, '938312430F15613A04AF9E413C839A84', 3, 36000.00),
(8, 4, 7, 'DEA9E0BE8176CC75B15F23F9EACC4A6B', 1, 60000.00),
(9, 4, 9, 'F26074369FE932F5B09CD8DA9E7DA115', 1, 60000.00),
(10, 5, 1, '2608072D8A72A2EEEFD5E653102AD8E1', 1, 12000.00),
(11, 6, 1, 'FA5CFE7636F433FC9B72F352141A8339', 4, 48000.00),
(12, 6, 3, '314297835122BD639C7DD80599816D1C', 1, 60000.00),
(13, 7, 1, '8F92A607F08BE89FD6C6D5E1DACFE859', 1, 12000.00),
(14, 7, 2, '9FDAB4E81646754373861B3831051641', 1, 60000.00),
(15, 7, 5, '4303A3D8593AAF0CBA211C10BA71C0F5', 1, 60000.00),
(16, 8, 1, 'AAF1E91C19856F813A7C23E244E0609C', 1, 12000.00),
(17, 9, 2, '823D6AC3371E6B27C40B48FCE6B425AC', 1, 60000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `harga_jual` float(14,2) NOT NULL,
  `harga_beli` float(14,2) NOT NULL,
  `diskon` decimal(5,2) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `merk`, `id_kategori`, `stok`, `terjual`, `harga_jual`, `harga_beli`, `diskon`, `deskripsi`, `gambar`, `aktif`) VALUES
(1, 'B0001', 'Jubah Nabawi', 'Nabawi', 1, 106, 0, 12000.00, 10000.00, '0.10', 'Pempek ini untuk manusia dewasa', '2141086_b66d1d62-8b94-450b-bb1a-9cea6674273b_1564_1564.jpg', 1),
(2, 'B0002', 'Jubah Visan', 'Visan', 1, 23, 0, 60000.00, 42000.00, '0.00', 'Pempek Enak dimakan', 'PECI_FASHION_MUSLIM_Jubah_Pria_ZAIN_Jubah_Muslim_Gamis_Pria_.jpg', 1),
(3, 'B0003', 'Gamis Pakistan', 'Pakistan', 1, 24, 0, 60000.00, 38000.00, '0.00', 'Pempek Enak dimakan', 'LONG_LINE___BAJU_KOKO_PRIA_GAMIS_LONGDRESS_BAJU_PANJANG_SELU.jpg', 1),
(4, 'A0001', 'Koko lengan pendek', 'Rabbani', 1, 9, 0, 18000.00, 10000.00, '0.00', 'Pempek Enak dimakan', '8042346_88d5aed6-dc11-4dd8-b206-388d3f6acfdf.png', 1),
(5, 'B0004', 'Koko Pakistan Modh List', 'Rabbani', 1, 3, 0, 60000.00, 30000.00, '0.00', 'Pempek Enak dimakan', 'Baju_Koko_Pakistan_GZ1098__Baju_Koko_Abu__Baju_Koko_Navy__Ko.jpg', 1),
(6, 'B0005', 'Koko lengan panjang', 'Rabbani', 1, 2, 0, 60000.00, 44000.00, '0.00', 'Pempek Enak dimakan', 'Baju-Koko-Lengan-Panjang-Muslim-Pria-Model-Terbaru-Keren-Koko-pasha-Warna-Hitam3.jpg', 1),
(7, 'B0006', 'Koko Pasya', 'Elzora', 1, 41, 0, 15000.00, 6900.00, '0.00', 'Pempek Enak dimakan', '21232563_61bd4edc-b6bf-4f12-b92d-6e5c393b887b_1000_1000.jpg', 1),
(8, 'B0007', 'Koko Motif Lengan Panjang', 'Hijaz', 1, 8, 0, 60000.00, 41000.00, '0.00', 'Pempek Enak dimakan', 'amZzL3Q0Ni8xMDAvMTk4MjE1OTcxMC80MzE3MTYvYzE1NzhmYzAvNWRmMWE3YzRONzgyNGE5NmI.png', 1),
(9, 'B0008', 'Koko Gamis', 'Syarikah', 1, 18, 0, 44000.00, 28000.00, '0.00', 'Pempek Enak dimakan', 'Jubah-gamis.png', 1),
(10, 'B0009', 'Koko Aljami', 'Al-Jami', 1, 3, 0, 28000.00, 13000.00, '0.00', 'Pempek Enak dimakan', 'Aljami-Koko-Collection-Blue-Navy-combined-with-Light-Brown-by-Al-Jami-Collection1.png', 1),
(11, 'B0010', 'Gamis Sutra', 'Madinah', 2, 3, 0, 60000.00, 53000.00, '0.00', 'Pempek Enak dimakan', 'MF_baju_gamis_putih_gamis_sutera_kombinasi_brukat_m_sd_5l_1.png', 1),
(12, 'B0011', 'Gamis Dubai Abaya', 'Duubai', 2, 3, 0, 27000.00, 18000.00, '0.00', 'Pempek Enak dimakan', '16551476_aec46c98-76bc-4bee-af6b-5276486ba363_700_700.png', 1),
(13, 'B0021', 'Baju Muslim Wanita', 'Abaya', 2, 0, 0, 18000.00, 12000.00, '0.00', 'Pempek Enak dimakan', '31239420_bb97e376-216f-4c02-be55-9fd07437ab73_700_662.png', 1),
(14, 'A0002', 'Baju Muslim Wanita', 'Abaya', 2, 100, 0, 12000.00, 7000.00, '0.00', 'Enak banget', 'https_imagerouter_tokopedia_com_img_700_product-1_2018_12_3_42350167_42350167_b0c07289-c0b9-42f7-90aa-13d976b44823_474_473.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `bank`, `no_rekening`, `atas_nama`, `email`) VALUES
(1, 'Mandiri', '1234567890', 'Delvira Nur Zahrah', 'delvira@gmail.com'),
(2, 'BNI', '0987654321', 'Muhammad Haitsam', 'haitsam03@gmail.com'),
(3, 'BCA', '123120491023', 'Muhammad ashraf Hidayat', 'ashraf.muhammad@gmail.com'),
(4, 'BRI', '0128102380912', 'Rini Sarlita', 'riniastkepsarlita@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `parent_id` varchar(10) DEFAULT NULL,
  `kutipan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id`, `nama`, `jabatan`, `foto`, `parent_id`, `kutipan`) VALUES
(1, 'Dr. H. Fakhrur Rozi Lc, MA.', 'Komisaris', 'default.jpg', NULL, '<b>Haifa Nida Wisata</b> merupakan Travel yang menyediakan layanan perjalanan Haji dan Umrah. Nama Haifa sendiri diambil dari ketiga nama anak sang Owner, yaitu Haitsam, Iyad dan Aufa. perusahaan ini melayani konsumen dimulai dari pendaftaran, vaksin, pemesanan tiket pesawat dan hotel, bimbingan manasik, mengurus Visa hingga melayani konsumen dari mulai berangkat ke tanah suci hingga kembali ke tanah air. selain itu perusahaan ini memiliki beberapa usaha lainnya seperti restoran, toko oleh-oleh, penjualan tiket kereta dan pesawat, penyewaan tempat futsal dan fitnes hingga yayasan pendidikan.'),
(2, 'Hj. Ria Maelasari M.Ag', 'Direktur Utama', 'default.jpg', '1', 'Umroh berkah bersama Haifa'),
(3, 'Muhammad haitsam Amd.Kom, S.P', 'Direktur', 'default.jpg', '1', 'Saya senang dengan Fasilitasnya'),
(4, 'Delvira Nur Zahrah', 'Database Enginer', 'default.jpg', '1', 'Pokoknya Mantap'),
(5, 'Muhammad Ashraf Hidayat', 'Programmer', 'default.jpg', '1', 'Terbaik'),
(6, 'Olga Paurenta Simanihuruk', 'Web Designer', 'default.jpg', '1', 'Oke Bangeet'),
(7, 'Rini Sarlita', 'Sekretaris', 'default.jpg', '1', ':)'),
(8, 'Akib Dahlan', 'Dokumentasi', 'default.jpg', '1', 'Saya senang bisa menjadi bagian dari Haifa Nida');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_shuttle`
--

CREATE TABLE `tiket_shuttle` (
  `id` int(11) NOT NULL,
  `kode_tiket` varchar(15) NOT NULL,
  `keberangkatan` varchar(25) DEFAULT NULL,
  `tujuan` varchar(25) DEFAULT NULL,
  `jadwal` time DEFAULT NULL,
  `harga` float(8,2) DEFAULT NULL,
  `no_kursi` int(11) NOT NULL,
  `ketersediaan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket_shuttle`
--

INSERT INTO `tiket_shuttle` (`id`, `kode_tiket`, `keberangkatan`, `tujuan`, `jadwal`, `harga`, `no_kursi`, `ketersediaan`) VALUES
(1, '0110BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 1, 'Tersedia'),
(2, '0110BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 1, 'Tersedia'),
(3, '0110BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 1, 'Tersedia'),
(4, '0110CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 1, 'Tersedia'),
(5, '0110CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 1, 'Tersedia'),
(6, '0110CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 1, 'Tersedia'),
(7, '0110JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 1, 'Tersedia'),
(8, '0110JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 1, 'Tersedia'),
(9, '0110JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 1, 'Tersedia'),
(10, '0110KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 1, 'Tersedia'),
(11, '0110KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 1, 'Tersedia'),
(12, '0110KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 1, 'Tersedia'),
(13, '0113BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 1, 'Tersedia'),
(14, '0113BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 1, 'Tersedia'),
(15, '0113BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 1, 'Tersedia'),
(16, '0113CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 1, 'Tersedia'),
(17, '0113CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 1, 'Tersedia'),
(18, '0113CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 1, 'Tersedia'),
(19, '0113JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 1, 'Tersedia'),
(20, '0113JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 1, 'Tersedia'),
(21, '0113JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 1, 'Tersedia'),
(22, '0113KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 1, 'Tersedia'),
(23, '0113KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 1, 'Tersedia'),
(24, '0113KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 1, 'Tersedia'),
(25, '0116BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 1, 'Tersedia'),
(26, '0116BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 1, 'Tersedia'),
(27, '0116BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 1, 'Tersedia'),
(28, '0116CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 1, 'Tersedia'),
(29, '0116CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 1, 'Tersedia'),
(30, '0116CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 1, 'Tersedia'),
(31, '0116JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 1, 'Tersedia'),
(32, '0116JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 1, 'Tersedia'),
(33, '0116JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 1, 'Tersedia'),
(34, '0116KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 1, 'Tersedia'),
(35, '0116KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 1, 'Tersedia'),
(36, '0116KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 1, 'Tersedia'),
(37, '0119BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 1, 'Tersedia'),
(38, '0119BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 1, 'Tersedia'),
(39, '0119BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 1, 'Tersedia'),
(40, '0119CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 1, 'Tersedia'),
(41, '0119CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 1, 'Tersedia'),
(42, '0119CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 1, 'Tersedia'),
(43, '0119JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 1, 'Tersedia'),
(44, '0119JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 1, 'Tersedia'),
(45, '0119JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 1, 'Tersedia'),
(46, '0119KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 1, 'Tersedia'),
(47, '0119KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 1, 'Tersedia'),
(48, '0119KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 1, 'Tersedia'),
(49, '0122BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 1, 'Tersedia'),
(50, '0122BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 1, 'Tersedia'),
(51, '0122BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 1, 'Tersedia'),
(52, '0122CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 1, 'Tersedia'),
(53, '0122CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 1, 'Tersedia'),
(54, '0122CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 1, 'Tersedia'),
(55, '0122JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 1, 'Tersedia'),
(56, '0122JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 1, 'Tersedia'),
(57, '0122JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 1, 'Tersedia'),
(58, '0122KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 1, 'Tersedia'),
(59, '0122KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 1, 'Tersedia'),
(60, '0122KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 1, 'Tersedia'),
(61, '0210BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 2, 'Tersedia'),
(62, '0210BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 2, 'Tersedia'),
(63, '0210BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 2, 'Tidak Tersedia'),
(64, '0210CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 2, 'Tersedia'),
(65, '0210CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 2, 'Tersedia'),
(66, '0210CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 2, 'Tersedia'),
(67, '0210JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 2, 'Tersedia'),
(68, '0210JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 2, 'Tersedia'),
(69, '0210JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 2, 'Tersedia'),
(70, '0210KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 2, 'Tersedia'),
(71, '0210KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 2, 'Tersedia'),
(72, '0210KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 2, 'Tersedia'),
(73, '0213BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 2, 'Tidak Tersedia'),
(74, '0213BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 2, 'Tersedia'),
(75, '0213BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 2, 'Tersedia'),
(76, '0213CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 2, 'Tersedia'),
(77, '0213CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 2, 'Tersedia'),
(78, '0213CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 2, 'Tersedia'),
(79, '0213JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 2, 'Tersedia'),
(80, '0213JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 2, 'Tersedia'),
(81, '0213JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 2, 'Tersedia'),
(82, '0213KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 2, 'Tersedia'),
(83, '0213KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 2, 'Tersedia'),
(84, '0213KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 2, 'Tersedia'),
(85, '0216BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 2, 'Tersedia'),
(86, '0216BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 2, 'Tersedia'),
(87, '0216BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 2, 'Tersedia'),
(88, '0216CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 2, 'Tersedia'),
(89, '0216CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 2, 'Tersedia'),
(90, '0216CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 2, 'Tersedia'),
(91, '0216JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 2, 'Tersedia'),
(92, '0216JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 2, 'Tersedia'),
(93, '0216JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 2, 'Tersedia'),
(94, '0216KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 2, 'Tersedia'),
(95, '0216KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 2, 'Tersedia'),
(96, '0216KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 2, 'Tersedia'),
(97, '0219BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 2, 'Tersedia'),
(98, '0219BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 2, 'Tersedia'),
(99, '0219BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 2, 'Tersedia'),
(100, '0219CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 2, 'Tersedia'),
(101, '0219CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 2, 'Tersedia'),
(102, '0219CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 2, 'Tersedia'),
(103, '0219JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 2, 'Tersedia'),
(104, '0219JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 2, 'Tersedia'),
(105, '0219JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 2, 'Tersedia'),
(106, '0219KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 2, 'Tersedia'),
(107, '0219KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 2, 'Tersedia'),
(108, '0219KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 2, 'Tersedia'),
(109, '0222BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 2, 'Tersedia'),
(110, '0222BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 2, 'Tersedia'),
(111, '0222BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 2, 'Tersedia'),
(112, '0222CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 2, 'Tersedia'),
(113, '0222CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 2, 'Tersedia'),
(114, '0222CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 2, 'Tersedia'),
(115, '0222JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 2, 'Tersedia'),
(116, '0222JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 2, 'Tersedia'),
(117, '0222JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 2, 'Tersedia'),
(118, '0222KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 2, 'Tersedia'),
(119, '0222KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 2, 'Tersedia'),
(120, '0222KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 2, 'Tersedia'),
(121, '0310BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 3, 'Tersedia'),
(122, '0310BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 3, 'Tersedia'),
(123, '0310BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 3, 'Tidak Tersedia'),
(124, '0310CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 3, 'Tersedia'),
(125, '0310CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 3, 'Tersedia'),
(126, '0310CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 3, 'Tersedia'),
(127, '0310JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 3, 'Tersedia'),
(128, '0310JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 3, 'Tersedia'),
(129, '0310JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 3, 'Tersedia'),
(130, '0310KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 3, 'Tersedia'),
(131, '0310KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 3, 'Tersedia'),
(132, '0310KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 3, 'Tersedia'),
(133, '0313BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 3, 'Tersedia'),
(134, '0313BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 3, 'Tersedia'),
(135, '0313BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 3, 'Tersedia'),
(136, '0313CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 3, 'Tersedia'),
(137, '0313CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 3, 'Tersedia'),
(138, '0313CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 3, 'Tersedia'),
(139, '0313JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 3, 'Tersedia'),
(140, '0313JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 3, 'Tersedia'),
(141, '0313JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 3, 'Tersedia'),
(142, '0313KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 3, 'Tersedia'),
(143, '0313KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 3, 'Tersedia'),
(144, '0313KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 3, 'Tersedia'),
(145, '0316BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 3, 'Tersedia'),
(146, '0316BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 3, 'Tersedia'),
(147, '0316BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 3, 'Tersedia'),
(148, '0316CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 3, 'Tersedia'),
(149, '0316CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 3, 'Tersedia'),
(150, '0316CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 3, 'Tersedia'),
(151, '0316JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 3, 'Tersedia'),
(152, '0316JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 3, 'Tersedia'),
(153, '0316JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 3, 'Tersedia'),
(154, '0316KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 3, 'Tersedia'),
(155, '0316KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 3, 'Tersedia'),
(156, '0316KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 3, 'Tersedia'),
(157, '0319BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 3, 'Tersedia'),
(158, '0319BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 3, 'Tersedia'),
(159, '0319BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 3, 'Tersedia'),
(160, '0319CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 3, 'Tersedia'),
(161, '0319CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 3, 'Tersedia'),
(162, '0319CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 3, 'Tersedia'),
(163, '0319JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 3, 'Tersedia'),
(164, '0319JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 3, 'Tersedia'),
(165, '0319JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 3, 'Tersedia'),
(166, '0319KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 3, 'Tersedia'),
(167, '0319KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 3, 'Tersedia'),
(168, '0319KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 3, 'Tersedia'),
(169, '0322BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 3, 'Tersedia'),
(170, '0322BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 3, 'Tersedia'),
(171, '0322BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 3, 'Tersedia'),
(172, '0322CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 3, 'Tersedia'),
(173, '0322CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 3, 'Tersedia'),
(174, '0322CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 3, 'Tersedia'),
(175, '0322JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 3, 'Tersedia'),
(176, '0322JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 3, 'Tersedia'),
(177, '0322JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 3, 'Tersedia'),
(178, '0322KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 3, 'Tersedia'),
(179, '0322KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 3, 'Tersedia'),
(180, '0322KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 3, 'Tersedia'),
(181, '0410BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 4, 'Tersedia'),
(182, '0410BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 4, 'Tidak Tersedia'),
(183, '0410BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 4, 'Tidak Tersedia'),
(184, '0410CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 4, 'Tersedia'),
(185, '0410CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 4, 'Tersedia'),
(186, '0410CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 4, 'Tersedia'),
(187, '0410JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 4, 'Tersedia'),
(188, '0410JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 4, 'Tersedia'),
(189, '0410JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 4, 'Tersedia'),
(190, '0410KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 4, 'Tersedia'),
(191, '0410KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 4, 'Tersedia'),
(192, '0410KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 4, 'Tersedia'),
(193, '0413BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 4, 'Tersedia'),
(194, '0413BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 4, 'Tersedia'),
(195, '0413BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 4, 'Tersedia'),
(196, '0413CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 4, 'Tersedia'),
(197, '0413CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 4, 'Tersedia'),
(198, '0413CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 4, 'Tersedia'),
(199, '0413JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 4, 'Tersedia'),
(200, '0413JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 4, 'Tersedia'),
(201, '0413JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 4, 'Tersedia'),
(202, '0413KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 4, 'Tersedia'),
(203, '0413KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 4, 'Tersedia'),
(204, '0413KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 4, 'Tersedia'),
(205, '0416BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 4, 'Tersedia'),
(206, '0416BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 4, 'Tersedia'),
(207, '0416BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 4, 'Tersedia'),
(208, '0416CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 4, 'Tersedia'),
(209, '0416CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 4, 'Tersedia'),
(210, '0416CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 4, 'Tersedia'),
(211, '0416JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 4, 'Tersedia'),
(212, '0416JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 4, 'Tersedia'),
(213, '0416JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 4, 'Tersedia'),
(214, '0416KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 4, 'Tersedia'),
(215, '0416KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 4, 'Tersedia'),
(216, '0416KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 4, 'Tersedia'),
(217, '0419BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 4, 'Tersedia'),
(218, '0419BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 4, 'Tersedia'),
(219, '0419BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 4, 'Tersedia'),
(220, '0419CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 4, 'Tersedia'),
(221, '0419CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 4, 'Tersedia'),
(222, '0419CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 4, 'Tersedia'),
(223, '0419JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 4, 'Tersedia'),
(224, '0419JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 4, 'Tersedia'),
(225, '0419JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 4, 'Tersedia'),
(226, '0419KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 4, 'Tersedia'),
(227, '0419KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 4, 'Tersedia'),
(228, '0419KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 4, 'Tersedia'),
(229, '0422BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 4, 'Tersedia'),
(230, '0422BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 4, 'Tersedia'),
(231, '0422BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 4, 'Tersedia'),
(232, '0422CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 4, 'Tersedia'),
(233, '0422CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 4, 'Tersedia'),
(234, '0422CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 4, 'Tersedia'),
(235, '0422JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 4, 'Tersedia'),
(236, '0422JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 4, 'Tersedia'),
(237, '0422JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 4, 'Tersedia'),
(238, '0422KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 4, 'Tersedia'),
(239, '0422KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 4, 'Tersedia'),
(240, '0422KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 4, 'Tersedia'),
(241, '0510BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 5, 'Tersedia'),
(242, '0510BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 5, 'Tersedia'),
(243, '0510BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 5, 'Tidak Tersedia'),
(244, '0510CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 5, 'Tersedia'),
(245, '0510CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 5, 'Tersedia'),
(246, '0510CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 5, 'Tersedia'),
(247, '0510JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 5, 'Tersedia'),
(248, '0510JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 5, 'Tersedia'),
(249, '0510JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 5, 'Tersedia'),
(250, '0510KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 5, 'Tersedia'),
(251, '0510KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 5, 'Tersedia'),
(252, '0510KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 5, 'Tersedia'),
(253, '0513BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 5, 'Tersedia'),
(254, '0513BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 5, 'Tersedia'),
(255, '0513BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 5, 'Tersedia'),
(256, '0513CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 5, 'Tersedia'),
(257, '0513CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 5, 'Tersedia'),
(258, '0513CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 5, 'Tersedia'),
(259, '0513JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 5, 'Tersedia'),
(260, '0513JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 5, 'Tersedia'),
(261, '0513JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 5, 'Tersedia'),
(262, '0513KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 5, 'Tersedia'),
(263, '0513KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 5, 'Tersedia'),
(264, '0513KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 5, 'Tersedia'),
(265, '0516BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 5, 'Tersedia'),
(266, '0516BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 5, 'Tersedia'),
(267, '0516BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 5, 'Tersedia'),
(268, '0516CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 5, 'Tersedia'),
(269, '0516CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 5, 'Tersedia'),
(270, '0516CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 5, 'Tersedia'),
(271, '0516JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 5, 'Tersedia'),
(272, '0516JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 5, 'Tersedia'),
(273, '0516JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 5, 'Tersedia'),
(274, '0516KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 5, 'Tersedia'),
(275, '0516KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 5, 'Tersedia'),
(276, '0516KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 5, 'Tersedia'),
(277, '0519BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 5, 'Tersedia'),
(278, '0519BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 5, 'Tersedia'),
(279, '0519BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 5, 'Tersedia'),
(280, '0519CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 5, 'Tersedia'),
(281, '0519CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 5, 'Tersedia'),
(282, '0519CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 5, 'Tersedia'),
(283, '0519JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 5, 'Tersedia'),
(284, '0519JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 5, 'Tersedia'),
(285, '0519JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 5, 'Tersedia'),
(286, '0519KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 5, 'Tersedia'),
(287, '0519KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 5, 'Tersedia'),
(288, '0519KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 5, 'Tersedia'),
(289, '0522BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 5, 'Tersedia'),
(290, '0522BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 5, 'Tersedia'),
(291, '0522BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 5, 'Tersedia'),
(292, '0522CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 5, 'Tersedia'),
(293, '0522CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 5, 'Tersedia'),
(294, '0522CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 5, 'Tersedia'),
(295, '0522JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 5, 'Tersedia'),
(296, '0522JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 5, 'Tersedia'),
(297, '0522JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 5, 'Tersedia'),
(298, '0522KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 5, 'Tersedia'),
(299, '0522KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 5, 'Tersedia'),
(300, '0522KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 5, 'Tersedia'),
(301, '0610BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 6, 'Tersedia'),
(302, '0610BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 6, 'Tersedia'),
(303, '0610BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 6, 'Tersedia'),
(304, '0610CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 6, 'Tersedia'),
(305, '0610CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 6, 'Tersedia'),
(306, '0610CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 6, 'Tersedia'),
(307, '0610JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 6, 'Tersedia'),
(308, '0610JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 6, 'Tersedia'),
(309, '0610JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 6, 'Tersedia'),
(310, '0610KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 6, 'Tersedia'),
(311, '0610KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 6, 'Tersedia'),
(312, '0610KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 6, 'Tersedia'),
(313, '0613BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 6, 'Tersedia'),
(314, '0613BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 6, 'Tersedia'),
(315, '0613BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 6, 'Tersedia'),
(316, '0613CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 6, 'Tersedia'),
(317, '0613CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 6, 'Tersedia'),
(318, '0613CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 6, 'Tersedia'),
(319, '0613JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 6, 'Tersedia'),
(320, '0613JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 6, 'Tersedia'),
(321, '0613JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 6, 'Tersedia'),
(322, '0613KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 6, 'Tersedia'),
(323, '0613KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 6, 'Tersedia'),
(324, '0613KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 6, 'Tersedia'),
(325, '0616BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 6, 'Tersedia'),
(326, '0616BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 6, 'Tersedia'),
(327, '0616BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 6, 'Tersedia'),
(328, '0616CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 6, 'Tersedia'),
(329, '0616CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 6, 'Tersedia'),
(330, '0616CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 6, 'Tersedia'),
(331, '0616JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 6, 'Tersedia'),
(332, '0616JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 6, 'Tersedia'),
(333, '0616JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 6, 'Tersedia'),
(334, '0616KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 6, 'Tersedia'),
(335, '0616KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 6, 'Tersedia'),
(336, '0616KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 6, 'Tersedia'),
(337, '0619BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 6, 'Tersedia'),
(338, '0619BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 6, 'Tersedia'),
(339, '0619BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 6, 'Tersedia'),
(340, '0619CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 6, 'Tersedia'),
(341, '0619CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 6, 'Tersedia'),
(342, '0619CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 6, 'Tersedia'),
(343, '0619JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 6, 'Tersedia'),
(344, '0619JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 6, 'Tersedia'),
(345, '0619JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 6, 'Tersedia'),
(346, '0619KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 6, 'Tersedia'),
(347, '0619KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 6, 'Tersedia'),
(348, '0619KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 6, 'Tersedia'),
(349, '0622BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 6, 'Tersedia'),
(350, '0622BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 6, 'Tersedia'),
(351, '0622BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 6, 'Tersedia'),
(352, '0622CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 6, 'Tersedia'),
(353, '0622CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 6, 'Tersedia'),
(354, '0622CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 6, 'Tersedia'),
(355, '0622JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 6, 'Tersedia'),
(356, '0622JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 6, 'Tersedia'),
(357, '0622JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 6, 'Tersedia'),
(358, '0622KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 6, 'Tersedia'),
(359, '0622KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 6, 'Tersedia'),
(360, '0622KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 6, 'Tersedia'),
(361, '0710BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 7, 'Tersedia'),
(362, '0710BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 7, 'Tidak Tersedia'),
(363, '0710BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 7, 'Tidak Tersedia'),
(364, '0710CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 7, 'Tersedia'),
(365, '0710CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 7, 'Tersedia'),
(366, '0710CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 7, 'Tersedia'),
(367, '0710JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 7, 'Tersedia'),
(368, '0710JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 7, 'Tersedia'),
(369, '0710JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 7, 'Tersedia'),
(370, '0710KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 7, 'Tersedia'),
(371, '0710KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 7, 'Tersedia'),
(372, '0710KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 7, 'Tersedia'),
(373, '0713BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 7, 'Tersedia'),
(374, '0713BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 7, 'Tersedia'),
(375, '0713BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 7, 'Tersedia'),
(376, '0713CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 7, 'Tersedia'),
(377, '0713CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 7, 'Tersedia'),
(378, '0713CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 7, 'Tersedia'),
(379, '0713JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 7, 'Tersedia'),
(380, '0713JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 7, 'Tersedia'),
(381, '0713JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 7, 'Tersedia'),
(382, '0713KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 7, 'Tersedia'),
(383, '0713KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 7, 'Tersedia'),
(384, '0713KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 7, 'Tersedia'),
(385, '0716BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 7, 'Tersedia'),
(386, '0716BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 7, 'Tersedia'),
(387, '0716BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 7, 'Tersedia'),
(388, '0716CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 7, 'Tersedia'),
(389, '0716CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 7, 'Tersedia'),
(390, '0716CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 7, 'Tersedia'),
(391, '0716JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 7, 'Tersedia'),
(392, '0716JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 7, 'Tersedia'),
(393, '0716JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 7, 'Tersedia'),
(394, '0716KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 7, 'Tersedia'),
(395, '0716KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 7, 'Tersedia'),
(396, '0716KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 7, 'Tersedia'),
(397, '0719BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 7, 'Tersedia'),
(398, '0719BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 7, 'Tersedia'),
(399, '0719BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 7, 'Tersedia'),
(400, '0719CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 7, 'Tersedia'),
(401, '0719CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 7, 'Tersedia'),
(402, '0719CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 7, 'Tersedia'),
(403, '0719JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 7, 'Tersedia'),
(404, '0719JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 7, 'Tersedia'),
(405, '0719JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 7, 'Tersedia'),
(406, '0719KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 7, 'Tersedia'),
(407, '0719KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 7, 'Tersedia'),
(408, '0719KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 7, 'Tersedia'),
(409, '0722BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 7, 'Tersedia'),
(410, '0722BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 7, 'Tersedia'),
(411, '0722BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 7, 'Tersedia'),
(412, '0722CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 7, 'Tersedia'),
(413, '0722CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 7, 'Tersedia'),
(414, '0722CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 7, 'Tersedia'),
(415, '0722JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 7, 'Tersedia'),
(416, '0722JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 7, 'Tersedia'),
(417, '0722JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 7, 'Tersedia'),
(418, '0722KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 7, 'Tersedia'),
(419, '0722KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 7, 'Tersedia'),
(420, '0722KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 7, 'Tersedia'),
(421, '0810BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 8, 'Tersedia'),
(422, '0810BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 8, 'Tersedia'),
(423, '0810BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 8, 'Tersedia'),
(424, '0810CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 8, 'Tersedia'),
(425, '0810CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 8, 'Tersedia'),
(426, '0810CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 8, 'Tersedia'),
(427, '0810JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 8, 'Tersedia'),
(428, '0810JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 8, 'Tersedia'),
(429, '0810JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 8, 'Tersedia'),
(430, '0810KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 8, 'Tersedia'),
(431, '0810KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 8, 'Tersedia'),
(432, '0810KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 8, 'Tersedia'),
(433, '0813BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 8, 'Tidak Tersedia'),
(434, '0813BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 8, 'Tersedia'),
(435, '0813BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 8, 'Tersedia'),
(436, '0813CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 8, 'Tersedia'),
(437, '0813CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 8, 'Tersedia'),
(438, '0813CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 8, 'Tersedia'),
(439, '0813JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 8, 'Tersedia'),
(440, '0813JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 8, 'Tersedia'),
(441, '0813JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 8, 'Tersedia'),
(442, '0813KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 8, 'Tersedia'),
(443, '0813KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 8, 'Tersedia'),
(444, '0813KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 8, 'Tersedia'),
(445, '0816BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 8, 'Tersedia'),
(446, '0816BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 8, 'Tersedia'),
(447, '0816BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 8, 'Tersedia'),
(448, '0816CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 8, 'Tersedia'),
(449, '0816CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 8, 'Tersedia'),
(450, '0816CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 8, 'Tersedia'),
(451, '0816JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 8, 'Tersedia'),
(452, '0816JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 8, 'Tersedia'),
(453, '0816JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 8, 'Tersedia'),
(454, '0816KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 8, 'Tersedia'),
(455, '0816KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 8, 'Tersedia'),
(456, '0816KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 8, 'Tersedia'),
(457, '0819BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 8, 'Tersedia'),
(458, '0819BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 8, 'Tersedia'),
(459, '0819BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 8, 'Tersedia'),
(460, '0819CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 8, 'Tersedia'),
(461, '0819CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 8, 'Tersedia'),
(462, '0819CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 8, 'Tersedia'),
(463, '0819JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 8, 'Tersedia'),
(464, '0819JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 8, 'Tersedia'),
(465, '0819JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 8, 'Tersedia'),
(466, '0819KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 8, 'Tersedia'),
(467, '0819KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 8, 'Tersedia'),
(468, '0819KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 8, 'Tersedia'),
(469, '0822BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 8, 'Tersedia'),
(470, '0822BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 8, 'Tersedia'),
(471, '0822BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 8, 'Tersedia'),
(472, '0822CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 8, 'Tersedia'),
(473, '0822CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 8, 'Tersedia'),
(474, '0822CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 8, 'Tersedia'),
(475, '0822JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 8, 'Tersedia'),
(476, '0822JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 8, 'Tersedia'),
(477, '0822JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 8, 'Tersedia'),
(478, '0822KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 8, 'Tersedia'),
(479, '0822KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 8, 'Tersedia'),
(480, '0822KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 8, 'Tersedia'),
(481, '0910BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 9, 'Tersedia'),
(482, '0910BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 9, 'Tersedia'),
(483, '0910BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 9, 'Tersedia'),
(484, '0910CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 9, 'Tersedia'),
(485, '0910CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 9, 'Tersedia'),
(486, '0910CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 9, 'Tersedia'),
(487, '0910JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 9, 'Tersedia'),
(488, '0910JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 9, 'Tersedia'),
(489, '0910JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 9, 'Tersedia'),
(490, '0910KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 9, 'Tersedia'),
(491, '0910KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 9, 'Tersedia'),
(492, '0910KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 9, 'Tersedia'),
(493, '0913BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 9, 'Tersedia'),
(494, '0913BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 9, 'Tersedia'),
(495, '0913BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 9, 'Tersedia'),
(496, '0913CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 9, 'Tersedia'),
(497, '0913CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 9, 'Tersedia'),
(498, '0913CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 9, 'Tersedia'),
(499, '0913JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 9, 'Tersedia'),
(500, '0913JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 9, 'Tersedia'),
(501, '0913JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 9, 'Tersedia'),
(502, '0913KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 9, 'Tersedia'),
(503, '0913KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 9, 'Tersedia'),
(504, '0913KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 9, 'Tersedia'),
(505, '0916BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 9, 'Tersedia'),
(506, '0916BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 9, 'Tersedia'),
(507, '0916BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 9, 'Tersedia'),
(508, '0916CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 9, 'Tersedia'),
(509, '0916CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 9, 'Tersedia'),
(510, '0916CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 9, 'Tersedia'),
(511, '0916JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 9, 'Tersedia'),
(512, '0916JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 9, 'Tersedia'),
(513, '0916JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 9, 'Tersedia'),
(514, '0916KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 9, 'Tersedia'),
(515, '0916KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 9, 'Tersedia'),
(516, '0916KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 9, 'Tersedia'),
(517, '0919BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 9, 'Tersedia'),
(518, '0919BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 9, 'Tersedia'),
(519, '0919BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 9, 'Tersedia'),
(520, '0919CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 9, 'Tersedia'),
(521, '0919CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 9, 'Tersedia'),
(522, '0919CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 9, 'Tersedia'),
(523, '0919JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 9, 'Tersedia'),
(524, '0919JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 9, 'Tersedia'),
(525, '0919JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 9, 'Tersedia'),
(526, '0919KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 9, 'Tersedia'),
(527, '0919KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 9, 'Tersedia'),
(528, '0919KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 9, 'Tersedia'),
(529, '0922BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 9, 'Tersedia'),
(530, '0922BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 9, 'Tersedia'),
(531, '0922BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 9, 'Tersedia'),
(532, '0922CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 9, 'Tersedia'),
(533, '0922CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 9, 'Tersedia'),
(534, '0922CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 9, 'Tersedia'),
(535, '0922JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 9, 'Tersedia'),
(536, '0922JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 9, 'Tersedia'),
(537, '0922JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 9, 'Tersedia'),
(538, '0922KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 9, 'Tersedia'),
(539, '0922KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 9, 'Tersedia'),
(540, '0922KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 9, 'Tersedia'),
(541, '1010BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 10, 'Tersedia'),
(542, '1010BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 10, 'Tersedia'),
(543, '1010BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 10, 'Tersedia'),
(544, '1010CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 10, 'Tersedia'),
(545, '1010CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 10, 'Tersedia'),
(546, '1010CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 10, 'Tersedia'),
(547, '1010JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 10, 'Tersedia'),
(548, '1010JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 10, 'Tersedia'),
(549, '1010JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 10, 'Tersedia'),
(550, '1010KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 10, 'Tersedia'),
(551, '1010KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 10, 'Tersedia'),
(552, '1010KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 10, 'Tersedia'),
(553, '1013BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 10, 'Tersedia'),
(554, '1013BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 10, 'Tersedia'),
(555, '1013BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 10, 'Tersedia'),
(556, '1013CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 10, 'Tersedia'),
(557, '1013CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 10, 'Tersedia'),
(558, '1013CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 10, 'Tersedia'),
(559, '1013JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 10, 'Tersedia'),
(560, '1013JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 10, 'Tersedia'),
(561, '1013JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 10, 'Tersedia'),
(562, '1013KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 10, 'Tersedia'),
(563, '1013KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 10, 'Tersedia'),
(564, '1013KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 10, 'Tersedia'),
(565, '1016BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 10, 'Tersedia'),
(566, '1016BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 10, 'Tersedia'),
(567, '1016BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 10, 'Tersedia'),
(568, '1016CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 10, 'Tersedia'),
(569, '1016CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 10, 'Tersedia'),
(570, '1016CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 10, 'Tersedia'),
(571, '1016JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 10, 'Tersedia'),
(572, '1016JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 10, 'Tersedia'),
(573, '1016JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 10, 'Tersedia'),
(574, '1016KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 10, 'Tersedia'),
(575, '1016KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 10, 'Tersedia'),
(576, '1016KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 10, 'Tersedia'),
(577, '1019BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 10, 'Tersedia'),
(578, '1019BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 10, 'Tersedia'),
(579, '1019BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 10, 'Tersedia'),
(580, '1019CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 10, 'Tersedia'),
(581, '1019CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 10, 'Tersedia'),
(582, '1019CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 10, 'Tersedia'),
(583, '1019JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 10, 'Tersedia'),
(584, '1019JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 10, 'Tersedia'),
(585, '1019JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 10, 'Tersedia'),
(586, '1019KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 10, 'Tersedia'),
(587, '1019KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 10, 'Tersedia'),
(588, '1019KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 10, 'Tersedia'),
(589, '1022BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 10, 'Tersedia'),
(590, '1022BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 10, 'Tersedia'),
(591, '1022BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 10, 'Tersedia'),
(592, '1022CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 10, 'Tersedia'),
(593, '1022CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 10, 'Tersedia'),
(594, '1022CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 10, 'Tersedia'),
(595, '1022JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 10, 'Tersedia'),
(596, '1022JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 10, 'Tersedia'),
(597, '1022JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 10, 'Tersedia'),
(598, '1022KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 10, 'Tersedia'),
(599, '1022KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 10, 'Tersedia'),
(600, '1022KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 10, 'Tersedia'),
(601, '1110BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 11, 'Tersedia'),
(602, '1110BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 11, 'Tersedia'),
(603, '1110BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 11, 'Tersedia'),
(604, '1110CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 11, 'Tersedia'),
(605, '1110CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 11, 'Tersedia'),
(606, '1110CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 11, 'Tersedia'),
(607, '1110JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 11, 'Tersedia'),
(608, '1110JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 11, 'Tersedia'),
(609, '1110JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 11, 'Tersedia'),
(610, '1110KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 11, 'Tersedia'),
(611, '1110KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 11, 'Tersedia'),
(612, '1110KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 11, 'Tersedia'),
(613, '1113BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 11, 'Tersedia'),
(614, '1113BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 11, 'Tersedia'),
(615, '1113BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 11, 'Tersedia'),
(616, '1113CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 11, 'Tersedia'),
(617, '1113CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 11, 'Tersedia'),
(618, '1113CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 11, 'Tersedia'),
(619, '1113JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 11, 'Tersedia'),
(620, '1113JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 11, 'Tersedia'),
(621, '1113JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 11, 'Tersedia'),
(622, '1113KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 11, 'Tersedia'),
(623, '1113KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 11, 'Tersedia'),
(624, '1113KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 11, 'Tersedia'),
(625, '1116BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 11, 'Tersedia'),
(626, '1116BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 11, 'Tersedia'),
(627, '1116BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 11, 'Tersedia'),
(628, '1116CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 11, 'Tersedia');
INSERT INTO `tiket_shuttle` (`id`, `kode_tiket`, `keberangkatan`, `tujuan`, `jadwal`, `harga`, `no_kursi`, `ketersediaan`) VALUES
(629, '1116CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 11, 'Tersedia'),
(630, '1116CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 11, 'Tersedia'),
(631, '1116JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 11, 'Tersedia'),
(632, '1116JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 11, 'Tersedia'),
(633, '1116JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 11, 'Tersedia'),
(634, '1116KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 11, 'Tersedia'),
(635, '1116KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 11, 'Tersedia'),
(636, '1116KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 11, 'Tersedia'),
(637, '1119BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 11, 'Tersedia'),
(638, '1119BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 11, 'Tersedia'),
(639, '1119BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 11, 'Tersedia'),
(640, '1119CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 11, 'Tersedia'),
(641, '1119CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 11, 'Tersedia'),
(642, '1119CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 11, 'Tersedia'),
(643, '1119JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 11, 'Tersedia'),
(644, '1119JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 11, 'Tersedia'),
(645, '1119JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 11, 'Tersedia'),
(646, '1119KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 11, 'Tersedia'),
(647, '1119KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 11, 'Tersedia'),
(648, '1119KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 11, 'Tersedia'),
(649, '1122BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 11, 'Tersedia'),
(650, '1122BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 11, 'Tersedia'),
(651, '1122BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 11, 'Tersedia'),
(652, '1122CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 11, 'Tersedia'),
(653, '1122CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 11, 'Tersedia'),
(654, '1122CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 11, 'Tersedia'),
(655, '1122JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 11, 'Tersedia'),
(656, '1122JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 11, 'Tersedia'),
(657, '1122JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 11, 'Tersedia'),
(658, '1122KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 11, 'Tersedia'),
(659, '1122KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 11, 'Tersedia'),
(660, '1122KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 11, 'Tersedia'),
(661, '1210BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 12, 'Tersedia'),
(662, '1210BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 12, 'Tersedia'),
(663, '1210BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 12, 'Tersedia'),
(664, '1210CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 12, 'Tersedia'),
(665, '1210CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 12, 'Tersedia'),
(666, '1210CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 12, 'Tersedia'),
(667, '1210JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 12, 'Tersedia'),
(668, '1210JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 12, 'Tersedia'),
(669, '1210JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 12, 'Tersedia'),
(670, '1210KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 12, 'Tersedia'),
(671, '1210KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 12, 'Tersedia'),
(672, '1210KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 12, 'Tersedia'),
(673, '1213BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 12, 'Tersedia'),
(674, '1213BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 12, 'Tersedia'),
(675, '1213BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 12, 'Tersedia'),
(676, '1213CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 12, 'Tersedia'),
(677, '1213CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 12, 'Tersedia'),
(678, '1213CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 12, 'Tersedia'),
(679, '1213JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 12, 'Tersedia'),
(680, '1213JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 12, 'Tersedia'),
(681, '1213JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 12, 'Tersedia'),
(682, '1213KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 12, 'Tersedia'),
(683, '1213KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 12, 'Tersedia'),
(684, '1213KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 12, 'Tersedia'),
(685, '1216BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 12, 'Tersedia'),
(686, '1216BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 12, 'Tersedia'),
(687, '1216BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 12, 'Tersedia'),
(688, '1216CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 12, 'Tersedia'),
(689, '1216CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 12, 'Tersedia'),
(690, '1216CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 12, 'Tersedia'),
(691, '1216JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 12, 'Tersedia'),
(692, '1216JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 12, 'Tersedia'),
(693, '1216JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 12, 'Tersedia'),
(694, '1216KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 12, 'Tersedia'),
(695, '1216KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 12, 'Tersedia'),
(696, '1216KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 12, 'Tersedia'),
(697, '1219BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 12, 'Tersedia'),
(698, '1219BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 12, 'Tersedia'),
(699, '1219BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 12, 'Tersedia'),
(700, '1219CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 12, 'Tersedia'),
(701, '1219CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 12, 'Tersedia'),
(702, '1219CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 12, 'Tersedia'),
(703, '1219JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 12, 'Tersedia'),
(704, '1219JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 12, 'Tersedia'),
(705, '1219JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 12, 'Tersedia'),
(706, '1219KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 12, 'Tersedia'),
(707, '1219KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 12, 'Tersedia'),
(708, '1219KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 12, 'Tersedia'),
(709, '1222BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 12, 'Tersedia'),
(710, '1222BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 12, 'Tersedia'),
(711, '1222BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 12, 'Tersedia'),
(712, '1222CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 12, 'Tersedia'),
(713, '1222CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 12, 'Tersedia'),
(714, '1222CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 12, 'Tersedia'),
(715, '1222JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 12, 'Tersedia'),
(716, '1222JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 12, 'Tersedia'),
(717, '1222JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 12, 'Tersedia'),
(718, '1222KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 12, 'Tersedia'),
(719, '1222KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 12, 'Tersedia'),
(720, '1222KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 12, 'Tersedia'),
(721, '1310BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 13, 'Tersedia'),
(722, '1310BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 13, 'Tersedia'),
(723, '1310BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 13, 'Tersedia'),
(724, '1310CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 13, 'Tersedia'),
(725, '1310CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 13, 'Tersedia'),
(726, '1310CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 13, 'Tersedia'),
(727, '1310JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 13, 'Tersedia'),
(728, '1310JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 13, 'Tersedia'),
(729, '1310JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 13, 'Tersedia'),
(730, '1310KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 13, 'Tersedia'),
(731, '1310KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 13, 'Tersedia'),
(732, '1310KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 13, 'Tersedia'),
(733, '1313BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 13, 'Tersedia'),
(734, '1313BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 13, 'Tersedia'),
(735, '1313BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 13, 'Tersedia'),
(736, '1313CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 13, 'Tersedia'),
(737, '1313CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 13, 'Tersedia'),
(738, '1313CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 13, 'Tersedia'),
(739, '1313JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 13, 'Tersedia'),
(740, '1313JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 13, 'Tersedia'),
(741, '1313JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 13, 'Tersedia'),
(742, '1313KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 13, 'Tersedia'),
(743, '1313KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 13, 'Tersedia'),
(744, '1313KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 13, 'Tersedia'),
(745, '1316BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 13, 'Tersedia'),
(746, '1316BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 13, 'Tersedia'),
(747, '1316BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 13, 'Tersedia'),
(748, '1316CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 13, 'Tersedia'),
(749, '1316CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 13, 'Tersedia'),
(750, '1316CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 13, 'Tersedia'),
(751, '1316JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 13, 'Tersedia'),
(752, '1316JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 13, 'Tersedia'),
(753, '1316JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 13, 'Tersedia'),
(754, '1316KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 13, 'Tersedia'),
(755, '1316KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 13, 'Tersedia'),
(756, '1316KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 13, 'Tersedia'),
(757, '1319BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 13, 'Tersedia'),
(758, '1319BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 13, 'Tersedia'),
(759, '1319BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 13, 'Tersedia'),
(760, '1319CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 13, 'Tersedia'),
(761, '1319CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 13, 'Tersedia'),
(762, '1319CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 13, 'Tersedia'),
(763, '1319JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 13, 'Tersedia'),
(764, '1319JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 13, 'Tersedia'),
(765, '1319JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 13, 'Tersedia'),
(766, '1319KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 13, 'Tersedia'),
(767, '1319KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 13, 'Tersedia'),
(768, '1319KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 13, 'Tersedia'),
(769, '1322BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 13, 'Tersedia'),
(770, '1322BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 13, 'Tersedia'),
(771, '1322BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 13, 'Tersedia'),
(772, '1322CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 13, 'Tersedia'),
(773, '1322CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 13, 'Tersedia'),
(774, '1322CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 13, 'Tersedia'),
(775, '1322JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 13, 'Tersedia'),
(776, '1322JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 13, 'Tersedia'),
(777, '1322JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 13, 'Tersedia'),
(778, '1322KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 13, 'Tersedia'),
(779, '1322KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 13, 'Tersedia'),
(780, '1322KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 13, 'Tersedia'),
(781, '1410BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 14, 'Tersedia'),
(782, '1410BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 14, 'Tersedia'),
(783, '1410BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 14, 'Tersedia'),
(784, '1410CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 14, 'Tersedia'),
(785, '1410CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 14, 'Tersedia'),
(786, '1410CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 14, 'Tersedia'),
(787, '1410JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 14, 'Tersedia'),
(788, '1410JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 14, 'Tersedia'),
(789, '1410JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 14, 'Tersedia'),
(790, '1410KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 14, 'Tersedia'),
(791, '1410KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 14, 'Tersedia'),
(792, '1410KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 14, 'Tersedia'),
(793, '1413BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 14, 'Tersedia'),
(794, '1413BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 14, 'Tersedia'),
(795, '1413BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 14, 'Tersedia'),
(796, '1413CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 14, 'Tersedia'),
(797, '1413CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 14, 'Tersedia'),
(798, '1413CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 14, 'Tersedia'),
(799, '1413JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 14, 'Tersedia'),
(800, '1413JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 14, 'Tersedia'),
(801, '1413JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 14, 'Tersedia'),
(802, '1413KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 14, 'Tersedia'),
(803, '1413KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 14, 'Tersedia'),
(804, '1413KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 14, 'Tersedia'),
(805, '1416BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 14, 'Tersedia'),
(806, '1416BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 14, 'Tersedia'),
(807, '1416BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 14, 'Tersedia'),
(808, '1416CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 14, 'Tersedia'),
(809, '1416CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 14, 'Tersedia'),
(810, '1416CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 14, 'Tersedia'),
(811, '1416JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 14, 'Tersedia'),
(812, '1416JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 14, 'Tersedia'),
(813, '1416JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 14, 'Tersedia'),
(814, '1416KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 14, 'Tersedia'),
(815, '1416KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 14, 'Tersedia'),
(816, '1416KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 14, 'Tersedia'),
(817, '1419BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 14, 'Tersedia'),
(818, '1419BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 14, 'Tersedia'),
(819, '1419BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 14, 'Tersedia'),
(820, '1419CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 14, 'Tersedia'),
(821, '1419CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 14, 'Tersedia'),
(822, '1419CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 14, 'Tersedia'),
(823, '1419JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 14, 'Tersedia'),
(824, '1419JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 14, 'Tersedia'),
(825, '1419JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 14, 'Tersedia'),
(826, '1419KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 14, 'Tersedia'),
(827, '1419KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 14, 'Tersedia'),
(828, '1419KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 14, 'Tersedia'),
(829, '1422BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 14, 'Tersedia'),
(830, '1422BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 14, 'Tersedia'),
(831, '1422BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 14, 'Tersedia'),
(832, '1422CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 14, 'Tersedia'),
(833, '1422CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 14, 'Tersedia'),
(834, '1422CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 14, 'Tersedia'),
(835, '1422JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 14, 'Tersedia'),
(836, '1422JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 14, 'Tersedia'),
(837, '1422JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 14, 'Tersedia'),
(838, '1422KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 14, 'Tersedia'),
(839, '1422KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 14, 'Tersedia'),
(840, '1422KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 14, 'Tersedia'),
(841, '1510BDGCRB', 'Bandung', 'Cirebon', '10:00:00', 110000.00, 15, 'Tersedia'),
(842, '1510BDGJKT', 'Bandung', 'Jakarta', '10:00:00', 115000.00, 15, 'Tersedia'),
(843, '1510BDGKRW', 'Bandung', 'Karawang', '10:00:00', 120000.00, 15, 'Tersedia'),
(844, '1510CRBBDG', 'Cirebon', 'Bandung', '10:00:00', 110000.00, 15, 'Tersedia'),
(845, '1510CRBJKT', 'Cirebon', 'Jakarta', '10:00:00', 130000.00, 15, 'Tersedia'),
(846, '1510CRBKRW', 'Cirebon', 'Karawang', '10:00:00', 80000.00, 15, 'Tersedia'),
(847, '1510JKTBDG', 'Jakarta', 'Bandung', '10:00:00', 115000.00, 15, 'Tersedia'),
(848, '1510JKTCRB', 'Jakarta', 'Cirebon', '10:00:00', 130000.00, 15, 'Tersedia'),
(849, '1510JKTKRW', 'Jakarta', 'Karawang', '10:00:00', 120000.00, 15, 'Tersedia'),
(850, '1510KRWBDG', 'Karawang', 'Bandung', '10:00:00', 120000.00, 15, 'Tersedia'),
(851, '1510KRWCRB', 'Karawang', 'Cirebon', '10:00:00', 80000.00, 15, 'Tersedia'),
(852, '1510KRWJKT', 'Karawang', 'Jakarta', '10:00:00', 120000.00, 15, 'Tersedia'),
(853, '1513BDGCRB', 'Bandung', 'Cirebon', '13:00:00', 110000.00, 15, 'Tersedia'),
(854, '1513BDGJKT', 'Bandung', 'Jakarta', '13:00:00', 115000.00, 15, 'Tersedia'),
(855, '1513BDGKRW', 'Bandung', 'Karawang', '13:00:00', 120000.00, 15, 'Tersedia'),
(856, '1513CRBBDG', 'Cirebon', 'Bandung', '13:00:00', 110000.00, 15, 'Tersedia'),
(857, '1513CRBJKT', 'Cirebon', 'Jakarta', '13:00:00', 130000.00, 15, 'Tersedia'),
(858, '1513CRBKRW', 'Cirebon', 'Karawang', '13:00:00', 80000.00, 15, 'Tersedia'),
(859, '1513JKTBDG', 'Jakarta', 'Bandung', '13:00:00', 115000.00, 15, 'Tersedia'),
(860, '1513JKTCRB', 'Jakarta', 'Cirebon', '13:00:00', 130000.00, 15, 'Tersedia'),
(861, '1513JKTKRW', 'Jakarta', 'Karawang', '13:00:00', 120000.00, 15, 'Tersedia'),
(862, '1513KRWBDG', 'Karawang', 'Bandung', '13:00:00', 120000.00, 15, 'Tersedia'),
(863, '1513KRWCRB', 'Karawang', 'Cirebon', '13:00:00', 80000.00, 15, 'Tersedia'),
(864, '1513KRWJKT', 'Karawang', 'Jakarta', '13:00:00', 120000.00, 15, 'Tersedia'),
(865, '1516BDGCRB', 'Bandung', 'Cirebon', '16:00:00', 110000.00, 15, 'Tersedia'),
(866, '1516BDGJKT', 'Bandung', 'Jakarta', '16:00:00', 115000.00, 15, 'Tersedia'),
(867, '1516BDGKRW', 'Bandung', 'Karawang', '16:00:00', 120000.00, 15, 'Tersedia'),
(868, '1516CRBBDG', 'Cirebon', 'Bandung', '16:00:00', 110000.00, 15, 'Tersedia'),
(869, '1516CRBJKT', 'Cirebon', 'Jakarta', '16:00:00', 130000.00, 15, 'Tersedia'),
(870, '1516CRBKRW', 'Cirebon', 'Karawang', '16:00:00', 80000.00, 15, 'Tersedia'),
(871, '1516JKTBDG', 'Jakarta', 'Bandung', '16:00:00', 115000.00, 15, 'Tersedia'),
(872, '1516JKTCRB', 'Jakarta', 'Cirebon', '16:00:00', 130000.00, 15, 'Tersedia'),
(873, '1516JKTKRW', 'Jakarta', 'Karawang', '16:00:00', 120000.00, 15, 'Tersedia'),
(874, '1516KRWBDG', 'Karawang', 'Bandung', '16:00:00', 120000.00, 15, 'Tersedia'),
(875, '1516KRWCRB', 'Karawang', 'Cirebon', '16:00:00', 80000.00, 15, 'Tersedia'),
(876, '1516KRWJKT', 'Karawang', 'Jakarta', '16:00:00', 120000.00, 15, 'Tersedia'),
(877, '1519BDGCRB', 'Bandung', 'Cirebon', '19:00:00', 110000.00, 15, 'Tersedia'),
(878, '1519BDGJKT', 'Bandung', 'Jakarta', '19:00:00', 115000.00, 15, 'Tersedia'),
(879, '1519BDGKRW', 'Bandung', 'Karawang', '19:00:00', 120000.00, 15, 'Tersedia'),
(880, '1519CRBBDG', 'Cirebon', 'Bandung', '19:00:00', 110000.00, 15, 'Tersedia'),
(881, '1519CRBJKT', 'Cirebon', 'Jakarta', '19:00:00', 130000.00, 15, 'Tersedia'),
(882, '1519CRBKRW', 'Cirebon', 'Karawang', '19:00:00', 80000.00, 15, 'Tersedia'),
(883, '1519JKTBDG', 'Jakarta', 'Bandung', '19:00:00', 115000.00, 15, 'Tersedia'),
(884, '1519JKTCRB', 'Jakarta', 'Cirebon', '19:00:00', 130000.00, 15, 'Tersedia'),
(885, '1519JKTKRW', 'Jakarta', 'Karawang', '19:00:00', 120000.00, 15, 'Tersedia'),
(886, '1519KRWBDG', 'Karawang', 'Bandung', '19:00:00', 120000.00, 15, 'Tersedia'),
(887, '1519KRWCRB', 'Karawang', 'Cirebon', '19:00:00', 80000.00, 15, 'Tersedia'),
(888, '1519KRWJKT', 'Karawang', 'Jakarta', '19:00:00', 120000.00, 15, 'Tersedia'),
(889, '1522BDGCRB', 'Bandung', 'Cirebon', '22:00:00', 110000.00, 15, 'Tersedia'),
(890, '1522BDGJKT', 'Bandung', 'Jakarta', '22:00:00', 115000.00, 15, 'Tersedia'),
(891, '1522BDGKRW', 'Bandung', 'Karawang', '22:00:00', 120000.00, 15, 'Tersedia'),
(892, '1522CRBBDG', 'Cirebon', 'Bandung', '22:00:00', 110000.00, 15, 'Tersedia'),
(893, '1522CRBJKT', 'Cirebon', 'Jakarta', '22:00:00', 130000.00, 15, 'Tersedia'),
(894, '1522CRBKRW', 'Cirebon', 'Karawang', '22:00:00', 80000.00, 15, 'Tersedia'),
(895, '1522JKTBDG', 'Jakarta', 'Bandung', '22:00:00', 115000.00, 15, 'Tersedia'),
(896, '1522JKTCRB', 'Jakarta', 'Cirebon', '22:00:00', 130000.00, 15, 'Tersedia'),
(897, '1522JKTKRW', 'Jakarta', 'Karawang', '22:00:00', 120000.00, 15, 'Tersedia'),
(898, '1522KRWBDG', 'Karawang', 'Bandung', '22:00:00', 120000.00, 15, 'Tersedia'),
(899, '1522KRWCRB', 'Karawang', 'Cirebon', '22:00:00', 80000.00, 15, 'Tersedia'),
(900, '1522KRWJKT', 'Karawang', 'Jakarta', '22:00:00', 120000.00, 15, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_bayar` varchar(255) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total_harga` float(14,2) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_bayar`, `id_kasir`, `id_produk`, `jumlah`, `sub_total_harga`, `waktu_transaksi`, `catatan`) VALUES
(1, '31F04B32F18F8F4E195C', 1, 1, 9, 441000.00, '2021-04-02 21:48:58', 'customer bayar Via Transfer'),
(2, 'E24CA8BEEB50CF69E235', 1, 1, 9, 441000.00, '2021-04-02 21:50:07', ''),
(3, '2CCCF469437491BB5CD5', 1, 1, 9, 441000.00, '2021-04-02 22:21:41', ''),
(4, '09D9F1E646174E1C3FDD', 1, 1, 9, 441000.00, '2021-04-02 22:26:59', ''),
(5, 'FA4DD4B82BF197D27A96', 1, 1, 9, 441000.00, '2021-04-02 22:27:53', ''),
(6, 'FA4DD4B82BF197D27A96', 1, 10, 1, 60000.00, '2021-04-02 22:27:53', ''),
(7, 'FA4DD4B82BF197D27A96', 1, 2, 1, 60000.00, '2021-04-02 22:27:53', ''),
(8, '7C93EF0F5B0C7D03E361', 1, 1, 4, 48000.00, '2021-04-04 12:14:26', ''),
(9, '7C93EF0F5B0C7D03E361', 1, 2, 2, 120000.00, '2021-04-04 12:14:26', ''),
(10, '856ADBFA1B7C16C4AF16', 1, 1, 3, 36000.00, '2021-04-04 12:15:54', 'dia bayar VIA transfer'),
(11, '856ADBFA1B7C16C4AF16', 1, 8, 1, 60000.00, '2021-04-04 12:15:54', 'dia bayar VIA transfer'),
(12, '99FCB9E710E3ECF6C95D', 1, 1, 3, 36000.00, '2021-04-04 12:22:06', 'oke'),
(13, '99FCB9E710E3ECF6C95D', 1, 6, 1, 60000.00, '2021-04-04 12:22:06', 'oke'),
(14, '0BFE813D64AAA2FDD025', 1, 1, 1, 12000.00, '2021-04-06 13:11:17', ''),
(15, '0BFE813D64AAA2FDD025', 1, 2, 5, 300000.00, '2021-04-06 13:11:17', ''),
(16, '39ED0827B3F297BE64B7', 4, 13, 3, 54000.00, '2021-04-06 13:17:47', ''),
(17, '39ED0827B3F297BE64B7', 4, 1, 1, 12000.00, '2021-04-06 13:17:47', ''),
(18, '7E5519640D652D08677F', 1, 1, 3, 36000.00, '2021-04-06 13:23:32', 'makasih'),
(19, '7E5519640D652D08677F', 1, 3, 2, 120000.00, '2021-04-06 13:23:32', 'makasih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `place_of_birth` varchar(128) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `gender`, `place_of_birth`, `birthday`, `phone_number`, `address`, `religion_id`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Muhammad Haitsam', 'haitsam03@gmail.com', 'Laki-laki', 'Madinah', '1999-02-18', '082117503126', 'Jl. Raya Cilamaya, Dusun Kedung Asem, Desa Mekarmaya, Kec. Cilamaya Wetan, Kab. Karawang - Prov. Jawa barat', 1, 'foto3.jpg', '$2y$10$nnK8yYq.2uviklFEBWaXJeYNiUqry476AnbQDAmTo6PoNtKWJGnSK', 0, 1, 1609656473),
(2, 'Muhammad Ashraf Hidayat', 'ashrafmuhammad@gmail.com', 'Laki-laki', 'Makasar', '1999-09-28', '085157464675', 'Makassar', 1, 'default.svg', '$2y$10$54Ajl0R.ArBF45hyXCsJZOnTdLzoegtv9nJbBRs3ICk1QBv1kS5yW', 1, 1, 1614472317),
(3, 'Delvira Nur Zahrah', 'delvira.nz1@gmail.com', 'Perempuan', 'Makasar', '2001-11-26', '082169006807', 'Makassar', 2, 'default.svg', '$2y$10$DCdpAINyOx1J.gReZF1AwOvyvGSSClU9MBoRRB/WAwOtYav0bmKRS', 0, 1, 1609656737),
(4, 'Muhammad Haitsam', 'haitsam18@gmail.com', 'Laki-laki', 'Madinah', '1999-02-18', '089118202112', 'Bandung', 1, 'default.svg', '$2y$10$RASDMGP8TcfHP/Zy7mhOwewNjHX9jGP2kfKxrc.vNAElD9Pb503pe', 3, 1, 1609925711),
(5, 'Rini Sarlita', 'riniastkepsarlita@gmail.com', 'Perempuan', 'Duri', '2002-03-25', '087892990435', 'jl.sultan syarif kasim ,gg.panglima\r\nKota Duri, Kab. bengkalis Prov. Riau\r\nKode pos : 28784', 1, 'default.jpg', '$2y$10$.ixo7mdt30yfQNM2rpo3pOMyYgYV4MzqdX0m.4LqjXaAEFv.mgqk6', 4, 1, 1609925711),
(6, 'Olga Paurenta Simanihuruk', 'olgapaurenta11@gmail.com', 'Perempuan', 'Medan', '2000-11-26', '082169006807', 'Jl Jahe 13 No 3 Simalingkar, Kelurahan Mangga, Kecamatan Medan Tuntungan, Kota Medan  Kode Pos 20141', 1, 'default.svg', '$2y$10$DLCp6ce7jyHem7q/eNcPbOeYeuU8dp3kwtgZ5lz3aVsDaIJsgjPHu', 2, 1, 1609657135),
(23, 'Muhammad Haitsam', 'mhaitsam18@gmail.com', 'Laki-laki', 'Madinah', '1999-02-18', '082117503125', 'Cilamaya', 1, 'default.svg', '$2y$10$Ms6HpVL1y4abQ8qRiJJ8Zu.g6t7CHR0jslBLsSgTPOZZWltpxbmLG', 1, 1, 1622204631),
(24, 'Akib Dahlan', 'akibdahlan20@gmail.com', 'Laki-laki', 'Palembang', '2000-02-20', '082289412433', 'Jl. Simanimunkarnakir', 1, 'default.svg', '$2y$10$RdSah5UaDgp92LoRIbdzluphdn.E88u64bFhEnuoJrzRgpv4cRyGu', 2, 1, 1624678095);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 2, 2),
(4, 0, 3),
(5, 0, 5),
(6, 0, 6),
(7, 0, 8),
(8, 0, 14),
(9, 0, 15),
(10, 2, 8),
(11, 2, 15),
(12, 3, 2),
(13, 3, 6),
(14, 3, 15),
(15, 0, 4),
(16, 0, 7),
(17, 0, 9),
(18, 0, 10),
(19, 2, 9),
(20, 0, 11),
(21, 0, 12),
(22, 0, 13),
(23, 1, 2),
(24, 1, 3),
(25, 1, 1),
(26, 1, 4),
(27, 1, 5),
(28, 1, 6),
(29, 1, 7),
(30, 1, 10),
(31, 1, 12),
(32, 1, 11),
(33, 1, 14),
(34, 1, 15),
(35, 4, 2),
(36, 4, 13),
(40, 4, 15),
(43, 3, 10),
(44, 3, 4),
(45, 3, 12),
(46, 3, 5),
(47, 3, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `active`) VALUES
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Menu', 1),
(4, 'Wisata', 1),
(5, 'Produk', 1),
(6, 'Transaksi', 1),
(7, 'Konten', 1),
(8, 'Member', 1),
(9, 'Kelengkapan', 1),
(10, 'Kelengkapan Jamaah', 1),
(11, 'Jamaah', 0),
(12, 'Shuttle', 1),
(13, 'Agen', 1),
(14, 'DataMaster', 1),
(15, 'Lainnya', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(0, 'Developer'),
(1, 'administrator'),
(2, 'member'),
(3, 'petugas'),
(4, 'Agen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user/', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu/', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role Management', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
(8, 1, 'Data User', 'admin/dataUser/', 'fas fa-fw fa-user-tie', 1),
(9, 5, 'Beranda', 'produk/', 'fas fa-fw fa-home', 0),
(10, 14, 'Data Master', 'DataMaster/', 'fas fa-fw fa-database', 1),
(11, 6, 'Pemesanan', 'Transaksi/', 'fas fa-fw fa-handshake', 1),
(12, 6, 'Pemesanan Online', 'Transaksi/online', 'fas fa-fw fa-shopping-bag', 1),
(13, 6, 'Pemesanan Offline', 'Transaksi/offline', 'fas fa-fw fa-shopping-cart', 1),
(14, 6, 'Pembayaran Online', 'Transaksi/pembayaranOnline/', 'fas fa-fw fa-money-bill-wave', 1),
(15, 8, 'Beranda', 'Member/', 'fas fa-fw fa-home', 1),
(16, 5, 'Data Produk', 'Produk/produk', 'fab fa-fw fa-product-hunt', 1),
(17, 8, 'Souvenir', 'Member/produkHaifa', 'fas fa-fw fa-fish', 1),
(18, 8, 'Keranjang', 'Member/keranjang', 'fas fa-fw fa-shopping-cart', 1),
(19, 8, 'Pesanan Saya', 'Member/pesanan', 'fas fa-fw fa-shopping-basket', 1),
(20, 8, 'Pembayaran Produk', 'Member/pembayaran', 'fab fa-fw fa-shopify', 1),
(21, 5, 'Pasokan', 'produk/pasokan', 'fas fa-fw fa-store', 1),
(22, 14, 'Data Agama', 'DataMaster/agama/', 'fas fa-fw fa-pray', 1),
(23, 14, 'Data Dashboard', 'DataMaster/dashboard/', 'fas fa-fw fa-edit', 1),
(24, 14, 'Data Konten', 'DataMaster/konten', 'far fa-fw fa-newspaper', 1),
(25, 15, 'Tentang Aplikasi', 'Lainnya/tentang', 'fas fa-fw fa-address-card', 1),
(26, 15, 'Pengaturan', 'Lainnya/pengaturan', 'fas fa-fw fa-wrench', 1),
(27, 15, 'Hubungi Kami', 'Lainnya/hubungi', 'fas fa-fw fa-address-book', 1),
(28, 15, 'Bantuan', 'Lainnya/bantuan', 'far fa-fw fa-question-circle', 1),
(29, 15, 'FAQ', 'Lainnya/faq', 'fas fa-fw fa-question', 1),
(30, 14, 'Data Kategori', 'DataMaster/kategori', 'fas fa-fw fa-bars', 1),
(31, 14, 'Data Kurir', 'DataMaster/kurir', 'fas fa-fw fa-shipping-fast', 1),
(32, 8, 'Riwayat Pembayaran', 'Member/riwayatPembayaran/', 'fas fa-fw fa-history', 1),
(33, 14, 'Data Metode Bayar', 'DataMaster/metodeBayar', 'fas fa-fw fa-money-check', 1),
(34, 14, 'Data Rekening', 'DataMaster/rekening', 'fas fa-fw fa-file-invoice-dollar', 1),
(35, 5, 'Laporan Penjualan', 'Produk/laporan', 'fas fa-fw fa-hand-holding-usd', 1),
(36, 5, 'Laba dan Rugi', 'Produk/labaRugi', 'fas fa-fw fa-cash-register', 1),
(37, 14, 'Data Maskapai', 'DataMaster/maskapai', 'fas fa-fw fa-plane', 1),
(38, 7, 'Pengumuman', 'Konten/pengumuman', 'fas fa-fw fa-bullhorn', 1),
(39, 7, 'Berita', 'Konten/berita', 'fas fa-fw fa-newspaper', 1),
(40, 7, 'Peraturan', 'Konten/peraturan', 'fas fa-fw fa-ruler', 1),
(41, 4, 'Beranda', 'Wisata/', 'fas fa-fw fa-kaaba', 0),
(42, 4, 'Data Paket Wisata', 'Wisata/paketWisata', 'fas fa-fw fa-globe-asia', 1),
(43, 4, 'Data Jama\'ah', 'Wisata/jamaah', 'fas fa-fw fa-star-and-crescent', 1),
(44, 7, 'Struktur Organisasi', 'Konten/strukturOrganisasi', 'fas fa-fw fa-sitemap', 1),
(45, 8, 'Umroh dan Haji', 'Member/umrohHaji', 'fas fa-fw fa-kaaba', 1),
(46, 14, 'Data Kategori Wisata', 'DataMaster/kategoriWisata', 'fas fa-fw fa-road', 1),
(47, 14, 'Data Kelengkapan', 'DataMaster/kelengkapan', 'fas fa-fw fa-toolbox', 1),
(48, 8, 'Shuttle', 'Member/shuttle', 'fas fa-fw fa-shuttle-van', 1),
(49, 9, 'Kelengkapan', 'Kelengkapan', 'fas fa-fw fa-suitcase', 1),
(50, 9, 'Upload Berkas', 'Kelengkapan/berkasLunak', 'fas fa-fw fa-file', 1),
(51, 9, 'Persyaratan', 'Kelengkapan/persyaratan', 'fas fa-fw fa-file-alt', 1),
(52, 9, 'Kelengkapan Fasilitas', 'Kelengkapan/kelengkapan', 'fas fa-fw fa-luggage-cart', 1),
(53, 10, 'Kelengkapan Jama\'ah', 'kelengkapanJamaah/', 'fas fa-fw fa-shopping-bag', 1),
(54, 10, 'Berkas Jama\'ah', 'kelengkapanJamaah/berkas', 'fas fa-fw fa-briefcase', 1),
(55, 10, 'Persyaratan Jama\'ah', 'kelengkapanJamaah/persyaratan', 'far fa-fw fa-file', 1),
(56, 10, 'Data Terima Fasilitas', 'kelengkapanJamaah/kelengkapan', 'fas fa-fw fa-suitcase-rolling', 1),
(57, 8, 'Pembayaran Paket Wisata', 'Member/pembayaranPaket', 'fas fa-fw fa-file-invoice-dollar', 1),
(58, 4, 'Pembayaran Paket', 'Transaksi/pembayaranPaket', 'fas fa-fw fa-cash-register', 1),
(59, 12, 'Data Tiket Shuttle', 'Shuttle', 'fas fa-fw fa-ticket-alt', 1),
(60, 12, 'Data Booking', 'Shuttle/dataBooking', 'fas fa-fw fa-book', 1),
(61, 1, 'Log Aktivitas', 'Admin/logAktivitas', 'fas fa-fw fa-clipboard-list', 1),
(62, 1, 'Keluhan dan Aspirasi', 'admin/pesan', 'fas fa-fw fa-envelope', 1),
(63, 13, 'Modul Peragenan', 'Agen/', 'fas fa-fw fa-users', 1),
(64, 13, 'Data Agen', 'Agen/agen', 'fas fa-fw fa-user-secret', 1),
(65, 4, 'Fasilitas', 'Wisata/fasilitas', 'fas fa-fw fa-boxes', 1),
(66, 3, 'Haifa Menu Management', 'menu/HaifaMenu', 'fas fa-fw fa-folder', 1),
(67, 3, 'Haifa Submenu Management', 'menu/HaifaSubmenu', 'fas fa-fw fa-folder-open', 1),
(68, 7, 'Blog', 'Konten/blog', 'fas fa-fw fa-blog', 1),
(69, 7, 'Profil Haifa', 'Konten/haifa', 'fas fa-fw fa-globe-asia', 1),
(70, 7, 'Kontak Person', 'Konten/kontak', 'far fa-fw fa-address-book', 1),
(71, 14, 'Data Destinasi', 'DataMaster/destinasi', 'fas fa-fw fa-map-marker-alt', 1),
(72, 2, 'Security', 'User/keamanan', 'fas fa-fw fa-user-shield', 1),
(73, 14, 'Data Pertanyaan', 'DataMaster/pertanyaan', 'fas fa-fw fa-question', 1),
(75, 14, 'Data Kantor', 'DataMaster/kantor', 'fas fa-fw fa-building', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'haitsam03@gmail.com', 'iscmRCWne+lTCfqz/25n5R8VUX5MUkaN02Bhum3gVsU=', 1609930420),
(5, 'haitsam03@gmail.com', 'n5QKD1D9vUL9QiROw9MO4pgD/fbbdFGYrGd8znIJWe4=', 1609932048),
(6, 'haitsam03@gmail.com', 'wPG+3htmGqTKAArzVlpS/b0eoqor9TKqG16H5cDvMqA=', 1609932054),
(7, 'aa@aa.a', 'oIK0LUztcU02aYAE6HG86eh7Fq5/TcK17wF7B/To+/k=', 1609941391),
(8, 'wahyuhidayat@gmail.com', 'h5OYZb29deEXYS/1Bc69GOaWseVwGEhhSXVKert9Oog=', 1610019862),
(9, 'pramuko@gmail.com', 'ijlFNaUwBrUcqEbANwlEml1FluVkgWAOvEPf3VtE9H4=', 1610019892),
(10, 'elyrosely@gmail.com', 'zLt8OC5aT9LrQaCipRl09/n95aUTUUjwCiVtKM150uA=', 1610019940),
(11, 'inne@gmail.com', '6kl2FFh6027PAQ51K03uIlFz8f3+e59snpxLo3jAOBE=', 1610019985),
(12, 'wawa@gmail.com', '/g7m4I60ysY6Ljs6xsHhye5zWPyA0eR/4qwv7r7czlo=', 1610020015),
(13, 'fasaldo1999@gmail.com', 'fOSWX9UdFnoi7ejSOIkhye7te1tVdT+cXmd1hh0YZCQ=', 1610023446),
(15, 'muhammadbarja@gmail.com', 'VpatS/tgTK/bfTZLlDDoVX9aaD6Kb3YoeS2/ozJOhXI=', 1610280453),
(16, 'januarizqi5@gmail.com', '8QKHOpK1ROQrW679QbREt1fb2wdgcsffl5PLahNGPws=', 1610507816),
(17, 'suryatiningsih@gmail.com', 'IvVR3KjJpnh+lnQgeWOmpht3w235j9Vax2GkkDCzUBE=', 1610509684),
(18, 'ersanum@gmail.com', 'Tst2ygGt8n2wUa+RsqvtHguZMn1KPTaiNE63D4wwehQ=', 1610529882),
(19, 'haitsamhaitsam18@yahoo.com', '06vONmPAIi0hj/xgLH72Ck6FSDDyqs96P9pxA5bOU54=', 1610556667),
(20, 'shibghotul7@gmail.com', 'zLT3U4RCMM6pc1pVBCI3SodKzlAVJmG13PbfY8ijFnU=', 1610556792),
(21, 'haitsam03@gmail.com', 'oVyGSYjGv4lTvFvUKawPJ96cj42FYlkQW8QcyPDghSQ=', 1611588824),
(22, 'akibdahlan20@gmail.com', 'Q5sF4roomYzNnHkIS0zKCHKteza6KwrK5GYaHqlJr8w=', 1614472096),
(23, 'akibdahlan21@gmail.com', 'M23yBdkPPwctLera1YG1Eccpx5PFhn1vNyKEeEqVpT0=', 1614472317),
(24, 'haitsam03@gmail.com', 'IZNgjYH+gDZzPGjm0p+0dwp48uMVQ8Gm0FeBExsDdEk=', 1620100892),
(25, 'haitsam03@gmail.com', '7tCBgAhyYAn2KCahAx5TeFI7MKp7oCqdWUuP+f9TJ04=', 1621749968),
(27, 'haitsam03@gmail.com', 'hlfzH4CQ4nOICD7EGP/omm3RJtcigolmh4GlaNrQ0qY=', 1622204783),
(28, 'akibdahlan20@gmail.com', 'vvcPf8SefuWpW92xPlmKFMTJDn2Es/sIJQRT8n58upI=', 1624678095),
(29, 'haitsam03@gmail.com', 'PQQj3Q8Zc5v0MgQaSZeJIZC3I+Vz6sTSIQDfeUaNVFI=', 1625074078),
(30, 'haitsam03@gmail.com', 'MoQxNTJVwg+7K1xOKi34fegkurV6CeCw3A8S0fc+Duk=', 1625402539),
(31, 'haitsam03@gmail.com', '+EFaDvIxgP/lW9rjBQHNhCywkza0Pvds9rh1M/TtLhY=', 1625449294);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aktivitas_pemesanan_tiket`
--
ALTER TABLE `aktivitas_pemesanan_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_lunak`
--
ALTER TABLE `berkas_lunak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukti_pembayaran_paket`
--
ALTER TABLE `bukti_pembayaran_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_bayar` (`kode_bayar`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pemesanan_tiket`
--
ALTER TABLE `detail_pemesanan_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas_kamar_hotel`
--
ALTER TABLE `fasilitas_kamar_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `haifa`
--
ALTER TABLE `haifa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `haifa_menu`
--
ALTER TABLE `haifa_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `haifa_sub_menu`
--
ALTER TABLE `haifa_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar_hotel`
--
ALTER TABLE `kamar_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelengkapan_jamaah`
--
ALTER TABLE `kelengkapan_jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maskapai`
--
ALTER TABLE `maskapai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_unggulan`
--
ALTER TABLE `paket_unggulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasokan`
--
ALTER TABLE `pasokan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan_1`
--
ALTER TABLE `pertanyaan_1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan_2`
--
ALTER TABLE `pertanyaan_2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan_keamanan`
--
ALTER TABLE `pertanyaan_keamanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket_shuttle`
--
ALTER TABLE `tiket_shuttle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_tiket` (`kode_tiket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `agen`
--
ALTER TABLE `agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aktivitas_pemesanan_tiket`
--
ALTER TABLE `aktivitas_pemesanan_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `berkas_lunak`
--
ALTER TABLE `berkas_lunak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bukti_pembayaran_paket`
--
ALTER TABLE `bukti_pembayaran_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bukti_transfer`
--
ALTER TABLE `bukti_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan_tiket`
--
ALTER TABLE `detail_pemesanan_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar_hotel`
--
ALTER TABLE `fasilitas_kamar_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `haifa`
--
ALTER TABLE `haifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `haifa_menu`
--
ALTER TABLE `haifa_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `haifa_sub_menu`
--
ALTER TABLE `haifa_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kamar_hotel`
--
ALTER TABLE `kamar_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelengkapan_jamaah`
--
ALTER TABLE `kelengkapan_jamaah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `maskapai`
--
ALTER TABLE `maskapai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paket_unggulan`
--
ALTER TABLE `paket_unggulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pasokan`
--
ALTER TABLE `pasokan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_tiket`
--
ALTER TABLE `pemesanan_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_1`
--
ALTER TABLE `pertanyaan_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_2`
--
ALTER TABLE `pertanyaan_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_keamanan`
--
ALTER TABLE `pertanyaan_keamanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tiket_shuttle`
--
ALTER TABLE `tiket_shuttle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
