        <div class="card-body">
            <form class="form-horizontal" method="POST" action="<?= base_url('User/Guru/BuatKuis/tambahData/'); ?>" role="form">
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                        <div class="col-sm-9">
                            <select id="country" name="mengajar" class="form-control">
                                <?php foreach ($mengajar as $m) : ?>
                                    <option value="<?= $m->id_mengajar ?>"> <?= $m->mata_pelajaran ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="birthDate" class="col-sm-3 control-label">Pilih Jenis Ujian</label>
                        <div class="col-sm-9">
                            <select id="country" name="jenisujian" class="form-control">>
                                <option value="Ulangan Harian">Ulangan Harian</option>
                                <option value="Ulangan Tengah Semester">Ujian Tengah Semester</option>
                                <option value="Ulangan Akhir Sekolah">Ujian Akhir Sekolah</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Nama Ujian</label>
                        <div class="col-sm-9">
                            <input type="text" id="namaujian" name="namaujian" placeholder="nama ujian" class="form-control" autofocus>
                            <?= form_error('namaujian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <label for="birthDate" class="col-sm-3 control-label">Batas Akhir</label>
                            <div class="col-sm-3">
                                <input type="time" id="jam" name="jam" class="form-control">
                                <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" id="tanggal" name="tanggal" class="form-control">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="namatugas" class="col-sm-3 control-label">Jumlah Soal Keluar</label>
                        <div class="col-sm-9">
                            <input type="number" id="jmlsoalkeluar" name="jmlsoalkeluar" placeholder="jumlah soal keluar" class="form-control" autofocus>
                            <?= form_error('jmlsoalkeluar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Lanjut</button>
                    </div>
                </div>
            </form>
        </div> <!-- /.form-group -->