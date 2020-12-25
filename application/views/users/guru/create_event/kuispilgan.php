<html lang="en">

<head>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
    <br>
    <div class="container py-xl-5 py-lg-3">
        <?php if ($title == "Input Soal Ujian Pilihan Ganda") : ?>
            <form method="POST" action="<?= base_url('User/Guru/KuisPilgan/tambahData/' . $det->id_kuis); ?>" enctype="multipart/form-data">
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="form-group">
                        <label>Pilih Nama Ujian</label> <br>
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if ($title == "Input Soal Ujian Pilihan Ganda") : ?>
                                <?= $det->nama_ujian ?>
                            <?php else : ?>
                                Daftar Nama Ujian
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach ($nama as $n) : ?>
                                <a class="dropdown-item" href="<?= base_url('User/Guru/kuispilgan/kuis/' . $n->id_kuis); ?>"><?= $n->nama_ujian ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pilih Tipe Soal</label> <br>
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Soal Pilihan Ganda
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php if ($title == "Input Soal Ujian Pilihan Ganda") : ?>
                                <a class="dropdown-item" href="<?= base_url('User/Guru/kuispilgan/kuis/' . $det->id_kuis); ?>">Input Soal Pilihan Ganda</a>
                                <a class="dropdown-item" href="<?= base_url('User/Guru/kuisessay/kuis/' . $det->id_kuis); ?>">Input Soal Essay</a>
                            <?php else : ?>
                                <a class="dropdown-item" href="<?= base_url('User/Guru/kuispilgan'); ?>">Input Soal Pilihan Ganda</a>
                                <a class="dropdown-item" href="<?= base_url('User/Guru/kuisessay'); ?>">Input Soal Essay</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php if ($title == "Input Soal Ujian Pilihan Ganda") : ?>
                <div class="panel-body">
                    <!-- membuat form  -->
                    <!-- gunakan tanda [] untuk menampung array  -->
                    <div class="control-group after-add-more">
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                                <div class="col-sm-3">
                                    <input type="file" name="file_input" id="file_input" class="btn btn-info upload">
                                    <input type="text" name="soal" hidden value="<?= $soal->hello + 1 ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="tekssoal" name="tekssoal" placeholder="teks soal" class="form-control" autofocus>
                                    <?= form_error('tekssoal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        </br>
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-3 control-label">Jawaban A</label>
                                <!-- <div class="col-sm-3">
                                        <input type="file" name="fileinputA" id="fileinputA" class="btn btn-success upload">
                                    </div> -->
                                <div class="col-sm-6">
                                    <input type="text" id="jawabanA" name="jawabanA" placeholder="jawaban" class="form-control" autofocus>
                                    <?= form_error('jawabanA', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-3 control-label">Jawaban B</label>
                                <!-- <div class="col-sm-3">
                                        <input type="file" name="fileinputB" id="fileinputB" class="btn btn-success upload">
                                    </div> -->
                                <div class="col-sm-6">
                                    <input type="text" id="jawabanB" name="jawabanB" placeholder="jawaban" class="form-control" autofocus>
                                    <?= form_error('jawabanB', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-3 control-label">Jawaban C</label>
                                <!-- <div class="col-sm-3">
                                        <input type="file" name="fileinputC" id="fileinputC" class="btn btn-success upload">
                                    </div> -->
                                <div class="col-sm-6">
                                    <input type="text" id="jawabanC" name="jawabanC" placeholder="jawaban" class="form-control" autofocus>
                                    <?= form_error('jawabanC', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-3 control-label">Jawaban D</label>
                                <!-- <div class="col-sm-3">
                                        <input type="file" name="fileinputD" id="fileinputD" class="btn btn-success upload">
                                    </div> -->
                                <div class="col-sm-6">
                                    <input type="text" id="jawabanD" name="jawabanD" placeholder="jawaban" class="form-control" autofocus>
                                    <?= form_error('jawabanD', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-3 control-label">Jawaban E</label>
                                <!-- <div class="col-sm-3">
                                        <input type="file" name="fileinputE" id="fileinputE" class="btn btn-success upload">
                                    </div> -->
                                <div class="col-sm-6">
                                    <input type="text" id="jawabanE" name="jawabanE" placeholder="jawaban" class="form-control" autofocus>
                                    <?= form_error('jawabanE', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        </br>
                    </div>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
                <hr>
                <div class="row justify-content-center pt-7">
                    <div class="col-lg-12 agile-course-main">
                        <div class="w3ls-cource-first">
                            <div class="px-md-5 px-4  pb-md-5 pb-4">
                                <table class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Ujian</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Soal</th>
                                            <th scope="col">opsi A</th>
                                            <th scope="col">opsi B</th>
                                            <th scope="col">opsi C</th>
                                            <th scope="col">opsi D</th>
                                            <th scope="col">opsi E</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php foreach ($detail as $d) : ?>
                                            <tr>
                                                <td><?= $d->nama_ujian ?></td>
                                            <?php endforeach; ?> -->
                                        <?php foreach ($pilgan as $p) : ?>
                                            <?php if ($p->nama_file) : ?>
                                                <td><img src="<?= base_url('assets/users/upload/' . $p->nama_file); ?>"></td>
                                                <td><?= $p->soal ?></td>
                                                <td><?= $p->opsiA ?></td>
                                                <td><?= $p->opsiB ?></td>
                                                <td><?= $p->opsiC ?></td>
                                                <td><?= $p->opsiD ?></td>
                                                <td><?= $p->opsiE ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td><?= $p->soal ?></td>
                                            <?php endif; ?>

                                            </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>


            </form>
        <?php endif; ?>

    </div>
    </div>
    </div>
</body>

</html>