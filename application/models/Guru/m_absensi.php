<?php

class m_absensi extends CI_Model
{
    public function TampilAbsen()
    {
        $nip = $this->session->userdata('nip');
        $this->db->select('*');
        $this->db->from('tr_absen_guru');
        $this->db->join('absen_guru', 'absen_guru.id_absen=tr_absen_guru.id_absen');
        $this->db->where('is_active', 1 and 'nip', $nip);
        $query = $this->db->get();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('tr_absen_guru', $data);
    }
}
