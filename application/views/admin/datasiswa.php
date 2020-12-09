<!-- Begin Page Content -->
<div class="container-fluid">
  <div style="padding-bottom: 10px;">
    <a href="<?= base_url('Admin/datasiswa/tambahData'); ?>" class="btn btn-primary"><span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
          <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg> Tambah Siswa</a>
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Tahun Angkatan
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="<?= base_url('Admin/Datasiswa'); ?>">Semua Angkatan</a>
      <?php foreach ($tahun as $t) : ?>
        <a class="dropdown-item" href="<?= base_url('Admin/Datasiswa/tahunangkatan/' . $t->id_tahun); ?>"><?= $t->tahun_angkatan ?></a>
      <?php endforeach; ?>
    </div>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <?php if ($title == "Hasil Tahun Angkatan") : ?>
            <thead>
              <tr>
                <th>Nis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>No HP</th>
                <th>Kelas</th>
                <th>Tahun Angkatan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detail as $d) : ?>
                <tr>
                  <td><?= $d->nis ?></td>
                  <td><?= word_limiter($d->nama, 2); ?></td>
                  <td><?= $d->jenis_kelamin ?></td>
                  <td><?= word_limiter($d->alamat, 2); ?></td>
                  <td><?= $d->agama ?></td>
                  <td><?= $d->no_hp ?></td>
                  <td><?= $d->kelas ?> <?= $d->nama_jurusan ?> </td>
                  <td><?= $d->tahun_angkatan ?> </td>

                  <td>
                    <?php
                    echo anchor(base_url('Admin/datasiswa/detail/' . $d->nis), 'Read');
                    echo ' | ';
                    echo anchor(base_url('Admin/datasiswa/edit/' . $d->nis), 'Edit');
                    echo ' | ';
                    echo anchor(base_url('Admin/datasiswa/delete/' . $d->nis), 'Delete', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
                    ?>
                  </td>
                </tr>
            </tbody>
          <?php endforeach; ?>

        <?php else : ?>
          <thead>
            <tr>
              <th>Nis</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Agama</th>
              <th>No HP</th>
              <th>Kelas</th>
              <th>Tahun Angkatan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($siswa as $s) : ?>
              <tr>
                <td><?= $s->nis ?></td>
                <td><?= word_limiter($s->nama, 2); ?></td>
                <td><?= $s->jenis_kelamin ?></td>
                <td><?= word_limiter($s->alamat, 2); ?></td>
                <td><?= $s->agama ?></td>
                <td><?= $s->no_hp ?></td>
                <td><?= $s->kelas ?> <?= $s->nama_jurusan ?> </td>
                <td><?= $s->tahun_angkatan ?> </td>

                <td>
                  <?php
                  echo anchor(base_url('Admin/datasiswa/detail/' . $s->nis), 'Read');
                  echo ' | ';
                  echo anchor(base_url('Admin/datasiswa/edit/' . $s->nis), 'Edit');
                  echo ' | ';
                  echo anchor(base_url('Admin/datasiswa/delete/' . $s->nis), 'Delete', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
                  ?>
                </td>
              </tr>
          </tbody>
        <?php endforeach; ?>
      <?php endif; ?>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->