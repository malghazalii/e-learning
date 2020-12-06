<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/wali_kelas/DaftarSiswa')?>">Daftar siswa
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/wali_kelas/AbsenSiswa')?>">Absensi siswa
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Penilaian mapel
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel')?>">Mapel A</a>
                    <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel')?>">Mapel A</a>
                    <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel')?>">Mapel A</a>
                    <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel')?>">Mapel A</a>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/Dashboard')?>">Kembali
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>


    </div>
</nav>