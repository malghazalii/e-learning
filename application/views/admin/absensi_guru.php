<!-- Begin Page Content -->
<div class="container-fluid">
    <div style="padding-bottom: 10px;">
        <a href="<?= base_url('Admin/absensi_guru/simpanData'); ?>" class="btn btn-primary">Aktifkan Absen</a>
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
                            <th>Tanggal Absen</th>
                            <th>Status Absen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($absen as $a) : ?>
                            <tr>
                                <td><?= $a->tgl ?></td>
                                <td><?php if ($a->is_active == 1) echo 'aktif' ?> <?php if ($a->is_active == 0) echo 'non aktif' ?></td>
                                <td>
                                    <?php
                                    echo anchor(base_url('Admin/Absensi_Guru/update/' . $a->id_absen), 'Non-Aktifkan', 'onclick="javasciprt: return confirm(\'Anda Yakin Non-Aktifkan ?\')"');
                                    echo ' | ';
                                    echo anchor(base_url('Admin/Absensi_Guru/delete/' . $a->id_absen), 'Hapus', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
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