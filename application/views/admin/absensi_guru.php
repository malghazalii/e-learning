<!-- Begin Page Content -->
<div class="container-fluid">
    <div style="padding-bottom: 10px;">
        <form action="<?= base_url('Admin/absensi_guru/simpanData'); ?>" method="post">
            <h4 class="m-0 font-weight-bold text-primary">Tanggal dan Jam Absen Berakhir</h4>
            <input type="datetime-local" name="tanggal" id="tanggal" placeholder="Tanggal Berakhir" class="form-control" autofocus>
            <button type="submit" class="btn btn-primary">Aktifkan Absen</button>
        </form>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Absen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Berakhir Absen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($absen as $a) : ?>
                            <tr>
                                <td><?= $a->tanggal_berakhir ?></td>
                                <td><a class="badge badge-danger" href="<?= base_url('Admin/Absensi_Guru/delete/' . $a->id_absen); ?>">Hapus</a></td>
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