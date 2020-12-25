<!-- Begin Page Content -->

<body onload="JavaScript:AutoRefresh(30000);">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div style="padding-bottom: 10px;">
            <form action="<?= base_url('Admin/Dataabsengtt/tanggal'); ?>" method="POST">
                <h6 class="m-0 font-weight-bold text-primary" style="padding-bottom: 10px;">Berdasarkan Tanggal :</h6>
                <div class="col-sm-3" style="float: left; margin-left: -10px">
                    <input type="date" id="tanggal" name="tanggal" class="form-control">
                </div>
                <button type="submit" style="margin-right: 10px;" class="btn btn-primary">Cari</button>
                <a href="<?= base_url('Admin/Dataabsengtt'); ?>" class="btn btn-primary">Semua Guru GTT</a>
            </form>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Absensi Golongan GTT</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Tanggal Berakhir</th>
                                <th>Golongan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($absen as $g) : ?>
                                <tr>
                                    <td><?= $g->nip ?></td>
                                    <td><?= word_limiter($g->nama, 2); ?></td>
                                    <td><?php
                                        if ($g->status == 1) {
                                            echo 'Hadir';
                                        } elseif ($g->status == 2) {
                                            echo 'Sakit';
                                        } elseif ($g->status == 3) {
                                            echo 'Ijin';
                                        } elseif ($g->status == 4) {
                                            echo 'Terlambat';
                                        }
                                        ?></td>
                                    <td><?= $g->tanggal_berakhir ?></td>
                                    <td><?= $g->nama_golongan ?></td>
                                    <td>
                                        <?php
                                        echo anchor(base_url('Admin/Dataabsengtt/detail/' . $g->id_absen . '/' . $g->id_gol), 'Read');
                                        echo ' | ';
                                        echo anchor(base_url('Admin/Dataabsengtt/delete/' . $g->id_absen), 'Delete', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
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
</body>
<!-- End of Main Content -->