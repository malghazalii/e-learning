<!-- banner -->



<!-- //navigation -->
<html lang="en">

<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
  <br>

  <div class="container  py-xl-5 py-lg-3">

    <div class="panel panel-default">
      <div class="panel-body">
        <!-- membuat form  -->
        <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
              <div class="row">
                <a for="birthDate" class="col-sm-2 control-label">Kelas Anda</a>
                <label for="birthDate" class="col-sm-2 control-label"><?= $walikelas->kelas ?> <?= $walikelas->nama_jurusan ?></label>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <a for="birthDate" class="col-sm-2 control-label">Jumlah Siswa</a>
                <label for="birthDate" class="col-sm-2 control-label"><?= $sum->jumlah ?></label>
              </div>
            </div>
          </div>
          <hr>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">NIS</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($siswa as $s) : ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $s->nama ?></td>
                  <td><?= $s->nis ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          </br>
      </div>
      </form>
    </div>
  </div>
  </div>



</body>

</html>