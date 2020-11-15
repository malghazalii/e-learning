<!-- Begin Page Content -->
<div class="container-fluid">

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
            <th>Wali Kelas</th>
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
            <td><?= $g->kelas ?> <?= $g->nama_jurusan ?> </td>
            <td>
              <?php
              echo anchor(base_url('Admin/dataguru/detail/'.$g->nip),'Read');
              echo ' | ';
              echo anchor(base_url('Admin/dataguru/'),'Update');
              echo ' | ';
              echo anchor(base_url('Admin/dataguru/delete/'.$g->nip),'delete','onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
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