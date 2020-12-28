<!-- banner -->



<!-- //navigation -->
<html lang="en">
<!-- <head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<body>
    <br>


    <div class="container  py-xl-5 py-lg-3">
        <div class="row justify-content-center pt-7">
            <div class="col-lg-12 agile-course-main">
                <div class="w3ls-cource-first">
                    <div class="px-md-5 px-4  pb-md-5 pb-4">
                        <br>
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kuis
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel/mapeltugas/' . $siswarow->id_mengajar); ?>">Tugas</a>
                            <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/PenilaianMapel/mapelkuis/' . $siswarow->id_mengajar); ?>">Kuis</a>
                        </div>
                        <form style="margin-left: -15px; margin-top: 10px" action="<?= base_url('User/Guru/wali_kelas/PenilaianMapel/tanggalkuis/' . $siswarow->id_mengajar); ?>" method="POST">
                            <div class="col-sm-3" style="float: left;">
                                <input type="date" id="tanggal" name="tanggal" class="form-control">
                            </div>
                            <!-- <select style="width: 175px; margin-bottom: 15px;" id="country" name="tanggal" class="form-control">
                <?php foreach ($tanggal as $m) : ?>
                  <option value="<?= $m->tanggal ?>"> <?= $m->tanggal ?></option>
                <?php endforeach; ?>
              </select> -->
                            <button type="submit" class="btn btn-success">Cari</button>
                        </form>
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- membuat form  -->
                                <!-- gunakan tanda [] untuk menampung array  -->
                                <form action="proses.php" method="POST">
                                    <div class="control-group after-add-more">
                                        <div class="form-group">
                                            <div class="row">
                                                <a for="birthDate" class="col-sm-2 control-label"><strong>Mata Pelajaran</strong></a>
                                                <label for="birthDate" class="col-sm-2 control-label"><?= $mapel->mata_pelajaran ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <a for="birthDate" class="col-sm-2 control-label"><strong>Kelas Anda</strong></a>
                                                <label for="birthDate" class="col-sm-2 control-label"><?= $walikelas->kelas ?> <?= $walikelas->nama_jurusan ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <a for="birthDate" class="col-sm-2 control-label">
                                                    <stong>Jumlah Siswa</strong>
                                                </a>
                                                <label for="birthDate" class="col-sm-2 control-label"><?= $sum->jumlah ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">NIS</th>
                                                <th scope="col">Judul Kuis</th>
                                                <th scope="col">Jenis Ujian</th>
                                                <th scope="col">Tanggal Berakhir</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($kuis as $k) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $k->nama ?></td>
                                                    <td><?= $k->nis ?></td>
                                                    <td><?= $k->nama_ujian ?></td>
                                                    <td><?= $k->jenis ?></td>
                                                    <td><?= $k->tanggal_berakhir ?></td>
                                                    <?php if ($k->status == 1) : ?>
                                                        <td>Mengerjakan</td>
                                                        <td><?= $k->nilai ?></td>
                                                    <?php else : ?>
                                                        <td>Tidak Ikut Ujian</td>
                                                        <td>-</td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    </br>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>