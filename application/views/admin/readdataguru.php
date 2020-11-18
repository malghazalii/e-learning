<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Guru</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <?php foreach ($detail as $d) : ?>
              <tr>
                <td>Nip</td>
                <td><?= $d->nip; ?></td>
              </tr>
              <tr>
                <td>nama</td>
                <td><?= $d->nama; ?></td>
              </tr>
              <tr>
                <td>password</td>
                <td><?= $d->password; ?></td>
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
                <td>no_hp</td>
                <td><?= $d->no_hp; ?></td>
              </tr>
              <tr>
                <td>golongan</td>
                <td><?= $d->nama_golongan; ?></td>
              </tr>
            <?php endforeach; ?>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->