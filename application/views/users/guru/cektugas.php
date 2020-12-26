<body onload="JavaScript:AutoRefresh(30000);">
    <div class="course-w3ls py-5">
        <div class="container">
        <h3 class="text-center mb-sm-5 mb-4">Pengumpulan tugas</h3>
            <div class="row justify-content-center pt-7">
                <div class="col-lg-10 agile-course-main">
                    <div class="w3ls-cource-first">
                        <div class="px-md-5 px-4  pb-md-5 pb-4">
                            <br>
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">Judul Tugas</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php foreach ($tugas as $t) : ?>
                                    <?php if ($t->status == 3) : ?>
                                    <?php else : ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $t->nama; ?></td>
                                                <td><?= $t->nis; ?></td>
                                                <td><?= $t->NAMA; ?></td>
                                                <td>
                                                    <?php
                                                    if ($t->status == 1) {
                                                        echo 'Tepat Waktu';
                                                    } elseif ($t->status == 2) {
                                                        echo 'Terlambat';
                                                    } ?></td>
                                                <td><?= $t->nilai; ?></td>
                                                <td><a href="<?= base_url('User/Guru/Mapel/Koreksi/' . $t->id_jawaban); ?>"> Koreksi</a></td>
                                            </tr>
                                        </tbody>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 agile-course-main-2 mt-4">
                    <img src="images/am1.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</body>