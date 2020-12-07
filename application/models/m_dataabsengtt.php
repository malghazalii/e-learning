<?php
class m_dataabsengtt extends CI_Model
{
    function TampilGuru()
    {
        $this->db->select('*');
        $this->db->from('tr_absen_guru');
        $this->db->join('absen_guru', 'absen_guru.id_absen=tr_absen_guru.id_absen');
        $this->db->join('guru', 'guru.nip=tr_absen_guru.nip');
        $this->db->join('golongan', 'guru.id_gol=golongan.id_gol');
        $query = $this->db->get();
        return $query;
    }

    function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('tr_absen_guru');
        $this->db->join('absen_guru', 'absen_guru.id_absen=tr_absen_guru.id_absen');
        $this->db->join('guru', 'guru.nip=tr_absen_guru.nip');
        $this->db->join('golongan', 'guru.id_gol=golongan.id_gol');
        $this->db->where('tr_absen_guru.id_absen', $id);
        $query = $this->db->get();
        return $query;
    }

    function delete($id)
    {
        return $this->db->where('id_absen', $id)->delete('tr_absen_guru');
    }

    // public function golongan()
    // {
    //     return $this->db->get('golongan')->result();
    // }
}
