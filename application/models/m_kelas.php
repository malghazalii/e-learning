<?php
class m_kelas extends CI_Model
{
    public function TampilKelas()
    {
        $this->db->select('*');
        $this->db->from('penjurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->order_by('kelas, nama_jurusan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('penjurusan', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_jurusan', $id)->delete('penjurusan');
    }

    public function get($id)
    {
        $this->db->select('*');
        $this->db->from('penjurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->where('penjurusan.id_jurusan', $id);
        $query = $this->db->get();
        return $query;
    }

    // public function update($data, $id)
    // {
    //     return $this->db->where('id_jurusan', $id)->update('penjurusan', $data);
    // }
}
