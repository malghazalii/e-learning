<?php
class m_absensi_guru extends CI_Model
{
    public function TampilAbsen()
    {
        return $this->db->order_by('tanggal_berakhir', 'DESC')->get('absen_guru')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('absen_guru', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_absen', $id)->delete('absen_guru');
    }

    public function update($data, $id)
    {
        return $this->db->where('id_absen', $id)->update('absen_guru', $data);
    }
}
