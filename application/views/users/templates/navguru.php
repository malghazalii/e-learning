<!-- banner -->

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.html">Dashboard
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Event
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">Show Event</a>
                    <a class="dropdown-item" href="about.html">Create Event</a>
                    <a class="dropdown-item" href="index.html">Result Event</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Absensi
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">Buat Absensi</a>
                    <a class="dropdown-item" href="index.html">Hasil Absensi</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mata Pelajaran
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">Biologi</a>
                    <a class="dropdown-item" href="index.html">Kima</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="about.html">Wali Kelas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('User/Guru/Absensi/status'); ?>">Absensi</a>
            </li>


        </ul>


    </div>
</nav>

<!-- //navigation -->