<!-- <html lang="en">

<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<br>

<div class="container">

  <div class="card">
    <h5 class="card-header">Materi</h5>
    <div class="card-body">
      <?php
      foreach ($materi as $m) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/online-class.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $m->judul ?> <br>
        <a href="<?php echo base_url() . 'User/Guru/Mapel/indexid/' . $m->nama_file ?>"><?= $m->nama_file ?></a>
        <a href="<?php echo base_url('user/guru/uploadmateri/editMateri/' . $m->id_materi); ?>" class="btn btn-outline-danger" style="float:right; margin-left:10px">Edit</a>
        <p><?= $m->isi ?></p>
        <p class="card-text-left"><?= $m->tgl_posting ?></p>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
  <br>
  <div class="card">
    <h5 class="card-header">Tugas</h5>
    <div class="card-body">
      <?php
      foreach ($tugas as $t) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $t->NAMA ?> <br>
        <a href="<?php echo base_url() . 'User/Guru/Mapel/indexid/' . $t->file ?>"><?= $t->file ?></a>
        <a href="<?php echo base_url('user/guru/essayevent/editTugas/' . $t->id_tugas); ?>" class="btn btn-outline-danger" style="float:right; margin-left:10px">Edit</a>
        <a href="#" class="btn btn-outline-danger" style="float:right;">Cek Pengumpulan Tugas</a>
        <p><?= $t->keterangan ?></p>
        <p class="card-text-left"><?= $t->TANGGAL ?></p>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
  <br>
  <div class="card">
    <h5 class="card-header">Kuis</h5>
    <div class="card-body">
      <?php
      foreach ($kuis as $k) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/pie.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $k->nama_ujian ?>
        <a href="#" class="btn btn-outline-danger" style="float:right;">Cek Pengumpulan Tugas</a>
        <p><?= $k->jenis ?></p>
        <p class="card-text-left"><?= $k->tanggal_berakhir ?></p>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<br>
<!-- <div class="container  ">
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/online-class.png" style=”float:left; margin:0 8px 4px 0;” /><strong><?= $t->NAMA ?></strong></div>
          </div>
          <hr>
          <div class="form-group">
            <img src="<?php echo base_url(); ?>assets/users/images/pin.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Nama tugas</strong></div>
          <h8 class="card-title">
            <a href="course_details.html" class="text-dark">deskripsi tugas tersebut</a>
          </h8>
      </div>
      </br>
    </div>
    </form>
  </div>
  </div>
  </div> -->

<!-- <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/online-class.png" style=”float:left; margin:0 8px 4px 0;” /><strong>Minggu 3</strong></div>
          </div>
          <hr>
          <div class="form-group">
            <img src="<?php echo base_url(); ?>assets/users/images/pin.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Nama tugas</strong></div>
          <h8 class="card-title">
            <a href="course_details.html" class="text-dark">deskripsi tugas tersebut</a>
          </h8>
      </div>
      </br>
    </div>
    </form>
  </div>
  </div>
  </div> -->