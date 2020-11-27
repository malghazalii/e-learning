<?php
class m_mapel extends CI_Model
{
    public function buat_kode()
    {

        $this->db->select('RIGHT(mata_pelajaran.id_mapel,2) as kode', FALSE);
        $this->db->order_by('id_mapel', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mata_pelajaran');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "MPL" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }
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
