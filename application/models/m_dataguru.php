<?php
class m_dataguru extends CI_Model
{
    function TampilGuru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('golongan', 'golongan.id_gol=guru.id_gol');
        $this->db->order_by('nip', 'ASC');
        $query = $this->db->get();
        return $query;
    }
    
    function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('golongan', 'golongan.id_gol=guru.id_gol');
        $this->db->where('guru.nip', $id);
        $this->db->order_by('nip', 'ASC');
        $query = $this->db->get();
        return $query;
    }
    
    function delete($id)
    {
        return $this->db->where('nip', $id)->delete('guru');
    }
    
    public function insert($data)
    {
        return $this->db->insert('guru', $data);
    }

    public function update($data, $nip)
    {
        return $this->db->where('nip', $nip)->update('guru', $data);
    }
    
    public function golongan()
    {
        return $this->db->get('golongan')->result();
    }
}