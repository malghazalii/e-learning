<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal Mata Pelajaran</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/jadwal/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">Mata Pelajaran</h6>
                    </label>
                    <select class="form-control" name="mengajar" id="mengajar">
                        <?php foreach ($mengajar as $m) : ?>
                            <option value="<?= $m->id_mengajar ?>"><?= $m->mata_pelajaran ?> - <?= $m->nama ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">HARI</h6>
                    </label>
                    <select class="form-control" name="hari" id="hari">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">Waktu</h6>
                    </label>
                    <div class="row" style="padding-left: 10px;">
                        <input type="time" class="form-control col-sm-2" name="mulai" id="mulai" placeholder="mulai" value="<?= set_value('mulai'); ?>" />
                        &nbsp; <strong>_</strong> &nbsp;
                        <input type="time" class="form-control col-sm-2" name="akhir" id="akhir" placeholder="akhir" value="<?= set_value('akhir'); ?>" />
                    </div>
                    <div style="float: left; padding-right: 70px;">
                        <?= form_error('mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div>
                        <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Admin/jadwal'); ?>" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>