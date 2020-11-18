<?php
class m_mapel extends CI_Model
{
    public function TampilMapel()
    {
        return $this->db->get('mata_pelajaran')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('mata_pelajaran', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_mapel', $id)->delete('mata_pelajaran');
    }

    public function get($id)
    {
        return $this->db->where('id_mapel', $id)->get('mata_pelajaran');
    }

    public function update($data, $id)
    {
        return $this->db->where('id_mapel', $id)->update('mata_pelajaran', $data);
    }
}
