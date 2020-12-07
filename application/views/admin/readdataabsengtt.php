<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Absen Guru GTT</h6>
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
                                <td>Nama</td>
                                <td><?= $d->nama; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?= $d->status; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Berakhir</td>
                                <td><?= $d->tanggal_berakhir; ?></td>
                            </tr>
                            <tr>
                                <td>golongan</td>
                                <td><?= $d->nama_golongan; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </thead>
                </table>
                <a href="<?= base_url('Admin/Dataabsengtt'); ?>" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->