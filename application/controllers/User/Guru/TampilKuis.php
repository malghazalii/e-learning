<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TampilKuis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login_guru();
    }
    public function index()
    {
        $nip = $this->session->userdata('nip');
        $tanggal = $this->input->post('tanggal');
        $jenis = $this->input->post('jenisujian');

        $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip = $nip 
        ORDER BY kuis.tanggal_berakhir ASC";
        $data['jenis'] = 'Semua Ujian';
        if ($tanggal == NULL && $jenis ==  null) {
            $data['jenis'] = 'Semua Ujian';
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip = $nip 
		ORDER BY kuis.tanggal_berakhir ASC";
        } elseif ($tanggal == null && $jenis != null) {
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip = $nip 
        AND kuis.jenis = '$jenis'
        ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = $jenis;
        } elseif ($jenis == null && $tanggal != null) {
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip = $nip 
        AND kuis.tanggal_berakhir LIKE '%$tanggal%'
        ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = 'Semua Ujian';
        } elseif ($tanggal != null && $jenis != null) {
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip = $nip 
        AND kuis.jenis = '$jenis' 
        AND kuis.tanggal_berakhir LIKE '%$tanggal%'
        ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = $jenis;
        }
        $queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE guru.nip = $nip";

        $tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.nip=$nip";
        $data['tanggal'] = $this->db->query($tanggal)->result();
        $data['title'] = 'Tampil Kuis';
        $data['mengajar'] = $this->db->query($queryMengajar)->result();
        $data['absensi'] = $this->db->query($ngambilabsen)->result();
        $data['mapel'] = 'Semua Mapel';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda2');
        $this->load->view('users/templates/footer');
        $this->load->view('auto');
    }
    public function mengajar($id)
    {
        $tanggal = $this->input->post('tanggal');
        $jenis = $this->input->post('jenisujian');
        $nip = $this->session->userdata('nip');

        if ($tanggal == NULL && $jenis ==  null) {
            $data['jenis'] = 'Semua Ujian';
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
            JOIN siswa ON siswa.nis = ikut_ujian.nis
            JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
            JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
            JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
            JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
            JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
            WHERE mengajar.id_mengajar = $id  
            ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = 'Semua Ujian';
        } elseif ($tanggal == null && $jenis != null) {
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
            JOIN siswa ON siswa.nis = ikut_ujian.nis
            JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
            JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
            JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
            JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
            JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
            WHERE mengajar.id_mengajar = $id  
            AND kuis.jenis = '$jenis'
            ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = $jenis;
        } elseif ($jenis == null && $tanggal != null) {
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
            JOIN siswa ON siswa.nis = ikut_ujian.nis
            JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
            JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
            JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
            JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
            JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
            WHERE mengajar.id_mengajar = $id  
            AND kuis.tanggal_berakhir LIKE '%$tanggal%'
            ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = 'Semua Ujian';
        } elseif ($tanggal != null && $jenis != null) {
            $ngambilabsen = "SELECT *, siswa.NAMA FROM `ikut_ujian`
            JOIN siswa ON siswa.nis = ikut_ujian.nis
            JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
            JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
            JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
            JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
            JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
            WHERE mengajar.id_mengajar = $id  
            AND kuis.jenis = '$jenis' 
            AND kuis.tanggal_berakhir LIKE '%$tanggal%'
            ORDER BY kuis.tanggal_berakhir ASC";
            $data['jenis'] = $jenis;
        }
        $queryMengajar = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
        WHERE guru.nip = $nip";

        $queryMengajarrr = "SELECT * FROM `mengajar`
		JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
		JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
		JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
		JOIN guru ON guru.nip = mengajar.nip
		WHERE mengajar.id_mengajar = $id";

        $tanggal = "SELECT * FROM `absen_siswa` 
		JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar 
		WHERE mengajar.nip=$nip";
        $data['tanggal'] = $this->db->query($tanggal)->result();

        $data['title'] = 'Tampil kuis';
        $data['mengajar'] = $this->db->query($queryMengajar)->result();
        $data['absensi'] = $this->db->query($ngambilabsen)->result();
        $data['mapel'] = $this->db->query($queryMengajarrr)->row();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda2');
        $this->load->view('users/templates/footer');
    }
    public function Koreksi($id)
    {
        $nip = $this->session->userdata('nip');

        $ngambilujian = "SELECT *, siswa.NAMA FROM `ikut_ujian`
        JOIN siswa ON siswa.nis = ikut_ujian.nis
        JOIN kuis ON kuis.id_kuis = ikut_ujian.id_kuis
        JOIN mengajar ON mengajar.id_mengajar = kuis.id_mengajar
        JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan ON penjurusan.id_jurusan = mengajar.id_jurusan 
        JOIN kelas ON kelas.id_kelas = penjurusan.id_kelas
        WHERE ikut_ujian.id_ujian = $id";

        $ngambisoal = "SELECT *, soal.id_soal AS idk, tr_soal.id_soal AS id FROM `jawaban_ujian`
        JOIN tr_kuis ON tr_kuis.id_tr_kuis = jawaban_ujian.id_tr_kuis
        JOIN soal ON soal.id_soal = tr_kuis.id_soal
        LEFT JOIN tr_soal ON soal.id_soal = tr_soal.id_soal
        WHERE jawaban_ujian.id_ujian = $id
        ORDER BY `jawaban_ujian`.`waktu` DESC";

        // $sum = "SELECT *, SUM(nilai) AS total FROM `jawaban_ujian` WHERE id_ujian = $id ORDER BY `waktu` DESC";
        $sum = "SELECT (if(sum(nilai)< 100, sum(nilai), 100))as total FROM `jawaban_ujian` WHERE id_ujian = $id ORDER BY `waktu` DESC";
        $uj = "SELECT * FROM `ikut_ujian` WHERE id_ujian = $id";

        $data['title'] = 'Tampil Kuis';
        $data['ujian'] = $this->db->query($ngambilujian)->row();
        $data['sum'] = $this->db->query($sum)->row();
        $data['uj'] = $this->db->query($uj)->row();
        $data['soal'] = $this->db->query($ngambisoal)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/guru/create_event/pilihanganda');
        $this->load->view('users/templates/footer');
    }
    public function update()
    {
        $nilai = $this->input->post('nilai');
        $id_ujian = $this->input->post('id_ujian');
        $id_tr_kuis = $this->input->post('id_tr_kuis');

        if ($nilai > 100 || $nilai < 0) {
            echo "<script>alert('Nilai tidak boleh lebih dari 100 atau kurang dari 0');</script>";
            echo "<script>window.location='" . site_url('User/Guru/TampilKuis/Koreksi/' . $id_ujian) . "';</script>";
        } else {
            $data = array(
                'nilai' => $nilai
            );
            $update = "UPDATE jawaban_ujian SET nilai = $nilai WHERE id_ujian = $id_ujian AND id_tr_kuis = $id_tr_kuis";
            $a = $this->db->query($update);
            if ($a) {
                echo "<script>alert('Data berhasil di update');</script>";
                redirect('User/Guru/TampilKuis/koreksi/' . $id_ujian);
            }
        }
    }
    public function updates()
    {
        $nilai = $this->input->post('nilai');
        $id_ujian = $this->input->post('id_ujian');
        if ($nilai > 100 || $nilai < 0) {
            echo "<script>alert('Nilai tidak boleh lebih dari 100 atau kurang dari 0');</script>";
            echo "<script>window.location='" . site_url('User/Guru/TampilKuis/Koreksi/' . $id_ujian) . "';</script>";
        } else {
            $data = array(
                'nilai' => $nilai
            );
            $update = "UPDATE ikut_ujian SET nilai = $nilai WHERE id_ujian = $id_ujian";
            $a = $this->db->query($update);
            if ($a) {
                echo "<script>alert('Data berhasil di update');</script>";
                redirect('User/Guru/TampilKuis/');
            }
        }
    }
}
