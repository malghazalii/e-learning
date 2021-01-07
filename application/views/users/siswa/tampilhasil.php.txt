<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="container  py-xl-5 py-lg-3">
  <div class="row justify-content-center pt-7">
    <div class="col-lg-10 agile-course-main">
      <div class="w3ls-cource-first">
        <div class="px-md-5 px-4  pb-md-5 pb-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <!-- membuat form  -->
              <!-- gunakan tanda [] untuk menampung array  -->
              <hr>
              <div class="card-body">
                <div class="form-group">
                  <?php $no = 1;
                  foreach ($soal as $n) : ?>
                    <input hidden type="text" name="id_ujian" value="<?= $n->id_ujian; ?>">
                    <div class="row">
                      <div class="col-sm-9">
                        <?php if ($n->nama_file) : ?>
                          <p style="margin-left: 10px;"><strong><?= $no, '. ', $n->soal; ?></strong></p>
                          <img style="margin-left: 10px; width: 200px; height: 145px;" src="<?php echo base_url('assets/users/upload/' . $n->nama_file); ?>" />
                        <?php else : ?>
                          <p style="margin-left: 10px;"><strong><?= $no, '. ', $n->soal; ?></strong></p>
                        <?php endif; ?>
                      </div>
                      <?php if ($n->sid == $n->trid) : ?>
                        <input hidden type="text" name="id_tr_kuis<?= $no; ?>" value="<?= $n->id_tr_kuis; ?>">
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
                  <?php $no++;
                  endforeach; ?>
                  <div class="col-sm-9">
                    <h3 id="demo"></h3>
                  </div>
                </div>
              </div>
            </div>
            <a id="gas" href="<?= base_url('User/Siswa/Kuis/Ikut/' . $kuis->id_kuis); ?>" class="btn btn-primary">Selesai</a>
            </br>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>