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
    redirect('Auth');
  } else {
    $nip = $ci->session->userdata('nip');
    $cekadmin = $ci->db->get_where('guru', ['nip' => $nip]);
    if ($cekadmin->num_rows() < 1) {
      redirect('Auth/blok');
    }
  }
}
function cek_login_siswa()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nis')) {
    redirect('Auth');
  } else {
    $nip = $ci->session->userdata('nip');
    $cekadmin = $ci->db->get_where('guru', ['nip' => $nip]);
    if ($cekadmin->num_rows() < 1) {
      redirect('Auth/blok');
    }
  }
}
