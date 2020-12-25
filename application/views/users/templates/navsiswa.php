<!-- banner -->

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Siswa/Dashboard') ?>">Dashboard
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php
            $nis = $this->session->userdata('nis');

            $querysiswa = "SELECT * FROM siswa JOIN penjurusan on penjurusan.id_jurusan = siswa.id_jurusan 
            JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE siswa.nis=$nis";
            $siswa = $this->db->query($querysiswa)->row();

            $querymapel = "SELECT * FROM mengajar JOIN guru on guru.nip = mengajar.nip 
            JOIN mata_pelajaran on mata_pelajaran.id_mapel = mengajar.id_mapel 
            JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan 
            JOIN kelas on kelas.id_kelas = penjurusan.id_kelas WHERE mengajar.id_jurusan=$siswa->id_jurusan";
            $mapel = $this->db->query($querymapel)->result();
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mata Pelajaran
                </a>
                <div class="dropdown-menu">
                    <?php foreach ($mapel as $m) : ?>
                        <a class="dropdown-item" href="<?= base_url('User/Siswa/MataPelajaran/getMapel/' . $m->id_mengajar) ?>"><?= $m->mata_pelajaran ?></a>
                    <?php endforeach; ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Siswa/Event') ?>">Event</a>
            </li>
        </ul>


    </div>
</nav>

<!-- //navigation -->