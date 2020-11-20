<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/kelas/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->id_kelas ?>"> <?= $k->kelas ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">Jurusan</h6>
                    </label>
                    <input type="varchar" class="form-control form-control-user" name="jurusan" id="jurusan" placeholder="jurusan" value="<?= set_value('jurusan'); ?>" />
                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>