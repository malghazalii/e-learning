<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Mata Pelajaran</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/mapel/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">Mata Pelajaran</h6>
                    </label>
                    <input type="varchar" class="form-control form-control-user" name="mapel" id="mapel" placeholder="mapel" value="<?= set_value('mapel'); ?>" />
                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('Admin/mapel'); ?>" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>