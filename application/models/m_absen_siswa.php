<?php

class m_absen_siswa extends CI_Model
{
    public function TampilAbsen()
    {
        return $this->db->order_by('tgl', 'DESC')->get('
        ')->result();
    }
    
    public function joinmengajarkelasjurusan()
    {
        $this->db->select('kelas.kelas', 'penjurusan.nama_jurusan');
        $this->db->from('mengajar');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan = mengajar.id_jurusan');
        $this->db->join('kelas', 'penjurusan.id_jurusan = mengajar.id_jurusan');
        $query = $this->db->get();
        return $query;
    }
}
