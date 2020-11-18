<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Mata Pelajaran</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/mapel/update'); ?>" method="post">
                <input hidden type="varchar" class="form-control form-control-user" name="id" id="id" placeholder="id" value="<?= $mapel->id_mapel ?>" />
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">Mata Pelajaran</h6>
                    </label>
                    <input type="varchar" class="form-control form-control-user" name="mata_pelajaran" id="mata_pelajaran" placeholder="mapel" value="<?= $mapel->mata_pelajaran ?>" />
                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>