<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
        </div>
        <div class="card-body">

            <?php foreach ($edit as $e) ?>

            <form action="<?= base_url() . 'Admin/datasiswa/update'; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-primary">NIS</h6>
                    </label>
                    <input type="text" class="form-control" name="nis" id="nis" placeholder="nis" value="<?= $e->nis ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-primary">NAMA</h6>
                    </label> <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?= $e->nama ?>" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-primary">JENIS_KELAMIN</h6>
                    </label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki" <?php if ($e->jenis_kelamin == 'laki-laki') echo "selected" ?>>laki-laki</option>
                        <option value="wanita" <?php if ($e->jenis_kelamin == 'wanita') echo "selected" ?>>wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-primary">ALAMAT</h6>
                    </label> <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?= $e->alamat ?>" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-primary">AGAMA</h6>
                    </label>
                    <select class="form-control" name="agama" id="agama">
                        <option value="Islam" <?php if ($e->agama == 'Islam') echo "selected" ?>>Islam</option>
                        <option value="Kristen" <?php if ($e->agama == 'Kristen') echo "selected" ?>>Kristen</option>
                        <option value="Hindu" <?php if ($e->agama == 'Hindu') echo "selected" ?>>Hindu</option>
                        <option value="Buddha" <?php if ($e->agama == 'Buddha') echo "selected" ?>>Buddha</option>
                        <option value="Khatolik" <?php if ($e->agama == 'Khatolik') echo "selected" ?>>Khatolik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-primary">NO HP</h6>
                    </label> <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="13" placeholder="Telp" value="<?= $e->no_hp ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-primary">PASSWORD</h6>
                    </label> <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?= $e->password ?>" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-primary">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">   
                        <option value="10" <?php if ($e->kelas == '10') echo "selected" ?>>10</option>
                        <option value="11" <?php if ($e->kelas == '11') echo "selected" ?>>11</option>
                        <option value="12" <?php if ($e->kelas == '12') echo "selected" ?>>12</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-primary">JURUSAN</h6>
                    </label>
                    <select class="form-control" name="jurusan" id="jurusan">
                        <option value="ipa 1" <?php if ($e->nama_jurusan == 'ipa 1') echo "selected" ?>>ipa 1</option>
                        <option value="ipa 2" <?php if ($e->nama_jurusan == 'ipa 2') echo "selected" ?>>ipa 2</option>
                        <option value="ipa 3" <?php if ($e->nama_jurusan == 'ipa 3') echo "selected" ?>>ipa 3</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Admin/datasiswa'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>