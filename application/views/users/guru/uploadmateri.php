        <div class="card-body">
            <?php echo form_open_multipart('user/guru/uploadmateri/tambahData'); ?>
            <div class="form-group">
                <div class="row">
                    <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                    <div class="col-sm-9">
                        <select id="country" class="form-control" name="mapel" id="mapel">
                            <?php foreach ($mengajar as $m) : ?>
                                <option value="<?= $m->id_mengajar ?>"> <?= $m->mata_pelajaran ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="namatugas" class="col-sm-3 control-label">Nama Materi</label>
                    <div class="col-sm-9">
                        <input type="text" id="nama" name="nama" placeholder="nama materi" class="form-control" autofocus>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea rows="4" cols="97" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">

                    <label for="keterangan" class="col-sm-3 control-label">Masukkan File</label>
                    <div class="col-sm-9">
                        <input type="file" name="file" id="file" class="btn btn-info upload">
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /form -->

        </div>
        </div>
        </div>