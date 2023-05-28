-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 17.45
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_besar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'Fiksi Ilmiah'),
(2, 'Fantasi'),
(3, 'Misteri'),
(4, 'Thriller'),
(5, 'Horor'),
(6, 'Romansa'),
(7, 'Drama'),
(8, 'Komedi'),
(9, 'Aksi'),
(10, 'Petualangan'),
(11, 'Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_penerbit`
--

CREATE TABLE `profil_penerbit` (
  `id_profil_penerbit` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil_penerbit`
--

INSERT INTO `profil_penerbit` (`id_profil_penerbit`, `nama`, `umur`, `alamat`, `email`, `no_telp`, `tanggal_lahir`, `jenis_kelamin`, `id_user`) VALUES
(2, 'rizki febriansyah', 21, 'parigi', 'rfebriansyah385@gmail.com', '089636475524', '0000-00-00', 'laki-laki', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `puisi`
--

CREATE TABLE `puisi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `isi` text NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `puisi`
--

INSERT INTO `puisi` (`id`, `judul`, `id_genre`, `isi`, `tanggal_post`, `id_user`) VALUES
(11, 'Harmoni Alam', 6, 'Dalam hening pagi yang menggenggam waktu,\r\nKulihat cahaya mentari merangkai jalinan,\r\nDengan pepohonan yang menari dalam angin,\r\nAlam mempersembahkan tarian penuh harapan.\r\n\r\nBertautan suara burung yang riang bersahutan,\r\nMengalunkan syair indah dalam kehidupan,\r\nSungai mengalir, mengiringi perjalanan,\r\nMembawa pesan kesatuan yang abadi.\r\n\r\nBunga-bunga mewarnai panorama dunia,\r\nMenyapa dengan lembut, mengajak tersenyum,\r\nBerpelukan dengan dedaunan hijau bergemilang,\r\nMenjalin kasih tanpa pamrih di setiap gerak.\r\n\r\nSinar matahari melukiskan bayang-bayang,\r\nDi bumi yang terjaga dalam keharmonisan,\r\nDalam alunan riang, jiwa terasa tenang,\r\nHarmoni alam mengiringi setiap langkah.\r\n\r\nDalam keindahan ini, kita diberi pelajaran,\r\nUntuk hidup rukun dan menjaga kebersamaan,\r\nHargai keunikan, leburkan perbedaan,\r\nBersatu dalam harmoni, kebahagiaan tercipta.\r\n\r\nHarmoni alam, sebuah karya sempurna,\r\nMengajarkan kita arti kebersamaan sejati,\r\nMari kita lestarikan dengan cinta yang tulus,\r\nAgar dunia ini senantiasa penuh damai.', '2023-05-28 09:04:06', 4),
(12, 'Cinta Abadi', 6, 'Di tepi pantai yang indah dan tenang,\r\nDi sinar rembulan yang mempesona,\r\nAku merenungkan cinta yang abadi,\r\nYang terjalin di antara kita berdua.\r\n\r\nKau dan aku, takdir yang terpaut,\r\nSeperti bintang-bintang yang bersinar terang,\r\nCinta kita mengalir bagai sungai yang tak berujung,\r\nMengalir dalam aliran yang selalu menggoda.\r\n\r\nSetiap sentuhanmu bagai nirwana,\r\nMenggetarkan hatiku dengan kelembutan,\r\nDi setiap senyumanmu, aku merasa bahagia,\r\nMenyatu denganmu dalam kehangatan asmara.\r\n\r\nTiap detik bersamamu terasa abadi,\r\nMeski waktu berlalu dengan cepatnya,\r\nCinta kita akan selalu terjaga,\r\nDi hati yang terpaut tak terpisahkan.\r\n\r\nRomantis, cinta kita melintasi waktu,\r\nMenembus batas-batas dunia nyata,\r\nSepanjang hidupku, akan kuhabiskan,\r\nUntuk mencintaimu tanpa batas.\r\n\r\nCinta Abadi, puisi kita yang tak terhingga,\r\nTerukir di langit biru dalam ingatan,\r\nKau dan aku, selalu bersama,\r\nDalam cinta yang abadi, tiada pernah berakhir.', '2023-05-28 10:29:31', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(4, 'rizki', '$2y$10$hoKSKtU9WYyADfJvl.SYGeNDvIFnXOs9nGkqP8nBZaCnoyigoOzNi'),
(5, 'juva', '$2y$10$F.sbndrNugCZ5nVf6J67QeNJJ4hRUuLzO6Wysh.sO3XVLSMVRnQNC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `profil_penerbit`
--
ALTER TABLE `profil_penerbit`
  ADD PRIMARY KEY (`id_profil_penerbit`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `puisi`
--
ALTER TABLE `puisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_profil_penerbit` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `profil_penerbit`
--
ALTER TABLE `profil_penerbit`
  MODIFY `id_profil_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `puisi`
--
ALTER TABLE `puisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `profil_penerbit`
--
ALTER TABLE `profil_penerbit`
  ADD CONSTRAINT `profil_penerbit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `puisi`
--
ALTER TABLE `puisi`
  ADD CONSTRAINT `puisi_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `puisi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
