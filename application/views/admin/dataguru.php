<!-- Begin Page Content -->
<div class="container-fluid">

  <div style="padding-bottom: 10px;">
    <a href="<?= base_url('Admin/dataguru/tambahData'); ?>" class="btn btn-primary"><span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
          <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg> Tambah Guru</a>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nip</th>
              <th>Nama</th>
              <th>Password</th>
              <th>Jenis_Kelamin</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Golongan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($guru as $g) : ?>
              <tr>
                <td><?= $g->nip ?></td>
                <td><?= $g->nama ?></td>
                <td><?= $g->password ?></td>
                <td><?= $g->jenis_kelamin ?></td>
                <td><?= $g->alamat ?></td>
                <td><?= $g->no_hp ?></td>
                <td><?= $g->nama_golongan ?></td>
                <td>
                  <?php
                  echo anchor(base_url('Admin/dataguru/detail/' . $g->nip), 'Read');
                  echo ' | ';
                  echo anchor(base_url('Admin/dataguru/edit/' . $g->nip), 'Edit');
                  echo ' | ';
                  echo anchor(base_url('Admin/dataguru/delete/' . $g->nip), 'delete', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->