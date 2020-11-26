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
    }
    else if ($ceksiswa->num_rows() > 0) {
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
    }
    else if ($ceksiswa->num_rows() > 0) {
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
    }
    else if ($cekadmin->num_rows() > 0) {
      redirect('Admin/auth/blokA');
    }
  }
}
