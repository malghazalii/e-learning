<br>

<body onload="JavaScript:AutoRefresh(30000);">
  <div class="container">
    <img src="<?php echo base_url(); ?>assets/users/images/menu.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Ringkasan Tugas</strong>
    <hr>
    <button type="button" class="btn btn-primary">Semua</button>
    <button type="button" class="btn btn-danger">Mata Pelajaran</button>
    <br>
    <br>
    <div class="card">
      <h5 class="card-header">Tugas Terlambat</h5>
      <div class="card-body">
        <?php foreach ($tugastelat as $t) : ?>
          <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $t->NAMA ?>
          <button type="button" class="btn btn-outline-danger" style="float:right;">Pergi ke aktifitas</button>
          <p class="card-text-left"><?= $t->tanggal_berakhir ?></p>
          <hr>
        <?php endforeach; ?>
      </div>
    </div>
    <br>
    <div class="card">
      <h5 class="card-header">Tugas Akan Datang</h5>
      <div class="card-body">
        <h5 class="card-header">Absensi</h5>
        <div class="card-body">
          <?php
          if ($absen->id_jurusan == $siswa->id_jurusan) :
            $s = 0;
            foreach ($absensi as $a) : ?>
              <div id="absen<?= $s; ?>">
                <img src="<?php echo base_url(); ?>assets/users/images/create.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $a->mata_pelajaran ?>
                <button type="button" class="btn btn-outline-primary" style="float:right;">Pergi ke aktifitas</button>
                <p class="card-text-left"><?= $a->tanggal ?></p>
                <hr>
              </div>
              <form action="<?= base_url('User/Siswa/Absensi/inputData/' . $a->id_absen); ?>" method="POST">
                <button hidden id="boton<?= $s; ?>" type="submit">gas</button>
              </form>
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

                  $("#absen<?= $s; ?>").remove();
                  window.onload = function() {
                    var button<?= $s; ?> = document.getElementById('boton<?= $s; ?>');
                    button<?= $s; ?>.form.submit();
                  }
                }
              </script>
          <?php
              $s++;
            endforeach;
          endif; ?>
        </div>
        <h5 class="card-header">Tugas</h5>
        <div class="card-body">
          <?php
          if ($tugass->id_jurusan == $siswa->id_jurusan) :
            $s = 0;
            foreach ($tugas as $t) : ?>
              <div id="tugas<?= $s; ?>">
                <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $t->NAMA ?>
                <button type="button" class="btn btn-outline-primary" style="float:right;">Pergi ke aktifitas</button>
                <p class="card-text-left"><?= $t->tanggal_berakhir ?></p>
                <hr>
              </div>
              <form action="<?= base_url('User/Siswa/Tugas/updateData/' . $t->id_tugas); ?>" method="POST">
                <button hidden id="boton<?= $s; ?>" type="submit">gas</button>
              </form>
              <script>
                // Mengatur waktu akhir perhitungtitan mundur

                var countDownDate = new Date("<?= $t->tanggal_berakhir ?>").getTime();


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

                  $("#tugas<?= $s; ?>").remove();
                  window.onload = function() {
                    var button<?= $s; ?> = document.getElementById('boton<?= $s; ?>');
                    button<?= $s; ?>.form.submit();
                  }
                }
              </script>
          <?php
              $s++;
            endforeach;
          endif;
          ?>
        </div>
        <h5 class="card-header">Kuis</h5>
        <div class="card-body">
          <?php
          // if ($kuiss->id_jurusan == $siswa->id_jurusan) :
          $s = 0;
          foreach ($kuis as $k) : ?>
            <div id="kuis<?= $s; ?>">
              <img src="<?php echo base_url(); ?>assets/users/images/pie.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $k->nama_ujian ?>
              <button type="button" class="btn btn-outline-primary" style="float:right;">Pergi ke aktifitas</button>
              <p class="card-text-left"><?= $k->tanggal_berakhir ?></p>
              <hr>
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

                $("#kuis<?= $s; ?>").remove();
              }
            </script>
          <?php
            $s++;
          endforeach;
          // endif;
          ?>
        </div>
      </div>
    </div>
    <br>
  </div>
</body>