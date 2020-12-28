<?php

class m_walikelas extends CI_Model
{
    public function TampilWalikelas()
    {
        $this->db->select('*');
        $this->db->from('wali_kelas');
        $this->db->join('guru', 'guru.nip=wali_kelas.nip');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=wali_kelas.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->order_by('kelas, nama_jurusan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('wali_kelas', $data);
    }

    public function getAllGuru()
    {
        return $this->db->get('guru')->result();
    }

    public function joinkelasjurusan()
    {
        $this->db->select('*');
        $this->db->from('penjurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        return $this->db->where('id_walikelas', $id)->delete('wali_kelas');
    }

    public function get($id)
    {
        $this->db->select('*');
        $this->db->from('wali_kelas');
        $this->db->join('guru', 'guru.nip=wali_kelas.nip');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=wali_kelas.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->where('wali_kelas.id_walikelas', $id);
        $query = $this->db->get();
        return $query;
    }

    public function update($data, $id)
    {
        return $this->db->where('id_walikelas', $id)->update('wali_kelas', $data);
    }
}
