<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Siswa</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <?php foreach ($detail as $d) : ?>
              <tr>
                <td>Nis</td>
                <td><?= $d->nis; ?></td>
              </tr>
              <tr>
                <td>nama</td>
                <td><?= $d->nama; ?></td>
              </tr>
              <tr>
                <td>jenis_kelamin</td>
                <td><?= $d->jenis_kelamin; ?></td>
              </tr>
              <tr>
                <td>alamat</td>
                <td><?= $d->alamat; ?></td>
              </tr>
              <tr>
                <td>agama</td>
                <td><?= $d->agama; ?></td>
              </tr>
              <tr>
                <td>no_hp</td>
                <td><?= $d->no_hp; ?></td>
              </tr>
              <tr>
                <td>password</td>
                <td><?= $d->password; ?></td>
              </tr>
              <tr>
                <td>kelas</td>
                <td><?= $d->kelas; ?> <?= $d->nama_jurusan ?></td>
              </tr>
            <?php endforeach; ?>
          </thead>
        </table>
        <a href="<?= base_url('Admin/datasiswa'); ?>" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->