        <div class="card-body">
            <form class="form-horizontal" method="POST" action="<?= base_url('User/Guru/BuatKuis/tambahData/'); ?>" role="form">
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                        <div class="col-sm-9">
                            <select id="country" name="mengajar" class="form-control">
                                <option value="">Mata Pelajaran</option>
                                <?php foreach ($mengajar as $m) : ?>
                                    <option value="<?= $m->id_mengajar ?>"> <?= $m->mata_pelajaran ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('mengajar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Pilih Jenis Ujian</label>
                        <div class="col-sm-9">
                            <select id="country" name="jenisujian" class="form-control">>
                                <option value="">Jenis Ujian</option>
                                <option value="Ulangan Harian">Ulangan Harian</option>
                                <option value="Ulangan Tengah Semester">Ujian Tengah Semester</option>
                                <option value="Ulangan Akhir Sekolah">Ujian Akhir Sekolah</option>
                            </select>
                            <?= form_error('mengajar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Nama Ujian</label>
                        <div class="col-sm-9">
                            <input type="text" id="namaujian" onkeypress="return event.charCode < 48 || event.charCode  >57" name="namaujian" placeholder="nama ujian" value="<?= set_value('namaujian'); ?>" class="form-control" autofocus>
                            <?= form_error('namaujian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Lama Ujian</label>
                        <div class="col-sm-9">
                            <input type="number" id="namaujian" name="minute" placeholder="Menit" value="<?= set_value('minute'); ?>" class="form-control" autofocus>
                            <?= form_error('minute', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <label for="birthDate" class="col-sm-3 control-label">Tanggal Mulai</label>
                            <div class="col-sm-3">
                                <input type="date" id="tanggal" name="tanggalmulai" value="<?= set_value('tanggalmulai'); ?>" class="form-control" min="<?= $tanggal ?>">
                                <?= form_error('tanggalmulai', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="time" id="jam" name="jammulai" value="<?= set_value('jammulai'); ?>" class="form-control">
                                <?= form_error('jammulai', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <label for="birthDate" class="col-sm-3 control-label">Batas Akhir</label>
                            <div class="col-sm-3">
                                <input type="date" id="tanggal" name="tanggal" value="<?= set_value('tanggal'); ?>" class="form-control" min="<?= $tanggal ?>">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="time" id="jam" name="jam" value="<?= set_value('jam'); ?>" class="form-control">
                                <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Jumlah Soal Keluar</label>
                        <div class="col-sm-9">
                            <input type="number" id="jmlsoalkeluar" min="1" max="100" name="jmlsoalkeluar" placeholder="jumlah soal keluar" value="<?= set_value('jmlsoalkeluar'); ?>" class="form-control" autofocus>
                            <?= form_error('jmlsoalkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block" class="text-right">Lanjut</button>
                    </div>
                </div>
        </div>
        </div>
        </form>
        </div> <!-- /.form-group -->