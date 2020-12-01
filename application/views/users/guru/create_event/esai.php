<div class="container py-xl-5 py-lg-3">
    <div class="card">

        <div class="card-header">
            <div class="container">
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-2 control-label"><strong>Pilih Tugas</strong></label>
                        <div class="col-sm-3">
                            <select style="height:35px;" id="country" class="form-control">
                                <option>Tugas Uraian</option>
                                <option>Tugas PIlihan Ganda</option>
                                <option>Kuis</option>
                                <option>Upload materi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                        <div class="col-sm-9">
                            <select id="country" class="form-control">
                                <?php foreach ($mengajar as $m) : ?>
                                    <option value="<?= $m->id_mapel ?>"> <?= $m->mata_pelajaran ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-3">
                            <select id="country" class="form-control">
                                <?php foreach ($mengajar as $m) : ?>
                                    <option value="<?= $m->id_jurusan ?>"> <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Nama tugas</label>
                        <div class="col-sm-9">
                            <input type="text" id="namatugas" placeholder="nama tugas" class="form-control" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" id="Keterangan" placeholder="keterangan" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Batas awal</label>
                        <div class="col-sm-3">
                            <select id="country" class="form-control">
                                <option>01</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select id="country" class="form-control">
                                <option>a.m</option>
                                <option>p.m</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" id="birthDate" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Batas Akhir</label>
                        <div class="col-sm-3">
                            <select id="country" class="form-control">
                                <option>01</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select id="country" class="form-control">
                                <option>a.m</option>
                                <option>p.m</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" id="birthDate" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="keterangan" class="col-sm-3 control-label">Masukkan File</label>
                        <div class="col-sm-9">
                            <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
                        </div>
                    </div>
                </div>
        </div> <!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
        </div>
        </form> <!-- /form -->

    </div>
</div>
</div>