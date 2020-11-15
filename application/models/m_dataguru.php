<?php
Class m_dataguru extends CI_Model
{
    function TampilGuru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('golongan','golongan.id_gol=guru.id_gol');
        $this->db->join('wali_kelas','wali_kelas.id_walikelas=guru.id_walikelas');
        $this->db->join('kelas','kelas.id_kelas=wali_kelas.id_kelas');
        $this->db->join('penjurusan','penjurusan.id_jurusan=kelas.id_jurusan');
        $query = $this->db->get();
        return $query;
    }

    function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('golongan','golongan.id_gol=guru.id_gol');
        $this->db->join('wali_kelas','wali_kelas.id_walikelas=guru.id_walikelas');
        $this->db->join('kelas','kelas.id_kelas=wali_kelas.id_kelas');
        $this->db->join('penjurusan','penjurusan.id_jurusan=kelas.id_jurusan');
        $this->db->where('guru.nip', $id);
        $query = $this->db->get();
        return $query;
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}