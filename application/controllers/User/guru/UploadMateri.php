<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadMateri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $nip = $this->session->userdata('nip');
        $queryMengajar = "SELECT * FROM `mengajar` JOIN guru on guru.nip = mengajar.nip JOIN mata_pelajaran 
        on mata_pelajaran.id_mapel = mengajar.id_mapel join penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan JOIN kelas 
        on kelas.id_kelas = penjurusan.id_kelas  WHERE mengajar.nip = $nip";

        $data['mengajar'] = $this->db->query($queryMengajar)->result();
        $data['title'] = 'Upload Materi';
        $this->load->view('users/templates/header', $data);
        $this->load->view('users/templates/navguru');
        $this->load->view('users/templates/navPilihan', $data);
        $this->load->view('users/guru/uploadmateri');
        $this->load->view('users/templates/footer');
    }

    // public function tambahData()
    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
    //         'required' => 'Field tidak boleh kosong'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->index();
    //     } else {
    //         $mapel = $this->input->post('mapel');
    //         $nama = $this->input->post('nama');
    //         $keterangan = $this->input->post('keterangan');
    //         $file = $_FILES['file'];
    //         if ($file = '') {
    //         } else {
    //             $config['upload_path']  =   './assets/users/upload';
    //             $config['allowed_types'] =  'pdf|docx|pptx';

    //             $this->load->library('upload', $config);
    //             if ($this->upload->do_upload('file')) {
    //                 $file = $this->upload->data('file_name');
    //             } else {
    //                 echo '<script>alert("File salah")</script>';
    //             }
    //         }

    //         $data = [
    //             'judul' => $nama,
    //             'id_mengajar' => $mapel,
    //             'nama_file' => $file,
    //             'tgl_posting' => date('y-m-d'),
    //             'isi' => $keterangan
    //         ];

    //         $simpan = $this->db->insert('materi', $data);

    //         if ($simpan) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Materi berhasil diupload</div>');
    //         } else {
    //             $this->session->set_flashdata('messgae', '<div class="alert alert-danger" role="alert">Materi gagal diupload</div>');
    //         }

    //         redirect('User/Guru/Dashboard');
    //     }
    // }
    function tambahData()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Field tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $mengajar = $this->input->post('mapel');
            $nama = $this->input->post('nama');
            $keterangan = $this->input->post('keterangan');
            $file = $_FILES['file_input']['name'];
            // $file_ext = pathinfo($_FILES['file_input']['name'], PATHINFO_EXTENSION);


            $config['upload_path']        =    './assets/users/upload';
            $config['allowed_types']    =    'pdf|docx|pptx';
            $config['max_size']            =    10048;
            // $config['file_name']		=	'picture-'.date('ymd').'-'.substr(md5(rand()),0,10);
            // $config['file_name']        =    $poto;

            $this->load->library('upload', $config);

            if (@$_FILES['file_input']['name'] == null) {
                echo "<script>alert('File Tidak Boleh Kosong');</script>";
                echo "<script>window.location='" . site_url('User/Guru/UploadMateri') . "';</script>";
            } else {
                if ($this->upload->do_upload('file_input')) {
                    $data = array(
                        'id_mengajar' => $mengajar,
                        'judul' => $nama,
                        'nama_file' => $file,
                        'tgl_posting' => date('y-m-d'),
                        'isi' => $keterangan

                    );
                    $this->db->insert('materi', $data);


                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('data Berhasil Di simpan');</script>";
                    }
                    echo "<script>window.location='" . site_url('User/Guru/Dashboard') . "';</script>";
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>alert('Format file salah');</script>";
                    echo "<script>window.location='" . site_url('User/Guru/UploadMateri') . "';</script>";
                }
            }


            // $data = array(
            // 	'username' => $username,
            // 	'password' => $password,
            // 	'image' => $image
            // 	);
            // $this->mlogin->input_data($data,'admin');
            // redirect('admin/user');
        }
    }
}
