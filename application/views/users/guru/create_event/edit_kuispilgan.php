<html lang="en">

<!-- <head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<body>
  <br>
  <div class="container py-xl-5 py-lg-3">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="<?= base_url('User/Guru/KuisPilgan/update/' . $detail->idk . '/' . $detail->id_kuis); ?>" enctype="multipart/form-data">
          <div class="panel-body">
            <!-- membuat form  -->
            <!-- gunakan tanda [] untuk menampung array  -->
            <div class="control-group after-add-more">
              <div class="form-group">
                <div class="row">
                  <label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                  <div class="col-sm-3">
                    <input type="file" name="file_input" id="file_input" class="btn btn-info upload">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="tekssoal" name="tekssoal" value="<?= $detail->soal ?>" placeholder="teks soal" class="form-control" autofocus>
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
                  <div class="col-sm-9">
                    <input type="text" id="jawabanA" name="jawabanA" value="<?= $detail->opsiA ?>" placeholder="jawaban" class="form-control" autofocus>
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
                  <div class="col-sm-9">
                    <input type="text" id="jawabanB" name="jawabanB" placeholder="jawaban" value="<?= $detail->opsiB ?>" class="form-control" autofocus>
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
                  <div class="col-sm-9">
                    <input type="text" id="jawabanC" name="jawabanC" value="<?= $detail->opsiB ?>" placeholder="jawaban" class="form-control" autofocus>
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
                  <div class="col-sm-9">
                    <input type="text" id="jawabanD" name="jawabanD" placeholder="jawaban" value="<?= $detail->opsiD ?>" class="form-control" autofocus>
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
                  <div class="col-sm-9">
                    <input type="text" id="jawabanE" name="jawabanE" placeholder="jawaban" class="form-control" value="<?= $detail->opsiE ?>" autofocus>
                    <?= form_error('jawabanE', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  </dic>
</body>

</html>