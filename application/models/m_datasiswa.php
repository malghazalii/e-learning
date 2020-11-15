<?php
class m_datasiswa extends CI_Model
{
    function TampilSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=kelas.id_jurusan');
        $query = $this->db->get();
        return $query;
    }

    function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=kelas.id_jurusan');
        $this->db->where('siswa.nis', $id);
        $query = $this->db->get();
        return $query;
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    
}
