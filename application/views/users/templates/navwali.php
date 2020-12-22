<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/wali_kelas/DaftarSiswa') ?>">Daftar siswa
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/wali_kelas/AbsenSiswa') ?>">Absensi siswa
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Penilaian mapel
                </a>
                <?php
                $nip = $this->session->userdata('nip');
                $walikelas = "SELECT * FROM wali_kelas JOIN guru on guru.nip = wali_kelas.nip 
                JOIN penjurusan on penjurusan.id_jurusan = wali_kelas.id_jurusan 
                JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE wali_kelas.nip=$nip";
                $wakel = $this->db->query($walikelas)->row();

                $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
                JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
                JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
                JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_jurusan=$wakel->id_jurusan";
                $mapel = $this->db->query($querymapel)->result(); ?>
                <div class="dropdown-menu">
                    <?php foreach ($mapel as $m) : ?>
                        <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel/mapeltugas/' . $m->id_mengajar) ?>"><?= $m->mata_pelajaran ?></a>
                    <?php endforeach; ?>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/Dashboard') ?>">Kembali
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>


    </div>
</nav>