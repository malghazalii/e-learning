<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BuatKuis extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		cek_login_guru();
	}
    public function index()
    {
        $nip = $this->session->userdata('nip');

        $queryMengajar = "SELECT * FROM mengajar JOIN mata_pelajaran ON mata_pelajaran.id_mapel = mengajar.id_mapel 
        JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas on kelas.id_kelas = penjurusan.id_kelas
        WHERE mengajar.nip=$nip";

        $data['title'] = 'Buat Ujian';
        $data['tanggal'] = date('Y-m-d');
        $data['mengajar'] = $this->db->query($queryMengajar)->result();
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/templates/navPilihan');
        $this->load->view('users/guru/create_event/buatkuis', $data);
        $this->load->view('users/templates/footer');
    }

    function tambahData()
    {
        $this->form_validation->set_rules('namaujian', 'Namaujian', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jmlsoalkeluar', 'Jmlsoalkeluar', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $mengajar = $this->input->post('mengajar');
            $namaujian = $this->input->post('namaujian');
            $jenisujian = $this->input->post('jenisujian');
            $jam = $this->input->post('jam');
            $tanggal = $this->input->post('tanggal');
            $jmlsoalkeluar = $this->input->post('jmlsoalkeluar');

            $waktu = $tanggal . " " . $jam;

            $data = [
                'id_mengajar' => $mengajar,
                'nama_ujian' => $namaujian,
                'tanggal_berakhir' => $waktu,
                'jenis' => $jenisujian,
                'jumlah_keluar' => $jmlsoalkeluar
            ];

            $simpan = $this->db->insert('kuis', $data);

            if ($simpan) {
                echo "<script>alert('Data Berhasil di simpan');</script>";
                echo "<script>window.location='" . site_url('User/Guru/kuisessay') . "';</script>";
            } else {
                echo "<script>alert('Data tidak berhasil di simpan');</script>";
                echo "<script>window.location='" . site_url('User/Guru/buatkuis') . "';</script>";
            }
        }
    }
}
