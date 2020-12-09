<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Tahun Angkatan</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/tahunangkatan/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">Tahun Angkatan</h6>
                    </label>
                    <input type="number" class="form-control form-control-user" name="tahunangkatan" id="tahunangkatan" placeholder="Tahun Angkatan" value="<?= set_value('tahunangkatan'); ?>" />
                    <?= form_error('tahunangkatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('Admin/tahunangkatan'); ?>" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>