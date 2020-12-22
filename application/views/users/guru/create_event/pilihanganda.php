<div class="container  py-xl-5 py-lg-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- membuat form  -->
            <!-- gunakan tanda [] untuk menampung array  -->
            <div class="control-group after-add-more">
                <div class="form-group">
                    <div class="row">
                        <a for="birthDate" class="col-sm-2 control-label">Kelas Anda</a>
                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->kelas, ' ', $ujian->nama_jurusan; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <a for="birthDate" class="col-sm-2 control-label">Nama Siswa</a>
                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->NAMA; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <a for="birthDate" class="col-sm-2 control-label">Tipe Ujian</a>
                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->jenis; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <a for="birthDate" class="col-sm-2 control-label">Nama Ujian</a>
                        <label for="birthDate" class="col-sm-2 control-label"><?= $ujian->nama_ujian; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <a for="birthDate" class="col-sm-2 control-label">Jumlah Soal</a>
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
                                        <?php if ($n->jawaban == $n->opsiA) : ?>
                                            <h7><strong>A. <?= $n->opsiA; ?></strong></h7>
                                            <p>B. <?= $n->opsiB; ?></p>
                                            <p>C. <?= $n->opsiC; ?></p>
                                            <p>D. <?= $n->opsiD; ?></p>
                                            <p>E. <?= $n->opsiE; ?></p>
                                        <?php elseif ($n->jawaban == $n->opsiB) : ?>
                                            <p>A. <?= $n->opsiA; ?></p>
                                            <h7><strong>B. <?= $n->opsiB; ?></strong></h7>
                                            <p>C. <?= $n->opsiC; ?></p>
                                            <p>D. <?= $n->opsiD; ?></p>
                                            <p>E. <?= $n->opsiE; ?></p>
                                        <?php elseif ($n->jawaban == $n->opsiC) : ?>
                                            <p>A. <?= $n->opsiA; ?></p>
                                            <p>B. <?= $n->opsiB; ?></p>
                                            <h7><strong>C. <?= $n->opsiC; ?></strong></h7>
                                            <p>D. <?= $n->opsiD; ?></p>
                                            <p>E. <?= $n->opsiE; ?></p>
                                        <?php elseif ($n->jawaban == $n->opsiD) : ?>
                                            <p>>A. <?= $n->opsiA; ?></p>
                                            <p>>B. <?= $n->opsiB; ?></p>
                                            <p>>C. <?= $n->opsiC; ?></p>
                                            <h7><strong>D. <?= $n->opsiD; ?></strong></h7>
                                            <p>E. <?= $n->opsiE; ?></p>
                                        <?php elseif ($n->jawaban == $n->opsiE) : ?>
                                            <p>A. <?= $n->opsiA; ?></p>
                                            <p>B. <?= $n->opsiB; ?></p>
                                            <p>C. <?= $n->opsiC; ?></p>
                                            <p>D. <?= $n->opsiD; ?></p>
                                            <h7><strong>E. <?= $n->opsiE; ?></strong></h7>
                                        <?php endif; ?>
                                    </div>
                                <?php else : ?>
                                    <div class="col-sm-9">
                                        <textarea readonly style="margin: 10px;" name="" id="" cols="90" rows="10"><?= $n->jawaban; ?></textarea>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label for="nilai" class="col-sm-3 control-label">Nilai</label>
                            <input type="number" style="width: 50px; margin-bottom: 20px;" name="nilai" value="<?= $n->nilai; ?>">
                            <input name="id_ujian" hidden type="text" style="width: 50px; margin-bottom: 20px;" value="<?= $n->id_ujian; ?>">
                            <input name="id_tr_kuis" hidden type="text" style="width: 50px; margin-bottom: 20px;" value="<?= $n->id_tr_kuis; ?>">
                            <button type="submit" class="btn btn-primary btn-block">Lanjut</button>
                        </div>
                    </form> <!-- /form -->
                </div>
            <?php endforeach; ?>
            </br>
            <form action="<?= base_url('User/Guru/TampilKuis/updates'); ?>" method="POST">
                <label for="TotalNilai"> Total Nilai</label>
                <input readonly type="text" id="TotalNilai" name="nilai" value="<?= $sum->total; ?>">
                <input hidden type="text" id="TotalNilai" name="id_ujian" value="<?= $uj->id_ujian; ?>">
                <button type="submit" class="btn btn-primary">Selesai</button>
            </form>
        </div>
    </div>
</div>
</div>