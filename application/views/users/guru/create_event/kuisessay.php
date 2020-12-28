<html lang="en">

<head>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
  <br>
  <div class="container py-xl-5 py-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="form-group">
          <label>Pilih Nama Ujian</label> <br>
          <?php if ($title == "Input Soal Ujian Essay" || $title == "Input Soal Ujian Pilihan Ganda") : ?>
            <?php if ($detail) : ?>
              <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $det->nama_ujian ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php foreach ($nama as $n) : ?>
                  <a class="dropdown-item" href="<?= base_url('User/Guru/kuisessay/kuis/' . $n->id_kuis); ?>"><?= $n->nama_ujian ?></a>
                <?php endforeach; ?>
              </div>
            <?php else : ?>
              <p>Harus Mengisi Soal Meskipun 1 baru bisa melanjutkan kembali memilih Ujian</p>
            <?php endif; ?>
          <?php else : ?>
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Daftar Nama Ujian
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php foreach ($nama as $n) : ?>
                <a class="dropdown-item" href="<?= base_url('User/Guru/kuisessay/kuis/' . $n->id_kuis); ?>"><?= $n->nama_ujian ?></a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label>Pilih Tipe Soal</label> <br>
          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if ($title == "Input Soal Essay") : ?>
              Soal Essay
            <?php elseif ($title == "Input Soal Pilihan Ganda") : ?>
              Soal Pilihan Ganda
            <?php elseif ($title == "Input Soal Ujian Essay") : ?>
              Soal Essay
            <?php elseif ($title == "Input Soal Ujian Pilihan Ganda") : ?>
              Soal Pilihan Ganda
            <?php endif; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php if ($title == "Input Soal Ujian Essay" || $title == "Input Soal Ujian Pilihan Ganda") : ?>
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
    <?php if ($title == "Input Soal Ujian Essay") : ?>
      <form method="POST" action="<?= base_url('User/Guru/KuisEssay/tambahData/' . $det->id_kuis); ?>" enctype="multipart/form-data">
        <div class="panel-body">
          <!-- membuat form  -->
          <!-- gunakan tanda [] untuk menampung array  -->
          <div class="control-group after-add-more">
            <div class="form-group">
              <div class="row">
                <label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                <div class="col-sm-3">
                  <input type="file" name="file_input" id="file_input" class="btn btn-info upload">
                  <input type="text" hidden id="idkuis" name="idkuis" value="<?= $det->id_kuis ?>">
                  <input hidden type="text" name="soal" value="<?= $soal->hello + 1; ?>">
                </div>
                <div class="col-sm-6">
                  <input type="text" id="tekssoal" name="tekssoal" placeholder="teks soal" class="form-control" autofocus>
                  <?= form_error('tekssoal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <button class="btn btn-success" type="submit">Tambah</button>
        </div>
      </form>
    <?php elseif ($title == "Input Soal Ujian Pilihan Ganda") : ?>
      <form method="POST" action="<?= base_url('User/Guru/KuisPilgan/tambahData/' . $det->id_kuis); ?>" enctype="multipart/form-data">
        <div class="panel-body">
          <!-- membuat form  -->
          <!-- gunakan tanda [] untuk menampung array  -->
          <div class="control-group after-add-more">
            <div class="form-group">
              <div class="row">
                <label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                <div class="col-sm-3">
                  <input type="file" name="file_input" id="file_input" class="btn btn-info upload">
                  <input hidden type="text" name="soal" value="<?= $soal->hello + 1 ?>">
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
      </form>
    <?php endif; ?>
    <br>
    <?= $this->session->flashdata('message'); ?>

    <div class="row justify-content-center pt-7">
      <div class="col-lg-12 agile-course-main">
        <div class="w3ls-cource-first">
          <div class="px-md-5 px-4  pb-md-5 pb-4">
            <?php if ($title == "Input Soal Ujian Essay" || $title == "Input Soal Ujian Pilihan Ganda") : ?>
              <table class="table table-striped">

                <thead>
                  <tr>
                    <th scope="col">Nama Ujian</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Soal</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Poin</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($detail as $d) : ?>
                    <tr>
                      <td><?= $d->nama_ujian ?></td>
                      <?php if ($d->nama_file) : ?>
                        <td><img width="50px" height="50px" src="<?= base_url('assets/users/upload/' . $d->nama_file); ?>"></td>
                      <?php else : ?>
                        <td></td>
                      <?php endif; ?>
                      <td><?= $d->soal ?></td>
                      <?php if ($d->idk == $d->id) : ?>
                        <td>Pilgan</td>
                        <td>
                          <?php
                          echo anchor(base_url('User/Guru/KuisPilgan/edit/' . $d->idk), 'Edit');
                          echo ' | ';
                          echo anchor(base_url('User/Guru/KuisPilgan/delete/' . $d->idk . '/' . $d->id_kuis), 'Delete', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
                          ?>
                        </td>
                      <?php elseif ($d->idk != $d->id) : ?>
                        <td>Essay</td>
                        <td>
                          <?php
                          echo anchor(base_url('User/Guru/KuisEssay/edit/' . $d->idk), 'Edit');
                          echo ' | ';
                          echo anchor(base_url('User/Guru/KuisEssay/delete/' . $d->idk . '/' . $d->id_kuis), 'Delete', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"');
                          ?>
                        </td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
              <br>
              <br>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php else : ?>
  <table class="table table-striped">

    <thead>
      <tr>
        <th scope="col">Nama Ujian</th>
        <th scope="col">Gambar</th>
        <th scope="col">Soal</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
        <!-- <th scope="col">Poin</th> -->
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
  </div>
  <br>
  <br>
<?php endif; ?>

</body>

</html>