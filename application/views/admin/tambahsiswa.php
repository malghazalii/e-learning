<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/datasiswa/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NIS</h6>
                    </label>
                    <input type="number" class="form-control" name="nis" id="nis" placeholder="nis" value="<?= set_value('nis'); ?>" />
                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NAMA</h6>
                    </label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?= set_value('nama'); ?>" />
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">JENIS_KELAMIN</h6>
                    </label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">ALAMAT</h6>
                    </label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?= set_value('alamat'); ?>" />
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">AGAMA</h6>
                    </label>
                    <select class="form-control" name="agama" id="agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khatolik">Katolik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NO HP</h6>
                    </label> <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="13" placeholder="Telp" value="<?= set_value('no_hp'); ?>" />
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <?php foreach ($siswa as $s) : ?>
                            <option value="<?= $s->id_kelas ?>"> <?= $s->kelas ?> <?= $s->nama_jurusan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>