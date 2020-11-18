<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/dataguru/update'); ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NIP</h6>
                    </label>
                    <input type="number" class="form-control" name="nip" id="nip" placeholder="nip" value="<?= $edit->nip ?>" />
                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NAMA</h6>
                    </label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?= $edit->nama ?>" />
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">PASSWORD</h6>
                    </label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?= $edit->password; ?>" />
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">JENIS_KELAMIN</h6>
                    </label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki" <?php if ($edit->jenis_kelamin == 'laki-laki') echo 'selected'; ?>>laki-laki</option>
                        <option value="perempuan" <?php if ($edit->jenis_kelamin == 'perempuan') echo 'selected'; ?>>perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">ALAMAT</h6>
                    </label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?= $edit->alamat; ?>" />
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NO HP</h6>
                    </label> <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="13" placeholder="Telp" value="<?= $edit->no_hp; ?>" />
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">GOLONGAN</h6>
                    </label>
                    <select class="form-control" name="golongan" id="golongan">
                        <?php foreach ($golongan as $g) : ?>
                            <option value="<?= $g->id_gol ?>" <?php if ($g->id_gol == $edit->id_gol) echo 'selected'; ?>><?= $g->nama_golongan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>