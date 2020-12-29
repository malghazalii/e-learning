<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="course-w3ls py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Absensi
        </h3>
        <div class="row justify-content-center pt-7">
            <div class="col-lg-10 agile-course-main">
                <div class="w3ls-cource-first">
                    <div class="px-md-5 px-4  pb-md-5 pb-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal Berakhir</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">Mapel</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="col">Poin</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($absen as $a) : ?>
                                    <tr>
                                        <td><?= $a->tanggal_berakhir ?></td>
                                        <td><?= $a->nama ?></td>
                                        <td><?= $a->mata_pelajaran ?></td>
                                        <td>
                                            <?php
                                            if ($a->status == 1) {
                                                echo 'Hadir';
                                            } elseif ($a->status == 2) {
                                                echo 'Sakit';
                                            } elseif ($a->status == 3) {
                                                echo 'Ijin';
                                            } elseif ($a->status == 4) {
                                                echo 'Terlambat';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php
                        $s = 0;
                        foreach ($tanggal as $a) :


                        ?>
                            <?php if ($a->mata_pelajaran == "Bahasa Indonesia") : ?>
                                <table id="Perulangan<?= $s; ?>" class="table table-striped">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $a->tanggal_berakhir; ?></td>
                                            <td><?= $a->nama ?></td>
                                            <td><?= $a->mata_pelajaran ?></td>
                                            <td>
                                                <?php echo anchor(base_url('User/Siswa/Absensi/status/' . $a->id_absen), 'Belum Absen'); ?>
                                            </td>
                                            <!-- <td>2 / 2</td> -->
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- <p id="demo<?= $s; ?>"></p> -->
                                <script>
                                    // Mengatur waktu akhir perhitungtitan mundur

                                    var countDownDate = new Date("<?= $a->tanggal_berakhir ?>").getTime();

                                    // Memperbarui hitungan mundur setiap 1 detik


                                    // Untuk mendapatkan tanggal dan waktu hari ini
                                    var now = new Date().getTime();

                                    // Temukan jarak antara sekarang dan tanggal hitung mundur
                                    var distance = countDownDate - now;

                                    // // Perhitungan waktu untuk hari, jam, menit dan detik
                                    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    // Keluarkan hasil dalam elemen dengan id = "demo"
                                    // document.getElementById("demo<?= $s; ?>").innerHTML = days + "d " + hours + "h " +
                                    // 	minutes + "m " + seconds + "s ";

                                    // Jika hitungan mundur selesai, tulis beberapa teks
                                    if (distance < 0) {
                                        //document.getElementById("Perulangan<?= $s; ?>").innerHTML = "";
                                        // document.getElementById("demo<?= $s; ?>").innerHTML = "";
                                        $("#Perulangan<?= $s; ?>").remove();
                                    }
                                </script>
                            <?php endif; ?>
                        <?php

                            $s++;
                        endforeach;
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 agile-course-main-2 mt-4">
                <img src="images/am1.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>