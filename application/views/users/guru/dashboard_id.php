<br>
<div class="container">
    <img src="<?php echo base_url(); ?>assets/users/images/menu.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Aktivitas Guru</strong>
    <hr>
    <a class="btn btn-primary" href="<?= base_url('User/Guru/Dashboard'); ?>">Semua</a>
    <a class=" btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Mata Pelajaran
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php foreach ($mapel as $m) : ?>
            <a class="dropdown-item" href="<?= base_url('User/Guru/Dashboard/mapel/' . $m->id_mapel); ?>"><?= $m->mata_pelajaran ?> <?= $m->kelas ?> <?= $m->nama_jurusan ?></a>
        <?php endforeach; ?>
    </div>
    <br>
    <br>
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