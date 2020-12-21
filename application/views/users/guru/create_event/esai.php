<div class="card-body">
    <form class="form-horizontal" method="POST" action="<?= base_url('User/Guru/EssayEvent/tambahData'); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                <div class="col-sm-9">
                    <select id="country" class="form-control" name="mapel" id="mapel">
                        <option value="">Mata Pelajaran</option>
                        <?php foreach ($mengajar as $m) : ?>
                            <option value="<?= $m->id_mengajar ?>"> <?= $m->mata_pelajaran ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="namatugas" class="col-sm-3 control-label">Nama tugas</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="nama" placeholder="nama tugas" value="<?= set_value('nama'); ?>" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea rows="4" cols="97" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan"><?= set_value('keterangan'); ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <div class="row">
                    <label for="birthDate" class="col-sm-3 control-label">Batas Akhir</label>
                    <div class="col-sm-3">
                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>" min="<?= $tanggal ?>">
                        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-3">
                        <input type="time" id="jam" name="jam" value="<?= set_value('jam'); ?>" class="form-control">
                        <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="keterangan" class="col-sm-3 control-label">Masukkan File</label>
                <div class="col-sm-9">
                    <input type="file" name="file_input" value="<?= set_value('file_input'); ?>" id="file_input" class="btn btn-info upload">
                    <?= form_error('file_input', '<small class="text-danger pl-3">', '</small>'); ?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
    </form>
</div> <!-- /.form-group -->
</div>
</div>
</div>
</div>