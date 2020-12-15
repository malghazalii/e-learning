<div class="container py-xl-5 py-lg-3">
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-2 control-label"><strong>Edit Materi</strong></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form class="form-horizontal" method="POST" action="<?= base_url('User/Guru/uploadmateri/update/' . $materi->id_materi); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                        <div class="col-sm-9">
                            <select id="country" class="form-control" name="mapel" id="mapel">
                                <?php foreach ($mengajar as $m) : ?>
                                    <option value="<?= $m->id_mengajar ?>" <?php if ($m->id_mengajar == $materi->id_mengajar) echo 'selected'; ?>> <?= $m->mata_pelajaran ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Nama Materi</label>
                        <div class="col-sm-9">
                            <input type="text" id="nama" name="nama" placeholder="nama materi" value="<?= $materi->judul ?>" class="form-control" autofocus>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea rows="4" cols="97" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan"><?= $materi->isi ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="keterangan" class="col-sm-3 control-label">Masukkan File</label>
                        <div class="col-sm-9">
                            <input type="file" name="file_input" id="file_input" value="<?= $materi->nama_file ?>" class="btn btn-info upload">
                            <?= form_error('file_input', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /form -->

    </div>
</div>
</div>