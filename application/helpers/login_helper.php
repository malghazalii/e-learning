<?php
function cek_login_admin()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nip')) {
    redirect('Admin/auth');
  } else {
    $nip = $ci->session->userdata('nip');
    $cekadmin = $ci->db->get_where('admin', ['nip' => $nip]);
    if ($cekadmin->num_rows() < 1) {
      redirect('Admin/auth/blok');
    }
  }
}
function cek_login_guru()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nip')) {
    redirect('Guru/auth');
  } else {
    $nip = $ci->session->userdata('nip');
    $cekadmin = $ci->db->get_where('guru', ['nip' => $nip]);
    if ($cekadmin->num_rows() < 1) {
      redirect('Guru/auth/blok');
    }
  }
}
function cek_login_siswa()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nis')) {
    redirect('Siswa/auth');
  } else {
    $nip = $ci->session->userdata('nip');
    $cekadmin = $ci->db->get_where('guru', ['nip' => $nip]);
    if ($cekadmin->num_rows() < 1) {
      redirect('Guru/auth/blok');
    }
  }
}
