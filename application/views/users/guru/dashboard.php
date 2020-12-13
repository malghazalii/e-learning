<br>
<div class="container">
  <img src="<?php echo base_url(); ?>assets/users/images/menu.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Aktivitas Guru</strong>
  <hr>
  <div class="row">
    <div style="margin-left: 15px; margin-bottom: -30px">
      <a class="btn btn-primary" href="<?= base_url('User/Guru/Dashboard'); ?>">Semua</a>
    </div>
    <div style="margin-left: 15px; margin-bottom: -30px">
      <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Mata Pelajaran
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php foreach ($mapel as $m) : ?>
          <a class="dropdown-item" href="<?= base_url('User/Guru/Dashboard/mapel/' . $m->id_mapel); ?>"><?= $m->mata_pelajaran ?> <?= $m->kelas ?> <?= $m->nama_jurusan ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div style="margin-left: 15px; margin-bottom: -30px">
      <a class=" btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Histori
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('User/Guru/Dashboard/historitugas'); ?>">Semua Tugas</a>
        <a class="dropdown-item" href="<?= base_url('User/Guru/Dashboard/historikuis'); ?>">Semua Kuis</a>
      </div>
    </div>
  </div>
  <br>
  <br>
  <?php if ($title == 'Dashboard Histori Tugas') : ?>
    <div class="card">
      <h5 class="card-header">Histori Tugas</h5>
      <div class="card-body">
        <?php foreach ($tugass as $tt) : ?>
          <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $tt->NAMA ?>
          <p><img src="<?= base_url('assets/users/upload/' . $tt->file); ?>"></p>
          <p class="card-text-left"><?= $tt->TANGGAL ?></p>
        <?php endforeach; ?>
        <hr>
      </div>
    </div>
  <?php elseif ($title == 'Dashboard Histori Kuis') : ?>
    <div class="card">
      <h5 class="card-header">Histori Kuis</h5>
      <div class="card-body">
        <?php foreach ($kuiss as $k) : ?>
          <img src="<?php echo base_url(); ?>assets/users/images/pie.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $k->nama_ujian ?>
          <p><?= $k->jenis ?></p>
          <p class="card-text-left"><?= $k->tanggal_berakhir ?></p>
        <?php endforeach; ?>
        <hr>
      </div>
    </div>
  <?php else : ?>
    <div class="card">
      <h5 class="card-header">Histori Tugas</h5>
      <div class="card-body">
        <?php foreach ($tugas as $t) : ?>
          <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $t->NAMA ?>
          <p><img src="<?= base_url('assets/users/upload/' . $t->file); ?>"></p>
          <p class="card-text-left"><?= $t->TANGGAL ?></p>
        <?php endforeach; ?>
        <hr>
      </div>
    </div>
    <br>
    <div class="card">
      <h5 class="card-header">Histori Kuis</h5>
      <div class="card-body">
        <?php foreach ($kuis as $k) : ?>
          <img src="<?php echo base_url(); ?>assets/users/images/pie.png" style=”float:left; margin:0 8px 4px 0;” /> <?= $k->nama_ujian ?>
          <p><?= $k->jenis ?></p>
          <p class="card-text-left"><?= $k->tanggal_berakhir ?></p>
        <?php endforeach; ?>
        <hr>
      </div>
    </div>
</div>
<br>
<?php endif; ?>