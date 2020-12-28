<?php
class m_datasiswa extends CI_Model
{
    function TampilSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=siswa.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->join('tahun_angkatan', 'tahun_angkatan.id_tahun=siswa.id_tahun');
        $this->db->order_by('nis', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=siswa.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->join('tahun_angkatan', 'tahun_angkatan.id_tahun=siswa.id_tahun');
        $this->db->where('siswa.nis', $id);
        $this->db->order_by('nis', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function hasiltahunangkatan($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=siswa.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->join('tahun_angkatan', 'tahun_angkatan.id_tahun=siswa.id_tahun');
        $this->db->where('siswa.id_tahun', $id);
        $query = $this->db->get();
        return $query;
    }

    function hasilkelasjurusan($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=siswa.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->join('tahun_angkatan', 'tahun_angkatan.id_tahun=siswa.id_tahun');
        $this->db->where('siswa.id_jurusan', $id);
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
        $this->db->from('penjurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $query = $this->db->get();
        return $query;
    }

    public function tahunangkatan()
    {
        $this->db->select('*');
        $this->db->from('tahun_angkatan');
        $query = $this->db->get();
        return $query;
    }

    public function update($data, $nis)
    {
        return $this->db->where('nis', $nis)->update('siswa', $data);
    }
}
