<html lang="en">
<!-- 
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<body>
<div class="container  py-xl-5 py-lg-3">
  <div class="card">
  <div class="card-body">
    <div class="container  py-xl-5 py-lg-3">
        <h3><?= $tugas->mata_pelajaran ?></h3>
    </div>
    <!-- <div class="container"> -->
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- membuat form  -->
                <!-- gunakan tanda [] untuk menampung array  -->
                <form action="proses.php" method="POST">
                    <div class="control-group after-add-more">
                        <div class="form-group">
                            <div class="row">
                                <label for="birthDate" class="col-sm-2 control-label"><?= $tugas->NAMA ?> </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <a for="birthDate" class="col-sm-2 control-label">
                                    <?= $tugas->keterangan ?></a>
                                <?php if ($tugas->file) : ?>
                                    <br> <br>
                                    <img src="<?php echo base_url(); ?>assets/users/images/doc1.png" style=”float:left; margin:0 8px 4px 0;” />&nbsp;<a href="<?php echo base_url() . 'User/Siswa/F_Tugas1/indexid/' . $tugas->file ?>"><?= $tugas->file ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- </div> -->
        <br>

        <?php if ($jawaban) :
            if ($jawaban->status == 1) : ?>
                <form class="form-horizontal" method="POST" action="<?= base_url('User/Siswa/F_Tugas1/editdata/' . $tugas->id_tugas); ?>" enctype="multipart/form-data">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <input type="text" name="idjawaban3" hidden value="<?= $jawaban->id_jawaban ?>">
                                <input type="text" name="status3" hidden value="<?= $jawaban->status ?>">
                                <td>Online Teks</td>
                                <td><textarea name="text" id="text" cols="130" rows="20"><?= $jawaban->text ?></textarea> <br> <?= form_error('text', '<strong class="text-danger pl-3">', '</strong>'); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>File Pengumpulan</td>
                                <td><input type="file" name="file_input" id="file_input" class="btn btn-success upload"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    <hr>
                </form>

            <?php elseif ($jawaban->status == 2) : ?>
                <form class="form-horizontal" method="POST" action="<?= base_url('User/Siswa/F_Tugas1/editdata/' . $tugas->id_tugas); ?>" enctype="multipart/form-data">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <input type="text" name="idjawaban3" hidden value="<?= $jawaban->id_jawaban ?>">
                                <input type="text" name="status3" hidden value="<?= $jawaban->status ?>">
                                <td>Online Teks</td>
                                <td><textarea name="text" id="text" cols="130" rows="20"><?= $jawaban->text ?></textarea> <br> <?= form_error('text', '<strong class="text-danger pl-3">', '</strong>'); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>File Pengumpulan</td>
                                <td><input type="file" name="file_input" id="file_input" class="btn btn-success upload"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    <hr>
                </form>

            <?php elseif ($jawaban->status == 3) : ?>
                <form class="form-horizontal" method="POST" action="<?= base_url('User/Siswa/F_Tugas1/editdata/' . $tugas->id_tugas); ?>" enctype="multipart/form-data">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <input type="text" name="idjawaban3" hidden value="<?= $jawaban->id_jawaban ?>">
                                <input type="text" name="status3" hidden value="<?= $jawaban->status ?>">
                                <td>Online Teks</td>
                                <td><textarea name="text" id="text" cols="130" rows="20"></textarea> <br> <?= form_error('text', '<strong class="text-danger pl-3">', '</strong>'); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>File Pengumpulan</td>
                                <td><input type="file" name="file_input" id="file_input" class="btn btn-success upload"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    <hr>
                </form>
            <?php endif; ?>

        <?php else : ?>
            <form class="form-horizontal" method="POST" action="<?= base_url('User/Siswa/F_Tugas1/tambahData/' . $tugas->id_tugas); ?>" enctype="multipart/form-data">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Online Teks</td>
                            <td><textarea name="text" id="text" cols="130" rows="20"></textarea> <br> <?= form_error('text', '<strong class="text-danger pl-3">', '</strong>'); ?> </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>File Pengumpulan</td>
                            <td><input type="file" name="file_input" id="file_input" class="btn btn-success upload"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                <hr>
            </form>
        <?php endif; ?>
        <br>
        <br>
    </div>
    </div>
    </div>
    </div>
</body>

</html>