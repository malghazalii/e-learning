<!-- banner -->



<!-- //navigation -->
<html lang="en">

<!-- <head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<body>
    <br>

    <div class="container py-xl-5 py-lg-3">

        <div class="row justify-content-center pt-7">
            <div class="col-lg-12 agile-course-main">
                <div class="w3ls-cource-first">
                    <div class="px-md-5 px-4  pb-md-5 pb-4">
                        <!-- membuat form  -->
                        <!-- gunakan tanda [] untuk menampung array  -->
                        <div class="control-group after-add-more">
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <a for="birthDate" class="col-sm-2 control-label"><strong>Kelas Anda</strong></a>
                                    <label for="birthDate" class="col-sm-2 control-label"><?= $tugass->kelas ?> <?= $tugass->nama_jurusan ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <a for="birthDate" class="col-sm-2 control-label"><strong>Mata Pelajaran</strong></a>
                                    <label for="birthDate" class="col-sm-2 control-label"><?= $tugass->mata_pelajaran ?></label>
                                </div>
                            </div>
                            <form action="<?= base_url('User/Guru/Mapel/updatenilai/' . $tugass->id_jawaban); ?>" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <a for="birthDate" class="col-sm-2 control-label"><strong>Nilai</strong></a>
                                        <input style="margin-right: 10px; width: 100px" type="number" min="1" max="100" name="nilai">
                                        <input type="text" name="tugas" hidden value="<?= $tugass->id_tugas ?>">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nis</th>
                                    <th>Judul Tugas</th>
                                    <th>Teks</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tugas as $t) : ?>
                                    <tr>
                                        <td><?= $t->nama; ?></td>
                                        <td><?= $t->nis; ?></td>
                                        <td><?= $t->NAMA; ?></td>
                                        <td><?= $t->text; ?></td>
                                        <td><a href="<?php echo base_url() . 'User/Guru/Mapel/indexid/' . $t->filesiswa ?>"><?= $t->filesiswa ?></a></td>
                                        <td>
                                            <?php
                                            if ($t->status == 1) {
                                                echo 'Tepat Waktu';
                                            } elseif ($t->status == 2) {
                                                echo 'Terlambat';
                                            } ?></td>
                                        <td><?= $t->nilai; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>



</body>

</html>