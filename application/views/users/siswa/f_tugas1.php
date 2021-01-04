<html lang="en">

<head>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<body>
  <br>

  <div class="container  py-xl-5 py-lg-3">
    <div class="card">
      <div class="card-body">
        <h3><?= $tugas->mata_pelajaran ?></h3>
        <!-- <div class="container"> -->
        <div class="panel panel-default">
          <div class="panel-body">
            <!-- membuat form  -->
            <!-- gunakan tanda [] untuk menampung array  -->
            <form action="proses.php" method="POST">
              <div class="control-group after-add-more">
                <div class="form-group">
                  <div class="row">
                    <label for="birthDate" class="col-sm-2 control-label"><?= $tugas->NAMA ?> </label>
                  </div>
                  <hr>
                  <div class="form-group">
                    <a for="birthDate" class="col-sm-2 control-label">
                      <?= $tugas->keterangan ?></a>
                    <?php if ($tugas->file) : ?>
                      <br> <br>
                      <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” />&nbsp;<a href="<?php echo base_url() . 'User/Siswa/F_Tugas1/indexid/' . $tugas->file ?>"><?= $tugas->file ?></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br>
      <h3>Status</h3>
      <br>
      <?php if ($jawaban) :
        if ($jawaban->status == 3) : ?>
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Status pengiriman</td>
                <td>Belum Mengumpulkan</td>
              </tr>
              <tr>
                <td>Status penilaian</td>
                <td>-</td>
              </tr>
              <tr>
                <td>Batas waktu</td>
                <td><?= $tugas->TANGGAL ?></td>
              </tr>
              <tr>
                <td>Waktu yang tersisa</td>
                <td id="demo" style="color: red;">Jatuh tempo</td>

              </tr>
              <tr>
                <td>Terakhir diubah</td>
                <td>-</td>
              </tr>
              <!-- <tr>
          <td>add submissions</td>
          <td><input type="file" name="gambar_soal" id="gambar_soal" class="btn btn-success upload"> </td>
        </tr> -->
            </tbody>
          </table>
          <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">Tambahkan Pengumpulan</a>

        <?php elseif ($jawaban->status == 2) : ?>
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Status pengiriman</td>
                <td>Sudah Mengumpulkan</td>
              </tr>
              <?php if ($jawaban->nilai == 0) : ?>
                <tr>
                  <td>Status penilaian</td>
                  <td>Belum Dinilai</td>
                </tr>
              <?php else : ?>
                <tr>
                  <td>Status penilaian</td>
                  <td><?= $jawaban->nilai ?></td>
                </tr>
              <?php endif; ?>
              <tr>
                <td>Batas waktu</td>
                <td><?= $tugas->TANGGAL ?></td>
              </tr>
              <tr>
                <td>Waktu yang tersisa</td>
                <td style="background-color: red;">Telat</td>
              </tr>
              <tr>
                <td>Terakhir diubah</td>
                <td><?= $jawaban->tgl_kirim ?> </td>
              </tr>
              <?php if ($jawaban->FILEsiswa) : ?>
                <tr>
                  <td>File Pengiriman</td>
                  <td><a href="<?php echo base_url() . 'User/Siswa/F_Tugas1/indexid/' . $jawaban->FILEsiswa ?>"><?= $jawaban->FILEsiswa ?></a> </td>
                </tr>
              <?php else : ?>
                <tr>
                  <td>Online Text</td>
                  <td><?= $jawaban->text ?> </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">edit pengumpulan</a>

        <?php elseif ($jawaban->status == 1) : ?>
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Status pengiriman</td>
                <td>Sudah Mengumpulkan</td>
              </tr>
              <?php if ($jawaban->nilai == 0) : ?>
                <tr>
                  <td>Status penilaian</td>
                  <td>Belum Dinilai</td>
                </tr>
              <?php else : ?>
                <tr>
                  <td>Status penilaian</td>
                  <td><?= $jawaban->nilai ?></td>
                </tr>
              <?php endif; ?>
              <tr>
                <td>Batas waktu</td>
                <td><?= $tugas->TANGGAL ?></td>
              </tr>
              <tr>
                <td>Waktu yang tersisa</td>
                <?php if ($satu) : ?>
                  <td style="background-color: lightseagreen;">Tepat Waktu</td>
                <?php else : ?>
                  <td id="demo" style="background-color: lightseagreen;"></td>
                  <script>
                    // Mengatur waktu akhir perhitungan mundur
                    var countDownDate = new Date("<?= $tugas->TANGGAL; ?>").getTime();

                    // Memperbarui hitungan mundur setiap 1 detik
                    var x = setInterval(function() {

                      // Untuk mendapatkan tanggal dan waktu hari ini
                      var now = new Date().getTime();

                      // Temukan jarak antara sekarang dan tanggal hitung mundur
                      var distance = countDownDate - now;

                      // Perhitungan waktu untuk hari, jam, menit dan detik
                      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                      // Keluarkan hasil dalam elemen dengan id = "demo"
                      document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                        minutes + "m " + seconds + "s ";

                      // Jika hitungan mundur selesai, tulis beberapa teks 
                      if (distance < 0) {
                        document.getElementById("demo").innerHTML = "Tepat Waktu";
                      }
                    }, 1000);
                  </script>
                <?php endif; ?>
              </tr>
              <tr>
                <td>terakhir diubah</td>
                <td><?= $jawaban->tgl_kirim ?> </td>
              </tr>
              <?php if ($jawaban->FILEsiswa) : ?>
                <tr>
                  <td>File Pengiriman</td>
                  <td><a href="<?php echo base_url() . 'User/Siswa/F_Tugas1/indexid/' . $jawaban->FILEsiswa ?>"><?= $jawaban->FILEsiswa ?></a></td>
                </tr>
              <?php else : ?>
                <tr>
                  <td>Online Text</td>
                  <td><?= $jawaban->text ?> </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
          <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">edit pengumpulan</a>
        <?php endif; ?>

      <?php else : ?>
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Status pengiriman</td>
              <td>Belum Mengumpulkan</td>
            </tr>
            <tr>
              <td>Status penilaian</td>
              <td>-</td>
            </tr>
            <tr>
              <td>Batas waktu</td>
              <td><?= $tugas->TANGGAL ?></td>
            </tr>
            <tr>
              <td>Waktu yang tersisa</td>
              <td id="demo"></td>
              <script>
                // Mengatur waktu akhir perhitungan mundur
                var countDownDate = new Date("<?= $tugas->TANGGAL; ?>").getTime();

                // Memperbarui hitungan mundur setiap 1 detik
                var x = setInterval(function() {

                  // Untuk mendapatkan tanggal dan waktu hari ini
                  var now = new Date().getTime();

                  // Temukan jarak antara sekarang dan tanggal hitung mundur
                  var distance = countDownDate - now;

                  // Perhitungan waktu untuk hari, jam, menit dan detik
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Keluarkan hasil dalam elemen dengan id = "demo"
                  document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                    minutes + "m " + seconds + "s ";

                  // Jika hitungan mundur selesai, tulis beberapa teks 
                  if (distance < 0) {
                    document.getElementById("demo").innerHTML = "Assagment Over Due";
                  }
                }, 1000);
              </script>
            </tr>
            <tr>
              <td>Terakhir diubah</td>
              <td>-</td>
            </tr>
            <!-- <tr>
          <td>add submissions</td>
          <td><input type="file" name="gambar_soal" id="gambar_soal" class="btn btn-success upload"> </td>
        </tr> -->
          </tbody>
        </table>
        <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">Tambahkan pengumpulan</a>
      <?php endif; ?>
      <br>
      <br>
    </div>
  </div>
  </div>
  </div>
</body>

</html>