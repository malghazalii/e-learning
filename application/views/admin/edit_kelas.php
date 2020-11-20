<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/kelas/update'); ?>" method="post">
                <input hidden type="varchar" class="form-control form-control-user" name="id_jurusan" id="id_jurusan" placeholder="id_jurusan" value="<?= $edit->id_jurusan ?>" />
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->id_kelas ?>" <?php if ($k->id_kelas == $edit->id_kelas) echo 'selected'; ?>> <?= $k->kelas ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="jurusan" id="jurusan">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j->nama_jurusan ?>" <?php if ($j->nama_jurusan == $edit->nama_jurusan) echo 'selected'; ?>> <?= $j->nama_jurusan ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>