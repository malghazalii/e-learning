<html lang="en">

<!-- <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head> -->

<body>
    <br>
    <div class="container py-xl-5 py-lg-3"">
    <div class="card">
    <div class="card-body">
        <form method="POST" action="<?= base_url('User/Guru/KuisEssay/update/' . $detail->idk . '/' . $detail->id_kuis); ?>" enctype="multipart/form-data">
            <div class="panel-body">
                <!-- membuat form  -->
                <!-- gunakan tanda [] untuk menampung array  -->
                <div class="control-group after-add-more">
                    <div class="form-group">
                        <div class="row">
                            <label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                            <div class="col-sm-3">
                                <input type="file" name="file_input" id="file_input" value="<?= $detail->nama_file ?>" class="btn btn-info upload">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="tekssoal" name="tekssoal" placeholder="teks soal" value="<?= $detail->soal ?>" class="form-control" autofocus>
                                <input type="text" id="idkuis" name="idkuis" hidden placeholder="teks soal" value="<?= $detail->id_kuis ?>" class="form-control" autofocus>
                                <?= form_error('tekssoal', '<small class="text-danger pl-3">', '</small>'); ?>
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
    </div>
</body>

</html>