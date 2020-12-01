<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Guru Mengajar</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/GuruMengajar/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">Nama Guru</h6>
                    </label>
                    <select class="form-control" name="nip" id="nip">
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g->nip ?>"> <?= $g->nama ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">Mata Pelajaran</h6>
                    </label>
                    <select class="form-control" name="mapel" id="mapel">
                        <?php foreach ($mapel as $m) : ?>
                            <option value="<?= $m->id_mapel ?>"> <?= $m->mata_pelajaran ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">Kelas</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->id_jurusan ?>"> <?= $k->kelas ?> <?= $k->nama_jurusan ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">Waktu</h6>
                    </label>
                    <input type="time" class="form-control" name="jam" id="jam" placeholder="waktu" value="" />
                    <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Admin/GuruMengajar'); ?>" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>