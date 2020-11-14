-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2020 pada 09.55
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `status` enum('hadir','alpha','sakit','ijin') NOT NULL,
  `tanggal_absen` datetime NOT NULL,
  `id_mengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nama` varchar(30) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jenis_kelamin` enum('laki-laki','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nama`, `nip`, `password`, `alamat`, `no_telp`, `email`, `jenis_kelamin`) VALUES
('Abdul', '123123', '123', 'Jember', '0895358129878', 'unyinga@gmail.com', 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_gol` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jenis_kelamin` enum('laki-laki','wanita') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `id_gol` int(11) NOT NULL,
  `id_walikelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_jurusan` int(11) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `mata__pelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjurusan`
--

CREATE TABLE `penjurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('laki-laki','wanita') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` enum('Islam','Kristen','Hindu','Buddha','Katholik') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
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
  ADD PRIMARY KEY (`id_mengajar`);

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
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjurusan`
--
ALTER TABLE `penjurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
