<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Wali Kelas</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/walikelas/update'); ?>" method="post">
                <input hidden type="varchar" class="form-control form-control-user" name="id" id="id" placeholder="id" value="<?= $walikelas->id_walikelas ?>" />
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">GURU</h6>
                    </label>
                    <select class="form-control" name="nip" id="nip">
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g->nip ?>" <?php if ($g->nip == $walikelas->nip) echo 'selected'; ?>> <?= $g->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->id_jurusan ?>" <?php if ($k->id_jurusan == $walikelas->id_jurusan) echo 'selected'; ?>> <?= $k->kelas ?> <?= $k->nama_jurusan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>