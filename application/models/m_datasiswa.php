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

    function delete($id)
    {
        return $this->db->where('nis', $id)->delete('siswa');
    }

    public function insert($data)
    {
        return $this->db->insert('siswa', $data);
    }

    public function joinkelasjurusan()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=kelas.id_jurusan');
        $query = $this->db->get();
        return $query;
    }

    public function update($data, $nis)
    {
        return $this->db->where('nis', $nis)->update('siswa', $data);
    }
}
