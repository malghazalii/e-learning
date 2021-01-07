<div class="container  py-xl-5 py-lg-3">
    <div class="row justify-content-center pt-7">
        <div class="col-lg-12 agile-course-main">
            <div class="w3ls-cource-first">
                <div class="px-md-5 px-4  pb-md-5 pb-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!-- membuat form  -->
                            <!-- gunakan tanda [] untuk menampung array  -->
                            <div class="control-group after-add-more">
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <a for="birthDate" class="col-sm-2 control-label"><strong>Kelas Anda</strong></a>
                                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->kelas, ' ', $ujian->nama_jurusan; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <a for="birthDate" class="col-sm-2 control-label"><strong>Nama Siswa</strong></a>
                                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->NAMA; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <a for="birthDate" class="col-sm-2 control-label"><strong>Tipe Ujian</strong></a>
                                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->jenis; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <a for="birthDate" class="col-sm-2 control-label"><strong>Nama Ujian</strong></a>
                                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->nama_ujian; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <a for="birthDate" class="col-sm-2 control-label"><strong>Jumlah Soal</strong></a>
                                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->jml_soal; ?></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php $no = 1;
                            foreach ($soal as $n) : ?>
                                <div class="card-body">
                                    <form class="form-horizontal" role="form" action="<?= base_url('User/Guru/TampilKuis/update/'); ?>" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <?php if ($n->nama_file) : ?>
                                                        <p style="margin-left: 10px;"><strong><?= $no++, '. ', $n->soal; ?></strong></p>
                                                        <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->nama_file); ?>" />
                                                    <?php else : ?>
                                                        <p style="margin-left: 10px;"><strong><?= $no++, '. ',  $n->soal; ?></strong></p>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($n->idk == $n->id) : ?>
                                                    <div class="col-sm-9">
                                                        <?php if ($n->opsiA && $n->opsiB && $n->opsiC && $n->opsiD && $n->opsiE) : ?>
                                                            <?php if ($n->jawaban == $n->opsiA) : ?>
                                                                <label for="status"><strong> A. <?= $n->opsiA; ?></strong></label><br />
                                                            <?php else : ?>
                                                                <label for="status">A. <?= $n->opsiA; ?></label><br />
                                                            <?php endif; ?>

                                                            <?php if ($n->jawaban == $n->opsiB) : ?>
                                                                <label for="status"><strong> B. <?= $n->opsiB; ?> </strong></label><br />
                                                            <?php else : ?>
                                                                <label for="status">B. <?= $n->opsiB; ?></label><br />
                                                            <?php endif; ?>

                                                            <?php if ($n->jawaban == $n->opsiC) : ?>
                                                                <label for="status"><strong> C. <?= $n->opsiC; ?> </strong></label><br />
                                                            <?php else : ?>
                                                                <label for="status">C. <?= $n->opsiC; ?></label><br />
                                                            <?php endif; ?>

                                                            <?php if ($n->jawaban == $n->opsiD) : ?>
                                                                <label for="status"><strong> D. <?= $n->opsiD; ?></strong></label><br />
                                                            <?php else : ?>
                                                                <label for="status">D. <?= $n->opsiD; ?></label><br />
                                                            <?php endif; ?>

                                                            <?php if ($n->jawaban == $n->opsiE) : ?>
                                                                <label for="status"><strong> E. <?= $n->opsiE; ?></strong></label><br />
                                                            <?php else : ?>
                                                                <label for="status">E. <?= $n->opsiE; ?></label><br />
                                                            <?php endif; ?>
                                                        <?php else : ?>

                                                            <?php if ($n->jawaban == $n->gambarA) : ?>
                                                                <br><label for="status"><strong> A. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarA); ?>" /></strong></label><br />
                                                            <?php else : ?>
                                                                <br><label for="status">A. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarA); ?>" /></label><br />
                                                            <?php endif; ?>
                                                            <?php if ($n->jawaban == $n->gambarB) : ?>
                                                                <br><label for="status"><strong> B. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarB); ?>" /></strong></label><br />
                                                            <?php else : ?>
                                                                <br><label for="status">B. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarB); ?>" /></label><br />
                                                            <?php endif; ?>
                                                            <?php if ($n->jawaban == $n->gambarC) : ?>
                                                                <br><label for="status">C. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarC); ?>" /></label><br />
                                                            <?php else : ?>
                                                                <br><label for="status">C. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarC); ?>" /></label><br />
                                                            <?php endif; ?>
                                                            <?php if ($n->jawaban == $n->gambarD) : ?>
                                                                <br><label for="status">D. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarD); ?>" /></label><br />
                                                            <?php else : ?>
                                                                <br><label for="status">D. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarD); ?>" /></label><br />
                                                            <?php endif; ?>
                                                            <?php if ($n->jawaban == $n->gambarE) : ?>
                                                                <br><label for="status">E. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarE); ?>" /></label><br />
                                                            <?php else : ?>
                                                                <br><label for="status">E. <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->gambarE); ?>" /></label><br />
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="col-sm-9">
                                                        <textarea readonly style="margin: 10px;" name="" id="" cols="90" rows="10"><?= $n->jawaban; ?></textarea>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3 col-sm-offset-3">
                                                    <label for="nilai" class="col-sm-3 control-label">Nilai</label>
                                                    <input type="number" style="width: 25%; margin-bottom: 5px;" name="nilai" value="<?= $n->nilai; ?>">
                                                    <input name="id_ujian" hidden type="text" style="width: 50px; margin-bottom: 20px;" value="<?= $n->id_ujian; ?>">
                                                    <input name="id_tr_kuis" hidden type="text" style="width: 50px; margin-bottom: 20px;" value="<?= $n->id_tr_kuis; ?>">
                                                    <button type="submit" class="btn btn-primary ">Lanjut</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form> <!-- /form -->
                                </div>
                            <?php endforeach; ?>
                            <hr>
                            </br>
                            <form action="<?= base_url('User/Guru/TampilKuis/updates'); ?>" method="POST">
                                <label for="TotalNilai" class="col-sm-3 control-label"> <strong>Total Nilai</strong></label>
                                <input readonly type="text" id="TotalNilai" name="nilai" value="<?= $sum->total; ?>">
                                <input hidden type="text" id="TotalNilai" name="id_ujian" value="<?= $uj->id_ujian; ?>">
                                <button type="submit" class="btn btn-success">Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>