<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<?php
$absen = "SELECT * FROM `absen_siswa`
JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
JOIN penjurusan ON mengajar.id_jurusan = penjurusan.id_jurusan ";

$absensi = $this->db->query($absen)->result();
$d = 0;
foreach ($absensi as $a) : {

    $quer = "SELECT * FROM siswa
            WHERE NOT EXISTS
            (SELECT * FROM tr_absen_siswa WHERE siswa.nis = tr_absen_siswa.nis AND tr_absen_siswa.id_absen = $a->id_absen)
            AND siswa.id_jurusan = $a->id_jurusan";

    $gu = $this->db->query($quer)->result();
    $s = 0;
    foreach ($gu as $g) : {
?>
        <a hidden href="<?= base_url('Auto/Auto/' . $a->id_absen . '/' . $g->nis); ?>" id="lo<?= $d, $s; ?>">GAS</a>
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
            document.getElementById("lo<?= $d, $s; ?>").click();
          }
        </script>
      <?php
      }
      $s++;
    endforeach;
  }
  $d++;
endforeach;

$absen = "SELECT * FROM absen_guru";

$absensi = $this->db->query($absen)->result();
$a = 0;
foreach ($absensi as $ab) : {

    $que = "SELECT * FROM guru
  WHERE NOT EXISTS
  (SELECT * FROM tr_absen_guru WHERE guru.nip = tr_absen_guru.nip AND tr_absen_guru.id_absen = $ab->id_absen)";
    $gula = $this->db->query($que)->result();
    $b = 0;
    foreach ($gula as $gua) : { ?>
        <a hidden href="<?= base_url('Auto/Auto1/' . $ab->id_absen . '/' . $gua->nip); ?>" id="lo<?= $a, $b; ?>">GAS</a>
        <script>
          // Mengatur waktu akhir perhitungan mundur
          var countDownDate = new Date("<?= $ab->tanggal_berakhir; ?>").getTime();

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
            document.getElementById("lo<?= $a, $b; ?>").click();
          }
        </script>
      <?php }
      $b++;
    endforeach;
  }
  $a++;
endforeach;
$kuis = "SELECT * FROM kuis 
JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar
JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan";

$kuiss = $this->db->query($kuis)->result();
$aa = 0;
foreach ($kuiss as $t) : {
    $ujian = "SELECT * FROM siswa
    WHERE NOT EXISTS
    (SELECT * FROM ikut_ujian WHERE siswa.nis = ikut_ujian.nis AND ikut_ujian.id_kuis = $t->id_kuis)
    AND siswa.id_jurusan=$t->id_jurusan";
    $jawabann = $this->db->query($ujian)->result();
    $bb = 0;
    foreach ($jawabann as $j) : { ?>

        <a hidden href="<?= base_url('Auto/Auto2/' . $t->id_kuis . '/' . $j->nis); ?>" id="lo<?= $aa, $bb; ?>">GAS</a>
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
            document.getElementById("lo<?= $aa, $bb; ?>").click();


          }
        </script>
      <?php }
      $bb++;
    endforeach;
  }
  $aa++;
endforeach;
$tugas = "SELECT * FROM tugas_siswa 
JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar
JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan";

$kuiss = $this->db->query($tugas)->result();

$aaa = 0;
foreach ($kuiss as $ta) : {
    $jawaban = "SELECT * FROM siswa
    WHERE NOT EXISTS
    (SELECT * FROM jawaban_tugas WHERE siswa.nis = jawaban_tugas.nis AND jawaban_tugas.id_tugas = $ta->id_tugas)
    AND siswa.id_jurusan=$ta->id_jurusan";
    $jawabann = $this->db->query($jawaban)->result();
    $bbb = 0;
    foreach ($jawabann as $ja) : { ?>
        <a hidden href="<?= base_url('Auto/Auto3/' . $ta->id_tugas . '/' . $ja->nis); ?>" id="lo<?= $aaa, $bbb; ?>">GAS</a>
        <script>
          // Mengatur waktu akhir perhitungan mundur
          var countDownDate = new Date("<?= $ta->tanggal_berakhir; ?>").getTime();

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
            document.getElementById("lo<?= $aaa, $bbb; ?>").click();
          }
        </script>
<?php }
      $bbb++;
    endforeach;
  }
  $aaa++;
endforeach;
?>