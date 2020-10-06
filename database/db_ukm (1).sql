-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Okt 2020 pada 11.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, '061730800633', 'ABcd//12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_kirim`
--

CREATE TABLE `alamat_kirim` (
  `id_alamat_kirim` int(11) NOT NULL,
  `nama_alamat` varchar(150) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `alamat_kirim`
--

INSERT INTO `alamat_kirim` (`id_alamat_kirim`, `nama_alamat`, `alamat`, `kota_id`, `id_member`) VALUES
(1, 'Rumah', 'Jl. Jendral Sudirman No.123, RT. 01, RW.34, Palembang', 327, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `no_faktur` varchar(50) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `no_faktur`, `id_produk`, `jumlah`, `harga`) VALUES
(1, 'F-14030120190831', 1, 1, 67000),
(2, 'F-14030120190831', 2, 2, 85000),
(3, 'F-14030120190831', 2, 1, 85000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tas'),
(2, 'Fashion Anak'),
(3, 'Fashion Muslim'),
(4, 'Handphone & Tablet'),
(5, 'Komputer & Aksesoris'),
(6, 'Laptop & Aksesoris'),
(7, 'Kecantikan'),
(8, 'Kesehatan'),
(9, 'Kamera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_lapak` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `is_check` enum('0','1') DEFAULT '0',
  `tgl_act` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konf_bayar`
--

CREATE TABLE `konf_bayar` (
  `id_konf_bayar` int(11) NOT NULL,
  `bank_kirim` varchar(50) DEFAULT NULL,
  `no_rek` varchar(35) DEFAULT NULL,
  `an` varchar(25) DEFAULT NULL,
  `file_trf` varchar(80) DEFAULT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  `tgl_konfirmasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konf_bayar`
--

INSERT INTO `konf_bayar` (`id_konf_bayar`, `bank_kirim`, `no_rek`, `an`, `file_trf`, `no_faktur`, `tgl_konfirmasi`) VALUES
(1, 'Mandiri', '1234567890', 'ABC Test', '31082019154239bukti_transfer_170321015111.jpg', 'F-14030120190831', '2019-08-31 22:42:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL,
  `nama_kota` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `nama_kota`) VALUES
(1, 'Aceh Barat'),
(2, 'Aceh Barat Daya'),
(3, 'Aceh Besar'),
(4, 'Aceh Jaya'),
(5, 'Aceh Selatan'),
(6, 'Aceh Singkil'),
(7, 'Aceh Tamiang'),
(8, 'Aceh Tengah'),
(9, 'Aceh Tenggara'),
(10, 'Aceh Timur'),
(11, 'selected>Aceh Utara'),
(12, 'Agam'),
(13, 'Alor'),
(14, 'Ambon'),
(15, 'Asahan'),
(16, 'Asmat'),
(17, 'Badung'),
(18, 'Balangan'),
(19, 'Balikpapan'),
(20, 'Banda Aceh'),
(21, 'Bandar Lampung'),
(22, 'Bandung'),
(23, 'Bandung'),
(24, 'Bandung Barat'),
(25, 'Banggai'),
(26, 'Banggai Kepulauan'),
(27, 'Bangka'),
(28, 'Bangka Barat'),
(29, 'Bangka Selatan'),
(30, 'Bangka Tengah'),
(31, 'Bangkalan'),
(32, 'Bangli'),
(33, 'Banjar'),
(34, 'Banjar'),
(35, 'Banjarbaru'),
(36, 'Banjarmasin'),
(37, 'Banjarnegara'),
(38, 'Bantaeng'),
(39, 'Bantul'),
(40, 'Banyuasin'),
(41, 'Banyumas'),
(42, 'Banyuwangi'),
(43, 'Barito Kuala'),
(44, 'Barito Selatan'),
(45, 'Barito Timur'),
(46, 'Barito Utara'),
(47, 'Barru'),
(48, 'Batam'),
(49, 'Batang'),
(50, 'Batang Hari'),
(51, 'Batu'),
(52, 'Batu Bara'),
(53, 'Bau-Bau'),
(54, 'Bekasi'),
(55, 'Bekasi'),
(56, 'Belitung'),
(57, 'Belitung Timur'),
(58, 'Belu'),
(59, 'Bener Meriah'),
(60, 'Bengkalis'),
(61, 'Bengkayang'),
(62, 'Bengkulu'),
(63, 'Bengkulu Selatan'),
(64, 'Bengkulu Tengah'),
(65, 'Bengkulu Utara'),
(66, 'Berau'),
(67, 'Biak Numfor'),
(68, 'Bima'),
(69, 'Bima'),
(70, 'Binjai'),
(71, 'Bintan'),
(72, 'Bireuen'),
(73, 'Bitung'),
(74, 'Blitar'),
(75, 'Blitar'),
(76, 'Blora'),
(77, 'Boalemo'),
(78, 'Bogor'),
(79, 'Bogor'),
(80, 'Bojonegoro'),
(81, 'Bolaang Mongondow (Bolmong)'),
(82, 'Bolaang Mongondow Selatan'),
(83, 'Bolaang Mongondow Timur'),
(84, 'Bolaang Mongondow Utara'),
(85, 'Bombana'),
(86, 'Bondowoso'),
(87, 'Bone'),
(88, 'Bone Bolango'),
(89, 'Bontang'),
(90, 'Boven Digoel'),
(91, 'Boyolali'),
(92, 'Brebes'),
(93, 'Bukittinggi'),
(94, 'Buleleng'),
(95, 'Bulukumba'),
(96, 'Bulungan (Bulongan)'),
(97, 'Bungo'),
(98, 'Buol'),
(99, 'Buru'),
(100, 'Buru Selatan'),
(101, 'Buton'),
(102, 'Buton Utara'),
(103, 'Ciamis'),
(104, 'Cianjur'),
(105, 'Cilacap'),
(106, 'Cilegon'),
(107, 'Cimahi'),
(108, 'Cirebon'),
(109, 'Cirebon'),
(110, 'Dairi'),
(111, 'Deiyai (Deliyai)'),
(112, 'Deli Serdang'),
(113, 'Demak'),
(114, 'Denpasar'),
(115, 'Depok'),
(116, 'Dharmasraya'),
(117, 'Dogiyai'),
(118, 'Dompu'),
(119, 'Donggala'),
(120, 'Dumai'),
(121, 'Empat Lawang'),
(122, 'Ende'),
(123, 'Enrekang'),
(124, 'Fakfak'),
(125, 'Flores Timur'),
(126, 'Garut'),
(127, 'Gayo Lues'),
(128, 'Gianyar'),
(129, 'Gorontalo'),
(130, 'Gorontalo'),
(131, 'Gorontalo Utara'),
(132, 'Gowa'),
(133, 'Gresik'),
(134, 'Grobogan'),
(135, 'Gunung Kidul'),
(136, 'Gunung Mas'),
(137, 'Gunungsitoli'),
(138, 'Halmahera Barat'),
(139, 'Halmahera Selatan'),
(140, 'Halmahera Tengah'),
(141, 'Halmahera Timur'),
(142, 'Halmahera Utara'),
(143, 'Hulu Sungai Selatan'),
(144, 'Hulu Sungai Tengah'),
(145, 'Hulu Sungai Utara'),
(146, 'Humbang Hasundutan'),
(147, 'Indragiri Hilir'),
(148, 'Indragiri Hulu'),
(149, 'Indramayu'),
(150, 'Intan Jaya'),
(151, 'Jakarta Barat'),
(152, 'Jakarta Pusat'),
(153, 'Jakarta Selatan'),
(154, 'Jakarta Timur'),
(155, 'Jakarta Utara'),
(156, 'Jambi'),
(157, 'Jayapura'),
(158, 'Jayapura'),
(159, 'Jayawijaya'),
(160, 'Jember'),
(161, 'Jembrana'),
(162, 'Jeneponto'),
(163, 'Jepara'),
(164, 'Jombang'),
(165, 'Kaimana'),
(166, 'Kampar'),
(167, 'Kapuas'),
(168, 'Kapuas Hulu'),
(169, 'Karanganyar'),
(170, 'Karangasem'),
(171, 'Karawang'),
(172, 'Karimun'),
(173, 'Karo'),
(174, 'Katingan'),
(175, 'Kaur'),
(176, 'Kayong Utara'),
(177, 'Kebumen'),
(178, 'Kediri'),
(179, 'Kediri'),
(180, 'Keerom'),
(181, 'Kendal'),
(182, 'Kendari'),
(183, 'Kepahiang'),
(184, 'Kepulauan Anambas'),
(185, 'Kepulauan Aru'),
(186, 'Kepulauan Mentawai'),
(187, 'Kepulauan Meranti'),
(188, 'Kepulauan Sangihe'),
(189, 'Kepulauan Seribu'),
(190, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 'Kepulauan Sula'),
(192, 'Kepulauan Talaud'),
(193, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 'Kerinci'),
(195, 'Ketapang'),
(196, 'Klaten'),
(197, 'Klungkung'),
(198, 'Kolaka'),
(199, 'Kolaka Utara'),
(200, 'Konawe'),
(201, 'Konawe Selatan'),
(202, 'Konawe Utara'),
(203, 'Kotabaru'),
(204, 'Kotamobagu'),
(205, 'Kotawaringin Barat'),
(206, 'Kotawaringin Timur'),
(207, 'Kuantan Singingi'),
(208, 'Kubu Raya'),
(209, 'Kudus'),
(210, 'Kulon Progo'),
(211, 'Kuningan'),
(212, 'Kupang'),
(213, 'Kupang'),
(214, 'Kutai Barat'),
(215, 'Kutai Kartanegara'),
(216, 'Kutai Timur'),
(217, 'Labuhan Batu'),
(218, 'Labuhan Batu Selatan'),
(219, 'Labuhan Batu Utara'),
(220, 'Lahat'),
(221, 'Lamandau'),
(222, 'Lamongan'),
(223, 'Lampung Barat'),
(224, 'Lampung Selatan'),
(225, 'Lampung Tengah'),
(226, 'Lampung Timur'),
(227, 'Lampung Utara'),
(228, 'Landak'),
(229, 'Langkat'),
(230, 'Langsa'),
(231, 'Lanny Jaya'),
(232, 'Lebak'),
(233, 'Lebong'),
(234, 'Lembata'),
(235, 'Lhokseumawe'),
(236, 'Lima Puluh Koto/Kota'),
(237, 'Lingga'),
(238, 'Lombok Barat'),
(239, 'Lombok Tengah'),
(240, 'Lombok Timur'),
(241, 'Lombok Utara'),
(242, 'Lubuk Linggau'),
(243, 'Lumajang'),
(244, 'Luwu'),
(245, 'Luwu Timur'),
(246, 'Luwu Utara'),
(247, 'Madiun'),
(248, 'Madiun'),
(249, 'Magelang'),
(250, 'Magelang'),
(251, 'Magetan'),
(252, 'Majalengka'),
(253, 'Majene'),
(254, 'Makassar'),
(255, 'Malang'),
(256, 'Malang'),
(257, 'Malinau'),
(258, 'Maluku Barat Daya'),
(259, 'Maluku Tengah'),
(260, 'Maluku Tenggara'),
(261, 'Maluku Tenggara Barat'),
(262, 'Mamasa'),
(263, 'Mamberamo Raya'),
(264, 'Mamberamo Tengah'),
(265, 'Mamuju'),
(266, 'Mamuju Utara'),
(267, 'Manado'),
(268, 'Mandailing Natal'),
(269, 'Manggarai'),
(270, 'Manggarai Barat'),
(271, 'Manggarai Timur'),
(272, 'Manokwari'),
(273, 'Manokwari Selatan'),
(274, 'Mappi'),
(275, 'Maros'),
(276, 'Mataram'),
(277, 'Maybrat'),
(278, 'Medan'),
(279, 'Melawi'),
(280, 'Merangin'),
(281, 'Merauke'),
(282, 'Mesuji'),
(283, 'Metro'),
(284, 'Mimika'),
(285, 'Minahasa'),
(286, 'Minahasa Selatan'),
(287, 'Minahasa Tenggara'),
(288, 'Minahasa Utara'),
(289, 'Mojokerto'),
(290, 'Mojokerto'),
(291, 'Morowali'),
(292, 'Muara Enim'),
(293, 'Muaro Jambi'),
(294, 'Muko Muko'),
(295, 'Muna'),
(296, 'Murung Raya'),
(297, 'Musi Banyuasin'),
(298, 'Musi Rawas'),
(299, 'Nabire'),
(300, 'Nagan Raya'),
(301, 'Nagekeo'),
(302, 'Natuna'),
(303, 'Nduga'),
(304, 'Ngada'),
(305, 'Nganjuk'),
(306, 'Ngawi'),
(307, 'Nias'),
(308, 'Nias Barat'),
(309, 'Nias Selatan'),
(310, 'Nias Utara'),
(311, 'Nunukan'),
(312, 'Ogan Ilir'),
(313, 'Ogan Komering Ilir'),
(314, 'Ogan Komering Ulu'),
(315, 'Ogan Komering Ulu Selatan'),
(316, 'Ogan Komering Ulu Timur'),
(317, 'Pacitan'),
(318, 'Padang'),
(319, 'Padang Lawas'),
(320, 'Padang Lawas Utara'),
(321, 'Padang Panjang'),
(322, 'Padang Pariaman'),
(323, 'Padang Sidempuan'),
(324, 'Pagar Alam'),
(325, 'Pakpak Bharat'),
(326, 'Palangka Raya'),
(327, 'Palembang'),
(328, 'Palopo'),
(329, 'Palu'),
(330, 'Pamekasan'),
(331, 'Pandeglang'),
(332, 'Pangandaran'),
(333, 'Pangkajene Kepulauan'),
(334, 'Pangkal Pinang'),
(335, 'Paniai'),
(336, 'Parepare'),
(337, 'Pariaman'),
(338, 'Parigi Moutong'),
(339, 'Pasaman'),
(340, 'Pasaman Barat'),
(341, 'Paser'),
(342, 'Pasuruan'),
(343, 'Pasuruan'),
(344, 'Pati'),
(345, 'Payakumbuh'),
(346, 'Pegunungan Arfak'),
(347, 'Pegunungan Bintang'),
(348, 'Pekalongan'),
(349, 'Pekalongan'),
(350, 'Pekanbaru'),
(351, 'Pelalawan'),
(352, 'Pemalang'),
(353, 'Pematang Siantar'),
(354, 'Penajam Paser Utara'),
(355, 'Pesawaran'),
(356, 'Pesisir Barat'),
(357, 'Pesisir Selatan'),
(358, 'Pidie'),
(359, 'Pidie Jaya'),
(360, 'Pinrang'),
(361, 'Pohuwato'),
(362, 'Polewali Mandar'),
(363, 'Ponorogo'),
(364, 'Pontianak'),
(365, 'Pontianak'),
(366, 'Poso'),
(367, 'Prabumulih'),
(368, 'Pringsewu'),
(369, 'Probolinggo'),
(370, 'Probolinggo'),
(371, 'Pulang Pisau'),
(372, 'Pulau Morotai'),
(373, 'Puncak'),
(374, 'Puncak Jaya'),
(375, 'Purbalingga'),
(376, 'Purwakarta'),
(377, 'Purworejo'),
(378, 'Raja Ampat'),
(379, 'Rejang Lebong'),
(380, 'Rembang'),
(381, 'Rokan Hilir'),
(382, 'Rokan Hulu'),
(383, 'Rote Ndao'),
(384, 'Sabang'),
(385, 'Sabu Raijua'),
(386, 'Salatiga'),
(387, 'Samarinda'),
(388, 'Sambas'),
(389, 'Samosir'),
(390, 'Sampang'),
(391, 'Sanggau'),
(392, 'Sarmi'),
(393, 'Sarolangun'),
(394, 'Sawah Lunto'),
(395, 'Sekadau'),
(396, 'Selayar (Kepulauan Selayar)'),
(397, 'Seluma'),
(398, 'Semarang'),
(399, 'Semarang'),
(400, 'Seram Bagian Barat'),
(401, 'Seram Bagian Timur'),
(402, 'Serang'),
(403, 'Serang'),
(404, 'Serdang Bedagai'),
(405, 'Seruyan'),
(406, 'Siak'),
(407, 'Sibolga'),
(408, 'Sidenreng Rappang/Rapang'),
(409, 'Sidoarjo'),
(410, 'Sigi'),
(411, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 'Sikka'),
(413, 'Simalungun'),
(414, 'Simeulue'),
(415, 'Singkawang'),
(416, 'Sinjai'),
(417, 'Sintang'),
(418, 'Situbondo'),
(419, 'Sleman'),
(420, 'Solok'),
(421, 'Solok'),
(422, 'Solok Selatan'),
(423, 'Soppeng'),
(424, 'Sorong'),
(425, 'Sorong'),
(426, 'Sorong Selatan'),
(427, 'Sragen'),
(428, 'Subang'),
(429, 'Subulussalam'),
(430, 'Sukabumi'),
(431, 'Sukabumi'),
(432, 'Sukamara'),
(433, 'Sukoharjo'),
(434, 'Sumba Barat'),
(435, 'Sumba Barat Daya'),
(436, 'Sumba Tengah'),
(437, 'Sumba Timur'),
(438, 'Sumbawa'),
(439, 'Sumbawa Barat'),
(440, 'Sumedang'),
(441, 'Sumenep'),
(442, 'Sungaipenuh'),
(443, 'Supiori'),
(444, 'Surabaya'),
(445, 'Surakarta (Solo)'),
(446, 'Tabalong'),
(447, 'Tabanan'),
(448, 'Takalar'),
(449, 'Tambrauw'),
(450, 'Tana Tidung'),
(451, 'Tana Toraja'),
(452, 'Tanah Bumbu'),
(453, 'Tanah Datar'),
(454, 'Tanah Laut'),
(455, 'Tangerang'),
(456, 'Tangerang'),
(457, 'Tangerang Selatan'),
(458, 'Tanggamus'),
(459, 'Tanjung Balai'),
(460, 'Tanjung Jabung Barat'),
(461, 'Tanjung Jabung Timur'),
(462, 'Tanjung Pinang'),
(463, 'Tapanuli Selatan'),
(464, 'Tapanuli Tengah'),
(465, 'Tapanuli Utara'),
(466, 'Tapin'),
(467, 'Tarakan'),
(468, 'Tasikmalaya'),
(469, 'Tasikmalaya'),
(470, 'Tebing Tinggi'),
(471, 'Tebo'),
(472, 'Tegal'),
(473, 'Tegal'),
(474, 'Teluk Bintuni'),
(475, 'Teluk Wondama'),
(476, 'Temanggung'),
(477, 'Ternate'),
(478, 'Tidore Kepulauan'),
(479, 'Timor Tengah Selatan'),
(480, 'Timor Tengah Utara'),
(481, 'Toba Samosir'),
(482, 'Tojo Una-Una'),
(483, 'Toli-Toli'),
(484, 'Tolikara'),
(485, 'Tomohon'),
(486, 'Toraja Utara'),
(487, 'Trenggalek'),
(488, 'Tual'),
(489, 'Tuban'),
(490, 'Tulang Bawang'),
(491, 'Tulang Bawang Barat'),
(492, 'Tulungagung'),
(493, 'Wajo'),
(494, 'Wakatobi'),
(495, 'Waropen'),
(496, 'Way Kanan'),
(497, 'Wonogiri'),
(498, 'Wonosobo'),
(499, 'Yahukimo'),
(500, 'Yalimo'),
(501, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapak`
--

CREATE TABLE `lapak` (
  `id_lapak` int(11) NOT NULL,
  `nama_lapak` varchar(35) DEFAULT NULL,
  `alamat_lapak` varchar(150) DEFAULT NULL,
  `nama_bank` varchar(128) NOT NULL,
  `no_rek` varchar(500) NOT NULL,
  `an` varchar(500) NOT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `lapak`
--

INSERT INTO `lapak` (`id_lapak`, `nama_lapak`, `alamat_lapak`, `nama_bank`, `no_rek`, `an`, `kota_id`, `id_member`) VALUES
(1, 'Toko Regina', 'Swadaya Palembang', '', '', '', 327, 1),
(2, 'Amsi', 'Jakarta Pusat no. 1234567890', '', '', '', 152, NULL),
(3, 'ARP', 'Jl. Aceh UT, No. 1234567890', '', '', '', 11, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(35) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `foto_member` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tgl_join` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(1) NOT NULL DEFAULT 0 COMMENT 'jika 0 = pelanggan\r\njika = 1 member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `no_hp`, `email`, `alamat`, `foto_member`, `password`, `tgl_join`, `role`) VALUES
(1, 'Regina', '081234567890', 'regina@gmail.com', 'Palembang', 'regina.jpg', 'regina', '2019-06-26 17:25:54', 0),
(2, 'Amsi Restu Pratama', '081234567890', 'amsi@gmail.com', 'Komp. GP, BC3, Palembang', 'amsi.jpg', 'amsi', '2019-07-04 10:09:18', 0),
(5, 'ewewt', '423434', 'E@s', 'wetwet', NULL, 'WEWE', '2019-07-26 22:02:00', 0),
(18, 'Ikhlasul Amal', '082280524264', 'amal@gmail.com', 'hghgjh Keluarahan  Kota Bumi Kec Pedamaran Kab Kabupaten Penukal Abab Lematang Ilir', '0310174054dibudapr.png', '12345', '2020-10-03 16:57:39', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencairan`
--

CREATE TABLE `pencairan` (
  `id_pencairan` int(11) NOT NULL,
  `tgl_request` datetime NOT NULL DEFAULT current_timestamp(),
  `no_faktur` varchar(50) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `status` enum('pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `id_lapak` int(11) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(40) DEFAULT NULL,
  `an` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pencairan`
--

INSERT INTO `pencairan` (`id_pencairan`, `tgl_request`, `no_faktur`, `jumlah`, `status`, `id_lapak`, `nama_bank`, `no_rekening`, `an`) VALUES
(1, '2020-01-12 14:52:42', 'F-14030120190831', 344500, 'selesai', 1, 'MANDIRI', NULL, 'Regina Silitonga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `berat` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kondisi` enum('Baru','Bekas') DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_kategori` int(11) DEFAULT NULL,
  `id_lapak` int(11) DEFAULT NULL,
  `is_del` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `berat`, `stok`, `harga`, `kondisi`, `deskripsi`, `foto`, `update_date`, `id_kategori`, `id_lapak`, `is_del`) VALUES
(1, 'Le Saint Hannah', 500, 40, 125000, 'Baru', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'le-saint-hannah-le-saint-9439.png', '2019-08-31 23:20:20', 3, 1, '0'),
(2, 'Le Saint Ayanna', 650, 50, 169900, 'Baru', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'le-saint-ayanna-le-saint-9568.png', '2019-08-31 23:20:15', 3, 1, '0'),
(3, 'Le Saint Fiorello', 650, 40, 199000, 'Baru', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'le-saint-fiorello-le-saint-7952.png', '2019-08-31 23:20:29', 3, 1, '0'),
(4, 'goes rajutan', 500, 10, 149900, 'Baru', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'goes-rajutan-goes-to-serv-computer-1-7957.jpg', '2019-08-31 23:29:48', 1, 1, '0'),
(5, 'Canon Eos 250D', 2500, 4, 7650000, NULL, 'Canon Eos 250D', '31102019090002eos_250d_2.jpg', '2019-10-31 15:00:02', 9, 1, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rek_bayar`
--

CREATE TABLE `rek_bayar` (
  `id_rek_bayar` int(11) NOT NULL,
  `nama_rek` varchar(80) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `an` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `rek_bayar`
--

INSERT INTO `rek_bayar` (`id_rek_bayar`, `nama_rek`, `no_rek`, `an`) VALUES
(1, 'BNI', '01234567890', 'TOKO UKM'),
(2, 'MANDIRI', '0987654321', 'TOKO UKM'),
(3, 'BCA', '643217890', 'TOKO UKM'),
(4, 'BRI', '0987612345', 'TOKO UKM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_slide`, `foto`, `status`) VALUES
(1, 's1.png', '1'),
(2, 's2.png', '1'),
(3, 's3.jpg', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bekraf`
--

CREATE TABLE `tbl_bekraf` (
  `id_bekraf` int(11) NOT NULL,
  `nama_bekraf` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bekraf`
--

INSERT INTO `tbl_bekraf` (`id_bekraf`, `nama_bekraf`) VALUES
(1, 'Aplikasi Dan Pengembangan Permainana'),
(2, 'Arsitektur'),
(3, 'Desain Interior'),
(4, 'Desain Komunikasi Visual'),
(5, 'Desain Produk'),
(6, 'Fotografi'),
(7, 'Film Animasi Dan Video'),
(8, 'Kriya'),
(9, 'Kuliner'),
(10, 'Musik'),
(11, 'Penerbitan'),
(12, 'Periklanan'),
(13, 'Seni Pertunjukkan'),
(14, 'Seni Rupa'),
(15, 'Televisi Dan Radio'),
(16, 'Fashion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(256) NOT NULL,
  `photo_berita` varchar(128) NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `status_berita` int(1) NOT NULL COMMENT 'jika 0 = tayang dilokasl\r\njika 1 = tayang di publik',
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `photo_berita`, `deskripsi_berita`, `status_berita`, `date_created`) VALUES
(13, 'Perayaan', '20-208048_transparent-social-media-icons-vector-png-social-media.png', 'Perayaan Ini Diadakan di kota palembang sumatera selatan', 1, '2020-09-27'),
(14, 'rqerqwewq', 'download.jpeg', 'sdsd', 1, '2020-09-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_berkas` int(5) NOT NULL,
  `id_daftar` int(5) NOT NULL,
  `photo_diri` varchar(128) NOT NULL,
  `photo_ktp` varchar(128) NOT NULL,
  `photo_npwp` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `statusb` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id_berkas`, `id_daftar`, `photo_diri`, `photo_ktp`, `photo_npwp`, `photo`, `statusb`) VALUES
(24, 22, 'dibudapr.png', 'dibudapr1.png', 'Danau-Teluk-Gelam5.png', 'building-computer-icons-buildings-png-clip-art1.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daerah`
--

CREATE TABLE `tbl_daerah` (
  `id_daerah` int(11) NOT NULL,
  `nama_daerah` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daerah`
--

INSERT INTO `tbl_daerah` (`id_daerah`, `nama_daerah`) VALUES
(1, 'Kabupaten Banyuasin'),
(2, 'Kabupaten Empat Lawang'),
(3, 'Kabupaten Lahat'),
(4, 'Kabupaten Muara Enim'),
(5, 'Kabupaten Musi Banyuasin'),
(6, 'Kabupaten Musi Rawas'),
(7, 'Kabupaten Musi Rawas Utara'),
(8, 'Kabupaten Ogan Ilir'),
(9, 'Kabupaten Ogan Komering Ilir'),
(10, 'Kabupaten Ogan Komering Ulu'),
(11, 'Kabupaten Ogan Komering Ulu Selatan'),
(12, 'Kabupaten Ogan Komering Ulu Timur'),
(13, 'Kabupaten Penukal Abab Lematang Ilir'),
(14, 'Kota Lubuklinggau'),
(15, 'Kota Pagar Alam'),
(16, 'Kota Palembang'),
(17, 'Kota Prabumulih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daftar_ukm`
--

CREATE TABLE `tbl_daftar_ukm` (
  `id_daftar` int(5) NOT NULL COMMENT 'diisi ketika daftar',
  `nik` varchar(50) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(1) NOT NULL COMMENT 'jika 1 = beranda\r\njika 2 = status\r\njika 3 = berhasil veridikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_daftar_ukm`
--

INSERT INTO `tbl_daftar_ukm` (`id_daftar`, `nik`, `nama_pemilik`, `handphone`, `email`, `password`, `status`) VALUES
(11, '1602022501020001', 'Amal', '081367073783', 'hmeileni@gmail.com', '12345', 3),
(12, '1602150507990009', 'Bastari', '081212121', 'bastari@gmail.com', '12345', 1),
(13, '1602150507990007', 'Maya', '0812345', 'maya@gmail.com', '12345', 3),
(22, '1602150507990006', 'Ikhlasul Amal', '082280524264', 'amal@gmail.com', '12345', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(5) NOT NULL,
  `id_kabupaten` int(5) NOT NULL,
  `nama_desa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_desa`
--

INSERT INTO `tbl_desa` (`id_desa`, `id_kecamatan`, `id_kabupaten`, `nama_desa`) VALUES
(1, 8, 4, 'Kota Bumi'),
(2, 2, 2, 'Peninjauan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul_galeri` varchar(50) NOT NULL,
  `photo_galeri` varchar(256) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `judul_galeri`, `photo_galeri`, `status`) VALUES
(4, 'Pempek Pak Raden', 'pempek.jpg', 1),
(5, 'Batik Amal', 'songket.jpeg', 1),
(6, 'Pempek', 'map.png', 0),
(7, 'Dinas Perindustrian Provinsi Sumatera Selatan', 'WhatsApp_Image_2020-09-29_at_05_33_30.jpeg', 1),
(8, 'Dinas Perindustrian Provinsi Sumatera Selatan', 'WhatsApp_Image_2020-09-29_at_05_33_30_(2).jpeg', 0),
(9, 'Dinas Perindustrian Provinsi Sumatera Selatan', 'WhatsApp_Image_2020-09-29_at_05_33_30_(3).jpeg', 1),
(10, 'Dinas Perindustrian Provinsi Sumatera Selatan', 'WhatsApp_Image_2020-09-29_at_05_33_31.jpeg', 1),
(11, 'Pempek Pak Raden', 'CAP_KKN.PNG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kabupaten`
--

CREATE TABLE `tbl_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kabupaten`
--

INSERT INTO `tbl_kabupaten` (`id_kabupaten`, `nama_kabupaten`) VALUES
(10, 'Kabupaten Banyuasin'),
(11, 'Kabupaten Empat Lawang'),
(12, 'Kabupaten Lahat'),
(13, 'Kabupaten Muara Enim'),
(14, 'Kabupaten Musi Banyuasin'),
(15, 'Kabupaten Musi Rawas'),
(16, 'Kabupaten Musi Rawas Utara'),
(17, 'Kabupaten Ogan Ilir'),
(18, 'Kabupaten Ogan Komering Ilir'),
(19, 'Kabupaten Ogan Komering Ulu'),
(20, 'Kabupaten Ogan Komering Ulu Selatan'),
(21, 'Kabupaten Ogan Komering Ulu Timur'),
(22, 'Kabupaten Penukal Abab Lematang Ilir'),
(23, 'Kabupaten Lubuk Linggau'),
(24, 'Kota Pagaralam'),
(25, 'Kota Palembang'),
(26, 'Kota Prabumulih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(5) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 2, 'Tanjung Lubuk'),
(2, 2, 'Lubuk Batang'),
(8, 4, 'Pedamaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_klasterisasi`
--

CREATE TABLE `tbl_klasterisasi` (
  `id_klasterisasi` int(11) NOT NULL,
  `nama_klasterisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_klasterisasi`
--

INSERT INTO `tbl_klasterisasi` (`id_klasterisasi`, `nama_klasterisasi`) VALUES
(1, 'Modal Kerja'),
(2, 'Tenaga Kerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_ukm`
--

CREATE TABLE `tbl_master_ukm` (
  `id_ukm` int(11) NOT NULL,
  `id_daftar` int(5) NOT NULL,
  `id_klasterisasi` int(5) NOT NULL,
  `id_bekraf` int(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `pekerjaan` int(5) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `nama_usaha` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kabupaten` int(5) NOT NULL,
  `kecamatan` int(5) NOT NULL,
  `desa` int(5) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `latitude` varchar(128) NOT NULL,
  `longtitude` varchar(128) NOT NULL,
  `link_usaha` varchar(500) NOT NULL,
  `status_pemilik` int(1) NOT NULL COMMENT 'jika 1= ditampilkan',
  `status_usaha` int(1) NOT NULL COMMENT 'jika 1 = data di verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_master_ukm`
--

INSERT INTO `tbl_master_ukm` (`id_ukm`, `id_daftar`, `id_klasterisasi`, `id_bekraf`, `nik`, `nama_pemilik`, `ttl`, `pekerjaan`, `photo`, `nama_usaha`, `alamat`, `kabupaten`, `kecamatan`, `desa`, `handphone`, `latitude`, `longtitude`, `link_usaha`, `status_pemilik`, `status_usaha`) VALUES
(25, 0, 1, 15, '2147483647', 'Zainal Pratama', '2020-09-16', 2, 'pempek.jpg', 'Zainal Songket', 'Palembnag', 15, 8, 1, '08', '-3.338982', '104.748917', 'http://localhost/bukhetty/p', 1, 0),
(26, 0, 2, 14, '2147483647', 'Wawan', '2020-09-01', 4, 'Danau-Teluk-Gelam.png', 'Hodroponik', 'Babatan', 15, 1, 2, '081367073783', '-3.338982', '104.748917', 'http://localhost/bukhetty/p', 1, 0),
(29, 0, 2, 15, '12313', 'qwewqe', '2020-09-24', 4, 'dinnnnnnn.jpeg', 'VX', 'jhjhgghj', 10, 2, 1, '08', '-3.338982', '104.748917', 'http://localhost/bukhetty/p', 1, 0),
(30, 13, 2, 3, '2147483647', 'Maya', '2020-09-22', 4, 'download.jpeg', 'Beramal.com', 'Kota  Bumi', 18, 8, 1, '0812345', '-3.338982', '104.759789', 'http://localhost/bukhetty/p', 1, 1),
(41, 22, 2, 2, '1602150507990006', 'Ikhlasul Amal', '2020-10-30', 4, 'building-computer-icons-buildings-png-clip-art.png', 'Beramal.com', 'hghgjh', 22, 8, 1, '082280524264', '-3.338982', '104.7471323', 'http://localhost/bukhetty/p', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(2, 'Mahasiswa'),
(4, 'PNS (Pegawai Negeri Sipil)'),
(5, 'TNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `handphone` int(15) NOT NULL,
  `pengaduan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `nama`, `email`, `handphone`, `pengaduan`) VALUES
(1, 'Ikhlasul Amal', 'ikhlasul0507@gmail.com', 2147483647, 'Aamal'),
(4, 'sdsdsd', 'hmeileni@gmail.com', 2147483647, 'wewe'),
(5, 'amal', 'hmeileni@gmail.com', 2147483647, 'adsads');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `email`, `waktu`) VALUES
(2, 'disparoki@gmail.com', '2020-09-27'),
(3, 'hmeileni@gmail.com', '2020-09-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `id` int(11) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_slide`
--

INSERT INTO `tbl_slide` (`id`, `photo`) VALUES
(6, 'WhatsApp_Image_2020-09-29_at_05_33_30.jpeg'),
(9, 'WhatsApp_Image_2020-09-29_at_05_33_31.jpeg'),
(11, 'Danau-Teluk-Gelam.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `photo` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `status` int(1) NOT NULL COMMENT ' 0 = belum aktif\r\n1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `ttl`, `photo`, `password`, `kode`, `status`) VALUES
(11, 'Ikhlasul Amal', 'amal@gmail.com', '2020-10-15', 'Danau-Teluk-Gelam.png', '12345', '96111', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` varchar(50) NOT NULL,
  `tgl_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `id_member` int(11) DEFAULT NULL,
  `id_alamat_kirim` int(11) DEFAULT NULL,
  `status_trans` enum('pending','proses','kirim','selesai') NOT NULL DEFAULT 'pending',
  `status_bayar` enum('paid','no_paid') NOT NULL DEFAULT 'no_paid',
  `kurir` varchar(255) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `total_trf` double DEFAULT NULL,
  `id_lapak` int(11) DEFAULT NULL,
  `id_rek_bayar` int(11) DEFAULT NULL,
  `no_resi` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_faktur`, `tgl_transaksi`, `id_member`, `id_alamat_kirim`, `status_trans`, `status_bayar`, `kurir`, `ongkir`, `total_trf`, `id_lapak`, `id_rek_bayar`, `no_resi`) VALUES
('F-14030120190831', '2019-08-31 21:03:01', 2, 1, 'selesai', 'paid', 'pos Paket Jumbo Ekonomi', 22500, 344500, 1, 2, '1234567890');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_detail_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_detail_transaksi` (
`id_detail_transaksi` int(11)
,`no_faktur` varchar(50)
,`id_produk` int(11)
,`nama_produk` varchar(50)
,`foto` varchar(100)
,`jumlah` int(11)
,`harga` double
,`total` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_keranjang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_keranjang` (
`id_keranjang` int(11)
,`id_lapak` int(11)
,`nama_lapak` varchar(35)
,`id_produk` int(11)
,`foto` varchar(100)
,`nama_produk` varchar(50)
,`berat` double
,`jumlah` int(11)
,`harga` double
,`tgl_act` datetime
,`id_member` int(11)
,`is_check` enum('0','1')
,`kota_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_produk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_produk` (
`id_produk` int(11)
,`nama_produk` varchar(50)
,`berat` double
,`stok` int(11)
,`harga` int(11)
,`kondisi` enum('Baru','Bekas')
,`deskripsi` text
,`foto` varchar(100)
,`update_date` datetime
,`id_kategori` int(11)
,`nama_kategori` varchar(255)
,`id_lapak` int(11)
,`nama_lapak` varchar(35)
,`alamat_lapak` varchar(150)
,`kota_id` int(11)
,`id_member` int(11)
,`nama_member` varchar(35)
,`foto_member` varchar(100)
,`is_del` enum('0','1')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaksi` (
`no_faktur` varchar(50)
,`tgl_transaksi` datetime
,`tgl_ts` varchar(72)
,`id_member` int(11)
,`nama_member` varchar(35)
,`no_hp` varchar(15)
,`email` varchar(75)
,`id_alamat_kirim` int(11)
,`alamat` varchar(255)
,`status_trans` enum('pending','proses','kirim','selesai')
,`status_bayar` enum('paid','no_paid')
,`kurir` varchar(255)
,`ongkir` double
,`tot_belanja` double
,`total_trf` double
,`id_lapak` int(11)
,`nama_lapak` varchar(35)
,`id_rek_bayar` int(11)
,`nama_rek` varchar(80)
,`no_rek` varchar(50)
,`an` varchar(100)
,`no_resi` varchar(75)
,`konf_bayar` bigint(21)
,`kota_id_pengirim` int(11)
,`nama_kota_pengirim` varchar(150)
,`kota_id_tujuan` int(11)
,`nama_kota_tujuan` varchar(150)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_detail_transaksi`
--
DROP TABLE IF EXISTS `v_detail_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_transaksi`  AS  select `a`.`id_detail_transaksi` AS `id_detail_transaksi`,`a`.`no_faktur` AS `no_faktur`,`a`.`id_produk` AS `id_produk`,`b`.`nama_produk` AS `nama_produk`,`b`.`foto` AS `foto`,`a`.`jumlah` AS `jumlah`,`a`.`harga` AS `harga`,`a`.`jumlah` * `a`.`harga` AS `total` from (`detail_transaksi` `a` join `produk` `b` on(`a`.`id_produk` = `b`.`id_produk`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_keranjang`
--
DROP TABLE IF EXISTS `v_keranjang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keranjang`  AS  select `keranjang`.`id_keranjang` AS `id_keranjang`,`keranjang`.`id_lapak` AS `id_lapak`,`lapak`.`nama_lapak` AS `nama_lapak`,`keranjang`.`id_produk` AS `id_produk`,`produk`.`foto` AS `foto`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`berat` AS `berat`,`keranjang`.`jumlah` AS `jumlah`,`keranjang`.`harga` AS `harga`,`keranjang`.`tgl_act` AS `tgl_act`,`keranjang`.`id_member` AS `id_member`,`keranjang`.`is_check` AS `is_check`,`lapak`.`kota_id` AS `kota_id` from ((`keranjang` join `lapak` on(`keranjang`.`id_lapak` = `lapak`.`id_lapak`)) join `produk` on(`produk`.`id_lapak` = `lapak`.`id_lapak` and `keranjang`.`id_produk` = `produk`.`id_produk`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_produk`
--
DROP TABLE IF EXISTS `v_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_produk`  AS  select `produk`.`id_produk` AS `id_produk`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`berat` AS `berat`,`produk`.`stok` AS `stok`,`produk`.`harga` AS `harga`,`produk`.`kondisi` AS `kondisi`,`produk`.`deskripsi` AS `deskripsi`,`produk`.`foto` AS `foto`,`produk`.`update_date` AS `update_date`,`produk`.`id_kategori` AS `id_kategori`,`kategori`.`nama_kategori` AS `nama_kategori`,`produk`.`id_lapak` AS `id_lapak`,`lapak`.`nama_lapak` AS `nama_lapak`,`lapak`.`alamat_lapak` AS `alamat_lapak`,`lapak`.`kota_id` AS `kota_id`,`lapak`.`id_member` AS `id_member`,`member`.`nama_member` AS `nama_member`,`member`.`foto_member` AS `foto_member`,`produk`.`is_del` AS `is_del` from (((`produk` join `kategori` on(`produk`.`id_kategori` = `kategori`.`id_kategori`)) join `lapak` on(`produk`.`id_lapak` = `lapak`.`id_lapak`)) join `member` on(`lapak`.`id_member` = `member`.`id_member`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `a`.`no_faktur` AS `no_faktur`,`a`.`tgl_transaksi` AS `tgl_transaksi`,date_format(`a`.`tgl_transaksi`,'%d %M %Y') AS `tgl_ts`,`a`.`id_member` AS `id_member`,`member`.`nama_member` AS `nama_member`,`member`.`no_hp` AS `no_hp`,`member`.`email` AS `email`,`a`.`id_alamat_kirim` AS `id_alamat_kirim`,`alamat_kirim`.`alamat` AS `alamat`,`a`.`status_trans` AS `status_trans`,`a`.`status_bayar` AS `status_bayar`,`a`.`kurir` AS `kurir`,`a`.`ongkir` AS `ongkir`,`a`.`total_trf` - `a`.`ongkir` AS `tot_belanja`,`a`.`total_trf` AS `total_trf`,`a`.`id_lapak` AS `id_lapak`,`lapak`.`nama_lapak` AS `nama_lapak`,`a`.`id_rek_bayar` AS `id_rek_bayar`,`rek_bayar`.`nama_rek` AS `nama_rek`,`rek_bayar`.`no_rek` AS `no_rek`,`rek_bayar`.`an` AS `an`,`a`.`no_resi` AS `no_resi`,(select count(0) from `konf_bayar` where `konf_bayar`.`no_faktur` = `a`.`no_faktur`) AS `konf_bayar`,`lapak`.`kota_id` AS `kota_id_pengirim`,(select `kota`.`nama_kota` from `kota` where `kota`.`kota_id` = `lapak`.`kota_id`) AS `nama_kota_pengirim`,`alamat_kirim`.`kota_id` AS `kota_id_tujuan`,(select `kota`.`nama_kota` from `kota` where `kota`.`kota_id` = `alamat_kirim`.`kota_id`) AS `nama_kota_tujuan` from ((((`transaksi` `a` join `lapak` on(`a`.`id_lapak` = `lapak`.`id_lapak`)) join `rek_bayar` on(`a`.`id_rek_bayar` = `rek_bayar`.`id_rek_bayar`)) join `alamat_kirim` on(`a`.`id_alamat_kirim` = `alamat_kirim`.`id_alamat_kirim`)) join `member` on(`a`.`id_member` = `member`.`id_member`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  ADD PRIMARY KEY (`id_alamat_kirim`) USING BTREE,
  ADD KEY `id_member` (`id_member`) USING BTREE;

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`) USING BTREE,
  ADD KEY `detail_transaksi_ibfk_2` (`id_produk`) USING BTREE,
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`) USING BTREE,
  ADD KEY `id_lapak` (`id_lapak`) USING BTREE,
  ADD KEY `id_produk` (`id_produk`) USING BTREE,
  ADD KEY `id_member` (`id_member`) USING BTREE;

--
-- Indeks untuk tabel `konf_bayar`
--
ALTER TABLE `konf_bayar`
  ADD PRIMARY KEY (`id_konf_bayar`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indeks untuk tabel `lapak`
--
ALTER TABLE `lapak`
  ADD PRIMARY KEY (`id_lapak`) USING BTREE,
  ADD KEY `id_member` (`id_member`) USING BTREE;

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `pencairan`
--
ALTER TABLE `pencairan`
  ADD PRIMARY KEY (`id_pencairan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`) USING BTREE,
  ADD KEY `produk_ibfk_1` (`id_kategori`) USING BTREE,
  ADD KEY `id_lapak` (`id_lapak`) USING BTREE;

--
-- Indeks untuk tabel `rek_bayar`
--
ALTER TABLE `rek_bayar`
  ADD PRIMARY KEY (`id_rek_bayar`) USING BTREE;

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `tbl_bekraf`
--
ALTER TABLE `tbl_bekraf`
  ADD PRIMARY KEY (`id_bekraf`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indeks untuk tabel `tbl_daftar_ukm`
--
ALTER TABLE `tbl_daftar_ukm`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indeks untuk tabel `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tbl_kabupaten`
--
ALTER TABLE `tbl_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `tbl_klasterisasi`
--
ALTER TABLE `tbl_klasterisasi`
  ADD PRIMARY KEY (`id_klasterisasi`);

--
-- Indeks untuk tabel `tbl_master_ukm`
--
ALTER TABLE `tbl_master_ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indeks untuk tabel `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`) USING BTREE,
  ADD KEY `transaksi_ibfk_1` (`id_member`) USING BTREE,
  ADD KEY `transaksi_ibfk_2` (`id_lapak`) USING BTREE,
  ADD KEY `id_alamat_kirim` (`id_alamat_kirim`) USING BTREE,
  ADD KEY `id_rek_bayar` (`id_rek_bayar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  MODIFY `id_alamat_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `konf_bayar`
--
ALTER TABLE `konf_bayar`
  MODIFY `id_konf_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lapak`
--
ALTER TABLE `lapak`
  MODIFY `id_lapak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pencairan`
--
ALTER TABLE `pencairan`
  MODIFY `id_pencairan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rek_bayar`
--
ALTER TABLE `rek_bayar`
  MODIFY `id_rek_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_bekraf`
--
ALTER TABLE `tbl_bekraf`
  MODIFY `id_bekraf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id_berkas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_daftar_ukm`
--
ALTER TABLE `tbl_daftar_ukm`
  MODIFY `id_daftar` int(5) NOT NULL AUTO_INCREMENT COMMENT 'diisi ketika daftar', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kabupaten`
--
ALTER TABLE `tbl_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_klasterisasi`
--
ALTER TABLE `tbl_klasterisasi`
  MODIFY `id_klasterisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_master_ukm`
--
ALTER TABLE `tbl_master_ukm`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  ADD CONSTRAINT `alamat_kirim_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_lapak`) REFERENCES `lapak` (`id_lapak`) ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konf_bayar`
--
ALTER TABLE `konf_bayar`
  ADD CONSTRAINT `konf_bayar_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lapak`
--
ALTER TABLE `lapak`
  ADD CONSTRAINT `lapak_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_lapak`) REFERENCES `lapak` (`id_lapak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_lapak`) REFERENCES `lapak` (`id_lapak`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_alamat_kirim`) REFERENCES `alamat_kirim` (`id_alamat_kirim`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_rek_bayar`) REFERENCES `rek_bayar` (`id_rek_bayar`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
