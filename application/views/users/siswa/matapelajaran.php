<div class="container  py-xl-5 py-lg-3">
  <img src="<?php echo base_url(); ?>assets/users/images/online.png" style=”float:left; margin:0 8px 4px 0;” /><strong> <?= $mapel->mata_pelajaran ?></strong>
  <hr>
  <br>
  <div class="card">
    <h5 class="card-header"> <img src="<?php echo base_url(); ?>assets/users/images/ann.png" style=”float:left; margin:0 8px 4px 0;” /> Absensi</h5>
    <div class="card-body">
      <?php foreach ($absensi as $a) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/create.png" style=”float:left; margin:0 8px 4px 0;” /> Absensi
        <a href="<?php echo base_url('User/Siswa/Absensi/absen/' . $a->id_absen); ?>" type="button" class="btn btn-outline-primary" style="float:right;">Pergi ke aktifitas</a> <br>
        <p class="card-text-left"><?= $a->tanggal ?></p>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
  <br>
  <div class="card">
    <h5 class="card-header"> <img src="<?php echo base_url(); ?>assets/users/images/calendar.png" style=”float:left; margin:0 8px 4px 0;” /> Materi</h5>
    <div class="card-body">
      <?php foreach ($materi as $m) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/online-class.png " style=”float:left; margin:0 8px 4px 0;” /> <?= $m->judul ?> <br>
        <a href="<?php echo base_url() . 'User/Siswa/MataPelajaran/indexid/' . $m->nama_file ?>"><?= $m->nama_file ?></a>
        <p class="card-text-left"><?= $m->tgl_posting ?></p>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
  <br>
  <div class="card">
    <h5 class="card-header"> <img src="<?php echo base_url(); ?>assets/users/images/calendar.png" style=”float:left; margin:0 8px 4px 0;” /> Tugas</h5>
    <div class="card-body">
      <?php foreach ($tugas as $t) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $t->NAMA ?>
        <a href="<?php echo base_url('User/Siswa/F_Tugas1/tugas/' . $t->id_tugas); ?>" type="button" class="btn btn-outline-primary" style="float:right;">Pergi ke aktifitas</a> <br>
        <button class="card-text-left btn btn-warning"><?= $t->TANGGAL ?></button>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
  <br>
  <div class="card">
    <h5 class="card-header"> <img src="<?php echo base_url(); ?>assets/users/images/calendar.png" style=”float:left; margin:0 8px 4px 0;” /> Kuis</h5>
    <div class="card-body">
      <?php foreach ($kuis as $k) : ?>
        <img src="<?php echo base_url(); ?>assets/users/images/pie.png " style=”float:left; margin:0 8px 4px 0;” /> <?= $k->nama_ujian ?> <br>
        <a href="<?= base_url('User/Guru/TampilKuis/mengajar/' . $k->id_mengajar); ?>" class="btn btn-outline-danger" style="float:right;">Pergi ke aktifitas</a>
        <p><?= $k->jenis ?></p>
        <p class="card-text-left"><?= $k->tanggal_berakhir ?></p>
        <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<br>