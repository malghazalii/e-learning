<?php
class m_guru_mengajar extends CI_Model
{
    public function tampilData()
    {
        $this->db->select('*');
        $this->db->from('mengajar');
        $this->db->join('guru', 'guru.nip=mengajar.nip');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel=mengajar.id_mapel');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=mengajar.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->order_by('kelas, nama_jurusan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('mengajar');
        $this->db->join('guru', 'guru.nip=mengajar.nip');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel=mengajar.id_mapel');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=mengajar.id_jurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->where('mengajar.id_mengajar', $id);
        $query = $this->db->get();
        return $query;
    }

    public function TampilGuru()
    {
        return $this->db->get('guru')->result();
    }

    public function TampilMapel()
    {
        return $this->db->get('mata_pelajaran')->result();
    }

    public function joinkelasjurusan()
    {
        $this->db->select('*');
        $this->db->from('penjurusan');
        $this->db->join('kelas', 'kelas.id_kelas=penjurusan.id_kelas');
        $this->db->order_by('kelas, nama_jurusan', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('mengajar', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_mengajar', $id)->delete('kuis');
        return $this->db->where('id_mengajar', $id)->delete('mengajar');
    }

    public function update($data, $mengajar)
    {
        return $this->db->where('id_mengajar', $mengajar)->update('mengajar', $data);
    }
}
