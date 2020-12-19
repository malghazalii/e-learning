<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<br>

<body onload="JavaScript:AutoRefresh(30000);">
  <div class="container">
    <img src="<?php echo base_url(); ?>assets/users/images/menu.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Event Guru</strong>
    <hr>
    <div class="card">
      <h5 class="card-header">Absensi</h5>
      <div class="card-body">
        <?php
        $s = 0;
        foreach ($absen as $a) : ?>
          <div id="ulang<?= $s; ?>">
            <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $a->mata_pelajaran ?> <?= $a->kelas ?> <?= $a->nama_jurusan ?>
            <a href="<?= base_url('User/Guru/Report_absensi/mengajar/' . $a->id_jurusan); ?>" class="btn btn-outline-danger" style="float:right;">Cek Hasil Absensi</a>
            <p class="card-text-left"><?= $a->tanggal ?></p>
            <hr>
          </div>
          <script>
            // Mengatur waktu akhir perhitungtitan mundur

            var countDownDate = new Date("<?= $a->tanggal ?>").getTime();


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
            // document.getElementById("coba<?= $s; ?>").innerHTML = days + "d " + hours + "h " +
            //   minutes + "m " + seconds + "s ";

            // Jika hitungan mundur selesai, tulis beberapa teks
            if (distance < 0) {
              //document.getElementById("Perulangan<?= $s; ?>").innerHTML = "";
              // document.getElementById("demo<?= $s; ?>").innerHTML = "";

              $("#ulang<?= $s; ?>").remove();
            }
          </script>
        <?php
          $s++;
        endforeach; ?>
      </div>
    </div>
    <br>

    <div class="card">
      <h5 class="card-header">Tugas</h5>
      <div class="card-body">
        <?php
        $s = 0;
        foreach ($tugas as $t) : ?>
          <div id="perulangan<?= $s; ?>">
            <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $t->NAMA ?>
            <a href="#" class="btn btn-outline-danger" style="float:right;">Cek Pengumpulan Tugas</a><br>
            <a href="<?php echo base_url() . 'User/Guru/Dashboard/indexid/' . $t->file ?>"><?= $t->file ?></a>
            <p class="card-text-left"><?= $t->TANGGAL ?></p>
            <hr>
          </div>
          <script>
            // Mengatur waktu akhir perhitungtitan mundur

            var countDownDate = new Date("<?= $t->TANGGAL ?>").getTime();


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
            // document.getElementById("coba<?= $s; ?>").innerHTML = days + "d " + hours + "h " +
            //   minutes + "m " + seconds + "s ";

            // Jika hitungan mundur selesai, tulis beberapa teks
            if (distance < 0) {
              //document.getElementById("Perulangan<?= $s; ?>").innerHTML = "";
              // document.getElementById("demo<?= $s; ?>").innerHTML = "";

              $("#perulangan<?= $s; ?>").remove();
            }
          </script>
        <?php
          $s++;
        endforeach; ?>
      </div>
    </div>
    <br>
    <div class="card">
      <h5 class="card-header">Kuis</h5>
      <?php
      $s = 0;
      foreach ($kuis as $k) : ?>
        <div class="card-body" id="looping<?= $s ?>">
          <img src="<?php echo base_url(); ?>assets/users/images/pie.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $k->nama_ujian ?>
          <p><?= $k->jenis ?></p>
          <p class="card-text-left"><?= $k->tanggal_berakhir ?></p>
        </div>
        <script>
          // Mengatur waktu akhir perhitungtitan mundur

          var countDownDate = new Date("<?= $k->tanggal_berakhir ?>").getTime();


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
          // document.getElementById("coba<?= $s; ?>").innerHTML = days + "d " + hours + "h " +
          //   minutes + "m " + seconds + "s ";

          // Jika hitungan mundur selesai, tulis beberapa teks
          if (distance < 0) {
            //document.getElementById("Perulangan<?= $s; ?>").innerHTML = "";
            // document.getElementById("demo<?= $s; ?>").innerHTML = "";

            $("#looping<?= $s; ?>").remove();
          }
        </script>
      <?php
        $s++;
      endforeach; ?>
    </div>
    <br>
  </div>
  </div>
  <br>


</body>