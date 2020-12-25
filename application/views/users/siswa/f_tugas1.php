<html lang="en">

<head>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
  <br>

  <div class="container  py-xl-5 py-lg-3">
    <h3><?= $tugas->mata_pelajaran ?></h3>
  </div>

  <div class="container">

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
    <br>
    <h3>Status</h3>
    <br>
    <?php if ($jawaban) :
      if ($jawaban->status == 3) : ?>
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Submission status</td>
              <td>No attempt</td>
            </tr>
            <tr>
              <td>Grading status</td>
              <td>Not gradedThornton</td>
            </tr>
            <tr>
              <td>Due date</td>
              <td><?= $tugas->TANGGAL ?></td>
            </tr>
            <tr>
              <td>Time remaining</td>
              <td style="color: red;">10 hours 50 mins</td>
            </tr>
            <tr>
              <td>Last modified</td>
              <td>-</td>
            </tr>
            <!-- <tr>
          <td>add submissions</td>
          <td><input type="file" name="gambar_soal" id="gambar_soal" class="btn btn-success upload"> </td>
        </tr> -->
          </tbody>
        </table>
        <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">add submission</a>

      <?php elseif ($jawaban->status == 2) : ?>
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Submission status</td>
              <td>Submitted for grading</td>
            </tr>
            <?php if ($jawaban->nilai == 0) : ?>
              <tr>
                <td>Grading status</td>
                <td>Not gradedThornton</td>
              </tr>
            <?php else : ?>
              <tr>
                <td>Grading status</td>
                <td><?= $jawaban->nilai ?></td>
              </tr>
            <?php endif; ?>
            <tr>
              <td>Due date</td>
              <td><?= $tugas->TANGGAL ?></td>
            </tr>
            <tr>
              <td>Time remaining</td>
              <td style="background-color: red;">Assignment is overdue by: 10 hours 50 mins</td>
            </tr>
            <tr>
              <td>Last modified</td>
              <td><?= $jawaban->tgl_kirim ?> </td>
            </tr>
            <?php if ($jawaban->FILEsiswa) : ?>
              <tr>
                <td>File Submission</td>
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
        <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">edit submission</a>

      <?php elseif ($jawaban->status == 1) : ?>
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>Submission status</td>
              <td>Submitted for grading</td>
            </tr>
            <?php if ($jawaban->nilai == 0) : ?>
              <tr>
                <td>Grading status</td>
                <td>Not gradedThornton</td>
              </tr>
            <?php else : ?>
              <tr>
                <td>Grading status</td>
                <td><?= $jawaban->nilai ?></td>
              </tr>
            <?php endif; ?>
            <tr>
              <td>Due date</td>
              <td><?= $tugas->TANGGAL ?></td>
            </tr>
            <tr>
              <td>Time remaining</td>
              <td style="background-color: lightseagreen;">10 hours 50 mins</td>
            </tr>
            <tr>
              <td>Last modified</td>
              <td><?= $jawaban->tgl_kirim ?> </td>
            </tr>
            <?php if ($jawaban->FILEsiswa) : ?>
              <tr>
                <td>File Submission</td>
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
        <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">edit submission</a>
      <?php endif; ?>

    <?php else : ?>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Submission status</td>
            <td>No attempt</td>
          </tr>
          <tr>
            <td>Grading status</td>
            <td>Not gradedThornton</td>
          </tr>
          <tr>
            <td>Due date</td>
            <td><?= $tugas->TANGGAL ?></td>
          </tr>
          <tr>
            <td>Time remaining</td>
            <td>10 hours 50 mins</td>
          </tr>
          <tr>
            <td>Last modified</td>
            <td>-</td>
          </tr>
          <!-- <tr>
          <td>add submissions</td>
          <td><input type="file" name="gambar_soal" id="gambar_soal" class="btn btn-success upload"> </td>
        </tr> -->
        </tbody>
      </table>
      <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas1/' . $tugas->id_tugas); ?>" class="btn btn-primary center-block" type="submit">add submission</a>
    <?php endif; ?>
    <hr>
    <br>
    <br>
  </div>
</body>

</html>