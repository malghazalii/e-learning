<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>No HP</th>
            <th>Password</th>
            <th>Kelas</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($siswa as $s) : ?>
          <tr>
            <td><?= $s->nis ?></td>
            <td><?= $s->nama ?></td>
            <td><?= $s->jenis_kelamin ?></td>
            <td><?= $s->alamat ?></td>
            <td><?= $s->agama ?></td>
            <td><?= $s->no_hp ?></td>
            <td><?= $s->password ?></td>
            <td><?= $s->kelas ?> <?= $s->nama_jurusan ?> </td>
            <td>
              <?php
              echo anchor(base_url('Admin/datasiswa/detail/'.$s->nis),'Read');
              echo ' | ';
              echo anchor(base_url('Admin/datasiswa/edit/'.$s->nis),'Edit');
              echo ' | ';
              echo anchor(base_url('Admin/datasiswa/delete/'.$s->nis),'delete','onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
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