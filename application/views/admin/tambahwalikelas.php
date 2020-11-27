<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Wali Kelas</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/walikelas/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">GURU</h6>
                    </label>
                    <select class="form-control" name="nip" id="nip">
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g->nip ?>"> <?= $g->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->id_jurusan ?>"> <?= $k->kelas ?> <?= $k->nama_jurusan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Admin/walikelas'); ?>" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>