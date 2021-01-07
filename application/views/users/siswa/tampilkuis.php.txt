<div class="container  py-xl-5 py-lg-3">
  <div class="row justify-content-center pt-7">
    <div class="col-lg-10 agile-course-main">
      <div class="w3ls-cource-first">
        <div class="px-md-5 px-4  pb-md-5 pb-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <!-- membuat form  -->
              <!-- gunakan tanda [] untuk menampung array  -->
              <br>
              <div class="card-body">
                <form class="form-horizontal" role="form" action="<?= base_url('User/Siswa/Kuis/Tambah/'); ?>" method="POST" name="xyz">
                  <div class="form-group">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <?php $no = 1;
                    foreach ($soal as $n) : ?>
                      <input hidden type="text" id="id_ujian1" name="id_ujian1" value="<?= $n->id_ujian; ?>">
                      <input hidden type="text" name="id_kuis1" value="<?= $n->id_kuis; ?>">
                      <div class="row">
                        <div class="col-sm-9">
                          <?php if ($n->nama_file) : ?>
                            <p style="margin-left: 10px; color: black;"><strong><?= $no, '. ', $n->soal; ?></strong></p>
                            <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->nama_file); ?>" />
                          <?php else : ?>
                            <p style="margin-left: 10px; color: black;"><strong><?= $no, '. ', $n->soal; ?></strong></p>
                          <?php endif; ?>
                        </div>
                        <?php if ($n->sid == $n->trid) : ?>
                          <input hidden type="text" id="id_tr_kuis<?= $no; ?>" name="id_tr_kuis<?= $no; ?>" value="<?= $n->id_tr_kuis; ?>">
                          <div class="col-sm-9">
                            <?php
                            if ($n->gambarA !== '') {
                              $jawabanA = $n->gambarA;
                            } else if ($n->opsiA !== '') {
                              $jawabanA = $n->opsiA;
                            }
                            $slA = "SELECT * FROM jawaban_ujian WHERE id_ujian = $n->id_ujian AND jawaban = '$jawabanA'";
                            $alA = $this->db->query($slA)->row();
                            if ($n->gambarB !== '') {
                              $jawabanB = $n->gambarB;
                            } else if ($n->opsiB !== '') {
                              $jawabanB = $n->opsiB;
                            }
                            $slB = "SELECT * FROM jawaban_ujian WHERE id_ujian = $n->id_ujian AND jawaban = '$jawabanB'";
                            $alB = $this->db->query($slB)->row();
                            if ($n->gambarC !== '') {
                              $jawabanC = $n->gambarC;
                            } else if ($n->opsiC !== '') {
                              $jawabanC = $n->opsiC;
                            }
                            $slC = "SELECT * FROM jawaban_ujian WHERE id_ujian = $n->id_ujian AND jawaban = '$jawabanC'";
                            $alC = $this->db->query($slC)->row();
                            if ($n->gambarD !== '') {
                              $jawabanD = $n->gambarD;
                            } else if ($n->opsiD !== '') {
                              $jawabanD = $n->opsiD;
                            }
                            $slD = "SELECT * FROM jawaban_ujian WHERE id_ujian = $n->id_ujian AND jawaban = '$jawabanD'";
                            $alD = $this->db->query($slD)->row();
                            if ($n->gambarE !== '') {
                              $jawabanE = $n->gambarE;
                            } else if ($n->opsiE !== '') {
                              $jawabanE = $n->opsiE;
                            }
                            $slE = "SELECT * FROM jawaban_ujian WHERE id_ujian = $n->id_ujian AND jawaban = '$jawabanE'";
                            $alE = $this->db->query($slE)->row();

                            // var_dump($slA);
                            // echo '----';
                            // var_dump($slB);
                            // echo '----';
                            // var_dump($slC);
                            // echo '----';
                            // var_dump($slD);
                            // echo '----';
                            // var_dump($slE);
                            // echo '----';
                            // die;
                            if ($alA == null && $alB == null && $alC == null && $alD == null && $alE == null) :
                              $cekA = '';
                              $cekB = '';
                              $cekC = '';
                              $cekD = '';
                              $cekE = '';
                            elseif ($alA) :
                              $cekA = 'checked';
                              $cekB = '';
                              $cekC = '';
                              $cekD = '';
                              $cekE = '';
                            elseif ($alB) :
                              $cekA = '';
                              $cekB = 'checked';
                              $cekC = '';
                              $cekE = '';
                              $cekD = '';
                            elseif ($alC) :
                              $cekA = '';
                              $cekB = '';
                              $cekC = 'checked';
                              $cekD = '';
                              $cekE = '';
                            elseif ($alD) :
                              $cekA = '';
                              $cekB = '';
                              $cekC = '';
                              $cekD = 'checked';
                              $cekE = '';
                            elseif ($alE) :
                              $cekA = '';
                              $cekB = '';
                              $cekC = '';
                              $cekD = '';
                              $cekE = 'checked';
                            endif; ?>
                            <div id="myForm<?= $no; ?>">
                              <?php if ($n->opsiA && $n->opsiB && $n->opsiC && $n->opsiD && $n->opsiE) : ?>
                                <input type="radio" id="jawabanA" name="radioName<?= $no; ?>" <?= $cekA; ?> value="<?= $n->opsiA; ?>">
                                <label for="status">A. <?= $n->opsiA; ?></label><br />

                                <input type="radio" id="jawabanB" name="radioName<?= $no; ?>" <?= $cekB; ?> value="<?= $n->opsiB; ?>">
                                <label for="status">B. <?= $n->opsiB; ?></label><br />

                                <input type="radio" id="jawabanC" name="radioName<?= $no; ?>" <?= $cekC; ?> value="<?= $n->opsiC; ?>">
                                <label for="status">C. <?= $n->opsiC; ?></label><br />

                                <input type="radio" id="jawabanD" name="radioName<?= $no; ?>" <?= $cekD; ?> value="<?= $n->opsiD; ?>">
                                <label for="status">D. <?= $n->opsiD; ?></label><br />

                                <input type="radio" id="jawabanE" name="radioName<?= $no; ?>" <?= $cekE; ?> value="<?= $n->opsiE; ?>">
                                <label for="status">E. <?= $n->opsiE; ?></label><br />
                                <input hidden type="text" id="jawaban<?= $no; ?>" name="jawaban<?= $no; ?>" value="<?= $n->jawaban; ?>">
                              <?php else : ?>
                                <input type="radio" id="jawabanA" name="radioName<?= $no; ?>" <?= $cekA; ?> value="<?= $n->gambarA; ?>">
                                <label for="status">A. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarA); ?>" /></label><br />

                                <input type="radio" id="jawabanB" name="radioName<?= $no; ?>" <?= $cekB; ?> value="<?= $n->gambarB; ?>">
                                <label for="status">B. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarB); ?>" /></label><br />

                                <input type="radio" id="jawabanC" name="radioName<?= $no; ?>" <?= $cekC; ?> value="<?= $n->gambarC; ?>">
                                <label for="status">C. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarC); ?>" /></label><br />

                                <input type="radio" id="jawabanD" name="radioName<?= $no; ?>" <?= $cekD; ?> value="<?= $n->gambarD; ?>">
                                <label for="status">D. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarD); ?>" /></label><br />

                                <input type="radio" id="jawabanE" name="radioName<?= $no; ?>" <?= $cekE; ?> value="<?= $n->gambarE; ?>">
                                <label for="status">E. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarE); ?>" /></label><br />
                                <input hidden type="text" id="jawaban<?= $no; ?>" name="jawaban<?= $no; ?>" value="<?= $n->jawaban; ?>">
                              <?php endif; ?>
                            </div>
                          </div>
                        <?php else : ?>
                          <input hidden type="text" id="id_tr_kuis<?= $no; ?>" name="id_tr_kuis<?= $no; ?>" value="<?= $n->id_tr_kuis; ?>">
                          <div class="col-sm-9">
                            <textarea style="margin: 10px;" name="jawaban<?= $no; ?>" id="jawaban<?= $no; ?>" cols="90" rows="10"><?= $n->jawaban; ?></textarea>
                          </div>
                        <?php endif; ?>
                      </div>
                      <script>
                        $('#myForm<?= $no; ?> input').on('change', function() {
                          $('#jawaban<?= $no; ?>').val($('input[name=radioName<?= $no; ?>]:checked', '#myForm<?= $no; ?>').val());
                        });
                      </script>
                      <script>
                        $(document).ready(function() {

                          function autoSave() {

                            var post_jawaban = $('#jawaban<?= $no; ?>').val();
                            var post_id_ujian1 = $('#id_ujian1').val();
                            var post_id_tr_kuis = $('#id_tr_kuis<?= $no; ?>').val();
                            // document.getElementById("anjir").innerHTML = $('#jawaban4').val();
                            $.ajax({
                              url: "<?= base_url('/User/Siswa/Kuis/Tambah/'); ?>" + post_id_ujian1,
                              method: "POST",
                              data: {
                                id_tr_kuis: post_id_tr_kuis,
                                jawaban: post_jawaban
                              },
                              dataType: "text",
                            });
                          }
                          setInterval(function() {
                            autoSave();
                          }, 1000);
                        });
                      </script>
                    <?php $no++;
                    endforeach; ?>
                    <!-- <p id="anjir"></p> -->
                    <div class="col-sm-9">
                      <h3 id="demo"></h3>
                    </div>

                  </div>
              </div>
            </div>
            <a id="gas" type="submit" class="btn btn-success" style="float: right; width: 25%;" href="<?= base_url('User/Siswa/Kuis/Selesai/' . $soal1->id_ujian . '/' . $kuis->id_kuis); ?>">Selesai</a>
            <script>
              // Mengatur waktu akhir perhitungan mundur
              var countDownDate = new Date("<?= $kuis->tanggal_berakhir; ?>").getTime();

              var x = setInterval(function() {
                // Memperbarui hitungan mundur setiap 1 detik

                // Untuk mendapatkan tanggal dan waktu hari ini
                var now = new Date().getTime();

                // Temukan jarak antara sekarang dan tanggal hitung mundur
                var distance = countDownDate - now;

                // Perhitungan waktu untuk hari, jam, menit dan detik
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Keluarkan hasil dalam elemen dengan id = "demo"
                document.getElementById("demo1").innerHTML = hours + "h " +
                  minutes + "m " + seconds + "s ";

                // Jika hitungan mundur selesai, tulis beberapa teks 
                if (distance < 0) {
                  document.getElementById("gas").click();
                }
              }, 1000);
            </script>
            <?php
            $a = $this->session->userdata('now');
            $b = strtotime($a . "+" . $kuis->menit . "minute");
            $tanggal = date("Y-m-d H:i:s", $b);
            ?>

            <script>
              // Mengatur waktu akhir perhitungan mundur
              var countDownDate = new Date("<?= $tanggal; ?>").getTime();

              // Memperbarui hitungan mundur setiap 1 detik
              var x = setInterval(function() {

                // Untuk mendapatkan tanggal dan waktu hari ini
                var now = new Date().getTime();

                // Temukan jarak antara sekarang dan tanggal hitung mundur
                var distance = countDownDate - now;

                // Perhitungan waktu untuk hari, jam, menit dan detik
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Keluarkan hasil dalam elemen dengan id = "demo"
                document.getElementById("demo").innerHTML = hours + "h " +
                  minutes + "m " + seconds + "s ";

                // Jika hitungan mundur selesai, tulis beberapa teks 
                if (distance < 0) {

                  document.getElementById("demo").innerHTML = "EXPIRED";
                  document.getElementById("gas").click();
                }
              }, 1000);
            </script>
            </form>
            </br>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #1D244F;
    color: white;
    text-align: left;
  }
</style>

<?php
if (strpos($_SERVER['REQUEST_URI'], 'Guru/BuatKuis') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/Dashboard') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/TampilKuis') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Siswa/F_Tugas1/tugas1') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Siswa/F_Tugas1/tugas') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Siswa/Kuis/Ikut') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Siswa/Absensi/absen') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/kuisessay/kuis') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/UploadMateri') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/EssayEvent') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/Kuisessay') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/KuisPilgan/edit') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/KuisEssay/edit') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/Report_absensi') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/Absensi') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'guru/uploadmateri/editMateri') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], '/guru/mapel/tugas') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/Mapel/Koreksi') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'guru/essayevent/editTugas') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/wali_kelas/DaftarSiswa') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/wali_kelas/AbsenSiswa') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/wali_kelas/PenilaianMapel') !== false) {
?>
  <div class="footer" style="position:static">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/kuispilgan') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} elseif (strpos($_SERVER['REQUEST_URI'], 'Guru/kuisessay') !== false) {
?>
  <div class="footer" style="position:fixed">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>
<?php
} else {
?>
  <div class="footer">
    <div class="container">
      <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
    </div>
  </div>

<?php
}
?>
<!-- Js files -->
<!-- JavaScript -->
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<!-- smooth scrolling -->
<script src="<?= base_url('assets/users/') ?>js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->

<!-- move-top -->
<script src="<?= base_url('assets/users/') ?>js/move-top.js"></script>
<!-- easing -->
<script src="<?= base_url('assets/users/') ?>js/easing.js"></script>
<!--  necessary snippets for few javascript files -->
<script src="<?= base_url('assets/users/') ?>js/edulearn.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- //Js files -->


</body>

</html>