<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?= $title; ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Edulearn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        function AutoRefresh(t) {
            setTimeout("location.reload(true);", t);
        }
    </script>
    <!--// Meta tag Keywords -->

    <!-- Custom-Files -->
    <!-- Bootstrap-Core-Css -->
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/custom.css">
    <!-- Style-Css -->
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/style.css" type="text/css" media="all" />
    <!-- Font-Awesome-Icons-Css -->
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/fontawesome-all.css">
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Web-Fonts -->

    <style>
        @media screen and (max-width: 640px) {
            .cek {
                margin-left: 150px;
            }
        }
    </style>

</head>

<body>
    <!-- header -->
    <header>
        <!-- top header -->
        <div style="background-color:#1D244F" class="top-head-w3ls py-2">
            <div class="container">
                <div class="row">
                    <h1 class="text-capitalize text-white col-7">
                        <i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>welcome to eLearning</h1>
                    <!-- social icons -->
                    <a style="margin-left: 325px;" class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $nip = $this->session->userdata('nip');
                        $nis = $this->session->userdata('nis');
                        if ($nip) {
                            $guru = "SELECT * FROM guru WHERE nip=$nip";
                            $nama = $this->db->query($guru)->row();
                            echo $nama->nama;
                        } else if ($nis) {
                            $siswa = "SELECT * FROM siswa WHERE nis=$nis";
                            $nama = $this->db->query($siswa)->row();
                            echo $nama->nama;
                        } ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="btn btn-primary dropdown-item" href="<?= base_url('Auth/logout/'); ?>">Logout</a>
                    </div>
                    <!-- //social icons -->
                </div>
            </div>
        </div>
        <!-- //top header -->
        <!-- middle header -->
        <div style="background-color:#182A6E" class="middle-w3ls-nav py-2">
            <div class="container">
                <div class="row">
                    <img class="cek" src="<?php echo base_url(); ?>assets/users/images/LOGOBRO.png" alt="Image" height="100" width="100">
                    <a class="logo  font-weight-bold col-lg-4 text-lg-left text-center" href="index.html">SMAN 1 Bondowoso</a>

                </div>
            </div>
        </div>
        <!-- //middle header -->
    </header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php
    $absen = "SELECT * FROM `absen_siswa`
JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
JOIN penjurusan ON mengajar.id_jurusan = penjurusan.id_jurusan ";

    $absensi = $this->db->query($absen)->result();

    foreach ($absensi as $a) : {

            $quer = "SELECT * FROM siswa
            WHERE NOT EXISTS
            (SELECT * FROM tr_absen_siswa WHERE siswa.nis = tr_absen_siswa.nis AND tr_absen_siswa.id_absen = $a->id_absen)
            AND siswa.id_jurusan = $a->id_jurusan";

            $gu = $this->db->query($quer)->result();
            foreach ($gu as $g) : {
    ?>

                    <script>
                        // Mengatur waktu akhir perhitungan mundur
                        var countDownDate = new Date("<?= $a->tanggal; ?>").getTime();

                        // Memperbarui hitungan mundur setiap 1 detik


                        // Untuk mendapatkan tanggal dan waktu hari ini
                        var now = new Date().getTime();

                        // Temukan jarak antara sekarang dan tanggal hitung mundur
                        var distance = countDownDate - now;

                        // Perhitungan waktu untuk hari, jam, menit dan detik
                        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // // Keluarkan hasil dalam elemen dengan id = "demo"
                        // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                        //   minutes + "m " + seconds + "s ";

                        // Jika hitungan mundur selesai, tulis beberapa teks 
                        if (distance < 0) {
                            // clearInterval(x);
                            // document.getElementById("lo<?= $d, $s; ?>").innerHTML = "EX";
                            <?php $data = [
                                'id_absen' => $a->id_absen,
                                'nis' => $g->nis,
                                'status' => '4'
                            ];

                            $this->db->insert('tr_absen_siswa', $data);
                            ?>
                        }
                    </script>
                <?php
                }
            endforeach;
        }
    endforeach;

    $absen = "SELECT * FROM absen_guru";

    $absensi = $this->db->query($absen)->result();

    foreach ($absensi as $ab) : {

            $que = "SELECT * FROM guru
  WHERE NOT EXISTS
  (SELECT * FROM tr_absen_guru WHERE guru.nip = tr_absen_guru.nip AND tr_absen_guru.id_absen = $ab->id_absen)";
            $gul = $this->db->query($que)->result();
            foreach ($gul as $gu) : { ?>

                    <script>
                        // Mengatur waktu akhir perhitungan mundur
                        var countDownDate = new Date("<?= $a->tanggal; ?>").getTime();

                        // Memperbarui hitungan mundur setiap 1 detik


                        // Untuk mendapatkan tanggal dan waktu hari ini
                        var now = new Date().getTime();

                        // Temukan jarak antara sekarang dan tanggal hitung mundur
                        var distance = countDownDate - now;

                        // Perhitungan waktu untuk hari, jam, menit dan detik
                        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // // Keluarkan hasil dalam elemen dengan id = "demo"
                        // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                        //   minutes + "m " + seconds + "s ";

                        // Jika hitungan mundur selesai, tulis beberapa teks 
                        if (distance < 0) {
                            // clearInterval(x);
                            <?php $data = [
                                'id_absen' => $ab->id_absen,
                                'nip' => $gu->nip,
                                'status' => '4'
                            ];

                            $this->db->insert('tr_absen_guru', $data);
                            ?>
                        }
                    </script>
                <?php }
            endforeach;
        }
    endforeach;
    $kuis = "SELECT * FROM kuis 
JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar
JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan";

    $kuiss = $this->db->query($kuis)->result();

    foreach ($kuiss as $t) : {
            $ujian = "SELECT * FROM siswa
    WHERE NOT EXISTS
    (SELECT * FROM ikut_ujian WHERE siswa.nis = ikut_ujian.nis AND ikut_ujian.id_kuis = $t->id_kuis)
    AND siswa.id_jurusan=$t->id_jurusan";
            $jawabann = $this->db->query($ujian)->result();
            foreach ($jawabann as $j) : { ?>

                    <script>
                        // Mengatur waktu akhir perhitungan mundur
                        var countDownDate = new Date("<?= $t->tanggal_berakhir; ?>").getTime();

                        // Memperbarui hitungan mundur setiap 1 detik


                        // Untuk mendapatkan tanggal dan waktu hari ini
                        var now = new Date().getTime();

                        // Temukan jarak antara sekarang dan tanggal hitung mundur
                        var distance = countDownDate - now;

                        // Perhitungan waktu untuk hari, jam, menit dan detik
                        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // // Keluarkan hasil dalam elemen dengan id = "demo"
                        // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                        //   minutes + "m " + seconds + "s ";

                        // Jika hitungan mundur selesai, tulis beberapa teks 
                        if (distance < 0) {
                            // clearInterval(x);
                            <?php $data = [
                                'nis' => $j->nis,
                                'id_kuis' => $t->id_kuis,
                                'nilai' => 0,
                                'status' => '2'
                            ];

                            $this->db->insert('ikut_ujian', $data);
                            ?>

                        }
                    </script>
                <?php }
            endforeach;
        }
    endforeach;
    $tugas = "SELECT * FROM tugas_siswa 
JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar
JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan";

    $kuiss = $this->db->query($tugas)->result();

    foreach ($kuiss as $t) : {
            $jawaban = "SELECT * FROM siswa
    WHERE NOT EXISTS
    (SELECT * FROM jawaban_tugas WHERE siswa.nis = jawaban_tugas.nis AND jawaban_tugas.id_tugas = $t->id_tugas)
    AND siswa.id_jurusan=$t->id_jurusan";
            $jawabann = $this->db->query($jawaban)->result();
            foreach ($jawabann as $j) : { ?>

                    <script>
                        // Mengatur waktu akhir perhitungan mundur
                        var countDownDate = new Date("<?= $t->tanggal_berakhir; ?>").getTime();

                        // Memperbarui hitungan mundur setiap 1 detik


                        // Untuk mendapatkan tanggal dan waktu hari ini
                        var now = new Date().getTime();

                        // Temukan jarak antara sekarang dan tanggal hitung mundur
                        var distance = countDownDate - now;

                        // Perhitungan waktu untuk hari, jam, menit dan detik
                        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // // Keluarkan hasil dalam elemen dengan id = "demo"
                        // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                        //   minutes + "m " + seconds + "s ";

                        // Jika hitungan mundur selesai, tulis beberapa teks 
                        if (distance < 0) {
                            // clearInterval(x);
                            <?php $data = [
                                'id_tugas' => $t->id_tugas,
                                'nis' => $j->nis,
                                'status' => '2',
                                'nilai' => 0
                            ];

                            $this->db->insert('jawaban_tugas', $data);
                            ?>

                        }
                    </script>
    <?php }
            endforeach;
        }
    endforeach;
    ?>/
    <!-- //header -->