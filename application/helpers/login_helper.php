<?php
function cek_login_admin()
{
  $ci = get_instance();
  $nip = $ci->session->userdata('nip');
  $nis = $ci->session->userdata('nis');
  $cekguru = $ci->db->get_where('guru', ['nip' => $nip]);
  $ceksiswa = $ci->db->get_where('siswa', ['nis' => $nis]);
  if ($nip == null && $nis == null) {
    redirect('Admin/auth');
  } else {
    if ($cekguru->num_rows() > 0) {
      redirect('Admin/auth/blokG');
    } else if ($ceksiswa->num_rows() > 0) {
      redirect('Admin/auth/blokS');
    }
  }
}

function cek_login_guru()
{
  $ci = get_instance();
  $nip = $ci->session->userdata('nip');
  $nis = $ci->session->userdata('nis');
  $cekadmin = $ci->db->get_where('admin', ['nip' => $nip]);
  $ceksiswa = $ci->db->get_where('siswa', ['nis' => $nis]);
  if ($nip == null && $nis == null) {
    redirect('Auth');
  } else {
    if ($cekadmin->num_rows() > 0) {
      redirect('Admin/auth/blokA');
    } else if ($ceksiswa->num_rows() > 0) {
      redirect('Admin/auth/blokS');
    }
  }
}
function cek_login_siswa()
{
  $ci = get_instance();
  $nip = $ci->session->userdata('nip');
  $nis = $ci->session->userdata('nis');
  $cekguru = $ci->db->get_where('guru', ['nip' => $nip]);
  $cekadmin = $ci->db->get_where('admin', ['nip' => $nip]);
  if ($nip == null && $nis == null) {
    redirect('Auth');
  } else {
    if ($cekguru->num_rows() > 0) {
      redirect('Admin/auth/blokG');
    } else if ($cekadmin->num_rows() > 0) {
      redirect('Admin/auth/blokA');
    }
  }
}
function cek_jumlah_keluar()
{
  $ci = get_instance();
  $id = $ci->session->userdata('id_kuis');
  $jml = $ci->session->userdata('jml_soal');
  $keluar = $ci->session->userdata('jumlah_keluar');
  if ($jml <= $keluar) {
    redirect('User/Guru/kuisessay/kuis/' . $id);
  }
}
function cek_ujian()
{
  $ci = get_instance();
  $id_ujian = $ci->session->userdata('id_ujian');
  $id_kuis = $ci->session->userdata('id_kuis');
  $belum = $ci->session->userdata('belum');
  if ($belum == 'belum') {
    redirect('User/Siswa/Kuis/TampilUjian/' . $id_ujian . '/' . $id_kuis);
  }
}
