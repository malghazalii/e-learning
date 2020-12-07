-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2020 pada 20.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `SimpleCompare` (`n` INT, `m` INT) RETURNS VARCHAR(20) CHARSET latin1 BEGIN
    DECLARE s VARCHAR(20);

    IF n > m THEN SET s = '>';
    ELSEIF n = m THEN SET s = '=';
    ELSE SET s = '<';
    END IF;

    SET s = CONCAT(n, ' ', s, ' ', m);

    RETURN s;
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_guru`
--

CREATE TABLE `absen_guru` (
  `id_absen` int(11) NOT NULL,
  `tanggal_berakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_guru`
--

INSERT INTO `absen_guru` (`id_absen`, `tanggal_berakhir`) VALUES
(7, '2020-12-02 04:45:58'),
(8, '2020-12-03 04:45:52'),
(9, '2020-12-04 04:45:50'),
(10, '2020-12-05 04:45:59'),
(11, '2020-12-06 04:51:44'),
(12, '2020-12-07 04:51:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen`, `id_mengajar`, `tanggal`, `is_active`) VALUES
(1, 2, '2020-12-03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nama` varchar(30) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jenis_kelamin` enum('laki-laki','wanita') NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nama`, `nip`, `password`, `alamat`, `no_telp`, `email`, `jenis_kelamin`, `is_active`) VALUES
('Abdul', '123123', '202cb962ac59075b964b07152d234b70', 'Jember', '0895358129878', 'unyinga@gmail.com', 'laki-laki', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_absen_guru`
--

CREATE TABLE `dt_absen_guru` (
  `id_tr_absen` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_gol` int(11) NOT NULL,
  `nama_golongan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_gol`, `nama_golongan`) VALUES
(1, 'pns'),
(2, 'non pns');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','wanita') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `id_gol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `password`, `jenis_kelamin`, `alamat`, `no_hp`, `id_gol`) VALUES
('123456', 'sulis ku', '81dc9bdb52d04dc20036dbd8313ed055', 'laki-laki', 'lumajang', '089667788776', 1),
('231452', 'gfdddsaf', '86ada79e49d513c454aca555cdb60037', 'laki-laki', 'jhfgdfb', '13414', 2),
('2567', 'samsul', '81dc9bdb52d04dc20036dbd8313ed055', 'laki-laki', 'Jember', '0895359914312', 2),
('3232342', 'ssfasdffas', '86ada79e49d513c454aca555cdb60037', 'laki-laki', 'asfdas', '34432454', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikut_ujian`
--

CREATE TABLE `ikut_ujian` (
  `id` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `list_soal` varchar(255) NOT NULL,
  `list_jawaban` varchar(255) NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_tugas`
--

CREATE TABLE `jawaban_tugas` (
  `id_jawaban` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `waktu` int(11) NOT NULL,
  `terlambat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `mata_pelajaran`) VALUES
(2, 'Bahasa Indonesia'),
(6, 'Matematika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `nama_file` varchar(150) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`id_mengajar`, `nip`, `id_mapel`, `id_jurusan`, `jam`) VALUES
(1, '2567', 2, 9, '02:00:00'),
(2, '2567', 6, 10, '02:00:00'),
(3, '3232342', 2, 8, '02:00:00'),
(4, '231452', 2, 3, '05:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjurusan`
--

CREATE TABLE `penjurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjurusan`
--

INSERT INTO `penjurusan` (`id_jurusan`, `id_kelas`, `nama_jurusan`) VALUES
(2, 2, 'ipa 3'),
(3, 3, 'ipa 3'),
(4, 1, 'ipa 2'),
(8, 1, 'ipa 3'),
(9, 1, 'ipa 1'),
(10, 2, 'ipa 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` enum('Islam','Kristen','Hindu','Buddha','Katholik') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `alamat`, `agama`, `no_hp`, `password`, `id_jurusan`) VALUES
('0099', 'Dana', 'perempuan', 'Madiun', 'Islam', '089678876678', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('123', 'ali', 'laki-laki', 'jember', 'Islam', '2321323', '86ada79e49d513c454aca555cdb60037', 2),
('2333', 'Kaleng', 'perempuan', 'jember', 'Islam', '2333', '86ada79e49d513c454aca555cdb60037', 2),
('6971', 'Ihza lol', 'laki-laki', 'Perumahan Muktisari Blok AE 5', 'Kristen', '087654321456', '81dc9bdb52d04dc20036dbd8313ed055', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tipe_file` varchar(255) NOT NULL,
  `soal` varchar(250) NOT NULL,
  `opsiA` varchar(250) NOT NULL,
  `opsiB` varchar(250) NOT NULL,
  `opsiC` varchar(250) NOT NULL,
  `opsiD` varchar(250) NOT NULL,
  `opsiE` varchar(250) NOT NULL,
  `jawaban` varchar(150) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `jml_benar` int(6) NOT NULL,
  `jml_salah` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_absen_guru`
--

CREATE TABLE `tr_absen_guru` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1=hadir, 2=sakit, 3=ijin, 4=alpa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tr_absen_guru`
--

INSERT INTO `tr_absen_guru` (`id_absen`, `nip`, `status`) VALUES
(7, '2567', 1),
(11, '2567', 1),
(12, '2567', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_absen_siswa`
--

CREATE TABLE `tr_absen_siswa` (
  `id_absen` int(11) NOT NULL,
  `nis` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_absen_siswa`
--

INSERT INTO `tr_absen_siswa` (`id_absen`, `nis`, `status`) VALUES
(1, '0099', 1),
(1, '6971', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `jml_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','set') NOT NULL,
  `detail_jenis` varchar(150) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` int(11) NOT NULL,
  `token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_walikelas` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_walikelas`, `nip`, `id_jurusan`) VALUES
(11, 2567, 4),
(12, 123456, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban_tugas`
--
ALTER TABLE `jawaban_tugas`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `penjurusan`
--
ALTER TABLE `penjurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tr_absen_siswa`
--
ALTER TABLE `tr_absen_siswa`
  ADD KEY `id_absen` (`id_absen`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ikut_ujian`
--
ALTER TABLE `ikut_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_tugas`
--
ALTER TABLE `jawaban_tugas`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penjurusan`
--
ALTER TABLE `penjurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `penjurusan` (`id_jurusan`),
  ADD CONSTRAINT `mengajar_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;