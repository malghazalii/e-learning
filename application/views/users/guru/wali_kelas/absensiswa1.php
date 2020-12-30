<!-- banner -->



<!-- //navigation -->
<html lang="en">

<!-- <head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<body onload="JavaScript:AutoRefresh(30000);">
    <br>
    <div class="container  py-xl-5 py-lg-3">
        <div class="row justify-content-center pt-7">
            <div class="col-lg-12 agile-course-main">
                <div class="w3ls-cource-first">
                    <div class="px-md-5 px-4  pb-md-5 pb-4">
                        <br>
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $mapel->mata_pelajaran ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/AbsenSiswa'); ?>">Semua Mapel</a>
                            <?php foreach ($mengajar as $t) :
                            ?>
                                <a class="dropdown-item" href="<?= base_url('User/Guru/wali_kelas/AbsenSiswa/Mapel/' . $t->id_mengajar); ?>"><?= $t->mata_pelajaran ?></a>
                            <?php endforeach; ?>
                        </div>
                        <br>
                        <form style="margin-left: -15px; padding-top: 10px" action="<?= base_url('User/Guru/wali_kelas/AbsenSiswa/tanggalmapel/' . $mapel->id_mengajar); ?>" method="POST">
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
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- membuat form  -->
                                <!-- gunakan tanda [] untuk menampung array  -->
                                <div class="control-group after-add-more">
                                    <div class="form-group">
                                        <div class="row">
                                            <a for="birthDate" class="col-sm-2 control-label"><strong>Kelas Anda</strong></a>
                                            <label for="birthDate" class="col-sm-2 control-label"><?= $walikelas->kelas ?> <?= $walikelas->nama_jurusan ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <a for="birthDate" class="col-sm-2 control-label"><strong>Jumlah Siswa</strong></a>
                                            <label for="birthDate" class="col-sm-2 control-label"><?= $sum->jumlah ?></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIS</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Tanggal Berakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $a) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $a->NAMA; ?></td>
                                                <td><?= $a->nis; ?></td>
                                                <td><?php if ($a->status == 1) {
                                                        echo 'Hadir';
                                                    } else if ($a->status == 2) {
                                                        echo 'Sakit';
                                                    } else if ($a->status == 3) {
                                                        echo 'Izin';
                                                    } else if ($a->status == 4) {
                                                        echo 'Terlambat';
                                                    }
                                                    ?></td>
                                                <td><?= $a->tanggal; ?></td>
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
    </div>
    </div>



</body>

</html>